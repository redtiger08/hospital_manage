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
	
	$booking_array = $_REQUEST["booking_array"];
	$page  = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];
	
	require("db_connect.php");

	$query = $db->query("select * from booking$bid where booking_array=$booking_array");
	if ($row = $query->fetch()) {
		
		//$db->exec("update inpatient$bid set hits=hits+1 where booking_array=$booking_array");
		
		
		//$patient_digan = str_replace(" ", "&nbsp;", $row["patient_diagn"]);
		//$patient_digan = str_replace("\n", "<br>", $patient_digan);

	
?>


		<table>
			<tr>
				<th>예약 환자이름</th>
				<td><?=$row["booking_name"]?></td>
			</tr>
			<tr>
				<th>환자 주민번호</th>
				<td><?=$row["patient_rrn"]?></td>
			</tr>
			<tr>
				<th>담당 의사 아이디</th>
				<td><?=$row["doctor_id"]?></td>
			</tr>
			<tr>
				<th>예약 일</th>
				<td><?=$row["booking_date"]?></td>
			</tr>
			<tr>
				<th>예약 번호</th>
				<td><?=$row["booking_num"]?></td>
			</tr>
			
		
		
			
		</table>

	<?php
		}
	
?>

<br>
<input type="button" value="목록보기" onclick="location.href='booking_show_if.php?bid=<?=$bid?>&page=<?=$page?>'">
<input type="button" value="수정"  onclick="location.href='booking_show_write.php?bid=<?=$bid?>&booking_array=<?=$booking_array?>&page=<?=$page?>'">
<input type="button" value="삭제" onclick="location.href='booking_show_delete.php?bid=<?=$bid?>&booking_array=<?=$booking_array?>&page=<?=$page?>'">

</body>
</html>