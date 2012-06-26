<?php

//This file cannot be called directly, only included.
if (str_replace(DIRECTORY_SEPARATOR, "/", __FILE__) == $_SERVER['SCRIPT_FILENAME']) {
 exit;
}

if ($currentUser -> getType() != "administrator" && (($currentEmployee -> getType() != _SUPERVISOR) ||(isset($currentBranch) && !$currentEmployee -> supervisesBranch($currentBranch->branch['branch_ID']) ))) {
 eF_redirect(basename($_SERVER['PHP_SELF'])."?ctg=module_hcd&op=chart&message=".urlencode(_SORRYYOUDONOTHAVEPERMISSIONTOPERFORMTHISACTION)."&message_type=failure");
 exit;
}

$_change_ = true;
if ((isset($currentUser -> coreAccess['organization']) && $currentUser -> coreAccess['organization'] == 'view') || (!$currentEmployee->isSupervisor() && $currentUser -> getType() != "administrator")) {
 $_change_ = false;
}
$smarty -> assign("_change_", $_change_);

try {
 /* Check permissions: only admins and supervisors can see branches - the supervisors only their own */
 if (isset($_GET['delete_branch'])) {
  $currentBranch = new EfrontBranch($_GET['delete_branch']);
 } else if (isset($_GET['edit_branch'])) {
  $currentBranch = new EfrontBranch($_GET['edit_branch']);
 }
} catch (Exception $e) {
 handleAjaxExceptions($e);
}

if (isset($currentBranch) && $currentUser -> user['user_type'] != 'administrator' && !in_array($currentBranch -> branch['branch_ID'], $supervisor_at_branches['branch_ID'])) {
 eF_redirect(basename($_SERVER['PHP_SELF'])."?ctg=module_hcd&op=branches&message=".urlencode(_SORRYYOUDONOTHAVEACCESSTOTHISBRANCH)."&message_type=failure");
}
/*****************************************************

 ON AJAX REQUESTING the branch's job descriptions select

 **************************************************** */
if (isset($_GET['postAjaxRequest'])) {
 if (isset($_GET['getJobSelect'])) {
  $ar = $currentBranch -> createJobDescriptionsSelect($attributes);
  foreach ($ar as $val=>$element) {
   echo $val."<option>".$element."<option>";
  }
  exit;
 } else if (isset($_GET['getSupervisorsSelect'])) {
  $ar = $currentBranch -> createSupervisorsSelect();
  foreach ($ar as $val=>$element) {
   echo $val."<option>".$element."<option>";
  }
  exit;
 }
}
if (isset($_GET['delete_branch']) && $_change_) { //The administrator asked to delete a branch
 try {
  $currentBranch = new EfrontBranch($_GET['delete_branch']);
  $currentBranch -> delete();
  exit;
 } catch (EfrontBranchException $e) {
  handleAjaxExceptions($e);
 }
} else if (isset($_GET['add_branch']) || isset($_GET['edit_branch'])) {
 if ($_GET['ajax']) {
  if (isset($_GET['remove_user_job']) && $_change_) {
   try {
    $editedUser = EfrontUserFactory :: factory($_GET['user']);
    $editedEmployee = $editedUser -> aspects['hcd'];
    $editedEmployee = $editedEmployee -> removeJob($_GET['remove_user_job']);
   } catch (Exception $e) {
    handleAjaxExceptions($e);
   }
   exit;
  } elseif (isset($_GET['applybranchcoursestoallusers']) && $_change_) {
   $branchCourses = $currentBranch -> getBranchCourses();
   $branchUsers = $currentBranch -> getEmployees();
   $users = array();
   foreach ($branchUsers as $key => $value) {
    $users[$key] = $value['user_types_ID'] ? $value['user_types_ID'] : $value['user_type'];
   }

   foreach ($branchCourses as $key => $course) {
    $course -> addUsers(array_keys($users), array_values($users));
   }

   // First job is to assign the jobs Assign jobs
  } else if (isset($_GET['postAjaxRequest']) && $_change_) {
   if (isset($_GET['add_lesson'])) {
    /* Find all employees having this skill */
    if ($_GET['insert'] == "true") {
     echo $currentBranch -> assignLesson($_GET['add_lesson']);
    } else if ($_GET['insert'] == "false") {
     echo $currentBranch -> removeLesson($_GET['add_lesson']);
    } else if (isset($_GET['addAll'])) {
     $lessons = $currentBranch -> getAllLessons();
     isset($_GET['filter']) ? $lessons = eF_filterData($lessons, $_GET['filter']) : null;

     foreach ($lessons as $lesson) {
      if ($lesson['branches_ID'] == "") {
       $currentBranch -> assignLesson($lesson['id']);
      }
     }
     echo "-1";
    } else if (isset($_GET['removeAll'])) {
     $lessons = $currentBranch -> getAllLessons();
     isset($_GET['filter']) ? $lessons = eF_filterData($lessons, $_GET['filter']) : null;
     foreach ($lessons as $lesson) {
      if ($lesson['branches_ID'] == $currentBranch -> branch['branch_ID']) {
       $currentBranch -> removeLesson($lesson['id']);
      }
     }
     echo "-1"; // reload
    }
    exit;

   } else if (isset($_GET['add_course'])) {
    /* Find all employees having this skill */
    if ($_GET['insert'] == "true") {
     echo $currentBranch -> addCoursesToBranch($_GET['add_course']);
    } else if ($_GET['insert'] == "false") {
     echo $currentBranch -> removeCoursesFromBranch($_GET['add_course']);
    } else if (isset($_GET['addAll'])) {
     $constraints = array('archive' => false, 'active' => true, 'condition' => 'r.courses_ID is null') + createConstraintsFromSortedTable();
     $courses = $currentBranch -> getBranchCoursesIncludingUnassigned($constraints);
     isset($_GET['filter']) ? $courses = eF_filterData($courses,$_GET['filter']) : null;
     $currentBranch -> addCoursesToBranch($courses);
    } else if (isset($_GET['removeAll'])) {
     $constraints = array('archive' => false, 'active' => true) + createConstraintsFromSortedTable();
     $courses = $currentBranch -> getBranchCoursesIncludingUnassigned($constraints);

     isset($_GET['filter']) ? $courses = eF_filterData($courses,$_GET['filter']) : null;
     $currentBranch -> removeCoursesFromBranch($courses);
    }
    exit;

   } else if (isset($_GET['propagate'])) {
    $subBranches = $currentBranch -> getAllSubbranches(true);
    foreach ($subBranches as $branch) {
     if ($_GET['selected']) {
      $branch -> addCoursesToBranch($_GET['propagate']);
     } else {
      $branch -> removeCoursesFromBranch($_GET['propagate']);
     }
    }
    exit;
   } else {

    // Find all employees having this skill
    if ($_GET['insert'] == "true") {
     $editedUser = EfrontUserFactory :: factory($_GET['add_employee']);
     if ($editedUser -> getType() != "administrator") {
      $editedEmployee = $editedUser -> aspects['hcd'];

      if ($_GET['default_job'] != '') {

       if ($_GET['default_job'] != $_GET['add_job'] || $_GET['default_position'] != $_GET['add_position']) {
        $old_job_description_ID = eF_getJobDescriptionId($_GET['default_job'], $_GET['edit_branch']);
        $editedEmployee = $editedEmployee -> removeJob ($old_job_description_ID);
       }
      }

      $new_job_description_ID = eF_getJobDescriptionId($_GET['add_job'], $_GET['edit_branch']);
      $editedEmployee = $editedEmployee -> addJob ($editedUser, $new_job_description_ID, $_GET['edit_branch'], $_GET['add_position']);
     } else {
      header("HTTP/1.0 500 ");
      echo (_ADMINISTRATORSNOJOBDESCRIPTIONS);
      exit;
     }
     exit;
    } else if ($_GET['insert'] == "false") {

     $editedUser = EfrontUserFactory :: factory($_GET['add_employee']);
     $editedEmployee = $editedUser -> aspects['hcd'];
     $old_job_description_ID = eF_getJobDescriptionId($_GET['add_job'], $_GET['edit_branch']);
     $editedEmployee = $editedEmployee -> removeJob ($old_job_description_ID);
     exit;
    } else if (isset($_GET['addAll'] )) {

     $employees = $currentBranch -> getEmployeesWithJobs();
     // Filter all employee according to the filter
     isset($_GET['filter']) ? $employees = eF_filterData($employees,$_GET['filter']) : null;
     $jobs = $currentBranch -> getJobDescriptions();
     foreach ($employees as $employee) {
      if ($employee['job_description_ID'] == "") {
       $editedUser = EfrontUserFactory :: factory($employee['login']);
       $editedEmployee = $editedUser -> aspects['hcd'];
       if ($editedUser -> getType() != "administrator") {
        $editedEmployee = $editedEmployee -> addJob ($editedUser, $jobs[0]['job_description_ID'], $_GET['edit_branch'], 0);
       }

      }
     }
     exit;
    } else if (isset($_GET['removeAll'] )) {
     $employees = $currentBranch -> getEmployeesWithJobs();
     isset($_GET['filter']) ? $employees = eF_filterData($employees,$_GET['filter']) : null;

     foreach ($employees as $employee) {
      if ($employee['job_description_ID'] != "") {
       $editedUser = EfrontUserFactory :: factory($employee['login']);
       $editedEmployee = $editedUser -> aspects['hcd'];

       $employee_jobs = $editedEmployee -> getJobs();
       $jobs = $currentBranch -> getJobDescriptions();
       foreach ($jobs as $job) {
        if (in_array($job['job_description_ID'], array_keys($employee_jobs))) {
         $editedEmployee = $editedEmployee -> removeJob ($job['job_description_ID'], $_GET['edit_branch'], $employee_jobs['role']);
        }
       }


      }
     }
     exit;
    }
    $_GET['ajax'] = 1;
   }
  }

  $smarty -> assign("T_DATASOURCE_SORT_BY", 5);
  $smarty -> assign("T_DATASOURCE_SORT_ORDER", 'desc');
  $smarty -> assign("T_DATASOURCE_COLUMNS", array('name', 'location', 'directions_name', 'num_lessons', 'num_skills', 'has_course', 'has_instances', 'operations'));
  $smarty -> assign("T_DATASOURCE_OPERATIONS", array('propagate'));
  if (isset($_GET['ajax']) && ($_GET['ajax'] == 'coursesTable' || $_GET['ajax'] == 'instancesTable')) {
   try {
    if ($currentEmployee -> isSupervisor() ) {
     $smarty -> assign("T_IS_SUPERVISOR", true);
    }

    if ($_GET['ajax'] == 'coursesTable') {
     $constraints = createConstraintsFromSortedTable() + array('archive' => false, 'instance' => false);
    }
    if ($_GET['ajax'] == 'instancesTable' && eF_checkParameter($_GET['instancesTable_source'], 'id')) {
     $constraints = createConstraintsFromSortedTable() + array('archive' => false, 'instance' => $_GET['instancesTable_source']);
    }
    $courses = $currentBranch -> getBranchCoursesIncludingUnassigned($constraints);
    $totalEntries = $currentBranch -> countBranchCoursesIncludingUnassigned($constraints);

    $dataSource = EfrontCourse :: convertCourseObjectsToArrays($courses);
    $tableName = $_GET['ajax'];
    $alreadySorted = 1;
    $smarty -> assign("T_TABLE_SIZE", $totalEntries);

    include("sorted_table.php");
   } catch (Exception $e) {
    handleAjaxExceptions($e);
   }
  }
  if (isset($_GET['ajax']) && $_GET['ajax'] == 'lessonsTable') {
   $lessons = $currentBranch -> getAllLessons();
   isset($_GET['limit']) ? $limit = $_GET['limit'] : $limit = G_DEFAULT_TABLE_SIZE;

   if (isset($_GET['sort'])) {
    isset($_GET['order']) ? $order = $_GET['order'] : $order = 'asc';
    $lessons = eF_multiSort($lessons, $_GET['sort'], $order);
   }

   if (isset($_GET['filter'])) {
    $lessons = eF_filterData($lessons, $_GET['filter']);
   }
   $smarty -> assign("T_LESSONS_SIZE", sizeof($lessons));
   if (isset($_GET['limit']) && eF_checkParameter($_GET['limit'], 'int')) {
    isset($_GET['offset']) && eF_checkParameter($_GET['offset'], 'int') ? $offset = $_GET['offset'] : $offset = 0;
    $lessons = array_slice($lessons, $offset, $limit);
   }


   $directionsTree = new EfrontDirectionsTree();
   $directionPaths = $directionsTree -> toPathString();
   $languages = EfrontSystem :: getLanguages(true);

   foreach ($lessons as $key => $lesson) {
    $obj = new EfrontLesson($lesson);
    //$lessons[$key]['link'] = $obj -> toHTMLTooltipLink(basename($_SERVER['PHP_SELF']).'?ctg=lessons&edit_lesson='.$lesson['id']);
    $lessons[$key]['direction_name'] = $directionPaths[$lesson['directions_ID']];
    $lessons[$key]['languages_NAME'] = $languages[$lesson['languages_NAME']];
    $lessons[$key]['price_string'] = $obj -> lesson['price_string'];
    //$lessons[$key]['students']	   = sizeof($obj -> getUsers('student'));
   }
   $smarty -> assign("T_LESSONS_DATA", $lessons);
   $smarty -> display($_SESSION['s_type'].'.tpl');
   exit;
  }
  if (isset($_GET['ajax']) && $_GET['ajax'] == 'branchUsersTable') {
   $constraints = array('archive' => false, 'active' => 1, 'return_objects' => false) + createConstraintsFromSortedTable();
         if ($currentEmployee -> isSupervisor()) {
    $supervisedEmployees = $currentEmployee -> getSupervisedEmployees(true);
    $supervisedEmployees[] = $currentEmployee -> login;
    $smarty -> assign("T_SUPERVISED_EMPLOYEES", $supervisedEmployees);
         }
         if ($_GET['showAllEmployees'] == 1) {
          $employees = $currentBranch -> getBranchTreeUsers($constraints);
          $totalEntries = $currentBranch -> countBranchTreeUsers($constraints);
         } else {
          $employees = $currentBranch -> getBranchUsers($constraints);
          $totalEntries = $currentBranch -> countBranchUsers($constraints);
         }
         $dataSource = $employees;
   $tableName = $_GET['ajax'];
   $alreadySorted = 1;
   $smarty -> assign("T_TABLE_SIZE", $totalEntries);
   include("sorted_table.php");


/*			

			if ($currentEmployee -> isSupervisor()) {

				$supervisedEmployees = $currentEmployee -> getSupervisedEmployees();

				$supervisedEmployees[] = $currentEmployee -> login;

				$smarty -> assign("T_SUPERVISED_EMPLOYEES", $supervisedEmployees);

			}

			

			

			if ($currentEmployee -> isSupervisor()) {

				$sbranchesList = implode("','", $currentEmployee -> supervisesBranches);

				$exclude_admin_condition = " AND users.user_type != 'administrator'";

				$result = eF_getTableData("users JOIN (module_hcd_employee_has_job_description JOIN module_hcd_job_description ON module_hcd_employee_has_job_description.job_description_ID = module_hcd_job_description.job_description_ID JOIN module_hcd_branch ON module_hcd_job_description.branch_ID = module_hcd_branch.branch_ID JOIN module_hcd_employee_works_at_branch ON module_hcd_employee_works_at_branch.branch_ID = module_hcd_branch.branch_ID) ON users.login = module_hcd_employee_has_job_description.users_login", "distinct users.login, users.name, users.surname, users.pending, users.active, module_hcd_job_description.description, module_hcd_job_description.job_description_ID, module_hcd_branch.name as bname, module_hcd_job_description.branch_ID, module_hcd_employee_works_at_branch.supervisor", "users.archive = 0 AND users.active = 1 AND module_hcd_job_description.branch_ID IN ('". $sbranchesList ."') AND module_hcd_job_description.branch_ID = '". $currentBranch -> branch['branch_ID'] . "' AND  users.login = module_hcd_employee_works_at_branch.users_login AND users.login = module_hcd_employee_has_job_description.users_login " . $exclude_admin_condition ,"","");

			} else {

				$result = eF_getTableData("users JOIN (module_hcd_employee_has_job_description JOIN module_hcd_job_description  ON module_hcd_employee_has_job_description.job_description_ID = module_hcd_job_description.job_description_ID JOIN module_hcd_branch ON module_hcd_job_description.branch_ID = module_hcd_branch.branch_ID JOIN module_hcd_employee_works_at_branch ON module_hcd_employee_works_at_branch.branch_ID = module_hcd_branch.branch_ID) ON users.login = module_hcd_employee_has_job_description.users_login", "distinct users.login, users.name, users.surname, users.pending, users.active, module_hcd_job_description.description, module_hcd_job_description.job_description_ID, module_hcd_branch.name as bname, module_hcd_job_description.branch_ID, module_hcd_employee_works_at_branch.supervisor", "users.archive = 0 AND module_hcd_job_description.branch_ID = '". $currentBranch -> branch['branch_ID'] . "' AND  users.login = module_hcd_employee_works_at_branch.users_login AND users.login = module_hcd_employee_has_job_description.users_login" ,"","");

			}

			foreach ($result as $value) {

				$employees[$value['login']] = $value;

			}



			// Both roles are allowed to view all subbranches, if this is asked

			if ($_GET['showAllEmployees'] == 1) {

				$sbranchesList = implode("','", $currentBranch -> getAllSubbranches());

				$subbranches_employees = eF_getTableData("users JOIN (module_hcd_employee_has_job_description JOIN module_hcd_job_description  ON module_hcd_employee_has_job_description.job_description_ID = module_hcd_job_description.job_description_ID JOIN module_hcd_branch ON module_hcd_job_description.branch_ID = module_hcd_branch.branch_ID JOIN module_hcd_employee_works_at_branch ON module_hcd_employee_works_at_branch.branch_ID = module_hcd_branch.branch_ID) ON users.login = module_hcd_employee_has_job_description.users_login", "distinct users.login, users.name, users.surname, users.pending, users.active, module_hcd_job_description.description, module_hcd_job_description.job_description_ID, module_hcd_branch.name as bname, module_hcd_job_description.branch_ID, module_hcd_employee_works_at_branch.supervisor", "users.archive = 0 AND module_hcd_job_description.branch_ID IN ('". $sbranchesList ."') AND  users.login = module_hcd_employee_works_at_branch.users_login AND users.login = module_hcd_employee_has_job_description.users_login "  . $exclude_admin_condition ,"","");

				foreach ($subbranches_employees as $sub_employee) {

					$employees[$sub_employee['login']] = $sub_employee;

				}

			}





			$dataSource 	  = $employees;

			$tableName        = $_GET['ajax'];

			include("sorted_table.php");

*/
  }
  // Create ajax enabled table for employees
  if (isset($_GET['ajax']) && $_GET['ajax'] == 'branchJobsTable') {
   $constraints = array('archive' => false, 'active' => 1, 'return_objects' => false) + createConstraintsFromSortedTable();
         if ($currentEmployee -> isSupervisor()) {
    $supervisedEmployees = $currentEmployee -> getSupervisedEmployees(true);
    $supervisedEmployees[] = $currentEmployee -> login;
    $smarty -> assign("T_SUPERVISED_EMPLOYEES", $supervisedEmployees);
    if ($GLOBALS['configuration']['show_unassigned_users_to_supervisors']) {
           $employees = $currentBranch -> getBranchUsersIncludingUnattached($constraints);
           $totalEntries = $currentBranch -> countBranchUsersIncludingUnattached($constraints);
          } else {
           $employees = $currentBranch -> getBranchUsers($constraints);
           $totalEntries = $currentBranch -> countBranchUsers($constraints);
          }
         } else {
    $employees = $currentBranch -> getBranchUsersIncludingUnassigned($constraints);
    $totalEntries = $currentBranch -> countBranchUsersIncludingUnassigned($constraints);
         }
    if (!empty($employees)) {
    $dataSource = $currentBranch -> createEmployeeJobsHtml($employees);
    } else {
     $dataSource = array();
    }
   $tableName = $_GET['ajax'];
   $alreadySorted = 1;
   $smarty -> assign("T_TABLE_SIZE", $totalEntries);
   include("sorted_table.php");
/*			

			isset($_GET['limit']) && eF_checkParameter($_GET['limit'], 'uint') ? $limit = $_GET['limit'] : $limit = G_DEFAULT_TABLE_SIZE;



			if (isset($_GET['sort']) && eF_checkParameter($_GET['sort'], 'text')) {

				$sort = $_GET['sort'];

				isset($_GET['order']) && $_GET['order'] == 'desc' ? $order = 'desc' : $order = 'asc';

			} else {

				$sort = 'login';

			}



			if ($currentEmployee -> isSupervisor()) {

				$supervisedEmployees = $currentEmployee -> getSupervisedEmployees(true);

				$supervisedEmployees[] = $currentEmployee -> login;

				$smarty -> assign("T_SUPERVISED_EMPLOYEES", $supervisedEmployees);

			}



			$employees = $currentBranch -> getEmployeesWithJobs();//employees;

			$employees = $currentBranch -> getEmployeesIncludingUnassigned();//pr($employees);

			

			foreach ($employees as $key => $value) {

				if (!$value['active']) {

					unset($employees[$key]);

				} else if (!$GLOBALS['configuration']['show_unassigned_users_to_supervisors'] && !$value['job_description_ID'] && $currentEmployee -> isSupervisor()) {

					unset($employees[$key]);

				}

			}



			$employees = eF_multiSort($employees, $_GET['sort'], $order);



			if (isset($_GET['filter'])) {

				$employees = eF_filterData($employees, $_GET['filter']);

			}





			$smarty -> assign("T_EMPLOYEES_SIZE", sizeof($employees));



			if (isset($_GET['limit']) && eF_checkParameter($_GET['limit'], 'int')) {

				isset($_GET['offset']) && eF_checkParameter($_GET['offset'], 'int') ? $offset = $_GET['offset'] : $offset = 0;

				$employees = array_slice($employees, $offset, $limit);

			}



			if (!empty($employees)) {

				$employees = $currentBranch -> createEmployeeJobsHtml($employees);

			}



			if ($employees) {	// if false, then there are no job descriptions

				$smarty -> assign("T_EMPLOYEES", $employees);

			} else {

				$smarty -> assign("T_EMPLOYEES_SIZE", 0);

				$smarty -> assign("T_NOBRANCHJOBSERROR", 1);

			}



			$smarty -> display($_SESSION['s_type'].'.tpl');

			exit;

*/
  }
 }
 try {
  $target = basename($_SERVER['PHP_SELF'])."?ctg=module_hcd&op=branches&".(isset($_GET['add_branch']) ? "add_branch=1" : "edit_branch=".$_GET['edit_branch']);
  $form = new HTML_QuickForm("branch_form", "post", $target, "", null, true);
  $form -> registerRule('checkParameter', 'callback', 'eF_checkParameter'); //Register this rule for checking user input with our function, eF_checkParameter
  if ($_GET['edit_branch']) {
   $form -> addElement('static', 'sidenote', '<img src = "images/16x16/wizard.png" alt = "'._AUTOFILL.'" title = "'._AUTOFILL.'" class = "handle" onclick = "$(\'branch_url\').value = \''.EfrontBranch::getBranchUrl($currentBranch->branch['name']).'\'"/>');
   $form -> addElement('text', 'url', _ACCESSURL, 'class = "inputText" id = "branch_url"');
   $form -> addRule('url', _INVALIDFIELDDATA, 'checkParameter', 'alnum');
   if ($currentBranch -> branch['url']) {
    $form -> addElement('static', '', _THEBRANCHWILLBEACCESSIBLEWITHURL.' <b>'.G_SERVERNAME.$currentBranch -> branch['url'].'/</b>');
   } else {
    $form -> addElement('static', '', _IFYOUSPECIFYABRANCHURLTHEBRANCHWILLBEACCESSIBLEWITHURL.' <b>'.G_SERVERNAME.'&lt;'._ACCESSURL.'&gt;</b>');
   }
  }
  $form -> addElement('text', 'branch_name', _BRANCHNAME, 'class = "inputText"');
  $form -> addRule('branch_name', _THEFIELD.' "'._BRANCHNAME.'" '._ISMANDATORY, 'required', null, 'client');
  $form -> addRule('branch_name', _INVALIDFIELDDATA, 'checkParameter', 'text'); /*mandatory me if*/
  $form -> addElement('text', 'address', _ADDRESS, 'class = "inputText"');
  $form -> addElement('text', 'city', _CITY, 'class = "inputText"');
  $form -> addElement('text', 'country', _COUNTRY, 'class = "inputText"');
  $form -> addElement('text', 'telephone', _TELEPHONE, 'class = "inputText"');
  $form -> addElement('text', 'email', _EMAIL, 'class = "inputText"');
  if (isset($_GET['edit_branch'])) {
   $smarty -> assign("T_TABLE_OPTIONS", array(array('text' => _BRANCHSTATISTICS, 'image' => "16x16/reports.png", 'href' => basename($_SERVER['PHP_SELF'])."?ctg=statistics&option=branches&sel_branch=".$_GET['edit_branch'])));
   /* Set the link to the details of the father branch */
   $details_link = 'href="'.basename($_SERVER['PHP_SELF']).'?ctg=module_hcd&op=branches&edit_branch='.$currentBranch -> branch['father_branch_ID'].'"';
   $smarty -> assign("T_BRANCH_NAME", $currentBranch -> branch['name']);
   $form -> setDefaults(array( 'url' => $currentBranch -> branch['url'],
          'branch_name' => $currentBranch -> branch['name'],
          'address' => $currentBranch -> branch['address'],
          'city' => $currentBranch -> branch['city'],
          'country' => $currentBranch -> branch['country'],
          'telephone' => $currentBranch -> branch['telephone'],
          'email' => $currentBranch -> branch['email'],
          'themes_ID' => $currentBranch -> branch['themes_ID'],
          'languages_NAME' => $currentBranch -> branch['languages_NAME']));
   if (isset($_GET['ajax']) && $_GET['ajax'] == 'branchesTable') {
    $branches = $currentBranch -> getSubbranches();
    if ($_SESSION['s_type'] != "administrator") {
     foreach ($branches as $key => $branch) {
      if (!in_array($branch['branch_ID'], explode(",", $_SESSION['supervises_branches']))) {
       unset($branches[$key]);
      } else {
       $branches[$key]['supervisor'] = 1;
      }
     }
    }
    $dataSource = $branches;
    $tableName = $_GET['ajax'];
    include("sorted_table.php");
   }
   $smarty -> assign("T_JOB_DESCRIPTIONS", $currentBranch -> getJobDescriptions(true));
   $show_subbranches_activate = array(
   array('text' => _SHOWEMPLOYEESFROMSUBBRANCHES, 'image' => "16x16/question_type_one_correct.png", 'href' => 'javascript:void(0)', 'onClick' => "ajaxShowAllSubbranches();", 'target' => '_self')
   );
   $smarty -> assign ("T_SUBBRANCHES_LINK", $show_subbranches_activate);
  }
  // Variable used to forbid the appearance of the link appearing for the lense;
  $forbidden_link = "";
  /* Select or possible father branches (the ones this supervisor manages) or all (if user is administrator)*/
  if ($currentEmployee -> getType() == _SUPERVISOR) {
   $father_branches = eF_getTableData("module_hcd_branch", "branch_ID, name, father_branch_ID","branch_ID IN (" . implode(",",$currentEmployee -> supervisesBranches). ")", "father_branch_ID ASC,branch_ID ASC");
   // Show only existing branches
   $only_existing = 1;
   if ($currentBranch && !$currentEmployee -> supervisesBranch($currentBranch -> branch['father_branch_ID'])) {
    if ($currentBranch -> branch['father_branch_ID'] == 0) {
     $only_existing = 0;
    }
    $father_branches[] = array('branch_ID' => $currentBranch -> branch['father_branch_ID'],
             'name' => $currentBranch -> branch['father_name'],
             'father_branch_ID' => '');
    $forbidden_link = $currentBranch -> branch['father_branch_ID'];
   }
  } else {
   $father_branches = eF_getTableData("module_hcd_branch", "branch_ID, name, father_branch_ID", "", "father_branch_ID ASC,branch_ID ASC");
   // Show all branches
   $only_existing = 0;
  }
  if (!empty($father_branches)) {
   if (isset($_GET['edit_branch'])) {
    $fatherBranchId = $currentBranch -> branch['father_branch_ID'];
   }
   // If add_branch request coming from another branch subbranches menu, pre-enter the fatherBranch form
   if (isset($_GET['add_branch'])) {
    if ($currentEmployee -> getType() == _SUPERVISOR) {
     $_GET['add_branch_to'] = $father_branches[0]['branch_ID']; // keep the $_GET variable for checking at the smarty side
    }
    $form -> setDefaults(array( 'fatherBranch' => $_GET['add_branch_to']));
    $fatherBranchId = $_GET['add_branch_to'];
    $details_link = 'href="'.basename($_SERVER['PHP_SELF']).'?ctg=module_hcd&op=branches&edit_branch='.$_GET['add_branch_to'].'"';
   }
   if (!$details_link || !$fatherBranchId || ($_GET['add_branch'] && !$_GET['add_branch_to']) || $forbidden_link) {
    $handleVisibility = ' style="visibility:hidden"';
   }
   $handle = '<a id = "details_link" name = "details_link" '.$details_link.$handleVisibility.'><img src = "images/16x16/search.png" class = "handle" title="'._DETAILS.'" alt="'._DETAILS.'" ></a>';
   $form -> addElement('static', 'sidenote', $handle);
   $form -> addElement('select', 'fatherBranch' , _FATHERBRANCH, eF_createBranchesTreeSelect($father_branches, $only_existing),'class = "inputText"  id="fatherBranch" onchange="javascript:change_branch(\'fatherBranch\',\'details_link\',\''.$forbidden_link.'\')"');
  } else {
   $first_branch = 1;
  }
  $smarty -> assign("T_FATHER_BRANCH_ID", $fatherBranchId);
  $themes = array('' => _SELECTBRANCHTHEME);
  foreach (themes :: getAll("themes") as $value) {
   $themes[$value['id']] = $value['name'];
  }
  $languages = array('' => _SELECTBRANCHLANGUAGE) + EfrontSystem :: getLanguages(true);
  $form -> addElement('select', 'themes_ID', _THEME, $themes);
  $form -> addElement('select', 'languages_NAME', _LANGUAGE, $languages);
 } catch (Exception $e) {
  handleNormalFlowExceptions($e);
 }
 if ($_change_) {
  $form -> addElement('submit', 'submit_branch_details', _SUBMIT, 'class = "flatButton"');
 } else {
  $form -> freeze();
 }
 if ($form -> isSubmitted() && $form -> validate()) {
  $branch_content = array('name' => $form -> exportValue('branch_name'),
        'address' => $form -> exportValue('address'),
        'city' => $form -> exportValue('city'),
        'country' => $form -> exportValue('country'),
        'telephone'=> $form -> exportValue('telephone'),
        'email' => $form -> exportValue('email'),
        'themes_ID'=> $form -> exportValue('themes_ID'),
        'languages_NAME' => $form -> exportValue('languages_NAME'),
        'url' => $form->exportValue('url'));
  try {
   if (isset($_GET['add_branch'])) {
    $branch_content['url'] = EfrontBranch::getBranchUrl($branch_content['name']);
    if ($first_branch != 1) {
     $branch_content['father_branch_ID'] = $form -> exportValue('fatherBranch');
    }
    $currentBranch = EfrontBranch :: createBranch($branch_content);
    $message = _SUCCSSFULLYCREATEDBRANCH;
   } elseif (isset($_GET['edit_branch'])) {
    $branch_content['father_branch_ID'] = $form -> exportValue('fatherBranch');
    $currentBranch -> updateBranchData($branch_content);
    $message = _BRANCHDATAUPDATED;
   }
   eF_redirect(basename($_SERVER['PHP_SELF'])."?ctg=module_hcd&op=branches&edit_branch=".$currentBranch -> branch['branch_ID']."&message=". urlencode($message) . "&message_type=success");
   exit;
  } catch (EfrontBranchException $e) {
   handleNormalFlowExceptions($e);
  }
 }
 $smarty -> assign('T_BRANCH_FORM', $form -> toArray());
 $moduleTabs = array();
 foreach ($currentUser -> getModules() as $module) {
  if ($moduleTab = $module -> getTabSmartyTpl('branches')) {
   $moduleTabs[] = $moduleTab;
  }
 }
 $smarty -> assign("T_MODULE_TABS", $moduleTabs);
} else {
 if (isset($_GET['ajax']) && $_GET['ajax'] == 'branchesTable') {
  if ($_SESSION['s_type'] == "administrator") {
   $branches = eF_getTableData("(module_hcd_branch LEFT OUTER JOIN (module_hcd_employee_works_at_branch JOIN users ON module_hcd_employee_works_at_branch.users_LOGIN = users.login) ON module_hcd_branch.branch_ID = module_hcd_employee_works_at_branch.branch_ID AND module_hcd_employee_works_at_branch.assigned = '1') LEFT OUTER JOIN module_hcd_branch as branch1 ON module_hcd_branch.father_branch_ID = branch1.branch_ID GROUP BY module_hcd_branch.branch_ID ORDER BY branch1.branch_ID", "module_hcd_branch.branch_ID, module_hcd_branch.name, module_hcd_branch.city, module_hcd_branch.address,  sum(CASE WHEN users.active=1 THEN 1 END) as employees, sum(CASE WHEN users.active=0 THEN 1 END) as inactive_employees, branch1.branch_ID as father_ID, branch1.name as father, supervisor","");
  } else {
   $branches = eF_getTableData("(module_hcd_branch LEFT OUTER JOIN (module_hcd_employee_works_at_branch JOIN users ON module_hcd_employee_works_at_branch.users_LOGIN = users.login) ON module_hcd_branch.branch_ID = module_hcd_employee_works_at_branch.branch_ID AND module_hcd_employee_works_at_branch.assigned = '1') LEFT OUTER JOIN module_hcd_branch as branch1 ON module_hcd_branch.father_branch_ID = branch1.branch_ID WHERE module_hcd_branch.branch_ID IN (".$_SESSION['supervises_branches'].") GROUP BY module_hcd_branch.branch_ID ORDER BY branch1.branch_ID", "module_hcd_branch.name, module_hcd_branch.city, module_hcd_branch.address,  sum(CASE WHEN users.active=1 THEN 1 END) as employees, sum(CASE WHEN users.active=0 THEN 1 END) as inactive_employees,  module_hcd_branch.branch_ID, branch1.branch_ID as father_ID, branch1.name as father, 1 as supervisor", "");
  }
  $dataSource = $branches;
  $tableName = $_GET['ajax'];
  include("sorted_table.php");
 }
}
