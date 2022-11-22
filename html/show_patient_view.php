<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        table { width:680px; text-align:center; }
        th    { width:100px; background-color:cyan; }
        td    { text-align:left; border:1px solid gray; }
    </style>
</head>
<body>
<?php
	$bid = empty($_REQUEST["bid"]) ? "" : $_REQUEST["bid"];
	
	$num = $_REQUEST["num"];
	$page  = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];
	
	require("db_connect.php");

	$query = $db->query("select * from patient$bid where num=$num");
	if ($row = $query->fetch()) {
		
		$db->exec("update patient$bid set hits=hits+1 where num=$num");
		
		
		$patient_digan = str_replace(" ", "&nbsp;", $row["patient_diagn"]);
		$patient_digan = str_replace("\n", "<br>", $patient_digan);

	
?>


		<table>
			<tr>
				<th>차트번호</th>
				<td><?=$row["patient_chart"]?></td>
			</tr>
			<tr>
				<th>환자이름</th>
				<td><?=$row["patient_name"]?></td>
			</tr>
			<tr>
				<th>환자 주민번호</th>
				<td><?=$row["patient_rrn"]?></td>
			</tr>
			<tr>
				<th>진단 내용</th>
				<td><?=$row["patient_diagn"]?></td>
			</tr>
			<tr>
				<th>진료 날짜</th>
				<td><?=$row["patient_meet_date"]?></td>
			</tr>
			<tr>
				<th>입원 유무</th>
				<td><?=$row["patient_room"]?></td>
			</tr>
			<tr>
				<th>담당 의사</th>
				<td><?=$row["doctor_name"]?></td>
			</tr>
			<tr>
				<th>조회수</th>
				<td><?=$row["hits"]?></td>
			</tr>
			
		</table>

	<?php
		}
	
?>

<br>
<input type="button" value="목록보기" onclick="location.href='show_patient_if.php?bid=<?=$bid?>&page=<?=$page?>'">
<input type="button" value="수정"  onclick="location.href='show_patient_write.php?bid=<?=$bid?>&num=<?=$num?>&page=<?=$page?>'">
<input type="button" value="삭제" onclick="location.href='show_patient_delete.php?bid=<?=$bid?>&num=<?=$num?>&page=<?=$page?>'">

</body>
</html>