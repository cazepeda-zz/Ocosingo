<?php include '../header.php'; ?>

<h2>You can hear the pennies hit the bottom of the bucket when you hit 'Go Broke!'</h2>

<form method="post" action="index.php">
	<input type="hidden" name="add" value="true" />

	<dl>
		<dt><label for="table_data">Select Category</label></dt>
		<dd><select id="category" name="category">
			  <option value="" selected></option>
			  <option value="Bills">Bills</option>
			  <option value="Dining Out">Dining Out</option>
			  <option value="Groceries">Groceries</option>
			  <option value="Miscellaneous">Miscellaneous</option>
			</select>
		</dd>
		<dt><label for="nombre">Name:</label></dt>
		<dd><input type="text" name="nombre" id="nombre" /></dd>

		<dt><label for="amount">Amount:</label></dt>
		<dd><input type="number" name="amount" id="amount" step="any" /></dd>

		<dd><input type="submit" name="submit" value="Go Broke!" /></dd>
	</dl>



<?php include '../footer.php'; ?>