<?php include '../header.php'; ?>

<h2>You can hear the pennies hit the bottom of the bucket when you hit 'Go Broke!'</h2>

<form method="post" action="misc-index.php">
	<input type="hidden" name="add" value="true" />

	<dl>
		<dt><label for="nombre">Miscellaneous Name:</label></dt>
		<dd><input type="text" name="nombre" id="nombre" /></dd>

		<dt><label for="amount">Miscellaneous Amount:</label></dt>
		<dd><input type="number" name="amount" id="amount" step="any" /></dd>

		<dd><input type="submit" name="submit" value="Go Broke!" /></dd>
	</dl>
</form>

<?php include '../footer.php'; ?>