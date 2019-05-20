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
		<title>Company Register</title>
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
								<a href="#" class ="button primary">Sign Up</a>
								<ul>
									<li><a href="employee_register.php">Employee Register</a></li>
									<li><a href="company_register.php">Company Register</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
							<h2>Company Sign Up</h2>
							<p>Fill the given from to register (*areas are mandatory)</p>
						</header>
						<div class="sign">


							<!-- Form -->
								<section>
									<form method="post" action="#">
										<div class="row gtr-uniform gtr-50">
											<div class="col-8 col-12-xsmall">
												<input type="text" name="name" id="name" value="" placeholder="*Name" />
											</div>
											<div class="col-4 col-12-xsmall">
												<input type="text" name="sector" id="sector" value="" placeholder="*Sector" />
											</div>
                      <div class="col-3 col-12-xsmall">
                        <input type="text" name="industry" id="industry" value="" placeholder="*Industry" />
                      </div>
											<div class="col-3 col-12-xsmall">
												<input type="text" name="headquarter" id="headquarter" value="" placeholder="*Headquarter" />
											</div>
											<div class="col-6 col-12-xsmall">
												<input type="email" name="email" id="email" value="" placeholder="*Email" />
											</div>
											<div class="col-6 col-12-xsmall">
												<input type="password" name="password" id="password" value="" placeholder="*Password" />
											</div>
											<div class="col-6">
												<select name="type" id="type">
													<option value="">Type</option>
													<option value="Private">Private</option>
													<option value="Public">Public</option>
												</select>
											</div>
											<div class="col-12-medium">
												*Establish Date: <input type="date" style="background-color:black;" name="establish_date">
											</div>
											<div class="col-12">
												<ul class="actions">
													<li><input type="submit" value="Sign Up" name ="submit" class="primary"  onclick="isEmptyCompany()"/></li>
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
    function isEmptyCompany()
    {
        name = document.forms["sign"]["name"].value;
        sector = document.forms["sign"]["sector"].value;
        industry = document.forms["sign"]["industry"].value;
				headquarter = document.forms["sign"]["headquarter"].value;
				email = document.forms["sign"]["email"].value;
        password = document.forms["sign"]["password"].value;
				type = document.forms["sign"]["type"].value;
        establish_date = document.forms["sign"]["establish_date"].value;
        if (name == "" || sector == "" || sector == "" || headquarter == "" || email == "" || password == "" || type == "" || establish_date == "")
        {
            alert("Please fill all fields");
        }
    }
</script>

<?php
$error='';
if(isset($_POST['submit']))
{
        if(empty($_POST['name']) || empty($_POST['sector']) || empty($_POST['industry'])|| empty($_POST['establish_date'])|| empty($_POST['headquarter']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['type']))
        {
          $message = "Please fill all fields";
          echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else
        {
          $name = $_POST['name'];
          $sector = $_POST['sector'];
          $industry = $_POST['industry'];
          $hq = $_POST['headquarter'];
          $mail = $_POST['email'];
          $pass = $_POST['password'];
          $type = $_POST['type'];

          $establish_date = strtotime($_POST["establish_date"]);
          $establish_date = date('Y-m-d H:i:s', $establish_date); //now you can save in DB
            if(isMailExist($mail))
            {
              $message = "PLEASE ENTER DIFFERENT MAIL";
              echo "<script type='text/javascript'>alert('$message');</script>";
            }
            else
            {
              $userID = randomID_user();
              $query = "INSERT INTO user(userID,mail,password,phone_number1,phone_number2,profile_picture)
    										VALUES('$userID' , '$mail' , '$pass' , NULL, NULL, NULL)";


    					$result = $conn-> query($query);

    					$query2 = "INSERT INTO company(companyID,name,website,industry,sector,revenue,establish_date,type,headquarter)
    										VALUES('$userID' , '$name' , NULL , '$industry' , '$sector', NULL, '$establish_date' , '$type','$hq')";


    					$result2 = $conn-> query($query2);

              $message = "Register Succesful";
        			echo "<script type='text/javascript'>alert('$message');
        			window.location = 'login.php' </script>";
            }
        }
}
?>
