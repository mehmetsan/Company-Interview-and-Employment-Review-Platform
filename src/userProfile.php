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

$userID = $_SESSION['userID'];

$query = "SELECT * FROM user WHERE userID = '$userID'";
$result = $connection-> query($query);

if($result -> num_rows == 1)
{
	$info = $result->fetch_assoc();
}

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
					<li><a href="home_page.php">Home</a></li>
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
							<td class ="test" name = "first_name" id="first_name">Mehmet</td>
						</tr>
						<tr>
							<td>Middle Name</td>
							<td class ="test" name = "middle_name" id="middle_name">Mehmet</td>
						</tr>
						<tr>
							<td>Last Name</td>
							<td class ="test" name = "last_name" id="last_name">Mehmet</td>
						</tr>
						<tr>
							<td>Gender</td>
							<td class ="test" name = "gender" id="gender">Mehmet</td>
						</tr>
						<tr>
							<td>Position</td>
							<td class ="test" name = "position" id="position">Mehmet</td>
						</tr>
						<tr>
							<td>Highest Education</td>
							<td class ="test" name = "gender" id="gender">Mehmet</td>
						</tr>
						<tr>
							<td>Location</td>
							<td class ="test" name = "location" id="location">Mehmet</td>
						</tr>
						<tr>
							<td>Phone Number 1</td>
							<td class ="test" name = "phone1" id="phone1">Mehmet</td>
						</tr>
						<tr>
							<td>Phone Number 2</td>
							<td class ="test" name = "phone2" id="phone2">Mehmet</td>
						</tr>
						<tr>
							<td>Email</td>
							<td class ="test" name = "email" id="email">Mehmet</td>
						</tr>
						<tr>
							<td>Password</td>
							<td class ="test" name = "password" id="password">*********</td>
						</tr>
					</tbody>

				</table>
			</div>
		                <a href="appliedJob.php" class="button primary" style="text-align:center">Applied Jobs</a>
		                <a href="#" class="button primary" style="text-align:center">Projects</a>
		                <a href="following.php" class="button primary" style="text-align:center">Following</a>
		                <a href="myReviewList.php" class="button primary" style="text-align:center">Reviews</a>
									  <a href="editUserProfile.php" class ="button primary" id="edit-btn"="">Edit Profile</a>


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
