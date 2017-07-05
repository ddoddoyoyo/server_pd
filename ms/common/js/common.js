$(document).ready(function(){

	$('#Login_Action').click(function(){
		var LMS_CONTRY = $("select[name=LMS_CONTRY]").val();
		var LMS_NAME = $("input[name=LMS_NAME]").val();
		var RETURN = $("input[name=RETURN]").val();
		var LANGUAGE = $("input[name=LANGUAGE]").val();
		var TYPE = $("input[name=TYPE]").val();
		var params="?LMS_CONTRY="+LMS_CONTRY+"&LMS_NAME="+LMS_NAME+"&RETURN="+RETURN+"&LANGUAGE="+LANGUAGE+"&TYPE="+TYPE;  

		if($("select[name=LMS_CONTRY]").val() == "")	{$("select[name=LMS_CONTRY]").focus();return;}
		if($("input[name=LMS_NAME]").val() == ""){$("input[name=LMS_NAME]").focus();return;};
		
		$.ajax({
				url:"../../common/user_check.php",
				type: "POST",
				dataType: "json",
				data:{
					LMS_NAME: LMS_NAME,
					LMS_CONTRY: LMS_CONTRY,
				},
				success:  function(json){			
					console.log(json);
					if(json.CNT > 0 ){
						var result = confirm("It is already registered name. \n Do you want to sign in?"); 
						if(result) { //yes 
							//자동 로그인
							document.location.href="../../common/login_action.php"+params+"";
						} else { //no 
							//stop
						}	

					}else{
						//정보가 없으면 다음단계(사진등록)
						document.Frm.submit();
					}
				},
			   error : function(xhr, status, error) {
					console.log(error);
			   }
			});

		
	});

	$('#input_country').change(function(){
		$("input[name=LMS_NAME]").focus();return;
	});

	
	$('#go_page10').click(function(){
		
		var HY_LMS_SEQ = $("input[name=SESSION_LMS_SEQ]").val();
		var LMS_LANGUAGE = $("input[name=LMS_LANGUAGE]").val();
		var CHOICE = "";

		$("#page9 .engine img").each(function(idx,obj){		
			if($(obj).hasClass('active')){
				if(idx == 0){
					CHOICE = 1;
				} else if(idx == 1){
					CHOICE = 2;
				} else if(idx == 2){
					CHOICE = 3;
				}	
			}
		});
		
		$.ajax({
			url:"../common/choice_engin.php",
			type: "POST",
			dataType: "json",
			data:{
				HY_LMS_SEQ: HY_LMS_SEQ,
				ENGINE_CHOICE: CHOICE,
				LMS_LANGUAGE: LMS_LANGUAGE,
			},
			success:  function(json){			
				console.log(json);
				if(json.result == 'success'){
					$.mobile.changePage("#page10");
				}
			},
		   error : function(xhr, status, error) {
				//console.log(error);
		   }
		});
	
	});

	$('#form_sumit').click(function(){

		var form = $('#Frm')[0];
		var data = new FormData(form);	

		var LMS_LANGUAGE = $("input[name=LMS_LANGUAGE]").val();
		
		var SESSION_APP_GB = $("input[name=SESSION_APP_GB]").val();


		
		
		if(typeof $('#upload')[0].files[0] == "undefinde"){
			alert('Please select an image.');
			return;
		} 

		if($('#upload').val() == ""){
			alert('Please select an image.');
			return;
		}

		
		$('#form_sumit').hide();

		data.append('PD_CON_IMAGE',$('#upload')[0].files[0]);
		data.append('PD_CON_TEXT',$('.pd_con_text').val());		
		data.append('LMS_SEQ',$('#SESSION_LMS_SEQ').val());
		data.append('LMS_LANGUAGE',LMS_LANGUAGE);
		data.append('LMS_TYPE',$("input[name=LMS_TYPE]").val());
		

		$.ajax({
			url: "../common/pd_content_insert.php",
			type: "POST",
			data: data, 
			dataType: "json",
			contentType: false,
			processData: false,
			success:  function(data){
				console.log(data);
				if(data.result == 'success'){
					//초기화

					$('#upload').val('');
					$('.pd_con_text').val('');
					if(SESSION_APP_GB ==""){
						location.href='../timeline_view.php';
					}else{
						alert('success');
					}
				} else {
					alert('오류가 발생했습니다');
				}

			},
			error : function(xhr, status, error) {
				//console.log(error);
			}
		});

	});
	


});



//인테리어 컬러
function choice_color(COLOR_NO){
	var HY_LMS_SEQ = $("input[name=SESSION_LMS_SEQ]").val();
	var LMS_LANGUAGE = $("input[name=LMS_LANGUAGE]").val();

	$.ajax({
			url:"../common/choice_color.php",
			type: "POST",
			dataType: "json",
			data:{
				HY_LMS_SEQ: HY_LMS_SEQ,
				COLOR_NO: COLOR_NO,
				LMS_LANGUAGE : LMS_LANGUAGE,
			},
			success:  function(json){			
				//console.log("1111111");
			},
		   error : function(xhr, status, error) {
				//console.log(error);
		   }
		});
}	


//중복체크
function lms_user_check(){
	
}

function main_go(language){
	if($("input[name=APP_GB]").val() == "APP"){
		//alert("APP");
		$("input[name=RETURN]").val("/pd/ms/"+language+"/main.php");
		$("input[name=LANGUAGE]").val(language);
		Frm.submit();
	}else{
		//alert("LINK");
		document.location.href="/pd/ms/"+language+"/";
	}
}