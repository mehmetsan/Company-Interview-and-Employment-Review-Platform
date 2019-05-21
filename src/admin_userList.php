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
		<title>User List(Admin)</title>
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
              <li><a href="admin_userList.php" class ="button primary">User List</a></li>
              <li><a href="admin_userList.php" class ="button primary">Requested Reviews List</a></li>
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
							<h2>User List</h2>
						</header>
						<!-- Table -->
            <form method="post" action="#">
			<input type="text" name="search" placeholder="Search Company">
			<select name="filter">
				<option value="all">Select Filter(All show all users)</option>
				<option value="mail">type</option>
				<!--<option value="name">name</option>-->
				<option value="userID">userID</option>
        <option value="mail">mail</option>
			</select>
			<input type="submit" name="submit" value="Find">
      <select name="sort">
				<option value="all">Sort By</option>
        <option value="mail">type</option>
				<!--<option value="name">name</option>-->
				<option value="userID">userID</option>
        <option value="mail">mail</option>
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
												<th>Type</th>
												<!--<th>Name</th>-->
												<th>UserID</th>
                        <th>Mail</th>
                        <th>Remove</th>
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
                            $query = "SELECT * FROM user;";
                            $result = $conn -> query($query);

                            if($result -> num_rows > 0)
                            {

                                while ($row = $result ->fetch_assoc())
                                {
                                  $userID = $row['userID'];
                                  $type_query = "SELECT * FROM employee WHERE employeeID ='$userID'";
                                  $type_result = $conn -> query($type_query);
                                  $admin_query = "SELECT * FROM admin WHERE adminID ='$userID'";
                                  $admin_result = $conn -> query($admin_query);

                                  if ($type_result -> num_rows == 1){
                                    $type = 'employee';
                                  }
                                  else if ($type_result -> num_rows == 0 && $admin_result -> num_rows == 0){
                                    $type = 'company';
                                  }
                                  else{
                                    $type = 'not specified';
                                  }
                                  /*

                                  */
                                  $deneme_query = "SELECT * FROM testDeneme;";
                                  $deneme_result = $conn -> query($deneme_query);
                                  $userID = $deneme_result['userID'];
                                  /*

                                  */
                                  if ($deneme_result -> num_rows == 0){
                                    $rem_button = "<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$userID name =\"rem_button\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                  </section>";
                                    echo "<tr><td>" . $type . "</td><td>" . $deneme_result['userID'] . "</td><td>" . $deneme_result['mail'] . "</td><td>" .   $rem_button ."</td></tr>";
                                  }
                                  /*

                                  */
                            }
                          }
                        }
                        else
                        {
                          $query = "SELECT * FROM user where $filter LIKE '%$search%';";

                          $result = $conn -> query($query);
                          if($result -> num_rows > 0)
                          {
                            while ($row = $result ->fetch_assoc())
                            {
                              $userID = $row['userID'];
                              $type_query = "SELECT * FROM employee WHERE employeeID ='$userID'";
                              $type_result = $conn -> query($type_query);
                              $admin_query = "SELECT * FROM admin WHERE adminID ='$userID'";
                              $admin_result = $conn -> query($admin_query);

                              if ($type_result -> num_rows == 1){
                                $type = 'employee';
                              }
                              else if ($type_result -> num_rows == 0 && $admin_result -> num_rows == 0){
                                $type = 'company';
                              }
                              else{
                                $type = 'not specified';
                              }

                              /*

                              */
                              $deneme_query = "SELECT * FROM testDeneme;";
                              $deneme_result = $conn -> query($deneme_query);
                              $userID = $deneme_result['userID'];
                              /*

                              */
                              if ($deneme_result -> num_rows == 0){
                                $rem_button = "<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$userID name =\"rem_button\" class=\"primary\"/></li>	</ul>	</div>	</form>
                              </section>";
                                echo "<tr><td>" . $type . "</td><td>" . $deneme_result['userID'] . "</td><td>" . $deneme_result['mail'] . "</td><td>" .   $rem_button ."</td></tr>";
                              }
                              /*

                              */
                          }

                          }
                        }
                      }

                      else if(isset($_POST['ascending_sort']))
                      {
                        $filter = $_POST['sort'];
                        $query = "SELECT * FROM user ORDER BY $filter ASC;";
                        $result = $conn -> query($query);

                        while ($row = $result ->fetch_assoc())
                        {
                          $userID = $row['userID'];
                          $type_query = "SELECT * FROM employee WHERE employeeID ='$userID'";
                          $type_result = $conn -> query($type_query);
                          $admin_query = "SELECT * FROM admin WHERE adminID ='$userID'";
                          $admin_result = $conn -> query($admin_query);

                          if ($type_result -> num_rows == 1){
                            $type = 'employee';
                          }
                          else if ($type_result -> num_rows == 0 && $admin_result -> num_rows == 0){
                            $type = 'company';
                          }
                          else{
                            $type = 'not specified';
                          }
                          /*

                          */
                          $deneme_query = "SELECT * FROM testDeneme;";
                          $deneme_result = $conn -> query($deneme_query);
                          $userID = $deneme_result['userID'];
                          /*

                          */
                          if ($deneme_result -> num_rows == 0){
                            $rem_button = "<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$userID name =\"rem_button\" class=\"primary\"/></li>	</ul>	</div>	</form>
                          </section>";
                            echo "<tr><td>" . $type . "</td><td>" . $deneme_result['userID'] . "</td><td>" . $deneme_result['mail'] . "</td><td>" .   $rem_button ."</td></tr>";
                          }
                          /*

                          */
                        }
                      }

                      else if(isset($_POST['descending_sort']))
                      {
                        $filter = $_POST['sort'];
                        $query = "SELECT * FROM user ORDER BY $filter DESC;";

                        $result = $conn -> query($query);

                        if($result -> num_rows > 0)
                        {
                          while ($row = $result ->fetch_assoc())
                          {
                            $userID = $row['userID'];
                            $type_query = "SELECT * FROM employee WHERE employeeID ='$userID'";
                            $type_result = $conn -> query($type_query);
                            $admin_query = "SELECT * FROM admin WHERE adminID ='$userID'";
                            $admin_result = $conn -> query($admin_query);

                            if ($type_result -> num_rows == 1){
                              $type = 'employee';
                            }
                            else if ($type_result -> num_rows == 0 && $admin_result -> num_rows == 0){
                              $type = 'company';
                            }
                            else{
                              $type = 'not specified';
                            }
                            /*

                            */
                            $deneme_query = "SELECT * FROM testDeneme;";
                            $deneme_result = $conn -> query($deneme_query);
                            $userID = $deneme_result['userID'];
                            /*

                            */
                            if ($deneme_result -> num_rows == 0){
                              $rem_button = "<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$userID name =\"rem_button\" class=\"primary\"/></li>	</ul>	</div>	</form>
                            </section>";
                              echo "<tr><td>" . $type . "</td><td>" . $deneme_result['userID'] . "</td><td>" . $deneme_result['mail'] . "</td><td>" .   $rem_button ."</td></tr>";
                            }
                            /*

                            */
                          }
                        }
                      }

                        else
                        {
                          $deneme_query = "SELECT * FROM testDeneme;";
                          $deneme_result = $conn -> query($deneme_query);

                          if($deneme_result -> num_rows > 0)
                          {
                            while ($row = $deneme_result ->fetch_assoc())
                            {
                              $userID = $row['userID'];
                              $type_query = "SELECT * FROM employee WHERE employeeID ='$userID'";
                              $type_result = $conn -> query($type_query);
                              $admin_query = "SELECT * FROM admin WHERE adminID ='$userID'";
                              $admin_result = $conn -> query($admin_query);

                              if ($type_result -> num_rows == 1){
                                $type = 'employee';
                              }
                              else if ($type_result -> num_rows == 0 && $admin_result -> num_rows == 0){
                                $type = 'company';
                              }
                              else{
                                $type = 'not specified';
                              }
                              if ($admin_result -> num_rows == 0){
                                $rem_button = "<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$userID name =\"rem_button\" class=\"primary\"/></li>	</ul>	</div>	</form>
                              </section>";
                                echo "<tr><td>" . $type . "</td><td>" . $row['userID'] . "</td><td>" . $row['mail'] . "</td><td>" .   $rem_button ."</td></tr>";
                              }
                              /*

                              */
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
              if(isset($_POST['rem_button']))
              {
                $toBeDeleted = $_POST['rem_button'];
                $deletion_query = "DELETE FROM user where userID = '$toBeDeleted'";
                $deletion_result = $conn -> query($deletion_query);
                if ($deletion_result){
                  $message ="removed";
                  echo "<script type='text/javascript'>alert('$message');
                  window.location = 'admin_userList.php' </script>";
                }
              }

               ?>
