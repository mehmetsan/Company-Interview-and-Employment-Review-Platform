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
$jobID = $_SESSION['jobID'];
$query = "SELECT * FROM job WHERE job = '$jobID'";
$result = $connection-> query($query);

if($result -> num_rows == 1)
{
	$jobInfo = $result->fetch_assoc();
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
			<h1 id="logo"><a href="home_page.php"></a></h1>
			<nav id="nav">
				<ul>
					<li><a href="home_page.php">Home</a></li>
					<li>
						<a href="index.php" class ="button primary">Logout</a>
					</li>
				</ul>
			</nav>
		</header>
		<section>
			<h3>My Profile</h3>
			<h4>Job Details</h4>
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
							<td>Job Title</td>
							<td class ="test" name = "title" id="title"><?php echo  $jobInfo['title']; ?></td>
						</tr>
						<tr>
							<td>Salary</td>
							<td class ="test" name = "salary" id="salary"><?php echo  $jobInfo['salary']; ?></td>
						</tr>
						<tr>
							<td>Post Date</td>
							<td class ="test" name = "post_date" id="post_date"><?php echo  $jobInfo['post_date']; ?></td>
						</tr>
						<tr>
							<td>Education</td>
							<td class ="test" name = "education" id="education"><?php echo  $jobInfo['education']; ?></td>
						</tr>
						<tr>
							<td>Position</td>
							<td class ="test" name = "position" id="position"><?php echo  $jobInfo['position']; ?></td>
						</tr>
						<tr>
							<td>Experience</td>
							<td class ="test" name = "experience" id="experience"><?php echo  $jobInfo['experience']; ?></td>
						</tr>
						<tr>
							<td>Benefits</td>
							<td class ="test" name = "benefits" id="benefits"><?php echo  $jobInfo['benefits']; ?></td>
						</tr>
						<tr>
							<td>Type</td>
							<td class ="test" name = "type" id="type"><?php echo  $jobInfo['type']; ?></td>
						</tr>
					</tbody>

				</table>
			</div>
		                <a href="jobList.php" class="button primary" style="text-align:center">Return To Job List</a>
                    <a href="companyPage.php" class="button primary" style="text-align:center">Return To Company Page</a>



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
