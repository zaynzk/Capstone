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
   <li><a href="famtree.php">Tree</a></li>
  </ul>
</nav>

<main>
<br>
<h2>Members</h2>
<center>
<form method="POST">

	<label for="keyword">Name Search</label>
	<input type="text" name="keyword"  placeholder="Search here..." style="width: 15%">
	<input name="NameSearch" type="submit" value="Search"/>
	
	<label for="PledgeClass">Pledge Class Search</label>
	<select name="PledgeClass"> 
		<option>All</option>
			<?php
				$sql = "SELECT DISTINCT Pledge_Class FROM Members WHERE Mem_Status = 'Active'";
				foreach($pdo->query($sql) as $row){
					$PClass = $row["Pledge_Class"];
					echo "<option value='$PClass' name='PledgeClass' width='100%'>$PClass</option>";
				}
			?>
	<input name="PCSearch" type="submit" style="margin:10px;" value="Search"/>
	</select>
	
	<label for="Family">Family Search</label>
	<select name="Family"> 
		<option>All</option>
			<?php
				$sql = "SELECT DISTINCT Mem_Family FROM Members";
				foreach($pdo->query($sql) as $row){
					$Family = $row["Mem_Family"];
					echo "<option value='$Family' name='Family' width='100%'>$Family</option>";
				}
			?>
	<input name="FamSearch" type="submit" style="margin:10px;" value="Search"/>
	</select>
	</form>
	<br>
	
	<?php
	if(isset($_POST["NameSearch"])) {
		$keyword = $_POST["keyword"];
		$sql = "SELECT Mem_FName, Mem_LName, Mem_Email, Mem_Year, Mem_Family, Pledge_Class FROM Members WHERE Mem_Status = 'Active' && (Mem_FName LIKE '%$keyword%' || Mem_LName LIKE '%$keyword%')";
		$q = $pdo->query($sql);
		$q->setFetchMode(PDO::FETCH_ASSOC);
	}
	
	if(isset($_POST["PCSearch"])) {
		$pc = $_POST["PledgeClass"];
		
		if($pc=="All")	{
			$sql = "SELECT Mem_FName, Mem_LName, Mem_Email, Mem_Year, Mem_Family, Pledge_Class FROM Members WHERE Mem_Status = 'Active'";
		}
		
		else {
			echo "<h3><center>" . $pc . " Class" . "</center></h3>";
			$sql = "SELECT Mem_FName, Mem_LName, Mem_Email, Mem_Year, Mem_Family, Pledge_Class FROM Members WHERE Pledge_Class = '" . $pc . "' && Mem_Status = 'Active'";
		}
		$q = $pdo->query($sql);
		$q->setFetchMode(PDO::FETCH_ASSOC);
	}
	
	if(isset($_POST["FamSearch"])) {
		$fam = $_POST["Family"];
			echo "<h3><center>" . $fam . " Family" . "</center></h3>";
			$sql = "SELECT Mem_FName, Mem_LName, Mem_Email, Mem_Year, Mem_Family, Pledge_Class FROM Members WHERE Mem_Family = '" . $fam . "' && Mem_Status = 'Active'";
		$q = $pdo->query($sql);
		$q->setFetchMode(PDO::FETCH_ASSOC);
	}
	?>
	<div id="container">
	<table class="table table-bordered table-sm">
		<thead>
			<tr>
				<th style="width: 26%">Name</th>
				<th style="width: 26%">Email</th>
				<th style="width: 26%">Pledge Class</th>
				<th style="width: 26%">Year</th>
				<th style="width: 26%">Family</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = $q->fetch()): ?>
			<tr>
				<td><?php echo $row['Mem_FName'] . " " . $row['Mem_LName']?> </td>
				<td><?php echo $row['Mem_Email']?></td>
				<td><?php echo $row['Pledge_Class']?></td>
				<td><?php echo $row['Mem_Year']?></td>
				<td><?php echo $row['Mem_Family']?></td>
			</tr>
			<?php endwhile; ?>
		</tbody>
	</table>
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