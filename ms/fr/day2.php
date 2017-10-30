<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");
	header("Content-Type: text/html; charset=UTF-8");
	
	if($_SESSION["HY_LMS_SEQ"] > 0 ){
	}else{
		$tools->JavaGo("/pd/ms/fr/");
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
		<script src="../js/menu_day2_fr.js"></script>
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
					location.href="../fr/day3.php";
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
								<div id="logind_text">Préparation de notre voyage en cours...</div>
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
						<h1>JOUR 2.</h1>
						<div class="img_wrap">
							<img src="../images/button/08_point.png" alt="location point">
							<img src="../images/button/08_lodeline.png" alt="location">
							<p class="p1">Col du Stelvio </p>
							<p class="p2">Zurich</p>
						</div>
						<ul>
							<li>MOTEUR</li>
							<li>7 DCT</li>
							<li>Dimensions (coffre)</li>
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
						<p>On s’approche du Col du Stelvio, qui est à mon avis le point clé de notre voyage.</p>
					</div>
				</div>
				<div class="text_tip"><img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
			</div>
			<div class="imgwrap">
				<img src="../images/person/james_2.png" alt="james">
			</div>
		</div>
		<audio class="audio1" src="../tts/day2/045.mp3"></audio>
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
						<p>La route sinueuse du Col du Stelvio est un endroit de rêve pour les amateurs de conduite.</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>De nombreux modèles, toutes marques confondues, ont été testés ici.</p>
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
			<audio class="audio1" src="../tts/day2/046.mp3"></audio>
			<audio class="audio2" src="../tts/day2/047.mp3"></audio>
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
						<p>On croise encore de la neige dans les environs. Quel temps parfait pour un tour en voiture !</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>Nous sommes arrivés au Col de Stelvo. Et si on prenait un peu de vitesse ?</p>
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
		<audio class="audio1" src="../tts/day2/048.mp3"></audio>
		<audio class="audio2" src="../tts/day2/049.mp3"></audio>
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
						<p>Ma voiture est équipée du moteur 1.6 Turbo-GDI. Tu savais que sa puissance est supérieure à celle du moteur 1.8 Turbo de la Golf ?</p>
					</div>
				</div>
				<a href="#page61" id="go_page61" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
			</div>
		</div>
		<audio class="audio1" src="../tts/day2/050.mp3"></audio>
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
							<p>Le moteur Gamma 1.6 Turbo-GDI de l’i30 a une puissance et un couple supérieurs à ceux du moteur 1.8 Turbo de la Golf. Trop peu de personnes le savent, malheureusement.</p>
						</div>	
					</div>
				</div>	
			</div>
		<a href="#page63" id="go_page63" class="next_p_btn ui-btn go-next">
			<img src="../images/button/btn_next_02_@3x.png" alt="next button">
		</a>
		</div>
		<audio class="audio1" src="../tts/day2/tom/022.mp3"></audio>
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
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
				<div class="text">	
					<div id="textbox1" class="textbox">
						<p>Cette voiture possède également une transmission à double embrayage à 7 vitesses (DCT). C’est un moteur puissant avec des passages rapides.C’est incroyable !</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>La DCT fait ressentir le changement de vitesse sans perte de puissance. Tu peux ressentir tout son mérite dans les virages.</p>
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
		<audio class="audio1" src="../tts/day2/051.mp3"></audio>
		<audio class="audio2" src="../tts/day2/052.mp3"></audio>
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
					<p>Apprenons-en un peu plus sur la DCT ! Clique sur la vidéo !</p>
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
							<p>Le double embrayage offre un maximum de puissance au moteur et un changement rapide de vitesse, ce qui permet d’accélerer ou de freiner plus facilement sur les routes sinueuses.</p>
						</div>	
					</div>
				</div>	
			</div>
			<a href="#page64" id="go_page64" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<audio class="audio1" src="../tts/day2/tom/023.mp3"></audio>
		<audio class="audio2" src="../tts/day2/tom/024.mp3"></audio>
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
						<p>Lorsqu’on passe un virage en épingle comme ici, il est indispensable que la suspension arrière colle bien à la route.</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>Tu vois ? Il n’y a pas de glissement à vitesse normale.</p>
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
		<audio class="audio1" src="../tts/day2/053.mp3"></audio>
		<audio class="audio2" src="../tts/day2/054.mp3"></audio>
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
						<p>Tu te souviens du système multibras qui assurait la stabilité de la voiture dans les rues de Milan ? C’est ce même système qui permet également à la partie arrière de mieux coller à la route lors des virages, même à grande vitesse.</p>
					</div>	
					<div id="textbox2" class="textbox">
						<p>Lorqu’on roulera sur des routes sinueuses, tu comprendras le vrai mérite du système de suspension multibras.</p>
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
		<audio class="audio1" src="../tts/day2/tom/025.mp3"></audio>
		<audio class="audio2" src="../tts/day2/tom/026.mp3"></audio>
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
						<p>Appliquez les adhésifs structuraux !</p>
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
							<p>Les adhésifs métaux à haute résistance au niveau du châssis de l’i30 renforcent sa rigidité et sa durabilité. Si je ne me trompe pas, ce sont près de 112 mètres d’adhésifs qui ont été utilisés. </p>
						</div>	
					</div>
				</div>	
			</div>
			<a href="#" class="next_finger ui-link"><img src="../images/button/touchfinger_@3x.png" alt="next button"></a>
			<a href="#page68" id="go_page68" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<audio class="audio1" src="../tts/day2/tom/027.mp3"></audio>
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
						<p>Ah ! C’est pour ça que j’avais l’impression de ne faire qu’un avec la voiture, même quand j’enchaînais plusieurs virages successifs à grande vitesse.<br>Extraordinaire, j’adore !</p>
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
		<audio class="audio1" src="../tts/day2/055.mp3"></audio>
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
						<p>Faisons une petite pause ici.</p>
					</div>
				</div>
				<div class="text_tip">
					<img src="../images/button/tail_3_@3x.png" alt="text box">
				</div>
			</div>
			<div class="view_text">	
				<a href="#page70"><p>Col du Stelvio</p></a>
				<a href="#page70" id="go_page70" class="next_p_btn ui-btn go-next">
					<img src="../images/button/btn_next_02_@3x.png" alt="next button">
				</a>
			</div>
		</div>
		<audio class="audio1" src="../tts/day2/056.mp3"></audio>
	</section>

	<section data-role="page" id="page70" class="container fr">
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
						<p>Vous savez pourquoi la route du Col de Stelvio est devenu célèbre ? Parce qu’elle offre une vue magnifique sur les Alpes.</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>Ce sont les routes qu’on vient de traverser. Impressionant, non ? On a passé combien de virages en épingle ?<br>C’était vraiment fun !</p>
					</div>
					<div id="textbox3" class="textbox">
						<p>Un moteur d’une puissance remarquable Une transmission à double embrayage à 7 vitesses Une rigidité de la carrosserie optimale Un système de suspension arrière multibras</p>
					</div>
					<div id="textbox4" class="textbox">
						<p>La combinaison de tous ces facteurs ça fait de l’i30 une voiture très agréable à conduire !</p>
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
			<audio class="audio1" src="../tts/day2/057.mp3"></audio>
			<audio class="audio2" src="../tts/day2/058.mp3"></audio>
			<audio class="audio3" src="../tts/day2/059.mp3"></audio>
			<audio class="audio4" src="../tts/day2/060.mp3"></audio>
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
						<p>C’était comment ?<br>Tu n’as pas eu peur ?<br>J’espère que cette promenade t’as plu. En tout cas, moi, j’ai adoré.</p>
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
		<audio class="audio1" src="../tts/day2/061.mp3"></audio>
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
						<p>Dépêchons-nous, on va redescendre.<br>Direction l’un des meilleurs terrains de camping d’Europe.</p>
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
		<audio class="audio1" src="../tts/day2/062.mp3"></audio>
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
						<p>On se dirige vers un endroit qui s’appelle Fischers Fritz à Zurich, en Suisse.<br>Vas-y, cllique sur Zurich.</p>
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
		<audio class="audio1" src="../tts/day2/063.mp3"></audio>
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
						<p>Comme tu le sais, Zurich est une des plus grandes villes de Suisse.<br>On y trouve un formidable lac, et juste à côté une rivière du nom de Limmat.</p>
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
		<audio class="audio1" src="../tts/day2/064.mp3"></audio>
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
						<p>Avant d’explorer le centre-ville, on va déposer nos valises au camping.</p>
					</div>
				</div>
			</div>
			<a href="#page76" id="go_page76" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<audio class="audio1" src="../tts/day2/065.mp3"></audio>
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
						<p>On est arrivé à Fischers fritz.</p>
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
		<audio class="audio1" src="../tts/day2/066.mp3"></audio>
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
						<p>C’est un des camping les plus prisés en Europe.</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>Ca faisait longtemps que Je voulais venir ici. On s’installe là ?</p>
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
		<audio class="audio1" src="../tts/day2/067.mp3"></audio>
		<audio class="audio2" src="../tts/day2/068.mp3"></audio>
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
						<p>L’i30 est une voiture spacieuse. Comme tu peux le constater, son  coffre est vraiment grand. On peut y mettre tous nos bagages pour le voyage.</p>
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
		<audio class="audio1" src="../tts/day2/069.mp3"></audio>
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
						<p>Quelle est la capacité maximale du coffre ?</p>
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
							<p>La capacité maximale du coffre de la nouvelle i30 est de 395 litres.</p>
						</div>	
					</div>
				</div>	
			</div>
			<a href="#" class="next_finger ui-link"><img src="../images/button/touchfinger_@3x.png" alt="next button"></a>
			<a href="#page81" id="go_page81" class="next_p_btn ui-btn go-next">
				 <img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a> 
		</div>
		<audio class="audio1" src="../tts/day2/tom/028.mp3"></audio>
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
							<p>Wow, on peut vraiment y mettre un enormement de choses.</p>
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
		<audio class="audio1" src="../tts/day2/070.mp3"></audio>
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
						<p>Il faut maintenant installer la tente.Pendant ce temps, pourquoi on n’écouterait pas un peu de musique ?</p>
					</div>
				</div>
			</div>
			<a href="#page83" id="go_page83" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<audio class="audio1" src="../tts/day2/071.mp3"></audio>
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
						<p>Attends, j’ai besoin de mon portable pour la synchronisation. Mais où est-ce que je l’ai mis ?</p>
					</div>		
				</div>
			</div>
			<a href="#page84" id="go_page84" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<audio class="audio1" src="../tts/day2/tom/029.mp3"></audio>
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
						<p>Quel type de smartphone as-tu ?</p>
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
						<p>Synchronisation terminée</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>Lancement de la musique</p>
					</div>
				</div>
			</div>
			<a href="#page86" id="go_page86" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<audio class="audio1" src="../tts/day2/music1.mp3"></audio>
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
					<p>L’interface de l’i30 permet l’usage d’un internet partagé, du service mobile, du contrôle à distance, de l’assistance à la navigation et de l’appel téléphonique via Android Auto. En fait, tu peux utiliser la plupart des fonctions d’un smartphone.</p>
				</div>
			</div>
			<a href="#page89" id="go_page89" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<audio class="audio1" src="../tts/day2/tom/030.mp3"></audio>
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
						<p>Synchronisation terminée</p>
					</div>
					<div id="textbox2" class="textbox">
						<p>Lancement de la musique</p>
					</div>
				</div>
			</div>
			<a href="#page88" id="go_page88" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<audio class="audio1" src="../tts/day2/music2.mp3"></audio>
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
					<p>L’i30 accepte l’Apple Car Play qui permet d’utiliser le système de navigation, de passer un appel et de mettre de la musique avec une simple synchronisation.</p>
				</div>
			</div>
			<a href="#page89" id="go_page89" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<audio class="audio1" src="../tts/day2/tom/031.mp3"></audio>
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
						<p>Pourquoi ne pas augmenter le volume pendant qu’on installe la tente ?</p>
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
		<audio class="audio1" src="../tts/day2/tom/032.mp3"></audio>
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
							<p>Tu as bon goût niveau musique.On doit se dépêcher avant que le soleil ne se couche.</p>
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
		<audio class="audio1" src="../tts/day2/072.mp3"></audio>
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
						<p>Mince ! J’ai presque plus de batterie. Tu peux le mettre à charger pour moi ?</p>
					</div>
				</div>
			</div>
			<a href="#page92" id="go_page92" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<audio class="audio1" src="../tts/day2/073.mp3"></audio>
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
						<p>Veuillez poser votre portable sur le chargeur sans fil</p>
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
						<p>Tu peux facilement recharger ton portable avec le chargeur sans fil.<br>Quand la batterie est pleine, la lumière du chargeur tourne au  vert.</p>
					</div>
				</div>
			</div>
			<a href="#page94" id="go_page94" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<audio class="audio1" src="../tts/day2/tom/033.mp3"></audio>
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
							<p>Il fait déjà sombre.<br>Ça fait du bien de camper à côté d’un superbe lac, n’est-ce pas ?</p>
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
		<audio class="audio1" src="../tts/day2/074.mp3"></audio>
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
						<p>Bon, je vais nous jouer un peu de musique.</p>
					</div>
				</div>
			</div>
			<a href="#page96" id="go_page96" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<audio class="audio1" src="../tts/day2/075.mp3"></audio>
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
						<p>Allez, on passe une bonne nuit et demain, on visite Zurich, ok ?</p>
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
		<audio class="audio1" src="../tts/day2/076.mp3"></audio>
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
						<p>Tu as bien dormi ?<br>On fait nos valises et on repart !</p>
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
		<audio class="audio1" src="../tts/day2/077.mp3"></audio>
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
						<p>Allez, on rembarque nos valises ?</p>
					</div>
				</div>
			</div>
			<a href="#page99" id="go_page99" class="next_p_btn ui-btn go-next">
					<img src="../images/button/btn_next_02_@3x.png" alt="next button">
				</a>
		</div>
		<audio class="audio1" src="../tts/day2/078.mp3"></audio>
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
						<p>Veuillez toucher le bouton pour charger vos baggages.</p>
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
						<p>Les sièges arrières peuvent être rabattus avec un simple bouton.</p>
					</div>
				</div>
			</div>
			<a href="#page101" id="go_page101" class="next_p_btn ui-btn go-next">
				<img src="../images/button/btn_next_02_@3x.png" alt="next button">
			</a>
		</div>
		<audio class="audio1" src="../tts/day2/tom/034.mp3"></audio>
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
							<p>Toutes les valises sont chargées.<br>En route !</p>
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
		<audio class="audio1" src="../tts/day2/079.mp3"></audio>
	</section>
	
	<div id="landscape_popup" class="landscape_popup">
		<a href="#" class="layer_landscape">
			<div class="box">
				<img class="icon-device" src="../images/icon_phonerotation_@3x.png" alt="">
				<p>Tournez l’écran en mode paysage.</p>
			</div>
		</a>
	</div>
	



	<!-- 여창민 대리 추가 (2017-03-30) : 시작 -->
	<input type="hidden" id="SESSION_LMS_SEQ" name="SESSION_LMS_SEQ" value="<?=$_SESSION["HY_LMS_SEQ"]?>">
	<!-- 여창민 대리 추가 (2017-03-30) : 끝 -->

</div>

</div>


<!-- <a href="#page63001">이동!!!!!!!!!</a> -->



