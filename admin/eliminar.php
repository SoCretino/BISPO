<?php
	$id = $_GET['id'];
	include '../mysql_connection.php';
	$query = "DELETE FROM item WHERE id = $id LIMIT 1";
	$mysqli->query($query);
	$mysqli->close();
	$image_path_id = "img/item/" . $id . ".jpg";
	include '../ftp_connection.php';
	$remote_file_path = "/backline.22web.org/htdocs/" . $image_path_id;
	ftp_delete($ftp_conn, $remote_file_path);
	ftp_close($ftp_conn);
?>