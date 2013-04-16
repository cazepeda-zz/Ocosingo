<?php include '../header.php'; ?>

<h2>Form Test for selecting data</h2>

<form action="test.php" method="POST">
<dt><label for="category">Select Category</label></dt>
<dd><select name="category">
<option value=""></option>
<option value="1">Bills</option>
<option value="2">Dining Out</option>
<option value="3">Groceries</option>
<option value="4">Miscellaneous</option>
</select></dd>
<dt><label for="nombre">Name:</label></dt>
<dd><input type="text" name="nombre" id="nombre" /></dd>

<dt><label for="amount">Amount:</label></dt>
<dd><input type="number" name="amount" id="amount" step="any" /></dd>

<dd><input type="submit" name="submit" value="Go Broke!" /></dd>
</dl>
</form>

<?php include '../footer.php'; ?>