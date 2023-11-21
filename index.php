<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<header>
	<img src="strathlogo.png">
	<h4 class="sname">Strathmore University</h4><br>
	<h4 class="school">School of computing</h4><br>
	<h4 class="school">and Engineering Sciences</h4>
	<nav class="navbar">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="main.html">About Us</a></li>
                <li><a href="contact us.html">Contact Us</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
</header>
<body>
	<?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>
	<div class="content-1">
		
	</div>

	<div class="content-2">
		
	</div>

	<div class="content-3">
		
	</div>



</body>
<footer>
	<h1>FOOTER</h1>
</footer>
</html>