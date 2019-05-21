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
		<title>Review List (Admin)</title>
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
              <li><a href="admin_control.php" class ="button primary">Home</a></li>
              <li><a href="index.php" class ="button primary">Logout</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
							<h2>Review List</h2>
						</header>
						<!-- Table -->
            <form method="post" action="#">
			<input type="text" name="search" placeholder="Search Company">
			<select name="filter">
				<option value="all">Select Filter(All show all Requested Reviews)</option>
				<option value="reviewID">ReviewID</option>
			</select>
			<input type="submit" name="submit" value="Find">
      <select name="sort">
				<option value="all">Sort By</option>
				<option value="reviewID">ReviewID</option>
			</select>
			<input type="submit" name="ascending_sort" value="Ascending Sort">
      <input type="submit" name="descending_sort" value="Descending Sort">
		</form>
							<section>
								<h4>Alternate</h4>
								<div class="table-wrapper">
									<table>
										<thead>
											<tr>
												<th>reviewID</th>
                        <th>Remove Review</th>
                        <th>Display Review</th>
											</tr>
										</thead>
                    <tbody>
                    <?php
                    ob_start();
                    if(isset($_POST['submit']))
                    {

                          $filter = $_POST['filter'];
                          $search = $_POST['search'];
                          if($filter == 'all')
                          {
                            $query = "SELECT * FROM review WHERE requested = 1;";
                            $result = $conn -> query($query);

                            if($result -> num_rows > 0)
                            {

                                while ($row = $result ->fetch_assoc())
                                {
                                  $reviewID = $row['reviewID'];
                                  //$var2=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$companyID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>	</section>";

                                  $var=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$reviewID name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                  </section>";
                                  $navi=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$reviewID name =\"navi\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                  </section>";
                                    echo "<tr><td>" . $row['reviewID'] . "</td><td>" .  $var . "</td><td>" .  $navi."</td></tr>";
                                }


                            }
                          }
                          else
                          {
                            $query = "SELECT * FROM review where requested= 1 AND $filter LIKE '%$search%';";

                            $result = $conn -> query($query);

                            if($result -> num_rows > 0)
                            {

                                while ($row = $result ->fetch_assoc())
                                {
                                  $reviewID = $row['reviewID'];
                                  //$var2=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$companyID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>	</section>";

                                  $var=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$reviewID name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                  </section>";
                                  $navi=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$reviewID name =\"navi\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                  </section>";
                                    echo "<tr><td>" . $row['reviewID'] . "</td><td>" .  $var . "</td><td>" .  $navi."</td></tr>";
                                }


                            }
                        }
                      }

                        else if(isset($_POST['ascending_sort']))
                        {
                          $filter = $_POST['sort'];
                          $query = "SELECT * FROM review WHERE requested=1 ORDER BY $filter ASC;";
                          $result = $conn -> query($query);

                          if($result -> num_rows > 0)
                          {

                              while ($row = $result ->fetch_assoc())
                              {
                                $reviewID = $row['reviewID'];
                                //$var2=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$companyID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>	</section>";

                                $var=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$reviewID name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                </section>";
                                $navi=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$reviewID name =\"navi\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                </section>";
                                  echo "<tr><td>" . $row['reviewID'] . "</td><td>" .  $var . "</td><td>" .  $navi."</td></tr>";
                              }


                          }
                        }
                        else if(isset($_POST['descending_sort']))
                        {
                          $filter = $_POST['sort'];
                          $query = "SELECT * FROM review WHERE requested = 1 ORDER BY $filter DESC;";
                          $result = $conn -> query($query);

                          if($result -> num_rows > 0)
                          {

                              while ($row = $result ->fetch_assoc())
                              {
                                $reviewID = $row['reviewID'];
                                //$var2=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$companyID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>	</section>";

                                $var=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$reviewID name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                </section>";
                                $navi=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$reviewID name =\"navi\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                </section>";
                                  echo "<tr><td>" . $row['reviewID'] . "</td><td>" .  $var . "</td><td>" .  $navi."</td></tr>";
                              }


                          }
                        }
                        else
                        {
                          $query = "SELECT * FROM review WHERE requested = 1;";
                          $result = $conn -> query($query);

                          if($result -> num_rows > 0)
                          {

                              while ($row = $result ->fetch_assoc())
                              {
                                $reviewID = $row['reviewID'];
                                //$var2=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$companyID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>	</section>";

                                $var=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$reviewID name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                </section>";
                                $navi=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$reviewID name =\"navi\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                </section>";
                                  echo "<tr><td>" . $row['reviewID'] . "</td><td>" .  $var . "</td><td>" .  $navi."</td></tr>";
                              }


                          }
                        }

                    ?>
                    </tbody>
										<tfoot>
											<tr>
												<td colspan="2"></td>
											</tr>
										</tfoot>

									</table>
								</div>
							</section>

              <?php
              if(isset($_POST['link']))
              {
                $toBeDeleted = $_POST['link'];
                $deletion_query = "DELETE FROM review where reviewID = '$toBeDeleted'";
                $deletion_result = $conn -> query($deletion_query);
                if ($deletion_result){
                  $message ="removed";
                  // the message
                  $msg = "your review is deleted";

                  // use wordwrap() if lines are longer than 70 characters
                  $msg = wordwrap($msg,70);

                  // send email
                  mail("abegum991@gmail.com","Removal Request",$msg);
                  echo "<script type='text/javascript'>alert('$message');
                  window.location = 'admin_reviewList.php' </script>";
                }
              }
              if(isset($_POST['navi']))
              {
                $message =$_POST['navi'];
                $_SESSION['reviewID'] = $message;
                $reviewType = findReviewType($message);
                if($reviewType == "salary_review")
                  header("Location: displaySalaryReview.php");

                else if($reviewType == "benefits_review")
                  header("Location: displayBenefitsReview.php");

                else if($reviewType == "general_review")
                  header("Location: displayGeneralReview.php");

                else if($reviewType == "interview_review")
                  header("Location: displayInterviewReview.php");
              }
               ?>
