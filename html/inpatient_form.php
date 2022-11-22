 <!doctype html>
 <html>
 <head>
     <meta charset="utf-8">
	  <style>
        table     { width:500px; text-align:center; padding: 20px; }
        th        { background-color:gray; text-align:center; }
        
		.list      { background-color:gray; font-size:20px; width:500px; }

    }

    </style>
 </head>
 <body>
 <div class="list"> 입원실 데이터 </div>
 <form action="inpatient.php" method="post">
     <table>
        
		 <tr>
              <td>입원 날짜</td>
              <td><input type="date" name="inpatient_start"></td>  
         </tr>
		  <tr>
              <td>퇴원 날짜</td>
              <td><input type="date" name="inpatient_last"></td>  
         </tr>
		 <tr>
             <td>환자 주민번호</td>
             <td><input type="text" name="patient_rrn"></td> <!-- rrn은 주민등록번호 약자 -->
         </tr>
		
		 <tr>
              <td>입원실 번호</td>
              <td><input type="text" name="room_num"></td>  
         </tr>
		 <tr>
             <td>입원 번호 YYMMDDXX 형식</td>
             <td><input type="text" name="inpatient_num"></td>
         </tr>


      </table>    
      <input type="submit" value="확인"> 
  </form>
  
  </body>
  </html>