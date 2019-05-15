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
                              <div class="col-12">
          											<select name="difficulty" id="difficulty">
          												<option value="">- Difficulty -</option>
          												<option value="1">Easy</option>
          												<option value="1">Medium</option>
          												<option value="1">Hard</option>
          											</select>
          										</div>
                              <div class="col-12 col-12-xsmall">
        												<input type="text" name="offer_status" id="offer_status" value="" placeholder="Offer Status" />
        											</div>
                              <div class="col-12 col-12-xsmall">
        												<input type="text" name="length" id="length" value="" placeholder="Length" />
        											</div>
                              <div class="col-12">
																<textarea name="equestions" id="questions" placeholder="Questions" rows="6"></textarea>
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
