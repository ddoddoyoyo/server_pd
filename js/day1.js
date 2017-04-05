$(document).ready(function(){
	//country selectbox
	var select = $("select#input_country");
    select.change(function(){
        var select_name = $(this).children("option:selected").text();
        $(this).siblings("label").text(select_name);
        $(this).siblings("label").css({"color":"#002c5f","background-image":"url('../images/button/icon_country_arrow_select.png')"});
    });

    //뒤로가기 후에 textbox에서 next버튼 항상 보이게 하기
	$(".go-back").click(function(){
		 
		 $('section').each(function(idx,obj){
			 var pageid = $(obj).attr("id");
			 if($("#"+pageid+" #go_next1").css("display") == "none"){
				 $("#"+pageid+" #go_next1").show(); 
			 }
		 });

		 audio_pause();

			$('section').each(function(idx,obj){
			 var pageid = $(obj).attr("id");
			 if($("#"+pageid).hasClass("ui-page-active")){
				$("#"+pageid).prev().find(".audio1").trigger('play'); 
				 //$("#"+pageid).find(".audio1").trigger('play'); 
			 }
		 });
	});

	$(".btn_device").hide();
	//다음페이지로 이동막기
	$(".go-next").click(function(e){
		if($(this).hasClass("stopPage")){
		e.preventDefault();
		}
	});

	//비디오일시정지
	function video_pause(){
	$("video").each(function(){ 
			this.pause();
			if (!isNaN(this.duration)) {
				this.currentTime = 0;
			}
		}); 
	}
	//오디오 일시정지
	function audio_pause(){
	$("audio").each(function(){ 
			this.pause();
			if (!isNaN(this.duration)) {
				this.currentTime = 0;
			}
		});
	}

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

	$("#page2").on({
		"pagebeforeshow" : function(){
			$("#page2 .textwrap, #page2 .yes_btn").hide();
			$("#page2 .imgwrap img").css({"left":"-100%"});
		}, 
		"pageshow" : function(){
			$("#page2 .imgwrap img").animate({"left":"-11%"},500);
			$("#page2 .textwrap, #page2 .yes_btn").delay(500).fadeIn(500);
		}
	});
	// $("#page1 .intnext_btn").click(function(){
	// 	$("#page1 .input1").hide();
	// 	$("#page1 .input2").show();
	// });

	$("#page3001").on({
		"pagebeforeshow" : function(){
			$("#page3001 .popLayer, #page3001 .next_p_btn, #page3001 .textwrap").hide();
			//$("#page3001 .next_p_btn").addClass("stopPage");
		}, 
		"pageshow" : function(){
			$("#page3001 .textwrap").fadeIn(500);
			
		}
	});
	$("#page3001 .btn_play").click(function(){
		audio_pause();
		$("#page3001 .popLayer").fadeIn(500,function(){
			$("#page3001 .next_p_btn").delay(500).fadeIn(500);
			//$("#page63001 video")[0].play();//자동 재생
			//$("#page63001 video").attr("controls","true");
		});

	});

	$("#page3001 .next_p_btn").click(function(){
		video_pause();
		if($("#page4").has(".audio1")) {
			$("#page4").find(".audio1").trigger('play');
		}
	});

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
	$("#page3 #go_page3001").click(function(){
		if($("#page3001").has(".audio1")) {
				$("#page3001").find(".audio1").trigger('play');
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
	$("#page4").on({
		"pagebeforeshow" : function(){
			$("#page4 .textwrap, #page4 .next_p_btn").hide();
			$("#page4 .imgwrap img").css({"left":"-250px"});
		}, 
		"pageshow" : function(){
		$("#page4 .imgwrap img").animate({"left":"5px"},500);
		$("#page4 .textwrap, #page4 .next_p_btn").delay(1000).fadeIn(500);
		}
	});

	$("#page4 .next_p_btn").click(function(){
		audio_pause();
	});

	$("#page5").on({
		"pagebeforeshow" : function(){
			$("#page5 #textbox2, #page5 #go_back, #page5 .next_p_btn,#page5 .imgwrap,#page5 .textwrap").hide();
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
		$("#page5 .imgwrap").fadeIn(500);
		$("#page5 .textwrap").delay(500).fadeIn(500);
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
	$("#page11").on({
		"pagebeforeshow" : function(){
			$("#page11 .text_img2, #page11 .text_tip,#page11 .text").hide();
			$("#page11 #go_next1").show();
		}, 
		"pageshow" : function(){
		$("#page11 .text_img2, #page11 .text_tip,#page11 .text").fadeIn(500);
			next_Count = 1;
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



	var ahss_ck=1;
	$("#page13").on({
		"pagebeforeshow" : function(){
			$("#page13 .next_p_btn, #page13 .percentage,#page13 .imgwrap").hide();
			ahss_ck=1;
			//$("#page13 .next_finger").show();
			$("#page13 .incremental-counter#int").attr('data-value','0');
			$("#page13 .incremental-counter#decimal").attr('data-value','0');

		}, 
		"pageshow" : function(){
			$('#page13').css({"background":"url(../images/day1/13_bg_1.jpg)","background-repeat":"no-repeat", "background-size":"auto 100%"}).show();
			$("#page13 .next_finger img").css({"left":"27%","top":"47%"});
			$("#page13 .next_finger, #page13 .next_finger img").show();
		}
	});

	var click_ch = true;
	$("#page13 .next_finger").click(function(e){

		if(!click_ch){
			return false;
		}
	
		$("#page13 .next_finger,#page13 .next_finger img, #page13 .btn_push").hide();
		if($("#page13 .next_finger").attr("display","none")){
			click_ch = false;
		}

		if(ahss_ck  == 1){
			$('#page13').css({"transition":"background-image 1s ease-in-out","background":"url(../images/day1/13_bg_2.jpg)","background-repeat":"no-repeat", "background-size":"auto 100%"}).fadeIn(500);
			$("#page13 .point, #page13 .percentage, #page13 .imgwrap,#page13 .next_finger").fadeIn(500);
			$("#page13 .next_finger img").css({"left":"22%","top":"35%"}).delay(1500).fadeIn(500);
			$("#page13 .incremental-counter#int").attr('data-value','17');
			$("#page13 .incremental-counter#decimal").attr('data-value','7');
			$("#page13 .incremental-counter").incrementalCounter({"digits": "auto"});
			
			$("#page13 .next_finger").addClass('active');
			setTimeout(function(){
				click_ch = true;
			},1500);

		}else if(ahss_ck  == 2){
			$('#page13').css({"transition":"background-image 1s ease-in-out","background":"url(../images/day1/13_bg_3.jpg)","background-repeat":"no-repeat", "background-size":"auto 100%"}).fadeIn(500);
			$("#page13 .point, #page13 .percentage,#page13 .next_finger").fadeIn(500);
			$("#page13 .next_finger img").css({"left":"21%","top":"12%"}).delay(1500).fadeIn(500);
			$("#page13 .incremental-counter#int").attr('data-value','27');
			$("#page13 .incremental-counter#decimal").attr('data-value','2');
			$("#page13 .incremental-counter").incrementalCounter({"digits": "auto"});

			setTimeout(function(){
				click_ch = true;
			},1500);

		}else if(ahss_ck  == 3){
			$('#page13').css({"transition":"background-image 1s ease-in-out","background":"url(../images/day1/13_bg_4.jpg)","background-repeat":"no-repeat","background-size":"auto 100%"}).fadeIn(500);
			$("#page13 .point, #page13 .percentage,#page13 .next_finger").fadeIn(500);
			$("#page13 .next_p_btn").delay(1500).fadeIn(500);
			$("#page13 .incremental-counter#int").attr('data-value','53');
			$("#page13 .incremental-counter#decimal").attr('data-value','5');
			$("#page13 .incremental-counter").incrementalCounter({"digits": "auto"});
			
			$("#page13 .next_finger,#page13 .next_finger img, #page13 .btn_push").hide();
			
		}
		ahss_ck++;
		

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
			$("#page17 .textwrap").show();
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
			$("#page25 .textwrap").show();
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
		"pagebeforeshow" : function(){
			$("#page32 .drawSlider").find(".ui-slider-handle").css({"top":"0%"});
		},
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
			$.ajax({
			url:"/pd/common/color_json.php",
			type: "POST",
			dataType: "json",
			data:{
			},
			success:  function(json){
				$("#page50 .g_num#red").delay(300).animate({"width":""+json.val1+"%"}, 500,function(){
				$(this).text(json.val1_Cnt);
				}).fadeIn(800);
				$("#page50 .g_num#black").delay(500).animate({"width":""+json.val2+"%"}, 500,function(){
					$(this).text(json.val2_Cnt);
				}).fadeIn(800);
				$("#page50 .g_num#gray").delay(700).animate({"width":""+json.val3+"%"}, 500,function(){
					$(this).text(json.val3_Cnt);
				}).fadeIn(800);
				$("#page50 .g_num#ind_blue").delay(900).animate({"width":""+json.val4+"%"}, 500,function(){
					$(this).text(json.val4_Cnt);
				}).fadeIn(800);
				$("#page50 .g_num#burgundy").delay(1100).animate({"width":""+json.val5+"%"}, 500,function(){
					$(this).text(json.val5_Cnt);
				}).fadeIn(800);
				$("#page50 .go-next").delay(1300).fadeIn(500);
			},
		   error : function(xhr, status, error) {
				console.log(error);
		   }
		});


			
		}
	});

	$("#page53").on({
		"pagebeforeshow" : function(){
			$("#page53 #textbox2, #page53 .view_text").hide();
			$("#page53 .textwrap").show();
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

	

	

	
	$("#page4 .go-next").click(function(){	
		location.href="/pd/en/day2.php";
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
