<?php
	$ftp_server = "host";
	$ftp_username = "username";
	$ftp_password = "password";
	$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
	$login = ftp_login($ftp_conn, $ftp_username, $ftp_password);
	ftp_pasv($ftp_conn, true);
?>