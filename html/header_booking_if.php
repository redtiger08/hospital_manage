<header>
	
			<div class="head-left">
				<img class="head-logo" src="logo.png">
			</div>    
			
			<div class="head-right">
			
				<div class="head-right-top">
					
					<a class="top-menu" href="login_main.php">Sign In/OUT</a>
					<a class="top-menu" href="map.php">Coming Map</a>
					<a class="top-menu" href="#" onclick="window.open('member_join_form.php', 'popup', 'width=500, height=200')">아이디 생성</a>
				</div>            
				
				<div class="head-right-bottom">

						<a class="main-menu" onclick="window.open('booking_form.php', 'popup', 'width=1000, height=500')">예약환자 입력</a>
						<a class="main-menu" href="booking_show_if.php">예약환자 열람</a>
						<a class="main-menu" onclick="location.href='index.php'">홈으로 가기</a>
						
						<a class="main-menu" href="#"><?=$_SESSION["userName"]?>님 로그인</a>
          
				</div>            
			</div>    
	
		</header>