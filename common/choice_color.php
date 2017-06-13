<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");

	$HY_LMS_SEQ = $_POST["HY_LMS_SEQ"];


	$COLOR_NO = $_POST["COLOR_NO"];

	$LMS_LANGUAGE = $_POST["LMS_LANGUAGE"];


	try 
	{
		$dbh->beginTransaction();
		
		$sql = "SELECT COUNT(*) AS COLOR_CNT FROM HD_PD_CHOICE_INFO WHERE LMS_SEQ = :LMS_SEQ AND PD_GUBUN = 1 AND LMS_LANGUAGE = :LMS_LANGUAGE";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(':LMS_SEQ',$HY_LMS_SEQ);
		$stmt->bindParam(':LMS_LANGUAGE',$LMS_LANGUAGE);
		$stmt->execute();
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if($row[0]["COLOR_CNT"] > 0 ){
			$MODE = "Modify";
		}else{
			$MODE = "Insert";
		}

		if($MODE == "Insert"){
			$sql = "INSERT INTO HD_PD_CHOICE_INFO 
					(
						LMS_SEQ,
						PD_GUBUN,
						PD_CHOICE,
						LMS_LANGUAGE,
						PD_REGDATE
					) 
					VALUES 
					(
						:LMS_SEQ, 
						1,
						:PD_CHOICE,
						:LMS_LANGUAGE,
						NOW()
					)";

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':LMS_SEQ',$HY_LMS_SEQ);
			$stmt->bindParam(':PD_CHOICE',$COLOR_NO);
			$stmt->bindParam(':LMS_LANGUAGE',$LMS_LANGUAGE);
			if($stmt->execute()){
				$dbh->commit();
			}else{
				$dbh->rollBack();
			}
		}else if($MODE == "Modify"){
			$sql = "UPDATE HD_PD_CHOICE_INFO SET 
						PD_CHOICE = :PD_CHOICE
					WHERE 
						LMS_SEQ = :LMS_SEQ
					AND
						PD_GUBUN = 1
					AND
						LMS_LANGUAGE = :LMS_LANGUAGE
					";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':PD_CHOICE',$COLOR_NO);
			$stmt->bindParam(':LMS_SEQ',$HY_LMS_SEQ);
			$stmt->bindParam(':LMS_LANGUAGE',$LMS_LANGUAGE);
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