<?php include 'header.php'; ?>

<h2>View</h2>

<nav class="menu">
<ul>
<li><a href="#" id="bills">Bills</a></li>
<li><a href="#" id="dining-out">Dining Out</a></li>
<li><a href="#" id="groceries">Groceries</a></li>
<li><a href="#" id="miscellaneous">Miscellaneous</a></li>
</ul>
</nav>

<article class="category bills">
<h2>Bills</h2>
	
<dl class="costs">
<?php 
	$query = "SELECT * FROM centavos WHERE category='Bills'";
	$result = mysql_query($query) or die(mysql_error());

		while($row = mysql_fetch_assoc($result)) {
			echo '<dt class="name">';
			echo ''. $row['nombre'] .'';
			echo '</dt>';
			echo "\n";
			echo '<dd class="amount">$';
			echo ''. $row['amount'] .'';
			echo '</dd>';
			echo "\n";
		}
?>
</dl>

<dl class="total">
<?php
	// Make a MySQL Connection
	$query = "SELECT amount, SUM(amount) FROM centavos WHERE category='Bills'"; 
	
	$result = mysql_query($query) or die(mysql_error());

	// Print out result
	while($row = mysql_fetch_array($result)){
	echo '<dt class="name">Bills Total</dt>';
	echo "\n";
	echo '<dd class="amount">$'. $row['SUM(amount)'];
	echo "</dd>";
	echo "\n";
	}
?>
</dl>
</article>

<article class="category dining-out">
<h2>Dining Out</h2>

<dl class="costs">
<?php 
	$query = "SELECT * FROM centavos WHERE category='Dining Out'";
	$result = mysql_query($query) or die(mysql_error());

		while($row = mysql_fetch_assoc($result)) {
			echo '<dt class="name">';
			echo ''. $row['nombre'] .'';
			echo '</dt>';
			echo "\n";
			echo '<dd class="amount">$';
			echo ''. $row['amount'] .'';
			echo '</dd>';
			echo "\n";
		}
?>
</dl>

<dl class="total">
<?php
	// Make a MySQL Connection
	$query = "SELECT amount, SUM(amount) FROM centavos WHERE category='Dining Out'"; 
	
	$result = mysql_query($query) or die(mysql_error());

	// Print out result
	while($row = mysql_fetch_array($result)){
	echo '<dt class="name">Dining Out Total</dt>';
	echo "\n";
	echo '<dd class="amount">$'. $row['SUM(amount)'];
	echo "</dd>";
	echo "\n";
	}
?>
</dl>
</article>

<article class="category groceries">
<h2>Groceries</h2>

<dl class="costs">
<?php 
	$query = "SELECT * FROM centavos WHERE category='Groceries'";
	$result = mysql_query($query) or die(mysql_error());

		while($row = mysql_fetch_assoc($result)) {
			echo '<dt class="name">';
			echo ''. $row['nombre'] .'';
			echo '</dt>';
			echo "\n";
			echo '<dd class="amount">$';
			echo ''. $row['amount'] .'';
			echo '</dd>';
			echo "\n";
		}
?>
</dl>

<dl class="total">
<?php
	// Make a MySQL Connection
	$query = "SELECT amount, SUM(amount) FROM centavos WHERE category='Groceries'"; 
	
	$result = mysql_query($query) or die(mysql_error());

	// Print out result
	while($row = mysql_fetch_array($result)){
	echo '<dt class="name">Groceries Total</dt>';
	echo "\n";
	echo '<dd class="amount">$'. $row['SUM(amount)'];
	echo "</dd>";
	echo "\n";
	}
?>
</dl>
</article>

<article class="category miscellaneous">
<h2>Miscellaneous</h2>

<dl class="costs">
<?php 
	$query = "SELECT * FROM centavos WHERE category='Miscellaneous'";
	$result = mysql_query($query) or die(mysql_error());

		while($row = mysql_fetch_assoc($result)) {
			echo '<dt class="name">';
			echo ''. $row['nombre'] .'';
			echo '</dt>';
			echo "\n";
			echo '<dd class="amount">$';
			echo ''. $row['amount'] .'';
			echo '</dd>';
			echo "\n";
		}
?>
</dl>

<dl class="total">
<?php
	// Make a MySQL Connection
	$query = "SELECT amount, SUM(amount) FROM centavos WHERE category='Miscellaneous'";
	
	$result = mysql_query($query) or die(mysql_error());

	// Print out result
	while($row = mysql_fetch_array($result)){
	echo '<dt class="name">Miscellaneous Total</dt>';
	echo "\n";
	echo '<dd class="amount">$'. $row['SUM(amount)'];
	echo "</dd>";
	echo "\n";
	}
?>
</dl>
</article>

<?php include 'footer.php'; ?>