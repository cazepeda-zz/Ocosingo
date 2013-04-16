<?php

include '_class/functions.php';

$obj = new laferia();

// setup our connection variables

$obj->host = 'localhost';
$obj->username = 'root';
$obj->password = 'root';
$obj->db = 'laferia';


// connect to db
$obj->connect();
?>

<!DOCTYPE html>   
<html lang="en" class="no-js">
<head>

<title>Budget - Counting Pennies! | Adding Pennies!</title>

<meta charset="utf-8">
<meta name="description" content="My very own budget app.">
<meta name="keywords" content="budget, accounting" />
<meta name="author" content="Carlos Alberto Zepeda">
<meta name="robots" content="nofollow,noindex" />
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes" />

<!--links-->
<link rel="stylesheet" href="/assets/styles.css">

<!--scripts-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
</head>

<body>

<header>
<h1><a href="/">Budget</a> | <?php echo date( 'F, o'); ?></h1>

<?php
	$query = "SELECT amount, SUM(amount) FROM centavos";
	$result = mysql_query($query) or die(mysql_error());

	while($row = mysql_fetch_array($result)){
		echo '<h2>Balance: $'. $row['SUM(amount)'];
		echo "</h2>";
		echo "\n";
	}
?>

<nav class="menu">
<ul>
<li><a href="/">Home</a></li>
<li><a href="/transas/adding.php">Add</a></li>
<li><a href="/transas/edit.php">Edit</a></li>
</ul>
</nav>
</header>

<section class="main">