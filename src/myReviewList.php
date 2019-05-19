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

$query = "SELECT * FROM publishes WHERE employeeID = '$userID'";
$result = $connection-> query($query);

if($result -> num_rows == 1)
{
	$info = $result->fetch_assoc();
	$query = "SELECT * FROM review WHERE reviewID = '$info[reviewID]'";
	$result = $connection-> query($query);
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
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
								<?php


								while ($review = $result ->fetch_assoc())
                {
										$reviewID =  $review['reviewID'];

									$var=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$reviewID\" name =\"submit\" class=\"primary\"/></li>	</ul>	</div>	</form>
  								</section>";
										$var2 = "<a href=\"#\" class=\"button primary\" onclick=\"\">DELETE</a>";
                    echo "<tr><td>" . $review['reviewID'] . "</td><td>" . "COMPANY" . "</td><td>" . $var . "</td><td>" . $var2  ."</td></tr>";


                }
								if(isset($_POST['submit'])){
									$message =$_POST['submit'];
									$_SESSION['reviewID'] = $message;
									header("Location: displayReview.php");

								}







              </tbody>
            </table>
          </div>
          <ul>

            <div>
                <a href="userProfile.php" class="button primary" style="text-align:center">My Profile</a>
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
