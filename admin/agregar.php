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
		<title>Agregar / Panel de Control - Backline</title>
	</head>
	<body>
		<main class="agregar row align-middle">
			<div class="small-12 columns">
				<form enctype="multipart/form-data" method="POST" action="">
					<h3>Categor&iacute;a</h3>
					<select name="category-id">
					<?php
						include '../mysql_connection.php';
						$query = "SELECT * FROM category";
						$result = $mysqli->query($query);
						while ($rows = $result->fetch_array(MYSQLI_ASSOC)):
							echo '<option value="' . $rows['id'] . '">' . $rows['name'] . '</option>';
						endwhile;
						if ( isset($_POST['submit']) ) {
							$category_id = $_POST['category-id'];
							$item_name = $_POST['item-name'];
							$item_price = $_POST['item-price'];
							$item_description = $_POST['item-description'];
							$query = "INSERT INTO item (category_id, name, price, description) VALUES ($category_id, '$item_name', $item_price, '$item_description')";
							$mysqli->query($query);
							$item_id = mysqli_insert_id($mysqli);
							$image_path_id = "img/item/" . $item_id . ".jpg";
							$query = "UPDATE item SET image = '$image_path_id' WHERE id = '$item_id'";
							$mysqli->query($query);
							//FTP
							include '../ftp_connection.php';
							$remote_file_path = "/backline.22web.org/htdocs/" . $image_path_id;
							if ( ftp_put($ftp_conn, $remote_file_path, $_FILES["foto"]["tmp_name"], FTP_BINARY) )
								echo "<script type='text/javascript'>alert('El item se cargó con éxito');</script>";
							else
								echo "<script type='text/javascript'>alert('Hubo un error en la transferencia. Intentelo nuevamente.');</script>";
							ftp_close($ftp_conn);
						}
						$result->free();
						$mysqli->close();
					?>
					</select>
					<h3>Nombre</h3> <input type="text" name="item-name" value="">
					<h3>Precio</h3> <input type="text" name="item-price" value="">
					<h3>Descripci&oacute;n</h3> <textarea name="item-description" rows="5"></textarea>
					<h3>Imagen (600x350)</h3>
					<input type="file" name="foto" id="file">
					<input type="submit" value="Enviar" name="submit">
				</form>
			</div>
			<div class="small-12 text-center">
				<h1 style="padding: 15px"><a href="index.php">Volver</a></h1>
			</div>
		</main>
		<script src="../js/jquery-3.2.1.min.js"></script>
		<script src="../js/foundation.min.js"></script>
		<script>
			$('.agregar').height( $(window).height() );
		</script>
	</body>
</html>