<?php include '../header.php'; ?>

<h2>Squeeze That Wallet!</h2>

<?php
	if($_GET['delete']):
	$obj->delete_dining_out_monies($_GET['delete']);
endif;
?>

<?php $obj->manage_dining_out_monies(); ?>

<?php include '../footer.php'; ?>