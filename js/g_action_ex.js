






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

	window.addEventListener("load",function() {
	    setTimeout(function(){
	        // This hides the address bar:
	        window.scrollTo(0, 1);
	    }, 0);
	});

	// portrait / landscape
	$(window).trigger("orientationchange");
	
	$("section").on({
		"pagebeforeshow" : function(){
			$("#mokup, #wrap.mobile").addClass("landscape");
			$(".btn_device").hide();
		}
	});

	$("#page0, #page1,#page2, #page3").on({
		"pagebeforeshow" : function(){
			$("#mokup, #wrap.mobile").removeClass("landscape");
			
		}
	});

	//country selectbox
	var select = $("select#input_country");
    select.change(function(){
        var select_name = $(this).children("option:selected").text();
        $(this).siblings("label").text(select_name);
        $(this).siblings("label").css({"color":"#002c5f","background-image":"url('../images/button/icon_country_arrow_select.png')"});
    });

	//page1
	$("#page0").on({
		"pagebeforeshow" : function(){
			
		}, 
		"pageshow" : function(){
			
		}
	});

	$("#page1").on({
		"pagebeforeshow" : function(){
			//$("#page1 .input2").hide();
			//$("#page1 .input1").show();
			//$("#page1 .ui-select, #page1 ui-select #input_country-button").removeAttr("style");
		}
	});
	// $("#page1 .intnext_btn").click(function(){
	// 	$("#page1 .input1").hide();
	// 	$("#page1 .input2").show();
	// });

	$("#page3").on({
		"pagebeforeshow" : function(){
			$(".layer_landscape, .btn_device").show();

		}, 
		"pageshow" : function(){
			$(".btn_device").click(function(){
				$("#page3 .ok_btn").show();
				$(this).hide();
			});
		}
	});
	

	$(window).on("orientationchange",function(){
	  if(window.orientation == 0){ // Portrait
	  	$("#page3 .ok_btn").hide();
	  }
	  else{ // Landscape : window.orientation == 90 || window.orientation == -90
		$("#page3 .ok_btn").show();
  	  }	
	});

	//page4
// 	$("#page4").on("pageshow", function(event, ui) {
//     $.mobile.loading('show');
//     setTimeout(function(){
//         processCreateBtnAction(); //This takes 5 seconds to complete the operation
//         $.mobile.loading('hide');
//     }, 20);
// });
	

	$("#page5").on({
		"pagebeforeshow" : function(){
			$("#page5 #textbox2, #page5 #go_back, #page5 .next_p_btn").hide();
			$("#page5 #textbox1, #page5 #go_next1").show();
		}, 
		"pageshow" : function(){
			// $('#page5 .page_bg')
			// .fadeOut()
			// .delay(500)
			// .queue(function() {
		 //        $(this).css({"background-image":"url(../images/day1/landscape/06_bg_map_3.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		 //    })
		 //    .fadeIn(500);
			next_Count = 1;
		}
	});

	$("#page5 #go_next1").click(function(){
		if(next_Count == 1){
		    $("#page5 #textbox1, #page5 #go_next1").hide();
		    $("#page5 #textbox2, #page5 #go_back, #page5 .next_p_btn").show();
		 //    $('#page5 .page_bg')
			// .fadeOut()
			// .queue(function() {
		 //        $(this).css({"background-image":"url(../images/day1/landscape/06_bg_map_13.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		 //    })
		 //    .fadeIn(500);
		} 
		next_Count++;
	});

	$("#page5 #go_back").click(function(e){
		if(next_Count == 1){
			
		} else if(next_Count == 2){
			$(this).hide();
			$("#page5 #textbox1, #page5 #go_next1").show();
			$("#page5 #textbox2, #page5 .next_p_btn").hide();
			// $('#page5 .page_bg')
			// .fadeOut()
			// .queue(function() {
		 //        $(this).css({"background-image":"url(../images/day1/landscape/06_bg_map_3.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		 //    })
		 //    .fadeIn(500);
			
		}
		next_Count--;
	});

	// $("#page9").on({
	// 	"pagebeforeshow" : function(){
	// 		//$("#page9 .imgwrap img,#page9 .textwrap").fadeIn(1000);
	// 		//$("#page9 .go-next").delay(500).fadeIn(500);

	// 	}, 
	// 	"pageshow" : function(){
	// 		//$("#page9 .imgwrap, #page9 .textwrap").delay(500).fadeIn(1000);
	// 		$("#page9 .go-next").delay(500).fadeIn(500);
	// 		//$("#page6 .next_finger").delay(500).fadeIn(500);
	// 	}
	// });

	$("#page6").on({
		"pagebeforeshow" : function(){
			$("#page6 .next_finger").hide()

		}, 
		"pageshow" : function(){
			$("#page6 .next_finger").delay(500).fadeIn(500);
		}
	});

	$("#page12").on({
		"pagebeforeshow" : function(){
			$("#page12 #textbox2, #page12 #go_back, #page12 .next_p_btn").hide();
			$("#page12 #textbox1, #page12 #go_next1").show();
		}, 
		"pageshow" : function(){
			next_Count = 1;
		}
	});

	$("#page12 #go_next1").click(function(){
		if(next_Count == 1){
		    $("#page12 #textbox1, #page12 #go_next1").hide();
		    $("#page12 #textbox2, #page12 #go_back, #page12 .next_p_btn").show();
		} 
		next_Count++;
	});

	$("#page12 #go_back").click(function(e){
		if(next_Count == 1){
			
		} else if(next_Count == 2){
			$(this).hide();
			$("#page12 #textbox1, #page12 #go_next1").show();
			$("#page12 #textbox2, #page12 .next_p_btn").hide();
		}
		next_Count--;
	});

	$("#page13").on({
		"pagebeforeshow" : function(){
			$("#page13 .next_p_btn, #page13 .percentage,#page13 .imgwrap").hide();
			//$("#page13 .next_finger").show();
		}, 
		"pageshow" : function(){
			$('#page13').css({"background":"url(../images/day1/13_bg_1.jpg)","background-repeat":"no-repeat", "background-size":"auto 100%"}).show();
			$("#page13 .next_finger img").css({"left":"27%","top":"47%"});
			$("#page13 .next_finger, #page13 .next_finger img").show();
		}
	});

	var ahss_ck=0;
	$("#page13 .next_finger").click(function(){
		ahss_ck++;
		$("#page13 .next_finger,#page13 .next_finger img, #page13 .btn_push").hide();
		
		if(ahss_ck % 3 ==1){
			$('#page13').css({"transition":"background-image 1s ease-in-out","background":"url(../images/day1/13_bg_2.jpg)","background-repeat":"no-repeat", "background-size":"auto 100%"}).fadeIn(500);
			$("#page13 .point, #page13 .percentage, #page13 .imgwrap,#page13 .next_finger").fadeIn(500);
			$("#page13 .next_finger img").css({"left":"22%","top":"35%"}).delay(1500).fadeIn(500);
			$("#page13 .incremental-counter#int").attr('data-value','17');
			$("#page13 .incremental-counter#decimal").attr('data-value','7');
			$("#page13 .incremental-counter").incrementalCounter({"digits": "auto"});
		}else if(ahss_ck  % 3 ==2){
			$('#page13').css({"transition":"background-image 1s ease-in-out","background":"url(../images/day1/13_bg_3.jpg)","background-repeat":"no-repeat", "background-size":"auto 100%"}).fadeIn(500);
			$("#page13 .point, #page13 .percentage,#page13 .next_finger").fadeIn(500);
			$("#page13 .next_finger img").css({"left":"21%","top":"12%"}).delay(1500).fadeIn(500);
			$("#page13 .incremental-counter#int").attr('data-value','27');
			$("#page13 .incremental-counter#decimal").attr('data-value','2');
			$("#page13 .incremental-counter").incrementalCounter({"digits": "auto"});
		}else if(ahss_ck % 3 ==0){
			$('#page13').css({"transition":"background-image 1s ease-in-out","background":"url(../images/day1/13_bg_4.jpg)","background-repeat":"no-repeat","background-size":"auto 100%"}).fadeIn(500);
			$("#page13 .point, #page13 .percentage,#page13 .next_finger").fadeIn(500);
			$("#page13 .next_p_btn").delay(1500).fadeIn(500);
			$("#page13 .incremental-counter#int").attr('data-value','53');
			$("#page13 .incremental-counter#decimal").attr('data-value','5');
			$("#page13 .incremental-counter").incrementalCounter({"digits": "auto"});
		}

	});

	$("#page14").on({
		"pagebeforeshow" : function(){
			$("#page14 .try_again, #page14 .good").hide();
		}, 
		"pageshow" : function(){
			
		}
	});

	$("#page14 .wrong").click(function(){
		$("#page14 .try_again").show()
		$("#page14 .try_again").delay(1000).fadeOut(500);
	});

	$("#page14 .right").click(function(){
		$("#page14 .good").show();
		setTimeout(function(){
			$.mobile.changePage("#page15");
		},1000);
		
	
		
	});

	$("#page16").on({
		"pagebeforeshow" : function(){
			$("#page16 #textbox2, #page16 #go_back, #page16 .next_p_btn").hide();
			$("#page16 #textbox1, #page16 #go_next1").show();
		}, 
		"pageshow" : function(){
			next_Count = 1;
		}
	});

	$("#page16 #go_next1").click(function(){
		if(next_Count == 1){
		    $("#page16 #textbox1, #page16 #go_next1").hide();
		    $("#page16 #textbox2, #page16 #go_back, #page16 .next_p_btn").show();
		} 
		next_Count++;
	});

	$("#page16 #go_back").click(function(e){
		if(next_Count == 1){
			
		} else if(next_Count == 2){
			$(this).hide();
			$("#page16 #textbox1, #page16 #go_next1").show();
			$("#page16 #textbox2, #page16 .next_p_btn").hide();
		}
		next_Count--;
	});

	$("#page17").on({
		"pagebeforeshow" : function(){
			$("#page17 #textbox2, #page17 .view_text").hide();
			$("#page17 #textbox1").show();
			$('#page17 .ui-content').queue(function() {
		        $(this).css({"background":"url(../images/day1/landscape2/17_photo_1.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		    })
		}, 
		"pageshow" : function(){
			$("#page17 .next_finger").delay(500).fadeIn(500);
		}
	});
	$("#page17 .next_finger").click(function(){
		$(this).hide();
		$('#page17 .ui-content')
			.delay(500)
			.fadeOut()
		    .queue(function() {
		        $(this).css({"background-image":"url(../images/day1/landscape2/17_photo_2.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		    })
		    .fadeIn(500)
		    .animate({ backgroundSize: '120%' }, 800);
		$("#page17 .textwrap").hide();
		$("#page17 .view_text").delay(2000).fadeIn();
	});

	$("#page18").on({
		"pagebeforeshow" : function(){
			$('#page18 .next_p_btn, #page18 #go_back, #page18 #textbox2, #page18 #textbox3').hide();
			$("#page18 #textbox1, #page18 #go_next1").show();
			$('#page18 .page_bg').css({"background":"url(../images/day1/landscape2/18_photo_1.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"});
		}, 
		"pageshow" : function(){
			next_Count = 1;
		}
	});

	$("#page18 #go_next1").click(function(e){
		if(next_Count == 1){
			$('#page18 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day1/landscape2/18_photo_2.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page18 #go_back").fadeIn();
		    $("#page18 #textbox1").hide();
		    $("#page18 #textbox2").show();
		} else if(next_Count == 2){
			$('#page18 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day1/landscape2/19_photo_2.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page18 #go_next1, #page18 #textbox2").hide();
		    $("#page18 .next_p_btn, #page18 #textbox3").show();
		} 
		next_Count++;
	});


	$("#page18 #go_back").click(function(e){
		if(next_Count == 1){
			
		} else if(next_Count == 2){
			$(this).hide();
			$('#page18 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day1/landscape2/18_photo_1.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page18 #textbox1").show();
			$("#page18 #textbox2, #page18 .next_p_btn").hide();
		} else if(next_Count == 3){
			$('#page18 #go_next1').show()
			$('#page18 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day1/landscape2/18_photo_2.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page18 #textbox2").show();
			$("#page18 #textbox3, #page18 .next_p_btn").hide();
		}
		next_Count--;
	});

	$("#page22").on({
		"pagebeforeshow" : function(){
			$("#page22 .textwrap, #page22 #textbox2, #page22 #textbox3, #page22 .text_btn_r, #page22 .next_p_btn").hide();
			$("#page22 .start_text").show();
		}, 
		"pageshow" : function(){
			$("#page22 #textbox1").show();
			
			next_Count = 1;
		}
	});
	$("#page22 .imgwrap").click(function(){
		$("#page22 .textwrap, #page22 .start_text").toggle();
	});

	$("#page22 #go_next1").click(function(){
		if(next_Count == 1){
		    $("#page22 #textbox1, #page22 #go_next1").hide();
		    $("#page22 #textbox2, #page22 #go_back, #page22 .text_btn_l").show();
		} else if(next_Count == 2){
			$("#page22 #textbox3, #page22 #go_back ,#page22 .next_p_btn").show();
			$("#page22 #textbox2, #page22 #go_next1").hide();
		 }
		next_Count++;
	});

	$("#page22 #go_back").click(function(e){
		if(next_Count == 1){
			//$("#page22 #go_back").hide();
		} else if(next_Count == 2){
			$("#page22 #textbox1, #page22 #go_next1, #page22 #go_back").show();
			$("#page22 #textbox2, #page22 .next_p_btn, #page22 #go_back").hide();
		} else if(next_Count == 3){
			$("#page22 #textbox2, #page22 #go_next1").show();
			$("#page22 #textbox3, #page22 .next_p_btn").hide();
		}
		next_Count--;
	});
	

	$("#page23").on({
		"pagebeforeshow" : function(){
			$("#page23 #textbox2, #page23 #go_back, #page23 .next_p_btn").hide();
			$("#page23 #textbox1, #page23 #go_next1").show();
		}, 
		"pageshow" : function(){
			next_Count = 1;
		}
	});

	$("#page23 #go_next1").click(function(){
		if(next_Count == 1){
		    $("#page23 #textbox1, #page23 #go_next1").hide();
		    $("#page23 #textbox2, #page23 #go_back, #page23 .next_p_btn").show();
		} 
		next_Count++;
	});

	$("#page23 #go_back").click(function(e){
		if(next_Count == 1){
			
		} else if(next_Count == 2){
			$(this).hide();
			$("#page23 #textbox1, #page23 #go_next1").show();
			$("#page23 #textbox2, #page23 .next_p_btn").hide();
		}
		next_Count--;
	});

	$("#page25").on({
		"pagebeforeshow" : function(){
			$("#page25 .view_text").hide();
			$("#page25 #textbox1").show();
			$('#page25 .page_bg').queue(function() {
		        $(this).css({"background":"url(../images/day1/38_photo_1.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		    })
		}, 
		"pageshow" : function(){
			$("#page25 .next_finger").delay(500).fadeIn(500);
		}
	});

	$("#page25 .next_finger").click(function(){
		$(this).hide();
		$('#page25 .page_bg')
			.delay(500)
			.fadeOut()
		    .queue(function() {
		        $(this).css({"background-image":"url(../images/day1/38_photo_2.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		    })
		    .fadeIn(500)
		    .animate({ backgroundSize: '120%' }, 800);
		$("#page25 .textwrap").hide();
		$("#page25 .view_text").delay(2000).fadeIn();
	});	

	$("#page26").on({
		"pagebeforeshow" : function(){
			$('#page26 .next_p_btn, #page26 #go_back, #page26 #textbox2, #page26 #textbox3, #page26 #textbox4').hide();
			$("#page26 #textbox1, #page26 #go_next1").show();
			$('#page26 .page_bg').css({"background":"url(../images/day1/40_photo_1.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"});
		}, 
		"pageshow" : function(){
			next_Count = 1;
		}
	});

	$("#page26 #go_next1").click(function(e){
		if(next_Count == 1){
			$('#page26 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day1/38_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page26 #go_back").fadeIn();
		    $("#page26 #textbox1").hide();
		    $("#page26 #textbox2").show();
		} else if(next_Count == 2){
			$('#page26 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day1/39_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page26 #textbox2").hide();
		    $("#page26 #textbox3").show();
		} else if(next_Count == 3){
			$('#page26 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day1/40_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page26 #go_next, #page26 #textbox3, #page26 #go_next1").hide();
		    $("#page26 .next_p_btn, #page26 #textbox4").show();
		} 
		next_Count++;
	});


	$("#page26 #go_back").click(function(e){
		if(next_Count == 1){
			
		} else if(next_Count == 2){
			$(this).hide();
			$('#page26 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day1/40_photo_1.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page26 #textbox1").show();
			$("#page26 #textbox2, #page26 .next_p_btn").hide();
		} else if(next_Count == 3){
			$('#page26 #go_next1').show()
			$('#page26 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day1/38_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page26 #textbox2").show();
			$("#page26 #textbox3").hide();
		}else if(next_Count == 4){
			$('#page26 #go_next1').show()
			$('#page26 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day1/39_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page26 #textbox3").show();
			$("#page26 #textbox4, #page26 .next_p_btn").hide();
		}
		next_Count--;
	});
	
	//page30
	$("#page30").on({
		"pagebeforeshow" : function(){
			$("#page30 .textwrap, #page30 #textbox2, #page30 #textbox3, #page30 .text_btn_r, #page30 .next_p_btn,#page30 .img_trinkle #img2").hide();
			$("#page30 .start_text, #page30 #go_next1").show();
		}, 
		"pageshow" : function(){
			$("#page30 #textbox1").show();	
			next_Count = 0;
		}
	});
	$("#page30 .imgwrap").click(function(){
		$("#page30 .textwrap, #page30 .start_text").toggle();
	});

	$("#page30 #go_next1").click(function(){
		next_Count++;
		if(next_Count == 1){
		    $("#page30 #textbox1, #page30 #go_next1,#page30 .ui-content .img_twinkle").hide();
		    $("#page30 #textbox2, #page30 #go_back, #page30 .next_p_btn").show();
		    $('#page30')
			//.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day1/49_i30.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		    })
		    .fadeIn(500);
		}
		
	});

	$("#page30 #go_back").click(function(){
		next_Count--;
		if(next_Count == 0){
			$("#page30 #textbox1, #page30 #go_next1").show();
			$("#page30 #textbox2, #page30 #go_back, #page30 .next_p_btn").hide();
			$('#page30')
			//.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day1/48_i30.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		    })
		    .fadeIn(500);
		} 
		
	});

	$("#page32").on({
		"pageshow" : function(){
			$("#page32 .next_p_btn").hide();
			$("#page32 .newline").css({"width":"0"});
			//$("#page32 .newline").css({"height":"50px"});
			//$("#page32 .newline img").css({"width":"411px", "height":"50px"});
			$("#page32 .drawSlider").slider({ //붓 움직이기
				range:"max",
				min: 0,
				max: 80,
				value:0,
				slide: function( event, ui ){
					 $(this).find(".ui-slider-handle").css({"top": - ui.value + "%"}); //붓
					 $(this).next(".newline").css({"width":ui.value + "%"}); //라인
					 //console.log(ui.value);
					 if(ui.value == 80){
						$("#page32 .next_p_btn").show();
					}
				}

			});
			//$("#page32 .drawSlider").draggable();
			
			
		}	
	});

	//page33
	$("#page33").on({
		"pagebeforeshow" : function(){
			$("#page33 .textwrap,#page33 .next_p_btn").hide();
			$("#page33 .start_text").show();
		}, 
		"pageshow" : function(){
			$("#page33 #textbox1").show();	
		}
	});
	$("#page33 .imgwrap").click(function(){
		$("#page33 .textwrap, #page33 .start_text, #page33 .next_p_btn").toggle();
	});

	//page35
	$("#page35").on({
		"pagebeforeshow" : function(){
			$("#page35 .textwrap,#page35 .next_p_btn").hide();
			$("#page35 .start_text").show();
		}, 
		"pageshow" : function(){
			$("#page35 #textbox1").show();	
		}
	});
	$("#page35 .imgwrap").click(function(){
		$("#page35 .textwrap, #page35 .start_text, #page35 .next_p_btn").toggle();
	});

	$("#page37").on({
		"pagebeforeshow" : function(){
			$("#page37 .next_finger").hide()

		}, 
		"pageshow" : function(){
			$("#page37 .next_finger").delay(500).fadeIn(500);
		}
	});

	//page40
	$("#page40").on({
		"pagebeforeshow" : function(){
			$("#page40 .textwrap,#page40 .next_p_btn").hide();
			$("#page40 .start_text").show();
		}, 
		"pageshow" : function(){
			$("#page40 #textbox1").show();	
		}
	});
	$("#page40 .imgwrap").click(function(){
		$("#page40 .textwrap, #page40 .start_text, #page40 .next_p_btn").toggle();
	});

		//page46
	$("#page46").on({
		"pagebeforeshow" : function(){
			$("#page46 .textwrap,#page46 .next_p_btn").hide();
			$("#page46 .start_text").show();
		}, 
		"pageshow" : function(){
			$("#page35 #textbox1").show();	
		}
	});
	$("#page46 .imgwrap").click(function(){
		$("#page46 .textwrap, #page46 .start_text, #page46 .next_p_btn").toggle();
	});

	//page47
	$("#page47").on({
		"pagebeforeshow" : function(){
			$("#page47 .textwrap, #page47 #textbox2, #page47 #textbox3, #page47 #textbox4 ,#page47 #textbox5,  #page47 #go_back, #page47 .next_p_btn").hide();
			$("#page47 .start_text, #page47 #go_next1").show();
		}, 
		"pageshow" : function(){
			$("#page47 #textbox1").show();	
			next_Count = 0;
		}
	});
	$("#page47 .imgwrap").click(function(){
		$("#page47 .textwrap, #page47 .start_text").toggle();
	});

	$("#page47 #go_next1").click(function(){
		next_Count++;
		if(next_Count == 1){
		    $("#page47 #textbox1").hide();
		    $("#page47 #textbox2, #page47 #go_next1, #page47 #go_back").show();
		    $('#page47')
			//.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day1/74_interior.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		    })
		    .fadeIn(500);
		}
		else if(next_Count == 2){
		    $("#page47 #textbox2").hide();
		    $("#page47 #textbox3, #page47 #go_back, #page47 #go_next1").show();
		    $('#page47')
			//.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day1/75_interior.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		    })
		    .fadeIn(500);
		}
		else if(next_Count == 3){
		    $("#page47 #textbox3").hide();
		    $("#page47 #textbox4, #page47 #go_back, #page47 #go_next1").show();
		    $('#page47')
			//.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day1/76_interior.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		    })
		    .fadeIn(500);
		}
		else if(next_Count == 4){
		    $("#page47 #textbox4, #page47 #go_next1").hide();
		    $("#page47 #textbox5, #page47 #go_back, #page47 .next_p_btn").show();
		    $('#page47')
			//.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day1/77_interior.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		    })
		    .fadeIn(500);
		}

		
	});

	$("#page47 #go_back").click(function(){
		next_Count--;
		if(next_Count == 0){
		    $("#page47 #textbox2,#page47 #go_back").hide();
		    $("#page47 #textbox1, #page47 #go_next1").show();
		    $('#page47')
			//.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day1/73_interior.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		    })
		    .fadeIn(500);
		}
		else if(next_Count == 1){
		    $("#page47 #textbox3").hide();
		    $("#page47 #textbox2, #page47 #go_back, #page47 #go_next1").show();
		    $('#page47')
			//.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day1/74_interior.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		    })
		    .fadeIn(500);
		}
		else if(next_Count == 2){
		    $("#page47 #textbox4").hide();
		    $("#page47 #textbox3, #page47 #go_back, #page47 #go_next1").show();
		    $('#page47')
			//.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day1/75_interior.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		    })
		    .fadeIn(500);
		}
		else if(next_Count == 3){
		    $("#page47 #textbox5, #page47 #go_next1,#page47 .next_p_btn").hide();
		    $("#page47 #textbox4, #page47 #go_back").show();
		    $('#page47')
			//.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day1/76_interior.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		    })
		    .fadeIn(500);
		}
		
	});
	//page48
	var ck;
	$("#page48 #ch1").click(function(){
	
		ck=1;
	});
	$("#page48 #ch2").click(function(){
	
		ck=2;
	});
	$("#page48 #ch3").click(function(){
	
		ck=3;
	});
	$("#page48 #ch4").click(function(){
	
		ck=4;
	});
	$("#page48 #ch5").click(function(){
	
		ck=5;
	});
	
	//page49
	$("#page49").on({
		"pagebeforeshow" : function(){
			$("#page49 .text, #page49 #textbox1, #page49 #textbox2, #page49 #textbox3, #page49 #textbox4, #page49 #textbox5, #page49 .text_img2, #page49 .text_tip").hide();
		},
		"pageshow" :function(){
			//console.log(ck);
			if(ck==1){
				//$("#page49 #textbox2,#page49 #textbox3, #page49 #textbox4, #page49 #textbox5").hide();
				$("#page49 .text, #page49 #textbox1, #page49 .text_img2").fadeIn(500);
				$('#page49').css({"transition":"background-image 1s ease-in-out","background":"url(../images/day1/79_interior_01.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).fadeIn(500);
			}else if(ck==2){
				//$("#page49 #textbox1,#page49 #textbox3, #page49 #textbox4, #page49 #textbox5").hide();
				$("#page49 .text, #page49 #textbox2, #page49 .text_img2, #page49 .text_tip").fadeIn(500);
				//setTimeout(function(){
					$('#page49').css({"transition":"background-image 1s ease-in-out","background":"url(../images/day1/79_interior_02.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).fadeIn(500);

				//});
			}else if(ck==3){
				//$("#page49 #textbox2,#page49 #textbox1, #page49 #textbox4, #page49 #textbox5").hide();
				$("#page49 .text, #page49 #textbox3, #page49 .text_img2, #page49 .text_tip").fadeIn(500);
				//setTimeout(function(){
					$('#page49').css({"transition":"background-image 1s ease-in-out","background":"url(../images/day1/79_interior_03.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).fadeIn(500);
				//});
			}else if(ck==4){
				//$("#page49 #textbox2,#page49 #textbox3, #page49 #textbox1, #page49 #textbox5").hide();
				$("#page49 .text, #page49 #textbox4, #page49 .text_img2, #page49 .text_tip").fadeIn(500);
				//setTimeout(function(){
					$('#page49').css({"transition":"background-image 1s ease-in-out","background":"url(../images/day1/79_interior_04.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).fadeIn(500);
				//});
			}else if(ck==5){
				//$("#page49 #textbox2,#page49 #textbox3, #page49 #textbox4, #page49 #textbox1").hide();
				$("#page49 .text,#page49 #textbox5, #page49 .text_img2, #page49 .text_tip").fadeIn(500);
				//setTimeout(function(){
					$('#page49').css({"transition":"background-image 1s ease-in-out","background":"url(../images/day1/79_interior_05.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).fadeIn(500);
				//})}
			}
		}
	});

	$("#page50").on({
		"pagebeforeshow" : function(){
			$("#page50 .g_num").text(' ');
			$("#page50 .go-next").hide();
		},
		"pageshow" : function(){
			$("#page50 .g_num#red").delay(300).animate({"width":"60%"}, 500,function(){
				$(this).text(25);
			}).fadeIn(800);
			$("#page50 .g_num#black").delay(500).animate({"width":"12%"}, 500,function(){
				$(this).text(5);
			}).fadeIn(800);
			$("#page50 .g_num#gray").delay(700).animate({"width":"48%"}, 500,function(){
				$(this).text(20);
			}).fadeIn(800);
			$("#page50 .g_num#ind_blue").delay(900).animate({"width":"36%"}, 500,function(){
				$(this).text(15);
			}).fadeIn(800);
			$("#page50 .g_num#burgundy").delay(1100).animate({"width":"24%"}, 500,function(){
				$(this).text(10);
			}).fadeIn(800);
			$("#page50 .go-next").delay(1300).fadeIn(500);
		}
	});

	$("#page53").on({
		"pagebeforeshow" : function(){
			$("#page53 #textbox2, #page53 .view_text").hide();
			$("#page53 #textbox1").show();
			$('#page53 .page_bg').queue(function() {
		        $(this).css({"background":"url(../images/day1/84_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		    })
		}, 
		"pageshow" : function(){
			$("#page53 .next_finger").delay(500).fadeIn(500);
		}
	});
	$("#page53 .next_finger").click(function(){
		$(this).hide();
		$('#page53 .page_bg')
			.delay(500)
			.fadeOut()
		    .queue(function() {
		        $(this).css({"background-image":"url(../images/day1/84__photo_2.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		    })
		    .fadeIn(500)
		    .animate({ backgroundSize: '120%' }, 800);
		$("#page53 .textwrap").hide();
		$("#page53 .view_text").delay(2000).fadeIn();
	});

	$("#page54").on({
		"pagebeforeshow" : function(){
			$('#page54 #go_page55, #page54 #go_back, #page54 #textbox2, #page54 #textbox3, #page54 #textbox4').hide();
			$("#page54 #textbox1, #page54 #go_next1").show();
			$('#page54 .page_bg').css({"background":"url(../images/day1/87_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"});
		}, 
		"pageshow" : function(){
			next_Count = 1;
		}
	});

	$("#page54 #go_next1").click(function(e){
		if(next_Count == 1){
			$('#page54 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day1/88_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page54 #go_back").fadeIn();
		    $("#page54 #textbox1").hide();
		    $("#page54 #textbox2").show();
		} else if(next_Count == 2){
			$('#page54 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day1/89_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page54 #textbox2").hide();
		    $("#page54 #textbox3").show();
		} else if(next_Count == 3){
			$('#page54 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day1/90_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page54 #go_next, #page54 #textbox3, #page54 #go_next1").hide();
		    $("#page54 #go_page55, #page54 #textbox4").show();
		} 
		next_Count++;
	});


	$("#page54 #go_back").click(function(e){
		if(next_Count == 1){
			
		} else if(next_Count == 2){
			$(this).hide();
			$('#page54 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day1/87_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page54 #textbox1").show();
			$("#page54 #textbox2, #page54 #go_page55").hide();
		} else if(next_Count == 3){
			$('#page54 #go_next1').show()
			$('#page54 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day1/88_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page54 #textbox2").show();
			$("#page54 #textbox3").hide();
		}else if(next_Count == 4){
			$('#page54 #go_next1').show()
			$('#page54 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day1/89_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page54 #textbox3").show();
			$("#page54 #textbox4, #page55 #go_page55").hide();
		}
		next_Count--;
	});

	$("#page57").on({
		"pagebeforeshow" : function(){
			$("#page57 .next_finger").hide()

		}, 
		"pageshow" : function(){
			$("#page57 .next_finger").delay(500).fadeIn(500);
		}
	});

	$("#page58").on({
		"pagebeforeshow" : function(){
			$("#page58 #textbox2, #page58 #go_back, #page58 .next_p_btn").hide();
			$("#page58 #textbox1, #page58 #go_next1").show();
		}, 
		"pageshow" : function(){
			next_Count = 1;
		}
	});

	$("#page58 #go_next1").click(function(){
		if(next_Count == 1){
		    $("#page58 #textbox1, #page58 #go_next1").hide();
		    $("#page58 #textbox2, #page58 #go_back, #page58 .next_p_btn").show();
		} 
		next_Count++;
	});

	$("#page58 #go_back").click(function(e){
		if(next_Count == 1){
			
		} else if(next_Count == 2){
			$(this).hide();
			$("#page58 #textbox1, #page58 #go_next1").show();
			$("#page58 #textbox2, #page58 .next_p_btn").hide();
		}
		next_Count--;
	});

	$("#page59").on({
		"pagebeforeshow" : function(){
			$('#page59 #go_page60, #page59 #go_back, #page59 #textbox2').hide();
			$('#page59 #textbox1, #page59 #go_next1').show();
		}, 
		"pageshow" : function(){
			next_Count = 1;
		}
	});

	$("#page59 #go_next1").click(function(e){
		if(next_Count == 1){
			$('#page59 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day2/06_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page59 #go_back").fadeIn();
		    $("#page59 #textbox1, #page59 #go_next1").hide();
		    $("#page59 #textbox2, #page59 #go_page60").show();
		} 
		next_Count++;
	});


	$("#page59 #go_back").click(function(e){
		if(next_Count == 1){
			
		} else if(next_Count == 2){
			$(this).hide();
			$('#page59 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day2/05_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page59 #textbox1, #page59 #go_next1").show();
			$("#page59 #textbox2, #page59 #go_page60").hide();
		} 
		next_Count--;
	});

	$("#page61").on({
		"pagebeforeshow" : function(){
			$("#page61 .graphL, #page61 .graphL .g_num, #page61 .graphR .g_num, #page61 .graphR, #page61 .next_p_btn").hide();
			$("#page61 .front, #page61 .next_finger").show();
			$("#page61 .popLayer").hide();;
			$("#page61 .next_p_btn").addClass("stopPage");
			$("#page61 .imgL .engine").css({"background-image":"url(../images/day2/08_engine_left.png)","background-repeat":"no-repeat%","background-position":"50% 50%"}).dequeue();
			$("#page61 .imgR .engine").css({"background-image":"url(../images/day2/08_engine_right.png)","background-repeat":"no-repeat%","background-position":"50% 50%"}).dequeue();
			$("#page61 .next_finger").css({"left":"17%"});

			// $("#page61 #textbox2, #page63 #go_back, #page63 .next_p_btn").hide();
			// $("#page63 #textbox1, #page63 #go_next1").show();
		}, 
		"pageshow" : function(){
			next_Count = 1;
		}
	});

	$("#page61 .next_finger").click(function(){
		if(next_Count %2 == 1){
			$(this).hide();
			$("#page61 .graphL").show();
			$('#page61 .imgL .engine')
				.show()
			    .queue(function() {
			        $(this).css({"background-image":"url(../images/day2/09_engine_left.png)","background-repeat":"no-repeat%","background-position":"50% 50%"}).dequeue();
		    });
			$("#page61 .graphL .graph1").animate({"height":"130px"}, 500,function(){
					$(this);
			}).fadeIn(800);
			$("#page61 .graphL .graph2").delay(300).animate({"height":"180px"}, 500,function(){
				$(this);
			}).fadeIn(800);
			$("#page61 .graphL .g_num").delay(300).fadeIn();
			$(this).delay(1500).fadeIn().css({"left":"59%"});
		} else if(next_Count %2 == 0){
			$(this).hide();
			$("#page61 .graphR").show();
			$('#page61 .imgR .engine')
				.show()
			    .queue(function() {
			        $(this).css({"background-image":"url(../images/day2/10_engine_right.png)","background-repeat":"no-repeat%","background-position":"50% 50%"}).dequeue();
		    });
			$("#page61 .graphR .graph1").delay(300).animate({"height":"68px"}, 500,function(){
				$(this);
			}).fadeIn(800);
			$("#page61 .graphR .graph2").delay(300).animate({"height":"118px"}, 500,function(){
				$(this);
			}).fadeIn(800);
			$("#page61 .graphR .g_num").delay(300).fadeIn();
			$("#page61 .next_p_btn").delay(1000).fadeIn();
		}
		next_Count++;	
	});
	$("#page61 .next_p_btn").click(function(){
		if($("#page61 .next_p_btn").hasClass("stopPage")){
			$("#page61 .popLayer").fadeIn(500, function(){
				$("#page61 .next_p_btn").removeClass("stopPage");
			});
			//$("#page61 .next_p_btn").removeClass("stopPage");
		}
	});
	
	$("#page63").on({
		"pagebeforeshow" : function(){
			$("#page63 #textbox2, #page63 #go_back, #page63 .next_p_btn").hide();
			$("#page63 #textbox1, #page63 #go_next1").show();
		}, 
		"pageshow" : function(){
			next_Count = 1;
		}
	});

	$("#page63 #go_next1").click(function(){
		if(next_Count == 1){
		    $("#page63 #textbox1, #page63 #go_next1").hide();
		    $("#page63 #textbox2, #page63 #go_back, #page63 .next_p_btn").show();
		} 
		next_Count++;
	});

	$("#page63 #go_back").click(function(e){
		if(next_Count == 1){
			
		} else if(next_Count == 2){
			$(this).hide();
			$("#page63 #textbox1, #page63 #go_next1").show();
			$("#page63 #textbox2, #page63 .next_p_btn").hide();
		}
		next_Count--;
	});

	$("#page65").on({
		"pagebeforeshow" : function(){
			$("#page65 .textwrap, #page65 #textbox2, #page65 .text_btn_r, #page65 .next_p_btn").hide();
			$("#page65 .start_text").show();
		}, 
		"pageshow" : function(){
			$("#page65 #textbox1").show();
			
			next_Count = 1;
		}
	});
	$("#page65 .imgwrap").click(function(){
		$("#page65 .textwrap, #page65 .start_text").toggle();
	});

	$("#page65 #go_next1").click(function(){
		if(next_Count == 1){
			console.log('aa');
		    $("#page65 #textbox1, #page65 #go_next1").hide();
		    $("#page65 #textbox2, #page65 #go_back, #page65 .next_p_btn").show();
		} 
		next_Count++;
	});

	$("#page65 #go_back").click(function(e){
		if(next_Count == 1){
			//$("#page22 #go_back").hide();
		} else if(next_Count == 2){
			$("#page65 #textbox1, #page65 #go_next1, #page65 #go_back").show();
			$("#page65 #textbox2, #page65 .next_p_btn, #page65 #go_back").hide();
		}
		next_Count--;
	});

	$("#page66").on({
		"pagebeforeshow" : function(){
			$("#page66 .next_p_btn, #page66 .popLayer").hide();
			$("#page66 .next_p_btn").addClass("stopPage");
		}, 
		"pageshow" : function(){
			$('#page66').css({"background":"url(../images/day2/16_photo_1.jpg)","background-repeat":"no-repeat", "background-size":"auto 100%"}).show();
			$("#page66 .next_finger img").css({"left":"44%","top":"12%"});
			$("#page66 .pointbtn").css({"left":"54%","top":"26%"});
			$("#page66 .next_finger, #page66 .next_finger img,#page66 .pointbtn,#page66 .pointbtn img").show();
		}
	});

	var ahss_ck=0;
	$("#page66 .next_finger").click(function(){
		ahss_ck++;
		console.log(ahss_ck);
		$("#page66 .next_finger,#page66 .next_finger img, #page66 .pointbtn, #page66 .pointbtn img").hide();
		if(ahss_ck % 3 ==1){
			$('#page66').css({"transition":"background-image 1s ease-in-out","background":"url(../images/day2/16_photo_2.jpg)","background-repeat":"no-repeat", "background-size":"auto 100%"}).fadeIn(500);
			$("#page66 .next_finger, #page66 .pointbtn img").fadeIn(500);
			$("#page66 .next_finger img").css({"left":"15%","top":"43%"}).delay(1500).fadeIn(500);
			$("#page66 .pointbtn").css({"left":"30%","top":"46%"}).delay(1500).fadeIn(500);
			$("#page66 .incremental-counter#int").attr('data-value','17');
			$("#page66 .incremental-counter#decimal").attr('data-value','7');
			$("#page66 .incremental-counter").incrementalCounter({"digits": "auto"});

		}else if(ahss_ck  % 3 ==2){
			$('#page66').css({"transition":"background-image 1s ease-in-out","background":"url(../images/day2/16_photo_3.jpg)","background-repeat":"no-repeat", "background-size":"auto 100%"}).fadeIn(500);
			$("#page66 .next_finger, #page66 .pointbtn img").fadeIn(500);
			$("#page66 .next_finger img").css({"left":"31%","top":"55%"}).delay(1500).fadeIn(500);
			$("#page66 .pointbtn").css({"left":"43%","top":"58%"}).delay(1500).fadeIn(500);
			$("#page66 .incremental-counter#int").attr('data-value','27');
			$("#page66 .incremental-counter#decimal").attr('data-value','2');
			$("#page66 .incremental-counter").incrementalCounter({"digits": "auto"});
		}else if(ahss_ck % 3 ==0){
			$('#page66').css({"transition":"background-image 1s ease-in-out","background":"url(../images/day2/16_photo_4.jpg)","background-repeat":"no-repeat", "background-size":"auto 100%"}).fadeIn(500);
			$("#page66 .next_p_btn").delay(1500).fadeIn(500);
			$("#page66 .incremental-counter#int").attr('data-value','53');
			$("#page66 .incremental-counter#decimal").attr('data-value','5');
			$("#page66 .incremental-counter").incrementalCounter({"digits": "auto"});
		}

	});

	$("#page66 .next_p_btn").click(function(){
		if($("#page66 .next_p_btn").hasClass("stopPage")){
			$("#page66 .popLayer").fadeIn(500, function(){
				$("#page66 .next_p_btn").removeClass("stopPage");
			});
		}
	});

	$("#page69").on({
		"pagebeforeshow" : function(){
			$("#page69 #textbox2, #page69 .view_text").hide();
			$("#page69 #textbox1").show();
			$('#page69 .ui-content').queue(function() {
		        $(this).css({"background":"url(../images/day2/19_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		    })
		}, 
		"pageshow" : function(){
			$("#page69 .next_finger").delay(500).fadeIn(500);
		}
	});
	$("#page69 .next_finger").click(function(){
		$(this).hide();
		$('#page69 .ui-content')
			.delay(500)
			.fadeOut()
		    .queue(function() {
		        $(this).css({"background-image":"url(../images/day2/20_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		    })
		    .fadeIn(500)
		    .animate({ backgroundSize: '120%' }, 800);
		$("#page69 .textwrap").hide();
		$("#page69 .view_text").delay(2000).fadeIn();
	});

	$("#page70").on({
		"pagebeforeshow" : function(){
			$('#page70 .next_p_btn, #page70 #go_back, #page70 #textbox2, #page70 #textbox3, #page70 #textbox4').hide();
			$("#page70 #textbox1").show();
		}, 
		"pageshow" : function(){
			next_Count = 1;
		}
	});

	$("#page70 #go_next1").click(function(e){
		if(next_Count == 1){
			$('#page70 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day2/22_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page70 #go_back").fadeIn();
		    $("#page70 #textbox1").hide();
		    $("#page70 #textbox2").show();
		} else if(next_Count == 2){
			$('#page70 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day2/23_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page70 #textbox2").hide();
		    $("#page70 #textbox3").show();
		} else if(next_Count == 3){
			$('#page70 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day2/23_photo_2.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page70 #go_next, #page70 #textbox3, #page70 #go_next1").hide();
		    $("#page70 .next_p_btn, #page70 #textbox4").show();
		} 
		next_Count++;
	});


	$("#page70 #go_back").click(function(e){
		if(next_Count == 1){
			
		} else if(next_Count == 2){
			$(this).hide();
			$('#page70 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day2/21_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page70 #textbox1").show();
			$("#page70 #textbox2, #page70 .next_p_btn").hide();
		} else if(next_Count == 3){
			$('#page70 #go_next1').show()
			$('#page70 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day2/22_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page70 #textbox2").show();
			$("#page70 #textbox3, #page70 .next_p_btn").hide();
		}	else if(next_Count == 4){
			$('#page70 #go_next1').show()
			$('#page70 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day2/23_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page70 #textbox3").show();
			$("#page70 #textbox4, #page70 .next_p_btn").hide();
		}
		next_Count--;
	});

	$("#page76").on({
		"pagebeforeshow" : function(){
			$("#page76 #textbox2, #page76 .view_text").hide();
			$("#page76 #textbox1").show();
			$('#page76 .ui-content').queue(function() {
		        $(this).css({"background":"url(../images/day2/29_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		    })
		}, 
		"pageshow" : function(){
			$("#page76 .next_finger").delay(500).fadeIn(500);
		}
	});
	$("#page76 .next_finger").click(function(){
		$(this).hide();
		$('#page76 .ui-content')
			.delay(500)
			.fadeOut()
		    .queue(function() {
		        $(this).css({"background-image":"url(../images/day2/30_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		    })
		    .fadeIn(500)
		    .animate({ backgroundSize: '120%' }, 800);
		$("#page76 .textwrap").hide();
		$("#page76 .view_text").delay(2000).fadeIn();
	});

	$("#page77").on({
		"pagebeforeshow" : function(){
			$('#page77 .next_p_btn, #page77 #go_back, #page77 #textbox2, #page77 #textbox3, #page77 #textbox4').hide();
			$("#page77 #textbox1").show();
		}, 
		"pageshow" : function(){
			next_Count = 1;
		}
	});

	$("#page77 #go_next1").click(function(e){
		if(next_Count == 1){
			$('#page77 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day2/32_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page77 #go_back").fadeIn();
		    $("#page77 #textbox1").hide();
		    $("#page77 #textbox2").show();
		} else if(next_Count == 2){
			$('#page77 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day2/33_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page77 #textbox2").hide();
		    $("#page77 #textbox3").show();
		} else if(next_Count == 3){
			$('#page77 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day2/34_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page77 #go_next, #page77 #textbox3, #page77 #go_next1").hide();
		    $("#page77 .next_p_btn, #page77 #textbox4").show();
		} 
		next_Count++;
	});


	$("#page77 #go_back").click(function(e){
		if(next_Count == 1){
			
		} else if(next_Count == 2){
			$(this).hide();
			$('#page77 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day2/31_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page77 #textbox1").show();
			$("#page77 #textbox2, #page77 .next_p_btn").hide();
		} else if(next_Count == 3){
			$('#page77 #go_next1').show()
			$('#page77 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day2/32_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page77 #textbox2").show();
			$("#page77 #textbox3").hide();
		}else if(next_Count == 4){
			$('#page77 #go_next1').show()
			$('#page77 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day2/33_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page77 #textbox3").show();
			$("#page77 #textbox4, #page77 .next_p_btn").hide();
		}
		next_Count--;
	});
	$("#page79").on({
		"pagebeforeshow" : function(){
			$("#page79 .popLayer, #page79 .next_p_btn").hide();
			$("#page79 .next_p_btn").addClass("stopPage");

		},
		"pageshow" : function(){
						
		}
	});
	$("#page79 .next_finger").click(function(){
		$("#n1").delay(500).animateNumber({number:3});
		$("#n2").delay(500).animateNumber({number:9});
		$("#n3").delay(500).animateNumber({number:5});
		$(this).hide();
		$("#page79 .next_p_btn").delay(1000).fadeIn(500);
	});

	$("#page79 .next_p_btn").click(function(){
		if($("#page79 .next_p_btn").hasClass("stopPage")){
			$("#page79 .popLayer").fadeIn(500, function(){
				$("#page79 .next_p_btn").removeClass("stopPage");
			});
		}
	});

	//page85
	$("#page85").on({
		"pagebeforeshow" : function(){
			$("#page85 #textbox1").show();
			$("#page85 #textbox2").hide();
		}, 
		"pageshow" : function(){
			$("#page85 .next_finger").delay(500).fadeIn(500);
			next_Count = 1;
		}
	});
	$("#page85 .next_finger").click(function(){
		if(next_Count == 1){
			$(this).hide();
			$("#page85 #textbox1").hide();
			$('#page85 .ui-content')
				.delay(500)
				.fadeOut()
			    .queue(function() {
		        $(this).css({"background-image":"url(../images/day2/44_image_overlay.png)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page85 #textbox2").delay(800).fadeIn();
			$(this).delay(2000).fadeIn();
		} else if(next_Count == 2){
			$.mobile.changePage("#page86");
		}
		next_Count++;
	});

	//page87
	$("#page87").on({
		"pagebeforeshow" : function(){
			$("#page87 #textbox1").show();
			$("#page87 #textbox2").hide();
		}, 
		"pageshow" : function(){
			$("#page87 .next_finger").delay(500).fadeIn(500);
			next_Count = 1;
		}
	});
	$("#page87 .next_finger").click(function(){
		if(next_Count == 1){
			$(this).hide();
			$("#page87 #textbox1").hide();
			$('#page87 .ui-content')
				.delay(500)
				.fadeOut()
			    .queue(function() {
		        $(this).css({"background-image":"url(../images/day2/46_image_overlay.png)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page87 #textbox2").delay(800).fadeIn();
			$(this).delay(2000).fadeIn();
		} else if(next_Count == 2){
			$.mobile.changePage("#page88");
		}
		next_Count++;
	});

	//page93
	$("#page93").on({
		"pagebeforeshow" : function(){
			$("#page93 .textwrap,#page93 .next_p_btn").hide();
			$("#page93 .start_text").show();
		}, 
		"pageshow" : function(){
			$("#page93 #textbox1").show();	
		}
	});
	$("#page93 .imgwrap").click(function(){
		$("#page93 .textwrap, #page93 .start_text, #page93 .next_p_btn").toggle();
	});

	//page100
	$("#page100").on({
		"pagebeforeshow" : function(){
			$("#page100 .textwrap,#page100 .next_p_btn").hide();
			$("#page100 .start_text").show();
		}, 
		"pageshow" : function(){
			$("#page100 #textbox1").show();	
		}
	});
	$("#page100 .imgwrap").click(function(){
		$("#page100 .textwrap, #page100 .start_text, #page100 .next_p_btn").toggle();
	});

	$("#page102").on({
		"pagebeforeshow" : function(){
			$("#page102 #textbox2, #page102 .view_text").hide();
			$("#page102 #textbox1").show();
			$('#page102 .ui-content').queue(function() {
		        $(this).css({"background":"url(../images/day2/71_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		    })
		}, 
		"pageshow" : function(){
			$("#page102 .next_finger").delay(500).fadeIn(500);
		}
	});
	$("#page102 .next_finger").click(function(){
		$(this).hide();
		$('#page102 .ui-content')
			.delay(500)
			.fadeOut()
		    .queue(function() {
		        $(this).css({"background-image":"url(../images/day2/72_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		    })
		    .fadeIn(500)
		    .animate({ backgroundSize: '120%' }, 800);
		$("#page102 .textwrap").hide();
		$("#page102 .view_text").delay(2000).fadeIn();
	});

	$("#page103").on({
		"pagebeforeshow" : function(){
			$('#page103 .next_p_btn, #page103 #go_back, #page103 #textbox2, #page103 #textbox3').hide();
			$("#page103 #textbox1").show();
		}, 
		"pageshow" : function(){
			next_Count = 1;
		}
	});

	$("#page103 #go_next1").click(function(e){
		if(next_Count == 1){
			$('#page103 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day2/74_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page103 #go_back").fadeIn();
		    $("#page103 #textbox1").hide();
		    $("#page103 #textbox2").show();
		} else if(next_Count == 2){
			$('#page103 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day2/75_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page103 #go_next1, #page103 #textbox2").hide();
		    $("#page103 .next_p_btn, #page103 #textbox3").show();
		} 
		next_Count++;
	});


	$("#page103 #go_back").click(function(e){
		if(next_Count == 1){
			
		} else if(next_Count == 2){
			$(this).hide();
			$('#page103 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day2/73_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page103 #textbox1").show();
			$("#page103 #textbox2, #page103 .next_p_btn").hide();
		} else if(next_Count == 3){
			$('#page103 #go_next1').show()
			$('#page103 .page_bg')
			.fadeOut()
			.queue(function() {
		        $(this).css({"background":"url(../images/day2/74_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page103 #textbox2").show();
			$("#page103 #textbox3, #page103 .next_p_btn").hide();
		}
		next_Count--;
	});

	//다음페이지로 이동막기
	$(".go-next").click(function(e){
		if($(this).hasClass("stopPage")){
		e.preventDefault();
		}
	});

	//rotate btn
	$(".btn_device").click(function(){	
		if($("#mokup, #wrap.mobile").hasClass("landscape")){
			$("#mokup, #wrap.mobile").removeClass("landscape");
		} else {
			$("#mokup, #wrap.mobile").addClass("landscape");
		}
	});

	$(window).bind("orientationchange", function(e) {
	   var orientation = window.orientation;
	   var nowPageId = $.mobile.activePage.attr("id");
	   
	   if(window.orientation == 0){
	      //alert("portrait")
	   }else{
	      //alert("landscape")
	   }
	});

	//draggable
	// $("#page45 .page_bg").draggable({
	// 	axis: "x",
	// 	drag: function(event, ui){
	// 		var left = ui.position.left, offsetWidth = ($(this).width() - $(this).parent().width()) * -1;
	// 		if(left > 0){
	// 			ui.position.left = 0;
	// 		}
	// 		if(offsetWidth > left) {
	// 			ui.position.left = offsetWidth;
	// 		}
	// 	}
	// });
});
