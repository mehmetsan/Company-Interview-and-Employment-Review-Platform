<?php
include_once 'conn.php';
$companyID= $_SESSION['userID'];
 ?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>MESA</title>
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
    					<li><a href="home_page.php" class = "primary button">Home</a></li>
    					<li><a href="index.php" class = "primary button">Logout</a></li>
    				</ul>
					</nav>
				</header>

			<!-- Main -->
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
  							<h2>Review List</h2>
							<p>You can find every reviews about your company</p>
						</header>
						<!-- Table -->

							<section>
								<h4>Alternate</h4>
								<div class="table-wrapper">
									<table>
										<thead>
											<tr>
												<th>REQUEST</th>
											</tr>
										</thead>
                    <tbody>
                    <?php

                          $userID= $_SESSION['userID'];

                          //
                          /*
                          $query = "SELECT * FROM applies WHERE employeeID = '$userID'";
                          $result = $conn-> query($query);

                          if($result -> num_rows == 1)
                          {
                          	$info = $result->fetch_assoc();
                          	$query = "SELECT * FROM job WHERE jobID = '$info[jobID]'";
                          	$result = $conn-> query($query);

                          }
                          */
                          //
                          $query = "SELECT * FROM related WHERE companyID = '$userID'";
                          $result = $conn-> query($query);

                          if($result -> num_rows == 1)
                          {
                          	$info = $result->fetch_assoc();
                          	$query = "SELECT * FROM review WHERE reviewID = '$info[reviewID]'";
                          	$result = $conn-> query($query);

                          }
                          //
                          //$query = "SELECT reviewID FROM (SELECT reviewID FROM review NATURAL JOIN related WHERE requested = 1) as q WHERE q.companyID = '$companyID';";
                          //$result = $conn -> query($query);

                          if($result -> num_rows > 0)
                          {

                              while ($row = $result ->fetch_assoc())
                              {
                                $reviewID = $row['reviewID'];

                                $var=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$reviewID name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                </section>";
                                  echo "<tr><td>" .  $var ."</td></tr>";
                              }


                          }
                          else{
                            echo "<script type='text/javascript'>window.location = 'home_page.php' </script>";
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
                //$_SESSION['reviewID'] = $message;
                $update_statement = "UPDATE review SET requested =1 WHERE reviewID = '$message';";
            		$update_result = $conn-> query($update_statement);

            		echo "<script type='text/javascript'>window.location = 'home_page.php' </script>";
              }
               ?>
