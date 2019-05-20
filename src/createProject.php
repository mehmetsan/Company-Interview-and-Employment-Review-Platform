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
		<title>Create a Project</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

      <!-- Header -->
				<header id="header">
					<nav id="nav">
						<ul>
							<li><a href="home_page.php" class ="button primary">Home</a></li>
		          <li><a href="index.php" class ="button primary">Logout</a></li>
						</ul>
					</nav>
				</header>


        			<!-- Main -->
        				<div id="main" class="wrapper style1">
        					<div class="container">
        						<header class="major">
        							<h2>Create a Benefits Review</h2>
        							<p>Tell us the opportunities of the company!</p>
        						</header>
        						<div class="sign">


        							<!-- Form -->
											<section>
												<form method="post" action="#">
													<div class="row gtr-uniform gtr-50">
														<div class="col-12 col-12-xsmall">
															<input type="text" name="title" id="title" value="" placeholder="Title" />
														</div>
														<div class="col-12 col-12-xsmall">
															<input type="text" name="start_date" id="start_date" start_date="" placeholder="Start Date" />
														</div>
														<div class="col-12">
															<select name="status" id="status">
																<option value="">Project Status</option>
																<option value="Ongoing">Ongoing</option>
																<option value="Finished">Finished</option>
															</select>
														</div>
														<div class="col-12">
															<textarea name="description" id="description" placeholder="Enter your project description here..." rows="6"></textarea>
														</div>
														<div class="col-12">
															<ul class="actions">
																<li><input type="submit" value="Submit" name ="submit" class="primary"/></li>
																<li><a href="companyProfile.php" class ="button primary">Cancel</a></li>
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
				<?php

					$userID = $_SESSION['userID'];
				$error='';
				if(isset($_POST['submit']))
				{

								$title = $_POST['title'];
								$startDate = $_POST['start_date'];
								$status = $_POST['status'];
								$description = $_POST['description'];
								$projectID = randomID_user();;
								$_SESSION['projectID'] = $projectID;

								$qu = "SELECT * FROM project WHERE title = '$title' AND start_date = '$startDate' AND status = '$status' ";
								$res = $conn-> query($qu);
								if($res -> num_rows == 0){

									$query = "INSERT INTO project(companyID,projectID,title,start_date,status,description)
														VALUES('$userID','$projectID','$title','$startDate','$status','$description')";
									$result = $conn-> query($query);

									$message = "Project is created succesfully";
									echo "<script type='text/javascript'>alert('$message');
									window.location = 'projectPage.php' </script>";
								}

								else {
									$message = "Job Creation Failed!";
									echo "<script type='text/javascript'>alert('$message');</script>";
								}


				}
				?>
