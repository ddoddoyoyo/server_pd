<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");
	header("Content-Type: text/html; charset=UTF-8");
	
	$sql = "SELECT COUNT(*) AS CNT FROM LMS_MEMBER WHERE LMS_GB = 'hyundai' AND LMS_IP != '1.212.181.194'";
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$sql = "SELECT COUNT(*) AS CNT FROM HD_CONTENT_BOARD WHERE HD_CON_GUBUN = 'PD' AND HD_CON_FILENAME != ''";
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	$row2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
?>

I30 가입자 수  : <?=$row[0]["CNT"]?><br/>

사진 업로수 수  : <?=$row2[0]["CNT"]?>