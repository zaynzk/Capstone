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
<h2>Committees</h2>
<center>
<form method="POST">
	<label for="ComName">Committee Search</label>
	<select name="ComName"> 
	<option>All</option>
	<?php
		$sql = "SELECT DISTINCT Com_Name FROM Committee";
		foreach($pdo->query($sql) as $row){
			$CN = $row["Com_Name"];
			echo "<option value='$CN' name='ComName' width='100%'>$CN</option>";
		}
	?>
	
	<input name="submit" type="submit"/>
	</select>
</form>
	<br>
	
	<?php
	if(isset($_POST["submit"])) {
		$cn = $_POST["ComName"];
		
		if($cn=="All")	{
			$sql = "SELECT Mem_FName, Mem_LName, Mem_Email, Mem_Year FROM Members";
		}
		
		else {
			echo "<h3><center>" . $cn . " Committee" ."</center></h3>";
			$sql = "SELECT Mem_FName, Mem_LName, Mem_Year, Mem_Email FROM Members WHERE Com_Name = '" . $cn . "'";
		}
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
				<th style="width: 26%">Year</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = $q->fetch()): ?>
			<tr>
				<td><?php echo $row['Mem_FName'] . " " . $row['Mem_LName']?> </td>
				<td><?php echo $row['Mem_Email']?></td>
				<td><?php echo $row['Mem_Year']?></td>
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





































