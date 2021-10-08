<?php include "include.php"; 
session_start();
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
<h2>Login</h2>

<center>
    <form method="POST">

        <input name="username" type="text" placeholder="Username" /> <br>
        <input name="password" type="password" placeholder="Password"/> <br>
        <input name="submit" type="submit" value="Login" /> <br>

    </form>
</center>

	<?php
	if(isset($_POST['submit'])){

		$uname = $_POST['username'];
		$password = $_POST['password'];

		if ((strcmp($uname,'eboard')==0) && (strcmp($password,'horse')==0)){
			echo "yay";
			$_SESSION['vaild'] = true;
			header("location:admin.php");
			
		}else{
			echo "Invalid username and password";
		}
	}
	?>

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