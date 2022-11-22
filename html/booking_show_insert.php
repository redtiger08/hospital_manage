<?php
	$bid = empty($_REQUEST["bid"]) ? "" : $_REQUEST["bid"];


	$booking_name = $_REQUEST["booking_name"];
	$patient_rrn = $_REQUEST["patient_rrn"];
	$doctor_id = $_REQUEST["doctor_id"];
	$booking_date = $_REQUEST["booking_date"];
	$booking_num = $_REQUEST["booking_num"];

	
	if( $booking_name && $patient_rrn && $doctor_id && $booking_date && $booking_num){
		require("db_connect.php");
	
		//$regtime = date("Y-m-d H:i:s");
		//$regtime = date("Y-m-d H:i:s");
		
		$query = $db->exec("insert into booking$bid ( booking_name, patient_rrn, doctor_id, 
								booking_date ,booking_num) 
						values ( '$booking_name', '$patient_rrn','$doctor_id',
								'$booking_date','$booking_num')");
						
						
		header("Location:booking_show_if.php?bid=$bid");
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