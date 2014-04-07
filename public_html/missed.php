<?php
	include 'dbc.php';
    page_protect();
    /*
    This function is used to increase the amount of days missed in a user selected course from the course table.
	*/
	if(isset($_POST['missed_id']) && !empty($_POST['missed_id'])) {
		$missed_id = mysql_real_escape_string($_POST['missed_id']);
		$previous_missed_data = mysql_query("SELECT * FROM courses WHERE course_id = '".$missed_id."';");
		while ($row = mysql_fetch_array($previous_missed_data)){
			$previous_missed_num = $row['missed'];
		}
		$newNum = $previous_missed_num + 1;
		mysql_query("UPDATE courses SET missed = '$newNum' WHERE course_id = '".$missed_id."';");
		header('Location: myaccount.php');
	}
?>