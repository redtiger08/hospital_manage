<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<?php
    $b_name   = isset($_REQUEST["booking_name"  ]) ? $_REQUEST["booking_name"  ] : "";
    $rrn   = isset($_REQUEST["patient_rrn"  ]) ? $_REQUEST["patient_rrn"  ] : "";
    $d_id = isset($_REQUEST["doctor_id"]) ? $_REQUEST["doctor_id"] : "";
	$b_date = isset($_REQUEST["booking_date"]) ? $_REQUEST["booking_date"] : "";
	$b_num = isset($_REQUEST["booking_num"]) ? $_REQUEST["booking_num"] : "";

        require("db_connect.php");

        if (!($b_name && $rrn && $d_id&& $b_date && $b_num)) {
?>
            <script>
                alert('빈칸 없이 입력해야 합니다.');
                history.back();
            </script>
<?php
        } else if ($db->query("select count(*) from booking where booking_num='$b_num'")->fetchColumn() > 0) {
?>
            <script>
                alert('이미 환자등록이 되어 있습니다');
                history.back();
            </script>
<?php
        } else if( $db->query("select count(*) from doctor where doctor_id='$d_id'")->fetchColumn() <= 0) {
	?>
			<script>
                alert('해당 의사는 존재하지 않습니다.');
                history.back();
            </script>
	<?php
        }else{

            $db->exec("insert into booking(booking_name,patient_rrn,doctor_id,booking_date,booking_num)
			values ('$b_name', '$rrn', '$d_id', '$b_date', '$b_num')");
			
			if ($db->query("select count(*) from patient where patient_rrn='$rrn'")->fetchColumn() <= 0)
			{
		
?>
		
			
            <script>
                alert('신규 환자예약이 완료되었습니다.');
                window.close();
            </script>
<?php
			} else{
?>			
			<script>
                alert('환자예약이 완료되었습니다.');
                window.close();
            </script>
<?php
			}
		} 
?>

</body>
</htm
