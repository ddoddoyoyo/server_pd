<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");
	header("Content-Type: text/html; charset=UTF-8");
	
	

	if($_SESSION["HY_LMS_SEQ"] > 0 ){
		//$tools->JavaGo("/genesis/part1/en/main.php");
	}else{
		$tools->JavaGo("/pd/en/");
	}
	
	
	$LMS_IMAGE = "";
	if($_SESSION["HY_LMS_SEQ"]){

		$sql = "SELECT LMS_IMAGE FROM LMS_MEMBER WHERE LMS_SEQ = :LMS_SEQ";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(':LMS_SEQ',$_SESSION["HY_LMS_SEQ"]);
		$stmt->execute();
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

		
		if($row[0]['LMS_IMAGE']){
			$LMS_IMAGE = "/upload/hyundai/member/".$row[0]['LMS_IMAGE'];
		} else {
			$LMS_IMAGE = "";
		}
	} 

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui">
		<meta name="apple-touch-fullscreen" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
		<link rel="stylesheet" href="../css/styles.css">
		<link rel="stylesheet" href="../css/jquery-ui.css">
		<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script>
		  //주소창 없애기
			 $(document).on("mobileinit", function () {
				 $.mobile.hashListeningEnabled = false;
				 $.mobile.pushStateEnabled = false;
				 $.mobile.changePage.defaults.changeHash = false;
			});
		</script>
		<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<script src="../js/jquery-ui.js"></script>
		<script src="../js/jquery.ui.touch-punch.min.js"></script>
		<script src="../js/jquery.incremental-counter.js"></script>
		<script src="../js/jquery.animateNumber.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
		<script src="../js/device.js"></script>
		<script src="../js/day2.js"></script>		
		<script src="../js/menu.js"></script>
		<script src="/pd/common/js/common.js"></script>
		<script>

		// window.onload = function(){
		// 	setTimeout(function(){
		// 		var t = performance.timing;
		// 		var s =  (t.loadEventEnd - t.navigationStart);
		// 		//console.log(s - 2000);
		// 		$('.loding_bar .londing2').animate({"width":"100%"}, s);
		// 		setTimeout(function(){
		// 			$.mobile.changePage("#page2");
		// 		}, s-1);
		// 	},0);
		// }

		$(document).ready(function(){
				// enter key 금지
				//console.log($("#current-img").height() );
				//console.log($("#current-img").width() );

				$.mobile.hashListeningEnabled = false;
				$.mobile.pushStateEnabled = false;
				$.mobile.changePage.defaults.changeHash = false;

				// $(document).on('keypress', function(e) {
				// 	if (e.which == 13) {
				// 		return false;
				// 	}
				// });
				// function readURL(input) {
				// 	if (input.files && input.files[0]) {
				// 		var reader = new FileReader(); //파일을 읽기 위한 FileReader객체 생성
				// 		reader.onload = function (e) {
				// 		//파일 읽어들이기를 성공했을때 호출되는 이벤트 핸들러
				// 			$("#current-img").attr("src", e.target.result);
				// 			if($("#current-img").height() >= $("#current-img").width()){
				// 				$("#current-img").css({"width":"100%","height":"auto"});
				// 			} else {
				// 				$("#current-img").css({"width":"auto", "height":"100%"});
				// 			}
				// 		}                   
				// 		reader.readAsDataURL(input.files[0]);
				// 	}
				// }

				// $("#upload").change(function(){
				// 	readURL(this);
				// });
			});
				
		</script>
	</head>
	<body>
		<div id="wrap">
			<div id="contBox" class="container">
<!--day2-->
	<section data-role="page" id="page56" class="container">
		<div data-role="main" class="ui-content">
			<div class="imgwrap">
				<img src="../images/day2/01_photo.jpg" alt="car">
			</div>
			<div class="textwrap">
				<div class="text">	
					<div id="textbox1" class="textbox">
						<h1>Day1.</h1>
						<div class="img_wrap">
							<img src="../images/button/08_point.png" alt="location point">
							<img src="../images/button/08_lodeline.png" alt="location">
							<p class="p1">Stelvio Pass</p>
							<p class="p2">Zurich</p>
						</div>
						<ul>
							<li>Body Rigidity</li>
							<li>Turbo Engine + DCT</li>
							<li>Connectivity</li>
							<li>Space(Trunk)</li>
						</ul>
					</div>
				</div>
			</div>
			<a href="#page57" id="go_page57" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
	</section>

	<section data-role="page" id="page57" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div class="page_bg">
			 <img src="../images/day2/03_stelviopass_map_3.jpg" alt="james"> <
			<!-- <img src="../images/day2/map_2.jpg" alt="" id="map2">
			<img src="../images/day2/map_3.jpg" alt="" id="map3">
			<img src="../images/day2/map_4.jpg" alt="" id="map4">
			<img src="../images/day2/map_5.jpg" alt="" id="map5">
			<img src="../images/day2/map_6.jpg" alt="" id="map6"> -->

		</div>
		<a href="#page58" class="next_finger">
			<img src="../images/button/touchfinger_@3x.png" alt="next button">
		</a>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>From now on, we will be moving to the Stelvio Pass where I think the highlight place of this trip.</p>
					</div>
				</div>
				<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
			</div>
			<div class="imgwrap">
				<img src="../images/person/james_2.png" alt="james">
			</div>
		</div>
		<audio class="audio1" src="../tts/day2/03.mp3"></audio>
	</section>

	<section data-role="page" id="page58" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>Stlelvio Pass is like a dream place for winding enthusiasts.</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>And a lot of famous models from various car brands comes here for performance tests.</p>
					</div>
					<div class="btn_box">
						<a href="#" id="go_next1" class="text_btn_l">
							<img src="../images/button/btn_next_talk_arrow_2.png" alt="next button">
						</a>
						<a href="#" id="go_back" class="text_btn_r">
							<img src="../images/button/btn_next_talk_arrow_1.png" alt="next button">
						</a>
					</div>
				</div>
				<a href="#page59" id="go_page59" class="next_p_btn ui-btn go-next" >
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
			</div>
		</div>
		<audio class="audio1" src="../tts/day2/04.mp3"></audio>
		<audio class="audio2" src="../tts/day2/05.mp3"></audio>
	</section>

	<section data-role="page" id="page59" class="container">
	<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div class="page_bg" id="bg1"></div>
		<!-- <div class="page_bg" id="bg2"></div> -->
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text_img2">
					<img src="../images/person/day2_james.png" alt="james">
				</div>	
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>Here we can still see some snow yet. But weather is just so fine for driving!</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>Here we are at Stelvio Pass.<br>Shall I accelerate from now?</p>
					</div>
					<div class="btn_box">
						<a href="#" id="go_next1" class="text_btn_l" >
							<img src="../images/button/btn_next_talk_arrow_2.png" alt="next button">
						</a>
						<a href="#" id="go_back" class="text_btn_r" >
							<img src="../images/button/btn_next_talk_arrow_1.png" alt="next button">
						</a>
					</div>
				</div>
			</div>
			<a href="#page60" id="go_page60" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<audio class="audio1" src="../tts/day2/06.mp3"></audio>
		<audio class="audio2" src="../tts/day2/07.mp3"></audio>
	</section>

	<section data-role="page" id="page60" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>The spec of my car is 1.6 Turbo-GDI.<br>Did you know that this one has higher horsepower than Golf 1.8?</p>
					</div>
				</div>
				<a href="#page61" id="go_page61" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
			</div>
		</div>
		<audio class="audio1" src="../tts/day2/08.mp3"></audio>
	</section>

	<section data-role="page" id="page61" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<a href="#" class="next_finger">
			<img src="../images/button/touchfinger_@3x.png" alt="next button">
		</a>
		<div data-role="main" class="ui-content">
			<div class="imgwrap">
					<div class="imgL">
						<p>i30<br><span>GAMMA 1.6 T-GDI</p>
						<div class="engine"></div>
					</div>
					<div class="imgR">
						<p>Golf<br><span>1.8 Turbo</p>
						<div class="engine"></div>
					</div>
			</div>
			<div class="graphwrap">
				<div class="graphL">
					<ul>
						<li class="graph1">
							<div class="g_num"><span>27.0</span><br>kg.m</div>
						</li>
						<li class="graph2">
							<div class="g_num"><span>204</span><br>PS</div>
						</li>
					</ul>
				</div>
				<div class="graphR">
					<ul>
						<li class="graph1">
							<div class="g_num"><span>25.4</span><br>kg.m</div>
						</li>
						<li class="graph2">
							<div class="g_num"><span>170</span><br>PS</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="popLayer">
				<div class="imgwrap">
					<?php if($LMS_IMAGE) { ?> 
						<img src="<?=$LMS_IMAGE?>" alt="james">
					<?php } else { ?>
						<img src="../images/intro/login_profile_@3x.png" alt="james">
					<?php } ?>
				</div>	
				<div class="textwrap">
					<div class="text_tip">
						<img src="../images/button/tail_3_@3x.png" alt="text box">
					</div>
					<div class="text">
						<div id="textbox1" class="textbox">
							<p>i30's GAMMA 1.6 T-GDI engine shows higher horsepower and torque compare to Golf 1.8T. But unfortunately, most of people didn't recognized this.</p>
						</div>	
					</div>
				</div>	
			</div>
		<a href="#page63" id="go_page63" class="next_p_btn ui-btn go-next">
			<img src="../images/button/btn_next_02_@3x.png" alt="next button">
		</a>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/09.mp3"></audio> -->
	</section>

	<!--<section data-role="page" id="page62" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div class="page_bg">
							<img src="../images/day1/17_photo.jpg" alt="car frame">
						</div>
		<div data-role="main" class="ui-content">
			<div class="imgwrap">
				<img src="../images/intro/login_profile_@3x.png"" alt="man">
			</div>
			<div class="textwrap">
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<div class="text">	
					<p>i30's GAMMA 1.6 T-GDI engine shows higher horsepower and torque compare to Golf 1.8T.<br>But unfortunately, most of people didn't recognized this.</p>
				</div>
			</div>
			<a href="#page63" id="go_page63" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
	</section>-->

	<section data-role="page" id="page63" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>Transmission is 7 speed DCT.<br>Can you believe it?<br>A strong engine with quick shift.</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>There is no power loss on shifting, because i30 contains dual-clutch transmission. It will show a true value on winding driving for sure.</p>
					</div>
					<div class="btn_box">
						<a href="#" id="go_next1" class="text_btn_l">
							<img src="../images/button/btn_next_talk_arrow_2.png" alt="next button">
						</a>
						<a href="#" id="go_back" class="text_btn_r">
							<img src="../images/button/btn_next_talk_arrow_1.png" alt="next button">
						</a>
					</div>
				</div>
				
				<a href="#page63001" id="go_page63001" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
			</div>
		</div>
		<audio class="audio1" src="../tts/day2/10.mp3"></audio>
		<audio class="audio2" src="../tts/day2/11.mp3"></audio>
	</section>

	<section data-role="page" id="page63001" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		
		<div data-role="main" class="ui-content">
			<div class="imgwrap">
				
				<?php if($LMS_IMAGE) { ?> 
					<img src="<?=$LMS_IMAGE?>" alt="james">
				<?php } else { ?>
					<img src="../images/intro/login_profile_@3x.png"" alt="man">
				<?php } ?>
			</div>
			<div class="textwrap">
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<div class="text">	
					<p>Let's learn about DCT! Click on the video!</p>
				</div>
			</div>
			<div class="btn_play">
				<img src="../images/button/btn_videoplay.png" alt="">
			</div>
			<div class="popLayer" id="pop01">
				<video width="320" height="240" controls>
				  <source src="http://of01-qb5150.ktics.co.kr/7Speed_Double_Clutch_Transmission_1.mp4" type="video/mp4">
					Your browser does not support HTML5 video.
				</video>	
				<!-- <iframe src="https://www.youtube.com/embed/HMUwBaKxOj8" frameborder="0" allowfullscreen></iframe> -->
			</div>
			<div class="popLayer" id="pop02">
				<div class="imgwrap">
					<?php if($LMS_IMAGE) { ?> 
						<img src="<?=$LMS_IMAGE?>" alt="james">
					<?php } else { ?>
						<img src="../images/intro/login_profile_@3x.png" alt="james">
					<?php } ?>
				</div>	
				<div class="textwrap">
					<div class="text_tip">
						<img src="../images/button/tail_3_@3x.png" alt="text box">
					</div>
					<div class="text">
						<div id="textbox1" class="textbox">
							<p>Dual-clutch accelerator deceleration delivers maximum power to a fast-shifting engine at winding road.</p>
						</div>	
					</div>
				</div>	
			</div>
			<a href="#page64" id="go_page64" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/12.mp3"></audio>
		<audio class="audio2" src="../tts/day2/13.mp3"></audio> -->
	</section>

	<section data-role="page" id="page64" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text_img2">
					<img src="../images/person/day2_james.png" alt="james">
				</div>	
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>We are escaping hairpin section, a grip force from rear suspension is core thing. see! there is no slip on tolerable speed.</p>
					</div>
				</div>
			</div>
			<a href="#page65" id="go_page65" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<audio class="audio1" src="../tts/day2/14.mp3"></audio>
	</section>

	<section data-role="page" id="page65" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div data-role="main" class="ui-content">
			<div class="toggle">
				<div class="imgwrap">
					<?php if($LMS_IMAGE) { ?> 
						<img src="<?=$LMS_IMAGE?>" alt="james">
					<?php } else { ?>
						<img src="../images/intro/login_profile_@3x.png" alt="james">
					<?php } ?>
				</div>
				<div class="start_text">
					<img src="../images/button/btn_talk_more_gif.gif" alt="">
				</div>
				<div class="close_text">
					<img src="../images/button/btn_close.png" alt="">
				</div>
			</div>

			<div class="textwrap">
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<div class="text">
					<div id="textbox1" class="textbox">
						<p>Did you know that multilink system is usually used on sportcars to increase the road grip force?<br>i30 also uses multilink system with holding 5 links so it can react to any type of roads to keep stable grip force.</p>
					</div>	
					<div id="textbox2" class="textbox">
						<p>Especially when we are driving on winding roads, you will see the true value of multilink suspension system.</p>
					</div>
					<div class="btn_box">
						<a href="#" id="go_next1" class="text_btn_l">
							<img src="../images/button/btn_next_talk_arrow_2.png" alt="next button">
						</a>
						<a href="#" id="go_back" class="text_btn_r">
							<img src="../images/button/btn_next_talk_arrow_1.png" alt="next button">
						</a>
					</div>
				</div>
			</div>
			<a href="#page66" id="go_page66" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/15.mp3"></audio>
		<audio class="audio2" src="../tts/day2/16.mp3"></audio> -->
	</section>

	<section data-role="page" id="page66" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div data-role="main" class="ui-content">
			<!-- <div class="pointbtn">
				<img src="../images/button/16_btn.png" alt="">
			</div> -->
			<div class="textwrap">
				<div class="text_i">
					<div id="textbox1" class="textbox">
						<p>Apply structural adhesive! </p>
					</div>	
				</div>
			</div>
			<div class="img_ex">
				<span>112m</span>
			</div>
			<div class="popLayer">
				<div class="imgwrap">
					<?php if($LMS_IMAGE) { ?> 
						<img src="<?=$LMS_IMAGE?>" alt="james">
					<?php } else { ?>
						<img src="../images/intro/login_profile_@3x.png" alt="james">
					<?php } ?>
				</div>	
				<div class="textwrap">
					<div class="text_tip">
						<img src="../images/button/tail_3_@3x.png" alt="text box">
					</div>
					<div class="text">
						<div id="textbox1" class="textbox">
							<p>The chassis of i30 used Structural adhesivesto improve the body rigidity and durability. Structural adhesives is used 112M.</p>
						</div>	
					</div>
				</div>	
			</div>
			<a href="#" class="next_finger ui-link"><img src="../images/button/touchfinger_@3x.png" alt="next button"></a>
			<a href="#page68" id="go_page68" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/17.mp3"></audio>
		<audio class="audio2" src="../tts/day2/18.mp3"></audio> -->
	</section>

	<!-- <section data-role="page" id="page67" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div class="page_bg">
							<img src="../images/day1/17_photo.jpg" alt="car frame">
						</div>
		<div data-role="main" class="ui-content">
			<div class="imgwrap">
				<img src="../images/intro/login_profile_@3x.png"" alt="man">
			</div>
			<div class="textwrap">
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<div class="text">	
					<p>Except AHSS, the one we talked yesterday, the chassis of i30 used high strength metal adhesive to improve the body rigidity and durability.<br>If I'm not wrong, metal adhesive is used 112M.</p>
				</div>
			</div>
			<a href="#page68" id="go_page68" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
	</section> -->

	<section data-role="page" id="page68" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>Wow! That's why I feel so connected with the car when I'm on high speed in continuous corners.<br>Such a thrill, I'm loving it!!</p>
					</div>
				</div>
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<a href="#page69" id="go_page69" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
			</div>
		</div>
		<audio class="audio1" src="../tts/day2/19.mp3"></audio>
	</section>

	<section data-role="page" id="page69" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div class="page_bg"></div>
		<a href="#" class="next_finger">
			<img src="../images/button/touchfinger_@3x.png" alt="next button">
		</a>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>Let's take a rest here.</p>
					</div>
				</div>
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
			</div>
			<div class="view_text">	
				<a href="#page70"><p>Passo Della Stelvio</p></a>
				<a href="#page70" id="go_page70" class="next_p_btn ui-btn go-next">
					<img src="../images/button/btn_next_02_@3x.png" alt="next button">
				</a>
			</div>
		</div>
		<audio class="audio1" src="../tts/day2/20.mp3"></audio>
	</section>

	<section data-role="page" id="page70" class="container">
	<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div class="page_bg"></div>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text_img2">
					<img src="../images/person/day2_james.png" alt="james">
				</div>	
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>Stelvio Pass is famous for its tremendous views of Alps range becomes a beautiful scene</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>These are the roads we just have passed pretty dizzy right?<br>How many hairpins did we passed?<br>It was such a fun.</p>
					</div>
					<div id="textbox3" class="textbox">
						<p>Powerful engine, 7 DCT, Strong body rigidity, Multilink rear-suspension. These combination makes i30 such a fun car!</p>
					</div>
					<!-- <div id="textbox4" class="textbox">
						<p>These combination makes i30 such a fun car!</p>
					</div> -->
					<div class="btn_box">
						<a href="#" id="go_next1" class="text_btn_l">
							<img src="../images/button/btn_next_talk_arrow_2.png" alt="next button">
						</a>
						<a href="#" id="go_back" class="text_btn_r">
							<img src="../images/button/btn_next_talk_arrow_1.png" alt="next button">
						</a>
					</div>
				</div>
			</div>
			<a href="#page71" id="go_page71" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<audio class="audio1" src="../tts/day2/21.mp3"></audio>
		<audio class="audio2" src="../tts/day2/22.mp3"></audio>
		<audio class="audio3" src="../tts/day2/23.mp3"></audio>
	</section>

	<section data-role="page" id="page71" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>How was it?<br>Wasn't it scared though?<br>I hope you enjoyed in this magnificent winding courses.<br>Because I fully enjoyed.</p>
					</div>
				</div>
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<a href="#page72" id="go_page72" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
			</div>
		</div>
		<audio class="audio1" src="../tts/day2/24.mp3"></audio>
	</section>

	<section data-role="page" id="page72" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		<!-- <h1 class="subject">BRAND</h1> -->
		</div>
		<div data-role="main" class="ui-content">	
		<div class="main_wrap">
			<div class="textwrap">	
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>Hurry up, let's get down.<br>We will be moving to the one of greatest camping spot in Europe.</p>
					</div>
				</div>
				<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
			</div>
			<div class="imgwrap">
				<img src="../images/person/james_11.png" alt="james">
			</div>
			<a href="#page73" id="go_page73" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
			</div>
		</div>
		<audio class="audio1" src="../tts/day2/25.mp3"></audio>
	</section>

	<section data-role="page" id="page73" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div class="page_bg">
			<img src="../images/day2/26_Zurich_map_2.jpg" alt="">
		</div>
		<a href="#page74" class="next_finger">
			<img src="../images/button/touchfinger_@3x.png" alt="next button">
		</a>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>We will be going to the place called Fischers Fritz in Zurich, Switzerland.<br>Click on the Zurich.</p>
					</div>
					<!-- <div id="textbox2" class="textbox">
						<p>In Switzerland, we will be stop at Zurich and Bern to get to final spot Strasbourg.</p>
					</div> -->
				</div>
				<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
			</div>
			<div class="imgwrap">
				<img src="../images/person/james_7.png" alt="james">
			</div>
		</div>
		<audio class="audio1" src="../tts/day2/26.mp3"></audio>
	</section>

	<section data-role="page" id="page74" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>As you know, Zurich is the biggest city in Switzerland.<br>There is beautiful Zurich lake right next to and Limit river.</p>
					</div>
				</div>
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<a href="#page75" id="go_page75" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
			</div>
		</div>
		<audio class="audio1" src="../tts/day2/27.mp3"></audio>
	</section>

	<section data-role="page" id="page75" class="container">
	<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div class="page_bg"></div>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text_img2">
					<img src="../images/person/day2_james.png" alt="james">
				</div>	
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<div class="text">		
					<div id="textbox1" class="textbox">
						<p>Before we take a look a downtown, We gotta unpack first so let's drive straight to the camping spot.</p>
					</div>
				</div>
			</div>
			<a href="#page76" id="go_page76" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<audio class="audio1" src="../tts/day2/28.mp3"></audio>
	</section>

	<section data-role="page" id="page76" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div class="page_bg"></div>
		<a href="#" class="next_finger">
			<img src="../images/button/touchfinger_@3x.png" alt="next button">
		</a>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>Now we're at Fischers fritz.</p>
					</div>
				</div>
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
			</div>
			<div class="view_text">	
				<a href="#page77"><p>Fischers Fritz </p></a>
				<a href="#page77" id="go_page77" class="next_p_btn ui-btn go-next">
					<img src="../images/button/btn_next_02_@3x.png" alt="next button">
				</a>
			</div>
		</div>
		<audio class="audio1" src="../tts/day2/29.mp3"></audio>
	</section>

	<section data-role="page" id="page77" class="container">
	<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div class="page_bg"></div>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text_img2">
					<img src="../images/person/day2_james.png" alt="james">
				</div>	
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>It's the one of most famous camping spot in Europe. So a lot of camping lovers visit here.</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>I've always wanted to camp here for a long time also. So we'll be unpacking here.</p>
					</div>
					<!-- <div id="textbox3" class="textbox">
						<p>Facility is good, and riverside is so cozy and beautiful.</p>
					</div>
					<div id="textbox4" class="textbox">
						<p>So we'll be unpacking here.</p>
					</div> -->
					<div class="btn_box">
						<a href="#" id="go_next1" class="text_btn_l">
							<img src="../images/button/btn_next_talk_arrow_2.png" alt="next button">
						</a>
						<a href="#" id="go_back" class="text_btn_r">
							<img src="../images/button/btn_next_talk_arrow_1.png" alt="next button">
						</a>
					</div>
				</div>
			</div>
			<a href="#page78" id="go_page78" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<audio class="audio1" src="../tts/day2/30.mp3"></audio>
		<audio class="audio2" src="../tts/day2/31.mp3"></audio>
	</section>

	<section data-role="page" id="page78" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		<!-- <h1 class="subject">BRAND</h1> -->
		</div>
		<div data-role="main" class="ui-content">	
		<div class="main_wrap">
			<div class="textwrap">	
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>i30 is really spacious car.<br>As you can see the trunk, its so roomy.<br>We could load all of our luggage for this trip.</p>
					</div>
				</div>
				<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
			</div>
			<div class="imgwrap">
				<img src="../images/person/james_11.png" alt="james">
			</div>
			<a href="#page79" id="go_page79" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
			</div>
		</div>
		<audio class="audio1" src="../tts/day2/32.mp3"></audio>
	</section>

	<section data-role="page" id="page79" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text_i">
					<div id="textbox1" class="textbox">
						<p>What is the maximum load capacity of trunk?</p>
					</div>	
				</div>
			</div>
			<div class="numCounter">	
				<span id="n1" class="nCount">0</span>
				<span id="n2" class="nCount">0</span>
				<span id="n3" class="nCount">0</span>
				<span id ="liter"><img src="../images/day2/liter.png" alt=""></span>
			</div>
			<div class="popLayer">
				<div class="imgwrap">
				<?php if($LMS_IMAGE) { ?> 
					<img src="<?=$LMS_IMAGE?>" alt="james">
				<?php } else { ?>
					<img src="../images/intro/login_profile_@3x.png" alt="james">
				<?php } ?>
				</div>	
				<div class="textwrap">
					<div class="text_tip">
						<img src="../images/button/tail_3_@3x.png" alt="text box">
					</div>
					<div class="text">
						<div id="textbox1" class="textbox">
							<p>Brand new i30 increased the luggage capacity until 395L, so it boasts very spacious trunk.</p>
						</div>	
					</div>
				</div>	
			</div>
			<a href="#" class="next_finger ui-link"><img src="../images/button/touchfinger_@3x.png" alt="next button"></a>
			<a href="#page81" id="go_page81" class="next_p_btn ui-btn go-next">
				 <img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a> 
		</div>
		<!-- <audio class="audio1" src="../tts/day2/33.mp3"></audio>
		<audio class="audio2" src="../tts/day2/34.mp3"></audio> -->
	</section>

	<!--<section data-role="page" id="page80" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div class="page_bg">
							<img src="../images/day1/17_photo.jpg" alt="car frame">
						</div>
		<div data-role="main" class="ui-content">
			<div class="imgwrap">
				<img src="../images/intro/login_profile_@3x.png"" alt="man">
			</div>
			<div class="textwrap">
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<div class="text">	
					<p>Brand new i30 increased the luggage capacity until 395L, so it boasts very spacious trunk.</p>
				</div>
			</div>
			<a href="#page81" id="go_page81" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
	</section>-->

	<section data-role="page" id="page81" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		<!-- <h1 class="subject">BRAND</h1> -->
		</div>
		<div data-role="main" class="ui-content">
			<div class="main_wrap">
				<div class="textwrap">	
					<div class="text">	
						<div id="textbox1" class="textbox">
							<p>Wow, it can load really a lot of baggage.</p>
						</div>
					</div>
					<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box">
					</div>
				</div>
				<div class="imgwrap">
					<img src="../images/person/james_12.png" alt="james">
				</div>
				<a href="#page82" id="go_page82" class="next_p_btn ui-btn go-next">
					<img src="../images/button/btn_next_02_@3x.png" alt="next button">
				</a>
			</div>
		</div>
		<audio class="audio1" src="../tts/day2/35.mp3"></audio>
	</section>

	<section data-role="page" id="page82" class="container">
	<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text_img2">
					<img src="../images/person/day2_james.png" alt="james">
				</div>	
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>So let's pitch a tent.<br>While I'm pitching, why don't you turn the music on.</p>
					</div>
				</div>
			</div>
			<a href="#page83" id="go_page83" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<audio class="audio1" src="../tts/day2/36.mp3"></audio>
	</section>

	<section data-role="page" id="page83" class="container">
	<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text_img2">
					<img src="../images/person/day2_james.png" alt="james">
				</div>	
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<div class="text">		
					<div id="textbox1" class="textbox">
						<p>Wait a sec, I need a phone to link first. Where is my phone?</p>
					</div>
				</div>
			</div>
			<a href="#page84" id="go_page84" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<audio class="audio1" src="../tts/day2/37.mp3"></audio>
	</section>

	<section data-role="page" id="page84" class="container">
	<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div data-role="main" class="ui-content">
			<div class="imgwrap">
				<div class="text_i">		
						<p>What is your smartphone type?</p>
				</div>
				<div class="device_wrap">
					<a href="#page85" class="deviceL"><div ><img src="../images/day2/42_btn_left.png" alt=""></div></a>
					<a href="#page87" class="deviceR"><div>
					<img src="../images/day2/42_btn_right.png" alt=""></div></a>
				</div>
			</div>
		</div>
		<audio class="audio1" src="../tts/day2/38.mp3"></audio>
	</section>

	<section data-role="page" id="page85" class="container">
	<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<a href="#" class="next_finger">
			<img src="../images/button/touchfinger_@3x.png" alt="next button">
		</a>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text_i">
					<div id="textbox1" class="textbox">	
						<p>Pairing completed.</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>PLAY MUSIC</p>
					</div>
				</div>
			</div>
			<a href="#page86" id="go_page86" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
	</section>

	<section data-role="page" id="page86" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div class="page_bg"></div>
		<div data-role="main" class="ui-content">
			<div class="imgwrap">
				<?php if($LMS_IMAGE) { ?> 
					<img src="<?=$LMS_IMAGE?>" alt="man">
				<?php } else { ?>
					<img src="../images/intro/login_profile_@3x.png" alt="man">
				<?php } ?>
			</div>
			<div class="textwrap">
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<div class="text">	
					<p>i30 offers mutual internet, mobile service, remote control, voice assistance for navigation and phone call via Android Auto.<br>It's possible to use most of smart features.</p>
				</div>
			</div>
			<a href="#page89" id="go_page89" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/39.mp3"></audio> -->
	</section>

	<section data-role="page" id="page87" class="container">
	<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<a href="#" class="next_finger">
			<img src="../images/button/touchfinger_@3x.png" alt="next button">
		</a>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text_i">
					<div id="textbox1" class="textbox">	
						<p>Pairing completed.</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>PLAY MUSIC</p>
					</div>
				</div>
			</div>
			<a href="#page88" id="go_page88" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
	</section>

	<section data-role="page" id="page88" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div class="page_bg"></div>
		<div data-role="main" class="ui-content">
			<div class="imgwrap">
				<?php if($LMS_IMAGE) { ?> 
					<img src="<?=$LMS_IMAGE?>" alt="man">
				<?php } else { ?>
					<img src="../images/intro/login_profile_@3x.png" alt="man">
				<?php } ?>
			</div>
			<div class="textwrap">
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<div class="text">	
					<p>i30 supports Apple car play so that able to use navigation, phone call and music with simple pairing.</p>
				</div>
			</div>
			<a href="#page89" id="go_page89" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/39.mp3"></audio> -->
	</section>

	<section data-role="page" id="page89" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>We gotta volume up for pitching tent.</p>
					</div>
				</div>
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<a href="#page90" id="go_page90" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
			</div>
		</div>
		<audio class="audio1" src="../tts/day2/40.mp3"></audio>
	</section>

	<section data-role="page" id="page90" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div data-role="main" class="ui-content">
			<div class="main_wrap">
				<div class="textwrap">	
					<div class="text">	
						<div id="textbox1" class="textbox">
							<p>You have a serious good taste on music.<br>Come on we gotta get done before sunset.</p>
						</div>
					</div>
					<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box">
					</div>
				</div>
				<div class="imgwrap">
					<img src="../images/person/james_13.png" alt="james">
				</div>
				<a href="#page91" id="go_page91" class="next_p_btn ui-btn go-next">
					<img src="../images/button/btn_next_02_@3x.png" alt="next button">
				</a>
			</div>
		</div>
		<audio class="audio1" src="../tts/day2/41.mp3"></audio>
	</section>

	<section data-role="page" id="page91" class="container">
	<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div class="page_bg"></div>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text_img2">
					<img src="../images/person/day2_james.png" alt="james">
				</div>	
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>Oh, right! my battery is almost dead. Can you charge it for me?</p>
					</div>
				</div>
			</div>
			<a href="#page92" id="go_page92" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<audio class="audio1" src="../tts/day2/42.mp3"></audio>
	</section>

	<section data-role="page" id="page92" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div class="page_bg">
			<img src="../images/day2/52_block.png">
		</div>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text_i">
					<div id="textbox1" class="textbox">	
						<p>Please put your phone on the wireless charger.</p>
					</div>
				</div>
			</div>
			<a href="#page93" class="next_finger">
			<img src="../images/button/touchfinger_@3x.png" alt="next button">
		</a>
			<!-- <div class="imgwrap">
					<a href="#">
						<div class="imgL">
							<img src="../images/day2/52_btn_left.png" alt="">
						</div>
					</a>
					<a href="#page93">
						<div class="imgR">
							<img src="../images/day2/52_btn_right.png" alt="">
						</div>
					</a>
			</div> -->
		</div>
		<audio class="audio1" src="../tts/day2/43.mp3"></audio>
	</section>

	<section data-role="page" id="page93" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div class="page_bg">
			<img src="../images/day2/53_image_02.jpg" alt="">
		</div>
		<div data-role="main" class="ui-content">
			<div class="toggle">
				<div class="imgwrap">
					<?php if($LMS_IMAGE) { ?> 
						<img src="<?=$LMS_IMAGE?>" alt="james">
					<?php } else { ?>
						<img src="../images/intro/login_profile_@3x.png" alt="james">
					<?php } ?>
				</div>
				<div class="start_text">
					<img src="../images/button/btn_talk_more_gif.gif" alt="">
				</div>
				<div class="close_text">
					<img src="../images/button/btn_close.png" alt="">
				</div>
			</div>

			<div class="textwrap">
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<div class="text">
					<div id="textbox1" class="textbox">
						<p>You can charge your phone conveniently via wireless charging.<br>When charging is completed, the charging completion lamp changes to green color!</p>
					</div>
				</div>
			</div>
			<a href="#page94" id="go_page94" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/44.mp3"></audio> -->
	</section>

	<section data-role="page" id="page94" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div data-role="main" class="ui-content">
			<div class="main_wrap">
				<div class="textwrap">	
					<div class="text">	
						<div id="textbox1" class="textbox">
							<p>It’s already dark now. Isn’t it great watching lake while camping?</p>
						</div>
					</div>
					<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box">
					</div>
				</div>
				<div class="imgwrap">
					<img src="../images/person/james_7.png" alt="james">
				</div>
				<a href="#page95" id="go_page95" class="next_p_btn ui-btn go-next">
					<img src="../images/button/btn_next_02_@3x.png" alt="next button">
				</a>
			</div>
		</div>
		<audio class="audio1" src="../tts/day2/45.mp3"></audio>
	</section>

	<section data-role="page" id="page95" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>Alright, such a moody night.<br>Let me play a song.</p>
					</div>
				</div>
			</div>
			<a href="#page96" id="go_page96" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<audio class="audio1" src="../tts/day2/46.mp3"></audio>
	</section>

	<section data-role="page" id="page96" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>It's been a really long time doing camping right?<br>Let's take a sleep for now and take a look zurich tomorrow?</p>
					</div>
				</div>
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
			</div>
			<a href="#page97" id="go_page97" class="next_p_btn ui-btn go-next">
					<img src="../images/button/btn_next_02_@3x.png" alt="next button">
				</a>
		</div>
		<audio class="audio1" src="../tts/day2/47.mp3"></audio>
	</section>

	<section data-role="page" id="page97" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>	
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>Did you sleep well?<br>Let's pack up and move on.</p>
					</div>
				</div>
				<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
			</div>
			<div class="imgwrap">
				<img src="../images/person/james_17.png" alt="james">
			</div>
			<a href="#page98" id="go_page98" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<audio class="audio1" src="../tts/day2/48.mp3"></audio>
	</section>

	<section data-role="page" id="page98" class="container">
	<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div class="page_bg"></div>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text_img2">
					<img src="../images/person/day3_james.png" alt="james">
				</div>	
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>Here we go, shall we load again?</p>
					</div>
				</div>
			</div>
			<a href="#page99" id="go_page99" class="next_p_btn ui-btn go-next">
					<img src="../images/button/btn_next_02_@3x.png" alt="next button">
				</a>
		</div>
		<audio class="audio1" src="../tts/day2/49.mp3"></audio>
	</section>

	<section data-role="page" id="page99" class="container">
	<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<a href="#page100" class="next_finger">
			<img src="../images/button/touchfinger_@3x.png" alt="next button">
		</a>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text_i">
					<div id="textbox1" class="textbox">	
						<p>Please touch the button to load your luggage.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section data-role="page" id="page100" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div data-role="main" class="ui-content">
			<div class="toggle">
				<div class="imgwrap">
					<?php if($LMS_IMAGE) { ?> 
						<img src="<?=$LMS_IMAGE?>" alt="james">
					<?php } else { ?>
						<img src="../images/intro/login_profile_@3x.png" alt="james">
					<?php } ?>
				</div>
				<div class="start_text">
					<img src="../images/button/btn_talk_more_gif.gif" alt="">
				</div>
				<div class="close_text">
					<img src="../images/button/btn_close.png" alt="">
				</div>
			</div>

			<div class="textwrap">
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<div class="text">
					<div id="textbox1" class="textbox">
						<p>There is a one touch folding function on i30, so one touch click here seats folds right away.</p>
					</div>
				</div>
			</div>
			<a href="#page101" id="go_page101" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/50.mp3"></audio> -->
	</section>

	<section data-role="page" id="page101" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div data-role="main" class="ui-content">
			<div class="main_wrap">
				<div class="textwrap">	
					<div class="text">	
						<div id="textbox1" class="textbox">
							<p>Okay, all the luggages loaded.<br>Let's move to Zurich for city tour.</p>
						</div>
					</div>
					<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box">
					</div>
				</div>
				<div class="imgwrap">
					<img src="../images/person/james_15.png" alt="james">
				</div>
				<a href="#page105" id="go_page105" class="next_p_btn ui-btn go-next">
					<img src="../images/button/btn_next_02_@3x.png" alt="next button">
				</a>
			</div>
		</div>
		<audio class="audio1" src="../tts/day2/51.mp3"></audio>
	</section>

	<!-- <section data-role="page" id="page102" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div class="page_bg"></div>
		<a href="#" class="next_finger">
			<img src="../images/button/touchfinger_@3x.png" alt="next button">
		</a>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>Now we're in Lindenhof.<br>I think this place has a extraordinary mood of Zurich.</p>
					</div>
				</div>
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
			</div>
			<div class="view_text">	
				<p>Zurich, Lindenhof</p>
				<a href="#page103" id="go_page103" class="next_p_btn ui-btn go-next">
					<img src="../images/button/btn_next_02_@3x.png" alt="next button">
				</a>
			</div>
		</div>
	</section>

	<section data-role="page" id="page103" class="container">
	<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div class="page_bg"></div>
		<div data-role="main" class="ui-content">
			<div class="textwrap">
				<div class="text_img2">
					<img src="../images/person/day3_james.png" alt="james">
				</div>	
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<div class="text">		
					<div id="textbox1" class="textbox">
						<p>Lindenhof is a small park located in Old town of Zurich.</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>B.C 107, Romans settle down in Zurich with building this place.<br>Nowdays, this place helps people for a rest. </p>
					</div>
					<div id="textbox3" class="textbox">
						<p>You see? the whole city view spreads out from here.</p>
					</div>
					<div class="btn_box">
						<a href="#" id="go_next1" class="text_btn_l">
							<img src="../images/button/btn_next_talk_arrow_2.png" alt="next button">
						</a>
						<a href="#" id="go_back" class="text_btn_r">
							<img src="../images/button/btn_next_talk_arrow_1.png" alt="next button">
						</a>
					</div>
				</div>
			</div>
			<a href="#page104" id="go_page104" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
	</section>

	<section data-role="page" id="page104" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div data-role="main" class="ui-content">
			<div class="main_wrap">
				<div class="textwrap">	
					<div class="text">	
						<div id="textbox1" class="textbox">
							<p>We're pretty much done in Zurich now. And next stop will be Bern.</p>
						</div>
					</div>
					<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box">
					</div>
				</div>
				<div class="imgwrap">
					<img src="../images/person/james_14.png" alt="james">
				</div>
				<a href="#page105" id="go_page105" class="next_p_btn ui-btn go-next">
					<img src="../images/button/btn_next_02_@3x.png" alt="next button">
				</a>
			</div>
		</div>
	</section> -->

	<section data-role="page" id="page105" class="container">
		<!-- <div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div> -->
		<div data-role="main" class="ui-content">
			<a href="/pd/en/day3.php" class="next_p_btn ui-btn go-next"><!--href="javascript:;"-->
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
	</section>

</div>

</div>

<a href="#page77">이동!!!!!!!!!</a>
<a href="#page95">이동!!!!!!!!!</a>


<!-- 여창민 대리 추가 (2017-03-30) : 시작 -->
<input type="hidden" id="SESSION_LMS_SEQ" name="SESSION_LMS_SEQ" value="<?=$_SESSION["HY_LMS_SEQ"]?>">
<!-- 여창민 대리 추가 (2017-03-30) : 끝 -->

