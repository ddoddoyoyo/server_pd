<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");


	$LMS_LANGUAGE = $_POST["LMS_LANGUAGE"];

	//백분율
	//Total
	$sql = "SELECT COUNT(*) AS CNT FROM HD_PD_CHOICE_INFO WHERE PD_GUBUN = 1 AND LMS_LANGUAGE = :LMS_LANGUAGE";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(':LMS_LANGUAGE',$LMS_LANGUAGE);
	$stmt->execute();
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

	//1번
	$sql = "SELECT COUNT(*) AS CNT FROM HD_PD_CHOICE_INFO WHERE PD_GUBUN = 1 AND PD_CHOICE = 1 AND LMS_LANGUAGE = :LMS_LANGUAGE";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(':LMS_LANGUAGE',$LMS_LANGUAGE);
	$stmt->execute();
	$row_val1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

	//2번
	$sql = "SELECT COUNT(*) AS CNT FROM HD_PD_CHOICE_INFO WHERE PD_GUBUN = 1 AND PD_CHOICE = 2 AND LMS_LANGUAGE = :LMS_LANGUAGE";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(':LMS_LANGUAGE',$LMS_LANGUAGE);
	$stmt->execute();
	$row_val2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

	//3번
	$sql = "SELECT COUNT(*) AS CNT FROM HD_PD_CHOICE_INFO WHERE PD_GUBUN = 1 AND PD_CHOICE = 3 AND LMS_LANGUAGE = :LMS_LANGUAGE";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(':LMS_LANGUAGE',$LMS_LANGUAGE);
	$stmt->execute();
	$row_val3 = $stmt->fetchAll(PDO::FETCH_ASSOC);

	//4번
	$sql = "SELECT COUNT(*) AS CNT FROM HD_PD_CHOICE_INFO WHERE PD_GUBUN = 1 AND PD_CHOICE = 4 AND LMS_LANGUAGE = :LMS_LANGUAGE";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(':LMS_LANGUAGE',$LMS_LANGUAGE);
	$stmt->execute();
	$row_val4 = $stmt->fetchAll(PDO::FETCH_ASSOC);

	//5번
	$sql = "SELECT COUNT(*) AS CNT FROM HD_PD_CHOICE_INFO WHERE PD_GUBUN = 1 AND PD_CHOICE = 5 AND LMS_LANGUAGE = :LMS_LANGUAGE";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(':LMS_LANGUAGE',$LMS_LANGUAGE);
	$stmt->execute();
	$row_val5 = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$total = $row[0]["CNT"];

	$val_1 = $row_val1[0]["CNT"];
	$val_2 = $row_val2[0]["CNT"];
	$val_3 = $row_val3[0]["CNT"];
	$val_4 = $row_val4[0]["CNT"];
	$val_5 = $row_val5[0]["CNT"];

	$val1_percentage = $val_1 / $total * 100;
	$val2_percentage = $val_2 / $total * 100;
	$val3_percentage = $val_3 / $total * 100;
	$val4_percentage = $val_4 / $total * 100;
	$val5_percentage = $val_5 / $total * 100;

	$json["val1"] = round($val1_percentage);
	$json["val2"] = round($val2_percentage);
	$json["val3"] = round($val3_percentage);
	$json["val4"] = round($val4_percentage);
	$json["val5"] = round($val5_percentage);

	$json["val1_Cnt"] = $val_1;
	$json["val2_Cnt"] = $val_2;
	$json["val3_Cnt"] = $val_3;
	$json["val4_Cnt"] = $val_4;
	$json["val5_Cnt"] = $val_5;

	echo json_encode($json);
?>