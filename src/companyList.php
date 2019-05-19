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
					<h1 id="logo"><a href="index.php">Landed</a></h1>
					<nav id="nav">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li>
								<a href="#">Layouts</a>
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
							<li><a href="elements.php">Elements</a></li>
							<li><a href="#" class="button primary">Sign Up</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
							<h2>Company List</h2>
							<p>Ipsum dolor feugiat aliquam tempus sed magna lorem consequat accumsan</p>
						</header>
						<!-- Table -->
            <form method="post" action="#">
			<input type="text" name="search" placeholder="Search Company">
			<select name="filter">
				<option value="all">Select Filter(All show all companies)</option>
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
											</tr>
										</thead>
                    <?php
                        if(isset($_POST['submit']))
                        {
                          $filter = $_POST['filter'];
                          $search = $_POST['search'];
                          if($filter == 'all')
                          {
                            $query = "SELECT * FROM company;";
                            $result = $conn -> query($query);

                            if($result -> num_rows > 0)
                            {
                                while ($row = $result ->fetch_assoc())
                                {
                                    echo "<tr><td>" . $row['name'] . "</td><td>" . $row['industry'] . "</td><td>" . $row['sector'] . "</td><td>" . $row['revenue'] . "</td><td>" . $row['headquarter'] ."</td></tr>";
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
                                    echo "<tr><td>" . $row['name'] . "</td><td>" . $row['industry'] . "</td><td>" . $row['sector'] . "</td><td>" . $row['revenue'] . "</td><td>" . $row['headquarter'] ."</td></tr>";
                                }
                            }
                          }
                        }
                        else if(isset($_POST['ascending_sort']))
                        {
                          $filter = $_POST['sort'];
                          $query = "SELECT * FROM company ORDER BY $filter ASC;";
                          $result = $conn -> query($query);

                          if($result -> num_rows > 0)
                          {
                              while ($row = $result ->fetch_assoc())
                              {
                                  echo "<tr><td>" . $row['name'] . "</td><td>" . $row['industry'] . "</td><td>" . $row['sector'] . "</td><td>" . $row['revenue'] . "</td><td>" . $row['headquarter'] ."</td></tr>";
                              }
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
                                  echo "<tr><td>" . $row['name'] . "</td><td>" . $row['industry'] . "</td><td>" . $row['sector'] . "</td><td>" . $row['revenue'] . "</td><td>" . $row['headquarter'] ."</td></tr>";
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
                                  echo "<tr><td>" . $row['name'] . "</td><td>" . $row['industry'] . "</td><td>" . $row['sector'] . "</td><td>" . $row['revenue'] . "</td><td>" . $row['headquarter'] ."</td></tr>";
                              }
                          }
                        }

                    ?>
										<tfoot>
											<tr>
												<td colspan="2"></td>
											</tr>
										</tfoot>
									</table>
								</div>
							</section>
