<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");

	$LMS_NAME = $_POST["LMS_NAME"];
	$LMS_CONTRY = $_POST["LMS_CONTRY"];
	$LMS_GB = "hyundai";
	
	
	$sql = "SELECT COUNT(*) AS CNT FROM LMS_MEMBER WHERE LMS_CONTRY = :LMS_CONTRY AND LMS_NAME = :LMS_NAME AND LMS_GB = :LMS_GB";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(':LMS_NAME',$LMS_NAME);
	$stmt->bindParam(':LMS_CONTRY',$LMS_CONTRY);
	$stmt->bindParam(':LMS_GB',$LMS_GB);
	$stmt->execute();
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	
	
	$json["CNT"] = $row[0]["CNT"];
	echo json_encode($json);
	exit;
?>