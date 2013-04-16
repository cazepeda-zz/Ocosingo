<?php include '../header.php'; ?>

<h2>Squeeze That Wallet!</h2>

<?php
	if($_GET['delete']):
	$obj->delete_groceries_monies($_GET['delete']);
endif;
?>

<?php $obj->manage_groceries_monies(); ?>

<?php include '../footer.php'; ?>