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
<h2>Add Eboard</h2>

<center>
<form method="POST">
	
	<label for="pos">Position</label>
	<input type="pos" name="pos" value="<?php echo isset($_POST['pos']) ? $_POST['pos'] : '' ?>" placeholder="Position...">
	<br>
	
	<label for="sem">Semester</label>
	<select name="sem"> 
		<option>Choose Semester</option>
		<option>Spring</option>
		<option>Fall</option>
	</select>
	<br>
	
	<label for="year">Year</label>
	<input type="text" name="year" placeholder="Year...">
	<br>
	
	<label for="fname">First Name</label>
	<input type="text" name="fname" placeholder="First Name...">
	<br>
	
	<label for="lname">Last Name</label>
	<input type="text" name="lname" placeholder="Last Name...">
	<br>
	
	<label for="email">Email</label>
	<input type="text" name="email" placeholder="Email...">
	<br>
	
	<label for="ebid">Eboard ID</label>
	<input type="text" name="ebid" placeholder="EBoard ID...">
	<br>
	
	<input name="submit" type="submit" value="Add Eboard"/>
	</form>
	<br>
	
	<?php
	if(isset($_POST["submit"])) {
		$pos = $_POST["pos"];
		$sem = $_POST["sem"];
		$year = $_POST["year"];
		$fname = $_POST["fname"];
		$lname = $_POST["lname"];
		$email = $_POST["email"];
		$ebid = $_POST["ebid"];
		//(pos, sem, year, fname, lname, email, ebid)
		$sql = "INSERT INTO EBoard VALUES (?, ?, ?, ?, ?, ?, ?)";
		
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$pos, $sem, $year, $fname, $lname, $email, $ebid]);
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