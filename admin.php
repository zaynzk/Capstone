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

<main>
<br>
<h2>Admin Page</h2>

 <ul>
	<li><a href="addmember.php">Add Member</a></li><li><br></li>

	
	<li><a href="addcommittee.php">Add Committee</a></li><li><br></li>

	
	<li><a href="addeboard.php">Add Eboard</a></li><li><br></li>

	
	<li><a href="addpledgeclass.php">Add Pledge Class</a></li>

  </ul>

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