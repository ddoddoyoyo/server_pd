<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");


	$sql = "
			
				
		SELECT 
			COUNT(*) CNT
		FROM 
		(
		SELECT A.LMS_SEQ
				  ,A.LMS_CONTRY 
				  ,A.LMS_NAME
				  ,A.LMS_IMAGE
				  ,B.PD_CHOICE AS PD_STYLE
				  ,C.PD_CHOICE AS PD_ENGINE
				  ,D.PD_CHOICE AS PD_HIGH_TECH
				  ,F.HD_CON_FILENAME
				,F.HD_CON_COMMENT
			FROM LMS_MEMBER A
			INNER JOIN 
			(
			  SELECT LMS_SEQ ,PD_CHOICE FROM HD_PD_CHOICE_INFO
			  WHERE PD_GUBUN = 1
			) AS B
			ON A.LMS_SEQ = B.LMS_SEQ
			INNER JOIN 
			(
			  SELECT LMS_SEQ ,PD_CHOICE FROM HD_PD_CHOICE_INFO
			  WHERE PD_GUBUN = 2
			) AS C
			ON A.LMS_SEQ = C.LMS_SEQ
		   INNER JOIN 
		  (
			   SELECT LMS_SEQ ,PD_CHOICE FROM HD_PD_CHOICE_INFO
			   WHERE PD_GUBUN = 3
			) AS D
			ON A.LMS_SEQ = D.LMS_SEQ
			INNER JOIN HD_CONTENT_BOARD F
			ON A.LMS_SEQ = F.LMS_MEMBER_SEQ
		  WHERE A.LMS_GB = 'hyundai'
		  AND F.HD_CON_GUBUN = 'PD'
		  ORDER BY F.HD_CON_REGDATE
		 ) AS AA

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
		<link rel="stylesheet" href="/pd/css/timeline.css">
		<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="/pd/js/timeline.js"></script>
	</head>
	<body>
	    <div id="wrap">
			<input type='hidden' class='Cnt' id='TOT_LIST_COUNT' value="<?=$row_cnt[0]['CNT'];?>" />
			<div id="view_contBox">
				<header>
					<div class="logo"><a href="/upload/hyundai/pd/PD_DATA.jpg" target="_blank"><img src="/pd/images/timeline/emblem_2.jpg" alt=""></a></div>
					<!-- <h1>3DAYS EURO TRIP</h1> -->
					<!-- <a class="share" href="#"><img src="/genesis/part1/images/button/btn_share.png" alt=""></a> -->
				</header>
				<div class="list">
					
					<?
					
						$sql = "SELECT AA.LMS_SEQ
									  ,AA.LMS_CONTRY 
									  ,AA.LMS_NAME
									  ,AA.LMS_IMAGE
									  ,CASE WHEN AA.PD_STYLE = 1 THEN 'RED'
										WHEN AA.PD_STYLE = 2 THEN 'BLACK'
										WHEN AA.PD_STYLE = 3 THEN 'GRAY'
										WHEN AA.PD_STYLE = 4 THEN 'INDIGO BLUE'
										WHEN AA.PD_STYLE = 5 THEN 'GLAM BURGUNDY'
										ELSE '' END AS PD_STYLE_DESC 
									  ,CASE WHEN AA.PD_ENGINE = 1 THEN 'NU 2.0GDI'
										WHEN AA.PD_ENGINE = 2 THEN 'GAMMA 1.6T-GDI'
										WHEN AA.PD_ENGINE = 3 THEN 'U2 1.6VGT'
										ELSE '' END AS PD_ENGINE_DESC
								   
									  ,CASE WHEN AA.PD_HIGH_TECH = 1 THEN 'LKAS'
										WHEN AA.PD_HIGH_TECH = 2 THEN 'BSD'
										WHEN AA.PD_HIGH_TECH = 3 THEN 'ASCC'
										WHEN AA.PD_HIGH_TECH = 4 THEN 'DAA'
										WHEN AA.PD_HIGH_TECH = 5 THEN 'AEB'
										ELSE '' END AS PD_HIGH_TECH_DESC
									  ,AA.HD_CON_FILENAME
									  ,AA.HD_CON_COMMENT
							FROM 
							(
							SELECT A.LMS_SEQ
									  ,A.LMS_CONTRY 
									  ,A.LMS_NAME
									  ,A.LMS_IMAGE
									  ,B.PD_CHOICE AS PD_STYLE
									  ,C.PD_CHOICE AS PD_ENGINE
									  ,D.PD_CHOICE AS PD_HIGH_TECH
									  ,F.HD_CON_FILENAME
									,F.HD_CON_COMMENT
								FROM LMS_MEMBER A
								INNER JOIN 
								(
								  SELECT LMS_SEQ ,PD_CHOICE FROM HD_PD_CHOICE_INFO
								  WHERE PD_GUBUN = 1
								) AS B
								ON A.LMS_SEQ = B.LMS_SEQ
								INNER JOIN 
								(
								  SELECT LMS_SEQ ,PD_CHOICE FROM HD_PD_CHOICE_INFO
								  WHERE PD_GUBUN = 2
								) AS C
								ON A.LMS_SEQ = C.LMS_SEQ
							   INNER JOIN 
							   (
								   SELECT LMS_SEQ ,PD_CHOICE FROM HD_PD_CHOICE_INFO
								   WHERE PD_GUBUN = 3
								) AS D
								ON A.LMS_SEQ = D.LMS_SEQ
								INNER JOIN HD_CONTENT_BOARD F
								ON A.LMS_SEQ = F.LMS_MEMBER_SEQ
							  WHERE A.LMS_GB = 'hyundai'
							  AND F.HD_CON_GUBUN = 'PD'
							  ORDER BY F.HD_CON_REGDATE DESC
							 ) AS AA
							 LIMIT 5
							 ";

						$stmt = $dbh->prepare($sql);
						$stmt->execute();
						$ROW = $stmt->fetchAll(PDO::FETCH_ASSOC);
						$stmt->closeCursor();
						
						foreach($ROW as $ls) { 

					?>

					<article class="article">
						<div class="photo">
							<?php if($ls["HD_CON_FILENAME"]) { ?>
								<img src="<?=$IMG_URL?>/hyundai/pd/<?=$ls["HD_CON_FILENAME"]?>" alt="">
							<?php } else { ?>
								<img src="" alt="">
							<?php } ?>
						</div>
						<div class="profile_wrap">
							<div class="userPix_wrap">
								<?php if($ls["LMS_IMAGE"]) { ?>
									<div class="userPix"><img src="<?=$IMG_URL?>/hyundai/member/<?=$ls["LMS_IMAGE"]?>" alt=""></div>
								<?php } else { ?>
									<div class="userPix"><img src="/pd/images/profile_basic_@3x.png" alt=""></div>
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
								<p><?=$ls["HD_CON_COMMENT"]?></p>
							</div>
							<div class="keyword_wrap">
								<p class="headColor">Best Style Interior <span class="interior">'<?=$ls["PD_STYLE_DESC"]?>'</span></p>
								<p class="headColor">Favorite Engine <span class="engine">'<?=$ls["PD_ENGINE_DESC"]?>'</span></p>
								<p class="headColor">Favorite High-tech Feature <span class="feature">'<?=$ls["PD_HIGH_TECH_DESC"]?>'</span></p>
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