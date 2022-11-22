
   
<h2>당일 예약 환자</h2>

    <table class="table-booking">
   <tr>
   
		<th class="b-date"    >날짜        </th>
        <th class="b-name"    >환자명      </th>
        <th class="d-id"    >담당의사 ID </th>
		
    </tr>
    <?php
	$bid = empty($_REQUEST["bid"]) ? "" : $_REQUEST["bid"];  //bid : board ID 약자
	
	$numLines =5; //리스트 한페이지에 나올 행의 수 (글자수)
	$numLinks = 3; //한페이지에 표시할 페이지 링크 갯수
	
	$page  = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];
	$start = ($page - 1) *$numLines;
	
	require("db_connect.php");

	$query = $db->query("select * from booking$bid where date_format(booking_date,'%y-%m-%d') = CURDATE() order by booking_array desc limit $start, $numLines");
	while ($row = $query->fetch()) {

	
?>
	<tr>	
		<td><?=$row["booking_date"]?></td>
		<td><?=$row["booking_name"]?></td>
		<td><?=$row["doctor_id"]?></td>
    </tr>	
		<?php
		}
		?>
		</table>
	<br>
		<?php
		$firstLink = floor(($page -1) / $numLinks) *$numLinks  + 1;
		$lastLink  = $firstLink + $numLinks -1;
		
		$numRecords = $db->query("select count(*) from booking$bid where date_format(booking_date,'%y-%m-%d') = CURDATE() ")->fetchColumn();
		$numPages = ceil($numRecords / $numLines); //ceil(게시판테이블의 레코드수 /$numLines)
		if ($lastLink > $numPages){
			$lastLink = $numPages;
		}
?>
<div style="width:680px; text-align:center;">
<?php
		if ($firstLink > 1){
?>	
		<a href="index.php?bid=<?=$bid?>&page=<?=$firstLink - $numLinks?>">이전</a>
		
<?php
		}
		for ($i = $firstLink; $i <= $lastLink; $i++) {
 ?>
 
		<a href ="index.php?bid=<?=$bid?>&page=<?=$i?>"><?=($i ==$page) ? "<u>$i</u>" : $i?></a>
	
 <?php
		}
		
		if ($lastLink < $numPages){
	
 ?>
		<a href="index.php?bid=<?=$bid?>&page=<?=$firstLink +$numLinks?>">다음</a>
<?php
		}
?>
</div>


