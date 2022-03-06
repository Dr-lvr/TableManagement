<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./style.css">
</head>
<body>
	<div class="platform">

		<div id="main">
			<form action="/backend/insert.php" method="post" align="center">
				<h2>Inserisci un Prodotto:</h2>
				<input type="text" id="fname" name="descrizione" placeholder="descrizione" required><br>
				<input type="text" id="lname" name="reparto" placeholder="reparto" required><br>
				<select name="month">
					<option value="-"></option>
					<option value="casalinghi">casalinghi</option>
					<option value="cartoleria">cartoleria</option>
					<option value="ortofrutta">ortofrutta</option>
				</select>
				<input type="text" id="lname" name="prezzo" placeholder="prezzo" required><br>
				<input type="text" id="lname" name="quantita" placeholder="quantita" required><br>
				<input type="submit" value="Submit">
				<input type="reset"><br>
			</form>
		</div>

		<div id="view">
			<iframe width="100%" height="100%" src="/backend/show.php" name="list" sandbox="allow-same-origin allow-scripts allow-popups allow-forms" min-width="500px"></iframe>
		</div>

		<?php //insert confirmation on submit beacuse deletion is otherwise instant ?>
		<div id="delete">
			<form action="/backend/delete.php" method="post" align="center" onsubmit="return confirm('Click OK to confirm or you can ignore by clicking Cancel.');">
				<input type="text" id="delete_by_id" name="delete_by_id" placeholder="Insert ID for deletion" required>
				<input type="submit" value="Delete">
			</form>
		</div>

		<div id="update">
			<?php //insert confirmation on submit beacuse update is otherwise instant ?>
			<form action="/backend/update.php" method="post" align="center" onsubmit="return confirm('Click OK to confirm or you can ignore by clicking Cancel.');">
				<input type="text" id="update_by_id" name="update_by_id" placeholder="Insert ID for update" required>
				<input type="text" id="new_price" name="new_price" placeholder="Insert new price" required>
				<input type="submit" value="Update">
			</form>
		</div>

		<div id="range">
			<form action="/backend/range.php" target="list" method="post" align="center">
				<input type="text" id="min" name="min" placeholder="Insert min prezzo" required>
				<input type="text" id="max" name="max" placeholder="Insert max prezzo" required>
				<input type="submit" value="Query">
				<input type="reset">
			</form>
		</div>

		<div id="max_quantity">
			<form action="/backend/max_quantity.php" target="list" method="post" align="center">
				<input type="text" id="max_quantity" name="max_quantity" placeholder="Insert max quantitá" required>
				<input type="submit" value="Query">
				<input type="reset">
			</form>
		</div>

		<div id="ward_value">
			<form action="/backend/ward_value.php" target="list" method="post" align="center">
				<input type="submit" value="Visualizza valore per reparto">
			</form>
		</div>

		<div id="simple_view">
			<form action="/backend/show.php" target="list" method="post" align="center">
				<input type="submit" value="Torna ai dati">
			</form>
		</div>

		<div id="report">
			<iframe width=100% height="100%" name="frame1" id="frame1" sandbox="allow-same-origin allow-scripts allow-popups allow-forms allow-downloads" src="./backend/report.php" >
			</iframe>
		</div>

	</div>
</body>
</html>
