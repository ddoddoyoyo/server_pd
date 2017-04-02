<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui">
		<!-- <meta name="apple-touch-fullscreen" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-capable" content="yes"> -->
		<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
		<link rel="stylesheet" href="../css/styles.css">
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
		<script src="../js/jquery.ui.touch-punch.min.js"></script>
		<script src="../js/jquery.incremental-counter.js"></script>
		<script src="../js/jquery-ui.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
		<script src="../js/g_action.js"></script>
		<script>

		// $(document).ready(function(){
			
			

		// });

		$(document).ready(function(){
				// enter key 금지
				//console.log($("#current-img").height() );
				//console.log($("#current-img").width() );
				$(document).on('keypress', function(e) {
					if (e.which == 13) {
						return false;
					}
				});
				function readURL(input) {
					if (input.files && input.files[0]) {
						var reader = new FileReader(); //파일을 읽기 위한 FileReader객체 생성
						reader.onload = function (e) {
						//파일 읽어들이기를 성공했을때 호출되는 이벤트 핸들러
							$("#current-img").attr("src", e.target.result);
							if($("#current-img").height() >= $("#current-img").width()){
								$("#current-img").css({"width":"100%","height":"auto"});
							} else {
								$("#current-img").css({"width":"auto", "height":"100%"});
							}
						}                   
						reader.readAsDataURL(input.files[0]);
					}
				}//readURL()--
				$("#upload").change(function(){
					readURL(this);
				});
			

				//var mobile = (/iphone|ipod|android|blackberry|mini|windowssce|palm/i.test(navigator.userAgent.toLowerCase()));
				var android = (/|android|/i.test(navigator.userAgent.toLowerCase()));
				var agt = navigator.userAgent.toLowerCase();
				var browser = fun_agt(agt);


				if(android){
					if(browser == "Samsungbrowser"){
						$("body").css({'height':'calc(100% + 20px)'});
						$(".ui-mobile-viewport").css({'height':'calc(100% + 20px)'});
						$(".ui-mobile").css({"top":"10px"});
					} else if(browser == "Chrome") {
						$("body").css({'height':'calc(100% + 20px)'});
						$(".ui-mobile").css({"top":"20px"});
						$('.ui-mobile').css({'height':'calc(100% + 30px)'});
					} else {

					}
				}
			 });

			function fun_agt(agt){
				if (agt.indexOf("samsungbrowser") != -1) {
					return 'Samsungbrowser'; 	
				}  if (agt.indexOf("chrome") != -1) {
					return 'Chrome'; 
				} else {
					return 'etc'; 
				}
			}


		</script>
	</head>
	<body >
		<div id="wrap">
			<div id="contBox" class="container">
				<section data-role="page" id="page0" class="container">
					<!-- <div data-role="header" class="header">
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right"><img src="../images/button/icon_navbar.png" alt=""></a>
					</div> -->
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<h1>3Days trip <span>in europe</span> with i30.</h1>
							<p>PD mobile learning</p>
							<!-- <img src="../images/intro/open_font_3days_@3x.png" alt="3days trip in europe"> -->
						</div>
						<!-- <a href="#page1"><p class="intro_start">START</p></a> -->
						<a href="#page1" id="go_page1" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						<!-- <div class="imgwrap">
							<img src="../images/intro/hyundai_logo.png" alt="logo">
						</div> -->
					</div>
				</section>

				
				<section data-role="page" id="page1" class="container">
				<form id="profileFrm" name="profileFrm" method="post" action="" enctype="multipart/form-data">
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<h1>Hello.</h1>
							<h2>What's your name?</h2>

						</div>
						<a class="btn btn-change" href="javascript:;">
							<div class="imgwrap input1">
								<img id="current-img" src="../images/intro/login_profile_icontype_@3x.png" alt="3days trip in europe">
								<input type="file" id="upload" name="PROFILE_IMAGE" accept="image/*">
							</div>
						</a>

						<div class="log_box input1">
							<div class="input_info" id="select_box">
								<label for="input_country">COUNTRY</label>
								<select id="input_country" name="COUNTRY">
									<option value="COUNTRY">COUNTRY</option>
									<option value="usa">usa</option>
									<option value="korea">korea</option>
									<option value="china">china</option>
								</select>
							</div>
							<input type="text" id="input_name" placeholder="NAME" name="">
							<a href="#page2" class="intnext_btn">NEXT</a>
						</div>
						
						<!-- <div class="imgwrap input2">
							<img src="../images/intro/login_profile_@3x.png" alt="3days trip in europe">
						</div>
						<div class="log_box input2">
							<input type="text" id="input_name" name="" disabled="" value="Tom">
							<a href="#page2" class="intnext_btn">NEXT</a>
						</div> -->
						
					</div></form>
				</section>
				

				<section data-role="page" id="page2" class="container"> 
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">	
								<h2 class="pointColor">Tom!</h1>
								<p>This is James!<br><span class="pointColor">Finally, I got an i30 that I've waited!</span><br>So now we can go on a trip that we have planned before.<br>you'll hop in right?</p>
							</div>
							<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box"></div>
						</div>
						<a href="#page3" class="yes_btn">YES</a>
						<!-- <div class="imgwrap">
							<img src="../images/person/james_1.png" alt="james">
						</div> -->
					</div>
				</section>

				<section data-role="page" id="page3" class="container">
					<div class="page_bg"></div>
					<!-- <div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="../images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="../images/button/icon_navbar.png" alt="">
						</a>
					<h1 class="subject">BRAND</h1>
					</div> -->
					<div data-role="main" class="ui-content">
						<a href="#page4" id="go_page4"  class="layer_landscape">
							<div class="box">
								<img class="icon-device" src="../images/icon_phonerotation_@3x.png" alt="">
								<p>Turn the screen to landscape.</p>
								<p class="ok_btn">OK</p>
							</div>
						</a>
					</div>
				</section>

				<section data-role="page" id="page4" class="container">
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
							<img src="../images/person/james_3.png" alt="james">
						</div>
						<div class="textwrap">
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">	
								<p>You'll be travelling 6 cities for 3days with i30 and me. I've planned the routes already.<br><br>So shall we move on?</p>
							</div>
						</div>
						<a href="#page5" id="go_page5" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page5" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="../images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="../images/button/icon_navbar.png" alt="">
						</a>
					<!-- <h1 class="subject">BRAND</h1> -->
					</div>
					<div class="page_bg"></div>
					<div data-role="main" class="ui-content">	
						<div class="textwrap">	
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>We will start from Milan through Lake Como and Stelvio Pass to reach Switzerland.</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>In Switzerland, we will be stop at Zurich and Bern to get to final spot Strasbourg.</p>
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
							<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="imgwrap">
							<img src="../images/person/james_2.png" alt="james">
						</div>
						<a href="#page6" id="go_page6" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page6" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="../images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="../images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div class="page_bg">
						<img src="../images/day1/landscape/07_bg_map_4.jpg" alt="james">
					</div>
					<a href="#page7" class="next_finger">
						<img src="../images/button/touchfinger_@3x.png" alt="next button">
					</a>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>Our journey starts from Milan, isn't it exciting?</p>
								</div>
								<!-- <div id="textbox2" class="textbox">
									<p>In Switzerland, we will be stop at Zurich and Bern to get to final spot Strasbourg.</p>
								</div> -->
							</div>
							<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="imgwrap">
							<img src="../images/person/james_2.png" alt="james">
						</div>
					</div>
				</section>

				<section data-role="page" id="page7" class="container">
					<div data-role="main" class="ui-content">
						<div class="imgwrap">
							<img src="../images/day1/landscape2/08_photo_1.png" alt="car">
						</div>
						<div class="textwrap">
							<div class="text">	
								<div id="textbox1" class="textbox">
									<h1>Day1.</h1>
									<div class="img_wrap">
										<img src="../images/button/08_point.png" alt="location point">
										<img src="../images/button/08_lodeline.png" alt="location">
										<p class="p1">Milano</p>
										<p class="p2">Como</p>
									</div>
									<ul>
										<li>Exterior</li>
										<li>Body frame</li>
										<li>Suspension</li>
									</ul>
								</div>
								<a href="#page9" id="go_page8">
									<img src="../images/button/btn_next_02_@3x.png" alt="next button">
								</a>
							</div>
						</div>
					</div>
				</section>

				<!--<section data-role="page" id="page8" class="container">
					<div data-role="main" class="ui-content">
						<div class="imgwrap">
							<img src="../images/day1/landscape2/08_photo_2.png" alt="car">
						</div>
						<div class="textwrap">
							<div class="text">	
								<div id="textbox1" class="textbox">
									<h2>Duomo</h2>
									<p class="p2">In Milano</p>
								</div>
								<a href="#page9" id="go_page9">
									<img src="../images/button/btn_next_02_@3x.png" alt="next button">
								</a>
							</div>
						</div>
					</div>
				</section>--> 

				<section data-role="page" id="page9" class="container">
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
							<img src="../images/person/james_4.png" alt="james">
						</div>
						<div class="textwrap">
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">	
								<p>Here is our first destination!<br>I couldn't miss the Duomo which is the symbol of Milan with sophisticated beauty.<br><br>Be hurry, we must watch it.</p>
							</div>
						</div>
						<a href="#page10" id="go_page10" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page10" class="container">
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
									<p>Such a wonderful day, I'm on a trip with my first car<br><br>This is so great!!!</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>	
						</div>
						<a href="#page11" id="go_page11" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page11" class="container">
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
								<div class="text_img">
									<img src="../images/person/james_2_2.png" alt="james">
								</div>		
								<div id="textbox1" class="textbox">
									<p>You know that roads in Italy is narrow and preserving stone roads as their legacy.</p>
								</div>
								<!-- <div id="textbox2" class="textbox">
									<p>In Switzerland, we will be stop at Zurich and Bern to get to final spot Strasbourg.</p>
								</div> -->
							</div>
						</div>
						<a href="#page12" id="go_page12" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page12" class="container">
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
									<p>You know the road condition is quite bad but isn't it comfortable to drive? I heard the body rigidity got strengthen and I can feel it solid.</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>I know it for sure with driving on unpaved roads!</p>
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
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<a href="#page13" id="go_page13" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
				</section>

				<section data-role="page" id="page13" class="container">
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
							<div class="incr_count">	
								<span class="incremental-counter" id="int" data-value="17"></span><span class="point">.</span>
								<span class="incremental-counter" id="decimal" data-value="7"></span><span class="percentage">%</span>
							</div>
							<img src="../images/day1/13_numberline.png"" alt="numberline">
						</div>
						<div class="textwrap">
							<div class="text_i">
								<div id="textbox1" class="textbox">
									<p>Let's apply the AHSS</p>
								</div>	
							</div>
						</div>
						<a href="#" class="next_finger ui-link"><img src="../images/button/touchfinger_@3x.png" alt="next button"></a>
						<a href="#page14" id="go_page14" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page14" class="container">
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
									<img src="../images/intro/login_profile_@3x.png"" alt="man">
									<p>Compare to previous i30 model,<span>?</span> AHSS applied to increase the body rigidity<br>so has improved!</p>
								</div>	
								<div id="textbox2" class="textbox">
									<p>what will be the proper answer to talk to James?</p>
									<ul class="btn_num">
										<li>5%</li>
										<li>10.3%</li>
										<a href="#page15" id="go_page15"><li>17.5%</li></a>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section data-role="page" id="page15" class="container">
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
								<p>Improved Advanced High Strength Steel, reinforcement of body for make body rigidity 17.5% higher compare to former i30!</p>
							</div>
						</div>
						<a href="#page16" id="go_page16" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page16" class="container">
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
									<p>I see, that's why I could feel the both comfortness and solidity.<br>oh right, you're working in Hyundai motors?</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>you know much stuff then I expected.<br><br>Give me more informations during the trip.</p>
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
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<a href="#page17" id="go_page17" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page17" class="container">
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
									<p>Here we are reaching to the Duomo.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="view_text">	
							<a href="#page18"><p>Milan. duomo cathedral</p></a>
							<a href="#page18" id="go_page18" class="next_p_btn ui-btn go-next">
								<img src="../images/button/btn_next_02_@3x.png" alt="next button">
							</a>
						</div>
					</div>
				</section>

				<section data-role="page" id="page18" class="container">
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
							<div class="text">	
								<div class="text_img">
									<img src="../images/person/james_2_2.png" alt="james">
								</div>	
								<div id="textbox1" class="textbox">
									<p>You gotta know this. Duomo Cathedral is picked as "1001 buldings you must see before you die"</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>It has massive size and various sophisticated sulptures. </p>
								</div>
								<div id="textbox3" class="textbox">
									<p>we can see the whole view of Milan on the roof top.</p>
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
						<a href="#page19" id="go_page19" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page19" class="container">
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
									<p>Be hurry!<br>We gotta move on!</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<a href="#page20" id="go_page20" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page20" class="container">
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
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>You see that this town has so many narrow and bumpy roads.<br>maybe because of the tram passing through the city.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<a href="#page21" id="go_page21" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
				</div>
				</section>

				<section data-role="page" id="page21" class="container">
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
									<p>This i30 is a compact sized hatchback so really easy to drive.<br>and when I pass the bumpy road the rear part lands so smooth.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<a href="#page22" id="go_page22" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page22" class="container">
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
							<img src="../images/intro/login_profile_@3x.png" alt="james">
						</div>
						<div class="start_text">
									<img src="../images/button/btn_talk_more.png" alt="">
							</div>

						<div class="textwrap">
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">
								<div id="textbox1" class="textbox">
									<p>Did you knot that multilink system is usually used on sportcars to increase the road grip force?</p>
								</div>	
								<div id="textbox2" class="textbox">
									<p>i30 also uses multilink system with holding 5 links so it can react to any type of roads to keep stable grip force.</p>
								</div>
								<div id="textbox3" class="textbox">
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
						<a href="#page23" id="go_page23" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>
					
				<section data-role="page" id="page23" class="container">
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
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>I see, I just heard the multilink system is good when I was buying the car, but technical explain helps me alot.</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>I can't wait to drive on winding roads.</p>
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
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<a href="#page24" id="go_page24" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<!-- <section data-role="page" id="page24" class="container">
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
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>We're heading to Castello Sforzesco now.<br>in 15 century, lord Francesco Sforza built this castle and now using as museum and Art gallery.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<a href="#page25" id="go_page25" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div> 
				</section>-->

				<section data-role="page" id="page25" class="container">
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
									<p>Here we can see the Castello Sforzesco.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="view_text">	
							<a href="#page26"><p>Milan. Sforzesco Castle</p></a>
							<a href="#page26" id="go_page26" class="next_p_btn ui-btn go-next">
								<img src="../images/button/btn_next_02_@3x.png" alt="next button">
							</a>
						</div>
					</div>
				</section>

				<section data-role="page" id="page26" class="container">
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
							<div class="text">	
								<div class="text_img">
									<img src="../images/person/james_2_2.png" alt="james">
								</div>	
								<div id="textbox1" class="textbox">
									<p>You know that Leonardo Da Vinci and Bramante joined to build the Castello Sforzesco.</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>This is the symbolic architect of Renaissance era in 15th century.</p>
								</div>
								<div id="textbox3" class="textbox">
									<p>It's created by Lord Francesco Sforza,</p>
								</div>
								<div id="textbox4" class="textbox">
									<p>Nowdays, it is used as museum and are gallery.</p>
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
							<a href="#page27" id="go_page27" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
				</section>

				<section data-role="page" id="page27" class="container">
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
						<div class="textwrap">	
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>It's not just a gigantic size I'm talking but you can see holistic condition kept so well. I feel like I'm at home.</p>
								</div>							
							</div>
							<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="imgwrap">
							<img src="../images/person/james_4.png" alt="james">
						</div>
						<a href="#page28" id="go_page28" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page28" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="../images/button/icon_arrow.png" alt="">
						</a>
						<a href="#page29" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="../images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<a href="#page29" class="next_finger">
						<img src="../images/button/touchfinger_@3x.png" alt="next button">
					</a>
					<div data-role="main" class="ui-content">
						<div class="imgwrap">
							<img src="../images/person/james_5.png" alt="james">
						</div>
						<div class="textwrap">
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">	
								<p>Such a thrill watching these great architects. And you know I'm saying this because it's not just my car but isn't i30's design so cool?</p>
							</div>
						</div>
					</div>
				</section>

				<section data-role="page" id="page29" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="../images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="../images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<a href="#page30" class="next_finger">
						<img src="../images/button/touchfinger_@3x.png" alt="next button">
					</a>
					<div data-role="main" class="ui-content">
						<div class="imgwrap">
							<img src="../images/day1/49_i30_block.png" alt="james">
						</div>
					</div>
				</section>

				<section data-role="page" id="page30" class="container">
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
							<img src="../images/intro/login_profile_@3x.png" alt="james">
						</div>
						<div class="start_text">
							<img src="../images/button/btn_talk_more.png" alt="">
						</div>
						<div class="img_twinkle">
							<img id="img1" src="../images/day1/48_i30_block.png" alt="">
							<!-- <img id="img2" src="../images/day1/49_i30_block.png" alt=""> -->
						</div>
						<div class="textwrap">
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">
								<div id="textbox1" class="textbox">
									<p>The overlap Cascade grille emphasize more sporty look and enlarged logo contains smart functions with integral laser.</p>
								</div>	
								<div id="textbox2" class="textbox">
									<p>Especially, the surrounding of the grille is very sophisticated and it's my favorite part personally.</p>
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
						<a href="#page31" id="go_page31" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page31" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="../images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="../images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<a href="#page32" class="next_finger">
						<img src="../images/button/touchfinger_@3x.png" alt="next button">
					</a>
					<div data-role="main" class="ui-content">
					</div>
				</section>

				<section data-role="page" id="page32" class="container">
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
									<p>Let's try to make the character line of the i30.</p>
								</div>	
							</div>
						</div>
						<div class="imgwrap">
							<img class="brush_t" src="../images/day1/51_brush.png" alt="">
							
							<img class="right_t_light" src="../images/day1/52_draw-mark.png" alt="">
							
						</div>
					</div>
				</section>

				<section data-role="page" id="page33" class="container">
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
							<img src="../images/intro/login_profile_@3x.png" alt="james">
						</div>
						<div class="start_text">
							<img src="../images/button/btn_talk_more.png" alt="">
						</div>
						<div class="textwrap">
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">
								<div id="textbox1" class="textbox">
									<p>The overlap Cascade grille emphasize more sporty look and enlarged logo contains smart functions with integral laser.</p>
								</div>
							</div>
						</div>
						<a href="#page34" id="go_page34" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page34" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="../images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="../images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<a href="#page35" class="next_finger">
						<img src="../images/button/touchfinger_@3x.png" alt="next button">
					</a>
					<div data-role="main" class="ui-content">
						<div class="imgwrap">
							<img src="../images/day1/55_i30_block.png" alt="james">
						</div>
					</div>
				</section>

				<section data-role="page" id="page35" class="container">
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
							<img src="../images/intro/login_profile_@3x.png" alt="james">
						</div>
						<div class="start_text">
							<img src="../images/button/btn_talk_more.png" alt="">
						</div>
						<div class="textwrap">
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">
								<div id="textbox1" class="textbox">
									<p>The spoiler contains LED brake light, and dual exhaust tips will be the exceptional point comparing with other cars. My design taste is much better than Golf.</p>
								</div>
							</div>
						</div>
						<a href="#page37" id="go_page37" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page36" class="container">
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
							
						</div>
						<div class="textwrap">
							<div class="textwrap">
								<div id="textbox1" class="textbox">
									
								</div>
							</div>
						</div>
					</div>
				</section>

				<section data-role="page" id="page37" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="../images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="../images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div class="page_bg">
						<img src="../images/day1/61_bg_map_2.jpg" alt="james">
					</div>
					<a href="#page38" class="next_finger">
						<img src="../images/button/touchfinger_@3x.png" alt="next button">
					</a>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>So shall we move on to the Lago di Como?</p>
								</div>
								<!-- <div id="textbox2" class="textbox">
									<p>In Switzerland, we will be stop at Zurich and Bern to get to final spot Strasbourg.</p>
								</div> -->
							</div>
							<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="imgwrap">
							<img src="../images/person/james_2_2.png" alt="james">
						</div>
					</div>
				</section>

				<section data-role="page" id="page38" class="container">
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
									<p>We gotta be hurry before the dawn.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>	
						</div>
						<a href="#page39" id="go_page39" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page39" class="container">
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
							<div class="text">	
								<div class="text_img">
									<img src="../images/person/james_2_2.png" alt="james">
								</div>	
								<div id="textbox1" class="textbox">
									<p>I'ss getting dark now, I heard i30 has Full LED that shows bright view?</p>
								</div>
							</div>
							<a href="#page40" id="go_page40" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
				</section>

				<section data-role="page" id="page40" class="container">
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
							<img src="../images/intro/login_profile_@3x.png" alt="james">
						</div>
						<div class="start_text">
							<img src="../images/button/btn_talk_more.png" alt="">
						</div>
						<div class="textwrap">
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">
								<div id="textbox1" class="textbox">
									<p>Yeah, it's really bright. It gives further view, and SMART high beam gives no problem to drive in mountain road.</p>
								</div>
							</div>
						</div>
						<a href="#page41" id="go_page41" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page41" class="container">
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
							<img src="../images/person/james_2_2.png" alt="james">
						</div>
						<div class="textwrap">
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">	
								<p>It's a bit late today, so we will take a night off here in hostel.</p>
							</div>
						</div>
						<a href="#page42" id="go_page42" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page42" class="container">
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
									<p>Okay, good night buddy. I'll see you tomorrow.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<a href="#page43" id="go_page43" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
				</section>

				<section data-role="page" id="page43" class="container">
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
								<a href="#page44" class="next_finger">
									<img src="../images/button/touchfinger_@3x.png" alt="next button">
								</a>
								<div class="text_w">	
											<p>Waking up James</p>
								</div>	
					</div>
				</section>

				<section data-role="page" id="page44" class="container">
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
						<div class="textwrap">	
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>Before we carry on, let's clean up the mess inside.</p>
								</div>	
							</div>
							<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="imgwrap">
							<img src="../images/person/james_8.png" alt="james">
						</div>
						<a href="#page45" id="go_page45" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page45" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="../images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="../images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<!-- <div class="page_bg"><img src="../images/day1/70_interior.jpg" alt=""></div> -->
					<div data-role="main" class="ui-content">	
						<div class="textwrap">	
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>Now it's clean, just like a brand new one out of factory.</p>
								</div>
							</div>
							<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="imgwrap">
							<img src="../images/person/james_8.png" alt="james">
						</div>
						<a href="#page46" id="go_page46" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page46" class="container">
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
							<img src="../images/intro/login_profile_@3x.png" alt="james">
						</div>
						<div class="start_text">
							<img src="../images/button/btn_talk_more.png" alt="">
						</div>
						<div class="textwrap">
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">
								<div id="textbox1" class="textbox">
									<p>Comes to think of it, there are five options for interior color and you choose the red one. shall we check out the other color options?</p>
								</div>
							</div>
						</div>
						<a href="#page47" id="go_page47" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page47" class="container">
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
							<img src="../images/intro/login_profile_@3x.png" alt="james">
						</div>
						<div class="start_text">
							<img src="../images/button/btn_talk_more.png" alt="">
						</div>
						<div class="textwrap">
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">
								<div id="textbox1" class="textbox">
									<p>Strong red color that gives point for contrast with black leather.</p>
								</div>	
								<div id="textbox2" class="textbox">
									<p>Black cotton and leather interior that filled with chic feeling.</p>
								</div>
								<div id="textbox3" class="textbox">
									<p>Leather point with gray color with providing simple image.</p>
								</div>
								<div id="textbox4" class="textbox">
									<p>Indigo blue color which is interior point that gives young and live feeling.</p>
								</div>
								<div id="textbox5" class="textbox">
									<p>Glam burgundy interior that burgundy color seat that provides bright feeling.</p>
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
						<a href="#page48" id="go_page48" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page48" class="container">
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
									<p>Pick one color which is your favorite to talk to James.</p>
								</div>	
							</div>
						</div>
						<div class="imgwrap">
							<ul class="choice_color">
								<a href="#page49" id="ch1"><li><img src="../images/day1/78_btn_01.png" alt=""></li></a>
								<a href="#page49" id="ch2"><li><img src="../images/day1/78_btn_02.png" alt=""></li></a>
								<a href="#page49" id="ch3"><li><img src="../images/day1/78_btn_03.png" alt=""></li></a>
								<a href="#page49" id="ch4"><li><img src="../images/day1/78_btn_04.png" alt=""></li></a>
								<a href="#page49" id="ch5"><li><img src="../images/day1/78_btn_05.png" alt=""></li></a>
							</ul>
						</div>
					</div>
				</section>

				<section data-role="page" id="page49" class="container">
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
							<div class="text_img">
									<img src="../images/person/james_2_2.png" alt="james">
							</div>
							<div id="textbox1" class="textbox">
								<p>I like the red interior that has sporty red point of sport car concept.</p>
							</div>		
							 <div id="textbox2" class="textbox">
								<p>I prefer the chic mood of whole black interior.</p>
							</div>
							<div id="textbox3" class="textbox">
								<p>Gray is the color that won’t easily get tired so I would go for gray interior.</p>
							</div>
							<div id="textbox4" class="textbox">
								<p>As I'm a metropolitan, I love the indigo blue interior.</p>
							</div>
							<div id="textbox5" class="textbox">
								<p>I like the glam burgundy interior because burgundy is a obvious color point.</p>
							</div> 
						</div>
						</div>
						<a href="#page50" id="go_page50" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page50" class="container">
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
									<p>The result of best style for i30 interior.</p>
								</div>	
							</div>
						</div>
						<div class="imgwrap">	
							<ul>
								<li><span class="g_title">RED</span><span class="g_num" id="red">25</span></li>
								<li><span class="g_title">BLACK</span><span class="g_num" id="black">5</span></li>
								<li><span class="g_title">GRAY</span><span class="g_num" id="gray">20</span></li>
								<li><span class="g_title">INDIGO BLUE</span><span class="g_num" id="ind_blue">15</span></li>
								<li><span class="g_title">BLAM BURGUNDY</span><span class="g_num" id="burgundy">10</span></li>
							</ul>
						</div>
					</div>
					<a href="#page51" id="go_page51" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
				</section>

				<section data-role="page" id="page51" class="container">
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
						<div class="textwrap">	
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>We will start from Milan through Lake Como and Stelvio Pass to reach Switzerland.</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>Then, let's take a look on Lago di Como, The best leisure spot in Italy.</p>
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
							<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="imgwrap">
							<img src="../images/person/james_7.png" alt="james">
						</div>
						<a href="#page52" id="go_page52" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page52" class="container">
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
									<p>Lago di Como became more famous after George Clooney and John Legend did a wedding march.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<a href="#page53" id="go_page53" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
				</section>

				<section data-role="page" id="page53" class="container">
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
									<p>Lago di Como is well known place for the recuperation in Europe for very long time.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="view_text">	
							<a href="#page54"><p>Como Lake</p></a>
							<a href="#page54" id="go_page54" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
				</section>

				<section data-role="page" id="page54" class="container">
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
							<div class="text">	
								<div class="text_img">
									<img src="../images/person/james_2_2.png" alt="james">
								</div>	
								<div id="textbox1" class="textbox">
									<p>From the medieval era, lots of lords and artist chose Lago di Como for the leisure.</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>Here is just so beautiful.</p>
								</div>
								<div id="textbox3" class="textbox">
									<p>Just like one in the fairy tale, right?</p>
								</div>
								<div id="textbox4" class="textbox">
									<p>Now I know why people choose here to visit.</p>
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
							<a href="#page55" id="go_page55" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
				</section>

				<section data-role="page" id="page55" class="container">
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
						<div class="textwrap">	
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>Okay buddy, let's move on to next stop.</p>
								</div>
							</div>
							<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="imgwrap">
							<img src="../images/person/james_2.png" alt="james">
						</div>
						<a href="#page56" id="go_page56" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page56" class="container">
					<div data-role="main" class="ui-content">
						<div class="imgwrap">
							<img src="../images/intro/open_bg_@3x.jpg" alt="car">
						</div>
						<div class="textwrap">
							<div class="text">	
								<div id="textbox1" class="textbox">
									<h1>Day2.</h1>
									<div class="img_wrap">
										<img src="../images/button/08_point.png" alt="location point">
										<img src="../images/button/08_lodeline.png" alt="location">
										<p class="p1">Stelvio Pass  </p>
										<p class="p2">Zurich</p>
									</div>
									<ul>
										<li>Body Rigidity</li>
										<li>Turbo Engine + DCT</li>
										<li>Space</li>
									</ul>
								</div>
								<a href="#page57" id="go_page56">
									<img src="../images/button/btn_next_02_@3x.png" alt="next button">
								</a>
							</div>
						</div>
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
						<img src="../images/day2/03_stelviopass_map_2.jpg" alt="james">
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
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<a href="#page59" id="go_page59" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
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
					<div class="page_bg"></div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">	
								<div class="text_img2">
									<img src="../images/person/james_9.png" alt="james">
								</div>	
								<div id="textbox1" class="textbox">
									<p>James<br>Here we can still see some snow yet. But weather is just so fine for driving!</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>Here we are at Stelvio Pass.<br>Shall I accelerate from now?</p>
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
							<a href="#page60" id="go_page60" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
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
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>The spec of my car is 1.6 Turbo-GDI.<br>did you know that this one has higher horsepower than Golf 1.8?</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<a href="#page61" id="go_page61" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
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
					<div data-role="main" class="ui-content">
						<div class="imgwrap">
								<div class="imgL">
									<p>i30<span>GAMMA 1.6 T-GDI</p>
									<img src="../images/day2/08_engine_left.png" alt="">
								</div>
								<div class="imgR">
									<p>Golf<span>1.8 Turbo</p>
									<img src="../images/day2/08_engine_right.png" alt="">
								</div>
						</div>
					</div>
				</section>

				<section data-role="page" id="page62" class="container">
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
				</section>

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
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>Transmission is 7 speed DCT.<br><br>Can you believe it?<br>A strong engine with quick shift.</p>
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
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<a href="#page64" id="go_page64" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
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
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>when we are escaping hairpin section like here, a grip force from rear suspension is core thing. and you see? there is no slip on tolerable speed.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<a href="#page65" id="go_page65" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
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
						<div class="imgwrap">
							<img src="../images/intro/login_profile_@3x.png" alt="james">
						</div>
						<div class="start_text">
									<img src="../images/button/btn_talk_more.png" alt="">
							</div>

						<div class="textwrap">
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">
								<div id="textbox1" class="textbox">
									<p>Did you knot that multilink system is usually used on sportcars to increase the road grip force?i30 also uses multilink system with holding 5 links so it can react to any type of roads to keep stable grip force.</p>
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
						<div class="textwrap">
							<a href="#page67" id="go_page67" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
				</section>

				<section data-role="page" id="page67" class="container">
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
				</section>

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
									<p>Wow! that;s why I feel so connected with the car when I'm on high speed in continuous corners.<br><br>Such a thrill, I'm loving it!!</p>
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
									<p>Let's take a rest here, buddy.
</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="view_text">	
							<a href="#page70"><p>Passo della stelvio</p></a>
							<a href="#page70" id="go_page70" class="next_p_btn ui-btn go-next">
								<img src="../images/button/btn_next_02_@3x.png" alt="next button">
							</a>
						</div>
					</div>
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
							<div class="text">	
								<div class="text_img2">
									<img src="../images/person/james_9.png" alt="james">
								</div>	
								<div id="textbox1" class="textbox">
									<p>Do you know the reason why?<br>Stelvio Pass is connecting various Alps mountains, so it gives us tremendous views.</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>These are the roads we just have passed.<br>Pretty dizzy right?<br>How many hairpins did we passed?<br><br>It was such a fun.</p>
								</div>
								<div id="textbox3" class="textbox">
									<p>-Noteworthy powerful engine<br>-7 Speed Dual Clutch Transmission<br>-Strong body rigidity<br>-Multilink rear-suspension system<br>These combination makes i30 such a fun car!</p>
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
							<a href="#page71" id="go_page71" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
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
									<p>How was it?<br>Wasn't it scared though?<br>I hope you enjoyed in this magnificent winding courses.<br><br>because I fully enjoyed.</p>
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
						<img src="../images/day2/26_Zürich_map_2.jpg" alt="james">
					</div>
					<a href="#page74" class="next_finger">
						<img src="../images/button/touchfinger_@3x.png" alt="next button">
					</a>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>We will be going to the place called Fischers Fritz in Zurich, Switzerland.<br><br>Click on the Zurich.</p>
								</div>
								<!-- <div id="textbox2" class="textbox">
									<p>In Switzerland, we will be stop at Zurich and Bern to get to final spot Strasbourg.</p>
								</div> -->
							</div>
							<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="imgwrap">
							<img src="../images/person/james_2.png" alt="james">
						</div>
					</div>
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
							<div class="text">	
								<div class="text_img2">
									<img src="../images/person/james_9.png" alt="james">
								</div>	
								<div id="textbox1" class="textbox">
									<p>Before we take a look a downtown, We gotta unpack first so let's drive straight to the camping spot.</p>
								</div>
							</div>
							<a href="#page76" id="go_page76" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
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
							<div class="text">	
								<div class="text_img2">
									<img src="../images/person/james_9.png" alt="james">
								</div>	
								<div id="textbox1" class="textbox">
									<p>It's the one of most famous camping spot in Europe. So a lot of camping lovers visit here.</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>I've always wanted to camp here for a long time also.</p>
								</div>
								<div id="textbox3" class="textbox">
									<p>Facility is good, and riverside is so cozy and beautiful.</p>
								</div>
								<div id="textbox4" class="textbox">
									<p>So we'll be unpacking here.</p>
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
							<a href="#page78" id="go_page78" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
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
									<p>i30 is really spacious car.<br>As you can see the trunk, its so roomy.<br>We could load all of our luggages for this trip.</p>
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
				</section>

				<section data-role="page" id="page79" class="container">
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
									<p>We will start from Milan through Lake Como and Stelvio Pass to reach Switzerland.</p>
								</div>
							</div>
							<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="imgwrap">
							<img src="../images/person/james_11.png" alt="james">
						</div>
						<a href="#page80" id="go_page80" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
				</section>

				<section data-role="page" id="page80" class="container">
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
				</section>

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
									<p>Wow, it can load really a lot of baggages.</p>
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
							<div class="text">	
								<div class="text_img2">
									<img src="../images/person/james_9.png" alt="james">
								</div>	
								<div id="textbox1" class="textbox">
									<p>So let's pitch a tent.<br>While I'm pitching, why don't you turn the music on.</p>
								</div>
							</div>
							<a href="#page83" id="go_page83" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
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
							<div class="text">	
								<div class="text_img2">
									<img src="../images/person/james_9.png" alt="james">
								</div>	
								<div id="textbox1" class="textbox">
									<p>Wait a sec, I need a phone to link first. where is my phone?</p>
								</div>
							</div>
							<a href="#page84" id="go_page84" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
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
						<div class="textwrap">
							<div class="text">	
								<div class="text_img2">
									<img src="../images/person/james_9.png" alt="james">
								</div>	
								<div id="textbox1" class="textbox">
									<p>So let's pitch a tent.<br>While I'm pitching, why don’t you turn the music on.</p>
								</div>
							</div>
							<a href="#page85" id="go_page85" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
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
					<a href="#page86" class="next_finger">
						<img src="../images/button/touchfinger_@3x.png" alt="next button">
					</a>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>Pairing completed.</p>
								</div>
							</div>
						</div>
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
								<p>i30 offers mutual internet, mobile service, remote control, voice assistance for navigation and phone call via Android Auto.<br>It's possible to use most of smart features.</p>
							</div>
						</div>
						<a href="#page87" id="go_page87" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
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
					<a href="#page88" class="next_finger">
						<img src="../images/button/touchfinger_@3x.png" alt="next button">
					</a>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>Pairing completed.</p>
								</div>
							</div>
						</div>
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
								<p>i30 supports Apple car play so that able to use navigation, phone call and music with simple pairing.</p>
							</div>
						</div>
						<a href="#page89" id="go_page89" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
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
									<p>We gotta volume up for pitching tent, buddy.</p>
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
						<div class="textwrap">
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>You have a serious good taste on music.<br><br>Come on we gotta get done before sunset.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<a href="#page91" id="go_page91" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
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
							<div class="text">	
								<div class="text_img2">
									<img src="../images/person/james_9.png" alt="james">
								</div>	
								<div id="textbox1" class="textbox">
									<p>Do you know the reason why?<br>Stelvio Pass is connecting various Alps mountains, so it gives us tremendous views.</p>
								</div>
							</div>
							<a href="#page92" id="go_page92" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
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
					<a href="#page93" class="next_finger">
						<img src="../images/button/touchfinger_@3x.png" alt="next button">
					</a>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>Pairing completed.</p>
								</div>
							</div>
						</div>
					</div>
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
					<div data-role="main" class="ui-content">
						<div class="imgwrap">
							<img src="../images/intro/login_profile_@3x.png" alt="james">
						</div>
						<div class="start_text">
							<img src="../images/button/btn_talk_more.png" alt="">
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
						<div class="textwrap">
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>It’s already dark now.<br>isn't it great watching lake while camping?</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<a href="#page95" id="go_page95" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
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
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>Alright, such a moody night.<br><br>Let me play a song.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<a href="#page96" id="go_page96" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
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
									<p>It’s been a really long time doing camping right?<br><br>Let’s take a sleep for now and take a look zurich tomorrow?.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<a href="#page97" id="go_page97" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
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
									<p>Did you sleep well?<br><br>let's pack up and move on.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<a href="#page98" id="go_page98" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
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
							<div class="text">	
								<div class="text_img2">
									<img src="../images/person/james_9.png" alt="james">
								</div>	
								<div id="textbox1" class="textbox">
									<p>Here we go, shall we load again?</p>
								</div>
							</div>
							<a href="#page99" id="go_page99" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
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
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>Pairing completed.</p>
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
						<div class="imgwrap">
							<img src="../images/intro/login_profile_@3x.png" alt="james">
						</div>
						<div class="start_text">
							<img src="../images/button/btn_talk_more.png" alt="">
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
						<div class="textwrap">
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>okay, all the luggages loaded.<br><br>Let's move to Zurich for city tour.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<a href="#page102" id="go_page102" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
				</section>

				<section data-role="page" id="page102" class="container">
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
							<div class="text">	
								<div class="text_img">
									<img src="../images/person/james_2_2.png" alt="james">
								</div>	
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
						<div class="textwrap">
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>okay, all the luggages loaded.<br><br>Let's move to Zurich for city tour.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<a href="#page105" id="go_page105" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
				</section>

			</div>
		<!-- <a href="#page11">이동!!!!!!!!!</a> -->

		</div>
	</body>
</html>