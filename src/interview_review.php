<?php
	include_once 'conn.php';
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Create an Interview Review</title>
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
        							<h2>Create an Interview Review</h2>
        							<p></p>
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
														<div class="col-12 col-12-xsmall">
															<input type="text" name="salary" id="salary" value="" placeholder="Salary" />
														</div>
														<div class="col-12">
															<textarea name="comment" id="comment" placeholder="Enter your comments about the review here..." rows="6"></textarea>
														</div>

                              <!--
                              	Review specializations
                                experiences
                                reach
                                difficulty
                                offer_status
                                length
                                questions
                              -->
                              <div class="col-12">
																<textarea name="experiences" id="experiences" placeholder="Enter your experiences here.." rows="6"></textarea>
															</div>
                              <div class="col-12 col-12-xsmall">
        												<input type="text" name="reach" id="reach" value="" placeholder="How did you reach the interview?" />
        											</div>
															<div class="col-12 col-12-xsmall">
        												<input type="text" name="difficulty" id="difficulty" value="" placeholder="Difficulty(integer)*" />
        											</div>
															<div class="col-12">
																<select name="offer_status" id="offer_status">
																	<option value="">Offer Status*</option>
																	<option value="0">Offered</option>
																	<option value="1">Not Offered</option>
																</select>
															</div>
                              <div class="col-12 col-12-xsmall">
        												<input type="text" name="length" id="length" value="" placeholder="Length (integer)*" />
        											</div>
                              <div class="col-12">
																<textarea name="questions" id="questions" placeholder="Questions" rows="6"></textarea>
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
        													<li><input type="submit" value="submit" name ="submit" class="primary"/></li>
        													<li><input type="reset" value="reset" /></li>
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

												$experiences = $_POST['experiences'];
												$reach = $_POST['reach'];
												$difficulty = $_POST['difficulty'];
												$offer_status = $_POST['offer_status'];
												$length = $_POST['length'];
												$questions = $_POST['questions'];


												$qu = "SELECT * FROM review WHERE reviewID = '$reviewID' ";
												$res = $conn-> query($qu);
												if($res -> num_rows == 0){

													$query = "INSERT INTO review(reviewID,Employment_status,job_title,publish_date,rating,location,comment, visibility)
																		VALUES('$reviewID' , '$employment_status' , '$job_title' , '2008-11-11' , '$rating' , '$location','$comment', '$visibility')";


													$result = $conn-> query($query);
													$query2 = "INSERT INTO interview_review(reviewID,experiences,reach,difficulty,offer_status,length,Questions)
																		VALUES('$reviewID' , '$experiences', '$reach', '$difficulty', '$offer_status', '$length', '$questions')";


													$result2 = $conn-> query($query2);

													$message = "Review is uploaded succesfully";
													echo "<script type='text/javascript'>alert('$message');
													window.location = 'home_page.php' </script>";
												}

												else {
													$message = "Review Upload is failed!";
													echo "<script type='text/javascript'>alert('$message');</script>";
												}


								}
								?>
