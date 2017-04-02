<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");

	

	$LMS_SEQ = $_POST["LMS_SEQ"];

	$PD_CON_TEXT = $_POST["PD_CON_TEXT"];

	$_FILES["PD_CON_IMAGE"];

	//회원정보 조회 
	$sql = "SELECT LMS_CONTRY,LMS_NAME FROM LMS_MEMBER WHERE LMS_SEQ = :LMS_SEQ";
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
		$PD_CON_IMAGE	= "PD_CON_".date("YmdHis").time().".".$EXT_TMP[1];	//변환파일명

		if( !@move_uploaded_file($_FILES["PD_CON_IMAGE"][tmp_name], $ROOT_IMG_DIR."/hyundai/pd/".$PD_CON_IMAGE) ) { 
			//$tools->errMsg("파일 업로드 에러"); 
		}else { @unlink($_FILES["PD_CON_IMAGE"][tmp_name]);}	
	}else{
		$PD_CON_IMAGE = "";
	}
	
	
	try 
	{
		$dbh->beginTransaction();
		
		$sql = "INSERT INTO HD_CONTENT_BOARD 
					(
						LMS_MEMBER_SEQ,
						HD_CON_USERNAME,
						HD_CON_REGION,
						HD_CON_COMMENT,
						HD_CON_FILENAME,
						HD_CON_GUBUN,
						HD_CON_REGDATE
					) 
					VALUES 
					(
						:LMS_MEMBER_SEQ, 
						:HD_CON_USERNAME,
						:HD_CON_REGION,
						:HD_CON_COMMENT, 
						:HD_CON_FILENAME, 
						'PD',
						NOW()
					)";

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':LMS_MEMBER_SEQ',$LMS_SEQ);
			$stmt->bindParam(':HD_CON_USERNAME',$row[0]['LMS_NAME']);
			$stmt->bindParam(':HD_CON_REGION',$row[0]['LMS_CONTRY']);
			$stmt->bindParam(':HD_CON_COMMENT',$PD_CON_TEXT);
			$stmt->bindParam(':HD_CON_FILENAME',$PD_CON_IMAGE);
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