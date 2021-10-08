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
<h2>Add Member</h2>

<center>
<form method="POST">
	
	<label for="email">Email</label>
	<input type="email" name="email" placeholder="Email..." required>
	
	<br>
	<label for="fname">First Name</label>
	<input type="text" name="fname" placeholder="First Name...">
	<br>
	
	<label for="lname">Last Name</label>
	<input type="text" name="lname" placeholder="Last Name...">
	<br>
	
	<label for="family">Family</label>
	<select name="family" required placeholder="Choose Family">
	<option disabled selected>Choose Family</option>
		<?php
			$sql = "SELECT DISTINCT Mem_Family FROM Members";
			foreach($pdo->query($sql) as $row){
				$family = $row["Mem_Family"];
				echo "<option value='$family' name='family' width='200%'>$family</option>";
			}?>
	</select>
	<br>
	
	<label for="year">Year</label>
	<select name="year" required placeholder="Choose Year">
		<option disabled selected>Choose Year</option>
		<option>Freshman</option>
		<option>Sophomore</option>
		<option>Junior</option>
		<option>Senior</option>
		<option>Adult</option>
	</select>
	<br>
	
	<label for="status">Status</label>
	<select name="status" required placeholder="Choose Status">
	<option disabled selected>Choose Status</option>
		<option>Active</option>
		<option>Alumni</option>
		<option>Extended</option>
	</select>
	<br>

	<label for="bigfname">Big First Name</label>
	<input type="text" name="bigfname"  placeholder="Big First Name...">
	<br>
	
	<label for="biglname">Big Last Name</label>
	<input type="text" name="biglname"  placeholder="Big Last Name...">
	<br>
	
	<label for="pc">Pledge Class</label>
	<select name="pc" placeholder="Choose Pledge Class">
	<option disabled selected>Choose Pledge Class</option>
		<?php
			$sql = "SELECT DISTINCT Pledge_Class FROM Members";
			foreach($pdo->query($sql) as $row){
				$PClass = $row["Pledge_Class"];
				echo "<option value='$PClass' name='pc' width='100%'>$PClass</option>";
			}?>
	</select>
	<br>
	
	<label for="com">Committee</label>
	<select name="com"> 
		<option disabled selected>Choose Committee</option>
		<option>Public Relations</option>
		<option>Leadership</option>
		<option>Fellowship</option>
		<option>Fundraising</option>
		<option>Outreach</option>
		<option>Service</option>
	</select>
	<br>
	
	<input name="submit" type="submit" value="Add Member"/>
	</form>
	<br>
	
	<?php
	if(isset($_POST["submit"])) {
		$email = $_POST["email"];
		$fname = $_POST["fname"];
		$lname = $_POST["lname"];
		$family = $_POST["family"];
		$year = $_POST["year"];
		$status = $_POST["status"];
		$bigfname = $_POST["bigfname"];
		$biglname = $_POST["biglname"];
		$pc = $_POST["pc"];
		$com = $_POST["com"];
	
		//(email, fname, lname, family, year, status, bigfname, biglname, pc, com)
		$sql = "INSERT INTO Members VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$email, $fname, $lname, $family, $year, $status, $bigfname, $biglname, $pc, $com]);
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