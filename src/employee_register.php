<?php
	include_once 'conn.php';
?>
<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Left Sidebar - Landed by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1 id="logo"><a href="index.php">Künefele Beni</a></h1>
					<nav id="nav">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li>
								<a href="#">Layouts</a>
								<ul>
									<li><a href="left-sidebar.php">Left Sidebar</a></li>
									<li><a href="right-sidebar.php">Right Sidebar</a></li>
									<li><a href="no-sidebar.php">No Sidebar</a></li>
									<li>
										<a href="#">Submenu</a>
										<ul>
											<li><a href="#">Option 1</a></li>
											<li><a href="#">Option 2</a></li>
											<li><a href="#">Option 3</a></li>
											<li><a href="#">Option 4</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li><a href="elements.php">Elements</a></li>
							<li><a href="#" class="button primary">Sign Up</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
							<h2>Employee Sign Up</h2>
							<p>Fill the given from to register (*areas are mandatory)</p>
						</header>
						<div class="sign">


							<!-- Form -->
								<section>
									<form method="post" action="#" name = "sign">
										<div class="row gtr-uniform gtr-50">
											<div class="col-6 col-12-xsmall">
												<input type="text" name="first_name" id="first_name" value="" placeholder="*First Name" />
											</div>
											<div class="col-6 col-12-xsmall">
												<input type="text" name="last_name" id="last_name" value="" placeholder="*Last Name" />
											</div>
											<div class="col-6 col-12-xsmall">
												<input type="email" name="email" id="email" value="" placeholder="*Email" />
											</div>
											<div class="col-6 col-12-xsmall">
												<input type="password" name="password" id="password" value="" placeholder="*Password" />
											</div>
											<div class="col-12">
												<ul class="actions">
													<li><input type="submit" value="Sign Up" name ="submit" class="primary" onclick="isEmpty()"/></li>
													<li><input type="reset" value="Reset" /></li>
												</ul>
											</div>
										</div>
									</form>
								</section>
					</div>
				</div>
		</div>

	</body>
</html>
<script>
    function isEmpty()
    {
        first_name = document.forms["sign"]["first_name"].value;
        last_name = document.forms["sign"]["last_name"].value;
				email = document.forms["sign"]["email"].value;
				password = document.forms["sign"]["password"].value;
        if (first_name == "" || last_name == "" || email == "" || password == "")
        {
            alert("Please fill all fields");
        }
    }
</script>
<?php
$error = '';
if(isset($_POST['submit']))
{

	if(empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['password']))
	{
			$error = "Wrong username or password";
	}
	else
	{
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(isMailExist($email))
		{
			$error = "Wrong username or password";
			$message = "PLEASE ENTER DIFFERENT MAIL";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else
		{
			$userID = randomID_user();

			$query = "INSERT INTO user(userID,mail,password,phone_number1,phone_number2,profile_picture)
								VALUES('$userID' , '$email' , '$password' , NULL, NULL, NULL)";

			mysqli_query($conn, $query);

			$query = "INSERT INTO employee(employeeID, first_name,middle_name, last_name, gender,highest_education,resume,position, Location)
								VALUES((SELECT userID FROM user WHERE userID = '$userID') , '$first_name' , NULL , '$last_name' , NULL, NULL, NULL , NULL, NULL)";
			mysqli_query($conn, $query);
		}

	}




	/*
	$query = "SELECT * FROM customer WHERE cid = '$pass' AND LOWER(name) = LOWER('$user')";
	$result = $connection-> query($query);
	if($result -> num_rows == 1)
	{
		$_SESSION["cid"] = $pass;
		header("Location: welcome.php");
	}
	else
	{
		$error = "<br></br>Wrong username or password";
		echo $error;
	}
	*/
}
?>
