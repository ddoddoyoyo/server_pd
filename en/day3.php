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
		<!-- <link rel="stylesheet" href="../css/styles.css"> -->
		<link rel="stylesheet" href="/pd/css/styles_day3.css">
		<link rel="stylesheet" href="/pd/css/menu.css">
		<!-- <link rel="stylesheet" href="/pd/css/day3.css"> -->
		<link rel="stylesheet" href="/pd/css/Nwagon.css">
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
		<script src="/pd/js/jquery.ui.touch-punch.min.js"></script>
		<script src="/pd/js/jquery.incremental-counter.js"></script>
		<script src="/pd/js/jquery.animateNumber.min.js"></script>
		<script src="/pd/js/jquery-ui.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
		<script src="/pd/js/device.js"></script>
		<script src="/pd/js/day3.js"></script>
		<script src="../js/menu_test.js"></script>
		<script src="/pd/js/Nwagon.js"></script>
		<script src="/pd/common/js/common.js"></script>
		<script>
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
		});
		</script>


		
<script>
/**/
var options = {
	'legend':{
		names: [],
		hrefs: []
			},
	'dataset': {
		title: 'Web accessibility status',
		values: [[66,77,22,99,33]],
		bgColor: '#f9f9f9',
		fgColor: '#0f76c0'
	},
	'chartDiv': 'page39Chart',
	'chartType': 'radar',
	'chartSize': {width:600, height:300}
};
	
</script>


	</head>
	<body>
		<div id="wrap">
			<div id="contBox" class="container">

				<section data-role="page" id="pageStart" class="container">
					<div data-role="main" class="ui-content">
						<div class="imgwrap">
							<img src="/pd/images/day3/01_photo.jpg" alt="car" >
						</div>
						<div class="textwrap">
							<div class="text">
								<div id="textbox1" class="textbox">
									<h1>Day3.</h1>
									<div class="img_wrap">
										<img src="/pd/images/button/08_point.png" alt="location point">
										<img src="/pd/images/button/08_lodeline.png" alt="location">
										<p class="p1">Bern</p>
										<p class="p2">Strasbourg</p>
									</div>
									<ul>
										<li>Aerdynamic</li>
										<li>Turbo engine</li>
										<li>Best Class Legroom</li>
										<li>ADAS</li>
										<li>Remote Window Control</li>
									</ul>
								</div>
								<a href="#page0" id="go_page0" class="next_p_btn ui-btn go-next">
									<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
								</a>
							</div>
						</div>
					</div>
				</section>

				<section data-role="page" id="page0" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div class="page_bg">
						<img src="/pd/images/day3/02_bg_map_2.jpg" alt="bern_map_2" />
					</div>
					<a href="#page1" class="next_finger">
						<img src="/pd/images/button/touchfinger_@3x.png" alt="next button">
					</a>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div id="textbox0_1" class="textbox">
									<p>So, shall we carry on to the next stop?</p>
								</div>
								<div id="textbox0_2" class="textbox">
									<p>It's actually 4th biggest and the capital city of Switzerland, which is the Bern.</p>
								</div>
								<div id="textbox0_3" class="textbox">
									<p>Touch the Bern on the map.</p>
								</div>
								<div class="btn_box">
									<a href="#" id="go_next1" class="text_btn_l">
										<img src="/pd/images/button/btn_next_talk_arrow_2.png" alt="next button">
									</a>
									<a href="#" id="go_back" class="text_btn_r">
										<img src="/pd/images/button/btn_next_talk_arrow_1.png" alt="next button">
									</a>
								</div>
							</div>
							<div class="text_tip"><img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="imgwrap">
							<img src="/pd/images/person/james_14.png" alt="james">
						</div>
					</div>
				</section>

				<section data-role="page" id="page1" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div id="textbox1" class="textbox">
									<p>We need to take a Express way A1 to get to Bern.<br />
									So that will be a high speed driving.<br />
									I'm pretty nervous now.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<a href="#page2" id="go_page2" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page2" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div id="textbox1" class="textbox">
									<p>i30's stability and fuel efficiency is quite good even on high speed driving.<br />
									I heard that there was an improvement on aerodynamics.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<a href="#page3" id="go_page3" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page3" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="img_twinkle" id="img_twinkle3_1">
							<img src="/pd/images/day3/05_image_overlay.jpg" alt="">
						</div>
						<div class="img_twinkle" id="img_twinkle3_2">
							<img src="/pd/images/day3/06_image_overlay.jpg" alt="">
						</div>
						<div class="img_twinkle" id="img_twinkle3_3">
							<img src="/pd/images/day3/07_image_overlay.jpg" alt="">
						</div>
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
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">
								<div id="textbox3_1" class="textbox">
									<p>First, the rear spoiler and side garnish is applied to optimize the air flow.</p>
								</div>
								<div id="textbox3_2" class="textbox">
									<p>The improve the swirl on A-pillar part, side moulding is applied on boy side of windshield</p>
								</div>
								<div id="textbox3_3" class="textbox">
									<p>A wheel air-curtain minimize the air flow and resistance on high speed driving.</p>
								</div>
								<div id="textbox3_4" class="textbox">
									<p>By the way, do you know the entire coefficient dynamics figure of i30?</p>
								</div>
								<div class="btn_box">
									<a href="#" id="go_next1" class="text_btn_l">
										<img src="/pd/images/button/btn_next_talk_arrow_2.png" alt="next button">
									</a>
									<a href="#" id="go_back" class="text_btn_r">
										<img src="/pd/images/button/btn_next_talk_arrow_1.png" alt="next button">
									</a>
								</div>
							</div>
						</div>
						<a href="#page4" id="go_page4" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page4" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="imgwrap">
							<div class="graphQuantity4 graphLegend4">
								<div>0.30</div>
								<div>0.30</div>
								<div>0.31</div>
								<div>0.33</div>
							</div>
							<ul class="graph4">
								<li class="graph4_1">
									<div class="graphObj"></div>
								</li>
								<li class="graph4_2">
									<div class="graphObj"></div>
								</li>
								<li class="graph4_3">
									<div class="graphObj"></div>
								</li>
								<li class="graph4_4">
									<div class="graphObj"></div>
								</li>
							</ul>
							<div class="graphLegend4">
								<div><img src="/pd/images/day3/09_title_i30.png" /></div>
								<div>VW<br />Golf</div>
								<div>Peugeot<br />308</div>
								<div>Ford<br />Focus</div>
							</div>
						</div>
						<div class="titlewrap">
							<div class="text_i">
								<div id="textbox1">
									<p>Cd Comparison</p>
								</div>	
							</div>
						</div>
						<div class="textwrap">
							<div class="text_img2">
								<img src="/pd/images/person/day3_james.png" alt="james">
							</div>	
							<div class="text_tip">
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>	
							<div class="text">
								<div id="textbox1" class="textbox">
									<p>You mean the Cd figure right?<br />
									Yeah, I know it.</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>It's 0.3, and  I heard the smaller number is good and i30 has lowest figure on it's class.</p>
								</div>
								<div class="btn_box">
									<a href="#" id="go_next1" class="text_btn_l">
										<img src="/pd/images/button/btn_next_talk_arrow_2.png" alt="next button">
									</a>
									<a href="#" id="go_back" class="text_btn_r">
										<img src="/pd/images/button/btn_next_talk_arrow_1.png" alt="next button">
									</a>
								</div>
							</div>
						</div>
						<a href="#page5" id="go_page5" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page5" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div id="textbox5_1" class="textbox">
									<p>Don't you think it's too quiet even we're running on the highway?</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<a href="#page6" id="go_page6" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page6" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="imgwrap">
							<div class="graphDesc">30%<br /><span>decrease</span></div>
							<div class="graphLegend6">
								<div><img src="/pd/images/day3/11_title_current-i30.png" /></div>
								<div><img src="/pd/images/day3/09_title_i30.png" /></div>
								<div>VW<br />Golf</div>
							</div>
							<ul class="graph6">
								<li class="graph6_1">
									<div class="graphObj"><img src="/pd/images/day3/11_graph_01.png" /></div>
									<div class="graphText">418</div>
								</li>
								<li class="graph6_2">
									<div class="graphObj"><img src="/pd/images/day3/11_graph_02.png" /></div>
									<div class="graphText graphTextEm">314</div>
								</li>
								<li class="graph6_3">
									<div class="graphObj"><img src="/pd/images/day3/11_graph_03.png" /></div>
									<div class="graphText">339</div>
								</li>
							</ul>
						</div>
						<div class="imgwrap2">
							<div class="panel panelTitle">
								<div><img src="/pd/images/day3/11_title_current-i30.png" /></div>
								<div><img src="/pd/images/day3/09_title_i30.png" /></div>
							</div>
							<div class="panel panelImg">
								<div><img src="/pd/images/day3/12_vehicle_overlay_left.png" /></div>
								<div><img src="/pd/images/day3/12_vehicle_overlay_right.png" /></div>
							</div>
							<div class="panel panelTitle">
								<div>Multiple pieces</div>
								<div>Unified panel</div>
							</div>
						</div>
						<!-- <div class="pageTitle">Minimized number of parts</div> -->
						<div class="titlewrap">
							<div class="text_i">
								<div id="textbox1">
									<p>Minimized number of parts</p>
								</div>	
							</div>
						</div>
						<div class="toggle">
							<div class="profilewrap">
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
						<!-- <div class="profilewrap">
							<?php if($LMS_IMAGE) { ?> 
									<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
							<?php } else { ?>
								<img src="../images/intro/login_profile_@3x.png" alt="james">
							<?php } ?>
						</div> -->
						<div class="textwrap">
							<div class="text_tip">
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">
								<div id="textbox6_1" class="textbox">
									<p>That's the effect of aerodynamics,<br />and also minimized the number of parts used about 30%.</p>
								</div>
								<div id="textbox6_2" class="textbox">
									<p>Lastly, integral panel is applied to improve fundamental noise.</p>
								</div>
								<div class="btn_box">
									<a href="#" id="go_next1" class="text_btn_l">
										<img src="/pd/images/button/btn_next_talk_arrow_2.png" alt="next button">
									</a>
									<a href="#" id="go_back" class="text_btn_r">
										<img src="/pd/images/button/btn_next_talk_arrow_1.png" alt="next button">
									</a>
								</div>
							</div>
						</div>
						<a href="#page7" id="go_page7" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page7" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div id="textbox7_1" class="textbox">
									<p>Oh, that's why I felt silent on high speed also. Because there is less wind noise.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<a href="#page8" id="go_page8" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page8" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div id="textbox8_1" class="textbox">
									<p>Do you know about the i30 engines?<br />
									There were 3 line-up on engines, and I chose 1.6 T-GDI.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<a href="#page9" id="go_page9" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page9" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<!-- <div class="pageTitle">Verify the engines</div> -->
						<div class="titlewrap">
							<div class="text_i">
								<div id="textbox1">
									<p>Verify the engines</p>
								</div>	
							</div>
						</div>
						<div class="imgwrap">
							<div class="engine">
								<img src="/pd/images/day3/15_btn_01.png" alt="0" />
								<img src="/pd/images/day3/15_btn_02.png" alt="1" />
								<img src="/pd/images/day3/15_btn_03.png" alt="2" />
							</div>
						</div>
						<a href="javascript:;" id="go_page10" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page10" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<!-- <div class="pageTitle">Result</div> -->
						<div class="titlewrap">
							<div class="text_i">
								<div id="textbox1">
									<p>Verify the engines</p>
								</div>	
							</div>
						</div>
						<div class="imgwrap">
							<div class="graphLegend10">
								<div>NU 2.0 GDI</div>
								<div>GAMMA 1.6 T-GDI</div>
								<div>U2 1.6 VGT</div>
							</div>
							<ul class="graph10">
								<li>
									<div class="graphObj" alt="30">30%</div>
									<div class="graphText"></div>
								</li>
								<li>
									<div class="graphObj large" alt="50">50%</div>
									<div class="graphText large"></div>
								</li>
								<li>
									<div class="graphObj" alt="20">20%</div>
									<div class="graphText"></div>
								</li>
							</ul>
						</div>
						<a href="#page11" id="go_page11" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page11" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div id="textbox11_1" class="textbox">
									<p>My choice was <span>1.6 T-GDI</span>.<br />
									It's most powerful engine on the line-up so I'm satisfied.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<a href="#page12" id="go_page12" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page12" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div id="textbox12_1" class="textbox">
									<p>Here we're running on A1 express way.<br />
									This is the fastest way to reach Bern.</p>
								</div>
								<div id="textbox12_2" class="textbox">
									<p>I feel a bit tired maybe because of long time driving.<br />
									But not that bad as I expected. I guess the reason would be roomy space.</p>
								</div>
								<div class="btn_box">
									<a href="#" id="go_next1" class="text_btn_l">
										<img src="/pd/images/button/btn_next_talk_arrow_2.png" alt="next button">
									</a>
									<a href="#" id="go_back" class="text_btn_r">
										<img src="/pd/images/button/btn_next_talk_arrow_1.png" alt="next button">
									</a>
								</div>
							</div>
							<div class="text_tip">
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<a href="#page13" id="go_page13" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page13" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="imgwrap">
							<div class="car13"><img src="/pd/images/day3/23_image.png" alt="" /></div>
							<table class="table13">
								<tr>
									<th><img src="/pd/images/day3/23_title_01_i30.png" alt=""></th>
									<th></th>
									<th><img src="/pd/images/day3/23_title_02_golf.png" alt=""></th>
								</tr>
								<tr>
									<td>994mm</td>
									<td><img src="/pd/images/day3/23_numbering.png" alt="" /></td>
									<td>981mm</td>
								</tr>
							</table>
						</div>
						<a href="#" class="next_finger ui-link"><img src="/pd/images/button/touchfinger_@3x.png" alt="next button"></a>
						<a href="#page14" id="go_page14" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page14" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div id="textbox14_1" class="textbox">
									<p>A sporty interior and spacious interior. i30 combines all the benefits, right?<br />
									Compare to the competitors, i30 is most spacious.</p>
								</div>
							</div>
							<div class="text_tip"><img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="imgwrap">
							<?php if($LMS_IMAGE) { ?> 
									<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
							<?php } else { ?>
								<img src="../images/intro/login_profile_@3x.png" alt="james">
							<?php } ?>
						</div>
						<a href="#page15" id="go_page15" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page15" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div id="textbox15_1" class="textbox">
									<p>Maybe that's why I feel interior is spacious than other cars.</p>
								</div>
							</div>
							<div class="text_tip"><img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<a href="#page16" id="go_page16" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page16" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div id="textbox16_1" class="textbox">
									<p>Here we are reaching Bern.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<a href="#page17" id="go_page17" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page17" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div class="page_bg"></div>
					<a href="#" class="next_finger">
						<img src="/pd/images/button/touchfinger_@3x.png" alt="next button">
					</a>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div id="textbox17_1" class="textbox">
									<p>This clock tower is the landmark of the Bern.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="view_text">
							<a href="#page18"><p>Bern, Zytglogge</p></a>
							<a href="#page18" id="go_page18" class="next_p_btn ui-btn go-next">
								<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
							</a>
						</div>
					</div>
				</section>

				<section data-role="page" id="page18" class="container">
				<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div class="page_bg"></div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text_img2">
								<img src="/pd/images/person/day3_james.png" alt="james">
							</div>	
							<div class="text_tip">
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>	
							<div class="text">
								<div id="textbox18_1" class="textbox">
									<p>Bern means the city of bear, and this old town is registered as UNESCO World Heritage.</p>
								</div>
								<div id="textbox18_2" class="textbox">
									<p>It's keeping a mood of original medieval age and it's history.</p>
								</div>
								<div id="textbox18_3" class="textbox">
									<p>Especially on noon, this clock tower show is very famous.<br />
									Shall we wait here and see?</p>
								</div>
								<div class="btn_box">
									<a href="#" id="go_next1" class="text_btn_l">
										<img src="/pd/images/button/btn_next_talk_arrow_2.png" alt="next button">
									</a>
									<a href="#" id="go_back" class="text_btn_r">
										<img src="/pd/images/button/btn_next_talk_arrow_1.png" alt="next button">
									</a>
								</div>
							</div>
						</div>
						<a href="#page19" id="go_page19" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page19" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="imgwrap">
							<?php if($LMS_IMAGE) { ?> 
									<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
							<?php } else { ?>
								<img src="../images/intro/login_profile_@3x.png" alt="james">
							<?php } ?>
						</div>
						<div class="textwrap">
							<div class="text_tip">
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">
								<div id="textbox19_1" class="textbox">
									<p>We can't miss the famous rose park in Bern also.<br>
									Let's take a look here as well.</p>
								</div>
							</div>
						</div>
						<a href="#page20" id="go_page20" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page20" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div id="textbox20_1" class="textbox">
									<p>This blooming rose garden is so beautiful.<br />
									I feel relaxed here.</p>
								</div>
							</div>
							<div class="text_tip"><img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="imgwrap">
							<img src="/pd/images/day3/james_16.png" alt="james">
						</div>
						<a href="#page21" id="go_page21" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page21" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div class="page_bg"></div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text_img2">
								<img src="/pd/images/person/day3_james.png" alt="james">
							</div>	
							<div class="text_tip">
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>	
							<div class="text">
								<div id="textbox21_1" class="textbox">
									<p>Did you have fun in Bern?<br />
									then we gotta move on the our final destination, Strasbourg.</p>
								</div>
							</div>
						</div>
						<a href="#page22" id="go_page22" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page22" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div id="textbox22_1" class="textbox">
									<p>Here we're on the way to Strasbourg.<br />
									You see the sunset through panorama sunroof?<br />
									This is amazing.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<a href="#page23" id="go_page23" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page23" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="imgwrap">
							<?php if($LMS_IMAGE) { ?> 
									<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
							<?php } else { ?>
								<img src="../images/intro/login_profile_@3x.png" alt="james">
							<?php } ?>
						</div>
						<div class="textwrap">
							<div class="text_tip">
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">
								<div id="textbox23_1" class="textbox">
									<p>i30's sunroof is panorama type so assessment of openness is awesome. Even comparable to the convertible cars.</p>
								</div>
							</div>
						</div>
						<a href="#page24" id="go_page24" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page24" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div id="textbox20_1" class="textbox">
									<p>Look! I think we almost reached Strasbourg.</p>
								</div>
							</div>
							<div class="text_tip"><img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="imgwrap">
							<img src="/pd/images/day3/james_17.png" alt="james">
						</div>
						<a href="#page25" id="go_page25" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page25" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div id="textbox25_1" class="textbox">
									<p>So, shall we take a look?</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<a href="#page26" id="go_page26" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page26" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div id="textbox1" class="textbox">
									<p>This is the final stop of our journey, Strasbourg.<br />
									Strasbourg is located on west side of Rhine river so developed with Canal.<br /></p>
								</div>
								<div id="textbox2" class="textbox">
									<p>And it has a beautiful le petit French houses.</p>
								</div>
								<div class="btn_box">
									<a href="#" id="go_next1" class="text_btn_l">
										<img src="/pd/images/button/btn_next_talk_arrow_2.png" alt="next button">
									</a>
									<a href="#" id="go_back" class="text_btn_r">
										<img src="/pd/images/button/btn_next_talk_arrow_1.png" alt="next button">
									</a>
								</div>
							</div>
							<div class="text_tip">
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<a href="#page27" id="go_page27" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page27" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
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
								<div id="textbox27_1" class="textbox">
									<p>Wow, Watch out.<br />
									You gotta stick to front sight, we were nearly hit something.</p>
								</div>
							</div>
						</div>
						<a href="#page28" id="go_page28" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<div class="imgwrap img_twinkle">
						<img src="/pd/images/day3/43_photo.jpg" alt="james" />
					</div>
				</section>

				<section data-role="page" id="page28" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
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
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">
								<div id="textbox28_1" class="textbox">
									<p>The AEB system of i30 is detecting the frontal sight through radar so that monitoring pedestrian or any object in case to prevent the crash.<br />
									It's high-tech feature that brakes automatically when there is an accidental situation.</p>
								</div>
							</div>
						</div>
						<a href="#page29" id="go_page29" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page29" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div id="textbox25_1" class="textbox">
									<p>Fortunately, i30 escaped well. Is there any other high-tech features on i30?</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<a href="#page30" id="go_page30" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page30" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
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
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">
								<div id="textbox30_1" class="textbox">
									<p>With sensing the distance between front car, even driver is not pushing the acceleration or brake pedal, it's driving on driver's setting demand with keeping the constant distance between front car.</p>
								</div>
							</div>
						</div>
						<a href="#page31" id="go_page31" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page31" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div id="textbox31_1" class="textbox">
									<p>With ASCC, you can drive more comfortably. But this is not a fully automated driving, so you gotta be careful.</p>
								</div>
							</div>
							<div class="text_tip"><img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="imgwrap">
							<?php if($LMS_IMAGE) { ?> 
									<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
							<?php } else { ?>
								<img src="../images/intro/login_profile_@3x.png" alt="james">
							<?php } ?>
						</div>
						<a href="#page32" id="go_page32" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page32" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
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
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">
								<div id="textbox32_1" class="textbox">
									<p>With sensing the distance between front car, even driver is not pushing the acceleration or brake pedal, it's driving on driver's setting demand with keeping the constant distance between front car.</p>
								</div>
							</div>
						</div>
						<a href="#page33" id="go_page33" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page33" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div id="textbox33_1" class="textbox">
									<p>It's a piece of cake with LKAS to keeping the lane safely.</p>
								</div>
							</div>
							<div class="text_tip"><img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="imgwrap">
							<?php if($LMS_IMAGE) { ?> 
									<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
							<?php } else { ?>
								<img src="../images/intro/login_profile_@3x.png" alt="james">
							<?php } ?>
						</div>
						<a href="#page34" id="go_page34" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page34" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
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
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">
								<div id="textbox34_1" class="textbox">
									<p>BSD senses and ringing alert in case of crash. There is a radar in rear bumper that senses the approaching car from blind spot, and transporting informations.</p>
								</div>
							</div>
						</div>
						<a href="#page35" id="go_page35" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page35" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div id="textbox35_1" class="textbox">
									<p>BSD loaded car will be helpful for changing lane or watching blind spot.</p>
								</div>
							</div>
							<div class="text_tip"><img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="imgwrap">
							<?php if($LMS_IMAGE) { ?> 
									<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
							<?php } else { ?>
								<img src="../images/intro/login_profile_@3x.png" alt="james">
							<?php } ?>
						</div>
						<a href="#page36" id="go_page36" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page36" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
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
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">
								<div id="textbox36_1" class="textbox">
									<p>DAA is the function for careless driving. It analyze the driving pattern and car location.</p>
								</div>
								<div id="textbox36_2" class="textbox">
									<p>so if driver feels tired or driving carelessly, there will be a pop up on cluster with warning sign to induce for taking a rest.</p>
								</div>
								<div id="textbox36_3" class="textbox">
									<p>Take a look if there is DAA sign on the cluster.</p>
								</div>
								<div class="btn_box">
									<a href="#" id="go_next1" class="text_btn_l">
										<img src="/pd/images/button/btn_next_talk_arrow_2.png" alt="next button">
									</a>
									<a href="#" id="go_back" class="text_btn_r">
										<img src="/pd/images/button/btn_next_talk_arrow_1.png" alt="next button">
									</a>
								</div>
							</div>
						</div>
						<a href="#page37" id="go_page37" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page37" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						
							<div class="textwrap">	
								<div class="text">	
									<div id="textbox1" class="textbox">
										<p>I'm impressed that these loads of features are applied to this class car.<br />
										I'm falling in love deeply.</p>
									</div>
								</div>
								<div class="text_tip"><img src="/pd/images/button/tail_3_@3x.png" alt="text box">
								</div>
							</div>
							<div class="imgwrap">
								<img src="/pd/images/person/james_18.png" alt="james">
							</div>
							<a href="#page38" id="go_page38" class="next_p_btn ui-btn go-next">
								<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
							</a>
						
					</div>
				</section>

				<section data-role="page" id="page38" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="pageTitle">Which one is your favorite high-tech feature?</div>
						<div class="textwrap">
							<ul>
								<li><span>LKAS</span></li>
								<li><span>BSD</span></li>
								<li><span>ASCC</span></li>
								<li><span>DAA</span></li>
								<li><span>AEB</span></li>
							</ul>
						</div>
					</div>
				</section>

				<section data-role="page" id="page39" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div id="page39Chart" class="page_bg"></div>
					<div class="page_bg" style='background-image:url(/pd/images/day3/63_result_graph.png); background-size:100% auto;'>
						<div id="page39ChartNum1" class="page39ChartNum">33%</div>
						<div id="page39ChartNum2" class="page39ChartNum">66%</div>
						<div id="page39ChartNum3" class="page39ChartNum">77%</div>
						<div id="page39ChartNum4" class="page39ChartNum">22%</div>
						<div id="page39ChartNum5" class="page39ChartNum">99%</div>
					</div>
					<div data-role="main" class="ui-content">
						<!-- <div class="pageTitle">Result</div> -->
						<div class="titlewrap">
							<div class="text_i">
								<div id="textbox1">
									<p>Result</p>
								</div>	
							</div>
						</div>
						<a href="#page40" id="go_page40" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page40" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div id="textbox40_1" class="textbox">
									<p>The i30 is equipped with the best-in-class safety systems to help drivers get maximum comfort and safety!</p>
								</div>
							</div>
							<div class="text_tip"><img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="imgwrap">
							<?php if($LMS_IMAGE) { ?> 
									<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
							<?php } else { ?>
								<img src="../images/intro/login_profile_@3x.png" alt="james">
							<?php } ?>
						</div>
						<a href="#page41" id="go_page41" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page41" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div class="page_bg"></div>
					<a href="#" class="next_finger">
						<img src="/pd/images/button/touchfinger_@3x.png" alt="next button">
					</a>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div id="textbox41_1" class="textbox">
									<p>Here we are at Notre-dame cathedral.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="view_text">
							<a href="#page42"><p>Strasbourg, Notre-dame cathedral</p></a>
							<a href="#page42" id="go_page42" class="next_p_btn ui-btn go-next">
								<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
							</a>
						</div>
					</div>
				</section>

				<section data-role="page" id="page42" class="container">
				<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div class="page_bg"></div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text_img2">
								<img src="/pd/images/person/day3_james.png" alt="james">
							</div>	
							<div class="text_tip">
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>	
							<div class="text">
								<div id="textbox42_1" class="textbox">
									<p>Notre-dame cathedral is located in the middle of old town, and registered as UNESCO World Heritage in 1988.</p>
								</div>
								<div id="textbox42_2" class="textbox">
									<p>It took 350 years for fully construct so it shows a magnificent view.</p>
								</div>
								<div id="textbox42_3" class="textbox">
									<p>Yeah, personally Notre-dame here is more picturesque than the Notre-dame in Paris.</p>
								</div>
								<div class="btn_box">
									<a href="#" id="go_next1" class="text_btn_l">
										<img src="/pd/images/button/btn_next_talk_arrow_2.png" alt="next button">
									</a>
									<a href="#" id="go_back" class="text_btn_r">
										<img src="/pd/images/button/btn_next_talk_arrow_1.png" alt="next button">
									</a>
								</div>
							</div>
						</div>
						<a href="#page43" id="go_page43" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page43" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
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
								<div id="textbox43_1" class="textbox">
									<p>Oh, wait. Didn't you close the window though?</p>
								</div>
							</div>
						</div>
						<a href="#page44" id="go_page44" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page44" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div id="textbox44_1" class="textbox">
									<p>Don't worry, I can close the window easily with remote window control on my key.</p>
								</div>
							</div>
							<div class="text_tip"><img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="imgwrap">
							<img src="/pd/images/day3/james_19.png" alt="james">
						</div>
						<a href="#page45" id="go_page45" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page45" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div class="page_bg"></div>
					<a href="#" class="next_finger">
						<img src="/pd/images/button/touchfinger_@3x.png" alt="next button">
					</a>
					<div id="imgArrow1" class="imgArrow img_twinkle"><img src="/pd/images/day3/72_arrow.png" alt="imgArrow1" /></div>
					<div id="imgArrow2" class="imgArrow img_twinkle"><img src="/pd/images/day3/72_arrow.png" alt="imgArrow2" /></div>
					<div class="imgKey"><img src="/pd/images/day3/71_smartkey_block.png" alt="key" /></div>
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
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">
								<div id="textbox45_1" class="textbox">
									<p>You're right. Even the engine is off, you can close the window easily with the smart-key.</p>
								</div>
							</div>
						</div>
						<a href="#page46" id="go_page46" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page46" class="container">
				<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div class="page_bg"></div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div class="text_img">
									<img src="../images/intro/login_profile_@3x.png" alt="james">
								</div>
								<div id="textbox46_1" class="textbox">
									<p>This city trip is the last course of our journey</p>
								</div>
							</div>
						</div>
						<a href="#page47" id="go_page47" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				</section>

				<section data-role="page" id="page47" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div id="textbox47_1" class="textbox">
									<p>I'm sorry but this is the moment to say goodbye.<br />
									I hope you enjoyed the trip with i30.</p>
								</div>
							</div>
							<div class="text_tip"><img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="imgwrap">
							<img src="/pd/images/day3/james_20.png" alt="james">
						</div>
						<a href="#page48" id="go_page48" class="bye_btn">BYE</a>
					</div>
				</section>

				<section data-role="page" id="page48" class="container">
					<form id="Frm" name="Frm" method="post" enctype="multipart/form-data">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div data-role="main" class="ui-content">
						<div class="pageTitle">Leave your feedback with your photos on trip with i30.</div>
						<div class="imgwrap">
							<div class="imgphoto">
								<img id="current-img">
								<input type="file" id="upload" accept="image/*">
								
							</div>
							<div class="imginput">
								<textarea class="pd_con_text">Please enter TEXT.</textarea>
							</div>
						</div>
						<a href="#" id="form_sumit" class="bye_btn">OK</a>
						<!-- <a href="/pd/en/timeline_view.html" class="bye_btn" target="_blank">OK</a> -->
					</div>
					</form>
				</section>
				
				<input type="hidden" id="SESSION_LMS_SEQ" name="SESSION_LMS_SEQ" value="<?=$_SESSION["HY_LMS_SEQ"]?>">
			</div>
		</div>

		<!--  --><a href="#page46">이동</a>
	</body>
</html>


