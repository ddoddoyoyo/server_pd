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
		<script src="../js/menu_day3_tr.js"></script>
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

			 $.mobile.hashListeningEnabled = false;
			 $.mobile.pushStateEnabled = false;
			 $.mobile.changePage.defaults.changeHash = false;

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
					$("#page6 .titlewrap .text_i #textbox1 p").html('Azaltılmış parça sayısı');
					next_Count = 1;
				}
			});

			$("#page6 #go_next1").click(function() {
				if (next_Count == 1) {
					$("#page6 .titlewrap .text_i #textbox1 p").html('Birleştirilmiş Gövde Paneli');
				}
				next_Count++;
			});

			$("#page6 #go_back").click(function(e) {
				if (next_Count == 1) {

				} else if (next_Count == 2) {
					$("#page6 .titlewrap .text_i #textbox1 p").html('Azaltılmış parça sayısı');

				}
				next_Count--;
			});

			var engineArr = [];
				$("#page9").on({
					"pagebeforeshow" : function() {
						$("#page9 .titlewrap .text_i #textbox1 p").html('Motor İncelemesi');
						$("#page9 .next_p_btn").hide();
						$.each($("#page9 .engine img"), function() {
							$(this).attr('src', $(this).attr('src').replace('_o', ''));
							$(this).attr('src', $(this).attr('src').replace('_s', ''));
						});
						
						if (engineArr.length == 3)
							$("#page9 .titlewrap .text_i #textbox1 p").html('Motor İncelemesi');
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
					$("#page9 .titlewrap .text_i #textbox1 p").html('Favori Motor Seçeneğinizi Seçiniz');

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
								<div id="logind_text">Seyahatimiz Hazırlanıyor…</div>
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
									<h1>3. Gün</h1>
									<div class="img_wrap">
										<img src="/pd/images/button/08_point.png" alt="location point">
										<img src="/pd/images/button/08_lodeline.png" alt="location">
										<p class="p1">Bern</p>
										<p class="p2">Strazburg</p>
									</div>
									<ul>
										<li>Aerodinamik</li>
										<li>NVH</li>
										<li>Boyut</li>
<!-- 										<li>Gelişmiş Sürüş Yardım Sistemleri</li>
										<li>Uzaktan Kumanda Edilebilen Camlar</li> -->
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
									<p>O zaman gelecek durağımız ile devam edelim mi ?</p>
								</div>
								<div id="textbox0_2" class="textbox">
									<p>Bern, İsviçre’nin 4. büyük kenti olmakla birlikte aynı zamanda başkentidir.</p>
								</div>
								<div id="textbox0_3" class="textbox">
									<p> Harita üzerinde Bern’e dokunun.</p>
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
									<p>Bern’e gidebilmek için A1 otobanını kullanmamız gerekecek.<br>Bu nedenle yüksek hızlara çıkacağız. Şimdiden heyecanlandım.</p>
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
									<p>İ30’un stabilite ve yakıt ekonomisi, yüksek hızlarda dahi oldukça iyi.<br>Bunun yanı sıra aerodinamik konusunda da bazı geliştirmelerin yapıldığını duymuştum.</p>
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
									<p>Öncelikle arka spoyler ve c sütunu kaplaması, hava akışını optimize etmek üzere tasarlanmıştır.</p>
								</div>
								<div id="textbox3_2" class="textbox">
									<p>A sütunu çevresinde hava akışını iyileştirmek için ön cam kavis tasarımı optimum duruma getirilmiştir.</p>
								</div>
								<div id="textbox3_3" class="textbox">
									<p>Hava perdeleri, tekerlek kısmındaki türbülansı azaltarak hava akışını iyileştirir. Bu sayede yüksek hızlarda dahi rüzgar direnci  azaltılmış olur.</p>
								</div>
								<div id="textbox3_4" class="textbox">
									<p>Bu arada i30’un rüzgar direnci katsayısının ne olduğunu biliyor muydunuz ?</p>
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
									<p>Rüzgar Direnci Katsayısı (Cd) Karşılaştırması</p>
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
									<p>Evet, biliyorum. i30’un rüzgar direnci katsayısı 0.30. Bu rakam düştükçe, aerodinamik performansın arttığını duymuştum.</p>
								</div>
								<div id="textbox2" class="textbox">
									<p> i30 bu konuda, sınıfında en düşük orana sahip araçlardan bir tanesi.</p>
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
									<p>Otobanda gitmemize rağmen, sen de aracın oldukça sessiz olduğunu düşünmüyor musun ?</p>
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
							<div class="graphDesc">%30<br/><span>azaltıldı</span></div>
							<div class="graphLegend6">
								<div><img src="/pd/images/day3/11_title_current-i30_tr.png" /></div>
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
								<div><img src="/pd/images/day3/11_title_current-i30_tr.png" /></div>
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
									<p>Azaltılmış parça sayısı</p>
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
									<p>İşte bu aerodinamiğin bir sonucu. Aynı zamanda %30 oranında kullanılan parça sayısı azaltıldı.</p>
								</div>
								<div id="textbox6_2" class="textbox">
									<p>Son olarak,Yeni i30’da en temel seslerin dahi azaltılması için entegre panel uygulandı.</p>
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
									<p>Aa, yüksek hızlarda da araç içerisinin bu denli sessiz olmasının sebebi bu demek ki. Çünkü daha az rüzgar sesi duyuluyor.</p>
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
									<p>i30’un motor seçenekleri hakkında ne düşünüyorsun. 3 farklı motor seçeneği bulunuyor. Ben T-GDI’ yı seçtim.</p>
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
									<p>Motor İncelemesi</p>
								</div>	
							</div>
						</div>
						<div class="imgwrap">
							<div class="engine">
								<img src="/pd/images/day3/15_btn_01_tr.png" alt="0" />
								<img src="/pd/images/day3/15_btn_02_tr.png" alt="1" />
								<img src="/pd/images/day3/15_btn_03_tr.png" alt="2" />
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
									<p>Sonuç</p>
								</div>	
							</div>
						</div>
						<div class="imgwrap">
							<div class="graphLegend10">
								<div>Kappa 1.4 MPi</div>
								<div>Kappa 1.4 T-GDI</div>
								<div>U2 1.6 VGT CRDi</div>
							</div>
							<ul class="graph10">
								<li>
									<div class="graphObj" alt="30">%30</div>
									<div class="graphText"></div>
								</li>
								<li>
									<div class="graphObj large" alt="50">%50</div>
									<div class="graphText large"></div>
								</li>
								<li>
									<div class="graphObj" alt="20">%20</div>
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
									<p>Benim seçimim <span>T-GDI oldu</span>.<br />
									Bu seçeneklerden en güçlü benzinli motor bu, seçimimden oldukça memnunum.</p>
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
									<p>İşte A1 otobanı. Bern’e ulaşmak için en hızlı yol bu.</p>
								</div>
								<div id="textbox12_2" class="textbox">
									<p>Uzun süredir araç kullandığım için kendimi biraz yorgun hissediyorum. Fakat uzun süredir araç kullanıyor olmama rağmen, umduğumdan daha az yoruldum. Belki de araç içinin ferah olmasından kaynaklanıyordur.</p>
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
									<p>Hem geniş hem de sportif bir iç mekan. i30, bir otomobilde istenen bütün imkanlara sahip değil mi ?<br>Rakipleri ile kıyaslandığında, Hyundai i30’un en geniş iç hacme sahip  araçlardan olduğunu söyleyebilirim.</p>
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
									<p>Belki de bu yüzden i30’un iç mekanını, diğer araçlara göre daha geniş buldum.</p>
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
									<p>İşte Bern’e yaklaşıyoruz.</p>
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
									<p>Bu saat kulesi, Ortaçağ’da Bern’in batı giriş kapısı olarak inşa edilmiş.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="view_text">
							<a href="#page18"><p>Zytglogge Saat Kulesi</p></a>
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
									<p>Bern kelime olarak «ayılar şehri» anlamına geliyor. Aynı zamanda tüm şehir UNESCO Dünya Mirası listesinde yer alıyor.</p>
								</div>
								<div id="textbox18_2" class="textbox">
									<p>Şehir, orijial ortaçağ ve tarihi dokusunu günümüze kadar korumuş.</p>
								</div>
								<div id="textbox18_3" class="textbox">
									<p>Özellikle öğleyin yapılan, bu saat kulesi şovu oldukça meşhur. Burada bekleyip şovu izlemeye dersin ?</p>
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
				<!-- 	<audio class="audio1" src="../tts/day3/096.mp3"></audio>
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
									<p>Bern’de yer alan ünlü gül parkını da görmeden gitmeyelim.<br>İşte burada, haydi içeriye bir göz atalım.</p>
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
									<p>Bu çiçek açmış gül bahçesi çok ama çok güzel. İnsan kendini burada rahatlamış hissediyor.</p>
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
									<p>Bern’i umarım sevmişsindir. Şimdi sırada son durağımız olan Strazburg var.</p>
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
									<p>Son durağımız, Fransa’nın bir şehri olan Strazburg.</p>
								</div>
								<div id="textbox0_2" class="textbox">
									<p>Burası birçok kanalın birleştiği ve trafik kültürünün, son derece sessiz olmasıyla örnek gösterilen bir şehir. Haydi çabuk olalım !</p>
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
									<p>İşte Strazburg yollarındayız. Güneşin batışını panaromik cam tavanı açıp izleyelim mi ?<br />
									Bu gerçekten görülmeye değer.</p>
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
									<p>i30 panaromik cam tavanın bu kadar açılabilmesi harika. Neredeyse cabrio araçlarla kıyaslanabilecek türden.</p>
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
									<p>Bak!  Neredeyse Strazburg’a ulaştığımızı düşünüyorum.</p>
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
									<p>Haydi şehri şöyle bir turlayalım.</p>
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
									<p>Burası gezimizdeki son şehir. Strazburg, Ren Nehri’nin batısında konumlandırılmış olup her tarafı nehirlerle donatılmış bir şehir.</p>
								</div>
								<div id="textbox2" class="textbox">
									<p>Burada aynı zamanda çok sayıda küçük Fransız evleri bulunuyor.</p>
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
									<p>Hey ! Dikkat et ! Neredeyse bir şeye çarpıyorduk.</p>
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
									<p>i30’da bulunan Otomatik Acil Fren Destek Sistemi (AEB), aracın önünde yer alan radar sistemi ile yaya ve nesneleri önceden algılayarak olası kazaları önler.<br>Bu ileri teknoloji özelliği herhangi bir potansiyel kaza durumunda, otomatik olarak araca fren uygulamaktadır.</p>
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
									<p>i30’um bizi kurtardığı için şanslıyız. i30’un bundan başka ileri teknoloji özelliği var mı ?</p>
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
									<p>Sürücünün gaz pedalı veya frene basmasına gerek kalmadan, sürücünün seçimine uygun olarak i30 öndeki araç ile olan mesafeyi algılar ve bu mesafeyi korur.</p>
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
									<p>Akıllı Hız Sabitleyici özelliği ile yolculuklarınız artık çok daha konforlu ve güvenli.</p>
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
									<p>Şeritten Ayrılma Uyarı Sistemi (LDWS), sürücünün sinyal vermeden şeritten ayrılması durumunda devreye giren ileri teknoloji uyarı sistemidir.</p>
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
									<p>Akıllı Hız Sabitleyici (ASCC) özelliği ile birlikte Şeritten Ayrılma Uyarı Sistemi (LDWS), şeritten ayrılma durumunda sürücüyü uyarır.</p>
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
									<p>Kör Nokta Uyarı Sistemi (BSD) de, sensör mekanizması ile sürücüyü olası kazalara karşı uyarır. Arka tamponda yer alan sensör sayesinde, araç arkasından görüş dışında yaklaşan başka bir araç olması durumunda sürücü bilgilendirilir.</p>
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
									<p>Kör Nokta Uyarı Sistemi (BSD), şerit değiştirirken veya kör noktadan bir araç gelip gelmediğini görmek için oldukça yardımcı bir özelliktir.</p>
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
									<p>Yorgunluk Tespit Sistemi (DAA), dikkatsiz sürüşe karşı ideal bir özelliktir. Sürüş şeklini ve aracın yol üzerindeki konum değişikliklerini analiz ederek, sürücünün dikkat seviyesini ölçümler.</p>
								</div>
								<div id="textbox36_2" class="textbox">
									<p>Eğer sürüş şekli, dikkatsiz sürüş kalıplarına sahipse ve/veya sürücü kendini yorgun hissediyorsa; gösterge panelindeki dikkat seviyesi aşamalı olarak azalır ve sürücüyü mola vermesi için uyarır.</p>
								</div>
								<div id="textbox36_3" class="textbox">
									<p>Hey ! Gösterge panelindeki «Yorgunluk Tespit Sistemi (DAA)» uyarısına baksana !</p>
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
										<p>Bu sınıftaki bir aracın, bu kadar çok ileri teknoloji özellikle donatılmış olmasından çok etkilendim. Şimdi aracıma daha derin bir tutkuyla bağlandım !</p>
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
						<div class="pageTitle">Aşağıdaki ileri-teknoloji özelliklerinden favoriniz olanı seçiniz.</div>
						<div class="textwrap textwrap_tr">
							<ul class="tr">
								<li><span>LDWS(Şeritten Ayrılma Uyarı Sistemi)</span></li>
								<li><span>BSD(Kör Nokta Uyarı Sistemi)</span></li>
								<li><span>ASCC(Akıllı Hız Sabitleyici)</span></li>
								<li><span>DAA(Yorgunluk Tespit Sistemi)</span></li>
								<li><span>AEB(Otomatik Acil Fren Destek Sistemi)</span></li>
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
					<div class="page_bg" style='background-image:url(/pd/images/day3/63_result_graph_tr.png); background-size:100% auto;'>
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
									<p>Sonuçlarr</p>
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
									<p>Hyundai Yeni i30, sınıfında en iyi güvenlik sistemlerine sahiptir. Bu da kullanıcılarına sürüş esnasında maksimum konfor ve güvenlik sağlamaktadır.</p>
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
									<p>İşte, Notre-Dame Katedrali’ndeyiz.</p>
								</div>
							</div>
							<div class="text_tip">
								<img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="view_text">
							<a href="#page42"><p>Strazburg, Notre-Dame Katedrali</p></a>
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
									<p>Notre-Dame Katedrali, «eski şehir» olarak adlandırılan bölgenin tam ortasında yer alıyor. Bu katedral, aynı zamanda 1998 yılında UNESCO Dünya Mirası listene girmiş.</p>
								</div>
								<div id="textbox42_2" class="textbox">
									<p>Buranın tamamen inşa edilmesi tam 350 yıl almış! Belki de bu kadar ihtişamlı olmasının nedeni budur.</p>
								</div>
								<div id="textbox42_3" class="textbox">
									<p>Buradaki Notre-Dame, Paris’deki Notre-Dame’a göre çok daha estetik ve sanatsal.</p>
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
									<p>Beklesene, camları kapatmamıştın değil mi ?</p>
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
									<p>Endişelenme gerek yok! Anahtarımdaki uzaktan kumandalı cam özelliği ile camları kolayca kapatabilirim.</p>
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
									<p>Evet, haklısın! Motor kapalı konumdayken bile, akıllı anahtar ile camları kolaylıkla kapatabilirsin.</p>
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
									<p>Bu şehir, gezimizin son durağıydı.</p>
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
									<p>Üzgünüm ama veda zamanımız geldi. Umarım i30 ile yaptığımız bu yolculuktan memnun kalmışsınızdır.</p>
								</div>
							</div>
							<div class="text_tip"><img src="/pd/images/button/tail_3_@3x.png" alt="text box">
							</div>
						</div>
						<div class="imgwrap">
							<img src="/pd/images/day3/james_20.png" alt="james">
						</div>
						<a href="#page48" id="go_page48" class="bye_btn">HOŞÇAKALIN</a>
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
					<div data-role="main" class="ui-content_tr ui-content">
						<div class="pageTitle">i30 ile Avrupa Gezimiz hakkındaki yorumunuzu<br>fotoğrafınızla birlikte lütfen buraya yazın</div>
						<div class="imgwrap">
							<div class="imgphoto">
								<img id="upload-img">
								<input type="file" id="upload" accept="image/*">
								
							</div>
							<div class="imginput">
								<textarea class="pd_con_text">Yorumunuzu lütfen bu alana yazınız.</textarea>
							</div>
						</div>
						<a href="#" id="form_sumit" class="bye_btn">TAMAM</a>
						<!-- <a href="/pd/timeline_view.php" class="bye_btn" id="timeline_show" target="_blank" style="display:none">OK</a> -->
					</div>
					</form>
				</section>
				
				<input type="hidden" id="SESSION_LMS_SEQ" name="SESSION_LMS_SEQ" value="<?=$_SESSION["HY_LMS_SEQ"]?>">
				<input type="hidden" id="LMS_LANGUAGE" name="LMS_LANGUAGE" value="tr">
				<input type="hidden" id="SESSION_APP_GB" name="SESSION_APP_GB" value="<?=$_SESSION["HY_APP_GB"]?>">
			</div>
		</div>

		<!-- <a href="#page9">엔진 이동</a>
		<a href="#page38">마지막 이동</a>
		<a href="#page48">파일 업로드</a> -->
	</body>
</html>


