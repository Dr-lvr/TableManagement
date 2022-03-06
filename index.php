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
				<iframe class="list-box" name="list" sandbox="allow-same-origin allow-scripts allow-popups allow-forms" min-width="500px"></iframe>
			</div>
			<div class="list-box">
				<input type="submit" value="Show"><br>
			</div>
		</form><br>
	</div>
	<div class="flex-container">
		<form action="/backend/delete.php" method="post" align="center">
			<p>Insert ID for delete a row:
				<input type="text" id="delete_by_id" name="delete_by_id" placeholder="Insert ID for deletion">
				<input type="submit" value="Delete"><br>
			</p>
		</form>
	</div>
</body>
</html>
