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
include_once 'conn.php';
$conn = mysqli_connect('dijkstra.ug.bcc.bilkent.edu.tr', 'ege.marasli', '8nhmQrdt', 'ege_marasli');

if(! $conn)
{
    die('Connection Error!!! ' . mysqli_error());
}

$userID = $_SESSION['userID'];

$query = "SELECT * FROM applies WHERE employeeID = '$userID'";
$result = $conn-> query($query);

if($result -> num_rows == 1)
{
	$info = $result->fetch_assoc();
	$query = "SELECT * FROM job WHERE jobID = '$info[jobID]'";
	$result = $conn-> query($query);

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
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1 id="logo"><a href="index.php"></a></h1>
					<nav id="nav">
						<ul>
              <li><a href="home_page.php" class ="button primary">Home</a></li>
              <li><a href="employeeProfile.php" class ="button primary">Profile</a></li>
              <li><a href="companyList.php" class ="button primary">Companies</a></li>
              <li><a href="jobList.php" class ="button primary">Jobs</a></li>
              <li><a href="projectList.php" class ="button primary">Projects</a></li>
						</ul>
					</nav>
				</header>

				<!-- Form -->
        <section>
          <h3>MY APPLICATIONS</h3>
          <div class="table-wrapper">
            <table>
              <thead>
                <tr>
                  <th>Job ID</th>
                  <th>Job Title</th>
									<th>Company Name</th>
                  <th>DISPLAY</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
								<?php


								while ($job = $result ->fetch_assoc())
                {
										$jobID =  $job['jobID'];

                    $query = "SELECT * FROM publishes WHERE jobID = '$jobID'";
                    $result2 = $conn-> query($query);

                    $temp = $result2->fetch_assoc();
                    $companyID = $temp['companyID'];

                    $query = "SELECT * FROM company WHERE companyID = '$companyID'";
                    $result2 = $conn-> query($query);

                    $temp2 = $result2->fetch_assoc();

									//	$var = "<a href=\"#\" type=\"display\" name=\"disp\" value=$jobID class=\"primary\" >DISPLAY</a>";
									$var=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$jobID\" name =\"submit\" class=\"primary\"/></li>	</ul>	</div>	</form>
  								</section>";


                    echo "<tr><td>" . $job['jobID'] . "</td><td>" . $job['title'] . "</td><td>" . $temp2['name'] . "</td><td>" . $var  ."</td></tr>";

                }
								if(isset($_POST['submit'])){
									$message =$_POST['submit'];
									$_SESSION['jobID'] = $message;
									header("Location: jobPage.php");

								}

								?>
              </tbody>
            </table>
          </div>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
