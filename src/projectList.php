<?php
include_once 'conn.php';

$userType = $_SESSION['UserType'];

 ?>
<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Projects List</title>
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
              <?php
                if ($userType=="employee") {
                    echo "<li><a href=\"employeeProfile.php\" class =\"button primary\">Profile</a></li>";
                    echo "<li><a href=\"companyList.php\" class =\"button primary\">Companies</a></li>";
                    echo "<li><a href=\"jobList.php\" class =\"button primary\">Jobs</a></li>";
                    echo "<li><a href=\"allProjectList.php\" class =\"button primary\">Projects</a></li>";
                }
                else {
                  echo "<li><a href=\"companyProfile.php\" class =\"button primary\">Profile</a></li>";
                }
               ?>
              <li><a href="index.php" class ="button primary">Logout</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
							<h2>Project List</h2>
							<p>You can find every projects from the company here.</p>
						</header>
						<!-- Table -->
            <form method="post" action="#">
			<input type="text" name="search" placeholder="Search Projects">
			<select name="filter">
				<option value="all">Select Filter(Show all projects)</option>
				<option value="title">Project Title</option>
        <option value="position">Status</option>
			</select>
			<input type="submit" name="submit" value="Find">
      <select name="sort">
				<option value="all">Sort By</option>
				<option value="title">Project Title</option>
        <option value="position">Status</option>
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
												<th>Project Title</th>
												<th>Status</th>
                        <th>Link to Project Page</th>
											</tr>
										</thead>
                    <tbody>
                    <?php
                    if(isset($_POST['submit']))
                    {
                      $userType = $_SESSION['UserType'];
                      if($userType == "company"){
                        $companyID = $_SESSION['userID'];
                      }
                      else
                        $companyID = $_SESSION['companyID'];
                          $filter = $_POST['filter'];
                          $search = $_POST['search'];
                          if($filter == 'all')
                          {

                            $query = "SELECT * FROM project WHERE companyID = '$companyID';";
                            $result = $conn -> query($query);

                            if($result -> num_rows > 0)
                            {

                                while ($row = $result ->fetch_assoc())
                                {
                                  $projectID = $row['projectID'];

                                  $var=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$projectID name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                  </section>";
                                    echo "<tr><td>" . $row['title'] . "</td><td>" . $row['status'] .  "</td><td>" . $var ."</td></tr>";
                                }


                            }
                          }
                          else
                          {
                            $query = "SELECT * FROM project where companyID = '$companyID' AND $filter LIKE '%$search%';";

                            $result = $conn -> query($query);

                            if($result -> num_rows > 0)
                            {
                              while ($row = $result ->fetch_assoc())
                              {
                                $projectID = $row['projectID'];
                                $var=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$projectID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                </section>";
                                  echo "<tr><td>" . $row['title'] . "</td><td>" . $row['status'] .   "</td><td>" . $var ."</td></tr>";
                              }

                            }
                        }
                      }

                        else if(isset($_POST['ascending_sort']))
                        {
                          $userType = $_SESSION['UserType'];
                          if($userType == "company"){
                            $companyID = $_SESSION['userID'];
                          }
                          else
                            $companyID = $_SESSION['companyID'];
                          $filter = $_POST['sort'];
                          $query = "SELECT * FROM project where companyID = '$companyID' ORDER BY $filter ASC;";
                          $result = $conn -> query($query);

                          while ($row = $result ->fetch_assoc())
                          {
                            $projectID = $row['projectID'];
                            $var=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$projectID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                            </section>";
                              echo "<tr><td>" . $row['title'] . "</td><td>" . $row['status'] .  "</td><td>" . $var ."</td></tr>";
                          }

                        }
                        else if(isset($_POST['descending_sort']))
                        {
                          $userType = $_SESSION['UserType'];
                          if($userType == "company"){
                            $companyID = $_SESSION['userID'];
                          }
                          else
                            $companyID = $_SESSION['companyID'];
                          $filter = $_POST['sort'];
                          $query = "SELECT * FROM project where companyID = '$companyID' ORDER BY $filter DESC;";

                          $result = $conn -> query($query);

                          if($result -> num_rows > 0)
                          {
                            while ($row = $result ->fetch_assoc())
                            {
                              $projectID = $row['projectID'];
                              $var=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$projectID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                              </section>";
                                echo "<tr><td>" . $row['title'] . "</td><td>" . $row['status'] .  "</td><td>" . $var ."</td></tr>";
                            }


                          }
                        }
                        else
                        {
                          $userType = $_SESSION['UserType'];
                          if($userType == "company"){
                            $companyID = $_SESSION['userID'];
                          }
                          else
                            $companyID = $_SESSION['companyID'];
                          $query = "SELECT * FROM project where companyID = '$companyID';";
                          $result = $conn -> query($query);

                          if($result -> num_rows > 0)
                          {
                            while ($row = $result ->fetch_assoc())
                            {
                              $projectID = $row['projectID'];
                              $var=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$projectID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                              </section>";
                                echo "<tr><td>" . $row['title'] . "</td><td>" . $row['status'] .  "</td><td>" . $var ."</td></tr>";
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
                <?php

                    if($userType == "company")
                      echo "<a href=\"companyProfile.php\" class=\"button primary\" style=\"text-align:center\">Return To Company Page</a>";
                    else {
                      echo "<a href=\"companyPage.php\" class=\"button primary\" style=\"text-align:center\">Return To Company Page</a>";

                    }
                 ?>
							</section>

              <?php
              if(isset($_POST['link']))
              {
                $message =$_POST['link'];
                $_SESSION['projectID'] = $message;
                echo "<script type='text/javascript'>window.location = 'projectPage.php' </script>";
              }
               ?>
