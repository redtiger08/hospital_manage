<?php
	$bid = empty($_REQUEST["bid"]) ? "" : $_REQUEST["bid"];


	$patient_name = $_REQUEST["patient_name"];
	$patient_rrn = $_REQUEST["patient_rrn"];
	$patient_diagn = $_REQUEST["patient_diagn"];
	$inpatient_num = $_REQUEST["inpatient_num"];
	$inpatient_start = $_REQUEST["inpatient_start"];
	$inpatient_last = $_REQUEST["inpatient_last"];
	$room_num = $_REQUEST["room_num"];
	
	if( $patient_name && $patient_rrn && $patient_diagn && $inpatient_num && $inpatient_start && $inpatient_last && $room_num ){
		require("db_connect.php");
	
		//$regtime = date("Y-m-d H:i:s");
		//$regtime = date("Y-m-d H:i:s");
		
		$query = $db->exec("insert into inpatient$bid ( patient_name, patient_rrn, patient_diagn, 
								inpatient_num ,inpatient_start, inpatient_last,room_num) 
						values ( '$patient_name', '$patient_rrn','$patient_diagn',
								'$inpatient_num','$inpatient_start','$inpatient_last' ,'$room_num')");
						
						
		header("Location:show_inpatient_if.php?bid=$bid");
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