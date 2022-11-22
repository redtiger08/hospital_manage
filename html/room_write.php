<?php
	$bid = empty($_REQUEST["bid"]) ? "" : $_REQUEST["bid"];

	//$room_num = "";
	$room_max = "";
	
	$action = "room_insert.php";
	
	
	$room_num=empty($_REQUEST["room_num"]) ? "" : $_REQUEST["room_num"];  // db empty 문
	$page  = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];
	//$num=isset($_REQUEST["num"]) ? $_REQUEST["num"] : ""; 이것도됨 위랑 아래 ㄱㅊ
	if($room_num){	//글번호가 주어졌으면
	
		require("db_connect.php");

		$query = $db->query("select * from room$bid where room_num=$room_num");
		if ($row = $query->fetch()) {
			$room_num = $row["room_num"];
			$room_max = $row["room_max"];
			
			$action = "room_update.php?bid=$bid&room_num=$room_num&page=$page";
		}
	}
	
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        table { width:680px; text-align:center; }
        th    { width:100px; background-color:cyan; }
        input[type=text], textarea { width:100%; }
    </style>
</head>
<body>
<form method="post" action="<?=$action?>"> 
    <table>
        <tr>
            <th>입원실 번호</th>
            <td><input type="text" name="room_num"  maxlength="80" value="<?=$room_num?>">
            </td>
        </tr>
        <tr>
            <th>입원실 정원</th>
            <td><input type="text" name="room_max" maxlength="20" value="<?=$room_max?>">
            </td>
        </tr>
		
    </table>
 <br>
    <input type="submit" value="저장">
    <input type="button" value="취소" onclick="history.back()">
</form>

</body>
</html>