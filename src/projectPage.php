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
$userType = $_SESSION['UserType'];
$connection = mysqli_connect('dijkstra.ug.bcc.bilkent.edu.tr', 'ege.marasli', '8nhmQrdt', 'ege_marasli');

if(! $connection)
{
    die('Connection Error!!! ' . mysqli_error());
}

$userID = $_SESSION['userID'];
$projectID = $_SESSION['projectID'];

$query = "SELECT * FROM project WHERE projectID = '$projectID'";
$result = $connection-> query($query);

if($result -> num_rows == 1)
{
	$projectInfo = $result->fetch_assoc();
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
          <li><a href="home_page.php" class ="button primary">Home</a></li>
          <?php
            if($userType == "employee"){
              echo "<a href=\"companyList.php\" class=\"button primary\" style=\"text-align:center\">Companies</a>";
              echo"\n";
              echo "<a href=\"jobList.php\" class=\"button primary\" style=\"text-align:center\">Jobs</a>";
              echo"\n";
              echo "<a href=\"projectList.php\" class=\"button primary\" style=\"text-align:center\">Projects</a>";
            }
            else {
              echo "<a href=\"employeeProfile.php\" class=\"button primary\" style=\"text-align:center\">Profile</a>";
            }
           ?>
          <li><a href="index.php" class ="button primary">Logout</a></li>
				</ul>
			</nav>
		</header>
		<section>
			<h3>My Profile</h3>
			<h4>Project Details</h4>
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
							<td>Project Title</td>
							<td class ="test" name = "title" id="title"><?php echo  $projectInfo['title']; ?></td>
						</tr>
						<tr>
							<td>Start Date</td>
							<td class ="test" name = "start_date" id="start_date"><?php echo  $projectInfo['start_date']; ?></td>
						</tr>
						<tr>
							<td>Status</td>
							<td class ="test" name = "status" id="status"><?php echo  $projectInfo['status']; ?></td>
						</tr>
						<tr>
							<td>Description</td>
							<td class ="test" name = "description" id="description"><?php echo  $projectInfo['description']; ?></td>
						</tr>
					</tbody>

				</table>
			</div>

      <?php

      if($userType == "employee"){
        echo "<a href=\"projectList.php\" class=\"button primary\" style=\"text-align:center\">Return To Project List</a>";
        echo"\n";
        echo "<a href=\"companyPage.php\" class=\"button primary\" style=\"text-align:center\">Return To Company Page</a>";
      }
      else {
        echo "<a href=\"companyProfile.php\" class=\"button primary\" style=\"text-align:center\">Return To Company Page</a>";
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
