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
									<li><a href="employee_register.php">Employee Register</a></li>
									<li><a href="company_register.php">Company Register</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</header>

				<!-- Form -->
					<section>
						<h3>LOGIN</h3>
						<br></br>
						<br></br>
							<div class="row gtr-uniform gtr-50" >
								<ul>
										<div class="loginName">
											<input align="center" type="text" name="mail" id="name" value="" placeholder="Mail" style= "text-align:center" />
										</div>
										<div class="loginMail">
											<input align="center" type="email" name="password" id="email" value="" placeholder="Password"style= "text-align:center" />
										</div>
										<br></br>
										<li><a type = "submit" class="button login" name = "login" style="text-align:center">Login</a></li>
								</ul>
							</div>


					</section>

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



		<?php

		if(isset($_POST['login']))
		{







						//$query = "SELECT * FROM user WHERE mail = '$mail' AND password = '$pass' ";


				//	$result = $connection-> query($query);


					$error = "<br></br>Wrong username or password";
					echo $error;


						// if($result -> num_rows == 1)
						// {
						// 	$_SESSION["cid"] = $pass;
						// 	header("Location: welcome.php");
						// }
						// else
						// {
						// 	$error = "<br></br>Wrong username or password";
						// 	echo $error;
						// }

		}
		?>
