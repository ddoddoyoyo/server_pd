<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");



	if(!$COUNTRY_CODE){
		$tools->errMsg("fail");
	}


	try 
	{
		
		$dbh->beginTransaction();
		
		//나라코드 찾기
		$sql = "SELECT ENG,CTCODE FROM SPK_COUNTRY WHERE CCODE =:COUNTRY_CODE";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(':COUNTRY_CODE',$COUNTRY_CODE);
		$stmt->execute();
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt->closeCursor();
		
		$sql = "INSERT INTO HD_AD_STATS (AD_IP, AD_ACCESS_GUBUN, AD_INFLOW_GUBUN, AD_REGION, AD_COUNTRY, AD_DEVICE, AD_REGDATE, AD_PART, ADM_BRAND_GUBUN, ADM_CAR_GUBUN, LECT_SEQ ,LMS_SEQ ) 
				VALUES (:AD_IP,:AD_ACCESS_GUBUN,:AD_INFLOW_GUBUN,:AD_REGION,:AD_COUNTRY,:AD_DEVICE,NOW(),:PART, 'hyundai', 'PD', :LECT_SEQ ,:LMS_SEQ)";
		$stmt = $dbh->prepare($sql);

		$stmt->bindParam(':AD_IP',$IP);
		$stmt->bindParam(':AD_ACCESS_GUBUN',$ADM_ACCESS_GUBUN);
		$stmt->bindParam(':AD_DEVICE',$ADM_DEVICE);
		$stmt->bindParam(':AD_INFLOW_GUBUN',$ADM_INFLOW_GUBUN);
		$stmt->bindParam(':AD_COUNTRY',$row[0]['ENG']);
		$stmt->bindParam(':AD_REGION',$row[0]['CTCODE']);
		$stmt->bindParam(':LMS_SEQ',$LMS_SEQ);
		$stmt->bindParam(':LECT_SEQ',$LECT_SEQ);
		$stmt->execute();

		$dbh->commit();

	} catch (PDOException $pe) {

		$dbh->rollBack();
	}
	
?>