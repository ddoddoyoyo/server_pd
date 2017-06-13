<?
	$LMS_CAR_GB = $SR_SUBJECT_CODE;
	
	$LMS_PART = 1;

	//LMS_INFLOW_GB
	$LMS_INFLOW_GB = $_REQUEST["QRCode"];

	if(!isset($QRCode)){
		$LMS_INFLOW_GB = "LINK";
	} else {
		$LMS_INFLOW_GB = "QR";
	}
	
	//LMS_DEVICE
	$LMS_DEVICE = $tools->user_agent($_SERVER['HTTP_USER_AGENT']);
	
	//LMS_IP
	$LMS_IP = $_SERVER['REMOTE_ADDR'];

	//	LMS_ACCESS_GB
	$APP_GB = $_REQUEST['APP_GB'];

	if($APP_GB == "APP"){
		$LMS_ACCESS_GB = "APP";
	}else{
		if($LMS_DEVICE == "PC"){
			$LMS_ACCESS_GB = "PC";
		}else{
			$LMS_ACCESS_GB = "MOBILE";
		}
	}



	
		$dbh->beginTransaction();
		
		$sql = "SELECT ENG,CTCODE FROM SPK_COUNTRY WHERE ENG =:COUNTRY_CODE";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(':COUNTRY_CODE',$LMS_CONTRY);
		$stmt->execute();
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);


		$sql = "INSERT INTO LMS_CONNECTION 
				(
					LMS_MEMBER_SEQ,
					LMS_LANGUAGE,
					LMS_IP,
					LMS_ACCESS_GB,
					LMS_INFLOW_GB,
					LMS_REGION,
					LMS_COUNTRY,
					LMS_DEVICE,
					LMS_PART,
					LMS_BRAND_GB,
					LMS_CAR_GB,
					LMS_REGDATE
				) 
				VALUES 
				(
					:LMS_MEMBER_SEQ,
					:LMS_LANGUAGE,
					:LMS_IP,
					:LMS_ACCESS_GB,
					:LMS_INFLOW_GB,
					:LMS_REGION,
					:LMS_COUNTRY,
					:LMS_DEVICE,
					:LMS_PART,
					:LMS_BRAND_GB,
					:LMS_CAR_GB,
					NOW()
				)";

		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(':LMS_MEMBER_SEQ',$LMS_SEQ);
		$stmt->bindParam(':LMS_LANGUAGE',$LMS_LANGUAGE);
		$stmt->bindParam(':LMS_IP',$LMS_IP);
		$stmt->bindParam(':LMS_ACCESS_GB',$LMS_ACCESS_GB);
		$stmt->bindParam(':LMS_INFLOW_GB',$LMS_INFLOW_GB);
		$stmt->bindParam(':LMS_REGION',$row[0]["CTCODE"]);
		$stmt->bindParam(':LMS_COUNTRY',$LMS_CONTRY);
		$stmt->bindParam(':LMS_DEVICE',$LMS_DEVICE);
		$stmt->bindParam(':LMS_PART',$LMS_PART);
		$stmt->bindParam(':LMS_BRAND_GB',$LMS_GB);
		$stmt->bindParam(':LMS_CAR_GB',$LMS_CAR_GB);
		
		if($stmt->execute()){
			$dbh->commit();
		}else{
			$dbh->rollBack();
		}

	

?>