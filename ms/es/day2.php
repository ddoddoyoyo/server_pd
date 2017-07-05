<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");
	header("Content-Type: text/html; charset=UTF-8");
	
	

	if($_SESSION["HY_LMS_SEQ"] > 0 ){
		//$tools->JavaGo("/genesis/part1/en/main.php");
	}else{
		$tools->JavaGo("/pd/ms/es/");
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
		<link rel="stylesheet" href="../css/menu_day2.css">
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
		<script src="../js/menu_day2_es.js"></script>
		<script src="../common/js/common.js"></script>
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
					location.href="../es/day3.php";
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
								<img src="../images/loading_short_4sec.gif" alt="">
							</div>
							<div class="loding_bar">
								<img src="../images/loading_bar_1.png" alt="" class="londing1">
								<img src="../images/loading_bar_2.png" alt="" class="londing2">
								<div id="logind_text">Preparando nuestro viaje…</div>
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
						<h1>DÍA 2.</h1>
						<div class="img_wrap">
							<img src="../images/button/08_point.png" alt="location point">
							<img src="../images/button/08_lodeline.png" alt="location">
							<p class="p1">Paso Stelvio</p>
							<p class="p2">Zúrich</p>
						</div>
						<ul>
							<li>Turbo </li>
							<li>7 DCT</li>
<!-- 							<li>Connectivity</li> -->
							<li>Espacio (cajuela)</li>
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
						<p>Desde aquí, iremos hacia el Paso Stelvio, el que creo ser el plato fuerte de este viaje.</p>
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
						<p>Con caminos de mucho viento, el Paso Stelvio es como un lugar de ensueño para los apasionados de la conducción.</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>Y muchos modelos de otras marcas de carros son sometidos a pruebas de desempeño aquí.</p>
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
						<p>Aquí todavía podemos ver un poco de nieve, ¡pero el clima es simplemente excelente para conducir!</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>Estamos aquí, en el Paso Stelvo. ¿Comienzo a acelerar?</p>
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
						<p>Mi carro tiene un motor 1.6 Turbo-GDI. ¿Sabías que tiene más caballos de fuerza que el motor del Golf 1.8 Turbo?</p>
					</div>
				</div>
				<a href="#page61" id="go_page61" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
			</div>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/050.mp3"></audio> -->
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
							<p>El motor Gamma 1.6 Turbo-GDI del i30 tiene más caballos de fuerza y torque que el motor del Golf 1.8 Turbo. Desafortunadamente, no mucha gente sabe esto.</p>
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
						<p>Este carro tiene una transmisión de doble embrague (DCT) de 7 velocidades. Un potente motor con cambios rápidos. ¿Puedes creerlo?</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>El DCT tiene esa sensación directa sin perdida de poder cuando cambia de velocidad. Puedes sentir el verdadero valor de esta función en caminos sinuosos.</p>
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
					<p>¡Vamos a aprender acerca del DCT! ¡Haz clic en el video!</p>
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
							<p>La transmisión de doble embrague de cambios rápidos ofrece la máxima potencia del motor para facilitar la aceleración y desaceleración en caminos sinuosos.</p>
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
						<p>Cuando pasamos por una curva de volteo como esta, la fuerza de agarre de la suspensión trasera es un elemento central.</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>¿Te das cuenta? No hay deslizamiento a una velocidad considerable.</p>
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
						<p>¿Recuerdas el sistema multi-link que hacia que la conducción fuera estable en los caminos de Milán?<br>Ese sistema multi-link también contribuye a la fuerza de agarre trasero estable cuando pasamos una curva a alta velocidad.</p>
					</div>	
					<div id="textbox2" class="textbox">
						<p>Especialmente cuando conducimos en caminos sinuosos, verás el verdadero valor del sistema de suspensión multi-link.</p>
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
						<p>¡Aplicar el adhesivo estructurales!</p>
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
							<p>El chasis del i30 utiliza adhesivo para metal de alta resistencia para mejorar la rigidez de la carrocería y la durabilidad. Si no me equivoco, se utilizaron 112 metros de adhesivo estructurales.</p>
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
						<p>¡Wow! Por eso me sentí tan conectado con el carro cuando estaba tomando las curvas a alta velocidad de forma repetida. ¡Qué emoción, me encanta!</p>
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
						<p>Vamos a tomar un descanso aquí.</p>
					</div>
				</div>
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
			</div>
			<div class="view_text">	
				<a href="#page70"><p>Paso Stelvio</p></a>
				<a href="#page70" id="go_page70" class="next_p_btn ui-btn go-next">
					<img src="../images/button/btn_next_02_@3x.png" alt="next button">
				</a>
			</div>
		</div>
		<!-- <audio class="audio1" src="../tts/day2/056.mp3"></audio> -->
	</section>

	<section data-role="page" id="page70" class="container es">
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
						<p>¿Sabes por qué el Paso Stelvio se convirtió en un camino sinuoso famoso a nivel mundial? Debido a que conecta varias montañas de los Alpes, tiene vistas impresionantes.</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>Estos son los caminos por los que acabamos de pasar. Estás bastante mareado, ¿verdad?<br>¿Cuántas curvas de volteo pasamos?<br>Fue muy divertido.</p>
					</div>
					<div id="textbox3" class="textbox">
						<p>Un motor notablemente poderoso DCT de 7 velocidades, carrocería rígida, sistema de suspensión trasera multi-link.</p>
					</div>
					<div id="textbox4" class="textbox">
						<p>La combinación de todas estas características hacen del i30 un carro muy divertido de conducir!</p>
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
						<p>¿Qué tal estuvo?<br>¿No fue un poco intimidante?<br>Espero que hayas disfrutado de los magníficos caminos sinuosos porque yo definitivamente lo hice.</p>
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
						<p>Apresúrate, vamos de regreso hacia abajo.<br>Vamos hacia unos de los mejores sitios para acampar en Europa.</p>
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
		<!-- <audio class="audio1" src="../tts/day2/062.mp3"></audio> -->
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
						<p>Vamos a ir a un lugar llamado Fischers Fritz en Zúrich, Suiza.<br>Haz clic en Zúrich.</p>
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
						<p>Como bien sabes, Zúrich es la ciudad más grande de Suiza.<br>El hermoso lago de Zúrich está justo junto a la ciudad y también el Río Limmat.</p>
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
						<p>Antes de ir al centro de la ciudad, primero vamos a conducir directo hacia el sitio para acampar y desempacaremos.</p>
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
						<p>Ahora estamos en Fischers Fritz.</p>
					</div>
				</div>
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
			</div>
			<div class="view_text">	
				<a href="#page77"><p>Fischers Fritz</p></a>
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
						<p>Es uno de los sitios más famosos para acampar en Europa que muchos amantes de camping visitan.</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>Siempre quise acampar aquí, desde hace mucho tiempo.<br>Vamos a desempacar aquí.</p>
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
		<div class="main_wrap">
			<div class="textwrap">	
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>El i30 es un carro realmente espacioso.<br>Como puedes ver, la cajuela es muy grande.<br>Pudimos cargar todo el equipaje que necesitamos para este viaje.</p>
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
						<p>¿Cuál es la capacidad máxima de carga de la cajuela?</p>
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
							<p>El nuevo i30 aumentó el espacio del porta equipajes a 395 litros, ostentando una cajuela muy espaciosa.</p>
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
							<p>Wow, realmente puede cargar muchas cosas.</p>
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
						<p>Así que vamos a armar la tienda de campaña.<br>Mientras la estoy armando, ¿por qué no pones algo de música?</p>
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
						<p>Espera un segundo, primero necesito un teléfono para sincronizarlo, ¿dónde está mi teléfono?</p>
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
						<p>¿Qué tipo de smartphone tienes?</p>
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
						<p>Sincronización completada.</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>Reproducir música</p>
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
					<p>El i30 ofrece internet compartido, servicio móvil, asistente de voz para la navegación y llamadas de voz a través de Android Auto.<br>Puedes usar la mayoría de las funciones de tu smartphone.</p>
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
						<p>Sincronización completada.</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>Reproducir música</p>
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
					<p>El i30 soporta Apple CarPlay, con el cual, después de hacer una sincronización sencilla, se puede utilizar el sistema de navegación, hacer llamadas y reproducir música.</p>
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
						<p>¿Por qué no subimos el volumen mientras ponemos la tienda de campaña, amigo?</p>
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
							<p>Realmente tienes buen gusto musical.<br>Vamos, debemos terminar antes del atardecer.</p>
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
						<p>¡Ah, sí! mi batería casi está muerta. ¿Puedes ponerla a cargar por mí?</p>
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
						<p>Por favor pon tu teléfono en el cargador inalámbrico.</p>
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
						<p>Puedes cargar convenientemente tu teléfono con el cargador inalámbrico. Cuando la carga es completada, ¡la lámpara del cargador se ilumina de color verde.</p>
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
							<p>Ya se hizo de noche. ¿No es genial ver el lago mientras acampas?</p>
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
						<p>Muy bien, déjame tocar una canción para esta grandiosa noche.</p>
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
						<p>Vamos a dormir bien por ahora y echar un vistazo mañana en Zúrich.</p>
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
						<p>¿Dormiste bien?<br>Vamos a empacar y seguir adelante.</p>
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
						<p>Aquí vamos, vamos a cargar las cosas de nuevo en el carro?</p>
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
						<p>Por favor toca el botón para cargar el equipaje.</p>
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
						<p>Con la conveniente función de un toque puedes plegar los asientos traseros con tan solo el toque de un pestillo.</p>
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
							<p>Muy bien, todo está cargado.<br>¡Vamos a seguir adelante!</p>
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
			<a href="/pd/en/day3.php" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
	</section> -->
	

	



	<!-- 여창민 대리 추가 (2017-03-30) : 시작 -->
	<input type="hidden" id="SESSION_LMS_SEQ" name="SESSION_LMS_SEQ" value="<?=$_SESSION["HY_LMS_SEQ"]?>">
	<!-- 여창민 대리 추가 (2017-03-30) : 끝 -->

</div>

</div>


<!-- <a href="#page63001">이동!!!!!!!!!</a> -->



