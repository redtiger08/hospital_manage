 <!doctype html>
 <html>
 <head>
     <meta charset="utf-8">
	 <style>
        table     { width:500px; text-align:center; padding: 20px; }
        th        { background-color:gray; text-align:center; }
        
		.list      { background-color:gray; font-size:20px; width:500px; }
    

    </style>
 </head>
 <body>
 
		<div class="list"> 입원실 등록 </div>
		<form action="room_setting.php" method="post">
			<table>
				<tr>
					<td>방번호(1번방일시 01 x > 1 o)</td>
					<td><input type="text" name="room_num"></td>
				</tr>
				<tr>
					<td>최대 수용 인원</td>
					<td><input type="text" name="room_max"></td>
				</tr>
			
			</table>    
			<input type="submit" value="확인"> 
			
		
		
  </form>
  
  </body>
  </html>