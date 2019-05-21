<?php
	include_once 'conn.php';
	$userID = $_SESSION['userID'];
	$query = "SELECT * FROM company WHERE companyID = '$userID'";
	$result = $conn-> query($query);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Company Profile</title>
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
          <li><a href="index.php" class ="button primary">Logout</a></li>
        </ul>
      </nav>
    </header>

		<section>
			<h3>Company Profile</h3>
			<h4>Details</h4>

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
							<td>Phone Number 1</td>
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
							<td>Phone Number 2</td>
							<?php
							$query = "SELECT * FROM user WHERE userID = '$userID'";
							$result = $conn-> query($query);
							while ($arr = $result ->fetch_assoc())
							{
						  	echo "<td>" . $arr['phone_number2'] . "</td>";
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
			<div class="col-6 col-12-xsmall">
				<ul class="actions">
					<li><a href="editCompanyProfile.php" class="button primary fit">Edit profile</a></li>
					<li><a href="followers.php" class="button primary fit">My Followers</a></li>
					<li><a href="createJob.php" class="button primary fit">Create a Job</a></li>
					<li><a href="createProject.php" class="button primary fit">Create a Project</a></li>
					<li><a href="jobList.php" class="button primary fit">My Offered Jobs</a></li>
					<li><a href="projectList.php" class="button primary fit">My Published Projects</a></li>
					<li><a href="reviewListForCompany.php" class="button primary fit">Reviews about My Company</a></li>
					<li><a href="employeeList.php" class="button primary fit">Add a Worker</a></li>
					<li><a href="myWorkers.php" class="button primary fit">My Workers</a></li>
				</ul>
			</div>


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
			<script src="assets/js/editEmployeeProfile.js"></script>

	</body>
</html>
