<?php
	$bid = empty($_REQUEST["bid"]) ? "" : $_REQUEST["bid"];
	
	$room_num = $_REQUEST["room_num"];
	$page  = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];
	
	
	$room_max = $_REQUEST["room_max"];
	
	if($room_num && $room_max ){
		require("db_connect.php");
	
		//$regtime = date("Y-m-d H:i:s"); 필요없음
		
		$query = $db->exec("update room$bid set
							room_num='$room_num', room_max='$room_max'
							where room_num=$room_num");
					
					
						
		header("Location:room_view.php?bid=&bid&room_num=$room_num&page=$page");
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
   
</head>
<body>

<script>
	alert('모든값을 입력 해야합니다');
	history.back();
</script>

</body>
</html>