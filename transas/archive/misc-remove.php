<?php include '../header.php'; ?>

<h2>Squeeze That Wallet!</h2>

<?php
	if($_GET['delete']):
	$obj->delete_misc_monies($_GET['delete']);
endif;
?>

<?php $obj->manage_misc_monies(); ?>

<?php include '../footer.php'; ?>