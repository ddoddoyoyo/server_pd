<?php
	include_once ($_SERVER[DOCUMENT_ROOT]."/common/commonFunction.php");

	$YB_CODE = $_REQUEST["YB_CODE"];

	$refer = $_SERVER['REMOTE_ADDR'];

	$request_url = "http://whois.kisa.or.kr/openapi/ipascc.jsp?query=".$refer."&key=2016081813570509350490&answer=json";
	
	$info = $tools->get_web_page($request_url);

	$data = json_decode($info['content'],true);

	$YB_CONTRY = $data['whois']['countryCode'];
	
	try 
	{
		$dbh->beginTransaction();

		$sql = "SELECT ENG,CTCODE FROM SPK_COUNTRY WHERE CCODE =:COUNTRY_CODE";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(':COUNTRY_CODE',$YB_CONTRY);
		$stmt->execute();
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$sql = "INSERT INTO YOUTUBE_COUNT 
					(
						GUBUN,
						YB_REGION,
						YB_COUNTRY,
						YB_CODE,
						YB_REGDATE
					) 
					VALUES 
					(
						1,
						:YB_REGION,
						:YB_COUNTRY,
						:YB_CODE,
						NOW()
					)";


			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':YB_REGION',$row[0]["CTCODE"]);
			$stmt->bindParam(':YB_COUNTRY',$row[0]["ENG"]);
			$stmt->bindParam(':YB_CODE',$YB_CODE);

			if($stmt->execute()){
				$json["result"] = "success";
				$dbh->commit();
			}else{
				$json["result"] = "fail";
				$dbh->rollBack();
			}

	} catch (PDOException $pe) {
		
		$dbh->rollBack();
		$json["result"] = "fail";
		
	}

	echo json_encode($json);
		

?>