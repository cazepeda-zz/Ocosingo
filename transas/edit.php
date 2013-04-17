<?php include '../header.php'; ?>

<?php
	if($_GET['delete']):
	$obj->delete_centavos($_GET['delete']);
endif;
?>

<?php $obj->manage_centavos(); ?>

<?php include '../footer.php'; ?>