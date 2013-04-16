<?php include '../header.php'; ?>

<h2>You can hear the pennies hit the bottom of the bucket when you hit 'Go Broke!'</h2>

<form method="post" action="dining-out-index.php">
	<input type="hidden" name="add" value="true" />

	<dl>
		<dt><label for="place">Dining Out Place:</label></dt>
		<dd><input type="text" name="place" id="place" /></dd>

		<dt><label for="amount">Dining Out Amount:</label></dt>
		<dd><input type="number" name="amount" id="amount" step="any" /></dd>

		<dd><input type="submit" name="submit" value="Go Broke!" /></dd>
	</dl>

<?php include '../footer.php'; ?>