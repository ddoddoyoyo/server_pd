$(document).ready(function(){
	// mobile, tablet / PC 구분
	mobile = (/iphone|ipad|ipod|android|blackberry|mini|windowssce|palm/i.test(navigator.userAgent.toLowerCase()));
	ios =  (/iphone|ipad|ipod/i.test(navigator.userAgent.toLowerCase()));
	android = (/android/i.test(navigator.userAgent.toLowerCase()));
	if(!mobile){
		$("#wrap").addClass("pc");
		$("body").append("<div id='mokup'></div>");
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

});
