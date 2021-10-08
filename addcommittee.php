<?php include "include.php"; 
session_start();
if(isset($_SESSION['valid'])) {
	header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>APO ADX</title>
<link href="/css/APOADX.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<header>
  <h1><a href="index.php">APO ADX Database</a></h1>
</header>
<nav>
  <ul>
   <li><a href="admin.php">Back to Admin</a></li>
  </ul>
</nav>
<main>
<br>
<h2>Add Committee</h2>

<center>
<form method="POST">
	
	<label for="comid">Committee ID</label>
	<input type="text" name="comid" placeholder="Committee ID...">
	<br>
	
	<label for="comname">Committee</label>
	<select name="comname"> 
		<option disabled selected>Choose Committee</option>
		<option>Public Relations</option>
		<option>Leadership</option>
		<option>Fellowship</option>
		<option>Fundraising</option>
		<option>Outreach</option>
		<option>Service</option>
	</select>
	<br>
	
	<label for="year">Year</label>
	<input type="text" name="year" placeholder="Year...">
	<br>
	
	<label for="sem">Semester</label>
	<select name="sem"> 
		<option disabled selected>Choose Semester</option>
		<option>Spring</option>
		<option>Fall</option>
	</select>
	<br>
	
	<input name="submit" type="submit" value="Add Committee"/>
	</form>
	<br>
	
	<?php
	if(isset($_POST["submit"])) {
		$comid = $_POST["comid"];
		$comname = $_POST["comname"];
		$year = $_POST["year"];
		$sem = $_POST["sem"];

		//(comid, year, sem)
		$sql = "INSERT INTO Committee VALUES (?, ?, ?, ?)";
		
		$stmt = $pdo->prepare($sql);
		$stmt->$execute([$comid, $comname, $year, $sem]);
	}
	
	?>
	
	

</center>
</main>
<footer>
Contact us
<br>
<a href="mailto:avery.logue.17@cnu.edu">avery.logue.17@cnu.edu</a>
<br>
<a href="mailto:zaynuddin.khurshid.17@cnu.edu">zaynuddin.khurshid.17@cnu.edu</a> 
</footer>
</body>
</html>