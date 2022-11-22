<?php
	$bid = empty($_REQUEST["bid"]) ? "" : $_REQUEST["bid"];


	$room_num = $_REQUEST["room_num"];
	$room_max = $_REQUEST["room_max"];
	
	
	if( $room_num && $room_max ){
		require("db_connect.php");
	
		
		$query = $db->exec("insert into room$bid ( room_num, room_max) 
						values ( '$room_num', '$room_max')");
						
						
		header("Location:room_if.php?bid=$bid");
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