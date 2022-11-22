 <?php
     session_start();
 ?>
   
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        table     { width:1100px; text-align:center; }
        th        { background-color:gray; }
        
		.num      { width: 80px; }
		
        .patient_chart  { width: 110px; }
        .patient_name   { width:100px; }
        .patient_rrn  { width:180px; }
		.patient_digan    { width:230px; }
		.patient_meet_date{width:180px; }
		.patient_room	{width:70px;}
		.doctor_name	{width:100px;}
		
        a:link    { text-decoration:none; backgroundcolor:gray; }
	
		
		/*  헤더 전체 */
    header {
        width: 100%;
        height: 180px;
        display:flex;
        background: silver;
    }
    
    /* 헤더 왼쪽 로고 있는 부분 */
    .head-left {
        width: 100px;
        height: 100%;
    }
    .head-logo {
        width: 50px;
        height: 50px;
        margin: 50px 0 0 25px;
    }
    
    /* 헤더 오른쪽 파트, 메뉴 있는 부분 : 이 부분은 다시 위쪽(top)과 아래쪽(bottom)으로 나누어짐*/
    .head-right {
        width: 100%;
        height: 100%;
    }
    
    /* 헤더 오른쪽의 위쪽 탑 메뉴 파트 */
    .head-right-top {
        display: flex;
        width: 100%;
        margin: 20px 0 0 470px;
    }
    
    .top-menu {
        display: block;
        width: 100px;
        height: 50px;
        padding-top: 20px;
        text-decoration : none;
        text-align : center;
        color : black;
    }
    .top-menu:hover {
        background: gray;
    }

    /* 헤더 오른쪽의 아래 메인 메뉴 파트 */
    .head-right-bottom {
        display: flex;
        width: 100%;
        margin: 20px 0 0 170px;
    }
    
    .main-menu {
        display: block;
        width: 150px;
        height: 50px;
        padding-top: 20px;
        text-decoration : none;
        text-align : center;
        color : black;
    }
    .main-menu:hover {
        background: gray;
    }
    </style>
</head>
<body>
	<?php
				require("header_inpatient_if.php");
			?>
	<div id="search_box">
		<form action="show_inpatient_result.php" method ="get">
			<select name= "catgo">
				<option value="patient_name"> 환자명 </option>
				<option value="patient_diagn"> 진료 내용 </option>
				<option value="room_num"> 입원실 </option>
				
			</select>	
			<input type="text" name="search" size="50" required= "required" /> <button>검색</button>
		</form>
	</div>
	<div id="search_box">
		<form action="show_inpatient_result.php" method ="get">
			<select name= "catgo">
				
				<option value="inpatient_start"> 입원시작일 </option>
				<option value="inpatient_last"> 입원종료일 </option>
			</select>	
			<input type="date" name="search" size="50" required= "required" /> <button>검색</button>
		</form>
	</div>
	<?php
 
  /* 검색 변수 */
  $catagory = $_GET['catgo'];
  $search_con = $_GET['search'];
  if($catagory=='patient_name'){
        $catname = '환자명';
    } else if($catagory=='patient_diagn'){
        $catname = '진료 내용';
    } else if($catagory=='room_num'){
        $catname = '입원실';
    }else if($catagory=='inpatient_start'){
        $catname = '입원시작일';
    }else if($catagory=='inpatient_last'){
        $catname = '입원종료일';
    }
?>
	<!--오늘은 게시판에 간단한 검색 기능을 구현해 볼 것이다.

 

일단 index.php를 열어 검색박스용 태그를 만든다
이부분 이후로해야됨   https://dawitblog.tistory.com/21-->
<h3><?php echo $catname; ?>:<?php echo $search_con; ?> 검색결과</h3>
<table>
   <tr>
		<th class="inpatient_array"   >번호    </th>
        <th class="patient_name"     >환자 이름    </th>
        <th class="patient_rrn"      >환자 주민번호  </th>
        <th class="patient_digan"    >진단 내용  </th>
		<th class="inpatient_num"	 >입원 번호</th>
		<th class="inpatient_start"  >입원 시작일</th>
		<th class="inpatient_last"	 >입원 종료일</th>
		<th class="room_num"		 >입원실 번호</th>
    </tr>
	
<?php
	$bid = empty($_REQUEST["bid"]) ? "" : $_REQUEST["bid"];  //bid : board ID 약자
	
	$numLines =5; //리스트 한페이지에 나올 행의 수 (글자수)
	$numLinks = 3; //한페이지에 표시할 페이지 링크 갯수
	
	$page  = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];
	$start = ($page - 1) *$numLines;
	
	require("db_connect.php");

	$query = $db->query("select * from inpatient$bid where $catagory like '$search_con' order by inpatient_array desc limit $start, $numLines");
	while ($row = $query->fetch()) {

	
?>

<tr>	
		<td><?=$row["inpatient_array"]?></td>
		<td style="text-align:left;"><a href="show_inpatient_view.php?bid=<?=$bid?>&inpatient_array=<?=$row["inpatient_array"]?>&page=<?=$page?>">
		 <?=$row["patient_name"]?> </a></td>
		<td><?=$row["patient_rrn"]?></td>
		<td><?=$row["patient_diagn"]?></td>
		 <td><?=$row["inpatient_num"]?></td>
		<td><?=$row["inpatient_start"]?></td>
		<td><?=$row["inpatient_last"]?></td>
		<td><?=$row["room_num"]?></td>
    </tr>
	
	<?php
		}
		?>
	</table>
	<br>
		<?php
		$firstLink = floor(($page -1) / $numLinks) *$numLinks  + 1;
		$lastLink  = $firstLink + $numLinks -1;
		
		$numRecords = $db->query("select count(*) from inpatient$bid where $catagory like '$search_con'")->fetchColumn();
		$numPages = ceil($numRecords / $numLines); //ceil(게시판테이블의 레코드수 /$numLines)
		if ($lastLink > $numPages){
			$lastLink = $numPages;
		}
?>
<div style="width:680px; text-align:center;">
<?php
		if ($firstLink > 1){
?>	
		<a href="show_inpatient_if.php?bid=<?=$bid?>&page=<?=$firstLink - $numLinks?>">이전</a>
		
<?php
		}
		for ($i = $firstLink; $i <= $lastLink; $i++) {
 ?>
 
		<a href ="show_inpatient_if.php?bid=<?=$bid?>&page=<?=$i?>"><?=($i ==$page) ? "<u>$i</u>" : $i?></a>
	
 <?php
		}
		
		if ($lastLink < $numPages){
	
 ?>
		<a href="show_inpatient_if.php?bid=<?=$bid?>&page=<?=$firstLink +$numLinks?>">다음</a>
<?php
		}
?>
</div>
<br><br>
	
<input type="button" value="글쓰기" onclick="location.href='show_inpatient_write.php?bid=<?=$bid?>'">

</body>
</html>