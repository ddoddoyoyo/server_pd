<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");
	header("Content-Type: text/html; charset=UTF-8");
	
	

	if($_SESSION["HY_LMS_SEQ"] > 0 ){
		//$tools->JavaGo("/genesis/part1/en/main.php");
	}else{
		$tools->JavaGo("/pd/ar/");
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
		<link rel="stylesheet" href="../css/ar.css">
		<link rel="stylesheet" href="/pd/css/menu_day2.css">
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
		<script src="../js/menu_day2_tr.js"></script>
		<script src="/pd/common/js/common.js"></script>
		<script>

		window.onload = function(){
			setTimeout(function(){
				var t = performance.timing;
				var s =  (t.loadEventEnd - t.navigationStart);
				//console.log(s - 2000);
				$('.loding_bar .londing2').animate({"width":"100%"}, s);
				setTimeout(function(){
					$.mobile.changePage("#page56");
				}, s-1);
			},0);
		}

		$(document).ready(function(){
				//text align right
				$(".sidePanel_wrap,.textwrap, p, input, label, option").attr("dir", "rtl").addClass("right-to-left");
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

				$("#page101 .go-next").click(function(){	
					location.href="/pd/ar/day3.php";
				});
			});
				
		</script>
	</head>
	<body>
		<div id="wrap">
			<div id="contBox" class="container">
<!--day2-->
	<section data-role="page" id="page5601" class="container"> 
		<div data-role="main" class="ui-content">
			<div class="imgwrap">
				<div class="gif_img">
					<img src="/pd/images/loading_short_4sec.gif" alt="">
				</div>
				<div class="loding_bar">
					<img src="/pd/images/loading_bar_1.png" alt="" class="londing1">
					<img src="/pd/images/loading_bar_2.png" alt="" class="londing2">
					<div id="logind_text">إعداد رحلتنا</div>
				</div>
			</div>
		</div>
	</section>

	<section data-role="page" id="page56" class="container">
		<div data-role="main" class="ui-content">
			<div class="imgwrap">
				<img src="../images/day2/01_photo.jpg" alt="car">
			</div>
			<div class="textwrap">
				<div class="text">	
					<div id="textbox1" class="textbox">
						<h1>اليوم الثاني</h1>
						<div class="img_wrap">
							<img src="../images/button/08_point.png" alt="location point">
							<img src="../images/button/08_lodeline.png" alt="location">
							<p class="p1">ممر ستلفيو</p>
							<p class="p2">زيورخ</p>
						</div>
						<ul>
							<li>محرك</li>
							<li>7 DCT</li>
<!-- 							<li>Bağlanabilirlik</li> -->
							<li>مساحة (حقيبة السيارة)</li>
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
						<p>من هنا، سننتقل إلى ممر ستلفيو حيث أرى أنه البقعة الأهم في هذه الرحلة.</p>
					</div>
				</div>
				<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
			</div>
			<div class="imgwrap">
				<img src="../images/person/james_2.png" alt="james">
			</div>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/045.mp3"></audio> -->
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
						<p>مع الطرق المتعرجة، يشبه ممر ستلفيو مكانًا للأحلام لعشاق القيادة</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>وتخضع الكثير من الطرز الشهيرة من ماركات السيارات الأخرى لاختبارات الأداء هنا.</p>
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
			<!-- <audio class="audio1" src="../tts/day2/046.mp3"></audio>
			<audio class="audio2" src="../tts/day2/047.mp3"></audio> -->
		</div>
		<!-- <audio class="audio1" src="../tts/day2/04.mp3"></audio>
		<audio class="audio2" src="../tts/day2/05.mp3"></audio> -->
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
						<p>هنا لا يزال يمكننا أن نرى بعض الثلوج متبقية، ولكن الطقس على ما يرام للقيادة!</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>هنا، نحن في ممر ستلفيو. ألا عليّ أن أبدأ التسارع؟</p>
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
		<!-- <audio class="audio1" src="../tts/day2/048.mp3"></audio>
		<audio class="audio2" src="../tts/day2/049.mp3"></audio> -->
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
						<p>يوجد بسيارتي محرك 1.6 Turbo-GDI.<br>هل علمتم أن هذا المحرك يحظى بقدرة حصانية أعلى من المحرك Golf 1.8 Turbo؟</p>
					</div>
				</div>
				<a href="#page61" id="go_page61" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
			</div>
		</div>
	<!-- 	<audio class="audio1" src="../tts/day2/050.mp3"></audio> -->
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
						<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
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
							<p>يتميز محرك Gamma 1.6 Turbo-GDI للسيارة طراز i30 بقوة حصانية وعزم أعلى من المحرك التوربيني Golf 1.8. ولسوء الحظ، ليس العديد من الناس على دراية بذلك.</p>
						</div>	
					</div>
				</div>	
			</div>
		<a href="#page63" id="go_page63" class="next_p_btn ui-btn go-next">
			<img src="../images/button/btn_next_02_@3x.png" alt="next button">
		</a>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/tom/022.mp3"></audio> -->
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
						<p>تتميز هذه السيارة بأن بها ناقل حركة مزدوج ذي 7 سرعات مع نقل سريع ومحرك قوي. هل بإمكانك تصديق ذلك؟</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>يوجد بناقل الحركة المزدوج مستشعر مباشر بدون فقدان للطاقة عند تبديل التروس. يمكنك الشعور بتلك الخاصية عند اللف.</p>
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
		<!-- <audio class="audio1" src="../tts/day2/051.mp3"></audio>
		<audio class="audio2" src="../tts/day2/052.mp3"></audio> -->
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
						<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
					<?php } else { ?>
					<img src="../images/intro/login_profile_@3x.png"" alt="man">
				<?php } ?>
			</div>
			<div class="textwrap">
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<div class="text">	
					<p>دعنا نتعرف على ناقل الحركة المزدوج! انقر فوق الفيديو!</p>
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
			<div class="popLayer_tr" id="pop02">
				<div class="imgwrap">
					<?php if($LMS_IMAGE) { ?> 
						<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
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
							<p>يوفر ناقل الحركة المزدوج سريع التحول القدرة القصوى للمحرك لتسهيل عملية التعجيل والإبطاء على الطرق المتعرجة.</p>
						</div>	
					</div>
				</div>	
			</div>
			<a href="#page64" id="go_page64" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/tom/023.mp3"></audio>
		<audio class="audio2" src="../tts/day2/tom/024.mp3"></audio> -->
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
						<p>عندما نفلت من منعطف حاد مثل هنا، تكون القبضة القوية من التعليق الخلفي شيئًا أساسيًا.</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>وهل ترون، لا توجد عثرة على سرعة مقبولة.</p>
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
			<a href="#page65" id="go_page65" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/053.mp3"></audio>
		<audio class="audio2" src="../tts/day2/054.mp3"></audio> -->
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
						<p>هل تتذكرون النظام متعدد الوصلات الذي جعل القيادة على طريق ميلانو مستقرًا؟<br>يسهم هذا النظام متعدد الوصلات أيضًا في استقرار قوة السيطرة الخلفية على الطريق عند المنعطفات بسرعة عالية.</p>
					</div>	
					<div id="textbox2" class="textbox">
						<p>وخصوصًا عندما نقود على الطرق المتعرجة، سترون القيمة الحقيقية لنظام التعليق متعدد الوصلات.</p>
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
		<!-- <audio class="audio1" src="../tts/day2/tom/025.mp3"></audio>
		<audio class="audio2" src="../tts/day2/tom/026.mp3"></audio> -->
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
						<p>استخدام اللحام اللاصق الهيكلي !</p>
					</div>	
				</div>
			</div>
			<div class="img_ex">
				<span>112m</span>
			</div>
			<div class="popLayer">
				<div class="imgwrap">
					<?php if($LMS_IMAGE) { ?> 
						<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
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
							<p>استخدمَ هيكل سيارة i30 اللاصقة المعدنية ذات القوة الشديدة لتحسين صلابة الهيكل ومتانته، فقد تم استخدام 112 مترًا من اللاصقة المعدنية إذا لم أكن مخطئًا.</p>
						</div>	
					</div>
				</div>	
			</div>
			<a href="#" class="next_finger ui-link"><img src="../images/button/touchfinger_@3x.png" alt="next button"></a>
			<a href="#page68" id="go_page68" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/tom/027.mp3"></audio> -->
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
						<p>آه ها! هذا هو السبب في أنني شعرت وكأنني والسيارة جسد واحد عندما تكررت المنعطفات بسرعة عالية.<br>إنه أمر مشوق، أحبه!!</p>
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
		<!-- <audio class="audio1" src="../tts/day2/055.mp3"></audio> -->
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
						<p>لنأخذ قسطًا من الراحة هنا</p>
					</div>
				</div>
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
			</div>
			<div class="view_text">	
				<a href="#page70"><p>ممر ستلفيو</p></a>
				<a href="#page70" id="go_page70" class="next_p_btn ui-btn go-next">
					<img src="../images/button/btn_next_02_@3x.png" alt="next button">
				</a>
			</div>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/056.mp3"></audio> -->
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
						<p>هل تعرف لماذا أصبح ممر ستلفيو طريقًا متعرجًا شهيرًا في العالم؟ لأنه يربط جبال الألب المختلفة، ويعطينا مناظر هائلة.</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>هذه هي الطرق التي مررنا بها للتو.<br>أصابكم الدوار الشديد، أليس كذلك؟<br>كم عدد المنعطفات التي ممرنا بها؟<br>كان ذلك ضربًا من المتعة.</p>
					</div>
					<div id="textbox3" class="textbox">
						<p>محرك قوي رائع نقل حركة مزدوج بـ7 سرعات متانة هيكل شديدة نظام تعليق خلفي متعدد الوصلات</p>
					</div>
					<div id="textbox4" class="textbox">
						<p>يجعل الجمع بين كل هذه الميزات سيارة i30 سيارة ممتعة عند القيادة!</p>
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
			<a href="#page71" id="go_page71" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
			<!-- <audio class="audio1" src="../tts/day2/057.mp3"></audio>
			<audio class="audio2" src="../tts/day2/058.mp3"></audio>
			<audio class="audio3" src="../tts/day2/059.mp3"></audio>
			<audio class="audio4" src="../tts/day2/060.mp3"></audio> -->
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
						<p>كيف وجدتموها؟<br>ألم تكن مخيفة رغم كل ذلك؟<br>آمل أن تكونوا قد استمتعتم بالطرق المتعرجة الرائعة، لأنني استمتعت بها بالتأكيد.</p>
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
		<!-- <audio class="audio1" src="../tts/day2/061.mp3"></audio> -->
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
						<p>عجلوا، دعونا نعود إلى أسفل.<br>سننتقل إلى واحدة من أكبر مواقع التخييم في أوروبا.</p>
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
	<!-- 	<audio class="audio1" src="../tts/day2/062.mp3"></audio> -->
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
						<p>سنذهب إلى مكان يسمى فيشرز فريتز في زيورخ، سويسرا.<br>انقر على زيورخ.</p>
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
		<!-- <audio class="audio1" src="../tts/day2/063.mp3"></audio> -->
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
						<p>كما تعلمون، زيوريخ هي أكبر مدينة في سويسرا.<br>هناك بحيرة زيورخ الجميلة بجوار المدينة مباشرةً وأيضًا نهر ليميت.</p>
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
		<!-- <audio class="audio1" src="../tts/day2/064.mp3"></audio> -->
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
						<p>قبل أن نتجول وسط المدينة، دعونا أولاً نذهب مباشرة إلى بقعة التخييم ونفرغ الحقائب.</p>
					</div>
				</div>
			</div>
			<a href="#page76" id="go_page76" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/065.mp3"></audio> -->
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
						<p>نحن الآن في فيشرز فريتز.</p>
					</div>
				</div>
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
			</div>
			<div class="view_text">	
				<a href="#page77"><p>فيشر فريتز</p></a>
				<a href="#page77" id="go_page77" class="next_p_btn ui-btn go-next">
					<img src="../images/button/btn_next_02_@3x.png" alt="next button">
				</a>
			</div>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/066.mp3"></audio> -->
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
						<p>إنها واحدة من المناطق الأكثر شهرة في التخييم في أوروبا. يزورها الكثير من عشاق التخييم.</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>لقد أردت دائمًا أن أخيم هنا لفترة طويلة أيضا. لنفرغ حقائبنا هنا</p>
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
		<!-- <audio class="audio1" src="../tts/day2/067.mp3"></audio>
		<audio class="audio2" src="../tts/day2/068.mp3"></audio> -->
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
		<div class="main_wrap main_wrap_tr">
			<div class="textwrap">	
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>i30  هي حقًا سيارة فسيحة.<br>كما ترون، حقيبة السيارة فسيحة جدًا.<br>يمكننا حمل جميع الأمتعة التي نحتاجها لهذه الرحلة.</p>
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
		<!-- <audio class="audio1" src="../tts/day2/069.mp3"></audio> -->
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
						<p>ما الحمولة القصوى لحقيبة السيارة؟</p>
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
						<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
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
							<p>عملت سيارة i30 الجديدة على زيادة سعة الأمتعة إلى 395 لترًا، متباهيةً بذلك بحقيبتها الفسيحة للغاية.</p>
						</div>	
					</div>
				</div>	
			</div>
			<a href="#" class="next_finger ui-link"><img src="../images/button/touchfinger_@3x.png" alt="next button"></a>
			<a href="#page81" id="go_page81" class="next_p_btn ui-btn go-next">
				 <img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a> 
		</div>
		<!-- <audio class="audio1" src="../tts/day2/tom/028.mp3"></audio> -->
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
							<p>يا للروعة، يمكنها حقًا حمل الكثير من الأشياء.</p>
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
		<!-- <audio class="audio1" src="../tts/day2/070.mp3"></audio> -->
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
						<p>هيا ننصب خيمة. ما رأيكم بتشغيل الموسيقى أثناء قيامنا بنصب الخيمة.</p>
					</div>
				</div>
			</div>
			<a href="#page83" id="go_page83" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/071.mp3"></audio> -->
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
					<div class="text_img">
					<?php if($LMS_IMAGE) { ?> 
						<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
					<?php } else { ?>
						<img src="../images/intro/login_profile_@3x.png" alt="james">
					<?php } ?>
				</div>	
					<div id="textbox1" class="textbox">
						<p>انتظروا ثانية، أحتاج إلى الهاتف لتوصيله أولاً. أين هاتفي؟</p>
					</div>		
				</div>
			</div>
			<a href="#page84" id="go_page84" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/tom/029.mp3"></audio> -->
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
						<p>ما نوع الهاتف الذكي الخاص بك؟</p>
				</div>
				<div class="device_wrap">
					<a href="#page85" class="deviceL"><div ><img src="../images/day2/42_btn_left.png" alt=""></div></a>
					<a href="#page87" class="deviceR"><div>
					<img src="../images/day2/42_btn_right.png" alt=""></div></a>
				</div>
			</div>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/38.mp3"></audio> -->
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
						<p>اكتمل الاتصال.</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>تشغيل الموسيقى</p>
					</div>
				</div>
			</div>
			<a href="#page86" id="go_page86" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/music1.mp3"></audio> -->
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
					<p>تقدم السيارة i30  الإنترنت المتبادل، وخدمة الهاتف النقال، والتحكم عن بعد، والمساعدة الصوتية للتنقل والمكالمات الهاتفية عبر تطبيقات الاندرويد اوتو .
يمكنكم استخدام معظم وظائف الهاتف الذكي.</p>
				</div>
			</div>
			<a href="#page89" id="go_page89" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/tom/030.mp3"></audio> -->
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
						<p>اكتمل الاتصال.</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>تشغيل الموسيقى</p>
					</div>
				</div>
			</div>
			<a href="#page88" id="go_page88" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/music2.mp3"></audio> -->
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
					<p>يدعم i30 تشغيل Apple بالسيارة، حيث يمكنك ببساطة، بعد الاتصال، استخدام جهاز الملاحه، وإجراء مكالمة هاتفية، وتشغيل الموسيقى</p>
				</div>
			</div>
			<a href="#page89" id="go_page89" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/tom/031.mp3"></audio> -->
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
					<div class="text_img">
					<?php if($LMS_IMAGE) { ?> 
						<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
					<?php } else { ?>
						<img src="../images/intro/login_profile_@3x.png" alt="james">
					<?php } ?>
				</div>	
					<div id="textbox1" class="textbox">
						<p>لماذا لا نرفع الصوت أثناء قيامنا بنصب الخيمة، يا أصدقاء.</p>
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
		<!-- <audio class="audio1" src="../tts/day2/tom/032.mp3"></audio> -->
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
							<p>لديكم تذوق جيد بالموسيقى.<br>هيا، نريد أن نتم عملنا قبل غروب الشمس.</p>
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
		<!-- <audio class="audio1" src="../tts/day2/072.mp3"></audio> -->
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
						<p>أوه، نفدت البطارية لديّ تقريبًا. هل يمكنكم شحنها لي؟</p>
					</div>
				</div>
			</div>
			<a href="#page92" id="go_page92" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/073.mp3"></audio> -->
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
						<p>يُرجى وضع الهاتف على الشاحن اللاسلكي.</p>
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
		<!-- <audio class="audio1" src="../tts/day2/43.mp3"></audio> -->
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
						<p>يمكنك شحن هاتفك بسهولة من خلال الشاحن اللاسلكي، فعند اكتمال الشحن، يتحول مصباح الشحن إلى اللون الأخضر!</p>
					</div>
				</div>
			</div>
			<a href="#page94" id="go_page94" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/tom/033.mp3"></audio> -->
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
							<p>لقد حل الظلام الآن.<br>أليست بحيرة رائعة جديرة بالمشاهدة أثناء التخييم؟</p>
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
		<!-- <audio class="audio1" src="../tts/day2/074.mp3"></audio> -->
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
						<p>حسنا، اسمحوا لي أن أعزف أغنية لهذه الليلة العظيمة.</p>
					</div>
				</div>
			</div>
			<a href="#page96" id="go_page96" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/075.mp3"></audio> -->
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
						<p>دعونا نحصل على قسط جيد من النوم الآن ونلقي نظرة على زيوريخ غدًا.</p>
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
		<!-- <audio class="audio1" src="../tts/day2/076.mp3"></audio> -->
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
						<p>هل نمتم جيدًا؟<br>هيا نحزم أمتعتنا ونتحرك.</p>
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
		<!-- <audio class="audio1" src="../tts/day2/077.mp3"></audio> -->
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
						<p>لنستعد للذهاب، هلا نحمل أمتعتنا مجددًا؟</p>
					</div>
				</div>
			</div>
			<a href="#page99" id="go_page99" class="next_p_btn ui-btn go-next">
					<img src="../images/button/btn_next_02_@3x.png" alt="next button">
				</a>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/078.mp3"></audio> -->
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
						<p>يُرجى لمس الزر لتحميل أمتعتكم.</p>
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
						<p>مع وظيفة الطي المريحة التي تتم بلمسة واحدة، يمكنك طي المقاعد الخلفية بلمسة واحدة فقط للمزلاج.</p>
					</div>
				</div>
			</div>
			<a href="#page101" id="go_page101" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/tom/034.mp3"></audio> -->
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
							<p>حسنا، تم تحميل كل شيء.<br>هيا لنذهب.</p>
						</div>
					</div>
					<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box">
					</div>
				</div>
				<div class="imgwrap">
					<img src="../images/person/james_15.png" alt="james">
				</div>
				<a href="javascript:;" id="go_day3" class="next_p_btn ui-btn go-next">
					<img src="../images/button/btn_next_02_@3x.png" alt="next button">
				</a>
			</div>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/079.mp3"></audio> -->
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

	<!-- <section data-role="page" id="page105" class="container">
		<div data-role="header" class="header">
			<a href="#" class="ui-btn go-back back" data-rel="back">
				<img src="../images/button/icon_arrow.png" alt="">
			</a>
			<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
				<img src="../images/button/icon_navbar.png" alt="">
			</a>
		</div>
		<div data-role="main" class="ui-content">
			<a href="/pd/tr/day3.php" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
	</section> -->
	

	



	<!-- 여창민 대리 추가 (2017-03-30) : 시작 -->
	<input type="hidden" id="SESSION_LMS_SEQ" name="SESSION_LMS_SEQ" value="<?=$_SESSION["HY_LMS_SEQ"]?>">
	<!-- 여창민 대리 추가 (2017-03-30) : 끝 -->

</div>

</div>


<!-- <a href="#page65">이동!!!!!!!!!</a> -->



