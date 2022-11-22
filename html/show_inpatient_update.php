<?php
	$bid = empty($_REQUEST["bid"]) ? "" : $_REQUEST["bid"];
	
	$inpatient_array = $_REQUEST["inpatient_array"];
	$page  = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];
	
	$patient_name = $_REQUEST["patient_name"];
	$patient_rrn = $_REQUEST["patient_rrn"];
	$patient_diagn = $_REQUEST["patient_diagn"];
	$inpatient_num = $_REQUEST["inpatient_num"];
	$inpatient_start = $_REQUEST["inpatient_start"];
	$inpatient_last = $_REQUEST["inpatient_last"];
	$room_num = $_REQUEST["room_num"];
	
	if($inpatient_num && $patient_name && $patient_rrn && $patient_diagn && $inpatient_start && $inpatient_last && $room_num){
		require("db_connect.php");
	
		//$regtime = date("Y-m-d H:i:s"); 필요없음
		
		$query = $db->exec("update inpatient$bid set
							inpatient_num='$inpatient_num', patient_name='$patient_name', patient_rrn='$patient_rrn', patient_diagn='$patient_diagn'
							, inpatient_start='$inpatient_start', inpatient_last='$inpatient_last', room_num='$room_num'
							where inpatient_array=$inpatient_array");
					
					
						
		header("Location:show_inpatient_view.php?bid=&bid&inpatient_array=$inpatient_array&page=$page");
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
   
</head>
<body>

<script>
	alert('모든값을 입력 해야합니다');
	history.back();
</script>

</body>
</html>