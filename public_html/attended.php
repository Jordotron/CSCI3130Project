<?php
	include 'dbc.php';
    page_protect();
    /*
    This function is used to increase the amount of days attended in a user selected course from the course table.
	*/
	if(isset($_POST['attended_id']) && !empty($_POST['attended_id'])) {
		$attended_id = mysql_real_escape_string($_POST['attended_id']);
		$previous_attended_data = mysql_query("SELECT * FROM courses WHERE course_id = '".$attended_id."';");
		while ($row = mysql_fetch_array($previous_attended_data)){
			$previous_attended_num = $row['attended'];
		}
		$newNum = $previous_attended_num + 1;
		mysql_query("UPDATE courses SET attended = '$newNum' WHERE course_id = '".$attended_id."';");
		header('Location: myaccount.php');
	}
?>