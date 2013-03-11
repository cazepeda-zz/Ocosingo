<?php

class laferia {

var $host;
var $username;
var $password;

function connect() {
	$connecting = mysql_connect($this->host, $this->username, $this->password) or die(mysql_error());
	mysql_select_db($this->db, $connecting) or die(mysql_error());
}

// bills table get bills data
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
			echo '<dt class="name bills-name">';
			echo ''. $row['nombre'] .'';
			echo '</dt>';
			echo "\n";
			echo '<dd class="amount bills-amount">$';
			echo ''. $row['amount'] .'';
			echo '</dd>';
			echo "\n";
		}
	else:
		echo '<dt class="no-bills">NO WAY! I know you got bills, ADD THEM!</dt>';
		echo "\n";
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
			echo '<dt class="name miscellaneous-name">';
			echo ''. $row['nombre'] .'';
			echo '</dt>';
			echo "\n";
			echo '<dd class="amount miscellaneous-amount">$';
			echo ''. $row['amount'] .'';
			echo '</dd>';
			echo "\n";
		}
	else:
		echo '<dt class="no-miscellaneous">NO WAY! I know you got bills, ADD THEM!</dt>';
		echo "\n";
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
		$sql = "SELECT nombre, amount FROM dining_out ORDER BY amount DESC";
	endif;

	$result = mysql_query($sql) or die(mysql_error());

	if(mysql_num_rows($result) != 0):
		while($row = mysql_fetch_assoc($result)) {
			echo '<dt class="name dining-out-name">';
			echo ''. $row['nombre'] .'';
			echo '</dt>';
			echo "\n";
			echo '<dd class="amount dining-out-amount">$';
			echo ''. $row['amount'] .'';
			echo '</dd>';
			echo "\n";
		}
	else:
		echo '<dt class="no-dining-out">NO WAY! I know you got bills, ADD THEM!</dt>';
	endif;

	echo $return;
	}

// groceries table get data
function get_groceries_monies($id = '') {
	if($id != ""):
		$id = mysql_real_escape_string($id);
		$sql = "SELECT * FROM groceries WHERE id = '$id'";
		$return = '<p><a href="/">Home</a></p>';
	else:
		$sql = "SELECT nombre, amount FROM groceries ORDER BY amount DESC";
	endif;

	$result = mysql_query($sql) or die(mysql_error());

	if(mysql_num_rows($result) != 0):
		while($row = mysql_fetch_assoc($result)) {
			echo '<dt class="name groceries-name">';
			echo ''. $row['nombre'] .'';
			echo '</dt>';
			echo "\n";
			echo '<dd class="amount groceries-amount">';
			echo ''. $row['amount'] .'';
			echo '</dd>';
			echo "\n";
		}
	else:
		echo '<dt class="no-groceries">NO WAY! I know you got bills, ADD THEM!</dt>';
	endif;

	echo $return;
	}

// bills table add data
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


		echo '<p><a href="adding.php">Try again.</a>';
		else:
			$sql = "INSERT INTO miscellaneous VALUES (null, '$nombre', '$amount')";
		$result = mysql_query($sql) or die(mysql_error());
		echo "Added Succesfully!";

		endif;
}

// dining_out table add data
function add_dining_out_monies($post) {
	$nombre = mysql_real_escape_string($post['nombre']);
	$amount = mysql_real_escape_string($post['amount']);

	if(!$nombre || !$amount):

		if(!$nombre):
			echo "<p>Dining Out Name is required.</p>";
		endif;
		if(!$amount):
			echo "<p>Dining Out Amount is required.</p>";
		endif;


		echo '<p><a href="adding.php">Try again.</a>';
		else:
			$sql = "INSERT INTO dining_out VALUES (null, '$nombre', '$amount')";
		$result = mysql_query($sql) or die(mysql_error());
		echo "Added Succesfully!";

		endif;
}

// groceries table add data
function add_groceries_monies($post) {
	$nombre = mysql_real_escape_string($post['nombre']);
	$amount = mysql_real_escape_string($post['amount']);

	if(!$nombre || !$amount):

		if(!$nombre):
			echo "<p>Groceries Name is required.</p>";
		endif;
		if(!$amount):
			echo "<p>Groceries Amount is required.</p>";
		endif;


		echo '<p><a href="adding.php">Try again.</a>';
		else:
			$sql = "INSERT INTO groceries VALUES (null, '$nombre', '$amount')";
		$result = mysql_query($sql) or die(mysql_error());
		echo "Added Succesfully!";

		endif;
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

// dining_out table edit data
function manage_dining_out_monies() {
	echo '<div id="manage">';
	$sql = "SELECT * FROM dining_out";
	$result = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($result)) :
		?>
<div>
	<h2 class="nombre"><?=$row['nombre']?></h2>
	<span class="actions"><a href="dining-out-edit.php?id=<?=$row['id']?>">Edit</a> | <a href="?delete=<?=$row['id'];?>">Delete</a></span>
</div>
	<?php
	endwhile;
	echo '</div>'; //closes manage div
}

// grocieres table edit data
function manage_groceries_monies() {
	echo '<div id="manage">';
	$sql = "SELECT * FROM groceries";
	$result = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($result)) :
		?>
<div>
	<h2 class="nombre"><?=$row['nombre']?></h2>
	<span class="actions"><a href="groceries-edit.php?id=<?=$row['id']?>">Edit</a> | <a href="?delete=<?=$row['id'];?>">Delete</a></span>
</div>
	<?php
	endwhile;
	echo '</div>'; //closes manage div
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

// dining_out table delete data
function delete_dining_out_monies($id) {
	if(!$id) {
		return false;
	} else {
		$id = mysql_real_escape_string($id);
		$sql = "DELETE FROM dining_out WHERE id = '$id'";
		$result = mysql_query($sql) or die(mysql_error());
		echo "Dining Out Deleted Successfully! Good ridence eh!";
	}
}

// groceries table delete data
function delete_groceries_monies($id) {
	if(!$id) {
		return false;
	} else {
		$id = mysql_real_escape_string($id);
		$sql = "DELETE FROM groceries WHERE id = '$id'";
		$result = mysql_query($sql) or die(mysql_error());
		echo "Groceries Deleted Successfully! Good ridence eh!";
	}
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

// dining_out table update form
function update_dining_out_monies_form($id) {
	$id = mysql_real_escape_string($id);
	$sql = "SELECT * FROM dining_out WHERE id = '$id'";
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($result);
	?>
<form method="post" action="dining-out-index.php">
<input type="hidden" name="update" value="true" />
<input type="hidden" name="id" value="<?=$row['id']?>">

<dl>
<dt><label for="nombre">Dining Out Place:</label></dt>
<dd><input type="text" name="nombre" id="nombre" value="<?=$row['nombre']?>"/></dd>

<dt><label for="amount">Dining Out Amount:</label></dt>
<dd><input type="number" name="amount" id="amount" value="<?=$row['amount']?>" step="any" /></dd>

<dd><input type="submit" name="submit" value="Go Broke!" />
</dl>
</form>
	<?php
}

// dining_out table update data
function update_dining_out_monies($post) {
	$nombre = mysql_real_escape_string($post['nombre']);
	$amount = mysql_real_escape_string($post['amount']);
	$id = mysql_real_escape_string($post['id']);

	if(!$nombre || !$amount):
		if(!$nombre):
			echo "<p>Dining Out Name is required homez! Put it on there!</p>";
		endif;
		if(!$amount):
			echo "<p>Dining Out Amount is required! Don't act the fool!</p>";
		endif;

		echo '<p><a href="dining-out-edit.php?id=' . $id . '">Try Again!</a></p>';
	else:
		$sql = "UPDATE dining_out SET nombre = '$nombre', amount = '$amount' WHERE id = '$id'";
		$result = mysql_query($sql) or die(mysql_error());
		echo "Updated Successfully!";
	endif;
}

// groceries table update form
function update_groceries_monies_form($id) {
	$id = mysql_real_escape_string($id);
	$sql = "SELECT * FROM groceries WHERE id = '$id'";
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($result);
	?>
<form method="post" action="groceries-index.php">
<input type="hidden" name="update" value="true" />
<input type="hidden" name="id" value="<?=$row['id']?>">

<dl>
<dt><label for="nombre">Groceries nombre:</label></dt>
<dd><input type="text" name="nombre" id="nombre" value="<?=$row['nombre']?>"/></dd>

<dt><label for="amount">Groceries Amount:</label></dt>
<dd><input type="number" name="amount" id="amount" value="<?=$row['amount']?>" step="any" /></dd>

<dd><input type="submit" name="submit" value="Go Broke!" />
</dl>
</form>
	<?php
}

// groceries table update data
function update_groceries_monies($post) {
	$nombre = mysql_real_escape_string($post['nombre']);
	$amount = mysql_real_escape_string($post['amount']);
	$id = mysql_real_escape_string($post['id']);

	if(!$nombre || !$amount):
		if(!$nombre):
			echo "<p>Groceries nombre is required homez! Put it on there!</p>";
		endif;
		if(!$amount):
			echo "<p>Groceries Amount is required! Don't act the fool!</p>";
		endif;

		echo '<p><a href="groceries-edit.php?id=' . $id . '">Try Again!</a></p>';
	else:
		$sql = "UPDATE groceries SET nombre = '$nombre', amount = '$amount' WHERE id = '$id'";
		$result = mysql_query($sql) or die(mysql_error());
		echo "Updated Successfully!";
	endif;
}

} // end class