<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");


	$LMS_CONTRY = $_POST["LMS_CONTRY"];

	$LMS_NAME = $_POST["LMS_NAME"];

	$LMS_GB = $_POST["LMS_GB"];

	$RETURN = $_POST["RETURN"];

	$REFER = $_SERVER['REMOTE_ADDR'];

	
	

	$ADM_DEVICE = $_POST["ADM_DEVICE"];
	$IP = $_POST["IP"];
	$ADM_ACCESS_GUBUN = $_POST["ADM_ACCESS_GUBUN"];
	$ADM_INFLOW_GUBUN = $_POST["ADM_INFLOW_GUBUN"];
	$COUNTRY_CODE = $_POST["COUNTRY_CODE"];




	$sql = "SELECT COUNT(*) AS CNT FROM LMS_MEMBER WHERE LMS_CONTRY = :LMS_CONTRY AND LMS_NAME = :LMS_NAME AND LMS_GB = :LMS_GB";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(':LMS_NAME',$LMS_NAME);
	$stmt->bindParam(':LMS_CONTRY',$LMS_CONTRY);
	$stmt->bindParam(':LMS_GB',$LMS_GB);
	$stmt->execute();
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
	if($row[0]["CNT"] > 0 ){
		$tools->errMsg("fail");
	}


	if( $_FILES["LMS_IMAGE"][size] > 0 ) {
		// 업로드 파일 제한 확장자 추가 가능
		$EXT_CHECK = array("php", "php3", "htm", "html", "cgi", "perl");	
		if( $EXT_TMP = explode( ".", $_FILES["LMS_IMAGE"][name])) {	 
			foreach ($EXT_CHECK as $value) { 
				if( strstr( $value, strtolower($EXT_TMP[1]))) { 
					//$tools->errMsg( strtoupper($EXT_TMP[1])." 은 업로드 할수 없습니다." ); 
				} 
			}	
		}
		$LMS_IMAGE	= "Hyundai_".date("YmdHis").time().".".$EXT_TMP[1];	//변환파일명

		if( !@move_uploaded_file($_FILES["LMS_IMAGE"][tmp_name], $IMG_DIR."hyundai/member/".$LMS_IMAGE) ) { 
			//$tools->errMsg("파일 업로드 에러"); 
		}else { @unlink($_FILES["LMS_IMAGE"][tmp_name]);}	
	}else{
		$LMS_IMAGE = "";
	}

	try 
	{
		$dbh->beginTransaction();

		$sql = "INSERT INTO LMS_MEMBER 
				(
					LMS_CONTRY,
					LMS_GB, 
					LMS_NAME, 
					LMS_IMAGE, 
					LMS_IP,
					LMS_LEVEL,
					LMS_STATUS,
					LMS_REGDATE
				) 
				VALUES 
				(
					:LMS_CONTRY, 
					:LMS_GB, 
					:LMS_NAME, 
					:LMS_IMAGE, 
					:LMS_IP,
					1,
					'Y',
					NOW()
				)";

		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(':LMS_CONTRY',$LMS_CONTRY);
		$stmt->bindParam(':LMS_GB',$LMS_GB);
		$stmt->bindParam(':LMS_NAME',$LMS_NAME);
		$stmt->bindParam(':LMS_IMAGE',$LMS_IMAGE);
		$stmt->bindParam(':LMS_IP',$REFER);

		if($stmt->execute()){

			$dbh->commit();
			$param = "?LMS_CONTRY=".urlencode($LMS_CONTRY)."&LMS_NAME=".urlencode($LMS_NAME)."&RETURN=".urlencode($RETURN)."";
			$tools->metaGo("/pd/common/login_action.php".$param."");
		}else{
			$dbh->rollBack();
		}

	} catch (PDOException $pe) {
		$dbh->rollBack();
		exit;
	}


?>