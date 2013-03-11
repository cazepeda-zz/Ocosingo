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

<h2>Payment has been added!</h2>

<p>It sucks huh!? Got pay them bills homie!</p>

<?php
if (isset($_POST['category'])) {
	if (intval($_POST['category']) === 1) {
		$obj->add_monies($_POST);
	} else if (intval($_POST['category']) === 2)	{
		$obj->add_dining_out_monies($_POST);
	} else if (intval($_POST['category']) === 3)	{
		$obj->add_groceries_monies($_POST);
	} else if (intval($_POST['category']) === 4)	{
		$obj->add_misc_monies($_POST);
	} else {
		// Error selecting category.
	}
}
?>

<?php include '../footer.php'; ?>