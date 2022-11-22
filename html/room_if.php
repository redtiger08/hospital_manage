 <?php
     session_start();
 ?>
   
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        table     { width:500px; text-align:center; }
        th        { background-color:gray; text-align:center; }
        
		.num      { width: 80px; }
		
        .room_max  { width: 110px; }
        .room_num   { width:100px; }
   
		
        a:link    { text-decoration:none; backgroundcolor:gray; }
	
		
		/*  헤더 전체 */
    header {
        width: 100%;
        height: 180px;
        display:flex;
        background: silver;
    }
    

  

  
   
    </style>
</head>
<body>
	

	<!--오늘은 게시판에 간단한 검색 기능을 구현해 볼 것이다.

 

일단 index.php를 열어 검색박스용 태그를 만든다
이부분 이후로해야됨   https://dawitblog.tistory.com/21-->
<table>
   <tr>
		<th class="room_num"   >입원실 번호    </th>
        <th class="room_max"     >입원실 정원    </th>
      
    </tr>
	
<?php
	$bid = empty($_REQUEST["bid"]) ? "" : $_REQUEST["bid"];  //bid : board ID 약자
	
	$numLines =5; //리스트 한페이지에 나올 행의 수 (글자수)
	$numLinks = 3; //한페이지에 표시할 페이지 링크 갯수
	
	$page  = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];
	$start = ($page - 1) *$numLines;
	
	require("db_connect.php");

	$query = $db->query("select * from room$bid order by room_num desc limit $start, $numLines");
	while ($row = $query->fetch()) {

	
?>

<tr>	
		
		<td style="text-align:left;"><a href="room_view.php?bid=<?=$bid?>&room_num=<?=$row["room_num"]?>&page=<?=$page?>">
		 <?=$row["room_num"]?> </a></td>
		<td><?=$row["room_max"]?></td>
		
	
   
    </tr>
	
	<?php
		}
		?>
	</table>
	<br>
		<?php
		$firstLink = floor(($page -1) / $numLinks) *$numLinks  + 1;
		$lastLink  = $firstLink + $numLinks -1;
		
		$numRecords = $db->query("select count(*) from room$bid")->fetchColumn();
		$numPages = ceil($numRecords / $numLines); //ceil(게시판테이블의 레코드수 /$numLines)
		if ($lastLink > $numPages){
			$lastLink = $numPages;
		}
?>
<div style="width:680px; text-align:center;">
<?php
		if ($firstLink > 1){
?>	
		<a href="room_if.php?bid=<?=$bid?>&page=<?=$firstLink - $numLinks?>">이전</a>
		
<?php
		}
		for ($i = $firstLink; $i <= $lastLink; $i++) {
 ?>
 
		<a href ="room_if.php?bid=<?=$bid?>&page=<?=$i?>"><?=($i ==$page) ? "<u>$i</u>" : $i?></a>
	
 <?php
		}
		
		if ($lastLink < $numPages){
	
 ?>
		<a href="room_if.php?bid=<?=$bid?>&page=<?=$firstLink +$numLinks?>">다음</a>
<?php
		}
?>
</div>
<br><br>

	<input type="button" value="글쓰기" onclick="location.href='room_write.php?bid=<?=$bid?>'">

</body>
</html>