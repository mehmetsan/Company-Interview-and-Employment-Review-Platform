<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php

	$query = "SELECT * FROM review WHERE reviewId = $_SESSION['reviewID']";
	$result = $connection-> query($query);

	$info = $result->fetch_assoc();

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
							<li><a href="myReviewList.php" class ="button primary">Return to MyLists</a></li>
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
                  <th>Review No</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr><td>Review Information: </td>	<td></td> </tr>
								<tr><td>Company Name: </td> <td></td> </tr>
								<tr><td>Type: </td> <td></td> </tr>
								<tr><td>Employment Status: </td> <td></td> </tr>
								<tr><td>Job Title: </td> <td></td> </tr>
								<tr><td>Date: </td> <td></td> </tr>
								<tr><td>Rating: </td> <td></td> </tr>
								<tr><td>Location: </td> <td></td> </tr>
								<tr><td>Visibility: </td> <td></td> </tr>
								<tr><td>Publisher's Name: </td> <td></td> </tr>

              </tbody>

            </table>
          </div>
					<pre>
						<code>
							i = 0;

							while (!deck.isInOrder()) {
							print 'Iteration ' + i;
							deck.shuffle();
							i++;
							}

							print 'It took ' + i + ' iterations to sort the deck.';
						</code>
				</pre>
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
