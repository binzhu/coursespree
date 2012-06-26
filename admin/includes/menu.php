<?php
$menu = array(
	array(	
		"title" => "Admin Home",
		"page" => "index.php",
		"link" => "direct",
		'sub' => array(
			array(	
				"title" => "My Account",
				"page" => "myaccount.php",
				"link" => "direct"
			),
		),
	),
	
	array(
		"title" => "Manage Pages",
		"table" => "pages",
		"custom_sql" => "SELECT *, DATE_FORMAT(dated, '%d %b, %Y %H:%i:%s') as dated FROM `".DB_PREFIX."pages`",
		"page" => "page.php",
		'fields' => array('title' => 'Title', 'slug' => 'Slug', 'dated' => 'Date'),
		'sub' => array(
			array(
				"title" => "List Pages",
				"table" => "pages",
				"page" => "page.php",
				"custom_sql" => "SELECT *, DATE_FORMAT(dated, '%d %b, %Y') as dated FROM `".DB_PREFIX."pages`",
				'fields' => array('title' => 'Title', 'slug' => 'Slug', 'dated' => 'Date'),
			),
			array(	
				"title" => "Add Page",
				"page" => "page.php",
				"link" => "direct"
			),
		),
	),
	
	array(
		"title" => "Manage Users",
		"table" => "users",
		"custom_sql" => "SELECT *, CONCAT(fName,' ',lName) as fullName, DATE_FORMAT(dated, '%d %b, %Y %H:%i:%s') as dated FROM `".DB_PREFIX."users`",
		"page" => "user.php",
		'fields' => array('fullName' => 'Name', 'userName' => 'User Name', 'email' => 'Email', 'dated' => 'Joined on'),
		'sub' => array(
			array(
				"title" => "List Users",
				"table" => "users",
				"page" => "user.php",
				"custom_sql" => "SELECT *, CONCAT(fName,' ',lName) as fullName, DATE_FORMAT(dated, '%d %b, %Y %H:%i:%s') as dated FROM `".DB_PREFIX."users`",
				'fields' => array('fullName' => 'Name', 'userName' => 'User Name', 'email' => 'Email', 'dated' => 'Joined on'),
			),
			array(	
				"title" => "Add User",
				"page" => "user.php",
				"link" => "direct"
			),
		),
	),
	
	
	array(
		"title" => "Manage Questions",
		"table" => "questions",
		"custom_sql" => "SELECT q.*, DATE_FORMAT(q.dated, '%d %b, %Y %H:%i:%s') as dated, qc.name as catName, CONCAT(u.fName,' ',u.lName) as userName FROM `".DB_PREFIX."questions` q LEFT JOIN `".DB_PREFIX."users` u ON(q.userID=u.id) LEFT JOIN `".DB_PREFIX."question_categories` qc ON(q.catID=qc.id)",
		"page" => "question.php",
		'fields' => array('caption' => 'Caption', 'userName' => 'User Name', 'catName' => 'Category', 'tags' => 'Tags', 'status' => 'Status', 'dated' => 'Created on'),
		'sub' => array(
			array(
				"title" => "Categories",
				"table" => "question_categories",
				"custom_sql" => "SELECT * FROM `".DB_PREFIX."question_categories`",
				"page" => "question_category.php",
				'fields' => array('name' => 'Name')
			),
			array(
				"title" => "Open Questions",
				"table" => "questions",
				"custom_sql" => "SELECT q.*, DATE_FORMAT(q.dated, '%d %b, %Y %H:%i:%s') as dated, qc.name as catName, CONCAT(u.fName,' ',u.lName) as userName FROM `".DB_PREFIX."questions` q LEFT JOIN `".DB_PREFIX."users` u ON(q.userID=u.id) LEFT JOIN `".DB_PREFIX."question_categories` qc ON(q.catID=qc.id) WHERE status='open'",
				"page" => "question.php",
				'fields' => array('caption' => 'Caption', 'userName' => 'User Name', 'catName' => 'Category', 'tags' => 'Tags', 'status' => 'Status', 'dated' => 'Created on')
			),
			array(
				"title" => "Closed Questions",
				"table" => "questions",
				"custom_sql" => "SELECT q.*, DATE_FORMAT(q.dated, '%d %b, %Y %H:%i:%s') as dated, qc.name as catName, CONCAT(u.fName,' ',u.lName) as userName FROM `".DB_PREFIX."questions` q LEFT JOIN `".DB_PREFIX."users` u ON(q.userID=u.id) LEFT JOIN `".DB_PREFIX."question_categories` qc ON(q.catID=qc.id) WHERE status='closed'",
				"page" => "question.php",
				'fields' => array('caption' => 'Caption', 'userName' => 'User Name', 'catName' => 'Category', 'tags' => 'Tags', 'status' => 'Status', 'dated' => 'Created on')
			),
			array(	
				"title" => "Add Question",
				"page" => "question.php",
				"link" => "direct"
			),
		),
	),
	
	
	array(
		"title" => "Other Settings",
		"page" => "#",
		"link" => "direct",
		'sub' => array(
			array(
				"title" => "Countries",
				"table" => "countries",
				"page" => "countries.php",
				'fields' => array('name' => 'Name'),
			),
			
			array(
				"title" => "States",
				"table" => "states",
				"page" => "states.php",
				"custom_sql" => "SELECT s.*, c.name as countryName FROM `".DB_PREFIX."states` s LEFT JOIN `".DB_PREFIX."countries` c ON(s.countryID=c.id)",
				'fields' => array('name' => 'Name', 'countryName' => 'Country'),
			),
			
			array(
				"title" => "Schools",
				"table" => "schools",
				"page" => "schools.php",
				"custom_sql" => "SELECT sc.*, s.name as stateName, c.name as countryName FROM `".DB_PREFIX."schools` sc LEFT JOIN `".DB_PREFIX."states` s ON(sc.stateID=s.id) LEFT JOIN `".DB_PREFIX."countries` c ON(s.countryID=c.id)",
				'fields' => array('name' => 'Name', 'stateName' => 'State', 'countryName' => 'Country'),
			),
			
			array(
				"title" => "Departments",
				"table" => "departments",
				"page" => "departments.php",
				'fields' => array('name' => 'Name'),
			),
			
			array(
				"title" => "Courses",
				"table" => "courses",
				"page" => "courses.php",
				'fields' => array('name' => 'Name'),
			),
			
			array(
				"title" => "Professors",
				"table" => "professors",
				"page" => "professors.php",
				"custom_sql" => "SELECT p.*, cr.name as courseName FROM `".DB_PREFIX."professors` p LEFT JOIN `".DB_PREFIX."courses` cr ON(p.courseID=cr.id)",
				'fields' => array('name' => 'Name', 'courseName' => 'Course'),
			),
			
			array(
				"title" => "Document Types",
				"table" => "docTypes",
				"page" => "docTypes.php",
				'fields' => array('name' => 'Name'),
			),
		),
	),
);
?>
