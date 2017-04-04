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

	function fun_agt(agt){
		if (agt.indexOf("samsungbrowser") != -1) {
			return 'Samsungbrowser'; 	
		}  if (agt.indexOf("chrome") != -1) {
			return 'Chrome'; 
		} else {
			return 'etc'; 
		}
	}

	window.addEventListener("load",function() {
	    setTimeout(function(){
	        // This hides the address bar:
	        window.scrollTo(0, 1);
	    }, 0);
	});

	// portrait / landscape
	$(window).trigger("orientationchange");
	
	if(!$("#wrap").hasClass("mobile")){
		$("html, body").css({
			"background":"none"
		});
	}

	$("section").on({
		"pagebeforeshow" : function(){
			$("#mokup, #wrap.mobile").addClass("landscape");
			$(".btn_device").hide();
			//뒤로가기 할때 뒤에 있는 오디오 pause
			// $("audio").each(function(){ 
			// 	this.pause();
			// 	if (!isNaN(this.duration)) {
			// 		this.currentTime = 0;
			// 	}
			// });
		}, 
		"pageshow" : function(){
			// if($(this).has(".audio1")) {
			// 	$(this).find(".audio1").trigger('play');//다음페이지로 넘기기 위해서 trigger꼭 써야함
			// }
		}
	});

	// $(".next_finger, .next_p_btn").click(function(e) {
	// 	if($("audio").length){
	// 		$("audio").each(function(){ 
	// 			this.pause();
	// 			if (!isNaN(this.duration)) {
	// 				this.currentTime = 0;
	// 			}
	// 		});
	// 	}
	// });

	$("#page0, #page1,#page2, #page3").on({
		"pagebeforeshow" : function(){
			$("#mokup, #wrap.mobile").removeClass("landscape");
			
		}
	});
});