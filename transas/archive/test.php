<?php include '../header.php'; ?>

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