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

<title>Budget - Counting Pennies! | Got Yo Money, thanks!</title>

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

<h2>Form Test for selecting data</h2>

<form action="test.php" method="POST">
<dt><label for="category">Select Category</label></dt>
<dd><select name="category">
<option value=""></option>
<option value="1">Bills</option>
<option value="2">Dining Out</option>
<option value="3">Groceries</option>
<option value="4">Miscellaneous</option>
</select></dd>
<dt><label for="nombre">Name:</label></dt>
<dd><input type="text" name="nombre" id="nombre" /></dd>

<dt><label for="amount">Amount:</label></dt>
<dd><input type="number" name="amount" id="amount" step="any" /></dd>

<dd><input type="submit" name="submit" value="Go Broke!" /></dd>
</dl>
</form>

<?php include '../footer.php'; ?>