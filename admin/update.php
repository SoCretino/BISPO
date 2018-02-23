<?php
	if ( isset($_POST['update']) ){
		include '../mysql_connection.php';
		$item_id = $_POST['item-id'];
		$item_name = $_POST['item-name'];
		$item_price = $_POST['item-price'];
		$item_description = $_POST['item-description'];
		if ( $_FILES["foto"]["tmp_name"]) {
			//FTP
			$image_path_id = "img/item/" . $item_id . ".jpg";
			include '../ftp_connection.php';
			$remote_file_path = "/backline.22web.org/htdocs/" . $image_path_id;
			if ( !ftp_put($ftp_conn, $remote_file_path, $_FILES["foto"]["tmp_name"], FTP_BINARY) ){
				echo "<script type='text/javascript'>alert('No se pudo subir la foto, intentelo nuevamente.');</script>";
				ftp_close($ftp_conn);
				exit();
			}
			ftp_close($ftp_conn);
		}
		$query = "UPDATE item SET name = '$item_name', price = $item_price, description = '$item_description' WHERE id = $item_id";
		if ( $mysqli->query($query) )
			echo "<script type='text/javascript'>alert('Item actualizado correctamente');</script>";
		else
			echo "<script type='text/javascript'>alert('No se pudo actualizar el item. Intentelo nuevamente.');</script>";
		$mysqli->close();
	}
?>