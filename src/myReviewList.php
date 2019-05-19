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

$query = "SELECT * FROM publishes WHERE employeeID = '$userID'";
$result = $conn-> query($query);

if($result -> num_rows == 1)
{
	$info = $result->fetch_assoc();
	$query = "SELECT * FROM review WHERE reviewID = '$info[reviewID]'";
	$result = $conn-> query($query);
	//$review = $result->fetch_assoc();

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
							<li><a href="index.php">Home</a></li>
							<li>
								<a href="#" class ="button primary">Sign Up</a>
								<ul>
									<li><a href="left-sidebar.php">Employee Register</a></li>
									<li><a href="right-sidebar.php">Company Register</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</header>

				<!-- Form -->
        <section>
          <h3>MY REVIEWS</h3>
          <div class="table-wrapper">
            <table>
              <thead>
                <tr>
                  <th>Review ID</th>
                  <th>Company Name</th>
									<th>Review Type</th>
                  <th>DISPLAY</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
								<?php


								while ($review = $result ->fetch_assoc())
                {
										$reviewID =  $review['reviewID'];
										$reviewType = findReviewType($reviewID);
									//	$var = "<a href=\"#\" type=\"display\" name=\"disp\" value=$reviewID class=\"primary\" >DISPLAY</a>";
									$var=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$reviewID\" name =\"submit\" class=\"primary\"/></li>	</ul>	</div>	</form>
  								</section>";


                    echo "<tr><td>" . $review['reviewID'] . "</td><td>" . "COMPANY" . "</td><td>" . $reviewType . "</td><td>" . $var  ."</td></tr>";


                }
								if(isset($_POST['submit'])){
									$message =$_POST['submit'];
									$_SESSION['reviewID'] = $message;
									$reviewType = findReviewType($message);
									if($reviewType == "salary_review")
										header("Location: displaySalaryReview.php");

									else if($reviewType == "benefits_review")
										header("Location: displayBenefitsReview.php");

									else if($reviewType == "general_review")
										header("Location: displayGeneralReview.php");

									else if($reviewType == "interview_review")
										header("Location: displayInterviewReview.php");
								//	echo "<script type='text/javascript'>alert('$message');</script>";
								//	$_SESSION['reviewID'] = $_GET['id'];

								}

								?>
              </tbody>
            </table>
          </div>
          <ul>

            <div>
                <a href="employeeProfile.php" class="button primary" style="text-align:center">My Profile</a>
            </div>
          </ul>

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
