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
                  <li><a href="company_list.php">Company List</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</header>


  			<!-- Main -->
  				<div id="main" class="wrapper style1">
  					<div class="container">
  						<header class="major">
  							<h2>Login</h2>
  							<p>Please enter your email and password to login</p>
  						</header>
  						<div class="sign">


  							<!-- Form -->
  								<section>
  									<form method="post" action="#" name = "login">
  											<div class="col-6 col-12-xsmall">
  												<input type="email" name="email" id="email" value="" placeholder="*Email" />
  											</div>
  											<div class="col-6 col-12-xsmall">
  												<input type="password" name="password" id="password" value="" placeholder="*Password" />
  											</div>
  											<div class="col-12">
  												<ul class="actions">
  													<li><input type="submit" value="Login" name ="submit" class="primary"/></li>
  												</ul>
  											</div>
  										</div>
  									</form>
  								</section>
  					</div>
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



		<?php

		if(isset($_POST['submit']))
		{



			$mail = $_POST['email'];
			$pass = $_POST['password'];



					$query = "SELECT * FROM user WHERE mail = '$mail' AND password = '$pass' ";
					$result = $connection-> query($query);




						if($result -> num_rows == 1)
						{
						//	$_SESSION["cid"] = $pass;
              $userID = $result->fetch_assoc();

              $_SESSION['userID'] = $userID[userID];

              $admin_query = "SELECT * FROM admin WHERE adminID = $userID[userID]";
    					$adminCont = $connection-> query($admin_query);
              if($adminCont -> num_rows == 1)
              {
                $_SESSION['UserType'] = "admin";
              }
              if ($adminCont -> num_rows == 1){
                $message = "admin logged in";
                echo "<script type='text/javascript'>alert('$message');
                window.location = 'admin_control.php' </script>";
              }

              $query = "SELECT * FROM employee WHERE employeeID = $userID[userID]";
    					$result2 = $connection-> query($query);

              if($result2 -> num_rows == 1)
              {
                $_SESSION['UserType'] = "employee";
              }
              else if ($result2 -> num_rows == 0 && $adminCont -> num_rows == 0 ){
                $_SESSION['UserType'] = "company";
              }


              /*
              SESSION TRIAL
              */

              $sessionquery = "SELECT * FROM employee WHERE employeeID = '$userID[userID]'";
              $reses = $connection-> query($sessionquery);
              if ($reses -> num_rows == 1){
                $message = "employee logged in";
                echo "<script type='text/javascript'>alert('$message');
                window.location = 'home_page.php' </script>";
              }
              else if ($reses -> num_rows == 0  && $adminCont -> num_rows == 0){
              /*
              SESSION TRIAL
              */
              $message = "company logged in";
              echo "<script type='text/javascript'>alert('$message');
              window.location = 'home_page.php' </script>";
							//header("Location: employeeProfile.php");
						}
            /*
            SESSION TRIAL
            */




		}

    else
    {
      $message = "Incorrect mail or password";
      echo "<script type='text/javascript'>alert('$message');</script>";

    }

  }
		?>
