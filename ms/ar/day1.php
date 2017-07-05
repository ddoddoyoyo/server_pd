<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");
	header("Content-Type: text/html; charset=UTF-8");
	

	if($_SESSION["HY_LMS_SEQ"] > 0 ){
		//$tools->JavaGo("/genesis/part1/en/main.php");
	}else{
		$tools->JavaGo("/pd/ms/ar/");
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
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui">
		<meta name="apple-touch-fullscreen" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
		<link rel="stylesheet" href="../css/styles.css">
		<link rel="stylesheet" href="../css/ar.css">
		<link rel="stylesheet" href="../css/menu_day1.css">
		<link rel="stylesheet" href="../css/jquery-ui.css">
		<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script>
		  //주소창 없애기
			//  $(document).on("mobileinit", function () {
			// 	 $.mobile.hashListeningEnabled = false;
			// 	 $.mobile.pushStateEnabled = false;
			// 	 $.mobile.changePage.defaults.changeHash = false;
			// });
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
		<script src="../js/menu_day1_ar.js"></script>
		<script src="../common/js/common.js"></script>
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
			//text align right
			$(".sidePanel_wrap, p, input, label, option").attr("dir", "rtl").addClass("right-to-left");
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
				location.href="../ar/day2.php";
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
								<img src="../images/loading_short_4sec.gif" alt="">
							</div>
							<div class="loding_bar">
								<img src="../images/loading_bar_1.png" alt="" class="londing1">
								<img src="../images/loading_bar_2.png" alt="" class="londing2">
								<div id="logind_text">إعداد رحلتنا</div>
							</div>
						</div>
					</div>
				</section>

				

				<section data-role="page" id="page2" class="container"> 
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">	
								<h2 class="pointColor"><?=$_SESSION["HY_LMS_NAME"]?>!</h1>
								<p>هيي أنا جيمس!<br><span class="pointColor">أخيرًا اقتنيت سيارة i30 لقد كنت بانتظارها!</span><br>يمكننا الآن الاستمرار في الرحلة كما خططنا من قبل.<br>لماذا لا تقوم برحلة سريعة؟</p>
							</div>
							<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box"></div>
						</div>
						<a href="#page3" class="yes_btn">نعم</a>
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
								<p>حوّل الشاشة إلى الوضع الأفقي.</p>
								<p class="ok_btn">موافق</p>
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
									<p>قبل أن نبدأ رحلتنا، اسمحوا لي أن أعرض لكم هذا المقطع. بعد أن شاهدت هذا، قررت شراء i30</p>
								</div>
							</div>
						</div>
						<div class="btn_play">
								<img src="../images/button/btn_videoplay.png" alt="">
							</div>
							<div class="popLayer" id="pop01">
								<video width="320" height="240" controls>
								  <source src="http://of01-qb5150.ktics.co.kr/Hyundai_i30_product_video.mp4" type="video/mp4">
									Your browser does not support HTML5 video.
								</video>	
							<!-- <iframe src="https://www.youtube.com/embed/HMUwBaKxOj8" frameborder="0" allowfullscreen></iframe> -->
							</div>
						<a href="#page4" id="go_page4" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						<!-- <audio class="audio1" src="../tts/day1/001.mp3"></audio> -->
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
								<p>ستسافرون إلى 6 مدن لمدة 3 أيام من خلال سيارة i30 معي. لقد خططت لسير الرحلة بالفعل.<br>لذا ألا نواصل التحرك؟</p>
							</div>
						</div>
						<a href="#page5" id="go_page5" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<!-- <audio class="audio1" src="../tts/day1/002.mp3"></audio> -->
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
									<p>سنبدأ من ميلانو، ونتوقف عند بحيرة كومو وممر ستلفيو، الوصول إلى سويسرا.</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>ثم في سويسرا، سوف نتوقف في زيوريخ وبرن حيث نصل إلى ستراسبورغ، وجهتنا النهائية</p>
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
					<!-- <audio class="audio1" src="../tts/day1/003.mp3"></audio>
					<audio class="audio2" src="../tts/day1/004.mp3"></audio> -->
				</section>

				<section data-role="page" id="page7" class="container">
					<div data-role="main" class="ui-content">
						<div class="imgwrap">
							<img src="../images/day1/landscape2/08_photo_1.jpg" alt="car">
						</div>
						<div class="textwrap">
							<div class="text">	
								<div id="textbox1" class="textbox">
									<h1>اليوم الأول</h1>
									<div class="img_wrap">
										<img src="../images/button/08_point.png" alt="location point">
										<img src="../images/button/08_lodeline.png" alt="location">
										<p class="p1">ميلانو</p>
										<p class="p2">كومو</p>
									</div>
									<ul>
										<li>الهيكل الخارجي</li>
										<li>إطار الهيكل</li>
										<li>التعليق</li>
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
									<p>تبدأ رحلتنا الأولى من ميلانو، أليس ذلك مثيرًا؟</p>
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
					<!-- <audio class="audio1" src="../tts/day1/005.mp3"></audio> -->
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
								<p>هنا هو وجهتنا الأولى!<br>لا يمكنني أن أفوت الكاتدرائية التي هي رمز ميلانو بجمالها الأخاذ.</p>
							</div>
						</div>
						<a href="#page10" id="go_page10" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<!-- <audio class="audio1" src="../tts/day1/006.mp3"></audio> -->
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
									<p>يا له من يوم رائع أخرج فيه في رحلة بسيارتي الأولى<br>إنه شعور رائع!</p>
								</div>
							</div>	
						</div>
						<a href="#page11" id="go_page11" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<!-- <audio class="audio1" src="../tts/day1/007.mp3"></audio> -->
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
									<p>تعلمون أن الطرق في إيطاليا ضيقة ومحتفظة بالحجارة منذ القدم.</p>
								</div>
							</div>
					</div>
					<a href="#page12" id="go_page12" class="next_p_btn ui-btn go-next">
						<img src="../images/button/btn_next_02_@3x.png" alt="next button">
					</a>
					<!-- <audio class="audio1" src="../tts/day1/008.mp3"></audio> -->
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
					<div data-role="main" class="ui-content ui-content_tr">
						<div class="textwrap">
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>تعلم أن حالة الطريق سيئة للغاية لكن أليس من المريح الركوب في هذه السيارة؟<br>سمعت بتعزيز متانة هيكل سيارةi30  ويمكنني الشعور بصلابته.</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>أعرف تمام المعرفة أنني أقود السيارة على طرق غير ممهده!</p>
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
					<!-- <audio class="audio1" src="../tts/day1/009.mp3"></audio>
					<audio class="audio2" src="../tts/day1/010.mp3"></audio> -->
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
									<p>دعنا نستخدم المعدن المطور شديد الصلابه</p>
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
						<img src="../images/tryagain_X_ar.png"" alt="">
					</div>
					<div class="good">
						<img src="../images/tryagain_O_ar.png"" alt="">
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
									<p>لجعل إطار الهيكل أكثر صلابة, تم نطبيق المعدن المطور شديد الصلابه على الأجزاء الهامة من سيارة i30 الجديدة مقارنة بـ 27.2, للطراز السابق,</p>
								</div>	
								<div id="textbox2" class="textbox">
									<p>فما هو العدد الصحيح لإخبار جيمس به؟</p>
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
								<p>حسًنت سيارة i30 الجديدة من إطار الهيكل من خلال تطبيق المعدن المطور شديد الصلابه الصلابه حتى نسبة 53.5%.</p>
							</div>
						</div>
						<a href="#page16" id="go_page16" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
				<!-- 	<audio class="audio1" src="../tts/day1/tom/001.mp3"></audio> -->
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
									<p>أوه، ترى لماذا أشعر بالراحة والصلابة<br>إنه العمل على محركات هيونداي، أليس كذلك؟</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>أنت تعرف أكثر بكثير مما كنت أتوقع. نأمل في الحصول على الكثير من المعلومات منك خلال هذه الرحلة.</p>
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
					<!-- <audio class="audio1" src="../tts/day1/011.mp3"></audio>
					<audio class="audio2" src="../tts/day1/012.mp3"></audio> -->
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
									<p>وصلنا هنا إلى الكاتدرائية.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="view_text">	
							<a href="#page18"><p>كاتدرائية ميلانو</p></a>
							<a href="#page18" id="go_page18" class="next_p_btn ui-btn go-next">
								<img src="../images/button/btn_next_02_@3x.png" alt="next button">
							</a>
						</div>
					</div>
					<!-- <audio class="audio1" src="../tts/day1/013.mp3"></audio> -->
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
									<p>تحتاج إلى معرفة أن هذه الكاتدرائية هي واحدة من "1001 مبنى يجب أن تراه قبل أن تموت"</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>يوجد بهذه الكاتدرائية العملاقة منحوتات مختلفة ومتطورة.</p>
								</div>
								<div id="textbox3" class="textbox">
									<p>يمكننا أن نرى مدينة ميلانو كلها من سطحها.</p>
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
					<!-- <audio class="audio1" src="../tts/day1/014.mp3"></audio>
					<audio class="audio2" src="../tts/day1/015.mp3"></audio>
					<audio class="audio3" src="../tts/day1/016.mp3"></audio> -->
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
									<p>عجلوا!<br>سنتحرك</p>
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
					<!-- <audio class="audio1" src="../tts/day1/017.mp3"></audio> -->
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
									<p>ترون أن هذه المدينة بها العديد من الطرق الضيقة والوعرة.<br>ربما بسبب الترام الذي يمر عبر المدينة.</p>
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
				<!-- <audio class="audio1" src="../tts/day1/018.mp3"></audio> -->
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
									<p>إنه من السهل حقًا قيادة هذه السيارة ذات الباب الخلفي نظرًا لحجمها الصغير. يمكنني الشعور بهبوط الجزء الخلفي بشكل سلس عند المرور على الطرق الوعرة.</p>
								</div>
							</div>
						</div>
						<a href="#page22" id="go_page22" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<!-- <audio class="audio1" src="../tts/day1/019.mp3"></audio> -->
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
									<p>هل تعلم أن نظام التعليق متعدد الوصلات يستخدم عادة في السيارات الرياضية لإحكام السيطرة بشكل أقوى على الطريق؟</p>
								</div>	
								<div id="textbox2" class="textbox">
									<p>تستخدم السيارة i30 كذلك نظامًا متعدد الوصلات يضم 5 وصلات تعطيها سيطرة مستقرة على أي نوع من الطرق.</p>
								</div>
								<div id="textbox3" class="textbox">
									<p>وعلى وجه الخصوص، عندما تقودون السيارة على الطرق المتعرجة، ستلاحظون القيمة الحقيقية لنظام التعليق متعدد الوصلات.</p>
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
					<!-- <audio class="audio1" src="../tts/day1/tom/002.mp3"></audio>
					<audio class="audio2" src="../tts/day1/tom/003.mp3"></audio>
					<audio class="audio3" src="../tts/day1/tom/004.mp3"></audio> -->
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
									<p>أرى أن كل ما قيل لي عندما كنت أشتري السيارة أن النظام متعدد الوصلات هو نظام جيد، ولكن شرحكم للتقنية يساعدني كثيرًا.</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>لا يمكنني الانتظار في القيادة على الطرق المتعرجة.</p>
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
					<!-- <audio class="audio1" src="../tts/day1/020.mp3"></audio>
					<audio class="audio2" src="../tts/day1/021.mp3"></audio> -->
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
									<p>هنا يمكننا أن نرى قلعة سفورزيسكو</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="view_text">	
							<a href="#page26"><p>قلعة سفورزيسكو بميلانو</p></a>
							<a href="#page26" id="go_page26" class="next_p_btn ui-btn go-next">
								<img src="../images/button/btn_next_02_@3x.png" alt="next button">
							</a>
						</div>
					</div>
					<!-- <audio class="audio1" src="../tts/day1/022.mp3"></audio> -->
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
									<p>تعلمون أن ليوناردو دا فينشي وبرامانتي انضما لبناء قلعة سفورزيسكو</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>وهي تمثل فن العمارة الرمزي لعصر النهضة في القرن الخامس عشر.</p>
								</div>
								<div id="textbox3" class="textbox">
									<p>أنشأها اللورد فرانشيسكو سفورزا.</p>
								</div>
								<div id="textbox4" class="textbox">
									<p>تُستخدم في الوقت الحاضر كمتحف ومعرض فني.</p>
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
					<!-- <audio class="audio1" src="../tts/day1/023.mp3"></audio>
					<audio class="audio2" src="../tts/day1/024.mp3"></audio>
					<audio class="audio3" src="../tts/day1/025.mp3"></audio>
					<audio class="audio4" src="../tts/day1/026.mp3"></audio> -->
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
									<p>لم تُبن في نطاق واسع فحسب، بل ظلت حالتها العامة كذلك على ما يُرام.</p>
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
					<!-- <audio class="audio1" src="../tts/day1/027.mp3"></audio> -->
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
								<p>من المثير مشاهدة هذه الأبنية العظيمة. ولذا يجدر النظر إلى تصميم سيارة i30 الرائع.</p>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
					</div>
					<!-- <audio class="audio1" src="../tts/day1/028.mp3"></audio> -->
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
									<p>تؤكد الشبكة المتتالية على المظهر الرياضي بشكل أكثر، وتم دمج الشعار المكبر مع الرادار للحصول على ميزات السلامة الذكية.</p>
								</div>	
								<div id="textbox2" class="textbox">
									<p>تتسم بصورة خاصة الخطوط العريضة للشبكة بأنها متطورة للغاية وهي الجزء المفضل لدي في تصميم السيارة.</p>
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
					<!-- <audio class="audio1" src="../tts/day1/tom/005.mp3"></audio>
					<audio class="audio2" src="../tts/day1/tom/006.mp3"></audio> -->
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
									<p>دعونا نرسم الخط المميز الجانبي لسيارة i30.</p>
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
									<p>مما لا شك فيه أنها سيارة صغيرة لكنها تبدو ممشوقة جدًا! فطول غطاء محرك السيارة الممتد والخط المميز عبر الهيكل الجانبي يجعل السيارة تبدو أطول.</p>
								</div>
							</div>
						</div>
						<a href="#page34" id="go_page34" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<!-- <audio class="audio1" src="../tts/day1/tom/007.mp3"></audio> -->
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
									<p>يحتوي الجناح الخلفي على اضاءة فرامل ليد، وتعد مخارج العادم المزدوجه نقطة فريدة من نوعها مقارنة بالسيارات الأخرى. و تعد لمسات التصميم أفضل بكثير من غولف.</p>
								</div>
							</div>
						</div>
						<a href="#page37" id="go_page37" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<!-- <audio class="audio1" src="../tts/day1/tom/008.mp3"></audio> -->
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
									<p>هلا ننتقل إلى لاغو دي كومو؟</p>
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
					<!-- <audio class="audio1" src="../tts/day1/029.mp3"></audio> -->
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
									<p>علينا الإسراع قبل الفجر.</p>
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
					<!-- <audio class="audio1" src="../tts/day1/030.mp3"></audio> -->
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
									<p>لقد حل الظلام الآن، وسمعت بأن السيارة i30 بها مصابيح ليد أمامية كاملة تعطي مشهدًا أكثر إشراقًا بكثير أمام السيارة.</p>
								</div>		
							</div>
						</div>
						<a href="#page40" id="go_page40" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<!-- <audio class="audio1" src="../tts/day1/tom/009.mp3"></audio> -->
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
									<p>نعم، إنها مشرقة حقًا. فهي تتيح لي رؤية أبعد من ذلك بكثير، ويساعد الشعاع العالي كذلك على عدم وجود أي مشكلة في القيادة على الطرق الجبلية.</p>
								</div>
							</div>
						</div>
						<a href="#page41" id="go_page41" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<!-- <audio class="audio1" src="../tts/day1/tom/010.mp3"></audio> -->
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
								<p>تأخر الوقت قليلاً بالفعل، ولذا فإننا سوف نبقى ليلة هنا في النُزل.</p>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<a href="#page42" id="go_page42" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<!-- <audio class="audio1" src="../tts/day1/032.mp3"></audio> -->
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
									<p>حسنًا، تصبحون على خير، أراكم غدًا.</p>
								</div>
							</div>
							<a href="#page43" id="go_page43" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
					<!-- <audio class="audio1" src="../tts/day1/033.mp3"></audio> -->
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
							<img src="../images/day1/btn_wakingup_ar.png" alt="">
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
									<p>قبل أن نواصل، هيا ننظف الركام الموجود بالداخل.</p>
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
					<!-- <audio class="audio1" src="../tts/day1/034.mp3"></audio> -->
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
									<p>باتت الآن نظيفة، كما لو كانت جديدة تمامًا وخارجة من المصنع.</p>
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
					<!-- <audio class="audio1" src="../tts/day1/035.mp3"></audio> -->
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
									<p>في الواقع، هناك خمسة خيارات للون الفرش الداخلي واخترت اللون الأحمر. ويجب علينا التعرف على بقية الألوان المتاحة؟</p>
								</div>
							</div>
						</div>
						<a href="#page47" id="go_page47" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<!-- <audio class="audio1" src="../tts/day1/tom/011.mp3"></audio> -->
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
									<p>اللون <strong>الأحمر</strong> القوي الذي بساعد على وجود تباين جيد مع الجلد الأسود.</p>
								</div>	
								<div id="textbox2" class="textbox">
									<p>يملأ النسيج والجلد <strong>الأسود</strong> الفرش الداخلي من السيارة بنظرة حديثة</p>
								</div>
								<div id="textbox3" class="textbox">
									<p>تعطي النقاط الجلدية الموجودة باللون <strong>الرمادي</strong> الفرش الداخلي صورة بسيطة.</p>
								</div>
								<div id="textbox4" class="textbox">
									<p>اللون <strong>الأزرق</strong> النيلي المُذكر بالشباب والحيوية.</p>
								</div>
								<div id="textbox5" class="textbox">
									<p>فرش داخلي بلون <strong>أحمر بورغوندي</strong> للحصول على لمسة أنيقة وبراقة.</p>
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
				<!-- 	<audio class="audio1" src="../tts/day1/tom/012.mp3"></audio>
					<audio class="audio2" src="../tts/day1/tom/013.mp3"></audio>
					<audio class="audio3" src="../tts/day1/tom/014.mp3"></audio>
					<audio class="audio4" src="../tts/day1/tom/015.mp3"></audio>
					<audio class="audio5" src="../tts/day1/tom/016.mp3"></audio> -->
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
									<p>اختر لونًا للفرش الداخلي ترى أنه الأفضل لك.</p>
								</div>	
							</div>
						</div>
						<!-- 여창민 대리 추가 (2017-03-30) : 시작 -->
						
						
						<div class="imgwrap">
							<ul class="choice_color">
								<a href="#page49" id="ch1" onclick="choice_color('1')"><li><img src="../images/day1/78_btn_01_ar.png" alt=""></li></a>
								<a href="#page49" id="ch2" onclick="choice_color('2')"><li><img src="../images/day1/78_btn_02_ar.png" alt=""></li></a>
								<a href="#page49" id="ch3" onclick="choice_color('3')"><li><img src="../images/day1/78_btn_03_ar.png" alt=""></li></a>
								<a href="#page49" id="ch4" onclick="choice_color('4')"><li><img src="../images/day1/78_btn_04_ar.png" alt=""></li></a>
								<a href="#page49" id="ch5" onclick="choice_color('5')"><li><img src="../images/day1/78_btn_05_ar.png" alt=""></li></a>
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
									<p>أحب الفرش الداخلي الأحمر الذي به نقطة حمراء رياضية مأخوذ من مفهوم السيارة الرياضية.</p>
								</div>		
								 <div id="textbox2" class="textbox">
									<p>أنا أفضل المزاج الأنيق للفرش الداخلي ذي اللون الأسود بالكامل.</p>
								</div>
								<div id="textbox3" class="textbox">
									<p>الرمادي هو اللون الذي لن أندم عليه لفترة طويلة، لذلك أود انتقاء الفرش الداخلي الرمادي</p>
								</div>
								<div id="textbox4" class="textbox">
									<p>حيث إنني رجل حضري أكثر منه ريفي، فإنني أحب الفرش الداخلي ذا اللون الأزرق النيلي.</p>
								</div>
								<div id="textbox5" class="textbox">
									<p>أحب الفرش الداخلي ذا اللون الأحمر البورغوندي لأنه من الواضح أن البورغوندي يمثل نقطة لون فريدة من نوعها.</p>
								</div> 
							</div>
						</div>
						<a href="#page50" id="go_page50" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<!-- <audio class="audio1" src="../tts/day1/tom/017.mp3"></audio>
					<audio class="audio2" src="../tts/day1/tom/018.mp3"></audio>
					<audio class="audio3" src="../tts/day1/tom/019.mp3"></audio>
					<audio class="audio4" src="../tts/day1/tom/020.mp3"></audio>
					<audio class="audio5" src="../tts/day1/tom/021.mp3"></audio> -->
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
									<p>النتيجة لمعظم ألوان الفرش الداخلي المحبوبة من سيارة i30.</p>
								</div>	
							</div>
						</div>
						<div class="imgwrap">	
							<ul>
								<li><span class="g_title">الأحمر</span><span class="g_num" id="red">25</span></li>
								<li><span class="g_title">الأسود</span><span class="g_num" id="black">5</span></li>
								<li><span class="g_title">الرمادي</span><span class="g_num" id="gray">20</span></li>
								<li><span class="g_title">الأزرق</span><span class="g_num" id="ind_blue">15</span></li>
								<li><span class="g_title">أحمر بورغوندي</span><span class="g_num" id="burgundy">10</span></li>
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
									<p>مهما قال الآخرون، اللون الأحمر هو المفضل لدي. استغرق الأمر مني أسبوعًا لاتخاذ قرار</p>
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
					<!-- <audio class="audio1" src="../tts/day1/036.mp3"></audio> -->
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
									<p>الآن، دعونا نلقي نظرة على لاغو دي كومو، أفضل بقعة لقضاء وقت الفراغ في إيطاليا.</p>
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
					<!-- <audio class="audio1" src="../tts/day1/037.mp3"></audio> -->
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
									<p>اكتسبت لاغو دي كومو مزيدًا من الشهرة بعدما أقام جورج كلوني وجون ليجيند حفلتا زفافهما هناك.</p>
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
					<!-- <audio class="audio1" src="../tts/day1/038.mp3"></audio> -->
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
									<p>أصبحت لاغو دي كومبو مكانًا معروفًا لقضاء العطلات في أوروبا لفترة طويلة.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="view_text">	
							<a href="#page54"><p>بحيرة كومو</p></a>
							<a href="#page54" id="go_page54" class="next_p_btn ui-btn go-next">
							<img src="../images/button/btn_next_02_@3x.png" alt="next button">
						</a>
						</div>
					</div>
					<!-- <audio class="audio1" src="../tts/day1/039.mp3"></audio> -->
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
									<p>من عصر القرون الوسطى، اختار العديد من اللوردات والفنانين لاغو دي كومو كمكان لقضاء وقت الفراغ.</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>المكان هنا جميل للغاية.</p>
								</div>
								<div id="textbox3" class="textbox">
									<p>تشعر كأنك مثل واحد في قصة خيالية، أليس كذلك؟</p>
								</div>
								<div id="textbox4" class="textbox">
									<p>علمت الآن لماذا يختار الناس هذا المكان لزيارته.</p>
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
					<!-- <audio class="audio1" src="../tts/day1/040.mp3"></audio>
					<audio class="audio2" src="../tts/day1/041.mp3"></audio>
					<audio class="audio3" src="../tts/day1/042.mp3"></audio>
					<audio class="audio4" src="../tts/day1/043.mp3"></audio> -->
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
									<p>حسنًا، دعونا الآن ننتقل إلى المحطة التالية.</p>
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
					<!-- <audio class="audio1" src="../tts/day1/044.mp3"></audio> -->
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
	<input type="hidden" id="LMS_LANGUAGE" name="LMS_LANGUAGE" value="ar">
	<!-- 여창민 대리 추가 (2017-03-30) : 끝 -->


	</div>
</div>
		<!-- <a href="#page48">컬러 이동</a><br>
		<a href="#page50">그래프 이동</a> -->

	</body>
</html>