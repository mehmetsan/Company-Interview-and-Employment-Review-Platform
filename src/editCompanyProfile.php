<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php
	include_once 'conn.php';
	$companyID = $_SESSION['userID'];

	$query = "SELECT * FROM company WHERE companyID = '$companyID'";
	$result = $conn-> query($query);
	$arr = $result ->fetch_assoc();

?>

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
              Name <input type="text" name="name" id="name" value="Google"/>
            </div>
            <div class="col-2 col-12-xsmall">
              Website <input type="text" name="website" id="website" value="https://www.google.com.tr/"/>
            </div>
            <div class="col-2 col-12-xsmall">
              Industry <input type="text" name="industry" id="industry" value="Tech"/>
            </div>
            <div class="col-2 col-12-xsmall">
              Sector <input type="text" name="sector" id="sector" value="Communication"/>
            </div>
            <div class="col-2 col-12-xsmall">
              Revenue <input type="text" name="revenue" id="revenue" value="$100 billion"/>
            </div>
						<div class="col-2 col-12-xsmall">
              Establish_date <input type="text" name="establish_date" id="establish_date" value="August 19, 2004"/>
            </div>
						<div class="col-2 col-12-xsmall">
              Type <input type="text" name="type" id="type" value="Private"/>
            </div>
						<div class="col-2 col-12-xsmall">
              Headquarter <input type="text" name="headquarter" id="headquarter" value="1600 Amphitheatre Pkwy, Mountain View, CA 94043, USA"/>
            </div>
            <div class="col-5 col-12-xsmall">
              Phone Number 1 <input type="text" name="phone1" id="phone1" value="055532345432"/>
            </div>
            <div class="col-5 col-12-xsmall">
              Phone Number 2 <input type="text" name="phone2" id="phone2" value="0532123131"/>
            </div>
            <div class="col-6 col-12-xsmall">
              Email <input type="text" name="email" id="email" value="google@gmail.com"/>
            </div>
            <div class="col-6 col-12-xsmall">
              Password <input type="text" name="password" id="password" value="123456"/>
            </div>
            <div class="col-12">
              <ul class="actions">
                <li><input type="submit" value="Update" name="update" class="primary" /></li>
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


		$newName = $_POST['name'];
		$newWebsite = $_POST['website'];
		$newIndustry = $_POST['industry'];
		$newSector = $_POST['sector'];
		$newRevenue = $_POST['revenue'];
		$newEstablishDate = $_POST['establish_date'];
		$newType = $_POST['type'];
		$newHeadquarter= $_POST['headquarter'];
		$newMail = $_POST['email'];
		$newPassword = $_POST['password'];
		$newPhoneNumber1 = $_POST['phone1'];
		$newPhoneNumber2 = $_POST['phone2'];

		$query = "UPDATE company SET name = '$newName', website='$newWebsite', industry ='$newIndustry',sector ='$newSector', revenue ='$newRevenue', establish_date ='$newEstablishDate', type ='$newType',headquarter ='$newHeadquarter', mail ='$newMail', password ='$newPassword', phone_number1 ='$newPhoneNumber1', phone_number2 ='$newPhoneNumber2'	WHERE companyID = $companyID;";
		$result = $connection-> query($query);


	}
 ?>
