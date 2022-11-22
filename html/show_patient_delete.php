<?php
	$bid = empty($_REQUEST["bid"]) ? "" : $_REQUEST["bid"];

	$num = $_REQUEST["num"];
	$page  = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];

		require("db_connect.php");
		$query = $db->exec("delete from patient$bid where num=$num");
						
						
		header("Location:show_patient_if.php?bid=$bid&page=$page");
		exit();

?>
