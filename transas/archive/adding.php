<?php

include '../_class/budget_class.php';

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

<?php include '../header.php'; ?>

<h2>You can hear the pennies hit the bottom of the bucket when you hit 'Go Broke!'</h2>

<form method="post" action="index.php">
	<input type="hidden" name="add" value="true" />

	<dl>
		<dt><label for="table_data">Select Category</label></dt>
		<dd><select id="category" name="category">
			  <option value="" selected></option>
			  <option value="Bills">Bills</option>
			  <option value="Dining Out">Dining Out</option>
			  <option value="Groceries">Groceries</option>
			  <option value="Miscellaneous">Miscellaneous</option>
			</select>
		</dd>
		<dt><label for="nombre">Name:</label></dt>
		<dd><input type="text" name="nombre" id="nombre" /></dd>

		<dt><label for="amount">Amount:</label></dt>
		<dd><input type="number" name="amount" id="amount" step="any" /></dd>

		<dd><input type="submit" name="submit" value="Go Broke!" /></dd>
	</dl>



<?php include '../footer.php'; ?>