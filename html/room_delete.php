<?php
	$bid = empty($_REQUEST["bid"]) ? "" : $_REQUEST["bid"];

	$room_num = $_REQUEST["room_num"];
	$page  = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];

		require("db_connect.php");
		$query = $db->exec("delete from room$bid where room_num=$room_num");
						
						
		header("Location:room_if.php?bid=$bid&page=$page");
		exit();

?>
