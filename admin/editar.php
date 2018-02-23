<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="robots" content="none"/>
		<link rel="stylesheet" href="../css/normalize.min.css" type="text/css"/>
		<link rel="stylesheet" href="../css/foundation.min.css" type="text/css"/>
		<link rel="stylesheet" href="../css/admin.css" type="text/css"/>
		<title>Editar / Panel de Control - Backline</title>
	</head>
	<body>
		<main class="editar row align-middle">
			<div class="small-12 columns">
				<form enctype="multipart/form-data" method="POST" action="editar_categoria.php">
					<h3>Categor&iacute;a</h3>
					<select name="category-id">
					<?php
						include '../mysql_connection.php';
						$query = "SELECT * FROM category";
						$result = $mysqli->query($query);
						while ($rows = $result->fetch_array(MYSQLI_ASSOC)):
							echo '<option value="' . $rows['id'] . '">' . $rows['name'] . '</option>';
						endwhile;
						$result->free();
						$mysqli->close();
					?>
					</select>
					<input type="submit" value="Siguiente" name="submit">
				</form>
			</div>
			<div class="small-12 text-center">
				<h1 style="padding: 15px"><a href="index.php">Volver</a></h1>
			</div>
		</main>
		<script src="../js/jquery-3.2.1.min.js"></script>
		<script src="../js/foundation.min.js"></script>
		<script>
			$('.editar').height( $(window).height() );
		</script>
	</body>
</html>