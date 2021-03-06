<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");

	

	$LMS_SEQ = $_POST["LMS_SEQ"];

	$PD_CON_TEXT = $_POST["PD_CON_TEXT"];

	$LMS_LANGUAGE = $_POST["LMS_LANGUAGE"];

	$_FILES["PD_CON_IMAGE"];

	$LMS_TYPE = $_POST["LMS_TYPE"];

	//회원정보 조회 
	$sql = "SELECT LMS_CONTRY,LMS_NAME FROM LMS_MEMBER WHERE LMS_SEQ = :LMS_SEQ AND LMS_GB = 'hyundai'";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(':LMS_SEQ',$LMS_SEQ);
	$stmt->execute();
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if( $_FILES["PD_CON_IMAGE"][size] > 0 ) {
		// 업로드 파일 제한 확장자 추가 가능
		$EXT_CHECK = array("php", "php3", "htm", "html", "cgi", "perl");	
		if( $EXT_TMP = explode( ".", $_FILES["PD_CON_IMAGE"][name])) {	 
			foreach ($EXT_CHECK as $value) { 
				if( strstr( $value, strtolower($EXT_TMP[1]))) { 
					//$tools->errMsg( strtoupper($EXT_TMP[1])." 은 업로드 할수 없습니다." ); 
				} 
			}	
		}
		$PD_CON_IMAGE	= "PD_MS_CON_".date("YmdHis").time().".".$EXT_TMP[1];	//변환파일명

		if( !@move_uploaded_file($_FILES["PD_CON_IMAGE"][tmp_name], $IMG_DIR."hyundai/pd/".$PD_CON_IMAGE) ) { 
			//$tools->errMsg("파일 업로드 에러"); 
		}else { 
			@unlink($_FILES["PD_CON_IMAGE"][tmp_name]);
			chmod($IMG_DIR."hyundai/pd/".$PD_CON_IMAGE,0755);
		}	
	}else{
		$PD_CON_IMAGE = "";
	}
	
	
	if($PD_CON_IMAGE ==  ""){
		
		$json["result"] = "fail";
		echo json_encode($json);
		exit;
	}

	try 
	{
		$dbh->beginTransaction();
		
		$sql = "INSERT INTO LMS_CONTENTS
				  (
					LMS_SEQ, 
					LMS_CON_GUBUN, 
					LMS_CON_TITLE, 
					LMS_CON_TEXT, 
					LMS_CON_TITLE_IMG, 
					LMS_CON_RECOM_STATUS, 
					LMS_CON_STATUS, 
					LMS_CON_GB,
					LMS_CON_REGION,
					LMS_CON_CAR_GUBUN,
					LMS_TYPE,
					LMS_CON_LANGUAGE,
					LMS_CON_REGDATE
				  ) 
				VALUES 
				(
				  :LMS_SEQ, 
				  4, 
				  '', 
				  :LMS_CON_TEXT, 
				  :LMS_CON_TITLE_IMG, 
				  'Y', 
				  'Y', 
				  'hyundai',
				  :LMS_CON_REGION,
				  'PD', 
				  :LMS_TYPE,
				  :LMS_CON_LANGUAGE,
				  NOW()
				  )";

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':LMS_SEQ',$LMS_SEQ);
			$stmt->bindParam(':LMS_CON_TEXT',$PD_CON_TEXT);
			$stmt->bindParam(':LMS_CON_TITLE_IMG',$PD_CON_IMAGE);
			$stmt->bindParam(':LMS_CON_REGION',$row[0]["LMS_CONTRY"]);
			$stmt->bindParam(':LMS_TYPE',$LMS_TYPE);
			$stmt->bindParam(':LMS_CON_LANGUAGE',$LMS_LANGUAGE);
			if($stmt->execute()){
				$dbh->commit();
				$json["result"] = "success";
			}else{
				
				$json["result"] = "fail";
				$dbh->rollBack();
			}

			echo json_encode($json);

	}catch (PDOException $pe) {

		$json["result"] = "fail";
		$dbh->rollBack();
		echo json_encode($json);
	}
	
	
?>