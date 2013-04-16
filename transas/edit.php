<?php include '../header.php'; ?>

<h2>Edit</h2>

<nav class="menu">
<ul>
<li><a href="#" id="bills">Bills</a></li>
<li><a href="#" id="dining-out">Dining Out</a></li>
<li><a href="#" id="groceries">Groceries</a></li>
<li><a href="#" id="miscellaneous">Miscellaneous</a></li>
</ul>
</nav>

<?php
	if($_GET['delete']):
	$obj->delete_centavos($_GET['delete']);
endif;
?>

<?php $obj->manage_centavos(); ?>

<?php include '../footer.php'; ?>