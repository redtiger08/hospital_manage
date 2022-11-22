<?php
	$bid = empty($_REQUEST["bid"]) ? "" : $_REQUEST["bid"];

	$inpatient_array = $_REQUEST["inpatient_array"];
	$page  = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];

		require("db_connect.php");
		$query = $db->exec("delete from inpatient$bid where inpatient_array=$inpatient_array");
						
						
		header("Location:show_inpatient_if.php?bid=$bid&page=$page");
		exit();

?>
