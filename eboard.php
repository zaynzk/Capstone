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
<h2>Executive Board</h2>
<center>
<form method="POST">
	<label for="keyword">Name Search</label>
	<input type="text" name="keyword" placeholder="Search here..." style="width: 15%">
	<input name="NameSearch" type="submit" value="Search"/>
	
	<label for="Position">Position Search</label>
	<select name="Position"> 
		<option>All</option>
			<?php
				$sql = "SELECT DISTINCT EB_Position FROM EBoard";
				foreach($pdo->query($sql) as $row){
					$Pos = $row["EB_Position"];
					echo "<option value='$Pos' name='Position' width='100%'>$Pos</option>";
				}
			?>
	<input name="PosSearch" type="submit" style="margin:10px;" value="Search"/>
	</select>
	</form>
	<br>
	
	<?php
	if(isset($_POST["NameSearch"])) {
		$keyword = $_POST["keyword"];
		$sql = "SELECT EB_Position, Mem_FName, Mem_LName, Mem_Email, EB_Sem, EB_Year FROM EBoard WHERE (Mem_FName LIKE '%$keyword%' || Mem_LName LIKE '%$keyword%')";
		$q = $pdo->query($sql);
		$q->setFetchMode(PDO::FETCH_ASSOC);
	}
	
	if(isset($_POST["PosSearch"])) {
		$Pos = $_POST["Position"];
		
		if($Pos=="All")	{
			$sql = "SELECT EB_Position, Mem_FName, Mem_LName, Mem_Email, EB_Sem, EB_Year FROM EBoard";
		}
		
		else {
			echo "<h3><center>" . $Pos . "</center></h3>";
			$sql = "SELECT EB_Position, Mem_FName, Mem_LName, Mem_Email, EB_Sem, EB_Year FROM EBoard WHERE EB_Position = '" . $Pos . "'";
		}
		$q = $pdo->query($sql);
		$q->setFetchMode(PDO::FETCH_ASSOC);
	}
	?>
	
	<div id="container-fluid">
	<table class="table table-bordered table-sm">
		<thead>
			<tr>
				<th>Position</th>
				<th>Name</th>
				<th>Email</th>
				<th>Semester</th>
				<th>Year</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = $q->fetch()): ?>
			<tr>
				<td><?php echo $row['EB_Position']?></td>
				<td><?php echo $row['Mem_FName'] . " " . $row['Mem_LName']?> </td>
				<td><?php echo $row['Mem_Email']?></td>
				<td><?php echo $row['EB_Sem']?></td>
				<td><?php echo $row['EB_Year']?></td>
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
