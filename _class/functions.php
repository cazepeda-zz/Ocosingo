<?php

class laferia {

var $host;
var $username;
var $password;

function connect() {
	$connecting = mysql_connect($this->host, $this->username, $this->password) or die(mysql_error());
	mysql_select_db($this->db, $connecting) or die(mysql_error());
}

// get data
function get_centavos($id = '') {
	if($id != ""):
		$id = mysql_real_escape_string($id);
		$sql = "SELECT * FROM centavos WHERE id = '$id'";
		$return = '<p><a href="/">Home</a></p>';
	else:
		$sql = "SELECT category, nombre, amount FROM centavos ORDER BY amount DESC";
	endif;

	$result = mysql_query($sql) or die(mysql_error());

	if(mysql_num_rows($result) != 0):
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
	else:
		echo '<dt class="no-payment">NO WAY! I know you got payments, YOU BETTER ADD THEM!</dt>';
		echo "\n";
	endif;

	echo $return;
	}

// add data
function add_centavos($post) {
	$category = mysql_real_escape_string($post['category']);
	$nombre = mysql_real_escape_string($post['nombre']);
	$amount = mysql_real_escape_string($post['amount']);

	if(!$category || !$nombre || !$amount):
		if(!$category):
			echo "<p>Category is required.</p>";
		endif;
		if(!$nombre):
			echo "<p>Name is required.</p>";
		endif;
		if(!$amount):
			echo "<p>Amount is required.</p>";
		endif;


		echo '<p><a href="adding.php">Try again.</a>';
		else:
			$sql = "INSERT INTO centavos VALUES (null, '$nombre', '$amount', '$category')";
		$result = mysql_query($sql) or die(mysql_error());
		echo "It is what it is...";

		endif;
}

// manage data
function manage_centavos() {
 /*
	echo '<dl class="costs">';
	echo "\n";
	$sql = 'SELECT * FROM centavos ORDER BY category="Bills"';
	$result = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($result)) :
		?>
	<dt class="name"><?=$row['nombre']?></dt>
	<dd class="actions"><a href="update.php?id=<?=$row['id']?>">Edit</a> | <a href="?delete=<?=$row['id'];?>">Delete</a></dd>
	<?php
	endwhile;
	echo "\n";
	echo '</dl>';
*/
	echo '<article class="category bills">';
	echo '<h2>Bills</h2>';
	echo '<dl class="costs">';
	echo "\n";
	$sql = "SELECT * FROM centavos WHERE category='Bills'";
	$result = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($result)) :
		?>
	<dt class="name"><?=$row['nombre']?></dt>
	<dd class="actions"><a href="update.php?id=<?=$row['id']?>">Edit</a> | <a href="?delete=<?=$row['id'];?>">Delete</a></dd>
	<?php
	endwhile;
	echo "\n";
	echo '</dl>';
	echo '</article>';

	echo '<article class="category dining-out">';
	echo '<h2>Dining Out</h2>';
	echo '<dl class="costs">';
	echo "\n";
	$sql = "SELECT * FROM centavos WHERE category='Dining Out'";
	$result = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($result)) :
		?>
	<dt class="name"><?=$row['nombre']?></dt>
	<dd class="actions"><a href="update.php?id=<?=$row['id']?>">Edit</a> | <a href="?delete=<?=$row['id'];?>">Delete</a></dd>
	<?php
	endwhile;
	echo "\n";
	echo '</dl>';
	echo '</article>';

	echo '<article class="category groceries">';
	echo '<h2>Groceries</h2>';
	echo '<dl class="costs">';
	echo "\n";
	$sql = "SELECT * FROM centavos WHERE category='Groceries'";
	$result = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($result)) :
		?>
	<dt class="name"><?=$row['nombre']?></dt>
	<dd class="actions"><a href="update.php?id=<?=$row['id']?>">Edit</a> | <a href="?delete=<?=$row['id'];?>">Delete</a></dd>
	<?php
	endwhile;
	echo "\n";
	echo '</dl>';
	echo '</article>';

	echo '<article class="category miscellaneous">';
	echo '<h2>Miscellaneous</h2>';
	echo '<dl class="costs">';
	echo "\n";
	$sql = "SELECT * FROM centavos WHERE category='Miscellaneous'";
	$result = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($result)) :
		?>
	<dt class="name"><?=$row['nombre']?></dt>
	<dd class="actions"><a href="update.php?id=<?=$row['id']?>">Edit</a> | <a href="?delete=<?=$row['id'];?>">Delete</a></dd>
	<?php
	endwhile;
	echo "\n";
	echo '</dl>';
	echo '</article>';
}

// delete data
function delete_centavos($id) {
	if(!$id) {
		return false;
	} else {
		$id = mysql_real_escape_string($id);
		$sql = "DELETE FROM centavos WHERE id = '$id'";
		$result = mysql_query($sql) or die(mysql_error());
		echo "Deleted Payment Successfully! Good ridence eh!";
	}
}

function update_centavos_form($id) {
	$id = mysql_real_escape_string($id);
	$sql = "SELECT * FROM centavos WHERE id = '$id'";
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($result);
	?>
<form action="index.php" method="POST">
<input type="hidden" name="update" value="true" />
<input type="hidden" name="id" value="<?=$row['id']?>">

<dt><label for="category">Select Category</label></dt>
<dd><select name="category">
<option value="<?=$row['category']?>"><?=$row['category']?></option>
<option value="Bills">Bills</option>
<option value="Dining Out">Dining Out</option>
<option value="Groceries">Groceries</option>
<option value="Miscellaneous">Miscellaneous</option>
</select></dd>
<dt><label for="nombre">Name:</label></dt>
<dd><input type="text" name="nombre" id="nombre" value="<?=$row['nombre']?>" /></dd>

<dt><label for="amount">Amount:</label></dt>
<dd><input type="number" name="amount" id="amount" step="any" value="<?=$row['amount']?>" /></dd>

<dd><input type="submit" name="submit" value="Go Broke!" /></dd>
</dl>
</form>
	<?php
}

function update_centavos($post) {
	$category = mysql_real_escape_string($post['category']);
	$nombre = mysql_real_escape_string($post['nombre']);
	$amount = mysql_real_escape_string($post['amount']);
	$id = mysql_real_escape_string($post['id']);

	if(!$category || !$nombre || !$amount):
		if(!$category):
			echo "<p>Category is required ese! Ponlo!</p>";
		endif;
		if(!$nombre):
			echo "<p>Name is required homez! Put it on there!</p>";
		endif;
		if(!$amount):
			echo "<p>Amount is required! Don't act the fool!</p>";
		endif;

		echo '<p><a href="edit.php?id=' . $id . '">Try Again!</a></p>';
	else:
		$sql = "UPDATE centavos SET category = '$category', nombre = '$nombre', amount = '$amount' WHERE id = '$id'";
		$result = mysql_query($sql) or die(mysql_error());
		echo "Updated Successfully!";
	endif;
}

} // end class