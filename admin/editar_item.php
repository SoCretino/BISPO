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
		<main class="editar-item row align-middle">
			<div class="small-12 columns">
				<form enctype="multipart/form-data" name="editar_item" id="editar_item" method="POST" action="update.php">
					<?php
						if ( isset($_POST['item-id']) ){
							include '../mysql_connection.php';
							$item_id = $_POST['item-id'];
							$query = "SELECT * FROM item WHERE id = $item_id";
							$result = $mysqli->query($query);
							while ($rows = $result->fetch_array(MYSQLI_ASSOC)):
								$item_name = $rows['name'];
								$item_price = $rows['price'];
								$item_description = $rows['description'];
							endwhile;
							$result->free();
							$mysqli->close();
						}
					?>
					<input type="hidden" name="item-id" value="<?php echo $item_id; ?>">
					<h3>Nombre</h3> <input type="text" name="item-name" value="<?php echo $item_name; ?>">
					<h3>Precio</h3> <input type="text" name="item-price" value="<?php echo $item_price; ?>">
					<h3>Descripci&oacute;n</h3> <textarea name="item-description" rows="6"><?php echo $item_description; ?></textarea>
					<h3>Imagen (600x350)</h3>
					<input type="file" name="foto" id="file">
					<input type="submit" value="Actualizar" name="update">
				</form>
			</div>
			<div class="small-12 text-center">
				<h1 style="padding: 15px"><a href="<?php echo 'eliminar.php?id=' . $item_id; ?>" onclick="return confirm('Desea eliminar este item?');">Eliminar Item</a></h1>
			</div>
			<div class="small-12 text-center">
				<h1 style="padding: 15px"><a href="index.php">Volver</a></h1>
			</div>
		</main>
		<script src="../js/jquery-3.2.1.min.js"></script>
		<script src="../js/foundation.min.js"></script>
		<script>
			$('.editar-item').height( $(window).height() );
		</script>
	</body>
</html>