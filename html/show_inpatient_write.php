<?php
	$bid = empty($_REQUEST["bid"]) ? "" : $_REQUEST["bid"];

	$patient_name = "";
	$patient_rrn = "";
	$patient_diagn = "";
	$inpatient_num = "";
	$inpatient_start = "";
	$inpatient_last = "";
	$room_num = "";
	$action = "show_inpatient_insert.php";
	
	
	$inpatient_array=empty($_REQUEST["inpatient_array"]) ? "" : $_REQUEST["inpatient_array"];  // db empty 문
	$page  = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];
	//$num=isset($_REQUEST["num"]) ? $_REQUEST["num"] : ""; 이것도됨 위랑 아래 ㄱㅊ
	if($inpatient_array){	//글번호가 주어졌으면
	
		require("db_connect.php");

		$query = $db->query("select * from inpatient$bid where inpatient_array=$inpatient_array");
		if ($row = $query->fetch()) {
			$patient_name = $row["patient_name"];
			$patient_rrn = $row["patient_rrn"];
			$patient_diagn = $row["patient_diagn"];
			$inpatient_num = $row["inpatient_num"];
			$inpatient_start = $row["inpatient_start"];
			$inpatient_last = $row["inpatient_last"];
			$room_num = $row["room_num"];
			$action = "show_inpatient_update.php?bid=$bid&inpatient_array=$inpatient_array&page=$page";
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
            <th>환자이름</th>
            <td><input type="text" name="patient_name" maxlength="20" value="<?=$patient_name?>">
            </td>
        </tr>
		<tr>
            <th>환자 주민번호</th>
            <td><input type="text" name="patient_rrn" maxlength="20" value="<?=$patient_rrn?>">
            </td>
        </tr>
        <tr>
            <th>진단 내용</th>
            <td><textarea name="patient_diagn" rows="10"><?=$patient_diagn?></textarea>
            </td>
        </tr>
		 <tr>
            <th>입원 번호</th>
            <td><input type="text" name="inpatient_num"  maxlength="80" value="<?=$inpatient_num?>">
            </td>
        </tr>
		<tr>
            <th>입원 시작일</th>
            <td><input type="date" name="inpatient_start" maxlength="20" value="<?=$inpatient_start?>">
            </td>
        </tr>
		<tr>
            <th>입원 종료일</th>
            <td><input type="date" name="inpatient_last" maxlength="20" value="<?=$inpatient_last?>">
            </td>
        </tr>
		<tr>
            <th>입원실 번호</th>
            <td><input type="text" name="room_num" maxlength="20" value="<?=$room_num?>">
            </td>
        </tr>
    </table>
 <br>
    <input type="submit" value="저장">
    <input type="button" value="취소" onclick="history.back()">
</form>

</body>
</html>