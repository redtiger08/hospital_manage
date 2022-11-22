<?php
	$bid = empty($_REQUEST["bid"]) ? "" : $_REQUEST["bid"];

	$patient_chart = "";
	$patient_name = "";
	$patient_rrn = "";
	$patient_diagn = "";
	$patient_meet_date = "";
	$patient_room = "";
	$doctor_name = "";
	$action = "show_patient_insert.php";
	
	
	$num=empty($_REQUEST["num"]) ? "" : $_REQUEST["num"];  // db empty 문
	$page  = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];
	//$num=isset($_REQUEST["num"]) ? $_REQUEST["num"] : ""; 이것도됨 위랑 아래 ㄱㅊ
	if($num){	//글번호가 주어졌으면
	
		require("db_connect.php");

		$query = $db->query("select * from patient$bid where num=$num");
		if ($row = $query->fetch()) {
			$patient_chart = $row["patient_chart"];
			$patient_name = $row["patient_name"];
			$patient_rrn = $row["patient_rrn"];
			$patient_diagn = $row["patient_diagn"];
			$patient_meet_date = $row["patient_meet_date"];
			$patient_room = $row["patient_room"];
			$doctor_name = $row["doctor_name"];
			$action = "show_patient_update.php?bid=$bid&num=$num&page=$page";
		}
	}
	
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        table { width:680px; text-align:center; }
        th    { width:100px; background-color:gray; }
        input[type=text], textarea { width:100%; }
    </style>
</head>
<body>
		<div style= "display: flex">	
			<div>
			
				<form method="post" action="<?=$action?>"> 
					<table>
						<tr>
							<th>차트 번호</th>
							<td><input type="text" name="patient_chart"  maxlength="80" value="<?=$patient_chart?>">
							</td>
						</tr>
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
							<th>진료 날짜</th>
							<td><input type="date" name="patient_meet_date" maxlength="20" value="<?=$patient_meet_date?>">
							</td>
						</tr>
						<tr>
							<th>입원 유무</th>
							<td><input type="text" name="patient_room" maxlength="20" value="<?=$patient_room?>">
							</td>
						</tr>
						<tr>
							<th>담당 의사</th>
							<td><input type="text" name="doctor_name" maxlength="20" value="<?=$doctor_name?>">
							</td>
						</tr>
					</table>
				<br>
					<input type="submit" value="저장">
					<input type="button" value="취소" onclick="history.back()">
				</form>
			</div>	
			<div>
			<?php
			require("booking_dlist.php");
		?>
		</div>
	</div>
</body>
</html>