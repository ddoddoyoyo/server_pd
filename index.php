<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui">
		<meta name="apple-touch-fullscreen" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
		<link rel="stylesheet" href="index/css/styles.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.8.1/css/perfect-scrollbar.min.css">
		<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		 <!-- <script>
			 $(document).on("mobileinit", function () {
				 $.mobile.hashListeningEnabled = false;
				 $.mobile.pushStateEnabled = false;
				 $.mobile.changePage.defaults.changeHash = false;
			});
		</script> -->
		<script src="index/js/main.js"></script>
		<script src="index/js/device.js"></script>
		<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.8.1/js/perfect-scrollbar.jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				$('.scrollbar').perfectScrollbar(); 
			})
		</script>
	</head>
	<body>
		<div id="wrap">
			<div id="contBox" class="container">
				<section data-role="page" id="i30_sub" class="container sub scrollbar">
					<div data-role="header" class="header top_logo">
						<a href="#" class="ui-btn go-back back" data-rel="back"><img src="index/images/arrow_back.png" alt=""></a>
						<h1>i30</h1>
					</div>
					<div data-role="main" class="ui-content">
						<div class="subcontent sub_lang" id="subcontent1">
							<div class="subcont_img"></div>
							<div class="subcont_txt">
								<h3 class="subcont_txt_title">Digital Sales Guide</h3>
								<p>Easily check out the sales points of i30 with matrix structure.</p>
							</div>
							<div class="subcont_lang">
								<a href="" class="close">
									<p>Select Language</p>
									<img src="index/images/button/btn_testdrive_close.png" alt="">
								</a>
								<div class="langbox">
									<a class="i30_lang_en" href="javascript:;"><div class="lang">ENGLISH</div></a>
									<a class="i30_lang_ar" href="javascript:;"><div class="lang">ARABIC</div></a>
									<a class="i30_lang_fr" href="javascript:;"><div class="lang">FRENCH</div></a>
									<a class="i30_lang_es" href="javascript:;"><div class="lang">LATIN SPANISH</div></a>
								</div>
							</div>
						</div>
						<a class="i30_ksp" href="javascript:;"><div class="subcontent">
							<div class="subcont_img" style="background-image: url('index/images/i30/i30_img_2.png')"></div>
							<div class="subcont_txt">
								<h3 class="subcont_txt_title">Mobile KSP Learning</h3>
								<p>Trip to 3DAY Europe with i30,  Easy to understand i30 story.</p>
							</div>
						</div></a>
						<a class="i30_yout" href="https://youtu.be/N6d1bRPIkwA" target="_blank"><div class="subcontent">
							<div class="subcont_img" style="background-image: url('index/images/i30/i30_th.png')"></div>
							<div class="subcont_txt">
								<h3 class="subcont_txt_title">Product Video</h3>
								<p>Watch this short but informative product video for i30 on Youtube and share this with your customers.</p>
							</div>
						</div></a>
					</div>
				</section>
			</div>
		<!-- <a href="#page11">이동!!!!!!!!!</a> -->

		</div>
	</body>
</html>