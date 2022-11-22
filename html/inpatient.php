<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<?php 
  //  $p_name   	= isset($_REQUEST["patient_name"    ]) ? $_REQUEST["patient_name"    ] : "";  
    $ip_start   = isset($_REQUEST["inpatient_start" ]) ? $_REQUEST["inpatient_start" ] : "";	
    $ip_last 	= isset($_REQUEST["inpatient_last"  ]) ? $_REQUEST["inpatient_last"  ] : "";
	$p_rrn 		= isset($_REQUEST["patient_rrn"     ]) ? $_REQUEST["patient_rrn"     ] : "";
//	$p_diagn 	= isset($_REQUEST["patient_diagn"   ]) ? $_REQUEST["patient_diagn"   ] : "";
	$r_num 		= isset($_REQUEST["room_num"        ]) ? $_REQUEST["room_num"        ] : "";
	$ip_num 	= isset($_REQUEST["inpatient_num"   ]) ? $_REQUEST["inpatient_num"   ] : "";
	
    
        require("db_connect.php");  
    $p_name = $db->query("select patient_name from patient where patient_rrn ='$p_rrn'")->fetchColumn()	;
	$p_diagn = $db->query("select patient_diagn from patient where patient_rrn ='$p_rrn'  ORDER BY patient_chart desc LIMIT 1 ")->fetchColumn()	;
	
	//	echo("SELECT COUNT(*) FROM inpatient WHERE room_num = $r_num and inpatient_start<=str_to_date('$ip_start', '%Y-%m-%d')and 
    //                            inpatient_last >=str_to_date('$ip_last', '%Y-%m-%d');");
	//echo $haha;
	//exit();
        if (!( $ip_start && $ip_last && $p_rrn  && $r_num && $ip_num)) {
?>
            <script>
                alert('빈칸 없이 입력해야 합니다.');
                history.back();
            </script>
<?php            
        } else if ($db->query("select count(*) from inpatient where inpatient_num='$ip_num'")->fetchColumn() > 0) {
?>            
            <script>
                alert('이미 환자등록이 되어 있습니다');
                history.back();
            </script>
			
<?php
        } else if( $db->query("select count(*) from patient where patient_rrn='$p_rrn'")->fetchColumn() <= 0) {
?>
			<script>
                alert('해당 주민등록번호로된 진료 기록이 없습니다.');
				alert('입원 절차는 진료 이후에 이루어 져야 합니다.');
                history.back();
            </script>
			
<?php
        } else if( $db->query("SELECT COUNT(*) FROM inpatient WHERE room_num = $r_num and inpatient_start<=str_to_date('$ip_last', '%Y-%m-%d')and 
                                inpatient_last >=str_to_date('$ip_start', '%Y-%m-%d');")->fetchColumn() >= $db->query("SELECT room_max FROM room where room_num=$r_num ")->fetchColumn()) {
?>
			<script>
				alert('해당 입원실에 예약이 다 찼습니다.');
                history.back();
            </script>
<?php            
        } else {
			
            $db->exec("insert into inpatient(patient_name, inpatient_start, inpatient_last, patient_rrn, patient_diagn, room_num, inpatient_num)
			values ('$p_name', '$ip_start', '$ip_last', '$p_rrn', '$p_diagn', '$r_num', '$ip_num')");
?>            
            <script>
                alert('입원등록이 완료되었습니다.');
                window.close();
            </script>
<?php            
        }
?>

</body>
</html>
