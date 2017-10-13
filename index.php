<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");

	$YB_CODE = 'PD';

	$refer = $_SERVER['REMOTE_ADDR'];

	$request_url = "http://whois.kisa.or.kr/openapi/ipascc.jsp?query=".$refer."&key=2016081813570509350490&answer=json";
	
	$info = $tools->get_web_page($request_url);

	$data = json_decode($info['content'],true);

	$YB_CONTRY = $data['whois']['countryCode'];
	
	try 
	{
		$dbh->beginTransaction();

		$sql = "SELECT ENG,CTCODE FROM SPK_COUNTRY WHERE CCODE =:COUNTRY_CODE";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(':COUNTRY_CODE',$YB_CONTRY);
		$stmt->execute();
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$sql = "INSERT INTO YOUTUBE_COUNT 
					(
						GUBUN,
						YB_REGION,
						YB_COUNTRY,
						YB_CODE,
						YB_REGDATE
					) 
					VALUES 
					(
						2,
						:YB_REGION,
						:YB_COUNTRY,
						:YB_CODE,
						NOW()
					)";

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':YB_REGION',$row[0]["CTCODE"]);
			$stmt->bindParam(':YB_COUNTRY',$row[0]["ENG"]);
			$stmt->bindParam(':YB_CODE',$YB_CODE);

			if($stmt->execute()){
				$dbh->commit();
			}else{
				$dbh->rollBack();
			}

	} catch (PDOException $pe) {
		
		$dbh->rollBack();
		
	}

	echo json_encode($json);
		

?>
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

				$("#youtubeCnt").click(function(){

					var YB_CODE = "PD";
					$.ajax({
						url: "common/youtube_action.php",
						type: "POST",
						dataType: "json",
						data:{
							YB_CODE: YB_CODE,
						},
						success:  function(json){
							
							if(json.data){
								console.log(json);
							}

						}
					});		
				});
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
						<a class="i30_ksp" href="javascript:;"><div class="subcontent" id="subcontent1">
							<div class="subcont_img"></div>
							<div class="subcont_txt">
								<h3 class="subcont_txt_title">Mobile KSP Learning</h3>
								<p>Learn about i30’s key selling points with this interactive and simple learning anytime and anywhere.</p>
							</div>
						</div></a>
						<div class="subcontent sub_lang">
							<div class="subcont_img"></div>
							<div class="subcont_txt">
								<h3 class="subcont_txt_title">Digital Sales Guide</h3>
								<p>Learn how to best present i30’s key selling points. Try searching the information you need in just a few seconds!</p>
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
						<a class="i30_yout" href="https://youtu.be/N6d1bRPIkwA" target="_blank" id="youtubeCnt"><div class="subcontent">
							<div class="subcont_img"></div>
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