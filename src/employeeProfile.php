<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<?php
/*
References
https://www.youtube.com/watch?v=J5RHnJCy8AE
*/
session_start();
$connection = mysqli_connect('dijkstra.ug.bcc.bilkent.edu.tr', 'ege.marasli', '8nhmQrdt', 'ege_marasli');

if(! $connection)
{
    die('Connection Error!!! ' . mysqli_error());
}

$userType = $_SESSION['UserType'];
if($userType == "company"){
  $userID = $_SESSION['employeeID'];
}

else {
  $userID = $_SESSION['userID'];
}

$query = "SELECT * FROM user WHERE userID = '$userID'";
$result = $connection-> query($query);

if($result -> num_rows == 1)
{
	$userInfo = $result->fetch_assoc();
}

// Query to access employee based information
$query = "SELECT * FROM employee WHERE employeeID = '$userID'";
$result = $connection-> query($query);

if($result -> num_rows == 1)
{
	$employeeInfo = $result->fetch_assoc();
}

?>

<html>
	<head>
		<title>Employee Profile</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

		<style>
			form {
				text-align: center;
			}
		</style>
	</head>

	<body class="is-preload landing">
		<header id="header">
			<h1 id="logo"><a href="home_page.php"></a></h1>
			<nav id="nav">
				<ul>
					<li><a href="home_page.php" class ="button primary">Home</a></li>
          <?php
            $type = $_SESSION['UserType'];
            if($type =="employee"){
              echo "<li><a href=\"companyList.php\" class =\"button primary\">Companies</a></li>";
              echo "<li><a href=\"myReviewList.php\" class =\"button primary\">My Reviews</a></li>";
              echo "<li><a href=\"allJobsList.php\" class =\"button primary\">Jobs</a></li>";
              echo "<li><a href=\"allProjectList.php\" class =\"button primary\">Projects</a></li>";
            }
            else {
              echo "<li><a href=\"companyProfile.php\">Profile</a></li>";
            }
          ?>

					<li><a href="index.php" class ="button primary">Logout</a></li>

				</ul>
			</nav>
		</header>
		<section>
			<h3>My Profile</h3>
			<h4>Details</h4>
			<img src="images/tayyip.jpg" alt="">
			<div class="table-wrapper">
				<table>
					<thead>
						<tr>
							<th></th>
							<th></th>

						</tr>
					</thead>
					<tbody>
						<tr>
							<td>First Name</td>
							<td class ="test" name = "first_name" id="first_name"><?php echo  $employeeInfo['first_name']; ?></td>
						</tr>
						<tr>
							<td>Middle Name</td>
							<td class ="test" name = "middle_name" id="middle_name"><?php echo  $employeeInfo['middle_name']; ?></td>
						</tr>
						<tr>
							<td>Last Name</td>
							<td class ="test" name = "last_name" id="last_name"><?php echo  $employeeInfo['last_name']; ?></td>
						</tr>
						<tr>
							<td>Gender</td>
							<td class ="test" name = "gender" id="gender"><?php echo  $employeeInfo['gender']; ?></td>
						</tr>
						<tr>
							<td>Position</td>
							<td class ="test" name = "position" id="position"><?php echo  $employeeInfo['position']; ?></td>
						</tr>
						<tr>
							<td>Highest Education</td>
							<td class ="test" name = "highest-ed" id="highest-ed"><?php echo  $employeeInfo['highest_education']; ?></td>
						</tr>
						<tr>
							<td>Location</td>
							<td class ="test" name = "location" id="location"><?php echo  $employeeInfo['Location']; ?></td>
						</tr>
						<tr>
							<td>Phone Number 1</td>
							<td class ="test" name = "phone1" id="phone1"><?php echo  $userInfo['phone_number1']; ?></td>
						</tr>
						<tr>
							<td>Phone Number 2</td>
							<td class ="test" name = "phone2" id="phone2"><?php echo  $userInfo['phone_number2']; ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td class ="test" name = "email" id="email"><?php echo  $userInfo['mail']; ?></td>
						</tr>
            <?php
                if ($type == "employee") {
                  echo "<tr><td>Password</td><td class =\"test\" name =\"password\" id=\"password\">".$userInfo['password']."</td></tr>";
               }
             ?>
					</tbody>

				</table>
        <div>
         Resume	<textarea name="resume" id="resume" rows="6" cols="20"><?php echo $employeeInfo['resume']  ?></textarea>
       </div>
			</div>

     <?php

      if ($type == "employee") {
        echo "<a href=\"appliedJob.php\" class=\"button primary\" style=\"text-align:center\">Applied Jobs</a>
         <a href=\"#\" class=\"button primary\" style=\"text-align:center\">My Projects</a>
         <a href=\"following.php\" class=\"button primary\" style=\"text-align:center\">Followed Companies</a>
         <a href=\"myReviewList.php\" class=\"button primary\" style=\"text-align:center\">My Reviews</a> 
         <a href=\"editEmployeeProfile.php\" class=\"button primary\" id=\"edit-btn\"=\"\">Edit Profile</a>";
      }

      else{
        $userType = $_SESSION['UserType'];
        if($userType == "company"){
          $employeeID = $_SESSION['employeeID'];
          $companyID = $_SESSION['companyID'];

          $query = "SELECT * FROM works WHERE companyID ='$companyID' AND employeeID = '$employeeID'";
          $result2 = $connection-> query($query);
          if($result2->num_rows > 0)
            echo "<section> <form method=\"post\" action=\"#\"><div class=\"col-12\"> <ul class=\"actions\"> <li><input type=\"submit\" value=\"Fire this worker\" name =\"fire\" class=\"primary\"/></li></ul></div></form></section>";
          else
            echo "<section> <form method=\"post\" action=\"#\"><div class=\"col-12\"> <ul class=\"actions\"> <li><input type=\"submit\" value=\"Make this employee as a worker\" name =\"add\" class=\"primary\"/></li></ul></div></form></section>";
      }
    }
      ?>

		</section>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="assets/js/editEmployeeProfile.js"></script>

	</body>
</html>

<?php
if(isset($_POST['add']))
{
$userType = $_SESSION['UserType'];
if($userType == "company"){
  $employeeID = $_SESSION['employeeID'];
  $companyID = $_SESSION['companyID'];

  $query = "SELECT * FROM works WHERE companyID ='$companyID' AND employeeID = '$employeeID'";
  $result2 = $connection-> query($query);
  if($result2->num_rows > 0){
    $message = "This employee is already your worker";
    echo "<script type='text/javascript'>alert('$message');
    window.location = 'employeeProfile.php' </script>";
  }
  else{
  $query = "INSERT INTO works(employeeID,companyID)
            VALUES('$employeeID','$companyID')";
  $result2 = $connection-> query($query);

        $message = "You have been added this eployee as a worker SUCCESSFULLY";
        echo "<script type='text/javascript'>alert('$message');
        window.location = 'companyProfile.php' </script>";
}

    }
}

if(isset($_POST['fire']))
{
$userType = $_SESSION['UserType'];
if($userType == "company"){
  $employeeID = $_SESSION['employeeID'];
  $companyID = $_SESSION['companyID'];


  $query = "DELETE FROM works where companyID ='$companyID' AND employeeID = '$employeeID'";
  $result2 = $connection-> query($query);

        $message = "You have been fired this eployee as a worker SUCCESSFULLY";
        echo "<script type='text/javascript'>alert('$message');
        window.location = 'companyProfile.php' </script>";
}

    }


?>
