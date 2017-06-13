<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");

	$LMS_CONTRY = urldecode($_REQUEST["LMS_CONTRY"]);

	$LMS_NAME = urldecode($_REQUEST["LMS_NAME"]);

	$LMS_LANGUAGE = urldecode($_REQUEST["LANGUAGE"]);

	$LMS_GB = "hyundai";

	$SR_SUBJECT_CODE = "PD";

	$RETURN = urldecode($_REQUEST["RETURN"]);


	


	$sql = "SELECT LMS_SEQ FROM LMS_MEMBER WHERE LMS_CONTRY = :LMS_CONTRY AND LMS_NAME = :LMS_NAME AND LMS_GB = :LMS_GB  AND LMS_STATUS = 'Y'";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(':LMS_NAME',$LMS_NAME);
	$stmt->bindParam(':LMS_CONTRY',$LMS_CONTRY);
	$stmt->bindParam(':LMS_GB',$LMS_GB);
	$stmt->execute();
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$LMS_SEQ = $row[0]["LMS_SEQ"];


	$HY_LMS_CONTRY = $LMS_CONTRY;
	$HY_LMS_NAME = $LMS_NAME;
	$HY_LMS_GB = $LMS_GB;
	$HY_LMS_SEQ = $LMS_SEQ;

	
	include_once ($_SERVER[DOCUMENT_ROOT]."/pd/common/connection_insert.php");
	
	
	$HY_APP_GB = $APP_GB;

	@session_register("HY_LMS_CONTRY")	or die("session_register err");
	@session_register("HY_LMS_NAME")	or die("session_register err");
	@session_register("HY_LMS_GB")	or die("session_register err");
	@session_register("HY_LMS_SEQ")	or die("session_register err");
	@session_register("HY_APP_GB")	or die("session_register err");


	$tools->JavaGo($RETURN);
?>