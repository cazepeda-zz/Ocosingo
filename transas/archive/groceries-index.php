<?php include '../header.php'; ?>

<h2>Got it on record!</h2>

<p>You gonna be so broke dude from what it's looking like this month. Just saying!</p>

<?php
	if($_POST['add']):
	$obj->add_groceries_monies($_POST);
elseif($_POST['update']):
	$obj->update_groceries_monies($_POST);
endif;
?>

<?php include '../footer.php'; ?>