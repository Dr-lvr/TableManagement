<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href=".\style.css">
</head>
<body>
	<div class="flex-container">
		<form action="/backend/insert.php" method="post" align="center">
			<div class="list-box">
				<h2 id="ok">Inserisci Prodotti</h2>
			</div>
			<div class="">
				<input type="text" id="fname" name="descrizione" placeholder="descrizione" required><br>
				<input type="text" id="lname" name="reparto" placeholder="reparto" required><br>
				<input type="text" id="lname" name="prezzo" placeholder="prezzo" required><br>
				<input type="text" id="lname" name="quantita" placeholder="quantita" required><br>
			</div><br>
			<div class="list-box">
				<input type="submit" value="Submit">
				<input type="reset"><br>
			</div>
		</form><br>
	</div>
	<div class="flex-container">
		<form action="/backend/show.php" method="post" align="center" target="list">
			<div class="list-box">
				<iframe class="list-box" src="/backend/show.php" name="list" sandbox="allow-same-origin allow-scripts allow-popups allow-forms" min-width="500px"></iframe>
			</div>
		</form><br>
	</div>
	<div class="flex-container">
		<div class="list-box">
			<?php //insert confirmation on submit beacuse deletion is otherwise instant ?>
		<form action="/backend/delete.php" method="post" align="center" onsubmit="return confirm('Click OK to confirm or you can ignore by clicking Cancel.');">
			<p>Insert ID for delete a row:
				<input type="text" id="delete_by_id" name="delete_by_id" placeholder="Insert ID for deletion">
				<input type="submit" value="Delete"><br>
			</p>
		</form>
		</div>
	</div>
	<div class="flex-container">
		<div class="list-box">
			<?php //insert confirmation on submit beacuse update is otherwise instant ?>
		<form action="/backend/update.php" method="post" align="center" onsubmit="return confirm('Click OK to confirm or you can ignore by clicking Cancel.');">
			<p>Update a row by ID:
				<input type="text" id="update_by_id" name="update_by_id" placeholder="Insert ID for update">
				<input type="text" id="new_price" name="new_price" placeholder="Insert new price for update">
				<input type="submit" value="Update"><br>
			</p>
		</form>
		</div>
	</div>
</body>
</html>
