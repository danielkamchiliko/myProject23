<!DOCTYPE html>
<html>
    <head>
        <title>student registration form</title>
    </head>
    <body>
  

<div>
  <!--Student Registration Form-->
  <hr><h1>Student Registration Form</h1><hr><br>
  <form action="studentreg.php" method="post">
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname"><br>
    <label for="dob">Date of Birth:</label><br>
  <input type="text" id="dob" name="dob"><br>
  <label for="sex">Sex:</label><br>
  <input type="text" id="sex" name="sex"><br>
  <label for="program">Program:</label><br>
  <input type="text" id="program" name="program"><br>
  <label for="studentid">student id:</label><br>
  <input type="text" id="studentid" name="studentid"><br>
  <input type="submit" name="submit" value="submit">
</form>
</div>

<!--PHP Code-->
<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$db         = "student_registry";
$connection = new mysqli($servername, $username, $password, $db);


//checking connection
if(!$connection){
    echo die(mysqli_error($connection));
  }


?>


<?php

if(isset($_POST['submit'])){
    $first_name          = $_POST['fname'];
    $last_name           = $_POST['lname'];
    $date_of_birth       = $_POST['dob'];
    $sex                 = $_POST['sex'];
    $program             = $_POST['program'];
    $student_id          = $_POST['studentid'];

         /*inserting data*/
      $student_query = "INSERT INTO student_form (first_name, last_name, dob,
       sex, program, student_id) VALUES('$first_name','$last_name', '$date_of_birth ', 
                                                    $sex ', '$program', '$student_id')"; 
                           
       $result = mysqli_query($connection, $student_query);
      if($result){
        echo "<script>alert('You have successfully registered ..!')</script>";
      }
    }
    
else{
  echo " <p><strong>Registration failed</strong></p>";
}

?>


<div>
<hr>
<H1>Data Fetched From Database</H1><hr>

<ol>

<?php
//fetching data from the database
$select_query = "SELECT *  FROM student_form";
                    $result_select= mysqli_query($connection, $select_query);

                    while($row_data = mysqli_fetch_assoc($result_select)){
                        $first_name = $row_data['first_name'];
                        $last_name = $row_data['last_name'];
                        $date_of_birth = $row_data['dob'];
                        $sex = $row_data['sex'];
                        $program = $row_data['program'];
                        $student_id = $row_data['student_id'];

                        //Displaying the data fetched the database table "student_form"

                        echo "<option value='$first_name'>$first_name</option>";
                        echo "<option value='$last_name'>$last_name</option>";
                        echo "<option value='$date_of_birth'>$date_of_birth</option>";
                        echo "<option value='$sex'> $sex</option>";
                        echo "<option value='$program'> $program</option>";
                        echo "<option value='$student_id'> $student_id</option><hr><br><hr>";

                        
                    }
                    


?>
</ol>
</div>



    </body>
</html>