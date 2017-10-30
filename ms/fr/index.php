<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");
	
	if($_SESSION["HY_LMS_SEQ"] > 0 ){
		$tools->JavaGo("/pd/ms/fr/day1.php");
	}
	
	
	$QRCode = $_REQUEST["QRCode"];

	$agent = $tools->user_agent($_SERVER['HTTP_USER_AGENT']);

	$refer = $_SERVER['REMOTE_ADDR'];


	if($agent == 'PC'){
		$ADM_ACCESS_GUBUN = 2;
	} else {
		$ADM_ACCESS_GUBUN = 1;
	}

	
	if(!isset($QRCode)){
		$ADM_INFLOW_GUBUN = 1;
	} else {
		$ADM_INFLOW_GUBUN = 2;
	}
	

	$request_url = "http://whois.kisa.or.kr/openapi/ipascc.jsp?query=".$refer."&key=2016081813570509350490&answer=json";
	
	$info = $tools->get_web_page($request_url);

	$data = json_decode($info['content'],true);

	$COUNTRY_CODE = $data['whois']['countryCode'];



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
		<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="../common/js/common.js"></script>
		<script>
		  //주소창 없애기
		  /*	 $(document).on("mobileinit", function () {
				 $.mobile.hashListeningEnabled = false;
				 $.mobile.pushStateEnabled = false;
				 $.mobile.changePage.defaults.changeHash = false;
			});*/
		</script>
		<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<script src="../js/device.js"></script>
		<script src="../js/day1.js"></script>
		
		<script>
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
									$("#current-img").css({"width":"100%","height":"auto"});
								} else {
									$("#current-img").css({"width":"auto", "height":"100%"});
								} 
							};
						} 
							reader.readAsDataURL(input.files[0]);                 
						
					}
				}
			
				$("#upload").change(function(){
					readURL(this);
				});

				
				/*
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
				*/
			 });
			
			/*
			 function fun_agt(agt){
				if (agt.indexOf("samsungbrowser") != -1) {
					return 'Samsungbrowser'; 	
				}  if (agt.indexOf("chrome") != -1) {
					return 'Chrome'; 
				} else {
					return 'etc'; 
				}
			}
			*/
		</script>
		<!-- <script type="text/javascript">
			jQuery(function($) {
				var loading = $('<img alt="loading" src="../images/ajax-loader">')
				.appendTo(document.body).hide();

				$(window).ajaxStart(loading.show);
				$(window).ajaxStop(loading.hide);
			});
		</script> -->
	</head>
	<body>
		<div id="wrap">
			<div id="contBox" class="container">
				<section data-role="page" id="page0" class="container fr">
					<div data-role="main" class="ui-content">
						<div class="textwrap">
						</div>
						<a href="#page1" id="go_page1" class="next_p_btn ui-btn go-next">
							<img src="../images/button/start_btn.png" alt="next button">
						</a>
					</div>
				</section>

				
				<section data-role="page" id="page1" class="container">
				<form id="Frm" name="Frm" method="post" action="../../common/join_action.php" enctype="multipart/form-data">
					<input type="hidden" name="RETURN" value="../ms/fr/day1.php"/>
					<input type="hidden" name="LANGUAGE" value="fr"/>
					<input type="hidden" name="TYPE" value="ms"/>
					<input type="hidden" name="LMS_GB" value="hyundai"/>
					
					<input type="hidden" name="ADM_DEVICE" value="<?=$agent?>"/>
					<input type="hidden" name="IP" value="<?=$refer?>"/>
					<input type="hidden" name="ADM_ACCESS_GUBUN" value="<?=$ADM_ACCESS_GUBUN?>"/>
					<input type="hidden" name="ADM_INFLOW_GUBUN" value="<?=$ADM_INFLOW_GUBUN?>"/>
					<input type="hidden" name="COUNTRY_CODE" value="<?=$COUNTRY_CODE?>"/>

					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<h1>Bonjour,</h1>
							<h2>Comment t’appelles-tu ?</h2>

						</div>
						<a class="btn btn-change" href="javascript:;">
							<div class="imgwrap input1">
								<img id="current-img" src="../images/intro/login_profile_icontype_@3x.png" alt="3days trip in europe">
								<input type="file" id="upload" name="LMS_IMAGE" accept="image/*">
							</div>
						</a>
						<div class="log_box input1">
							<div class="input_info" id="select_box">
								<label for="input_country">COUNTRY</label>
								<select id="input_country" name="LMS_CONTRY">
									<option value="">COUNTRY</option>
									<?php
										$sql = "SELECT ENG,CCODE FROM SPK_COUNTRY ORDER BY ENG ASC";
										$stmt = $dbh->prepare($sql);
										$stmt->execute();
										$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
										for($i = 0; $i < count($row); $i++) {
									?>
										<option value="<?=$row[$i]["ENG"]?>"><?=$row[$i]["ENG"]?></option>
									<? 
										} 
									?>
								</select>
							</div>
							<input type="text" id="input_name" placeholder="NAME" name="LMS_NAME">
							<a href="javascript:;" id="Login_Action" class="intnext_btn">NEXT</a>
						</div>
					</div></form>
				</section>
			</div>
		</div>
	</body>
</html>