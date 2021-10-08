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
   <li><a href="index.php">Home</a></li>
   <li><a href="members.php">Members</a></li> 
   <li><a href="committees.php">Committees</a></li>
   <li><a href="alumni.php">Alumni</a></li>
   <li><a href="eboard.php">E-board<a></li>
   <li><a href="famtree.php">Tree<a></li>
  </ul>
</nav>

<main>
<br>
<h2>Family Tree</h2>

<center>
<form method="POST">

	<label for="NameSearch">Name Search</label>
	<select name="FullName"> 
	<option disabled selected>Select Name</option>
			<?php
				$sql = "SELECT Mem_FName, Mem_LName FROM Members ORDER BY Mem_FName";
				foreach($pdo->query($sql) as $row){
					$name = $row["Mem_FName"] . " " . $row["Mem_LName"];
					echo "<option value='$name' name='FullName' width='100%'>$name</option>";
				}
			?>
	<input name="NameSearch" type="submit" style="margin:10px;" value="Search"/>
	</select>
	</form>
	<br>
	
	<?php
	if(isset($_POST["NameSearch"])) {
		$Name = $_POST["FullName"];
		
		$names = explode(" ", $Name);
		$fname = $names[0];
		$lname = $names[1];
		//echo $fname . " " . $lname . "<br>";
		//echo "|<br>";
		//echo "V<br>";
		
		while(strcmp($fname, "FOUNDER") && strcmp($lname, "FOUNDER")){
			$sql = "SELECT Mem_FName, Mem_LName, Mem_BigFname, Mem_BigLname FROM Members WHERE Mem_FName = ? && Mem_LName = ?";
			$stmt = $pdo->prepare($sql);
			$stmt->execute([$fname, $lname]);
			$row = $stmt->fetch();
		
			echo $fname ." ". $lname . "<br>";
			echo "|<br>";
			echo "V<br>";
		
			$fname = $row["Mem_BigFname"];
			$lname = $row["Mem_BigLname"];
		}
		echo "Founder";
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