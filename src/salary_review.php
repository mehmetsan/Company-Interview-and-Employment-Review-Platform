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
		<title>Create a Salary Review</title>
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
							<li><a href="index.php">Home</a></li>
							<li><a href="elements.php">Elements</a></li>
							<li><a href="index.php" class="button primary">Logout</a></li>
						</ul>
					</nav>
				</header>


        			<!-- Main -->
        				<div id="main" class="wrapper style1">
        					<div class="container">
        						<header class="major">
        							<h2>Create a Salary Review</h2>
        							<p></p>
        						</header>
        						<div class="sign">


        							<!-- Form -->
        								<section>
        									<form method="post" action="#">
        										<div class="row gtr-uniform gtr-50">
        											<div class="col-12 col-12-xsmall">
        												<input type="text" name="employment_status" id="employment_status" value="" placeholder="Employment Status" />
        											</div>
        											<div class="col-12 col-12-xsmall">
        												<input type="text" name="job_title" id="job_title" value="" placeholder="Job Title" />
        											</div>
        											<div class="col-12 col-12-xsmall">
        												<input type="text" name="rating" id="rating" value="" placeholder="Rating" />
        											</div>
        											<div class="col-12 col-12-xsmall">
        												<input type="text" name="location" id="location" value="" placeholder="Location" />
        											</div>
                              <div class="col-12 col-12-xsmall">
        												<input type="text" name="salary" id="salary" value="" placeholder="Salary" />
        											</div>
															<div class="col-12">
																<textarea name="comment" id="comment" placeholder="Enter your comments about the review here..." rows="6"></textarea>
															</div>
															<div class="col-4-xsmall">
																<input type="radio" id="anonymous" name="anonymous" checked>
																<label for="anonymous">Anonymous</label>
															</div>
        											<div class="col-12">
        												<ul class="actions">
        													<li><input type="submit" value="submit" name ="submit" class="primary"/></li>
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
				<?php
				$error='';
				if(isset($_POST['submit']))
				{

					function randomSixDigit() {

						$connection = mysqli_connect('dijkstra.ug.bcc.bilkent.edu.tr', 'ege.marasli', '8nhmQrdt', 'ege_marasli');

						if(! $connection)
						{
						    die('Connection Error!!! ' . mysqli_error());
						}
							$min = 0;
							$max = 999999;

							$temp = rand (  $min ,  $max );

							$query3 = "SELECT * FROM review WHERE reviewID = '$temp' ";
							$result3 = $connection-> query($query3);
							while( $result3 -> num_rows != 0){
								$temp = rand (  $min ,  $max );

								$query4 = "SELECT * FROM review WHERE reviewID = '$temp' ";
								$result3 = $connection-> query($query4);

							}
							return $temp;

					}

								$employment_status = $_POST['employment_status'];
								$job_title = $_POST['job_title'];
								$rating = $_POST['rating'];
								$location = $_POST['location'];
								$comment = $_POST['comment'];
								$visibility = $_POST['visibility'];
								$reviewID = randomSixDigit();

								$qu = "SELECT * FROM review WHERE reviewID = '$reviewID' ";
								$res = $connection-> query($qu);
								if($res -> num_rows == 0){

									$query = "INSERT INTO review(reviewID,Employment_satatus,job_title,
										publish_date,rating,location,
									comment, visibility)
														VALUES('$reviewID' , '$employment_status' , '$job_title' , '10.04.98' , '$rating' , '$location',
														'$comment', '$visibility')";


									$result = $connection-> query($query);
									$query2 = "INSERT INTO salary_review(reviewID,salary)
														VALUES('$reviewID' , '5000')"; 


									$result2 = $connection-> query($query2);

									$message = "Review added";
									echo "<script type='text/javascript'>alert('$message');</script>";
									header("Location: homepage.php");
						   	}

								else {
									$message = "PLEASE ENTER DIFFERENT MAIL";
									echo "<script type='text/javascript'>alert('$message');</script>";
								}


				}
				?>
