<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");
	header("Content-Type: text/html; charset=UTF-8");
	
	if($_SESSION["HY_LMS_SEQ"] > 0 ){
		$tools->JavaGo("/pd/ar/day1.php");
	}
?>
<!DOCTYPE html>
<html lang="tr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui">
		<meta name="apple-touch-fullscreen" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
		<link rel="stylesheet" href="../css/styles.css">
		<link rel="stylesheet" href="../css/ar.css">
		<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="/pd/common/js/common.js"></script>
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
		<script src="/pd/js/device.js"></script>
		<script src="/pd/js/day1.js"></script>
		
		<script>
		$(document).ready(function(){
				//text align right
				$(".sidePanel_wrap,.textwrap, p, input, label, option").attr("dir", "rtl").addClass("right-to-left");
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
				<section data-role="page" id="page0" class="container tr">
					<!-- <div data-role="header" class="header">
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right"><img src="../images/button/icon_navbar.png" alt=""></a>
					</div> -->
					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<!-- <h1>3Days trip <span>in europe</span> with i30.</h1>
							<p>PD mobile learning</p> -->
							<!-- <img src="../images/intro/open_font_3days_@3x.png" alt="3days trip in europe"> -->
						</div>
						<!-- <a href="#page1"><p class="intro_start">START</p></a> -->
						<a href="#page1" id="go_page1" class="next_p_btn ui-btn go-next">
							<img src="../images/button/start_btn_tr.png" alt="next button">
						</a>
						<!-- <div class="imgwrap">
							<img src="../images/intro/hyundai_logo.png" alt="logo">
						</div> -->
					</div>
				</section>

				
				<section data-role="page" id="page1" class="container">
				<form id="Frm" name="Frm" method="post" action="/pd/common/join_action.php" enctype="multipart/form-data">
					<input type="hidden" name="RETURN" value="/pd/ar/day1.php"/>
					<input type="hidden" name="LANGUAGE" value="tr"/>
					<input type="hidden" name="LMS_GB" value="hyundai"/>
					
					<input type="hidden" name="ADM_DEVICE" value="<?=$agent?>"/>
					<input type="hidden" name="IP" value="<?=$refer?>"/>
					<input type="hidden" name="ADM_ACCESS_GUBUN" value="<?=$ADM_ACCESS_GUBUN?>"/>
					<input type="hidden" name="ADM_INFLOW_GUBUN" value="<?=$ADM_INFLOW_GUBUN?>"/>
					<input type="hidden" name="COUNTRY_CODE" value="<?=$COUNTRY_CODE?>"/>

					<div data-role="main" class="ui-content">
						<div class="textwrap">
							<h1>مرحبًا.</h1>
							<h2>ما اسمك؟</h2>

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
							<a href="javascript:;" id="Login_Action" class="intnext_btn">التالي</a>
						</div>
					</div></form>
				</section>
			</div>
		</div>
	</body>
</html>