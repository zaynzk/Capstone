<?php include "include.php"; ?>
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
<h2>Add Pledge Class</h2>

<center>
<form method="POST">
	
	<label for="name">Name</label>
	<input type="text" name="name"  placeholder="Name...">
	<br>
	
	<label for="year">Year</label>
	<input type="text" name="year"  placeholder="Year...">
	<br>
	
	<label for="sem">Semester</label>
	<select name="sem"> 
		<option disabled selected>Choose Semester</option>
		<option>Spring</option>
		<option>Fall</option>
	</select>
	<br>
	
	<label for="fname">Namesake First Name</label>
	<input type="text" name="fname"  placeholder="First Name...">
	<br>
	
	<label for="lname">Namesake Last Name</label>
	<input type="text" name="lname" placeholder="Last Name...">
	<br>
	
	<input name="submit" type="submit" value="Add Pledge Class"/>
	</form>
	<br>
	
	<?php
	if(isset($_POST["submit"])) {
		$name = $_POST["name"];
		$year = $_POST["year"];
		$sem = $_POST["sem"];
		$fname = $_POST["fname"];
		$lname = $_POST["lname"];
		
		//(name, year, sem, fname, lname)
		$sql = "INSERT INTO PledgeClass  VALUES (?, ?, ?, ?, ?)";
		
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$name, $year, $sem, $fname, $lname]);
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