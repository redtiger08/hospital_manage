<?php 
    $id = $_REQUEST["id"];
    $pw = $_REQUEST["pw"];
    
        require("db_connect.php");
    
        $query = $db->query("select * from doctor where doctor_id='$id' and doctor_pw='$pw'");
        if ($row = $query->fetch()) {
            session_start();
            
            $_SESSION["userId"  ] = $row["doctor_id"  ];
            $_SESSION["userName"] = $row["doctor_name"];
            
            header("Location:login_main.php");
            exit;
        }
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<script>
    alert('아이디 또는 비밀번호가 틀렸습니다.');
    history.back();
</script>

</body>
</html>