<?php
	include_once 'conn.php';
	$userID = $_SESSION['userID'];
	$query = "SELECT * FROM employee WHERE employeeID = '$userID'";
	$result = $conn-> query($query);
?>
<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Landed by HTML5 UP</title>
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
			<h1 id="logo"><a href="index.php"></a></h1>
			<nav id="nav">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li>
						<a href="#" class ="button primary">Sign Up</a>
						<ul>
							<li><a href="employee_register.php">Employee Register</a></li>
							<li><a href="company_register.php">Company Register</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</header>

    <!-- Form -->
      <section>
        <h3>Form</h3>
        <form method="post" action="#">
          <div class="row gtr-uniform gtr-50">
            <div class="col-2 col-12-xsmall">
              First Name <input type="text" name="first_name" id="first_name" value="First Name"/>
            </div>
            <div class="col-2 col-12-xsmall">
              Middle Name <input type="text" name="middle_name" id="middle_name" value="Middle Name"/>
            </div>
            <div class="col-2 col-12-xsmall">
              Last Name <input type="text" name="last_name" id="last_name" value="Last Name"/>
            </div>
            <div class="col-2">
              Gender <select name="gender" id="gender">
                <option value="">- Category -</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="None">None</option>
              </select>
            </div>
            <div class="col-2 col-12-xsmall">
              Position <input type="text" name="position" id="position" value="Engineer"/>
            </div>
            <div class="col-2">
              Highest Education <select name="education" id="education">
                <option value="">- Category -</option>
                <option value="High School">High School</option>
                <option value="Bachelor's Degree">Bachelor's Degree</option>
                <option value="Master's Degree">Master's Degree</option>
                <option value="PHD">PHD</option>
              </select>
            </div>
            <div class="col-2 col-12-xsmall">
              Location <input type="text" name="location" id="location" value="location"/>
            </div>
            <div class="col-5 col-12-xsmall">
              Phone Number 1 <input type="text" name="phone1" id="phone1" value="phone1"/>
            </div>
            <div class="col-5 col-12-xsmall">
              Phone Number 2 <input type="text" name="phone2" id="phone2" value="phone1"/>
            </div>
            <div class="col-6 col-12-xsmall">
              Email <input type="text" name="mail" id="mail" value="mail"/>
            </div>
            <div class="col-6 col-12-xsmall">
              Password <input type="text" name="password" id="password" value="password"/>
            </div>
						<div class="col-12">
							<ul class="actions">
								<li><input type="submit" value="submit" name ="submit" class="primary"/></li>
							</ul>
						</div>
          </div>
        </form>
      </section>


		<!-- Scripts-->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="assets/js/editUserProfile.js"></script>

	</body>
</html>
<?php

if(isset($_POST['submit']))
{
	$new_first_name = $_POST['first_name']; //empl
	$new_middle_name = $_POST['middle_name']; //empl
	$new_last_name = $_POST['last_name']; //empl
	$new_gender = $_POST['gender']; //empl
	$new_position = $_POST['position'];
	$new_education = $_POST['education'];
	$new_location = $_POST['location'];
	$new_phone1 = $_POST['phone1']; //usr
	$new_phone2 = $_POST['phone2']; //usr
	$new_mail = $_POST['mail'];//usr
	$new_password = $_POST['password']; //usr



			$query = "SELECT * FROM user WHERE userID = '$userID' ";
			$result = $conn-> query($query);

			$query_emp = "SELECT * FROM employee WHERE employeeID = '$userID' ";
			$result_emp = $conn-> query($query_emp);

				if($result -> num_rows == 1)
				{
					//user settings
				$mail_update = "UPDATE user SET mail = '$new_mail' WHERE userID = '$userID'";
				$mail_action = $conn-> query($mail_update);


				$phone1_update = "UPDATE user SET phone_number1 = '$new_phone1' WHERE userID = '$userID'";
				$phone1_action = $conn-> query($phone1_update);

				$phone2_update = "UPDATE user SET phone_number2 = '$new_phone2' WHERE userID = '$userID'";
				$phone2_action = $conn-> query($phone2_update);

				$password_update = "UPDATE user SET password = '$new_password' WHERE userID = '$userID'";
				$password_action = $conn-> query($password_update);

				//employee settings
				$first_name_update = "UPDATE employee SET first_name = '$new_first_name' WHERE employeeID = '$userID'";
				$first_name_action = $conn-> query($first_name_update);

				$middle_name_update = "UPDATE employee SET middle_name = '$new_middle_name' WHERE employeeID = '$userID'";
				$middle_name_action = $conn-> query($middle_name_update);

				$last_name_update = "UPDATE employee SET last_name = '$new_last_name' WHERE employeeID = '$userID'";
				$last_name_action = $conn-> query($last_name_update);

				$gender_update = "UPDATE employee SET gender = '$new_gender' WHERE employeeID = '$userID'";
				$gender_action = $conn-> query($gender_update);

				$position_update = "UPDATE employee SET position = '$new_position' WHERE employeeID = '$userID'";
				$position_action = $conn-> query($position_update);

				$education_update = "UPDATE employee SET education = '$new_education' WHERE employeeID = '$userID'";
				$education_action = $conn-> query($education_update);

				$location_update = "UPDATE employee SET location = '$new_location' WHERE employeeID = '$userID'";
				$location_action = $conn-> query($location_update);


				if($mail_action ){
					$message = "Profile is updated succesfully";
					echo "<script type='text/javascript'>alert('$message');
					window.location = 'home_page.php' </script>";
				}

				}
}
?>
