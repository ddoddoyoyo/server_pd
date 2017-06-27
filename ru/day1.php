<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");
	header("Content-Type: text/html; charset=UTF-8");
	

	if($_SESSION["HY_LMS_SEQ"] > 0 ){
		//$tools->JavaGo("/genesis/part1/en/main.php");
	}else{
		$tools->JavaGo("/pd/tr/");
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
		<script src="../js/menu_day1_ru.js"></script>
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
				location.href="/pd/ru/day2.php";
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
				<section data-role="page" id="page1001" class="container ru"> 
					<div data-role="main" class="ui-content">
						<div class="imgwrap">
							<div class="gif_img">
								<img src="/pd/images/loading_short_4sec.gif" alt="">
							</div>
							<div class="loding_bar">
								<img src="/pd/images/loading_bar_1.png" alt="" class="londing1">
								<img src="/pd/images/loading_bar_2.png" alt="" class="londing2">
								<div id="logind_text">Идет подготовка к поездке</div>
							</div>
						</div>
					</div>
				</section>

				

				<section data-role="page" id="page2" class="container"> 
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">	
								<h2 class="pointColor"><?=$_SESSION["HY_LMS_NAME"]?>!</h1>
								<p>Я Джеймс!<br><span class="pointColor">Наконец то, я получил i30, который ждал!</span><br>Теперь мы можем отправиться в запланированную поездку. <br>Садитесь в машину!</p>
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
								<p>Поверните устройство, чтобы сменить ориентацию экрана на ландшафтную.</p>
								<p class="ok_btn">OK</p>
							</div>
						</a>
					</div>
				</section>

				<section data-role="page" id="page3001" class="container ru">
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
									<p>Прежде чем мы отправимся в поездку, позвольте мне показать вам этот ролик. После того, как я сам посмотрел его, я решил купить i30.</p>
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
								<p>Вместе с вами я отправляюсь в трехдневную поездку по 6 городам. Маршрут я уже составил.<br>Давайте продолжим.</p>
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
									<p>Мы начнем наше путешествие с Милана, сделаем остановку у озера Комо и на перевале Стельвио и доедем до Швейцарии.</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>В Швейцарии, мы сделаем остановки в Цюрихе и Берне, а затем отправимся в Страсбург, наш конечный пункт.</p>
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
									<h1>День 1.</h1>
									<div class="img_wrap">
										<img src="../images/button/08_point.png" alt="location point">
										<img src="../images/button/08_lodeline.png" alt="location">
										<p class="p1">МИЛАН</p>
										<p class="p2">КОМО</p>
									</div>
									<ul>
										<li>Экстерьер</li>
										<li>Рама кузова</li>
										<li>Подвеска</li>
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
									<p>Наше путешествие начинается в Милане. Разве это не захватывающе?</p>
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
								<p>Здесь будет наша первая остановка!<br>Я не мог пропустить Миланский собор с его утонченной красотой. Он является символом Милана.</p>
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
									<p>Чудесный день, чтобы отправиться в поездку на моем первом автомобиле.<br>Ощущения превосходные!</p>
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
									<p>В Италии дороги узкие. При этом они сохранили мощеные дороги как историческое наследие.</p>
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
					<div data-role="main" class="ui-content ui-content">
						<div class="textwrap">
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
							<div class="text">	
								<div id="textbox1" class="textbox">
									<p>Несмотря на очень плохое состояние дороги, ехать в этой машине комфортно.<br>Я слышал, что жесткость кузова i30 была увеличена, и я чувствую, что он устойчивый.</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>Я в этом точно уверен, ведь я еду по дорогам без покрытия!</p>
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

				<section data-role="page" id="page13" class="container ru">
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
									<p>Давайте используем AHSS (прогрессивная сталь повышенной прочности)</p>
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
						<img src="../images/tryagain_X_ru.png"" alt="">
					</div>
					<div class="good">
						<img src="../images/tryagain_O_ru.png"" alt="">
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
									<p>Чтобы сделать раму кузова более жесткой, AHSS была использована для изготовления<span>?</span>критически важных элементов нового i30, что гораздо больше по сравнению с 27,2% у предыдущей модели.</p>
								</div>	
								<div id="textbox2" class="textbox">
									<p>Какой ответ Джеймсу будет правильным?</p>
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
								<p>Рама кузова нового i30 стала крепче благодаря увеличенному количеству элементов из высокопрочной стали - 53,5%</p>
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
									<p>Понятно. Вот почему я ощущаю комфорт и устойчивость.<br>О, вы работаете в Hyundai, не так ли?</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>Вы знаете гораздо больше, чем я ожидал. Надеюсь, что многое от вас узнаю во время поездки.</p>
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
									<p>Вот, мы подъезжаем к Миланскому собору.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="view_text">	
							<a href="#page18"><p>Милан. Миланский собор.</p></a>
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
									<p>Вам нужно это знать. Миланский собор — одно из «1001 здания, которое нужно увидеть».</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>В этом огромном соборе есть множество изящных скульптур.</p>
								</div>
								<div id="textbox3" class="textbox">
									<p>С крыши собора виден весь Милан.</p>
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
									<p>Поторопитесь!<br>Нужно ехать дальше.</p>
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
									<p>Видите, как много в городе узких ухабистых дорог.<br>Может, это из-за городских трамваев?</p>
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

				<section data-role="page" id="page21" class="container ru">
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
									<p>На этом хэтчбеке, действительно, удобно перемещаться по городу благодаря его компактным размерам. Чувствуется, что задняя часть очень мягко приземляется при движении по ухабистой дороге.</p>
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
									<p>Вы знаете, что многорычажной подвеской обычно оснащают спортивные автомобили для обеспечения более надежного сцепления с дорогой?</p>
								</div>	
								<div id="textbox2" class="textbox">
									<p>i30 имеет подвеску с 5 рычагами, которая обеспечивает стабильное сцепление с дорогой любого типа.</p>
								</div>
								<div id="textbox3" class="textbox">
									<p>По-настоящему оценить достоинства многорычажной подвески можно на извилистой дороге.</p>
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
									<p>Понятно. Когда я покупал автомобиль, мне просто сказали, что многорычажная подвеска это хорошо, но ваше объяснение технической стороны вопроса оказалось для меня гораздо полезней.</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>Поскорей бы выехать на извилистую дорогу.</p>
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
									<p>Впереди замок Сфорца</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="view_text">	
							<a href="#page26"><p>Милан. Замок Сфорца.</p></a>
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
									<p>Вы знаете, что в работе над интерьером замка Сфорца принимали участие Леонардо да Винчи и Браманте?</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>Это характерный пример архитектуры Ренессанса XV века.</p>
								</div>
								<div id="textbox3" class="textbox">
									<p>Построил замок Франческо Сфорца.</p>
								</div>
								<div id="textbox4" class="textbox">
									<p>В наши дни здесь открыты музей и художественная галерея.</p>
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
									<p>Это масштабное строение очень хорошо сохранилось.</p>
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
								<p>Эти великолепные архитектурные сооружения — захватывающее зрелище. Классный дизайн i30 также обращает на себя внимание.</p>
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
									<p>Каскадная решетка радиатора еще больше подчеркивает спортивный образ, а увеличенная эмблема объединена с радаром, обеспечивающим работу интеллектуальных систем безопасности.</p>
								</div>	
								<div id="textbox2" class="textbox">
									<p>Контур решетки очень изящный, и это моя любимая деталь дизайна.</p>
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
									<p>Давайте проведем характерную боковую линию i30.</p>
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
									<p>Конечно, это компактный автомобиль, но он выглядит очень элегантно! Удлиненный капот и характерная линия, идущая вдоль боковой части кузова, визуально удлиняют его.</p>
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
									<p>На спойлере установлен светодиодный стоп-сигнал, а сдвоенный наконечник глушителя — уникальная деталь, которой нет у многих других автомобилей. На мой вкус, дизайн этой машины гораздо лучше, чем у Golf.</p>
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
									<p>Давайте поедем дальше, к озеру Комо.</p>
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
									<p>Нам нужно спешить, чтобы успеть до заката.</p>
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

				<section data-role="page" id="page39" class="container ru">
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
									<p>Уже темнеет. Я слышал, что у i30 светодиодные фары, которые гораздо ярче освещают пространство впереди автомобиля.</p>
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
									<p>Да, они действительно яркие. Я могу видеть гораздо дальше, а система автоматического переключения дальнего света облегчает поездку по горной дороге.</p>
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
								<p>Уже поздно, поэтому мы переночуем здесь, в хостеле.</p>
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
									<p>Спокойной ночи. Увидимся завтра.</p>
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
							<img src="../images/day1/btn_wakingup_ru.png" alt="">
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
									<p>Прежде чем мы отправимся дальше, давайте наведем порядок внутри автомобиля.</p>
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
									<p>Вот теперь он чистый, как будто только что с завода.</p>
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
									<p>Всего имеется пять вариантов расцветки интерьера, и вы выбрали красный. Давайте узнаем, какие еще есть цвета.</p>
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
									<p><strong>Ярко-красный</strong> цвет хорошо контрастирует с черной кожей.</p>
								</div>	
								<div id="textbox2" class="textbox">
									<p><strong>Черные</strong> ткань и кожа придают интерьеру современный вид.</p>
								</div>
								<div id="textbox3" class="textbox">
									<p>Кожаные элементы <strong>серого</strong> цвета соответствуют строгому образу.</p>
								</div>
								<div id="textbox4" class="textbox">
									<p><strong>Цвет индиго</strong> ассоциируется с молодостью и приподнятым настроением.</p>
								</div>
								<div id="textbox5" class="textbox">
									<p>Эффектный <strong>бордовый цвет</strong> как элегантный и яркий штрих.</p>
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
									<p>Выберите больше всего понравившийся вам цвет интерьера.</p>
								</div>	
							</div>
						</div>
						<!-- 여창민 대리 추가 (2017-03-30) : 시작 -->
						
						
						<div class="imgwrap">
							<ul class="choice_color">
								<a href="#page49" id="ch1" onclick="choice_color('1')"><li><img src="../images/day1/78_btn_01_ru.png" alt=""></li></a>
								<a href="#page49" id="ch2" onclick="choice_color('2')"><li><img src="../images/day1/78_btn_02_ru.png" alt=""></li></a>
								<a href="#page49" id="ch3" onclick="choice_color('3')"><li><img src="../images/day1/78_btn_03_ru.png" alt=""></li></a>
								<a href="#page49" id="ch4" onclick="choice_color('4')"><li><img src="../images/day1/78_btn_04_ru.png" alt=""></li></a>
								<a href="#page49" id="ch5" onclick="choice_color('5')"><li><img src="../images/day1/78_btn_05_ru.png" alt=""></li></a>
							</ul>
						</div>
						<!-- 여창민 대리 추가 (2017-03-30) : 끝 -->
					</div>
				</section>

				<section data-role="page" id="page49" class="container ru">
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
									<p>Мне нравится интерьер со спортивными красными вставками, характерными для спорт-каров.</p>
								</div>		
								 <div id="textbox2" class="textbox">
									<p>Я предпочитаю атмосферу шика, которую создает полностью черный интерьер.</p>
								</div>
								<div id="textbox3" class="textbox">
									<p>Серый — это цвет, который мне долго не надоест, поэтому я выбирают серый интерьер.</p>
								</div>
								<div id="textbox4" class="textbox">
									<p>Поскольку, я городской человек, мне нравится интерьер цвета индиго.</p>
								</div>
								<div id="textbox5" class="textbox">
									<p>Мне нравится эффектный бордовый интерьер, потому что бордовый цвет лучше выражает индивидуальность.</p>
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
									<p>Наиболее популярные цвета интерьера i30.</p>
								</div>	
							</div>
						</div>
						<div class="imgwrap">	
							<ul>
								<li><span class="g_title">КРАСНЫЙ</span><span class="g_num" id="red">25</span></li>
								<li><span class="g_title">ЧЕРНЫЙ </span><span class="g_num" id="black">5</span></li>
								<li><span class="g_title">СЕРЫЙ </span><span class="g_num" id="gray">20</span></li>
								<li><span class="g_title">ИНДИГО </span><span class="g_num" id="ind_blue">15</span></li>
								<li><span class="g_title">БОРДОВЫЙ</span><span class="g_num" id="burgundy">10</span></li>
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
									<p>Что бы ни говорили другие, мой любимый — красный. Я целую неделю выбирал.</p>
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
									<p>Теперь же давайте полюбуемся на озеро Комо, лучшее в Италии место отдыха.</p>
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
									<p>Озеро Комо получило еще большую известность после того, как здесь сыграли свои свадьбы Джордж Клуни и Джон Ледженд.</p>
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
									<p>Озеро Комо также уже давно известно как одно из мест для отдыха в Европе.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="../images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="view_text">	
							<a href="#page54"><p>Озеро Комо</p></a>
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
									<p>Еще в средневековье многие лорды и художники выбирали для отдыха озеро Комо.</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>Здесь просто так красиво.</p>
								</div>
								<div id="textbox3" class="textbox">
									<p>Прямо как в сказке, не так ли?</p>
								</div>
								<div id="textbox4" class="textbox">
									<p>Теперь я понимаю, почему люди ездят сюда.</p>
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
									<p>Ладно, давайте продолжим наш путь.</p>
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
	<input type="hidden" id="LMS_LANGUAGE" name="LMS_LANGUAGE" value="tr">
	<!-- 여창민 대리 추가 (2017-03-30) : 끝 -->


	</div>
</div>
		<!-- <a href="#page48">컬러 이동</a><br>
		<a href="#page50">그래프 이동</a> -->

	</body>
</html>