<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<?php 
    $r_num   = isset($_REQUEST["room_num"  ]) ? $_REQUEST["room_num"  ] : "";
    $r_max   = isset($_REQUEST["room_max"  ]) ? $_REQUEST["room_max"  ] : "";

    
        require("db_connect.php");
    
        if (!($r_num && $r_max )) {
?>
            <script>
                alert('빈칸 없이 입력해야 합니다.');
                history.back();
            </script>
<?php            
        } else if ($db->query("select count(*) from room where room_num='$r_num'")->fetchColumn() > 0) {
?>            
            <script>
                alert('이미 등록된 입원실 입니다.');
                history.back();
            </script>
<?php            
        } else {
            $db->exec("insert into room values ('$r_num', '$r_max')");
?>            
            <script>
                alert('입원실 등록이 완료되었습니다.');
                window.close();
            </script>
<?php            
        }
?>

</body>
</html>
