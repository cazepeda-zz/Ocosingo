<?php

include '_class/budget_class.php';

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

<title>Budget - Counting Pennies!</title>

<meta charset="utf-8">
<meta name="description" content="My very own budget app.">
<meta name="keywords" content="budget, accounting" />
<meta name="author" content="Carlos Alberto Zepeda">
<meta name="robots" content="nofollow,noindex" />
<meta name="viewport" content="width=device-width; initial-scale=1.0">

<!--links-->
<link rel="stylesheet" href="/assets/styles.css">

<!--scripts-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<!--[if (gte IE 6)&(lte IE 8)]>
<script src="/assets/js/modernizr.js"></script>
<script src="/assets/js/respond.js"></script>
<![endif]-->
</head>

<body>

<?php include 'header.php'; ?>

<h2>Bills</h2>

<table>
	<tbody>
<?php
	if(isset($_GET['id'])):
		$obj->get_monies($_GET['id']);
	else:
		$obj->get_monies();
	endif;
?>
</tbody>
</table>
<?php
	// Make a MySQL Connection
	$query = "SELECT amount, SUM(amount) FROM bills"; 
	
	$result = mysql_query($query) or die(mysql_error());

	// Print out result
	while($row = mysql_fetch_array($result)){
	echo "Total = $". $row['SUM(amount)'];
	}
?>


<h2>Miscellaneous</h2>

<table>
	<tbody>
		<?php
			if(isset($_GET['id'])):
				$obj->get_misc_monies($_GET['id']);
			else:
				$obj->get_misc_monies();
			endif;
			?>
	</tbody>
</table>

<?php
	// Make a MySQL Connection
	$query = "SELECT amount, SUM(amount) FROM miscellaneous"; 
	
	$result = mysql_query($query) or die(mysql_error());

	// Print out result
	while($row = mysql_fetch_array($result)){
	echo "Total = $". $row['SUM(amount)'];
	}
?>

<?php include 'footer.php'; ?>