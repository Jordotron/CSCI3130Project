<?php 
    include 'dbc.php';
    page_protect();
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

        <title>My Account</title>

        <link href="styles.css" rel="stylesheet" type="text/css">
        <link href="main.css" rel="stylesheet" type="text/css">

        <script src="js/script.js" type="text/javascript"></script>
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
                    if (isset($_SESSION['user_id'])) {
                        ?>
                        <div class="myaccount">
                            <p><strong>My Account</strong></p>

                            <a href="myaccount.php">My Account</a><br>
                            <a href="mysettings.php">Settings</a><br>
                            <a href="logout.php">Logout </a>
                  
                            <p>You can add more links here for users</p>
                        </div>
                        <?php 
                    }
                    if (checkAdmin()) {
                    /*******************************END**************************/
                        ?>
                        <p><a href="admin.php">Admin CP</a></p>
                        <?php 
                    } 
                ?>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                </td>

                <td width="732" valign="top" id="insert_here"><p>&nbsp;</p>
                    <h3 class="titlehdr">Welcome <?php echo $_SESSION['user_name'];?></h3>  
                    <?php 
                        /*
                        echo '<pre>';
                        var_dump($_SESSION);
                        echo '</pre>';
                        */

                        if (isset($_GET['msg'])) {
                            echo "<div class=\"error\">$_GET[msg]</div>";
                        }
                    ?>

                    <p>This is the my account page</p>

                    <form  method="post" id="course_add" action="#">
                        <input type="text" id="form_course_name" name="form_course_name" placeholder="Course Name"><br>
                        <?php 
                            if (empty($_POST['form_course_name'])) {
                                $course_name_status = false;
                            } else {
                                $message = "A user has added the following course data: \n";
                                $message .= "Course Name: ".$_POST['form_course_name']."\n";
                                $course_name = $_POST['form_course_name'];
                                $course_name_status = true;
                            }
                        ?>
                  
                        <select id="form_course_code" name="form_course_code">
                            <option value="CSCI">CSCI</option>
                            <option value="MATH">MATH</option>
                            <option value="CHEM">CHEM</option>
                            <option value="STAT">STAT</option>
                        </select>
                        <?php 
                            if (empty($_POST['form_course_code'])) {
                                $course_code_status = false;
                            } else {
                                $message .= "Course Code: ".$_POST['form_course_code'];
                                $course_program = $_POST['form_course_code'];
                                $course_code_status = true;
                            }
                        ?>

                        <input type="text" id="form_course_number" name="form_course_number" placeholder="Course Number"><br>
                        <?php 
                            if (empty($_POST['form_course_number'])) {
                                $course_number_status = false;
                            } else {
                                $message .= " ".$_POST['form_course_number']."\n";
                                $course_number = $_POST['form_course_number'];
                                $course_number_status = true;
                            }
                        ?>

                        <input type="text" id="form_course_start_time" name="form_course_start_time" placeholder="Course Start Time"><br>
                        <?php 
                            if (empty($_POST['form_course_start_time'])) {
                                $course_start_time_status = false;
                            } else {
                                $message .= "Start Time: ".$_POST['form_course_start_time']."\n";
                                $start_time = $_POST['form_course_start_time'];
                                $course_start_time_status = true;
                            }
                        ?>

                        <input type="text" id="form_course_duration" name="form_course_duration" placeholder="Course Duration (min)"><br>
                        <?php 
                            if (empty($_POST['form_course_duration'])) {
                                $course_duration_status = false;
                            } else {
                                $message .= "Duration: ".$_POST['form_course_duration']."\n";
                                $duration = $_POST['form_course_duration'];
                                $course_duration_status = true;
                            }
                        ?>

                        <input type="submit" id="form_course_add_button" id="course_add_button" value="Add Course" onclick="addCourse()">
                        <?php 
                            if($course_name_status === true && $course_code_status === true && $course_number_status === true && $course_start_time_status === true && $course_duration_status === true){
                                $to = $_SESSION['user_email'];
                                $subject = "Website Message";
                                $user_id = $_SESSION['user_id'];
                                mail($to, $subject, $message);
                                echo "Email sent.";
                                $sql_insert = "INSERT into `courses` (`user_id`,`course_name`,`course_program`,`course_number`,`start_time`,`duration`)
                                    VALUES('$user_id','$course_name','$course_program','$course_number','$start_time','$duration')";
                                mysql_query($sql_insert,$link) or die("Insertion Failed:" . mysql_error());
                            } else {
                                echo "Email not sent.";
                            }
                        ?>
                    </form>

                    <button type="button" class="show_button" id="show_button" onclick="show()">+</button>
                    <div id="insert_before"></div>
                </td>
                <td width="196" valign="top">&nbsp;</td>
            </tr>
            <tr> 
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td width="160" valign="top">&nbsp;</td>
                <td width="732" valign="top">
                    <?php
                        $result = mysql_query("SELECT * FROM courses WHERE user_id = ".$_SESSION['user_id'].";");
                        if (mysql_num_rows($result) > 0) {
                            // Print a table that holds all of the user's courses
                            echo "<table border='1'>
                            <tr>
                            <th>Course Name</th>
                            <th>Course ID</th>
                            <th>Start Time</th>
                            <th>Duration</th>
                            </tr>";

                            while ($row = mysql_fetch_array($result)) {
                                echo "<tr><td>".$row['course_name']."</td><td>".$row['course_program']." ".$row['course_number']."</td><td>".$row['start_time']."</td><td>".$row['duration']."</td></tr>";
                            }
                            echo "</table>";
                        } else {
                            // The user has no courses registered, so don't show the table.
                            echo "No courses registered.";
                        }
                    ?>
                </td>
                <td width="196" valign="top">&nbsp;</td>
            </tr>
        </table>
    </body>
</html>
