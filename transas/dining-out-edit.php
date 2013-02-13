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

<title>Budget - Counting Pennies! | Edited!</title>

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

<h2>Get It Right!</h2>

<?=$obj->update_dining_out_monies_form($_GET['id'])?>

<?php include '../footer.php'; ?>