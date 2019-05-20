<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php
	include_once 'conn.php';
	$userID = $_SESSION['userID'];

	$query = "SELECT * FROM employee WHERE employeeID = '$userID'";
	$result = $conn-> query($query);
	$arr = $result ->fetch_assoc();

	$query2 = "SELECT * FROM user WHERE userID = '$userID'";
	$result2 = $conn-> query($query2);
	$arr2 = $result2 ->fetch_assoc();

?>

<html>
	<head>
		<title>Edit Profile</title>
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
              First Name <input type="text" name="firstName" id="firstName" value= <?php echo $arr['first_name']  ?> />
            </div>
						<div class="col-2 col-12-xsmall">
              Middle Name <input type="text" name="middleName" id="middleName" value=<?php echo $arr['middle_name']  ?>>
            </div>
						<div class="col-2 col-12-xsmall">
              Last Name <input type="text" name="lastName" id="lastName" value= <?php echo $arr['last_name']  ?> />
            </div>
						<div class="col-12">
							<select name="gender" id="gender">
								<option value="">Gender</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</div>
						<div class="col-2 col-12-xsmall">
              Highest Education <input type="text" name="highestEducation" id="highestEducation" value=<?php echo $arr['highest_education']  ?>>
            </div>
            <div class="col-2 col-12-xsmall">
              Position <input type="text" name="position" id="position" value=<?php echo $arr['position']  ?>>
            </div>
						<div class="col-2 col-12-xsmall">
              Location <input type="text" name="location" id="location" value=<?php echo $arr['Location']  ?>>
            </div>
						<div class="col-2 col-12-xsmall">
              Phone Number 1 <input type="text" name="phone_number1" id="phone_number1" value=<?php echo $arr2['phone_number1']  ?>>
            </div>
						<div class="col-2 col-12-xsmall">
              Phone Number 2 <input type="text" name="phone_number2" id="phone_number2" value=<?php echo $arr2['phone_number2']  ?>>
            </div>
						<div class="col-2 col-12-xsmall">
              Email <input type="text" name="email" id="email" value=<?php echo $arr2['mail']  ?>>
            </div>
            <div class="col-6 col-12-xsmall">
              Password <input type="text" name="password" id="password" value="<?php echo $arr2['password']?>"/>
            </div>
						<div class="col-2 col-12-xsmall">
							Resume	<textarea name="resume" id="resume" placeholder=<?php echo $arr['resume']  ?> rows="6"></textarea>
            </div>
            <div class="col-12">
              <ul class="actions">
                <li><input type="submit" value="Update" name="update" class="primary" /></li>
								<li><a href="employeeProfile.php" class ="button primary">Cancel</a></li>
              </ul>
            </div>
          </div>
        </form>
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
			<script src="assets/js/editUserProfile.js"></script>

	</body>
</html>

<?php
$connection = mysqli_connect('dijkstra.ug.bcc.bilkent.edu.tr', 'ege.marasli', '8nhmQrdt', 'ege_marasli');

	if(isset($_POST['update']))
	{
		$message = "Incorrect mail or password";


		$newFirstName = $_POST['firstName'];
		$newMiddleName = $_POST['middleName'];
		$newLastName = $_POST['lastName'];
		$newGender = $_POST['gender'];
		$newHighestEducation = $_POST['highestEducation'];
		$newResume= $_POST['resume'];
		$newPosition= $_POST['position'];
		$newLocation= $_POST['location'];
		$newPhoneNumber1 = $_POST['phone_number1'];
		$newPhoneNumber2 = $_POST['phone_number2'];
		$newMail = $_POST['email'];
		$newPassword = $_POST['password'];


		$query = "UPDATE employee SET first_name = '$newFirstName', middle_name='$newMiddleName', last_name ='$newLastName',gender ='$newGender', highest_education ='$newHighestEducation', resume ='$newResume', position ='$newPosition',Location ='$newLocation' WHERE employeeID = $userID;";
		$result = $connection-> query($query);

		$query2 = "UPDATE user SET mail ='$newMail', password ='$newPassword', phone_number1 ='$newPhoneNumber1', phone_number2 ='$newPhoneNumber2' WHERE userID = $userID;";
		$result = $connection-> query($query2);
		echo "<script type='text/javascript'>window.location = 'employeeProfile.php' </script>";
	}
 ?>
