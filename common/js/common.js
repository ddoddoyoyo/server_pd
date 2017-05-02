$(document).ready(function(){

	$('#Login_Action').click(function(){
		var LMS_CONTRY = $("select[name=LMS_CONTRY]").val();
		var LMS_NAME = $("input[name=LMS_NAME]").val();
		var RETURN = $("input[name=RETURN]").val();
		var params="?LMS_CONTRY="+LMS_CONTRY+"&LMS_NAME="+LMS_NAME+"&RETURN="+RETURN;  

		if($("select[name=LMS_CONTRY]").val() == "")	{$("select[name=LMS_CONTRY]").focus();return;}
		if($("input[name=LMS_NAME]").val() == ""){$("input[name=LMS_NAME]").focus();return;};
		
		$.ajax({
				url:"/pd/common/user_check.php",
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
							document.location.href="/pd/common/login_action.php"+params+"";
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
			url:"/pd/common/choice_engin.php",
			type: "POST",
			dataType: "json",
			data:{
				HY_LMS_SEQ: HY_LMS_SEQ,
				ENGINE_CHOICE: CHOICE,
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
		
		if(typeof $('#upload')[0].files[0] == "undefinde"){
			alert('Please select an image.');
			return;
		} 

		if($('#upload').val() == ""){
			alert('Please select an image.');
			return;
		}

		data.append('PD_CON_IMAGE',$('#upload')[0].files[0]);
		data.append('PD_CON_TEXT',$('.pd_con_text').val());		
		data.append('LMS_SEQ',$('#SESSION_LMS_SEQ').val());
		

		$.ajax({
			url: "/pd/common/pd_content_insert.php",
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

					//$.mobile.changePage("#page0");
					//window.open('/pd/timeline_view.php','toolbar=no, scrollbars=yes');
					//fb_pupup();
					//window.open('/pd/en/timeline_view.html','toolbar=no, scrollbars=yes');
					//location.href='/pd/en/day1.php';
					location.href='/pd/timeline_view.php';
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
function choice_color(no){
	var HY_LMS_SEQ = $("input[name=SESSION_LMS_SEQ]").val();
	var COLOR_MODE = $("input[name=COLOR_MODE]").val();

	$.ajax({
			url:"/pd/common/choice_color.php",
			type: "POST",
			dataType: "json",
			data:{
				HY_LMS_SEQ: HY_LMS_SEQ,
				COLOR_MODE: COLOR_MODE,
				NO: no,
			},
			success:  function(json){			
				//console.log(json);
			},
		   error : function(xhr, status, error) {
				//console.log(error);
		   }
		});
}	


//중복체크
function lms_user_check(){
	
}