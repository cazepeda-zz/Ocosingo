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

<article class="bills">
<h2>Bills</h2>
	
<dl class="bills-data">
<?php
	if(isset($_GET['id'])):
		$obj->get_monies($_GET['id']);
	else:
		$obj->get_monies();
	endif;
?>
</dl>

<dl class="total bills-total">
<?php
	// Make a MySQL Connection
	$query = "SELECT amount, SUM(amount) FROM bills"; 
	
	$result = mysql_query($query) or die(mysql_error());

	// Print out result
	while($row = mysql_fetch_array($result)){
	echo '<dt class="bills-total-label">Bills Total</dt>';
	echo "\n";
	echo '<dd class="bills-total-amount">$'. $row['SUM(amount)'];
	echo "</dd>";
	echo "\n";
	}
?>
</dl>
</article>

<article class="dining-out">
<h2>Dining Out</h2>

<dl class="dining-out-data">
		<?php
			if(isset($_GET['id'])):
				$obj->get_dining_out_monies($_GET['id']);
			else:
				$obj->get_dining_out_monies();
			endif;
			?>
</dl>

<dl class="total dining-out-total">
<?php
	// Make a MySQL Connection
	$query = "SELECT amount, SUM(amount) FROM dining_out"; 
	
	$result = mysql_query($query) or die(mysql_error());

	// Print out result
	while($row = mysql_fetch_array($result)){
	echo '<dt class="dining-out-total-label">Dining Out Total</dt>';
	echo "\n";
	echo '<dd class="dining-out-total-amount">$'. $row['SUM(amount)'];
	echo "</dd>";
	echo "\n";
	}
?>
</dl>
</article>

<article class="groceries">
<h2>Groceries</h2>

<dl class="groceries-data">
		<?php
			if(isset($_GET['id'])):
				$obj->get_groceries_monies($_GET['id']);
			else:
				$obj->get_groceries_monies();
			endif;
			?>
</dl>

<dl class="total groceries-total">
<?php
	// Make a MySQL Connection
	$query = "SELECT amount, SUM(amount) FROM groceries"; 
	
	$result = mysql_query($query) or die(mysql_error());

	// Print out result
	while($row = mysql_fetch_array($result)){
	echo '<dt class="groceries-total-label">Groceries Total</dt>';
	echo "\n";
	echo '<dd class="groceries-total-amount">$'. $row['SUM(amount)'];
	echo "</dd>";
	echo "\n";
	}
?>
</dl>
</article>

<article class="miscellaneous">
<h2>Miscellaneous</h2>

<dl class="miscellaneous-data">
		<?php
			if(isset($_GET['id'])):
				$obj->get_misc_monies($_GET['id']);
			else:
				$obj->get_misc_monies();
			endif;
			?>
</dl>

<dl class="total miscellaneous-total">
<?php
	// Make a MySQL Connection
	$query = "SELECT amount, SUM(amount) FROM miscellaneous"; 
	
	$result = mysql_query($query) or die(mysql_error());

	// Print out result
	while($row = mysql_fetch_array($result)){
	echo '<dt class="miscellaneous-total-label">Miscellaneous Total</dt>';
	echo "\n";
	echo '<dd class="miscellaneous-total-amount">$'. $row['SUM(amount)'];
	echo "</dd>";
	echo "\n";
	}
?>
</dl>
</article>

<?php include 'footer.php'; ?>