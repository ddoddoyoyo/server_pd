<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");

	$HY_LMS_SEQ = $_POST["HY_LMS_SEQ"];

	$COLOR_MODE = $_POST["COLOR_MODE"];

	$NO = $_POST["NO"];


	try 
	{
		$dbh->beginTransaction();
		if($COLOR_MODE == "Insert"){
			$sql = "INSERT INTO HD_PD_CHOICE_INFO 
					(
						LMS_SEQ,
						PD_GUBUN,
						PD_CHOICE,
						PD_REGDATE
					) 
					VALUES 
					(
						:LMS_SEQ, 
						1,
						:PD_CHOICE, 
						NOW()
					)";

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':LMS_SEQ',$HY_LMS_SEQ);
			$stmt->bindParam(':PD_CHOICE',$NO);
			if($stmt->execute()){
				$dbh->commit();
			}else{
				$dbh->rollBack();
			}
		}else if($COLOR_MODE == "Modify"){
			$sql = "UPDATE HD_PD_CHOICE_INFO SET 
						PD_CHOICE = :PD_CHOICE
					WHERE 
						LMS_SEQ = :LMS_SEQ
					AND
						PD_GUBUN = 1
					";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':PD_CHOICE',$NO);
			$stmt->bindParam(':LMS_SEQ',$HY_LMS_SEQ);
			if($stmt->execute()){
				$dbh->commit();
			}else{
				$dbh->rollBack();
			}
		}

	}catch (PDOException $pe) {
		$dbh->rollBack();
		exit;
	}
?>