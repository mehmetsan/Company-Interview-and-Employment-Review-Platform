<?php
	include_once 'conn.php';
	$userID = $_SESSION['companyID'];
	$query = "SELECT * FROM company WHERE companyID = '$userID'";
	$result = $conn-> query($query);

  $employeeID = $_SESSION['userID'];
	$query = "SELECT * FROM follows WHERE employeeID = '$employeeID'";
	$result2 = $conn-> query($query);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Landed by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

		<style>
			form {
				text-align: center;
			}
		</style>
	</head>

	<body class="is-preload landing">
		<header id="header">
			<nav id="nav">
				<ul>
					<li><a href="home_page.php" class ="button primary">Home</a></li>
					<li><a href="employeeProfile.php" class ="button primary">Profile</a></li>
					<li><a href="companyList.php" class ="button primary">Companies</a></li>
					<li><a href="jobList.php" class ="button primary">Jobs</a></li>
					<li><a href="projectList.php" class ="button primary">Projects</a></li>
					<li><a href="index.php" class ="button primary">Logout</a></li>
				</ul>
			</nav>
		</header>

		<section>
			<h3>Company Profile</h3>
			<h4>Details</h4>
      <ul>
        <img src="images/microsoft.jpg" alt="">
        <img src="images/theme.jpg" alt="" style="margin: 0px 0px 0px 200px">
      </ul>

			<div class="table-wrapper">
				<table>
					<thead>
						<tr>
							<th></th>
							<th></th>

						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Company Name</td>
							<?php
							$query = "SELECT * FROM company WHERE companyID = '$userID'";
							$result = $conn-> query($query);
							while ($arr = $result ->fetch_assoc())
							{
						  	echo "<td>" . $arr['name'] . "</td>";
							}
							?>
						</tr>
						<tr>
							<td>Website Link</td>
							<?php
							$query = "SELECT * FROM company WHERE companyID = '$userID'";
							$result = $conn-> query($query);
							while ($arr = $result ->fetch_assoc())
							{
						  	echo "<td>" . $arr['website'] . "</td>";
						  }
							?>
						</tr>
						<tr>
							<td>HQ Location</td>
							<?php
							$query = "SELECT * FROM company WHERE companyID = '$userID'";
							$result = $conn-> query($query);
							while ($arr = $result ->fetch_assoc())
							{
						  	echo "<td>" . $arr['headquarter'] . "</td>";
							}
							?>
						</tr>
						<tr>
							<td>Establish Date</td>
							<?php
							$query = "SELECT * FROM company WHERE companyID = '$userID'";
							$result = $conn-> query($query);
							while ($arr = $result ->fetch_assoc())
							{
						  	echo "<td>" . $arr['establish_date'] . "</td>";
							}
							?>
						</tr>
						<tr>
							<td>Phone Number</td>
							<?php
							$query = "SELECT * FROM user WHERE userID = '$userID'";
							$result = $conn-> query($query);
							while ($arr = $result ->fetch_assoc())
							{
						  	echo "<td>" . $arr['phone_number1'] . "</td>";
							}
							?>
						</tr>
            <tr>
							<td>Mail</td>
							<?php
							$query = "SELECT * FROM user WHERE userID = '$userID'";
							$result = $conn-> query($query);
							while ($arr = $result ->fetch_assoc())
							{
						  	echo "<td>" . $arr['mail'] . "</td>";
							}
							?>
						</tr>
            <tr>
							<td>Industry</td>
							<?php
							$query = "SELECT * FROM company WHERE companyID = '$userID'";
							$result = $conn-> query($query);
							while ($arr = $result ->fetch_assoc())
							{
						  	echo "<td>" . $arr['industry'] . "</td>";
							}
							?>
						</tr>
            <tr>
							<td>Sector</td>
							<?php
							$query = "SELECT * FROM company WHERE companyID = '$userID'";
							$result = $conn-> query($query);
							while ($arr = $result ->fetch_assoc())
							{
						  	echo "<td>" . $arr['sector'] . "</td>";
							}
							?>
						</tr>
            <tr>
							<td>Revenue</td>
							<?php
							$query = "SELECT * FROM company WHERE companyID = '$userID'";
							$result = $conn-> query($query);
							while ($arr = $result ->fetch_assoc())
							{
						  	echo "<td>" . $arr['revenue'] . "</td>";
							}
							?>
						</tr>
            <tr>
							<td>Type</td>
							<?php
							$query = "SELECT * FROM company WHERE companyID = '$userID'";
							$result = $conn-> query($query);
							while ($arr = $result ->fetch_assoc())
							{
						  	echo "<td>" . $arr['type'] . "</td>";
							}
							?>
						</tr>
            <tr>
							<td>Password</td>
							<td class ="test" id="here">*****</td>
						</tr>
					</tbody>

				</table>
			</div>


			<form method="post" action="#" name = "login">
				<ul class="actions">
				<div class="col-6 col-12-xsmall">
						<?php
						$employeeID = $_SESSION['userID'];
						$companyID = $_SESSION['companyID'];
						  $query = "SELECT * FROM follows WHERE employeeID = '$employeeID' AND companyID = '$companyID'";
							$result = $conn-> query($query);

		          if($result -> num_rows == 0)
								echo "<li><input type=\"submit\" value=\"Follow Company\" name =\"follow\" class=\"primary\"/></li>";
							else
								echo "<li><input type=\"submit\" value=\"Unfollow Company\" name =\"unfollow\" class=\"primary\"/></li>";


						?>
				</div>
						<li><a href="review_selection.php" class="button primary fit">Make a Review</a><li>
						<li><a href="jobList.php" class="button primary fit">Display Job Offers</a><li>
						<li><a href="projectList.php" class="button primary fit">Display Projects</a><li>

					</ul>
				</div>
			</form>



		</section>



		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="assets/js/editUserProfile.js"></script>

	</body>
</html>

<?php
if(isset($_POST['follow']))
{
	$employeeID = $_SESSION['userID'];
	$query2 = "INSERT INTO follows(employeeID , companyID)
						VALUES('$employeeID' , '$userID')";


	$result2 = $conn-> query($query2);
	$message = "You have been followed this company SUCCESSFULLY";
	echo "<script type='text/javascript'>alert('$message');
	window.location = 'companyPage.php' </script>";
}

if(isset($_POST['unfollow']))
{
	$employeeID = $_SESSION['userID'];
	$companyID = $_SESSION['companyID'];
	$query2 = "DELETE FROM follows WHERE employeeID = '$employeeID' AND companyID = '$companyID'";


	$result2 = $conn-> query($query2);
	$message = "You have been unfollowed this company SUCCESSFULLY";
	echo "<script type='text/javascript'>alert('$message');
	window.location = 'companyPage.php' </script>";
}
?>
