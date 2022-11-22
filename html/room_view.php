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
	
	$room_num = $_REQUEST["room_num"];
	$page  = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];
	
	require("db_connect.php");

	$query = $db->query("select * from room$bid where room_num=$room_num");
	if ($row = $query->fetch()) {
		
		//$db->exec("update inpatient$bid set hits=hits+1 where inpatient_array=$inpatient_array");
		
		
		//$patient_digan = str_replace(" ", "&nbsp;", $row["patient_diagn"]);
		//$patient_digan = str_replace("\n", "<br>", $patient_digan);

	
?>


		<table>
			<tr>
				<th>입원실 번호</th>
				<td><?=$row["room_num"]?></td>
			</tr>
			<tr>
				<th>입원실 정원</th>
				<td><?=$row["room_max"]?></td>
			</tr>
			
		
		
			
		</table>

	<?php
		}
	
?>

<br>
<input type="button" value="목록보기" onclick="location.href='room_if.php?bid=<?=$bid?>&page=<?=$page?>'">
<input type="button" value="수정"  onclick="location.href='room_write.php?bid=<?=$bid?>&room_num=<?=$room_num?>&page=<?=$page?>'">
<input type="button" value="삭제" onclick="location.href='room_delete.php?bid=<?=$bid?>&room_num=<?=$room_num?>&page=<?=$page?>'">

</body>
</html>