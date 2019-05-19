<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
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
			<h1 id="logo"><a href="index.php"></a></h1>
			<nav id="nav">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li>
						<a href="#" class ="button primary">Sign Up</a>
						<ul>
							<li><a href="employee_register.php">Employee Register</a></li>
							<li><a href="company_register.php">Company Register</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</header>

    <!-- Form -->
      <section>
        <h3>Form</h3>
        <form method="post" action="#">
          <div class="row gtr-uniform gtr-50">
            <div class="col-2 col-12-xsmall">
              First Name <input type="text" name="first_name" id="name" value="Erdem"/>
            </div>
            <div class="col-2 col-12-xsmall">
              Middle Name <input type="text" name="middle_name" id="name" value="Ege"/>
            </div>
            <div class="col-2 col-12-xsmall">
              Last Name <input type="text" name="last_name" id="name" value="Marasli"/>
            </div>
            <div class="col-2">
              Gender <select name="gender" id="gender">
                <option value="">- Category -</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="None">None</option>
              </select>
            </div>
            <div class="col-2 col-12-xsmall">
              Position <input type="text" name="position" id="name" value="Engineer"/>
            </div>
            <div class="col-2">
              Highest Education <select name="education" id="education">
                <option value="">- Category -</option>
                <option value="High School">High School</option>
                <option value="Bachelor's Degree">Bachelor's Degree</option>
                <option value="Master's Degree">Master's Degree</option>
                <option value="PHD">PHD</option>
              </select>
            </div>
            <div class="col-2 col-12-xsmall">
              Location <input type="text" name="location" id="location" value="Ankara"/>
            </div>
            <div class="col-5 col-12-xsmall">
              Phone Number 1 <input type="text" name="phone1" id="phone1" value="055532345432"/>
            </div>
            <div class="col-5 col-12-xsmall">
              Phone Number 2 <input type="text" name="phone2" id="phone2" value="0532123131"/>
            </div>
            <div class="col-6 col-12-xsmall">
              Email <input type="text" name="email" id="email" value="ege.marasli@ug.com"/>
            </div>
            <div class="col-6 col-12-xsmall">
              Password <input type="text" name="password" id="password" value="123456"/>
            </div>
            <div class="col-12">
              <ul class="actions">
                <li><input type="submit" value="Update" class="primary" /></li>
              </ul>
            </div>
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
