<?php
	/* Στοιχεία Σύνδεσης στην βάση δεδομένων. */
	$host = "localhost";
	$usr = "root";
	$pwd = "";
	$db = "project_db";
	$mslqli_con = new mysqli($host, $usr, $pwd, $db);
	if ($mslqli_con->connect_error) {
	    die("Connection failed: " . $mslqli_con->connect_error);
	}
	/* Χρήση Ελληνικών Χαρακτήρων. */
	mysqli_set_charset($mslqli_con, "utf8");
?>