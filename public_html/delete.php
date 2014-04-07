<?php
	include 'dbc.php';
    page_protect();
    /*
    This function is used to delete a user selected course from the course table.
	*/
	if(isset($_POST['delete_id']) && !empty($_POST['delete_id'])) {
		$delete_id = mysql_real_escape_string($_POST['delete_id']);
		mysql_query("DELETE FROM courses WHERE course_id = '".$delete_id."';");
		header('Location: myaccount.php');
	}
?>