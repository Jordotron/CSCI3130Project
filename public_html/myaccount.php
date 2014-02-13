<?php 
include 'dbc.php';
page_protect();


?>
<html>
<head>
<title>My Account</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script src="js/script.js" type="text/javascript"></script>
<link href="styles.css" rel="stylesheet" type="text/css">
<link href="main.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="5" class="main">
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr> 
    <td width="160" valign="top">
<?php 
/*********************** MYACCOUNT MENU ****************************
This code shows my account menu only to logged in users. 
Copy this code till END and place it in a new html or php where
you want to show myaccount options. This is only visible to logged in users
*******************************************************************/
if (isset($_SESSION['user_id'])) {?>
<div class="myaccount">
  <p><strong>My Account</strong></p>
  <a href="myaccount.php">My Account</a><br>
  <a href="mysettings.php">Settings</a><br>
    <a href="logout.php">Logout </a>
	
  <p>You can add more links here for users</p></div>
<?php }
if (checkAdmin()) {
/*******************************END**************************/
?>
      <p> <a href="admin.php">Admin CP </a></p>
	  <?php } ?>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    <td width="732" valign="top" id="insert_here"><p>&nbsp;</p>
      <h3 class="titlehdr">Welcome <?php echo $_SESSION['user_name'];?></h3>  
	  <?php	
      if (isset($_GET['msg'])) {
	  echo "<div class=\"error\">$_GET[msg]</div>";
	  }
	  	  
	  ?>
      <p>This is the my account page</p>
	  <form id="course_add">
		<input type="text" id="form_course_name" placeholder="Course Name"><br>
		<select id="form_course_code">
			<option value="CSCI">CSCI</option>
			<option value="MATH">MATH</option>
			<option value="CHEM">CHEM</option>
			<option value="STAT">STAT</option>
		</select>
		<input type="text" id="form_course_number" placeholder="Course Number"><br>
		<input type="text" id="form_course_start_time" placeholder="Course Start Time"><br>
		<input type="text" id="form_course_duration" placeholder="Course Duration (min)"><br>
		<button type="button" id="form_course_add_button" id="course_add_button" onclick="addCourse()">Add</button>
	  </form>
	  <button type="button" class="show_button" id="show_button" onclick="show()">+</button>
	  <div id="insert_before"></div>
		

	 
      </td>
    <td width="196" valign="top">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
</table>

</body>
</html>
