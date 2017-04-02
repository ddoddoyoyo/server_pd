<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");

	//백분율
	//Total
	$sql = "SELECT COUNT(*) AS CNT FROM HD_PD_CHOICE_INFO WHERE PD_GUBUN = 2";
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

	//1번
	$sql = "SELECT COUNT(*) AS CNT FROM HD_PD_CHOICE_INFO WHERE PD_GUBUN = 2 AND PD_CHOICE = 1";
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	$row_val1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

	//2번
	$sql = "SELECT COUNT(*) AS CNT FROM HD_PD_CHOICE_INFO WHERE PD_GUBUN = 2 AND PD_CHOICE = 2";
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	$row_val2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

	//3번
	$sql = "SELECT COUNT(*) AS CNT FROM HD_PD_CHOICE_INFO WHERE PD_GUBUN = 2 AND PD_CHOICE = 3";
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	$row_val3 = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$total = $row[0]["CNT"];

	$val_1 = $row_val1[0]["CNT"];
	$val_2 = $row_val2[0]["CNT"];
	$val_3 = $row_val3[0]["CNT"];

	$val1_percentage = $val_1 / $total * 100;
	$val2_percentage = $val_2 / $total * 100;
	$val3_percentage = $val_3 / $total * 100;

	$json["val1"] = round($val1_percentage);
	$json["val2"] = round($val2_percentage);
	$json["val3"] = round($val3_percentage);

	$json["val1_Cnt"] = $val_1;
	$json["val2_Cnt"] = $val_2;
	$json["val3_Cnt"] = $val_3;

	echo json_encode($json);
?>