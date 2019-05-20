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
		<title>Elements - Landed by HTML5 UP</title>
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
							<li><a href="home_page.php">Home</a></li>
							<li>
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
							<li><a href="index.php" class="button primary">Logout</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
							<h2>Job List</h2>
							<p>You can find every job offers on here.</p>
						</header>
			<!-- Table -->
      <form method="post" action="#">
			<input type="text" name="search" placeholder="Search Jobs">
			<select name="filter">
				<option value="all">Select Filter(Show all jobs)</option>
				<option value="title">Job Title</option>
        <option value="position">Position</option>
			</select>
			<input type="submit" name="submit" value="Find">
      <select name="sort">
				<option value="all">Sort By</option>
        <option value="High School">Salary of High School Jobs</option>
        <option value="Bachelors">Salary of Bachelors Jobs</option>
        <option value="Masters">Salary of Masters Jobs</option>
        <option value="PhD">Salary of PhD Jobs</option>
        <option value="Internship">Salary of Internship Jobs</option>
        <option value="Part Time">Salary of Part Time Jobs</option>
        <option value="Full Time">Salary of Full Time Jobs</option>
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
                        <th>Company Name</th>
												<th>Job Title</th>
												<th>Education</th>
                        <th>Position</th>
                        <th>Type</th>
                        <th>Salary</th>
                        <th>Link to Job Page</th>
											</tr>
										</thead>
                    <tbody>
                    <?php
                    if(isset($_POST['submit']))
                    {
                          $filter = $_POST['filter'];
                          $search = $_POST['search'];
                          if($filter == 'all')
                          {
                            $query = "SELECT * FROM job";
                            $result = $conn -> query($query);

                            if($result -> num_rows > 0)
                            {

                                while ($row = $result ->fetch_assoc())
                                {
                                  $jobID = $row['jobID'];
                                  $companyID = $row['companyID'];
                                  $queryCompany = "SELECT name FROM company WHERE companyID = '$companyID';";
                                  $resultCompany = $conn -> query($queryCompany);
                                  $companyName = $resultCompany ->fetch_assoc();
                                  $companyName = $companyName['name'];

                                  $var=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$jobID name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                  </section>";

                                  echo "<tr><td>"  . $companyName . "</td><td>". $row['title'] . "</td><td>" . $row['education'] .  "</td><td>" . $row['position'] .  "</td><td>" . $row['type'] .  "</td><td>" . $row['salary'] .  "</td><td>" . $var ."</td></tr>";
                                }
                            }
                          }
                          else
                          {
                              $query = "SELECT * FROM job where $filter LIKE '%$search%';";

                              $result = $conn -> query($query);

                              if($result -> num_rows > 0)
                              {
                                while ($row = $result ->fetch_assoc())
                                {
                                  $jobID = $row['jobID'];
                                  $companyID = $row['companyID'];
                                  $queryCompany = "SELECT name FROM company WHERE companyID = '$companyID';";
                                  $resultCompany = $conn -> query($queryCompany);
                                  $companyName = $resultCompany ->fetch_assoc();
                                  $companyName = $companyName['name'];

                                  $var=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$jobID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                  </section>";
                                  echo "<tr><td>"  . $companyName . "</td><td>". $row['title'] . "</td><td>" . $row['education'] .  "</td><td>" . $row['position'] .  "</td><td>" . $row['type'] .  "</td><td>" . $row['salary'] .  "</td><td>" . $var ."</td></tr>";
                                }

                              }

                        }
                      }

                        else if(isset($_POST['ascending_sort']))
                        {
                            $filter = $_POST['sort'];
                            if($filter == 'High School' || $filter == 'Bachelors' || $filter == 'Masters' || $filter == 'PhD')
                            {
                              $query = "SELECT * FROM job WHERE education = '$filter' ORDER BY salary ASC;";
                              $result = $conn -> query($query);

                              while ($row = $result ->fetch_assoc())
                              {
                                $jobID = $row['jobID'];
                                $companyID = $row['companyID'];
                                $queryCompany = "SELECT name FROM company WHERE companyID = '$companyID';";
                                $resultCompany = $conn -> query($queryCompany);
                                $companyName = $resultCompany ->fetch_assoc();
                                $companyName = $companyName['name'];

                                $var=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$jobID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                </section>";
                                echo "<tr><td>"  . $companyName . "</td><td>". $row['title'] . "</td><td>" . $row['education'] .  "</td><td>" . $row['position'] .  "</td><td>" . $row['type'] .  "</td><td>" . $row['salary'] .  "</td><td>" . $var ."</td></tr>";
                              }
                            }
                            else {
                              $query = "SELECT * FROM job WHERE type = '$filter' ORDER BY salary ASC;";
                              $result = $conn -> query($query);

                              while ($row = $result ->fetch_assoc())
                              {
                                $jobID = $row['jobID'];
                                $companyID = $row['companyID'];
                                $queryCompany = "SELECT name FROM company WHERE companyID = '$companyID';";
                                $resultCompany = $conn -> query($queryCompany);
                                $companyName = $resultCompany ->fetch_assoc();
                                $companyName = $companyName['name'];

                                $var=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$jobID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                </section>";
                                echo "<tr><td>"  . $companyName . "</td><td>". $row['title'] . "</td><td>" . $row['education'] .  "</td><td>" . $row['position'] .  "</td><td>" . $row['type'] .  "</td><td>" . $row['salary'] .  "</td><td>" . $var ."</td></tr>";
                              }
                            }
                        }
                        else if(isset($_POST['descending_sort']))
                        {
                          $filter = $_POST['sort'];
                          if($filter == 'High School' || $filter == 'Bachelors' || $filter == 'Masters' || $filter == 'PhD')
                          {
                            $query = "SELECT * FROM job WHERE education = '$filter' ORDER BY salary DESC;";
                            $result = $conn -> query($query);

                            while ($row = $result ->fetch_assoc())
                            {
                              $jobID = $row['jobID'];
                              $companyID = $row['companyID'];
                              $queryCompany = "SELECT name FROM company WHERE companyID = '$companyID';";
                              $resultCompany = $conn -> query($queryCompany);
                              $companyName = $resultCompany ->fetch_assoc();
                              $companyName = $companyName['name'];

                              $var=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$jobID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                              </section>";
                              echo "<tr><td>"  . $companyName . "</td><td>". $row['title'] . "</td><td>" . $row['education'] .  "</td><td>" . $row['position'] .  "</td><td>" . $row['type'] .  "</td><td>" . $row['salary'] .  "</td><td>" . $var ."</td></tr>";
                            }
                          }
                          else {
                            $query = "SELECT * FROM job WHERE type = '$filter' ORDER BY salary DESC;";
                            $result = $conn -> query($query);

                            while ($row = $result ->fetch_assoc())
                            {
                              $jobID = $row['jobID'];
                              $companyID = $row['companyID'];
                              $queryCompany = "SELECT name FROM company WHERE companyID = '$companyID';";
                              $resultCompany = $conn -> query($queryCompany);
                              $companyName = $resultCompany ->fetch_assoc();
                              $companyName = $companyName['name'];

                              $var=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$jobID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                              </section>";
                              echo "<tr><td>"  . $companyName . "</td><td>". $row['title'] . "</td><td>" . $row['education'] .  "</td><td>" . $row['position'] .  "</td><td>" . $row['type'] .  "</td><td>" . $row['salary'] .  "</td><td>" . $var ."</td></tr>";
                            }
                          }
                        }
                        else
                        {
                          $query = "SELECT * FROM job;";
                          $result = $conn -> query($query);

                          if($result -> num_rows > 0)
                          {
                            while ($row = $result ->fetch_assoc())
                            {
                              $jobID = $row['jobID'];
                              $companyID = $row['companyID'];
                              $queryCompany = "SELECT name FROM company WHERE companyID = '$companyID';";
                              $resultCompany = $conn -> query($queryCompany);
                              $companyName = $resultCompany ->fetch_assoc();
                              $companyName = $companyName['name'];

                              $var=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$jobID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                              </section>";
                              echo "<tr><td>"  . $companyName . "</td><td>". $row['title'] . "</td><td>" . $row['education'] .  "</td><td>" . $row['position'] .  "</td><td>" . $row['type'] .  "</td><td>" . $row['salary'] .  "</td><td>" . $var ."</td></tr>";
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
                $message =$_POST['link'];
                $_SESSION['jobID'] = $message;
                $temp = "<script>window.location ='jobPage.php';</script>";
                echo $temp;
              }
               ?>
