<?php
// e-Tutor is licensed under the GPL. Please see the LICENSE file for more
// information.

/*
classes.php

Class definitions for User and Course objects

written Feb. 18th-25th, 2002 by Markus Svilans
*/

//class to store course information
class Course {
	var $ID;
	var $code;
	var $sections;
	var $section;
	var $title;
	var $isTA;  //tag if user is TA in this course. true means yes, false means no. (this tag is always true for professors)
	var $exists;
	
	function Course($row) { //constructor
		
		//set tag to false, indicating that the course contained in this object does
		//not exist in the database (this tag might get set to true later on in, if the
		//$row variable refers to an existing course)
		$this->exists = false;
		
		//define a fake database row
		$fake_row = array('ID'=>'','code'=>'','sections'=>'','title'=>'');

		//the code block comprised of this if statement loads the $row variable with values
		//these values will be used in further initialization of the User object
		if (func_num_args() == 0) //if zero arguments were passed
			//create a fake empty database row
			$row = $fake_row;
		else { //otherwise if something was passed
			$row = func_get_arg(0); //use first argument as $row
			if ($row) { //if an initialized variable was passed
				if (is_numeric($row)) { //if $row is a number, then user is trying to initialize the user object with a course ID number
					//thus we have to get the row out of the database by ourselves
					$result = @mysql_query("SELECT * FROM courses WHERE ID='$row'") or die(mysql_error());
					if (mysql_num_rows($result)) { //if any rows were retrieved
						$row = mysql_fetch_array($result); //use first retrieved row
						$this->exists = true;
					} else $row = $fake_row; //if no rows were returned, use fake row
				}
			} else $row = $fake_row; //otherwise use a fake database row for $row
		}
		$this->ID = $row['ID'];
		$this->code = $row['code'];
		$this->sections = split(',', $row['sections']);
		$this->section = ''; //this property is only loaded by the User object's constructor function (user's section in this course).
		$this->title = $row['title'];
	}
}


//class definition to store information about users
class User {
	var $ID;
	var $stnum;
	var $fn;
	var $ln;
	var $email;
	var $courses; //array which will hold Course objects, containing info for user's courses
	var $sections; //hash array where key is course ID, and value is an array of all sections the user is part of for that course
	var $username;
	var $password;
	var $account;
	var $hasTACourses; //is true if user is a TA for any of the courses in his course array
	
	
	//examples of calling syntax for constructor:
	//$x = new User($row)  - makes $x a User object populated with data from database row $row
	//$x = new User()      - creates an empty User object
	function User() { //constructor
		
		//define a fake database row
		$fake_row = array('ID'=>'','stnum'=>'','fn'=>'','ln'=>'','courseID'=>'','sections'=>'','email'=>'','username'=>'','password'=>'','account'=>'');

		//the code block comprised of this if statement loads the $row variable with values
		//these values will be used in further initialization of the User object
		if (func_num_args() == 0) //if zero arguments were passed
			//create a fake empty database row
			$row = $fake_row;
		else { //otherwise if something was passed
			$row = func_get_arg(0); //use first argument as $row
			if ($row) { //if an initialized variable was passed
				if (is_numeric($row)) { //if $row is a number, then user is trying to initialize the user object with a user ID number
					//thus we have to get the row out of the database by ourselves
					$result = @mysql_query("SELECT * FROM user WHERE ID='$row'") or die(mysql_error());
					if (mysql_num_rows($result)) //if any rows were retrieved
						$row = mysql_fetch_array($result); //use first retrieved row
					else $row = $fake_row; //if no rows were returned, use fake row
				}
			} else $row = $fake_row; //otherwise use a fake database row for $row
		}
		
		$this->ID = $row['ID'];
		$this->stnum = $row['stnum'];
		$this->fn = $row['fn'];
		$this->ln = $row['ln'];

		$this->email = $row['email'];
		$this->username = $row['username'];
		$this->password = $row['password'];
		$this->account = $row['account'];
		
		$this->courses = array();
		$this->sections = array();
		
		if ($this->account == 'pr') //if user is a prof
			$this->hasTACourses = 1; //then indicate that user has TA privileges

		$courses = split(',', $row['courseID']);
		$sections = split(',', $row['sections']);

		//construct where statement
		$nc = count($courses);
		$where = '';
		for ($i = 0; $i < $nc; $i++) {
			$ta = 0; //set ta flag to false
			$x = $courses[$i];
			if (strchr($x, '*')) { //if there is a * in the course code, indicating user is a TA for this course
				$x = substr($x, 0, strlen($x) - 1); //trim * from end of string
				$courses[$i] = $x;
				$ta = 1; //set ta flag to true
			}
			$this->add_course($x, $sections[$i], $ta);
		}
	}
	
	
	
	//returns the Course object whose ID matches $course_id
	function get_course_by_id($course_id) {
		foreach ($this->courses as $x) //loop thru all courses in user object
			if ($x->ID == $course_id) //if this course's ID matches specified ID
				return $x; //return course object of found course
		return false; //return false if the user doesn't have the course
	}	



	//returns the Course object whose ID and section matches $course_id and $section
	function get_course($course_id, $section) {
		foreach ($this->courses as $x) //loop thru all courses in user object
			if ($x->ID == $course_id && $x->section == $section) //if this course's ID matches specified ID
				return $x; //return course object of found course
		return false; //return false if the user doesn't have the course
	}




	//saves the user's information into the database
	function save() {
		$courses = ''; //course list
		$sections = ''; //section list
		
		//perpare lists of courses and sections, comma separated, to be written to database
		for($i = 0; $i < count($this->courses); $i++) {
			$courses .= $this->courses[$i]->ID;
			$sections .= $this->courses[$i]->section;
			//if user is TA in this course, then stick a * after course ID
			//(doesn't put a * if user is a professor, because professors by default get TA access to courses anyway)
			if ($this->courses[$i]->isTA && $this->account != 'pr') $courses .= '*';
			if ($i < count($this->courses) - 1) { //if it's not the last course, then append a comma
				$courses .= ',';
				$sections .= ',';
			}
		}

		//N.B. THAT ONLY MINIMAL ERROR CHECKS ARE PERFORMED WHEN WRITING USERS TO DATABASE
		//(more should be added in the future to make this safer)
		
		//if none of the required field are blank then we can write the information to the database
		if (($this->account == 'pr' || ($this->account != 'pr' && $this->stnum != '')) && $this->fn != '' && $this->ln != '' && $this->username != '' && $this->password != '') {
			//look up user in database:
			$result = @mysql_query("SELECT * FROM user WHERE ID='" . $this->ID . "'") or die(mysql_error());

			if (mysql_num_rows($result)) //if any rows were turned up, then the users already exists and we can just UPDATE
				$result = @mysql_query("UPDATE user SET stnum='$this->stnum', fn='$this->fn', ln='$this->ln', courseID='$courses', sections='$sections', email='$this->email', username='$this->username', password='$this->password', account='$this->account' WHERE ID='$this->ID'") or die(mysql_error());

			//otherwise if user was not found in database, we need to INSERT
			//(i.e. this user object was not loaded by calling load_user())
			else
				$result = @mysql_query("INSERT INTO user SET stnum='$this->stnum', fn='$this->fn', ln='$this->ln', courseID='$courses', sections='$sections', email='$this->email', username='$this->username', password='$this->password', account='$this->account'") or die(mysql_error());

			return true; //indicate successful write operation
		} else return false; //indicate failure of write operation
	}
	
	
	
	
	//deletes the user form the database
	function delete() {
		//delete user's database row
		return @mysql_query("DELETE FROM user WHERE ID='$this->ID'") or die(mysql_error());
	}
	
	
	
	//adds a course to user's list of courses
	//$course_id -- course ID
	//$section   -- course section to which user belongs
	//$isTA      -- true/false tag that indicates if user is a TA for this course
	function add_course($course_id, $section, $isTA) {
		$x = $this->get_course($course_id, $section); //attempt to find out if the user is part of this course section already
		if (is_object($x)) //if an object was returned by the previous line (i.e. the course was found)
			return false; //then return false (and do nothing)
		$temp = new Course($course_id);

		if ($temp->exists) { //if the course we attempted to add exists
			$cc = count($this->courses);
			
			$this->courses[$cc] = $temp; //copy temp object into stored array
			
			if ($this->account == 'pr' || $isTA) { //if user is a prof, or $isTA is true
				//print "$course_id - is TA<BR>";
				$this->courses[$cc]->isTA = 1;
			} else {
				//print "$course_id - is not TA<BR>";
				$this->courses[$cc]->isTA = 0; //otherwise set tag to false
			}
			
			if ($isTA)
				$this->hasTACourses = 1;
			
			$this->courses[$cc]->section = $section;
			$this->sections[$course_id][count($this->sections[$course_id])] = $section;
			sort($this->sections[$course_id], $SORT_STRING); //sort sections
		}
		return true; //return true to indicate that course was successfully added to course list
	}
	
	
	
	
	//removes a course form the user's course list
	function remove_course($course_id, $section) {
	
		$nc = count($this->courses); //get # of courses in user's course list
	
		if ($section == '*') { //if we want to remove all course sections from course list
			
			$count = 0; //counter to keep track of how many sections were removed
			
			for ($i = 0; $i < $nc; $i++)
				//if course $i in course list matches the one we want to delete
				if ($this->courses[$i]->ID == $course_id) {
					array_splice($this->courses, $i, 1); //remove it from the array
					$count++;
				}
				
			if ($count)
				return true; //if any sections were removed then return true, indicating success
			else
				return false; //otherwise return false (failure)
				
		} else { //otherwise if we want to erase a specific section of a course

			for ($i = 0; $i < $nc; $i++)
				if ($this->courses[$i]->ID == $course_id && $this->courses[$i]->section == $section) {
					array_splice($this->courses, $i, 1);   //remove it from the array
					return true;
				}

			return false; //if course was not found in user's course list, then return false indicating failure
		}
	}
	
	
	//removes all courses from user object
	function remove_all_courses() {
		$this->courses = array();
		$this->sections = array();
	}
	
	
	//returns true if the user has the specified course/section
	//otherwise returns false
	function has_course($course_id, $section) {
		$temp = $this->get_course($course_id, $section);
		if ($temp) return 1;
		else return 0;
	}
	
} //end User class definition

?>
