<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<?php 
    $id   = isset($_REQUEST["doctor_id"  ]) ? $_REQUEST["doctor_id"  ] : "";
    $pw   = isset($_REQUEST["doctor_pw"  ]) ? $_REQUEST["doctor_pw"  ] : "";
    $name = isset($_REQUEST["doctor_name"]) ? $_REQUEST["doctor_name"] : "";
	$rrn  = isset($_REQUEST["doctor_rrn" ]) ? $_REQUEST["doctor_rrn" ] : "";
    
        require("db_connect.php");
    
        if (!($id && $pw && $name && $rrn)) {
?>
            <script>
                alert('빈칸 없이 입력해야 합니다.');
                history.back();
            </script>
<?php            
        } else if ($db->query("select count(*) from doctor where doctor_id='$id'")->fetchColumn() > 0) {
?>            
            <script>
                alert('이미 등록된 아이디입니다.');
                history.back();
            </script>
<?php            
        } else {
            $db->exec("insert into doctor values ('$id', '$pw', '$name', '$rrn')");
?>            
            <script>
                alert('가입이 완료되었습니다.');
                window.close();
            </script>
<?php            
        }
?>

</body>
</html>
