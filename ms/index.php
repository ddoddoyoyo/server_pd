<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");

	$LMS_CONTRY = urldecode($_POST["LMS_COUNTRY"]);

	$LMS_NAME = urldecode($_POST["LMS_NAME"]);
	
	$TYPE = "ms";

	$APP_GB = urldecode($_POST["APP_GB"]);

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
	/*	 $(document).on("mobileinit", function () {
			 $.mobile.hashListeningEnabled = false;
			 $.mobile.pushStateEnabled = false;
			 $.mobile.changePage.defaults.changeHash = false;
		});*/



	</script>
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
	<script src="js/device.js"></script>
	<script src="js/day1.js"></script>
	<script src="common/js/common.js"></script>
 </head>

 <body>
	<form id="Frm" name="Frm" method="post" action="../common/login_action.php">
		<input type="hidden" name="LMS_CONTRY" value="<?=$LMS_CONTRY?>"/>
		<input type="hidden" name="LMS_NAME" value="<?=$LMS_NAME?>"/>
		<input type="hidden" name="APP_GB" value="<?=$APP_GB?>"/>
		<input type="hidden" name="TYPE" value="<?=$TYPE?>"/>
		<input type="hidden" name="LANGUAGE" value=""/>
		<input type="hidden" name="RETURN" value=""/>
	</form>
	<script type="text/javascript">
		//main_go('tr');
	</script>
  <div id="wrap">
		<div id="contBox" class="container">
			<section data-role="page" id="lang" class="container">
				<div data-role="main" class="ui-content">
					<h1>HOT HATCH<br><span>i30</span></h1>
					<div class="textwrap">
						<h3>Select a Language</h3>
						<div class="lang_select">	
							<div class="blue_bg blue_bg_l"></div>
							<ul>
								<li><a class="en" href="javascript:;" onclick="main_go('en')">ENGLISH</a></li>
								<li><a class="tr" href="javascript:;" onclick="main_go('tr')">TURKISH</a></li>
								<li><a class="ar" href="javascript:;" onclick="main_go('ar')">ARABIC</a></li>
								<!-- <li><a class="fr" href="/pd/fr/">FRENCH</a></li> -->
								<li><a class="ru" href="javascript:;" onclick="main_go('ru')">RUSSIAN</a></li>
								<li><a class="es" href="javascript:;" onclick="main_go('es')">LATIN SPANISH</a></li>
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
