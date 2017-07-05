<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");

	$list = $_POST['list'];

	$Total_Cnt = $_POST['Total_Cnt'];

	$sql = "	SELECT 
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
				LIMIT ".$list.",5";

	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	$ROW = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$stmt->closeCursor();

	$PageCount = count($ROW) + (int)$list;

	$dataList=" ";

	for($a = 0; $a < count($ROW); $a++){

		if($ROW[$a]["LMS_CON_LANGUAGE"] == "en"){

			switch($ROW[$a]["PD_CHOICE_1"]){
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

			switch($ROW[$a]["PD_CHOICE_2"]){
				case 1 : $Text_2 = "NU 2.0 GDI";
				break;
				case 2 : $Text_2 = "GAMMA 1.6 T-GDI";
				break;
				case 3 : $Text_2 = "U2 1.6 VGT";
				break;
				default : $Text_2 = "No Selection";
			}

			switch($ROW[$a]["PD_CHOICE_3"]){
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


		}else if($ROW[$a]["LMS_CON_LANGUAGE"] == "tr"){
			switch($ROW[$a]["PD_CHOICE_1"]){
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

			switch($ROW[$a]["PD_CHOICE_2"]){
				case 1 : $Text_2 = "Kappa 1.4 MPi";
				break;
				case 2 : $Text_2 = "Kappa 1.4 T-GDI";
				break;
				case 3 : $Text_2 = "U2 1.6 VGT CRDi";
				break;
				default : $Text_2 = "No Selection";
			}

			switch($ROW[$a]["PD_CHOICE_3"]){
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

		$dataList = $dataList."<article class='article'> <div class='photo'>";

		if($ROW[$a]['LMS_CON_TITLE_IMG']){
			$dataList = $dataList." <img src='".$IMG_URL."/hyundai/pd/".$ROW[$a]['LMS_CON_TITLE_IMG']."' alt=''>" ;
		} else {
			$dataList = $dataList." <img src='' alt=''>";
		}
		$dataList = $dataList." </div>";
		$dataList = $dataList." <div class='profile_wrap'>";
		$dataList = $dataList."	     <div class='userPix_wrap'>";
		if($ROW[$a]['LMS_IMAGE']){
			$dataList = $dataList."  <div class='userPix'><img src='".$IMG_URL."/hyundai/member/".$ROW[$a]['LMS_IMAGE']."' alt=''></div>" ;
		} else {
			$dataList = $dataList."  <div class='userPix'><img src='/pd/images/profile_basic_@3x.png' alt=''></div>" ;
		}
		$dataList = $dataList."</div>";
		$dataList = $dataList."    <div class='userProfile'>";
		$dataList = $dataList."		   <span class='name'>".$ROW[$a]['LMS_NAME']."</span>";
		$dataList = $dataList."		   <span class='region'>".$ROW[$a]['LMS_CONTRY']."</span>";
		$dataList = $dataList."	   </div>";
		$dataList = $dataList."	</div></div>";
		$dataList = $dataList."	<div class='txt_wrap'>";
		$dataList = $dataList."    <div class='comment_wrap'><p class='headColor'>Trip Feedback</p><p>".$ROW[$a]['LMS_CON_TEXT']."</p></div>";
		$dataList = $dataList."	   <div class='keyword_wrap'>";
		$dataList = $dataList."				<p class='headColor'>Best Style Interior <span class='interior'>'".$Text_1."'</span></p>";
		$dataList = $dataList."				<p class='headColor'>Favorite Engine <span class='engine'>'".$Text_2."'</span></p>";
		$dataList = $dataList."				<p class='headColor'>Favorite High-tech Feature <span class='feature'>'".$Text_3."'</span></p>";
		$dataList = $dataList."	</div>";
		$dataList = $dataList."</div></article>";
	}
	
	if($Total_Cnt > $PageCount){
		$dataList = $dataList."<div class='moreView'><a href='javascript:void(0)' onclick='view_search()'><i class='icon'></i>View More</a></div>";
	}

	$json["data"] = $dataList;
	
	echo json_encode($json);

?>
