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
			$LMS_IMAGE = $IMG_URL."/hyundai/member/".$row[0]['LMS_IMAGE'];
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
		<link rel="stylesheet" href="/pd/css/menu_day1.css">
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
		<script src="../js/day1.js"></script>	
		<script src="../js/menu_day1.js"></script>
		<script src="/pd/common/js/common.js"></script>
		<script>

		window.onload = function(){
			setTimeout(function(){
				var t = performance.timing;
				var s =  (t.loadEventEnd - t.navigationStart);
				//console.log(s - 2000);
				$('.loding_bar .londing2').animate({"width":"100%"}, s);
				setTimeout(function(){
					$.mobile.changePage("#page2");
				}, s-1);
			},0);
		}

		$(document).ready(function(){
			// enter key 금지
			//console.log($("#current-img").height() );
			//console.log($("#current-img").width() );

			$.mobile.hashListeningEnabled = false;
			$.mobile.pushStateEnabled = false;
			$.mobile.changePage.defaults.changeHash = false;

			var lms_img = "<? echo $LMS_IMAGE ?>";

			if(lms_img != ""){
				var img = new Image;
				var imgWidth = 0;
				var imgheight = 0;
				var ratioW =0;
				var ratioH =0;
				img.src=lms_img;
				img.onload = function() {
					imgWidth = img.width;
					imgheight = img.height;
					ratioW = imgWidth * 80 / imgheight;
					ratioH = imgheight * 80 / imgWidth;

					//console.log("w : " + imgWidth);
					//console.log("h : " + imgheight);
					console.log("W test : " + ratioW);
					console.log("h test : " + ratioH);
					console.log(lms_img);
					if(imgheight >= imgWidth){
						$("img#current-img").css({"width":"100%","height":"auto","margin-top":"calc((100% - "+ ratioH+"px) / 2)"});
					} else {
						$("img#current-img").css({"width":"auto","height":"100%","margin-left":"calc((100% - "+ ratioW+"px) / 2)"});
					} 
				};
			}
			$("#page55 .go-next").click(function(){	
				location.href="/pd/en/day2.php";
			});
		});

			 
		</script>
		<script type="text/javascript">
	   /*jQuery(function($) {
        var loading = $('<img alt="loading" src="../images/ajax-loader">')
        .appendTo(document.body).hide();
 
        $(window).ajaxStart(loading.show);
        $(window).ajaxStop(loading.hide);
    });*/
	</script>

	</head>
	<body>
		<div id="wrap">
			<div id="contBox" class="container">
				<section data-role="page" id="page1001" class="container"> 
					<div data-role="main" class="ui-content">
						<div class="imgwrap">
							<div class="gif_img">
								<img src="/pd/images/loading_short_4sec.gif" alt="">
							</div>
							<div class="loding_bar">
								<img src="/pd/images/loading_bar_1.png" alt="" class="londing1">
								<img src="/pd/images/loading_bar_2.png" alt="" class="londing2">
								<div id="logind_text">Preparing our trip...</div>
							</div>
						</div>
					</div>
				</section>

				

				<section data-role="page" id="page2" class="container"> 
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">	
								<h2 class="pointColor"><?=$_SESSION["HY_LMS_NAME"]?>!</h1>
								<p>Hi!<br>I am James!<br><span class="pointColor">Finally, I got an i30 I’ve been waiting for!</span><br>Now we can go on a trip that we have planned before. <br>Why don’t you hop in?</p>
							</div>
							<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box"></div>
						</div>
						<a href="#page3" class="yes_btn">YES</a>
						<div class="imgwrap">
							<img src="../images/person/james_21.png" alt="james">
						</div>
					</div>
					<!-- <audio class="audio1" src="../tts/day3/117.mp3"></audio> -->
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
						<a href="#page3001" id="go_page3001"  class="next_p_btn layer_landscape">
							<div class="box">
								<img class="icon-device" src="../images/icon_phonerotation_@3x.png" alt="">
								<p>Turn the screen to landscape.</p>
								<p class="ok_btn">OK</p>
							</div>
						</a>
					</div>
				</section>

				<section data-role="page" id="page3001" class="container">
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
								<img src="../images/person/day1_james.png" alt="james">
							</div>	
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>	
							<div class="text">
								<div id="textbox1" class="textbox">
									<p>Before we start our journey, let me show you this clip. After I watched this, I decided to buy the i30</p>
								</div>
							</div>
						</div>
						<div class="btn_play">
								<img src="../images/button/btn_videoplay.png" alt="">
							</div>
							<div class="popLayer" id="pop01">
								<video width="320" height="240" controls>
								  <source src="http://of01-qb5150.ktics.co.kr/Hayden_Paddon_Hyundai_i30.mp4" type="video/mp4">
									Your browser does not support HTML5 video.
								</video>	
							<!-- <iframe src="https://www.youtube.com/embed/HMUwBaKxOj8" frameborder="0" allowfullscreen></iframe> -->
							</div>
						<a href="#page4" id="go_page4" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						<audio class="audio1" src="../tts/day1/001.mp3"></audio>
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
								<p>You'll be travelling 6 cities for 3days with i30 and me. I've planned the routes already.<br>So shall we move on?</p>
							</div>
						</div>
						<a href="#page5" id="go_page5" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<audio class="audio1" src="../tts/day1/002.mp3"></audio>
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
					<div class="page_bg">
						<img src="../images/day1/landscape/06_bg_map_13.jpg" alt="">
					</div>
					<div data-role="main" class="ui-content">	
						<div class="textwrap">	
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>We will start from Milano, stop at Lake Como and Stelvio Pass, and reach Switzerland.</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>Then in Switzerland, we will stop at Zurich and Bern as we get to Strasbourg, our final destination.</p>
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
						<a href="#page7" id="go_page7" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<audio class="audio1" src="../tts/day1/003.mp3"></audio>
					<audio class="audio2" src="../tts/day1/004.mp3"></audio>
				</section>

				<section data-role="page" id="page7" class="container">
					<div data-role="main" class="ui-content">
						<div class="imgwrap">
							<img src="../images/day1/landscape2/08_photo_1.jpg" alt="car">
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
							</div>
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
						<img src="../images/day1/landscape/07_bg_map_4.jpg" alt="">
					</div>
					<a href="#page9" class="next_finger">
						<img src="../images/button/touchfinger_@3x.png" alt="next button">
					</a>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>Our first journey starts from Milano, isn’t it exciting?</p>
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
					<audio class="audio1" src="../tts/day1/005.mp3"></audio>
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
								<p>Here is our first destination!<br>I couldn't miss the Duomo which is the symbol of Milano with sophisticated beauty.</p>
							</div>
						</div>
						<a href="#page10" id="go_page10" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<audio class="audio1" src="../tts/day1/006.mp3"></audio>
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
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>Such a wonderful day to go on a trip with my first car<br>Feeling great!</p>
								</div>
							</div>	
						</div>
						<a href="#page11" id="go_page11" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<audio class="audio1" src="../tts/day1/007.mp3"></audio>
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
							<div class="text_img2">
								<img src="../images/person/day1_james.png" alt="james">
							</div>	
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>	
							<div class="text">
								<div id="textbox1" class="textbox">
									<p>You know that roads in Italy are narrow and preserved with stones for legacy.</p>
								</div>
							</div>
					</div>
					<a href="#page12" id="go_page12" class="next_p_btn ui-btn go-next">
						<img src="../images/button/btn_next_02_@3x.png" alt="next button">
					</a>
					<audio class="audio1" src="../tts/day1/008.mp3"></audio>
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
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>You know the road condition is quite bad but isn’t it still comfortable to ride in this car?<br>I heard the body rigidity of i30 was enhanced and I can feel the solidity.</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>I know it for sure I am driving on unpaved roads!</p>
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
							<a href="#page13" id="go_page13" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
					<audio class="audio1" src="../tts/day1/009.mp3"></audio>
					<audio class="audio2" src="../tts/day1/010.mp3"></audio>
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
					<div class="try_again">
						<img src="../images/tryagain.png"" alt="">
					</div>
					<div class="good">
						<img src="../images/tryagain_O.png"" alt="">
					</div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">	
								<div id="textbox1" class="textbox">
									<div class="imgwrap">
										<?php if($LMS_IMAGE) { ?> 
												<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
											<?php } else { ?>
											<img src="../images/intro/login_profile_@3x.png" alt="man">
										<?php } ?>
									</div>
									<p>To make the body frame more rigid, AHSS was applied to <span>?</span> of crucial parts of the new i30 compared to  27.2% of the previous model, </p>
								</div>	
								<div id="textbox2" class="textbox">
									<p>What would be the right number to tell James?</p>
									<ul class="btn_num">
										<a href="#" class="wrong"><li>17.7%</li></a>
										<a href="#" class="wrong"><li>27.2%</li></a>
										<a href="#" class="right"><li>53.5%</li></a>
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
							<?php if($LMS_IMAGE) { ?> 
									<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
								<?php } else { ?>
								<img src="../images/intro/login_profile_@3x.png" alt="man">
							<?php } ?>
						</div>
						<div class="textwrap">
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">	
								<p>This brand new i30 has improved the body frame with wider application of AHSS to 53.5%.</p>
							</div>
						</div>
						<a href="#page16" id="go_page16" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<audio class="audio1" src="../tts/day1/tom/001.mp3"></audio>
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
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>I see, that’s why I could feel both the comfort and solidity.<br>Oh, you work at Hyundai motors, right?</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>You know much more than I expected. Hope to get a lot of information from you during this trip.</p>
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
						<a href="#page17" id="go_page17" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<audio class="audio1" src="../tts/day1/011.mp3"></audio>
					<audio class="audio2" src="../tts/day1/012.mp3"></audio>
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
							<a href="#page18"><p>Milano. Duomo Cathedral</p></a>
							<a href="#page18" id="go_page18" class="next_p_btn ui-btn go-next">
								<img src="../images/button/btn_next_02_@3x.png" alt="next button">
							</a>
						</div>
					</div>
					<audio class="audio1" src="../tts/day1/013.mp3"></audio>
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
							<div class="text_img2">
								<img src="../images/person/day1_james.png" alt="james">
							</div>	
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>You need to know this. Duomo Cathedral is one of the “1001 buildings you must see before you die”</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>This gigantic cathedral has various and sophisticated sculptures.</p>
								</div>
								<div id="textbox3" class="textbox">
									<p>We can see the whole city of Milano from its rooftop.</p>
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
					<audio class="audio1" src="../tts/day1/014.mp3"></audio>
					<audio class="audio2" src="../tts/day1/015.mp3"></audio>
					<audio class="audio3" src="../tts/day1/016.mp3"></audio>
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
									<p>Hurry up!<br>We gotta move on</p>
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
					<audio class="audio1" src="../tts/day1/017.mp3"></audio>
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
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>You see that this town has so many narrow and bumpy roads.<br>Maybe because of the tram passing through the city.</p>
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
				<audio class="audio1" src="../tts/day1/018.mp3"></audio>
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
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>This hatchback is really easy to drive because of its compact size. I can feel the rear part landing so smooth when passing the bumpy road.</p>
								</div>
							</div>
						</div>
						<a href="#page22" id="go_page22" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<audio class="audio1" src="../tts/day1/019.mp3"></audio>
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
						<div class="toggle">
							<div class="imgwrap">
								<?php if($LMS_IMAGE) { ?> 
									<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
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
									<p>Did you know that multi-link suspension system is usually used on sport cars to have stronger grip on the road?</p>
								</div>	
								<div id="textbox2" class="textbox">
									<p>i30 also uses multilink system held by 5 links which gives it  stable grip on any type of roads.</p>
								</div>
								<div id="textbox3" class="textbox">
									<p>Especially when you are driving on winding roads, you will see the true value of  the multi-link suspension system.</p>
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
					<audio class="audio1" src="../tts/day1/tom/002.mp3"></audio>
					<audio class="audio2" src="../tts/day1/tom/003.mp3"></audio>
					<audio class="audio3" src="../tts/day1/tom/004.mp3"></audio>
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
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>I see, all I was told when I was buying the car was that the multilink system is good, but your technical explanation helps me a lot.</p>
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
						</div>
						<a href="#page25" id="go_page25" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<audio class="audio1" src="../tts/day1/020.mp3"></audio>
					<audio class="audio2" src="../tts/day1/021.mp3"></audio>
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
							<a href="#page26"><p>Milano. Sforzesco Castle</p></a>
							<a href="#page26" id="go_page26" class="next_p_btn ui-btn go-next">
								<img src="../images/button/btn_next_02_@3x.png" alt="next button">
							</a>
						</div>
					</div>
					<audio class="audio1" src="../tts/day1/022.mp3"></audio>
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
							<div class="text_img2">
									<img src="../images/person/day1_james.png" alt="james">
								</div>
								<div class="text_tip">
									<img src="../images/button/tail_3_@3x.png" alt="text box">
								</div>
							<div class="text">		
								<div id="textbox1" class="textbox">
									<p>You know that Leonardo Da Vinci and Bramante joined to build the Castello Sforzesco.</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>This is the symbolic architecture of the Renaissance era in the 15th century.</p>
								</div>
								<div id="textbox3" class="textbox">
									<p>It's created by Lord Francesco Sforza,</p>
								</div>
								<div id="textbox4" class="textbox">
									<p>Nowadays, it is used as museum and art gallery.</p>
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
						<a href="#page27" id="go_page27" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<audio class="audio1" src="../tts/day1/023.mp3"></audio>
					<audio class="audio2" src="../tts/day1/024.mp3"></audio>
					<audio class="audio3" src="../tts/day1/025.mp3"></audio>
					<audio class="audio4" src="../tts/day1/026.mp3"></audio>
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
									<p>It’s not only built in a huge scale, but its overall condition also has been kept so well.</p>
								</div>							
							</div>
							<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="imgwrap">
							<img src="../images/person/james_4_2.png" alt="james">
						</div>
						<a href="#page28" id="go_page28" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<audio class="audio1" src="../tts/day1/027.mp3"></audio>
				</section>

				<section data-role="page" id="page28" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="../images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
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
							<div class="text">	
								<p>It’s thrilling to watch these great architectures. And, so it is to be looking at this ‘i30’s cool design.</p>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
					</div>
					<audio class="audio1" src="../tts/day1/028.mp3"></audio>
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
						<div class="toggle">
							<div class="imgwrap">
								<?php if($LMS_IMAGE) { ?> 
									<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
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
									<p>The cascading grille emphasizes the sporty look even more and the enlarged emblem is integrated with the radar for smart safety features.</p>
								</div>	
								<div id="textbox2" class="textbox">
									<p>Especially, the outline of the grille is very sophisticated and personally my favorite part. of the design.</p>
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
					<audio class="audio1" src="../tts/day1/tom/005.mp3"></audio>
					<audio class="audio2" src="../tts/day1/tom/006.mp3"></audio>
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
					<div data-role="main" class="ui-content">
						<div class="img_twinkle">
							<img id="img1" src="../images/day1/52_draw-mark.png" alt="">
							<!-- <img id="img2" src="../images/day1/49_i30_block.png" alt=""> -->
						</div>
						<a href="#page32" class="next_finger">
						 <img src="../images/button/touchfinger_@3x.png" alt="next button">
						</a>

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
									<p>Let’s draw the side character line of the i30.</p>
								</div>	
							</div>
						</div>
						<div class="imgwrap">
							<div class="drawSlider">
								<!-- <img src="../images/day1/51_brush.png" alt=""> -->
							</div>
							<div class="newline">
								<img src="../images/day1/52_draw-mark.png" alt="">
							</div>
						</div>
						<a href="#page33" id="go_page33" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
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
						<div class="toggle">
							<div class="imgwrap">
								<?php if($LMS_IMAGE) { ?> 
									<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
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
									<p>No doubt it’s a compact car but  it looks very slim! The extended hood length and the character line across the side body makes the car look longer.</p>
								</div>
							</div>
						</div>
						<a href="#page34" id="go_page34" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<audio class="audio1" src="../tts/day1/tom/007.mp3"></audio>
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
						<div class="toggle">
							<div class="imgwrap">
								<?php if($LMS_IMAGE) { ?> 
									<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
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
									<p>The spoiler contains LED brake light, and the dual tip mufflers is a unique point compared to other cars. My design taste is much better than Golf.</p>
								</div>
							</div>
						</div>
						<a href="#page37" id="go_page37" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<audio class="audio1" src="../tts/day1/tom/008.mp3"></audio>
				</section>

				<!-- <section data-role="page" id="page36" class="container">
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
				</section> -->

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
					<audio class="audio1" src="../tts/day1/029.mp3"></audio>
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
									<p>We gotta hurry before the dawn.</p>
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
					<audio class="audio1" src="../tts/day1/030.mp3"></audio>
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
								<?php if($LMS_IMAGE) { ?> 
									<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
								<?php } else { ?>
									<img src="../images/intro/login_profile_@3x.png" alt="james">
								<?php } ?>
							</div>	
								<div id="textbox1" class="textbox">
									<p>It’s getting dark now, I heard i30 has Full LED headlights that give much brighter view ahead.</p>
								</div>		
							</div>
						</div>
						<a href="#page40" id="go_page40" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<audio class="audio1" src="../tts/day1/tom/009.mp3"></audio>
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
						<div class="toggle">
							<div class="imgwrap">
								<?php if($LMS_IMAGE) { ?> 
									<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
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
									<p>Yeah, it’s really bright. It lets me see  much further, and High Beam Assist also makes it no problem to drive in mountain road.</p>
								</div>
							</div>
						</div>
						<a href="#page41" id="go_page41" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<audio class="audio1" src="../tts/day1/tom/010.mp3"></audio>
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
							<div class="text">	
								<p>It’s a bit late already, so we will stay a night here in hostel.</p>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<a href="#page42" id="go_page42" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<audio class="audio1" src="../tts/day1/032.mp3"></audio>
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
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>Okay, good night . I'll see you tomorrow.</p>
								</div>
							</div>
							<a href="#page43" id="go_page43" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
					<audio class="audio1" src="../tts/day1/033.mp3"></audio>
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
						<!--<div class="textwrap">
							
							 <div class="text_w">	
								<p>Waking up James</p>
							</div> 
						</div>-->	
						<a href="#page44"><div class="imgwrap">
							<img id="waking" src="../images/day1/alarm.gif" alt="">
							<!-- <img id="waking2" src="../images/day1/icon_waking_2.png" alt=""> -->
							<img src="../images/day1/btn_wakingup.png" alt="">
						</div>
						</a>
						<a href="#page44" class="next_finger">
							<img src="../images/button/touchfinger_@3x.png" alt="next button">
						</a>
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
							<img src="../images/person/james_6.png" alt="james">
						</div>
						<a href="#page45" id="go_page45" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<audio class="audio1" src="../tts/day1/034.mp3"></audio>
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
					<audio class="audio1" src="../tts/day1/035.mp3"></audio>
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
						<div class="toggle">
							<div class="imgwrap">
								<?php if($LMS_IMAGE) { ?> 
									<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
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
									<p>Actually, there are five options for the  interior color and you chose the red one. Shall we check out the rest of the colors available?</p>
								</div>
							</div>
						</div>
						<a href="#page47" id="go_page47" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<audio class="audio1" src="../tts/day1/tom/011.mp3"></audio>
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
						<div class="toggle">
							<div class="imgwrap">
								<?php if($LMS_IMAGE) { ?> 
									<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
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
									<p>Strong <strong>Red</strong> color that makes a good contrast with the black leather.</p>
								</div>	
								<div id="textbox2" class="textbox">
									<p><strong>Black</strong> fabric and leather fill the interior with a modern look</p>
								</div>
								<div id="textbox3" class="textbox">
									<p>Leather point in <strong>Gray</strong> color gives the interior a simple image.</p>
								</div>
								<div id="textbox4" class="textbox">
									<p><strong>Indigo blue</strong>  color that is reminiscent of youth and liveliness.</p>
								</div>
								<div id="textbox5" class="textbox">
									<p><strong>Glam burgundy</strong>  interior for an elegant and bright touch.</p>
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
					<audio class="audio1" src="../tts/day1/tom/012.mp3"></audio>
					<audio class="audio2" src="../tts/day1/tom/013.mp3"></audio>
					<audio class="audio3" src="../tts/day1/tom/014.mp3"></audio>
					<audio class="audio4" src="../tts/day1/tom/015.mp3"></audio>
					<audio class="audio5" src="../tts/day1/tom/016.mp3"></audio>
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
									<p>Pick an interior color you like the best.</p>
								</div>	
							</div>
						</div>
						<!-- 여창민 대리 추가 (2017-03-30) : 시작 -->
						
						<?php
							$sql = "SELECT COUNT(*) AS COLOR_CNT FROM HD_PD_CHOICE_INFO WHERE LMS_SEQ = :LMS_SEQ AND PD_GUBUN = 1";
							$stmt = $dbh->prepare($sql);
							$stmt->bindParam(':LMS_SEQ',$_SESSION["HY_LMS_SEQ"]);
							$stmt->execute();
							$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
							if($row[0]["COLOR_CNT"] > 0 ){
								$MODE = "Modify";
							}else{
								$MODE = "Insert";
							}
						?>
						<input type="hidden" id="COLOR_MODE" name="COLOR_MODE" value="<?=$MODE?>">
						<div class="imgwrap">
							<ul class="choice_color">
								<a href="#page49" id="ch1" onclick="choice_color('1')"><li><img src="../images/day1/78_btn_01.png" alt=""></li></a>
								<a href="#page49" id="ch2" onclick="choice_color('2')"><li><img src="../images/day1/78_btn_02.png" alt=""></li></a>
								<a href="#page49" id="ch3" onclick="choice_color('3')"><li><img src="../images/day1/78_btn_03.png" alt=""></li></a>
								<a href="#page49" id="ch4" onclick="choice_color('4')"><li><img src="../images/day1/78_btn_04.png" alt=""></li></a>
								<a href="#page49" id="ch5" onclick="choice_color('5')"><li><img src="../images/day1/78_btn_05.png" alt=""></li></a>
							</ul>
						</div>
						<!-- 여창민 대리 추가 (2017-03-30) : 끝 -->
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
								<?php if($LMS_IMAGE) { ?> 
									<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
								<?php } else { ?>
									<img src="../images/intro/login_profile_@3x.png" alt="james">
								<?php } ?>
							</div>	
								<div id="textbox1" class="textbox">
									<p>I like the red interior that has sporty red point of sport car concept.</p>
								</div>		
								 <div id="textbox2" class="textbox">
									<p>I prefer the chic mood of whole black interior.</p>
								</div>
								<div id="textbox3" class="textbox">
									<p>Gray is the color that I won’t regret for a long time, so I would go for gray interior.</p>
								</div>
								<div id="textbox4" class="textbox">
									<p>As I’m more of an urban person, I love the indigo blue interior.</p>
								</div>
								<div id="textbox5" class="textbox">
									<p>I like the glam burgundy interior because burgundy obviously is a unique color point.</p>
								</div> 
							</div>
						</div>
						<a href="#page50" id="go_page50" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<audio class="audio1" src="../tts/day1/tom/017.mp3"></audio>
					<audio class="audio2" src="../tts/day1/tom/018.mp3"></audio>
					<audio class="audio3" src="../tts/day1/tom/019.mp3"></audio>
					<audio class="audio4" src="../tts/day1/tom/020.mp3"></audio>
					<audio class="audio5" src="../tts/day1/tom/021.mp3"></audio>
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
									<p>The result for most liked i30 interior colors.</p>
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
					<a href="#page5001" id="go_page5001" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
				</section>

				<section data-role="page" id="page5001" class="container">
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
									<p>Whatever the others say, my favorite is red. It took me a week to decide.</p>
								</div>
							</div>
							<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="imgwrap">
							<img src="../images/person/james_7.png" alt="james">
						</div>
						<a href="#page51" id="go_page51" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<audio class="audio1" src="../tts/day1/036.mp3"></audio>
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
									<p>Now, let’s take a look at Lago di Como, the best leisure spot in Italy.</p>
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
					<audio class="audio1" src="../tts/day1/037.mp3"></audio>
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
									<p>Lago di Como became more famous after George Clooney and John Legend did their weddings there.</p>
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
					<audio class="audio1" src="../tts/day1/038.mp3"></audio>
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
									<p>Lago di Como has also been a well-known place for vacation in Europe for a long time.</p>
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
					<audio class="audio1" src="../tts/day1/039.mp3"></audio>
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
							<div class="text_img2">
								<img src="../images/person/day2_james.png" alt="james">
							</div>	
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>From the medieval era, lots of lords and artist chose Lago di Como for the leisure.</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>It’s just so beautiful here.</p>
								</div>
								<div id="textbox3" class="textbox">
									<p>Just like one in a fairy tale, isn’t it?</p>
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
						</div>
						<a href="#page55" id="go_page55" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<audio class="audio1" src="../tts/day1/040.mp3"></audio>
					<audio class="audio2" src="../tts/day1/041.mp3"></audio>
					<audio class="audio3" src="../tts/day1/042.mp3"></audio>
					<audio class="audio4" src="../tts/day1/043.mp3"></audio>
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
									<p>Okay let’s move on to the next stop.</p>
								</div>
							</div>
							<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="imgwrap">
							<img src="../images/person/james_7.png" alt="james">
						</div>
						<a href="javascript:;" id="go_page56" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<audio class="audio1" src="../tts/day1/044.mp3"></audio>
				</section>


				<!-- <div id="landscape_popup" class="landscape_popup">
				<a href="#" class="layer_landscape">
					<div class="box">
						<img class="icon-device" src="../images/icon_phonerotation_@3x.png" alt="">
						<p>Turn the screen to landscape.</p>
						<p class="ok_btn">OK</p>
					</div>
				</a>
			</div> -->

	<!-- 여창민 대리 추가 (2017-03-30) : 시작 -->
	<input type="hidden" id="SESSION_LMS_SEQ" name="SESSION_LMS_SEQ" value="<?=$_SESSION["HY_LMS_SEQ"]?>">
	<!-- 여창민 대리 추가 (2017-03-30) : 끝 -->


	</div>
</div>
		<!-- <a href="#page14">이동</a> -->

	</body>
</html>