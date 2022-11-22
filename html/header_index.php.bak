<style>
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
   <header>
   
        <div class="head-left">
            <img class="head-logo" src="logo.png">
        </div>    
        
        <div class="head-right">
        
            <div class="head-right-top">
				<a class="top-menu" href="index.php"> 홈으로 가기 </a>
                <a class="top-menu" href="login_main.php">Sign In/OUT</a>
                <a class="top-menu" href="map.php">Coming Map</a>
                <a class="top-menu" href="#" onclick="window.open('member_join_form.php', 'popup', 'width=500, height=200')">아이디 생성</a>
            </div>            
            
            <div class="head-right-bottom">
<?php 
				if(empty($_SESSION["userId"])){
?>		
                    <a class="main-menu" href="not_login.php">환자정보 등록</a>
                    <a class="main-menu" href="not_login.php">환자 정보 열람</a>
                    <a class="main-menu" href="not_login.php">환자 예약 관리</a>
					<a class="main-menu" href="not_login.php">환자 예약 열람</a>
                    <a class="main-menu" href="not_login.php">입원절차 등록</a>
                    <a class="main-menu" href="not_login.php">입원 환자 확인</a>
					<a class="main-menu" href="not_login.php">입원절차 등록</a>
                    <a class="main-menu" href="not_login.php">입원 환자 확인</a>
<?php 
    			} else {
?>	
					<a class="main-menu" onclick="window.open('patient_enroll_form.php', 'popup', 'width=1000, height=500')">환자정보 등록</a>
                    <a class="main-menu" href="show_patient_if.php">환자 정보 열람</a>
                    <a class="main-menu" onclick="window.open('booking_form.php', 'popup', 'width=1000, height=500')">환자 예약 관리</a>
					<a class="main-menu" href="booking_show_if.php">환자 예약 열람</a>
                    <a class="main-menu" onclick="window.open('inpatient_form.php', 'popup', 'width=1000, height=500')">입원절차 등록</a>
                    <a class="main-menu" href="show_inpatient_if.php">입원 환자 확인</a></li>
					<a class="main-menu" onclick="window.open('room_setting_form.php', 'popup', 'width=1000, height=500')">입원실 등록</a>
                    <a class="main-menu" href="room_if.php">입원실 확인</a></li>
<?php        
				}
?>
<?php
				if (empty($_SESSION["userId"])) {
?>
                    <a class="main-menu" href="#">로그인</a>
<?php
				} else {
?>
			
				    <a class="main-menu" href="#"><?=$_SESSION["userName"]?>님 로그인</a>
<?php        
				}
?>            
            </div>            
        </div>    

	</header>

  

