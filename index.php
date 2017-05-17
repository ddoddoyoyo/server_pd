<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");
	
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title></title>
	<meta property="og:url" content="http://www.onlinehta.com/pd/">
	<meta property="og:title" content="i30 PD">
	<meta property="og:image" content="http://www.onlinehta.com/pd/images/SNS_image.jpg">
	<meta property="og:description" content="3Days euro trip with i30">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="mobile-web-app-capable" content="yes">
	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
	<link rel="stylesheet" href="css/styles.css">
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
 </head>

 <body>
  <div id="wrap">
			<div id="contBox" class="container">
				<section data-role="page" id="lang" class="container">
					<!-- <div data-role="header" class="header">
						<a href="#" class="ui-btn ui-btn-inline ui-corner-all ui-shadow btn_sidePanel ui-btn-right"><img src="../images/button/icon_navbar.png" alt=""></a>
					</div> -->
					<div data-role="main" class="ui-content">
						<h1>HOT HATCH<br><span>i30</span></h1>
						<div class="textwrap">
							<h3>Select a Language</h3>
							<div class="lang_select">	
								<div class="blue_bg blue_bg_l"></div>
								<ul>
									<li><a href="/pd/en/">ENGLISH</a></li>
									<li><a href="/pd/ar/">ARABIC</a></li>
									<li><a href="/pd/fr/">FRENCH</a></li>
									<li><a href="/pd/ru/">RUSSIAN</a></li>
									<li><a href="/pd/es/">LATIN SPANISH</a></li>
									<li><a href="/pd/tr/">TURKISH</a></li>
								</ul>
								<div class="blue_bg blue_bg_r"></div>
								<div class="blue_bg blue_bg_btm"></div>
							</div>	
						</div>
					</div>
				</section>
			</div>
		</div>
	</body>
 </body>
</html>
