<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");


	$sql = "
		SELECT 
			COUNT(*) AS CNT
			FROM LMS_CONTENTS A
			WHERE A.LMS_CON_GB = 'hyundai' AND A.LMS_CON_CAR_GUBUN = 'PD' AND A.LMS_TYPE = 'ms'
	";
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	$row_cnt = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$stmt->closeCursor();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/timeline.css">
		<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="js/timeline.js"></script>
	</head>
	<body>
	    <div id="wrap">
			<input type='hidden' class='Cnt' id='TOT_LIST_COUNT' value="<?=$row_cnt[0]['CNT'];?>" />
			<div id="view_contBox">
				<header>
					<div class="logo"><a href="/upload/hyundai/pd/PD_DATA.jpg" target="_blank"><img src="images/timeline/emblem_2.jpg" alt=""></a></div>
					<!-- <h1>3DAYS EURO TRIP</h1> -->
					<!-- <a class="share" href="#"><img src="/genesis/part1/images/button/btn_share.png" alt=""></a> -->
				</header>
				<div class="list">
					
					<?
					
						$sql = "SELECT 
								 A.LMS_CON_SEQ,
								 A.LMS_CON_TITLE_IMG,
								 A.LMS_CON_TEXT,
								 A.LMS_CON_LANGUAGE,
								 B.LMS_NAME,
								 B.LMS_CONTRY,
								 B.LMS_IMAGE,
								 C.PD_CHOICE AS PD_CHOICE_1,
								 D.PD_CHOICE AS PD_CHOICE_2,
								 E.PD_CHOICE AS PD_CHOICE_3
								FROM LMS_CONTENTS A
								LEFT JOIN LMS_MEMBER B ON B.LMS_SEQ = A.LMS_SEQ
								LEFT JOIN HD_PD_CHOICE_INFO C ON C.LMS_SEQ = A.LMS_SEQ  AND C.LMS_LANGUAGE = A.LMS_CON_LANGUAGE AND C.PD_GUBUN = 1
								LEFT JOIN HD_PD_CHOICE_INFO D ON D.LMS_SEQ = A.LMS_SEQ  AND D.LMS_LANGUAGE = A.LMS_CON_LANGUAGE AND D.PD_GUBUN = 2
								LEFT JOIN HD_PD_CHOICE_INFO E ON E.LMS_SEQ = A.LMS_SEQ  AND E.LMS_LANGUAGE = A.LMS_CON_LANGUAGE AND E.PD_GUBUN = 3
								WHERE A.LMS_CON_GB = 'hyundai' AND A.LMS_CON_CAR_GUBUN = 'PD'
								AND A.LMS_TYPE = 'ms'
								ORDER BY A.LMS_CON_REGDATE DESC 
								LIMIT 0,5
							 ";

						$stmt = $dbh->prepare($sql);
						$stmt->execute();
						$ROW = $stmt->fetchAll(PDO::FETCH_ASSOC);
						$stmt->closeCursor();
						
						foreach($ROW as $ls) { 
							
							if($ls["LMS_CON_LANGUAGE"] == "en"){

								switch($ls["PD_CHOICE_1"]){
									case 1 : $Text_1 = "RED";
									break;
									case 2 : $Text_1 = "BLACK";
									break;
									case 3 : $Text_1 = "GRAY";
									break;
									case 4 : $Text_1 = "INDIGO BLUE";
									break;
									case 5 : $Text_1 = "BLAM BURGUNDY";
									break;
									default : $Text_1 = "No Selection";
								}

								switch($ls["PD_CHOICE_2"]){
									case 1 : $Text_2 = "NU 2.0 GDI";
									break;
									case 2 : $Text_2 = "GAMMA 1.6 T-GDI";
									break;
									case 3 : $Text_2 = "U2 1.6 VGT";
									break;
									default : $Text_2 = "No Selection";
								}

								switch($ls["PD_CHOICE_3"]){
									case 1 : $Text_3 = "LKAS";
									break;
									case 2 : $Text_3 = "BSD";
									break;
									case 3 : $Text_3 = "ASCC";
									break;
									case 4 : $Text_3 = "DAA";
									break;
									case 5 : $Text_3 = "AEB";
									break;
									default : $Text_3 = "No Selection";
								}


							}else if($ls["LMS_CON_LANGUAGE"] == "tr"){
								switch($ls["PD_CHOICE_1"]){
									case 1 : $Text_1 = "RED";
									break;
									case 2 : $Text_1 = "BLACK";
									break;
									case 3 : $Text_1 = "GRAY";
									break;
									case 4 : $Text_1 = "INDIGO BLUE";
									break;
									case 5 : $Text_1 = "BLAM BURGUNDY";
									break;
									default : $Text_1 = "No Selection";
								}

								switch($ls["PD_CHOICE_2"]){
									case 1 : $Text_2 = "Kappa 1.4 MPi";
									break;
									case 2 : $Text_2 = "Kappa 1.4 T-GDI";
									break;
									case 3 : $Text_2 = "U2 1.6 VGT CRDi";
									break;
									default : $Text_2 = "No Selection";
								}

								switch($ls["PD_CHOICE_3"]){
									case 1 : $Text_3 = "LKAS";
									break;
									case 2 : $Text_3 = "BSD";
									break;
									case 3 : $Text_3 = "ASCC";
									break;
									case 4 : $Text_3 = "DAA";
									break;
									case 5 : $Text_3 = "AEB";
									break;
									default : $Text_3 = "No Selection";
								}
							}

					?>

					<article class="article">
						<div class="photo">
							<?php if($ls["LMS_CON_TITLE_IMG"]) { ?>
								<img src="<?=$IMG_URL?>/hyundai/pd/<?=$ls["LMS_CON_TITLE_IMG"]?>" alt="">
							<?php } else { ?>
								<img src="" alt="">
							<?php } ?>
						</div>
						<div class="profile_wrap">
							<div class="userPix_wrap">
								<?php if($ls["LMS_IMAGE"]) { ?>
									<div class="userPix"><img src="<?=$IMG_URL?>/hyundai/member/<?=$ls["LMS_IMAGE"]?>" alt=""></div>
								<?php } else { ?>
									<div class="userPix"><img src="images/profile_basic_@3x.png" alt=""></div>
								<?php } ?>
							</div>
							<div class="userProfile">
								<span class="name"><?=$ls["LMS_NAME"]?></span>
								<span class="region"><?=$ls["LMS_CONTRY"]?></span>
							</div>
						</div>
						<div class="txt_wrap">
							<div class="comment_wrap">
								<p class="headColor">Trip Feedback</p>
								<!-- <p>Love Europe! Love trip! THanks you~</p>  -->
								<p><?=$ls["LMS_CON_TEXT"]?></p>
							</div>
							<div class="keyword_wrap">
								<p class="headColor">Best Style Interior <span class="interior">'<?=$Text_1?>'</span></p>
								<p class="headColor">Favorite Engine <span class="engine">'<?=$Text_2?>'</span></p>
								<p class="headColor">Favorite High-tech Feature <span class="feature">'<?=$Text_3?>'</span></p>
							</div>
						</div>
					</article>
					<?php } ?>

					<?php if(count($ROW) >= 5){ ?>
						<div class="moreView">
							<a href="javascript:void(0)" onclick="view_search();"><i class="icon"></i>View More</a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</body>
</html>