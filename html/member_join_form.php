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
 <div  class ="list"> 회원가입 </div>
 <form action="member_join.php" method="post">
     <table>
         <tr>
             <td>아이디</td>
             <td><input type="text" name="doctor_id"></td>
         </tr>
         <tr>
             <td>비밀번호</td>
             <td><input type="password" name="doctor_pw"></td>
         </tr>
         <tr>
              <td>성명</td>
              <td><input type="text" name="doctor_name"></td>
         </tr>
		 <tr>
              <td>주민등록번호</td>
              <td><input type="text" name="doctor_rrn"></td>  <!-- rrn은 주민등록번호 약자 -->
         </tr>
      </table>    
      <input type="submit" value="확인"> 
  </form>
  
  </body>
  </html>