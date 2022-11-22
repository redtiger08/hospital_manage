<?php
	$bid = empty($_REQUEST["bid"]) ? "" : $_REQUEST["bid"];

	$booking_array = $_REQUEST["booking_array"];
	$page  = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];

		require("db_connect.php");
		$query = $db->exec("delete from booking$bid where booking_array=$booking_array");
						
						
		header("Location:booking_show_if.php?bid=$bid&page=$page");
		exit();

?>
