<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<?php 
    $p_num   = isset($_REQUEST["patient_num"  ]) ? $_REQUEST["patient_num"  ] : "";  
    $rrn   = isset($_REQUEST["patient_rrn"  ]) ? $_REQUEST["patient_rrn"  ] : "";	
    $chart = isset($_REQUEST["patient_chart"]) ? $_REQUEST["patient_chart"] : "";
	$p_diagn = isset($_REQUEST["patient_diagn"]) ? $_REQUEST["patient_diagn"] : "";
	$p_meet = isset($_REQUEST["patient_meet_date"]) ? $_REQUEST["patient_meet_date"] : "";
	$p_room = isset($_REQUEST["patient_room"]) ? $_REQUEST["patient_room"] : "";
	$d_name = isset($_REQUEST["doctor_name"]) ? $_REQUEST["doctor_name"] : "";
    
        require("db_connect.php");  
    
        if (!($p_num && $rrn && $chart&& $p_diagn && $p_meet && $p_room && $d_name)) {
?>
            <script>
                alert('빈칸 없이 입력해야 합니다.');
                history.back();
            </script>
<?php            
        } else if ($db->query("select count(*) from patient where patient_chart='$chart'")->fetchColumn() > 0) {
?>            
            <script>
                alert('이미 환자등록이 되어 있습니다');
                history.back();
            </script>
<?php
        } else if ($db->query("select count(*) from doctor where doctor_name='$d_name'")->fetchColumn() <= 0) {
?>
            <script>
                alert('존재하지 않는 의사이름입니다');
                history.back();
            </script>

<?php            
        } else {
            $db->exec("insert into patient(patient_name, patient_rrn, patient_chart, patient_diagn, patient_meet_date , patient_room, doctor_name, hits)
			values ('$p_num', '$rrn', '$chart', '$p_diagn', '$p_meet', '$p_room','$d_name',0)");
?>            
            <script>
                alert('환자등록이 완료되었습니다.');
                window.close();
            </script>
<?php            
        }
?>

</body>
</html>
