<?php
	$bid = empty($_REQUEST["bid"]) ? "" : $_REQUEST["bid"];

	$patient_chart = $_REQUEST["patient_chart"];
	$patient_name = $_REQUEST["patient_name"];
	$patient_rrn = $_REQUEST["patient_rrn"];
	$patient_diagn = $_REQUEST["patient_diagn"];
	$patient_meet_date = $_REQUEST["patient_meet_date"];
	$patient_room = $_REQUEST["patient_room"];
	$doctor_name = $_REQUEST["doctor_name"];
	
	
	if($patient_chart && $patient_name && $patient_rrn && $patient_diagn && $patient_meet_date && $patient_room && $doctor_name ){
		require("db_connect.php");
	
		//$regtime = date("Y-m-d H:i:s");
		//$regtime = date("Y-m-d H:i:s");
		
		$query = $db->exec("insert into patient$bid (patient_chart, patient_name, patient_rrn, patient_diagn, 
								patient_meet_date ,patient_room, doctor_name,hits) 
						values ('$patient_chart', '$patient_name', '$patient_rrn','$patient_diagn',
								'$patient_meet_date','$patient_room','$doctor_name' ,0)");
						
						
		header("Location:show_patient_if.php?bid=$bid");
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