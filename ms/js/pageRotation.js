$(document).ready(function(){
	// mobile, tablet / PC 구분
	mobile = (/iphone|ipad|ipod|android|blackberry|mini|windowssce|palm/i.test(navigator.userAgent.toLowerCase()));
	ios =  (/iphone|ipad|ipod/i.test(navigator.userAgent.toLowerCase()));
	android = (/android/i.test(navigator.userAgent.toLowerCase()));
	if(!mobile){
		$("#wrap").addClass("mobile");
		$("body").append("<div id='mokup'><a class='btn btn_device'><img src='../images/icon_again.png' alt='Tilt device'></a></div>");
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

	// portrait / landscape
	$(window).on("orientationchange", function(){
		//page1
		$("#page1").on({
			"pagebeforeshow" : function(){
				$(".btn_device").removeClass("landscape");
			}, 
			"pageshow" : function(){
				
			}
		});

		$("#page2").on({
			"pagebeforeshow" : function(){
				$(".btn_device").addClass("landscape");
			}, 
			"pageshow" : function(){
				
			}
		});
	});

	

	$(".btn_device").click(function(){
		
		
			$("#mokup").addClass("landscape");
			$("#wrap.mobile").addClass("landscape");
		
	});
});

function changeViewP(){
	if($("#mokup").hasClass("landscape")){
	   $("#mokup").removeClass("landscape");
	}
	if($("#wrap.mobile").hasClass("landscape")){
		$("#wrap.mobile").removeClass("landscape");
	}
}