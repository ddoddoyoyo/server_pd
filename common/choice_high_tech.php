<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");

	$HY_LMS_SEQ = $_POST["HY_LMS_SEQ"];

	$CHOICE = $_POST["CHOICE"];


	$sql = "SELECT COUNT(*) AS CNT FROM HD_PD_CHOICE_INFO WHERE LMS_SEQ = :LMS_SEQ AND PD_GUBUN = 3";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(':LMS_SEQ',$HY_LMS_SEQ);
	$stmt->execute();
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$CNT = $row[0]["CNT"];
	

	try 
	{
		$dbh->beginTransaction();

		if($CNT == 0 ){
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
						3,
						:PD_CHOICE, 
						NOW()
					)";

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':LMS_SEQ',$HY_LMS_SEQ);
			$stmt->bindParam(':PD_CHOICE',$CHOICE);

			if($stmt->execute()){
				$dbh->commit();		
				$json["result"] = "success";
			}else{
				$dbh->rollBack();
				$json["result"] = "fail";
			}

			

		}else {

			$sql = "UPDATE HD_PD_CHOICE_INFO SET 
						PD_CHOICE = :PD_CHOICE
					WHERE 
						LMS_SEQ = :LMS_SEQ
					AND
						PD_GUBUN = 3
					";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':PD_CHOICE',$CHOICE);
			$stmt->bindParam(':LMS_SEQ',$HY_LMS_SEQ);
			if($stmt->execute()){
				$dbh->commit();
				$json["result"] = "success";
			}else{
				$dbh->rollBack();
				$json["result"] = "fail";
			}
		}

	}catch (PDOException $pe) {
		$dbh->rollBack();
		$json["result"] = "fail";
	}
	
	echo json_encode($json);
?>