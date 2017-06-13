$(document).ready(function(){
	// mobile, tablet / PC 구분
	mobile = (/iphone|ipad|ipod|android|blackberry|mini|windowssce|palm/i.test(navigator.userAgent.toLowerCase()));
	ios =  (/iphone|ipad|ipod/i.test(navigator.userAgent.toLowerCase()));
	android = (/android/i.test(navigator.userAgent.toLowerCase()));
	if(!mobile){
		$("#wrap").addClass("mobile");
		$("body").append("<div id='mokup'><a class='btn btn_device'><img src='../images/icon_again.png' alt='Tilt device'></a></div>");
		//$(".ui-page").css("min-height": "100%");
	} 
	else {
		$("body").css({"background":"none"});

		// layout
		if(ios && navigator.userAgent.indexOf("KAKAOTALK") < 0){
			function vh(){
				$("html, body").css({"min-height":$(window).height() + 1});
			}
			$(window).on("orientationchange", function(){
				if(window.orientation != 0){
					vh();
				}
			});
		}
	}

/*
	var android = (/|android|/i.test(navigator.userAgent.toLowerCase()));
		var agt = navigator.userAgent.toLowerCase();
		var browser = fun_agt(agt);

		if(android){
			if(browser == "Samsungbrowser"){
				$("body").css({'height':'calc(100% + 20px)'});
				$(".ui-mobile-viewport").css({'height':'calc(100% + 20px)'});
				$(".ui-mobile").css({"top":"10px"});
			} else if(browser == "Chrome") {
				$("body").css({'height':'calc(100% + 20px)'});
				$(".ui-mobile").css({"top":"20px"});
				$('.ui-mobile').css({'height':'calc(100% + 30px)'});
			} else {

			}
		}
	 });

	 function fun_agt(agt){
		if (agt.indexOf("samsungbrowser") != -1) {
			return 'Samsungbrowser'; 	
		}  if (agt.indexOf("chrome") != -1) {
			return 'Chrome'; 
		} else {
			return 'etc'; 
		}
	}
*/

});

function view_search(){

	$('.moreView').remove();

	var list_cnt = $('.list .article').length;
	var limit = 0;


	if(list_cnt == $('#TOT_LIST_COUNT').val()){
		return false;
	}

	list_cnt = list_cnt; 
	
	$.ajax({
		url: "/pd/timeline_view_data.php",
		type: "POST",
		dataType: "json",
		data:{
			list: list_cnt,
			Total_Cnt: $('#TOT_LIST_COUNT').val(),
		},
		success:  function(json){
			//console.log(json);
			if(json.data){
				$('.list').append(json.data);
			}

		}
	});
}