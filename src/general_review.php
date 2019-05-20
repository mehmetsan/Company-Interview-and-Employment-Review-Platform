<?php
	include_once 'conn.php';
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Create a General Review</title>
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
							<li><a href="employeeProfile.php" class ="button primary">Profile</a></li>
							<li><a href="companyList.php" class ="button primary">Companies</a></li>
							<li><a href="jobList.php" class ="button primary">Jobs</a></li>
							<li><a href="projectList.php" class ="button primary">Projects</a></li>
							<li><a href="index.php" class ="button primary">Logout</a></li>
						</ul>
					</nav>
				</header>


        			<!-- Main -->
        				<div id="main" class="wrapper style1">
        					<div class="container">
        						<header class="major">
        							<h2>Create a General Review</h2>
        							<p>Tell us the pros, cons about the company! Also, you can state the advices for company.</p>
        						</header>
        						<div class="sign">


        							<!-- Form -->
        								<section>
        									<form method="post" action="#">
        										<div class="row gtr-uniform gtr-50">
															<div class="col-12">
																<select name="employment_status" id="employment_status">
																	<option value="">Employment_satatus</option>
																	<option value="0">Working</option>
																	<option value="1">Not Working</option>
																</select>
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
															<div class="col-12">
																<textarea name="comment" id="comment" placeholder="Enter your comments about the review here..." rows="6"></textarea>
															</div>
                              <div class="col-12">
																<textarea name="pros" id="pros" placeholder="Pros" rows="6"></textarea>
															</div>
                              <div class="col-12">
																<textarea name="cons" id="cons" placeholder="Cons" rows="6"></textarea>
															</div>
                              <div class="col-12">
																<textarea name="advice" id="advice" placeholder="Advice to Company" rows="6"></textarea>
															</div>
															<div class="col-12">
																<select name="visibility" id="visibility">
																	<option value="">Anonimity</option>
																	<option value="0">Anonim</option>
																	<option value="1">Not anonim</option>
																</select>
															</div>
        											<div class="col-12">
        												<ul class="actions">
        													<li><input type="submit" value="Submit" name ="submit" class="primary"/></li>
        													<li><a href="companyList.php" class ="button primary">Cancel</a></li>
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
					function randomSixDigit() {
						$conn = mysqli_connect('dijkstra.ug.bcc.bilkent.edu.tr', 'ege.marasli', '8nhmQrdt', 'ege_marasli');
							$min = 0;
							$max = 999999;

							$temp = rand (  $min ,  $max );

							$query3 = "SELECT * FROM review WHERE reviewID = '$temp' ";
							$result3 = $conn-> query($query3);
							while( $result3 -> num_rows != 0){
								$temp = rand (  $min ,  $max );

								$query4 = "SELECT * FROM review WHERE reviewID = '$temp' ";
								$result3 = $conn-> query($query4);

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

								$pros = $_POST['pros'];
								$cons = $_POST['cons'];
								$advice_to_management = $_POST['advice'];


								$qu = "SELECT * FROM review WHERE reviewID = '$reviewID' ";
								$res = $conn-> query($qu);
								if($res -> num_rows == 0){

									$query = "INSERT INTO review(reviewID,Employment_status,job_title,publish_date,rating,location,comment, visibility)
														VALUES('$reviewID' , '$employment_status' , '$job_title' , '2008-11-11' , '$rating' , '$location','$comment', '$visibility')";


									$result = $conn-> query($query);
									$query2 = "INSERT INTO general_review(reviewID,pros,cons,advice_to_management)
														VALUES('$reviewID' , '$pros', '$cons', '$advice_to_management')";


									$result2 = $conn-> query($query2);

									$query3 = "INSERT INTO publishes(reviewID, employeeID)
															VALUES('$reviewID' , '$userID')";

									$result3 = $conn-> query($query3);

									$companyID = $_SESSION['companyID'];
									$query4 = "INSERT INTO related(reviewID, companyID)
															VALUES('$reviewID' , '$companyID')";

									$result4 = $conn-> query($query4);

									$message = "Review is uploaded succesfully";
									echo "<script type='text/javascript'>alert('$message');
									window.location = 'myReviewList.php' </script>";
								}

								else {
									$message = "Review Upload is failed!";
									echo "<script type='text/javascript'>alert('$message');</script>";
								}


				}
				?>
