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
							<h2>FollowingList</h2>
							<p>Ipsum dolor feugiat aliquam tempus sed magna lorem consequat accumsan</p>
						</header>
						<!-- Table -->
            <form method="post" action="#">
			<input type="text" name="search" placeholder="Search Company">
			<select name="filter">
				<option value="all">Select Filter(All followed companies)</option>
				<option value="name">Company Name</option>
				<option value="industry">Industry</option>
        <option value="sector">Sector</option>
        <option value="headquarter">Headquarter</option>
			</select>
			<input type="submit" name="submit" value="Find">
      <select name="sort">
				<option value="all">Sort By</option>
				<option value="name">Company Name</option>
				<option value="industry">Industry</option>
        <option value="sector">Sector</option>
        <option value="headquarter">Headquarter</option>
        <option value="revenue">Revenue</option>
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
												<th>Industry</th>
												<th>Sector</th>
                        <th>Revenue</th>
                        <th>Headquarter</th>
                        <th>Link to Company Page</th>
											</tr>
										</thead>
                    <tbody>
                    <?php
                    ob_start();
                    if(isset($_POST['submit']))
                    {
													$employeeID = $_SESSION['userID'];
                          $filter = $_POST['filter'];
                          $search = $_POST['search'];
                          if($filter == 'all')
                          {
														$qu = "SELECT companyID FROM follows WHERE employeeID = '$employeeID';";
														$result = $conn -> query($qu);

														if($result -> num_rows > 0)
                            {
                                while ($row = $result ->fetch_assoc())
                                {

                            				$query = "SELECT * FROM company WHERE companyID = $row['companyID'];";
                            				$result2 = $conn -> query($query);

                            		if($result2 -> num_rows > 0)
                            		{

                                while ($row = $result2 ->fetch_assoc())
                                {
                                  $companyID = $row['companyID'];
                                  //$var2=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$companyID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>	</section>";

                                  $var=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$companyID name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                  </section>";
                                    echo "<tr><td>" . $row['name'] . "</td><td>" . $row['industry'] . "</td><td>" . $row['sector'] . "</td><td>" . $row['revenue'] . "</td><td>" . $row['headquarter'] . "</td><td>" . $var ."</td></tr>";
                                }

															}
                            }
                          }
                          else
                          {
                            $query = "SELECT * FROM company where $filter LIKE '%$search%';";

                            $result = $conn -> query($query);

                            if($result -> num_rows > 0)
                            {
                              while ($row = $result ->fetch_assoc())
                              {
                                $companyID = $row['companyID'];
                                $var=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$companyID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                </section>";
                                  echo "<tr><td>" . $row['name'] . "</td><td>" . $row['industry'] . "</td><td>" . $row['sector'] . "</td><td>" . $row['revenue'] . "</td><td>" . $row['headquarter'] . "</td><td>" . $var ."</td></tr>";
                              }

                            }
                        }
                      }

                        else if(isset($_POST['ascending_sort']))
                        {
                          $filter = $_POST['sort'];
                          $query = "SELECT * FROM company ORDER BY $filter ASC;";
                          $result = $conn -> query($query);

                          while ($row = $result ->fetch_assoc())
                          {
                            $companyID = $row['companyID'];
                            $var=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$companyID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                            </section>";
                              echo "<tr><td>" . $row['name'] . "</td><td>" . $row['industry'] . "</td><td>" . $row['sector'] . "</td><td>" . $row['revenue'] . "</td><td>" . $row['headquarter'] . "</td><td>" . $var ."</td></tr>";
                          }

                        }
                        else if(isset($_POST['descending_sort']))
                        {
                          $filter = $_POST['sort'];
                          $query = "SELECT * FROM company ORDER BY $filter DESC;";

                          $result = $conn -> query($query);

                          if($result -> num_rows > 0)
                          {
                            while ($row = $result ->fetch_assoc())
                            {
                              $companyID = $row['companyID'];
                              $var=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$companyID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                              </section>";
                                echo "<tr><td>" . $row['name'] . "</td><td>" . $row['industry'] . "</td><td>" . $row['sector'] . "</td><td>" . $row['revenue'] . "</td><td>" . $row['headquarter'] . "</td><td>" . $var ."</td></tr>";
                            }


                          }
                        }
                        else
                        {
                          $query = "SELECT * FROM company;";
                          $result = $conn -> query($query);

                          if($result -> num_rows > 0)
                          {
                            while ($row = $result ->fetch_assoc())
                            {
                              $companyID = $row['companyID'];
                              $var=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$companyID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                              </section>";
                                echo "<tr><td>" . $row['name'] . "</td><td>" . $row['industry'] . "</td><td>" . $row['sector'] . "</td><td>" . $row['revenue'] . "</td><td>" . $row['headquarter'] . "</td><td>" . $var ."</td></tr>";
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
                $_SESSION['companyID'] = $message;
                header("Location: companyPage.php");
              }
               ?>
