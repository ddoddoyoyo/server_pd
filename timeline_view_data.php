<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");

	$list = $_POST['list'];

	$sql = "	SELECT AA.LMS_SEQ
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

			LIMIT ".$list.",5";

	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	$ROW = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$stmt->closeCursor();

	$dataList=" ";

	for($a = 0; $a < count($ROW); $a++){

		$dataList = $dataList."<article class='article'> <div class='photo'>";

		if($ROW[$a]['HD_CON_FILENAME']){
			$dataList = $dataList." <img src='".$IMG_URL."/hyundai/pd/".$ROW[$a]['HD_CON_FILENAME']."' alt=''>" ;
		} else {
			$dataList = $dataList." <img src='' alt=''>";
		}
		$dataList = $dataList." </div>";
		$dataList = $dataList." <div class='profile_wrap'>";
		$dataList = $dataList."	     <div class='userPix_wrap'>";
		if($ROW[$a]['LMS_IMAGE']){
			$dataList = $dataList."  <div class='userPix'><img src='".$IMG_URL."/hyundai/member/".$ROW[$a]['LMS_IMAGE']."' alt=''></div>" ;
		} else {
			$dataList = $dataList."  <div class='userPix'><img src='/pc_pd/app/images/thumbnail_none-profile.png' alt=''></div>" ;
		}
		$dataList = $dataList."</div>";
		$dataList = $dataList."    <div class='userProfile'>";
		$dataList = $dataList."		   <span class='name'>".$ROW[$a]['LMS_NAME']."</span>";
		$dataList = $dataList."		   <span class='region'>".$ROW[$a]['LMS_CONTRY']."</span>";
		$dataList = $dataList."	   </div>";
		$dataList = $dataList."	</div></div>";
		$dataList = $dataList."	<div class='txt_wrap'>";
		$dataList = $dataList."    <div class='comment_wrap'><p class='headColor'>Trip Feedback</p><p>".$ROW[$a]['HD_CON_COMMENT']."</p></div>";
		$dataList = $dataList."	   <div class='keyword_wrap'>";
		$dataList = $dataList."				<p class='headColor'>Best Style Interior <span class='interior'>'".$ROW[$a]['PD_STYLE_DESC']."'</span></p>";
		$dataList = $dataList."				<p class='headColor'>Favorite Engine <span class='engine'>'".$ROW[$a]['PD_ENGINE_DESC']."'</span></p>";
		$dataList = $dataList."				<p class='headColor'>Favorite High-tech Feature <span class='feature'>'".$ROW[$a]['PD_HIGH_TECH_DESC']."'</span></p>";
		$dataList = $dataList."	</div>";
		$dataList = $dataList."</div></article>";
	}
	
	if(count($ROW) > 0){
		$dataList = $dataList."<div class='moreView'><a href='javascript:void(0)' onclick='view_search()'><i class='icon'></i>View More</a></div>";
	}

	$json["data"] = $dataList;
	
	echo json_encode($json);

?>
