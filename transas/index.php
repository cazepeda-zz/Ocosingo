<?php include '../header.php'; ?>

<h2>Cost has been added</h2>

<?php
	if($_POST['add']):
	$obj->add_centavos($_POST);
elseif($_POST['update']):
	$obj->update_centavos($_POST);
endif;
?>

<?php include '../footer.php'; ?>