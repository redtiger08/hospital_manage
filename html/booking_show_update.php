
<?php
	$bid = empty($_REQUEST["bid"]) ? "" : $_REQUEST["bid"];
	
	$booking_array = $_REQUEST["booking_array"];
	$page  = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];
	
	$booking_name = $_REQUEST["booking_name"];
	$patient_rrn = $_REQUEST["patient_rrn"];
	$doctor_id = $_REQUEST["doctor_id"];
	$booking_date = $_REQUEST["booking_date"];
	$booking_num = $_REQUEST["booking_num"];
	
	
	if($doctor_id && $booking_name && $patient_rrn && $booking_date && $booking_num ){
		require("db_connect.php");
	
		//$regtime = date("Y-m-d H:i:s"); 필요없음
		
		$query = $db->exec("update booking$bid set
							doctor_id='$doctor_id', booking_name='$booking_name', patient_rrn='$patient_rrn'
							, booking_date='$booking_date', booking_num='$booking_num'
							where booking_array=$booking_array");
					
					
						
		header("Location:booking_show_view.php?bid=&bid&booking_array=$booking_array&page=$page");
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