<?php
include_once 'conn.php';
$companyID = $_SESSION['userID'];
 ?>
<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Employee List</title>
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
							<h2>Employee List</h2>
							<p>Look for all employees</p>
						</header>
						<!-- Table -->
            <form method="post" action="#">
			<input type="text" name="search" placeholder="Search Employee">
			<select name="filter">
				<option value="all">Select Filter(All employees)</option>
				<option value="first_name">Employee First Name</option>
        <option value="last_name">Employee Last Name</option>
			</select>
      <input type="submit" name="submit" value="Find">
		</form>
							<section>
								<h4>Alternate</h4>
								<div class="table-wrapper">
									<table>
										<thead>
											<tr>
												<th>Employee Name</th>
												<th>Employee Surname</th>
												<th>Highest Education</th>
                        <th>Link to Employee Page</th>
											</tr>
										</thead>
                    <tbody>
                    <?php
                    ob_start();
                    if(isset($_POST['submit']))
                    {
													$companyID = $_SESSION['userID'];
                          $filter = $_POST['filter'];
                          $search = $_POST['search'];
                          if($filter == 'all')
                          {

                                $qu = "SELECT * FROM employee ;";
                                $result = $conn -> query($qu);
                            		if($result -> num_rows > 0)
                            		{

	                                while ($row = $result ->fetch_assoc())
	                                {
	                                  $employeeID = $row['employeeID'];
	                                  //$var2=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$companyID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>	</section>";

	                                  $var=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$employeeID name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
	                                  </section>";
	                                    echo "<tr><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td><td>" . $row['highest_education'] . "</td><td>" . $var ."</td></tr>";
	                                }

															}


												}
                          else
                          {

                                $qu = "SELECT * FROM employee WHERE $filter LIKE '%$search%';";
                                $result = $conn -> query($qu);
                            		if($result -> num_rows > 0)
                            		{

																			while ($row = $result ->fetch_assoc())
																			{
																				$employeeID = $row['employeeID'];
																				//$var2=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$companyID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>	</section>";

																				$var=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$employeeID name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
																				</section>";
																					echo "<tr><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td><td>" . $row['highest_education'] . "</td><td>" . $var ."</td></tr>";
																			}

                            		}
													}


                      }
                      else {
                        $qu = "SELECT * FROM employee ;";
                        $result = $conn -> query($qu);
                        if($result -> num_rows > 0)
                        {

                          while ($row = $result ->fetch_assoc())
                          {
                            $employeeID = $row['employeeID'];
                            //$var2=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$companyID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>	</section>";

                            $var=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$employeeID name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                            </section>";
                              echo "<tr><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td><td>" . $row['highest_education'] . "</td><td>" . $var ."</td></tr>";
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
								$_SESSION['employeeID'] = $message;
                echo "<script type='text/javascript'>window.location = 'employeeProfile.php' </script>";
              }
               ?>
