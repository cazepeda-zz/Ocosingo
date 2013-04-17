<?php include '../header.php'; ?>

<form action="index.php" method="POST">
<input type="hidden" name="add" value="true" />

<dt><label for="category">Category</label></dt>
<dd><label><input type="radio" name="category" value="Bills" /> Bills</label></dd>
<dd><label><input type="radio" name="category" value="Dining Out" /> Dining Out</label></dd>
<dd><label><input type="radio" name="category" value="Groceries" /> Groceries</label></dd>
<dd><label><input type="radio" name="category" value="Miscellaneous" /> Miscellaneous</label></dd>
<dd><label><input type="radio" name="category" value"Other" /> Other</label></dd>

<dt><label for="nombre">Name:</label></dt>
<dd><input type="text" name="nombre" id="nombre" /></dd>

<dt><label for="amount">Amount:</label></dt>
<dd><input id="range" type="range" name="amount" step="0.01"></dd>
<dd><input id="amount"  type="number" name="amount" step="0.01" /></dd>

<dd><input type="submit" name="submit" value="Go Broke!" /></dd>
</dl>
</form>

<?php include '../footer.php'; ?>