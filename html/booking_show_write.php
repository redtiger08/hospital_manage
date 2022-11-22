<?php
	$bid = empty($_REQUEST["bid"]) ? "" : $_REQUEST["bid"];

	$booking_name = "";
	$patient_rrn = "";
	$doctor_id = "";
	$booking_date = "";
	$booking_num = "";

	$action = "booking_show_insert.php";
	
	
	$booking_array=empty($_REQUEST["booking_array"]) ? "" : $_REQUEST["booking_array"];  // db empty 문
	$page  = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];
	//나중에 해당 php 를 if에서 오는경우 생길수도 있으니까 남겨놓음
	if($booking_array){	//글번호가 주어졌으면
	
		require("db_connect.php");

		$query = $db->query("select * from booking$bid where booking_array=$booking_array");
		if ($row = $query->fetch()) {
			$booking_name = $row["booking_name"];
			$patient_rrn = $row["patient_rrn"];
			$doctor_id = $row["doctor_id"];
			$booking_date = $row["booking_date"];
			$booking_num = $row["booking_num"];
		
			$action = "booking_show_update.php?bid=$bid&booking_array=$booking_array&page=$page";
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
            <th>예약 환자 이름</th>
            <td><input type="text" name="booking_name" maxlength="20" value="<?=$booking_name?>">
            </td>
        </tr>
		<tr>
            <th>환자 주민번호</th>
            <td><input type="text" name="patient_rrn" maxlength="20" value="<?=$patient_rrn?>">
            </td>
        </tr>
        <tr>
            <th>담당 의사 아이디</th>
			<td><input type="text" name="doctor_id" maxlength="20" value="<?=$doctor_id?>">
            </td>
        </tr>
		 <tr>
            <th>예약 일</th>
            <td><input type="date" name="booking_date"  maxlength="80" value="<?=$booking_date?>">
            </td>
        </tr>
		<tr>
            <th>예약 번호</th>
            <td><input type="text" name="booking_num" maxlength="20" value="<?=$booking_num?>">
            </td>
        </tr>
	
    </table>
 <br>
    <input type="submit" value="저장">
    <input type="button" value="취소" onclick="history.back()">
</form>

</body>
</html>