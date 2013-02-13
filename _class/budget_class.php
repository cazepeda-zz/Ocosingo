<?php

class laferia {

var $host;
var $username;
var $password;

function connect() {
	$connecting = mysql_connect($this->host, $this->username, $this->password) or die(mysql_error());
	mysql_select_db($this->db, $connecting) or die(mysql_error());
}

function get_monies($id = '') {
	if($id != ""):
		$id = mysql_real_escape_string($id);
		$sql = "SELECT * FROM bills WHERE id = '$id'";
		$return = '<p><a href="/">Home</a></p>';
	else:
		$sql = "SELECT nombre, amount FROM bills ORDER BY amount DESC";
	endif;

	$result = mysql_query($sql) or die(mysql_error());

	if(mysql_num_rows($result) != 0):
		while($row = mysql_fetch_assoc($result)) {
			echo '<tr><td>';
			echo ''. $row['nombre'] .'';
			echo '</td>';
			echo "\n";
			echo '<td>';
			echo ''. $row['amount'] .'';
			echo '</td></tr>';
		}
	else:
		echo '<p>Sorry buddy, you broke homie!</p>';
	endif;

	echo $return;
	}

// miscellaneous table get miscellaneous data
function get_misc_monies($id = '') {
	if($id != ""):
		$id = mysql_real_escape_string($id);
		$sql = "SELECT * FROM miscellaneous WHERE id = '$id'";
		$return = '<p><a href="/">Home</a></p>';
	else:
		$sql = "SELECT nombre, amount FROM miscellaneous ORDER BY amount DESC";
	endif;

	$result = mysql_query($sql) or die(mysql_error());

	if(mysql_num_rows($result) != 0):
		while($row = mysql_fetch_assoc($result)) {
			echo '<tr><td>';
			echo ''. $row['nombre'] .'';
			echo '</td>';
			echo "\n";
			echo '<td>';
			echo ''. $row['amount'] .'';
			echo '</td></tr>';
		}
	else:
		echo '<p>Sorry buddy, you broke homie!</p>';
	endif;

	echo $return;
	}

// dining_out table get data
function get_dining_out_monies($id = '') {
	if($id != ""):
		$id = mysql_real_escape_string($id);
		$sql = "SELECT * FROM dining_out WHERE id = '$id'";
		$return = '<p><a href="/">Home</a></p>';
	else:
		$sql = "SELECT place, amount FROM dining_out ORDER BY amount DESC";
	endif;

	$result = mysql_query($sql) or die(mysql_error());

	if(mysql_num_rows($result) != 0):
		while($row = mysql_fetch_assoc($result)) {
			echo '<tr><td>';
			echo ''. $row['place'] .'';
			echo '</td>';
			echo "\n";
			echo '<td>';
			echo ''. $row['amoount'] .'';
			echo '</td></tr>';
		}
	else:
		echo '<p>Sorry buddy, you broke homie!</p>';
	endif;

	echo $return;
	}

function add_monies($post) {
	$nombre = mysql_real_escape_string($post['nombre']);
	$amount = mysql_real_escape_string($post['amount']);

	if(!$nombre || !$amount):

		if(!$nombre):
			echo "<p>Bill Name is required.</p>";
		endif;
		if(!$amount):
			echo "<p>Bill Amount is required.</p>";
		endif;


		echo '<p><a href="adding.php">Try again.</a>';
		else:
			$sql = "INSERT INTO bills VALUES (null, '$nombre', '$amount')";
		$result = mysql_query($sql) or die(mysql_error());
		echo "Added Succesfully!";

		endif;
}

// miscellaneous table add data
function add_misc_monies($post) {
	$nombre = mysql_real_escape_string($post['nombre']);
	$amount = mysql_real_escape_string($post['amount']);

	if(!$nombre || !$amount):

		if(!$nombre):
			echo "<p>Miscellaneous Name is required.</p>";
		endif;
		if(!$amount):
			echo "<p>Miscellaneous Amount is required.</p>";
		endif;


		echo '<p><a href="misc-adding.php">Try again.</a>';
		else:
			$sql = "INSERT INTO miscellaneous VALUES (null, '$nombre', '$amount')";
		$result = mysql_query($sql) or die(mysql_error());
		echo "Added Succesfully!";

		endif;
}

// dining_out table add data
function add_dining_out_monies($post) {
	$place = mysql_real_escape_string($post['place']);
	$amount = mysql_real_escape_string($post['amount']);

	if(!$place || !$amount):

		if(!$place):
			echo "<p>Dining Out Name is required.</p>";
		endif;
		if(!$amount):
			echo "<p>Dining Out Amount is required.</p>";
		endif;


		echo '<p><a href="dining-out-adding.php">Try again.</a>';
		else:
			$sql = "INSERT INTO dining_out VALUES (null, '$places', '$amount')";
		$result = mysql_query($sql) or die(mysql_error());
		echo "Added Succesfully!";

		endif;
}

// miscellaneous table edit data
function manage_misc_monies() {
	echo '<div id="manage">';
	$sql = "SELECT * FROM miscellaneous";
	$result = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($result)) :
		?>
<div>
	<h2 class="nombre"><?=$row['nombre']?></h2>
	<span class="actions"><a href="misc-edit.php?id=<?=$row['id']?>">Edit</a> | <a href="?delete=<?=$row['id'];?>">Delete</a></span>
</div>
	<?php
	endwhile;
	echo '</div>'; //closes manage div
}

function manage_monies() {
	echo '<div id="manage">';
	$sql = "SELECT * FROM bills";
	$result = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($result)) :
		?>
<div>
	<h2 class="nombre"><?=$row['nombre']?></h2>
	<span class="actions"><a href="edit.php?id=<?=$row['id']?>">Edit</a> | <a href="?delete=<?=$row['id'];?>">Delete</a></span>
</div>
	<?php
	endwhile;
	echo '</div>'; //closes manage div
}

// miscellaneous table delete data
function delete_misc_monies($id) {
	if(!$id) {
		return false;
	} else {
		$id = mysql_real_escape_string($id);
		$sql = "DELETE FROM miscellaneous WHERE id = '$id'";
		$result = mysql_query($sql) or die(mysql_error());
		echo "Miscellaneous Deleted Successfully! Good ridence eh!";
	}
}

function delete_monies($id) {
	if(!$id) {
		return false;
	} else {
		$id = mysql_real_escape_string($id);
		$sql = "DELETE FROM bills WHERE id = '$id'";
		$result = mysql_query($sql) or die(mysql_error());
		echo "Bill Deleted Successfully! Good ridence eh!";
	}
}

// miscellaneous table update form
function update_misc_monies_form($id) {
	$id = mysql_real_escape_string($id);
	$sql = "SELECT * FROM miscellaneous WHERE id = '$id'";
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($result);
	?>
<form method="post" action="misc-index.php">
<input type="hidden" name="update" value="true" />
<input type="hidden" name="id" value="<?=$row['id']?>">

<dl>
<dt><label for="nombre">Miscellaneous Name:</label></dt>
<dd><input type="text" name="nombre" id="nombre" value="<?=$row['nombre']?>"/></dd>

<dt><label for="amount">Miscellaneous Amount:</label></dt>
<dd><input type="number" name="amount" id="amount" value="<?=$row['amount']?>" step="any" /></dd>

<dd><input type="submit" name="submit" value="Go Broke!" />
</dl>
</form>
	<?php
}

// miscellaneous table update data
function update_misc_monies($post) {
	$nombre = mysql_real_escape_string($post['nombre']);
	$amount = mysql_real_escape_string($post['amount']);
	$id = mysql_real_escape_string($post['id']);

	if(!$nombre || !$amount):
		if(!$nombre):
			echo "<p>Miscellaneous Name is required homez! Put it on there!</p>";
		endif;
		if(!$amount):
			echo "<p>Miscellaneous Amount is required! Don't act the fool!</p>";
		endif;

		echo '<p><a href="misc-edit.php?id=' . $id . '">Try Again!</a></p>';
	else:
		$sql = "UPDATE miscellaneous SET nombre = '$nombre', amount = '$amount' WHERE id = '$id'";
		$result = mysql_query($sql) or die(mysql_error());
		echo "Updated Successfully!";
	endif;
}

function update_monies_form($id) {
	$id = mysql_real_escape_string($id);
	$sql = "SELECT * FROM bills WHERE id = '$id'";
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($result);
	?>
<form method="post" action="index.php">
<input type="hidden" name="update" value="true" />
<input type="hidden" name="id" value="<?=$row['id']?>">

<dl>
<dt><label for="nombre">Bill Name:</label></dt>
<dd><input type="text" name="nombre" id="nombre" value="<?=$row['nombre']?>"/></dd>

<dt><label for="amount">Bill Amount:</label></dt>
<dd><input type="number" name="amount" id="amount" value="<?=$row['amount']?>" step="any" /></dd>

<dd><input type="submit" name="submit" value="Go Broke!" />
</dl>
</form>
	<?php
}

function update_monies($post) {
	$nombre = mysql_real_escape_string($post['nombre']);
	$amount = mysql_real_escape_string($post['amount']);
	$id = mysql_real_escape_string($post['id']);

	if(!$nombre || !$amount):
		if(!$nombre):
			echo "<p>Bill Name is required homez! Put it on there!</p>";
		endif;
		if(!$amount):
			echo "<p>Bill Amount is required! Don't act the fool!</p>";
		endif;

		echo '<p><a href="edit.php?id=' . $id . '">Try Again!</a></p>';
	else:
		$sql = "UPDATE bills SET nombre = '$nombre', amount = '$amount' WHERE id = '$id'";
		$result = mysql_query($sql) or die(mysql_error());
		echo "Updated Successfully!";
	endif;
}

} // end class