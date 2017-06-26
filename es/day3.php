<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");
	header("Content-Type: text/html; charset=UTF-8");
	
	

	if($_SESSION["HY_LMS_SEQ"] > 0 ){
		//$tools->JavaGo("/genesis/part1/en/main.php");
	}else{
		$tools->JavaGo("/pd/es/");
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
		<!-- <link rel="stylesheet" href="../css/styles.css"> -->
		<link rel="stylesheet" href="/pd/css/styles_day3.css">
		<link rel="stylesheet" href="/pd/css/menu_day3.css">
		<!-- <link rel="stylesheet" href="/pd/css/day3.css"> -->
		<link rel="stylesheet" href="/pd/css/Nwagon.css">
		<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script>
		  //주소창 없애기
			// $(document).on("mobileinit", function () {
			// 	 $.mobile.hashListeningEnabled = false;
			// 	 $.mobile.pushStateEnabled = false;
			// 	 $.mobile.changePage.defaults.changeHash = false;
			// });
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
		<script src="../js/menu_day3_es.js"></script>
		<script src="/pd/js/Nwagon.js"></script>
		<script src="/pd/common/js/common.js"></script>
		<script>
		window.onload = function(){
			setTimeout(function(){
				var t = performance.timing;
				var s =  (t.loadEventEnd - t.navigationStart);
				//console.log(s - 2000);
				$('.loding_bar .londing2').animate({"width":"100%"}, s);
				setTimeout(function(){
					$.mobile.changePage("#pageStart");
				}, s-1);
			},0);
		}

		$(document).ready(function(){
				// enter key 금지
				//console.log($("#current-img").height() );
				//console.log($("#current-img").width() );

			 // $.mobile.hashListeningEnabled = false;
			 // $.mobile.pushStateEnabled = false;
			 // $.mobile.changePage.defaults.changeHash = false;

			 function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader(); //파일을 읽기 위한 FileReader객체 생성
					reader.onload = function (e) {
					//파일 읽어들이기를 성공했을때 호출되는 이벤트 핸들러
						$("#upload-img").attr("src", e.target.result);

						var img = new Image;
						var imgWidth = 0;
						var imgheight = 0;
						img.src=reader.result;
						img.onload = function() {
							imgWidth = img.width;
							imgheight = img.height;
							//console.log("w : " + imgWidth);
							//console.log("h : " + imgheight);
							
							if(imgheight >= imgWidth){
								$("#upload-img").css({"width":"100%","height":"auto"});
							} else {
								$("#upload-img").css({"width":"auto", "height":"100%"});
							} 
						};
					} 
						reader.readAsDataURL(input.files[0]);                 
					
				}
			}

			$("#upload").change(function(){
					readURL(this);
				});
			
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

			$("#page6").on({
				"pagebeforeshow" : function() {
					$("#page6 .titlewrap .text_i #textbox1 p").html('Reducción del número de partes');
					next_Count = 1;
				}
			});
			
				
			$("#page6 #go_next1").click(function() {
				if (next_Count == 1) {
					$("#page6 .titlewrap .text_i #textbox1 p").html('Unified frame panel');
				}
				next_Count++;
			});

			$("#page6 #go_back").click(function(e) {
				if (next_Count == 1) {

				} else if (next_Count == 2) {
					$("#page6 .titlewrap .text_i #textbox1 p").html('Reducción del número de partes');

				}
				next_Count--;
			});

				var engineArr = [];
				$("#page9").on({
					"pagebeforeshow" : function() {
						$("#page9 .titlewrap .text_i #textbox1 p").html('Haz clic en cada uno de los motores');
						$("#page9 .next_p_btn").hide();
						$.each($("#page9 .engine img"), function() {
							$(this).attr('src', $(this).attr('src').replace('_o', ''));
							$(this).attr('src', $(this).attr('src').replace('_s', ''));
						});
						
						if (engineArr.length == 3)
							$("#page9 .titlewrap .text_i #textbox1 p").html('Haz clic en cada uno de los motores');
						engineArr = [];
					},
					"pageshow" : function() {

					}
				});

				$("#page9 .engine img").click(function(e) {
					if (engineArr.join('') != '111' && !engineArr[parseInt($(this).attr('alt'))]) {
				$(this).attr('src', $(this).attr('src').replace('.png', '_o.png'));
				engineArr[parseInt($(this).attr('alt'))] = '1';

				if (engineArr.join('') == '111')
					$("#page9 .titlewrap .text_i #textbox1 p").html('Elige tu motor favorito');

			}
			else if (engineArr.join('') == '111') {
				$.each($("#page9 .engine img"), function() {
					$(this).attr('src', $(this).attr('src').replace('_s', '_o'));
					$(this).removeClass('active');
				});
				$(this).attr('src', $(this).attr('src').replace('_o.png', '_s.png'));
				$(this).addClass('active');
				
				$("#page9 .next_p_btn").show();
			}			
			});


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

			<section data-role="page" id="page1001" class="container"> 
					<div data-role="main" class="ui-content">
						<div class="imgwrap">
							<div class="gif_img">
								<img src="/pd/images/loading_short_4sec.gif" alt="">
							</div>
							<div class="loding_bar">
								<img src="/pd/images/loading_bar_1.png" alt="" class="londing1">
								<img src="/pd/images/loading_bar_2.png" alt="" class="londing2">
								<div id="logind_text">Preparando nuestro viaje…</div>
							</div>
						</div>
					</div>
				</section>

				<section data-role="page" id="pageStart" class="container">
					<div data-role="main" class="ui-content">
						<div class="imgwrap">
							<img src="/pd/images/day3/01_photo.jpg" alt="car" >
						</div>
						<div class="textwrap">
							<div class="text">
								<div id="textbox1" class="textbox">
									<h1>Día 3.</h1>
									<div class="img_wrap">
										<img src="/pd/images/button/08_point.png" alt="location point">
										<img src="/pd/images/button/08_lodeline.png" alt="location">
										<p class="p1">Berna</p>
										<p class="p2">Estrasburgo</p>
									</div>
									<ul>
										<li>Aerodinámica</li>
										<li>NVH</li>
										<li>DIMENSIÓN</li>
<!-- 										<li>ADAS</li>
										<li>Remote Window Control</li> -->
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
									<p>Así que, ¿continuamos a nuestra siguiente parada?</p>
								</div>
								<div id="textbox0_2" class="textbox">
									<p>Es Berna, la cuarta ciudad más grande de Suiza y su capital.</p>
								</div>
								<div id="textbox0_3" class="textbox">
									<p>Toca Berna en el mapa.</p>
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
					<!-- <audio class="audio1" src="../tts/day3/080.mp3"></audio>
					<audio class="audio2" src="../tts/day3/081.mp3"></audio>
					<audio class="audio3" src="../tts/day3/082.mp3"></audio> -->
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
									<p>Debemos tomar la autopista A1 para ir a Berna, lo que significa que aquí podemos aumentar la velocidad. De hecho, me estoy sintiendo bastante nervioso ahora.</p>
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
					<!-- <audio class="audio1" src="../tts/day3/083.mp3"></audio> -->
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
									<p>La estabilidad y eficiencia de combustible son realmente buenas incluso cuando se conduce a altas velocidades. Escuché que es porque se mejoró la aerodinámica.</p>
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
					<!-- <audio class="audio1" src="../tts/day3/084.mp3"></audio> -->
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
									<p>Primero, el alerón trasero con la moldura lateral es utilizado para optimizar el flujo de aire.</p>
								</div>
								<div id="textbox3_2" class="textbox">
									<p>Para mejorar el vórtice de aire del pilar A, se utilizaron molduras laterales en ambos lados del parabrisas frontal.</p>
								</div>
								<div id="textbox3_3" class="textbox">
									<p>Las ventilas de aire de las ruedas mejoran el flujo de aire y minimizan la resistencia del viento al conducir a alta velocidad.</p>
								</div>
								<div id="textbox3_4" class="textbox">
									<p>Por cierto, ¿sabes cuál es el coeficiente de resistencia del i30?</p>
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
					<!-- <audio class="audio1" src="../tts/day3/tom/035.mp3"></audio>
					<audio class="audio2" src="../tts/day3/tom/036.mp3"></audio>
					<audio class="audio3" src="../tts/day3/tom/037.mp3"></audio>
					<audio class="audio4" src="../tts/day3/tom/038.mp3"></audio> -->
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
									<p>Te refieres a la cifra Cd, ¿verdad?<br/>
									Sí, sé cuál es.</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>Es 0.3, y entre menor sea el número mejor es el desempeño aerodinámico. El i30 tiene la cifra más baja de su clase.</p>
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
					<!-- <audio class="audio1" src="../tts/day3/085.mp3"></audio>
					<audio class="audio2" src="../tts/day3/086.mp3"></audio> -->
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
									<p>¿No te parece que es demasiado silencioso en el interior para un carro que corre a alta velocidad?</p>
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
					<!-- <audio class="audio1" src="../tts/day3/087.mp3"></audio> -->
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
									<p>Reducción del número de partes</p>
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
									<p>Eso se debe al desempeño aerodinámico, y también a la reducción del número de partes en un 30%.</p>
								</div>
								<div id="textbox6_2" class="textbox">
									<p>Por último, un panel lateral integrado es utilizado para generar la mínima cantidad de ruido.</p>
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
					<!-- <audio class="audio1" src="../tts/day3/tom/039.mp3"></audio>
					<audio class="audio2" src="../tts/day3/tom/040.mp3"></audio> -->
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
									<p>Ah, por eso sentí que casi no había ruido aquí. ¡El ruido del viento ha sido reducido!</p>
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
					<!-- <audio class="audio1" src="../tts/day3/088.mp3"></audio> -->
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
									<p>¿Sabes cuáles son los motores disponibles en el i30?<br>De los 3 tipos de motores elegí el Gamma 1.6 Turbo-GDI.</p>
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
					<!-- <audio class="audio1" src="../tts/day3/089.mp3"></audio> -->
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
									<p>Haz clic en cada uno de los motores</p>
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
									<p>Resultado</p>
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
									<p>Mi elección fue <span>el 1.6 T-GDI</span>.<br />
									Es el motor más poderoso de la línea y estoy satisfecho.</p>
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
					<!-- <audio class="audio1" src="../tts/day3/090.mp3"></audio> -->
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
									<p>Aquí estamos avanzando por la autopista A1.<br />
									Esta es la forma más rápida de llegar a Berna.</p>
								</div>
								<div id="textbox12_2" class="textbox">
									<p>Me siento un poco cansado por haber conducido una larga distancia.<br>Pero no es una mala experiencia. Supongo que es porque el interior es espacioso.</p>
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
					<!-- <audio class="audio1" src="../tts/day3/091.mp3"></audio>
					<audio class="audio2" src="../tts/day3/092.mp3"></audio> -->
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
									<p>Un exterior deportivo y un interior espacioso. El i30 lo tiene todo, ¿verdad? Más espacioso que cualquier otro competidor.</p>
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
					<!-- <audio class="audio1" src="../tts/day3/tom/041.mp3"></audio> -->
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
									<p>Tal vez por eso sentí que el interior es más espacioso que otros carros que he conducido antes.</p>
								</div>
							</div>
							<div class="text_tip"><img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<a href="#page16" id="go_page16" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<!-- <audio class="audio1" src="../tts/day3/093.mp3"></audio> -->
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
									<p>Ya estamos llegando a Berna.</p>
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
					<!-- <audio class="audio1" src="../tts/day3/094.mp3"></audio> -->
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
									<p>La torre del reloj es el punto de referencia de Berna.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="view_text">
							<a href="#page18"><p>Zytglogge, Berna</p></a>
							<a href="#page18" id="go_page18" class="next_p_btn ui-btn go-next">
								<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
							</a>
						</div>
					</div>
					<!-- <audio class="audio1" src="../tts/day3/095.mp3"></audio> -->
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
									<p>Berna significa la ciudad del oso, y esta antigua ciudad esta registrada como Patrimonio Mundial de la UNESCO.</p>
								</div>
								<div id="textbox18_2" class="textbox">
									<p>Todavía tiene la atmosfera original de la era medieval, preservando la historia que le queda.</p>
								</div>
								<div id="textbox18_3" class="textbox">
									<p>¿Esperamos aquí para ver?</p>
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
					<!-- <audio class="audio1" src="../tts/day3/096.mp3"></audio>
					<audio class="audio2" src="../tts/day3/097.mp3"></audio>
					<audio class="audio3" src="../tts/day3/098.mp3"></audio> -->
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
									<p>No nos podemos perder el famoso parque de rosas en Berna. Vamos a echar un vistazo aquí también.</p>
								</div>
							</div>
						</div>
						<a href="#page20" id="go_page20" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<!-- <audio class="audio1" src="../tts/day3/tom/042.mp3"></audio> -->
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
									<p>Este jardín de rosas que está floreciendo es muy hermoso.<br />
									Me siento relajado aquí.</p>
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
					<!-- <audio class="audio1" src="../tts/day3/099.mp3"></audio> -->
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
									<p>¿Te divertiste en Berna?<br>Entonces vamos hacia nuestro destino final, Estrasburgo.</p>
								</div>
							</div>
						</div>
						<a href="#page2101" id="go_page2101" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<!-- <audio class="audio1" src="../tts/day3/100.mp3"></audio> -->
				</section>	

				<section data-role="page" id="page2101" class="container">
					<div data-role="header" class="header">
						<a href="#" class="ui-btn go-back back" data-rel="back">
							<img src="/pd/images/button/icon_arrow.png" alt="">
						</a>
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right">
							<img src="/pd/images/button/icon_navbar.png" alt="">
						</a>
					</div>
					<div class="page_bg">
						<img src="/pd/images/day3/37_plus_bg_map_1.jpg" alt="bern_map_2" />
					</div>
					<a href="#page22" class="next_finger">
						<img src="/pd/images/button/touchfinger_@3x.png" alt="next button">
					</a>
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<div class="text">
								<div id="textbox0_1" class="textbox">
									<p>Nuestro último destino, ¡Estrasburgo!<br>Es una ciudad en Francia, </p>
								</div>
								<div id="textbox0_2" class="textbox">
									<p>donde varios canales se juntan y es un centro de tránsito cultural con una atmosfera tranquila. ¡Vamos rápido!</p>
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
					<!-- <audio class="audio1" src="../tts/day3/101.mp3"></audio>
					<audio class="audio2" src="../tts/day3/102.mp3"></audio> -->
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
									<p>Aquí estamos, camino a Estrasburgo.<br />
									¿Puedes ver el atardecer a través del techo panorámico?<br />
									Es increíble.</p>
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
					<!-- <audio class="audio1" src="../tts/day3/103.mp3"></audio> -->
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
									<p>El techo solar del i30 es panorámico dando una sensación de apertura.<br>¡No hace falta un carro convertible!</p>
								</div>
							</div>
						</div>
						<a href="#page24" id="go_page24" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<!-- <audio class="audio1" src="../tts/day3/tom/043.mp3"></audio> -->
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
									<p>¡Mira! Creo que ya casi estamos en Estrasburgo.</p>
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
					<!-- <audio class="audio1" src="../tts/day3/104.mp3"></audio> -->
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
									<p>Así que, ¿vamos a dar un vistazo por ahí?</p>
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
					<!-- <audio class="audio1" src="../tts/day3/105.mp3"></audio> -->
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
									<p>Esta es la parada final de nuestro viaje, Estrasburgo.<br>Ubicada en el lado oeste del Río Rin, Estrasburgo tiene un canal bien desarrollado.</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>Y tiene pequeñas casas francesas hermosas.</p>
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
					<!-- <audio class="audio1" src="../tts/day3/106.mp3"></audio>
					<audio class="audio2" src="../tts/day3/107.mp3"></audio> -->
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
									<p>Wow, ¡cuidado!<br>Debes mantener tus ojos en el camino, casi chocamos con algo.</p>
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
					<!-- <audio class="audio1" src="../tts/day3/tom/044.mp3"></audio> -->
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
									<p>El sistema AEB del i30 detecta peatones o vehículos en la parte delantera con el sensor de radar y automáticamente acciona el freno si se anticipa un choque. Esto previene o minimiza el daño de un choque frontal.</p>
								</div>
							</div>
						</div>
						<a href="#page29" id="go_page29" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<!-- <audio class="audio1" src="../tts/day3/tom/045.mp3"></audio> -->
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
									<p>Afortunadamente, el i30 se detuvo bien. ¿Hay alguna otra función de alta tecnología en el i30?</p>
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
					<!-- <audio class="audio1" src="../tts/day3/108.mp3"></audio> -->
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
									<p>Detectar y calcular la distancia del carro que está al frente, el carro mantiene la distancia constante preestablecida incluso cuando el conductor no está presionando el acelerador o el pedal del freno.</p>
								</div>
							</div>
						</div>
						<a href="#page31" id="go_page31" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<!-- <audio class="audio1" src="../tts/day3/tom/046.mp3"></audio> -->
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
									<p>Con el ASCC, puedes conducir con más comodidad. Pero esto no significa un manejo completamente automático, así que debes tener cuidado.</p>
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
					<!-- <audio class="audio1" src="../tts/day3/tom/047.mp3"></audio> -->
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
									<p>LKAS es una función de alta tecnología que previene que el vehículo se salga de su carril. Una cámara frontal detecta el carril y asiste en el viraje por medio del MDPS.</p>
								</div>
							</div>
						</div>
						<a href="#page33" id="go_page33" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<!-- <audio class="audio1" src="../tts/day3/tom/048.mp3"></audio> -->
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
									<p>Con el LKAS mantenerse en el carril de forma segura es facilísimo.</p>
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
					<!-- <audio class="audio1" src="../tts/day3/tom/049.mp3"></audio> -->
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
									<p>El BSD detecta un carro aproximándose en el punto ciego con un radar en la defensa trasera y emite un sonido de alerta para prevenir un choque.</p>
								</div>
							</div>
						</div>
						<a href="#page35" id="go_page35" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<!-- <audio class="audio1" src="../tts/day3/tom/050.mp3"></audio> -->
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
									<p>Tener BSD en el carro hace que sea más seguro cambiar de carril y ver el punto ciego.</p>
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
					<!-- <audio class="audio1" src="../tts/day3/tom/051.mp3"></audio> -->
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
					<div class="page_bg"></div>
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
									<p>El DAA es una función para detectar el manejo imprudente. Este analiza los patrones de manejo y la ubicación del carro.</p>
								</div>
								<div id="textbox36_2" class="textbox">
									<p>Así que si el conductor se siente cansado y conduce imprudentemente, una señal de alarma aparecerá en el tablero de instrumentos y le aconsejará al conductor que tome un descanso.</p>
								</div>
								<div id="textbox36_3" class="textbox">
									<p>Dale un vistazo al tablero de instrumentos para ver si hay un signo de DAA.</p>
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
					<!-- <audio class="audio1" src="../tts/day3/tom/052.mp3"></audio>
					<audio class="audio2" src="../tts/day3/tom/053.mp3"></audio>
					<audio class="audio3" src="../tts/day3/tom/054.mp3"></audio> -->
				</section>

				<section data-role="page" id="page37" class="container es">
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
										<p>Estoy impresionado de que tantas funciones estén disponibles en un carro de esta categoría. Me estoy enamorando profundamente con este carro.</p>
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
					<!-- <audio class="audio1" src="../tts/day3/109.mp3"></audio> -->
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
						<div class="pageTitle">¿Cuál es tu función de alta tecnología favorita?</div>
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
									<p>Resultado</p>
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
									<p>El i30 está equipado con los mejores sistemas de seguridad de su clase para proporcionar a los conductores con la máxima comodidad y seguridad.</p>
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
					<!-- <audio class="audio1" src="../tts/day3/tom/055.mp3"></audio> -->
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
									<p>Aquí estamos, en la Catedral de Notre-dame.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="view_text">
							<a href="#page42"><p>Catedral de Notre-dame, Estrasburgo</p></a>
							<a href="#page42" id="go_page42" class="next_p_btn ui-btn go-next">
								<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
							</a>
						</div>
					</div>
					<!-- <audio class="audio1" src="../tts/day3/110.mp3"></audio> -->
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
									<p>La Catedral de Notre-dame está ubicada en el centro de esta antigua ciudad, y fue reconocida como Patrimonio Mundial de la UNESCO en 1988.</p>
								</div>
								<div id="textbox42_2" class="textbox">
									<p>La construcción de esta catedral tardó 350 años y tiene una magnífica vista.</p>
								</div>
								<div id="textbox42_3" class="textbox">
									<p>Si, personalmente pienso que esta Catedral de Notre-dame es más pintoresca que la que está en París.</p>
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
					<!-- <audio class="audio1" src="../tts/day3/111.mp3"></audio>
					<audio class="audio2" src="../tts/day3/112.mp3"></audio>
					<audio class="audio3" src="../tts/day3/113.mp3"></audio> -->
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
									<p>Ah, espera. ¿Acaso cerraste la ventana?</p>
								</div>
							</div>
						</div>
						<a href="#page44" id="go_page44" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<!-- <audio class="audio1" src="../tts/day3/tom/056.mp3"></audio> -->
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
									<p>No te preocupes, puedo cerrar la ventana fácilmente con el control remoto de ventanas de mi llave.</p>
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
					<!-- <audio class="audio1" src="../tts/day3/114.mp3"></audio> -->
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
									<p>Tienes razón. Incluso cuando el motor está apagado, puedes cerrar las ventanas remotamente con la llave inteligente.</p>
								</div>
							</div>
						</div>
						<a href="#page46" id="go_page46" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<!-- <audio class="audio1" src="../tts/day3/tom/057.mp3"></audio> -->
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
									<?php if($LMS_IMAGE) { ?> 
									<img src="<?=$LMS_IMAGE?>" alt="james" id="current-img">
							<?php } else { ?>
										<img src="../images/intro/login_profile_@3x.png" alt="james">
									<?php } ?>
								</div>
								<div id="textbox1" class="textbox">
									<p>Esta ciudad es el último destino en nuestro viaje.</p>
								</div>
							</div>
						</div>
						<a href="#page47" id="go_page47" class="next_p_btn ui-btn go-next">
							<img src="/pd/images/button/btn_next_02_@3x.png" alt="next button">
						</a>
					</div>
					<!-- <audio class="audio1" src="../tts/day3/tom/058.mp3"></audio> -->
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
									<p>Lo siento, pero es hora de decir adiós.<br>Espero que hayas disfrutado de este viaje con el i30.</p>
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
					<!-- <audio class="audio1" src="../tts/day3/116.mp3"></audio> -->
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
						<div class="pageTitle">Por favor sube tu foto y deja tu comentarios sobre este viaje con el i30.</div>
						<div class="imgwrap">
							<div class="imgphoto">
								<img id="upload-img">
								<input type="file" id="upload" accept="image/*">
								
							</div>
							<div class="imginput">
								<textarea class="pd_con_text">Please enter TEXT.</textarea>
							</div>
						</div>
						<a href="#" id="form_sumit" class="bye_btn">OK</a>
						<!-- <a href="/pd/timeline_view.php" class="bye_btn" id="timeline_show" target="_blank" style="display:none">OK</a> -->
					</div>
					</form>
				</section>
				
				<input type="hidden" id="SESSION_LMS_SEQ" name="SESSION_LMS_SEQ" value="<?=$_SESSION["HY_LMS_SEQ"]?>">
				<input type="hidden" id="LMS_LANGUAGE" name="LMS_LANGUAGE" value="en">
				<input type="hidden" id="SESSION_APP_GB" name="SESSION_APP_GB" value="<?=$_SESSION["HY_APP_GB"]?>">
			</div>
		</div>

		<!-- <a href="#page9">엔진 이동</a>
		<a href="#page38">마지막 이동</a>
		<a href="#page48">파일 업로드</a> -->
	</body>
</html>


