$(document).ready(function(){

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

	$("#mokup, #wrap.mobile").addClass("landscape");
	$(".btn_device").hide();

	//day2
	$("#page56 .next_p_btn").click(function(){
		if($("#page57").has(".audio1")) {
				$("#page57").find(".audio1").trigger('play');
			}
	});

	
	$("#page57").on({
		"pagebeforeshow" : function(){
			$("#page57 .next_finger").hide();
			$("#page57 .textwrap").hide();
			$("#page57 .imgwrap img").css({"top":"150px"});
			//$("#page57 .page_bg #map2,#page57 .page_bg #map3,#page57 .page_bg #map4,#page57 .page_bg #map5,#page57 .page_bg #map6").hide();
		}, 
		"pageshow" : function(){
			$("#page57 .imgwrap").fadeIn(500,function(){
				$("#page57 .imgwrap img").delay(500).animate({"top":"5px"},500);
				$("#page57 .textwrap").delay(700).fadeIn(500);
				$("#page57 .next_finger").delay(1000).fadeIn(500);
			});
			// $("#page57 .page_bg #map2").fadeIn(500);
			// $("#page57 .page_bg #map3").delay(1000).fadeIn(500);
			// $("#page57 .page_bg #map4").delay(1700).fadeIn(500);
			// $("#page57 .page_bg #map5").delay(2200).fadeIn(500);
			// $("#page57 .page_bg #map6").delay(2700).fadeIn(500
			if($(this).has(".audio1")) {
				$(this).find(".audio1").trigger('play');//다음페이지로 넘기기 위해서 trigger꼭 써야함
			}
			
		}
	});

	$("#page57 .next_finger").click(function(){
		$("#page57 .audio1").each(function(){ 
		this.pause();
			if (!isNaN(this.duration)) {
				this.currentTime = 0;
			}
		});
		if($("#page58").has(".audio1")) {
				$("#page58").find(".audio1").trigger('play');
		}
});

	$("#page58").on({
		"pagebeforeshow" : function(){
			$("#page58 #textbox2, #page58 #go_back, #page58 .next_p_btn").hide();
			$("#page58 .textwrap, #page58 #go_next1").hide();
			$("#page58").css({"background-size":"120% auto"});
			$("#page58 .audio2").each(function(){ 
				this.pause();
				if (!isNaN(this.duration)) {
					this.currentTime = 0;
				}
			});
		}, 
		"pageshow" : function(){
			$("#page58").delay(500).animate({"backgroundSize":"100%"});
			$("#page58 .textwrap, #page58 #go_next1, #page58 #textbox1, #page58 .text_tip").delay(1000).fadeIn(500);
			next_Count = 1;
		}
	});

	$("#page58 #go_next1").click(function(){
		$("#page58 .textwrap").hide();
		if(next_Count == 1){
		    $("#page58 #textbox1, #page58 #go_next1").hide();
		    $("#page58 .textwrap, #page58 #textbox2, #page58 #go_back, #page58 .next_p_btn").fadeIn(500);
		    $("#page58 .audio1").each(function(){ 
					this.pause();
					if (!isNaN(this.duration)) {
						this.currentTime = 0;
					}
				});
		    if($("#page58").has(".audio2")) {
					$("#page58").find(".audio2").trigger('play');//다음페이지로 넘기기 위해서 trigger꼭 써야함
				}
		} 
		next_Count++;
	});

	$("#page58 #go_back").click(function(e){
		$("#page58 .textwrap").hide();
		if(next_Count == 1){
			
		} else if(next_Count == 2){
			$(this).hide();
			//$("#page58 #textbox1, #page58 #go_next1").fadeIn(500);
			$("#page58 #textbox2, #page58 .next_p_btn").hide();
			$("#page58 .textwrap, #page58 #textbox1, #page58 #go_next1").fadeIn(500);
			$("#page58 .audio2").each(function(){ 
					this.pause();
					if (!isNaN(this.duration)) {
						this.currentTime = 0;
					}
				});
		    if($("#page58").has(".audio1")) {
					$("#page58").find(".audio1").trigger('play');//다음페이지로 넘기기 위해서 trigger꼭 써야함
				}
		}
		next_Count--;
	});

	$("#page58 .next_p_btn").click(function(){
		$("#page58 .audio2").each(function(){ 
			this.pause();
			if (!isNaN(this.duration)) {
				this.currentTime = 0;
			}
		});
		if($("#page59").has(".audio1")) {
				$("#page59").find(".audio1").trigger('play');
			}
});

	$("#page59").on({
		"pagebeforeshow" : function(){
			$('#page59 #go_page60, #page59 #go_back, #page59 #textbox2').hide();
			$('#page59 #textbox1, #page59 #go_next1').show();
			$('#page59 .textwrap').hide();
			$("#page59 .page_bg").css({"background":"url(../images/day2/05_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto","left":"0"});
			$("#page59 .page_bg").fadeIn(500);
			$("#page59 .audio2").each(function(){ 
				this.pause();
				if (!isNaN(this.duration)) {
					this.currentTime = 0;
				}
			});
		}, 
		"pageshow" : function(){
			$("#page59 .page_bg").fadeIn(500);
			$('#page59 .textwrap').delay(500).fadeIn(500);
			next_Count = 1;
		}
	});

	$("#page59 #go_next1").click(function(e){
		$('#page59 .textwrap').hide();
		if(next_Count == 1){
			// $('#page59 .page_bg')
			// .fadeOut()
			// .queue(function() {
		 //        $(this).css({"background":"url(../images/day2/06_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		 //    });
		 //    .fadeIn(500);
		  $("#page59 .page_bg").css({"background":"url(../images/day2/06_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto","left":"100%"});
		    $("#page59 .page_bg").animate({"left":"0"},500);
		   // $('#page59 .textwrap').delay(500).fadeIn(500);
		    //$("#page59 #go_back").fadeIn();
		    $("#page59 #textbox1, #page59 #go_next1").hide();
		    $("#page59 .textwrap,#page59 #textbox2, #page59 #go_page60,#page59 #go_back").delay(500).fadeIn(500);
		    $("#page59 .audio1").each(function(){ 
					this.pause();
					if (!isNaN(this.duration)) {
						this.currentTime = 0;
					}
				});
		    if($("#page59").has(".audio2")) {
					$("#page59").find(".audio2").trigger('play');//다음페이지로 넘기기 위해서 trigger꼭 써야함
				}
		} 
		next_Count++;
	});


	$("#page59 #go_back").click(function(e){
		$('#page59 .textwrap').hide();
		if(next_Count == 1){
			
		} else if(next_Count == 2){
			$(this).hide();
			// $('#page59 .page_bg')
			// .fadeOut()
			// .queue(function() {
		 //        $(this).css({"background":"url(../images/day2/05_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		 //    })
		 //    .fadeIn(500);
		  $("#page59 .page_bg").css({"background":"url(../images/day2/05_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto","left":"-100%"});
		    $("#page59 .page_bg").animate({"left":"0"},500);
		   // $("#page59 #textbox1, #page59 #go_next1").show();
			$("#page59 #textbox2, #page59 #go_page60").hide();
			$("#page59 .textwrap,#page59 #textbox1, #page59 #go_next1").delay(500).fadeIn(500);
			$("#page59 .audio2").each(function(){ 
					this.pause();
					if (!isNaN(this.duration)) {
						this.currentTime = 0;
					}
				});
		    if($("#page59").has(".audio1")) {
					$("#page59").find(".audio1").trigger('play');//다음페이지로 넘기기 위해서 trigger꼭 써야함
				}
		} 
		next_Count--;
	});

	$("#page59 .next_p_btn").click(function(){
		$("#page59 .audio2").each(function(){ 
		this.pause();
		if (!isNaN(this.duration)) {
			this.currentTime = 0;
		}
	});
		if($("#page60").has(".audio1")) {
				$("#page60").find(".audio1").trigger('play');
			}
	});

	$("#page60").on({
		"pagebeforeshow" : function(){
			$('#page60 #go_page60, #page60 #go_back, #page60 #textbox2').hide();
			$('#page60 .textwrap,#page60 .textwrap #textbox1, #page60 .go-next').hide();
			$("#page60").css({"background-size":"120% auto"});
			//$("#page61 .textwrap").animate({"width":"0"});
		}, 
		"pageshow" : function(){
			$("#page60").delay(500).animate({"backgroundSize":"100%"});
			$("#page60 .textwrap, #page60 .go-next, #page60 #go_page60, #page60 #go_back, #page60 #textbox1").delay(1000).fadeIn(500);
			//next_Count = 1;
		}
	});

	$("#page60 .next_p_btn").click(function(){
		$("#page60 .audio1").each(function(){ 
		this.pause();
		if (!isNaN(this.duration)) {
			this.currentTime = 0;
		}
	});
	if($("#page61").has(".audio1")) {
			$("#page61").find(".audio1").trigger('play');
		}
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
			$("#page61 .graphR .graph1, #page61 .graphR .graph2, #page61 .graphL .graph1, #page61 .graphL .graph2").css({"height":"0"});	

			// $("#page61 #textbox2, #page63 #go_back, #page63 .next_p_btn").hide();
			// $("#page63 #textbox1, #page63 #go_next1").show();
		}, 
		"pageshow" : function(){
			$("#page61 .audio1").each(function(){ 
					this.pause();
					if (!isNaN(this.duration)) {
						this.currentTime = 0;
					}
				});
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
			// if($("#page61").has(".audio1")) {
			// 	$("#page61").find(".audio1").trigger('play');
			// }
			// $("#page61 .audio1").each(function(){ 
			// 		this.pause();
			// 		if (!isNaN(this.duration)) {
			// 			this.currentTime = 0;
			// 		}
			// 	});
			$("#page61 .popLayer").fadeIn(500, function(){
				$("#page61 .next_p_btn").removeClass("stopPage");
				
			});
			//$("#page61 .next_p_btn").removeClass("stopPage");
		}
		else{
			if($("#page63").has(".audio1")) {
						$("#page63").find(".audio1").trigger('play');
				}
		}
	});
	
	$("#page63").on({
		"pagebeforeshow" : function(){
			$("#page63 #textbox2, #page63 #go_back, #page63 .next_p_btn").hide();
			$("#page63 .textwrap, #page63 #textbox1, #page63 #go_next1").hide();
			$("#page63").css({"background-size":"120% auto"});
			$("#page63 .audio2").each(function(){ 
				this.pause();
				if (!isNaN(this.duration)) {
					this.currentTime = 0;
				}
			});
		}, 
		"pageshow" : function(){
			$("#page63 .textwrap, #page63 #textbox1, #page63 #go_next1").delay(1000).fadeIn(500);
			next_Count = 1;
			$("#page63").delay(500).animate({"backgroundSize":"100%"});
		}
	});

	$("#page63 #go_next1").click(function(){
		$("#page63 .textwrap").hide();
		if(next_Count == 1){
		    $("#page63 .textwrap,#page63 #textbox1, #page63 #go_next1").hide();
		    $("#page63 .textwrap,#page63 #textbox2, #page63 #go_back, #page63 .next_p_btn").fadeIn(500);
		    $("#page63 .audio1").each(function(){ 
					this.pause();
					if (!isNaN(this.duration)) {
						this.currentTime = 0;
					}
				});
		    if($("#page63").has(".audio2")) {
				$("#page63").find(".audio2").trigger('play');//다음페이지로 넘기기 위해서 trigger꼭 써야함
			}
		} 
		next_Count++;
	});

	$("#page63 #go_back").click(function(e){
		$("#page63 .textwrap").hide();
		if(next_Count == 1){
			
		} else if(next_Count == 2){
			$(this).hide();
			$("#page63 .textwrap,#page63 #textbox1, #page63 #go_next1").fadeIn(500);
			$("#page63 #textbox2, #page63 .next_p_btn").hide();
			$("#page63 .audio2").each(function(){ 
					this.pause();
					if (!isNaN(this.duration)) {
						this.currentTime = 0;
					}
				});
		    if($("#page63").has(".audio1")) {
				$("#page63").find(".audio1").trigger('play');//다음페이지로 넘기기 위해서 trigger꼭 써야함
			}
		}
		next_Count--;
	});

	$("#page63 .next_p_btn").click(function(){
		$("#page63 .audio2").each(function(){ 
		this.pause();
		if (!isNaN(this.duration)) {
			this.currentTime = 0;
		}
	});
		if($("#page63001").has(".audio1")) {
				$("#page63001").find(".audio1").trigger('play');
			}
	});

	$("#page63001").on({
		"pagebeforeshow" : function(){
			$("#page63001 .popLayer, #page63001 .next_p_btn").hide();
			$("#page63001 .next_p_btn").addClass("stopPage");
			$("#page63001 .imgwrap, #page63001 .textwrap").hide();
			$("#page63001 .audio2").each(function(){ 
				this.pause();
				if (!isNaN(this.duration)) {
					this.currentTime = 0;
				}
			});
			//$("#page63001 .popLayer#pop02 .imgwrap, #page63001 .popLayer#pop02 .textwrap").hide();

		}, 
		"pageshow" : function(){
			$("#page63001 .imgwrap, #page63001 .textwrap").fadeIn(500);
			next_Count = 1;
		}
	});
	$("#page63001 .btn_play").click(function(){
		$("#page63001 .audio1, #page63001 .audio2").each(function(){ 
					this.pause();
					if (!isNaN(this.duration)) {
						this.currentTime = 0;
					}
				});
		$("#page63001 .popLayer#pop01").fadeIn(500,function(){
			$("#page63001 .next_p_btn").delay(500).fadeIn(500);
			//$("#page63001 video")[0].play();//자동 재생
			//$("#page63001 video").attr("controls","true");
		});

	});

	$("#page63001 .next_p_btn").click(function(){
		//$("#page63001 .popLayer#pop02 .imgwrap, #page63001 .popLayer#pop02 .textwrap").hide();
		if($("#page63001 .next_p_btn").hasClass("stopPage")){
			$("#page63001 .popLayer#pop02").fadeIn(500,function(){
				//pageshow에서 fadeIn되서..
				//$("#page63001 .popLayer#pop02 .imgwrap, #page63001 .popLayer#pop02 .textwrap").delay(500).fadeIn(500);
			});
			//video_pause();

			setTimeout(function(){
				video_pause();
				if($("#page63001").has(".audio2")) {
				$("#page63001").find(".audio2").trigger('play');//다음페이지로 넘기기 위해서 trigger꼭 써야함
				}
				$("#page63001 .next_p_btn").removeClass("stopPage");
				$("#page63001 .audio2").each(function(){ 
					this.pause();
					if (!isNaN(this.duration)) {
						this.currentTime = 0;
					}
				});
				
			});
			
		}
		else{
			if($("#page64").has(".audio1")) {
						$("#page64").find(".audio1").trigger('play');
				}
		}
	});

	$("#page64").on({
		"pagebeforeshow" : function(){
			$("#page64 .textwrap,#page64 .next_p_btn").hide();
		}, 
		"pageshow" : function(){
			$("#page64 .textwrap,#page64 .next_p_btn").fadeIn(500);

		}
	});

	$("#page64 .next_p_btn").click(function(){
		$("#page64 audio").each(function(){ 
			this.pause();
			if (!isNaN(this.duration)) {
				this.currentTime = 0;
			}
		});
		if($("#page65").has(".audio1")) {
				$("#page65").find(".audio1").trigger('play');
			}
	});

	$("#page65").on({
		"pagebeforeshow" : function(){
			$("#page65 .textwrap, #page65 #textbox2, #page65 .text_btn_r, #page65 .next_p_btn").hide();
			$("#page65 .start_text, #page65 #go_next1").show();
		}, 
		"pageshow" : function(){
			$("#page65 #textbox1").show();
			$("#page65 audio").each(function(){ 
				this.pause();
				if (!isNaN(this.duration)) {
					this.currentTime = 0;
				}
			});
			next_Count = 1;
		}
	});
	$("#page65 .toggle").click(function(){
		$("#page65 .textwrap, #page65 .start_text").toggle();
	    if($("#page65").has(".audio1")) {
			$("#page65").find(".audio1").trigger('play');//다음페이지로 넘기기 위해서 trigger꼭 써야함
			}
	});

	$("#page65 #go_next1").click(function(){
		if(next_Count == 1){
			//console.log('aa');
		    $("#page65 #textbox1, #page65 #go_next1").hide();
		    $("#page65 #textbox2, #page65 #go_back, #page65 .next_p_btn").show();
		    $("#page65 .audio1").each(function(){ 
					this.pause();
					if (!isNaN(this.duration)) {
						this.currentTime = 0;
					}
				});
		    if($("#page65").has(".audio2")) {
				$("#page65").find(".audio2").trigger('play');//다음페이지로 넘기기 위해서 trigger꼭 써야함
			}
		} 
		next_Count++;
	});

	$("#page65 #go_back").click(function(e){
		if(next_Count == 1){
			//$("#page22 #go_back").hide();
		} else if(next_Count == 2){
			$("#page65 #textbox1, #page65 #go_next1, #page65 #go_back").show();
			$("#page65 #textbox2, #page65 .next_p_btn, #page65 #go_back").hide();
			$("#page65 .audio2").each(function(){ 
					this.pause();
					if (!isNaN(this.duration)) {
						this.currentTime = 0;
					}
				});
		    if($("#page65").has(".audio1")) {
				$("#page65").find(".audio1").trigger('play');//다음페이지로 넘기기 위해서 trigger꼭 써야함
			}
		}
		next_Count--;
	});

	$("#page65 .next_p_btn").click(function(){
		$("#page65 .audio2").each(function(){ 
			this.pause();
			if (!isNaN(this.duration)) {
				this.currentTime = 0;
			}
		});
	if($("#page66").has(".audio1")) {
			$("#page66").find(".audio1").trigger('play');
		}
});

	$("#page66").on({
		"pagebeforeshow" : function(){
			$("#page66 .next_p_btn, #page66 .popLayer, #page66 .img_ex").hide();
			$("#page66 .next_p_btn").addClass("stopPage");
		}, 
		"pageshow" : function(){
			$('#page66').css({"background":"url(../images/day2/16_photo_1.jpg)","background-repeat":"no-repeat", "background-size":"auto 100%"}).show();
			$("#page66 .next_finger img").css({"left":"44%","top":"12%"});
			//$("#page66 .pointbtn").css({"left":"54%","top":"26%"});
			$("#page66 .next_finger, #page66 .next_finger img").show();
		}
	});

	var ahss_ck=0;
	$("#page66 .next_finger").click(function(){
		ahss_ck++;
		//console.log(ahss_ck);
		$("#page66 .next_finger,#page66 .next_finger img").hide();
		if(ahss_ck % 3 ==1){
			$('#page66').css({"transition":"background-image 1s ease-in-out","background":"url(../images/day2/16_photo_2.jpg)","background-repeat":"no-repeat", "background-size":"auto 100%"}).fadeIn(500);
			$("#page66 .next_finger").fadeIn(500);
			$("#page66 .next_finger img").css({"left":"15%","top":"43%"}).delay(1500).fadeIn(500);
			//$("#page66 .pointbtn").css({"left":"30%","top":"46%"}).delay(1500).fadeIn(500);
			//$("#page66 .incremental-counter#int").attr('data-value','17');
			//$("#page66 .incremental-counter#decimal").attr('data-value','7');
			//$("#page66 .incremental-counter").incrementalCounter({"digits": "auto"});

		}else if(ahss_ck  % 3 ==2){
			$('#page66').css({"transition":"background-image 1s ease-in-out","background":"url(../images/day2/16_photo_3.jpg)","background-repeat":"no-repeat", "background-size":"auto 100%"}).fadeIn(500);
			$("#page66 .next_finger").fadeIn(500);
			$("#page66 .next_finger img").css({"left":"31%","top":"55%"}).delay(1500).fadeIn(500);
			//$("#page66 .pointbtn").css({"left":"43%","top":"58%"}).delay(1500).fadeIn(500);
			//$("#page66 .incremental-counter#int").attr('data-value','27');
			//$("#page66 .incremental-counter#decimal").attr('data-value','2');
			//$("#page66 .incremental-counter").incrementalCounter({"digits": "auto"});
		}else if(ahss_ck % 3 ==0){
			$('#page66').css({"transition":"background-image 1s ease-in-out","background":"url(../images/day2/16_photo_4.jpg)","background-repeat":"no-repeat", "background-size":"auto 100%"}).fadeIn(500);
			$("#page66 .next_p_btn, #page66 .img_ex").delay(1500).fadeIn(500);
			//$("#page66 .incremental-counter#int").attr('data-value','53');
			//$("#page66 .incremental-counter#decimal").attr('data-value','5');
			//$("#page66 .incremental-counter").incrementalCounter({"digits": "auto"});
		}

	});

	$("#page66 .next_p_btn").click(function(){
		if($("#page66 .next_p_btn").hasClass("stopPage")){
			$("#page66 .popLayer").fadeIn(500, function(){
				$("#page66 .audio1").each(function(){ 
					this.pause();
					if (!isNaN(this.duration)) {
						this.currentTime = 0;
					}
				});
		    if($("#page66").has(".audio2")) {
				$("#page66").find(".audio2").trigger('play');//다음페이지로 넘기기 위해서 trigger꼭 써야함
			}
				$("#page66 .next_p_btn").removeClass("stopPage");
			});
		}else{
			if($("#page68").has(".audio1")) {
						$("#page68").find(".audio1").trigger('play');
				}
		}
	});

	// $("#page66 .next_p_btn").click(function(){
	// 	$("#page66 .audio1").each(function(){ 
	// 		this.pause();
	// 		if (!isNaN(this.duration)) {
	// 			this.currentTime = 0;
	// 		}
	// 	});
	// 	if($("#page68").has(".audio1")) {
	// 			$("#page68").find(".audio1").trigger('play');
	// 		}
	// });

	$("#page68").on({
		"pagebeforeshow" : function(){
			$("#page68 .textwrap, #page68 .next_p_btn").hide();
			$("#page68").css({"background-size":"120% auto"});
		}, 
		"pageshow" : function(){
			$("#page68 .textwrap, #page68 .next_p_btn").delay(1000).fadeIn(500);		
			$("#page68").delay(500).animate({"backgroundSize":"100%"});
		}
	});

	$("#page68 .next_p_btn").click(function(){
		$("#page68 .audio1").each(function(){ 
			this.pause();
			if (!isNaN(this.duration)) {
				this.currentTime = 0;
			}
		});
		if($("#page69").has(".audio1")) {
				$("#page69").find(".audio1").trigger('play');
			}
	});


	$("#page69").on({
		"pagebeforeshow" : function(){
			$("#page69 #textbox2, #page69 .view_text").hide();
			$("#page69 .textwrap").hide();
			$('#page69 .ui-content').queue(function() {
		        $(this).css({"background":"url(../images/day2/19_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		    })
		}, 
		"pageshow" : function(){
			$("#page69 .textwrap").fadeIn(500);
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

	$("#page69 .next_p_btn").click(function(){
		$("#page69 .audio1").each(function(){ 
		this.pause();
		if (!isNaN(this.duration)) {
			this.currentTime = 0;
		}
	});
	if($("#page70").has(".audio1")) {
			$("#page70").find(".audio1").trigger('play');
		}
});

	$("#page70").on({
		"pagebeforeshow" : function(){
			$('#page70 .next_p_btn, #page70 #go_back, #page70 #textbox2, #page70 #textbox3, #page70 #textbox4').hide();
			$("#page70 .textwrap, #page70 #go_next1").hide();
			$("#page70 .page_bg").css({"background":"url(../images/day2/21_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto","left":"0"});
			$("#page70 .audio2, #page70 .audio3").each(function(){ 
				this.pause();
				if (!isNaN(this.duration)) {
					this.currentTime = 0;
				}
			});
		}, 
		"pageshow" : function(){
			$("#page70 .textwrap,#page70 #textbox1,#page70 #go_next1").fadeIn(500);
			next_Count = 1;
		}
	});

	$("#page70 #go_next1").click(function(e){
		$("#page70 .textwrap").hide();
		if(next_Count == 1){
			// $('#page70 .page_bg')
			// .fadeOut()
			// .queue(function() {
		 //        $(this).css({"background":"url(../images/day2/22_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		 //    })
		 //    .fadeIn(500);
		    //$("#page70 #go_back").fadeIn();
		    $("#page70 .page_bg").css({"background":"url(../images/day2/22_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto","left":"100%"});
		    $("#page70 .page_bg").animate({"left":"0"},500);
		    $("#page70 #textbox1").hide();
		    $("#page70 .textwrap, #page70 #textbox2, #page70 #go_back").delay(500).fadeIn(500);
		    $("#page70 .audio1").each(function(){ 
					this.pause();
					if (!isNaN(this.duration)) {
						this.currentTime = 0;
					}
				});
		    if($("#page70").has(".audio2")) {
				$("#page70").find(".audio2").trigger('play');//다음페이지로 넘기기 위해서 trigger꼭 써야함
			}
		} else if(next_Count == 2){
			// $('#page70 .page_bg')
			// .fadeOut()
			// .queue(function() {
		 //        $(this).css({"background":"url(../images/day2/23_photo_2.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		 //    })
		 //    .fadeIn(500);
		 	$("#page70 .page_bg").css({"background":"url(../images/day2/23_photo_2.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto","left":"100%"});
		    $("#page70 .page_bg").animate({"left":"0"},500);
		    $("#page70 #textbox2, #page70 #go_next1").hide();
		    $("#page70 .textwrap,#page70 #textbox3, #page70 .next_p_btn").delay(500).fadeIn(500);
		    $("#page70 .audio2").each(function(){ 
					this.pause();
					if (!isNaN(this.duration)) {
						this.currentTime = 0;
					}
				});
		    if($("#page70").has(".audio3")) {
				$("#page70").find(".audio3").trigger('play');//다음페이지로 넘기기 위해서 trigger꼭 써야함
			}
		} 
		// else if(next_Count == 3){
		// 	$('#page70 .page_bg')
		// 	.fadeOut()
		// 	.queue(function() {
		//         $(this).css({"background":"url(../images/day2/23_photo_2.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		//     })
		//     .fadeIn(500);
		//     $("#page70 #go_next, #page70 #textbox3, #page70 #go_next1").hide();
		//     $("#page70 .next_p_btn, #page70 #textbox4").show();
		// } 
		next_Count++;
	});


	$("#page70 #go_back").click(function(e){
		$("#page70 .textwrap").hide();
		if(next_Count == 1){
			
		} else if(next_Count == 2){
			$(this).hide();
			// $('#page70 .page_bg')
			// .fadeOut()
			// .queue(function() {
		 //        $(this).css({"background":"url(../images/day2/21_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		 //    })
		 //    .fadeIn(500);
		 	$("#page70 .page_bg").css({"background":"url(../images/day2/21_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto","left":"-100%"});
		    $("#page70 .page_bg").animate({"left":"0"},500);
		     $("#page70 .textwrap, #page70 #textbox1,#page70 #go_next1").delay(500).fadeIn(500);
			$("#page70 #textbox2, #page70 .next_p_btn").hide();
			$("#page70 .audio2").each(function(){ 
					this.pause();
					if (!isNaN(this.duration)) {
						this.currentTime = 0;
					}
				});
		    if($("#page70").has(".audio1")) {
				$("#page70").find(".audio1").trigger('play');//다음페이지로 넘기기 위해서 trigger꼭 써야함
			}
		} else if(next_Count == 3){
			//$('#page70 #go_next1').show()
			// $('#page70 .page_bg')
			// .fadeOut()
			// .queue(function() {
		 //        $(this).css({"background":"url(../images/day2/22_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		 //    })
		 //    .fadeIn(500);
		 	$("#page70 .page_bg").css({"background":"url(../images/day2/22_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto","left":"-100%"});
		    $("#page70 .page_bg").animate({"left":"0"},500);
		    $("#page70 .textwrap, #page70 #textbox2, #page70 #go_back,#page70 #go_next1").delay(500).fadeIn(500);
			$("#page70 #textbox3").hide();
			$("#page70 .audio3").each(function(){ 
					this.pause();
					if (!isNaN(this.duration)) {
						this.currentTime = 0;
					}
				});
		    if($("#page70").has(".audio2")) {
				$("#page70").find(".audio2").trigger('play');//다음페이지로 넘기기 위해서 trigger꼭 써야함
			}
		}	
		// else if(next_Count == 4){
		// 	$('#page70 #go_next1').show()
		// 	$('#page70 .page_bg')
		// 	.fadeOut()
		// 	.queue(function() {
		//         $(this).css({"background":"url(../images/day2/23_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		//     })
		//     .fadeIn(500);
		//     $("#page70 #textbox3").show();
		// 	$("#page70 #textbox4, #page70 .next_p_btn").hide();
		// }
		next_Count--;
	});

	$("#page70 .next_p_btn").click(function(){
		$("#page70 .audio3").each(function(){ 
			this.pause();
			if (!isNaN(this.duration)) {
				this.currentTime = 0;
			}
		});
		if($("#page71").has(".audio1")) {
				$("#page71").find(".audio1").trigger('play');
			}
	});

	$("#page71").on({
		"pagebeforeshow" : function(){
			$("#page71 .next_p_btn, #page71 .textwrap").hide();
			$("#page71").css({"background-size":"120% auto"});
		}, 
		"pageshow" : function(){
			$("#page71").delay(500).animate({"backgroundSize":"100%"});
			$("#page71 .next_p_btn, #page71 .textwrap").delay(1000).fadeIn(500);
		}
	});

	$("#page71 .next_p_btn").click(function(){
		$("#page71 .audio1").each(function(){ 
		this.pause();
		if (!isNaN(this.duration)) {
			this.currentTime = 0;
		}
	});
	if($("#page72").has(".audio1")) {
			$("#page72").find(".audio1").trigger('play');
		}
});

	$("#page72").on({
		"pagebeforeshow" : function(){
			$("#page72 .next_p_btn, #page72 .textwrap").hide();
			//$("#page72").css({"background-size":"120% auto"});
			$("#page72 .imgwrap img").css({"top":"150px"});
		}, 
		"pageshow" : function(){
			//$("#page72").delay(500).animate({"backgroundSize":"100%"});
			$("#page72 .imgwrap img").delay(1000).animate({"top":"7px"},500);
			$("#page72 .next_p_btn, #page72 .textwrap").delay(1500).fadeIn(500);
		}
	});

	$("#page72 .next_p_btn").click(function(){
		$("#page72 .audio1").each(function(){ 
			this.pause();
			if (!isNaN(this.duration)) {
				this.currentTime = 0;
			}
		});
		if($("#page73").has(".audio1")) {
			$("#page73").find(".audio1").trigger('play');
		}
	});

	$("#page73").on({
		"pagebeforeshow" : function(){
			$("#page73 .next_finger, #page73 .textwrap").hide();
			$("#page73 .imgwrap img").css({"top":"150px"});
		}, 
		"pageshow" : function(){
			$("#page73 .imgwrap img").delay(500).animate({"top":"5px"},500);
			$("#page73 .textwrap").delay(1000).fadeIn(500);
			$("#page73 .next_finger").delay(1500).fadeIn(500);
		}
	});

	$("#page73 .next_finger").click(function(){
		$("#page73 .audio1").each(function(){ 
			this.pause();
			if (!isNaN(this.duration)) {
				this.currentTime = 0;
			}
		});
		if($("#page74").has(".audio1")) {
			$("#page74").find(".audio1").trigger('play');
		}
	});

	$("#page74").on({
		"pagebeforeshow" : function(){
			$("#page74 .next_p_btn, #page74 .textwrap").hide();
			$("#page74").css({"background-size":"120% auto"});
			
		}, 
		"pageshow" : function(){
			$("#page74").delay(500).animate({"backgroundSize":"100%"});
			$("#page74 .textwrap").delay(1000).fadeIn(500);
			$("#page74 .next_p_btn").delay(1500).fadeIn(500);
		}
	});
	$("#page74 .next_p_btn").click(function(){
		$("#page74 .audio1").each(function(){ 
		this.pause();
		if (!isNaN(this.duration)) {
			this.currentTime = 0;
		}
	});
	if($("#page75").has(".audio1")) {
			$("#page75").find(".audio1").trigger('play');
		}
	});

	$("#page75").on({
		"pagebeforeshow" : function(){
			$("#page75 .next_p_btn, #page75 .textwrap").hide();
			//$("#page75 .page_bg").css({"background-size":"120% auto"});
			
		}, 
		"pageshow" : function(){
			//$("#page75 .page_bg").delay(500).animate({"backgroundSize":"100%"});
			$("#page75 .textwrap").delay(1000).fadeIn(500);
			$("#page75 .next_p_btn").delay(1500).fadeIn(500);
		}
	});

	$("#page75 .next_p_btn").click(function(){
		$("#page75 .audio1").each(function(){ 
		this.pause();
		if (!isNaN(this.duration)) {
			this.currentTime = 0;
		}
	});
	if($("#page76").has(".audio1")) {
			$("#page76").find(".audio1").trigger('play');
		}
	});

	$("#page76").on({
		"pagebeforeshow" : function(){
			$("#page76 #textbox2, #page76 .view_text").hide();
			$("#page76 .textwrap").hide();
			$('#page76 .ui-content').queue(function() {
		        $(this).css({"background-image":"url(../images/day2/29_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		    })
		}, 
		"pageshow" : function(){
			$("#page76 .textwrap").fadeIn(500);
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
		    .animate({ backgroundSize: '120%' }, 500);
		$("#page76 .textwrap").hide();
		$("#page76 .view_text").delay(2000).fadeIn();
	});

	$("#page76 .next_p_btn").click(function(){
		$("#page76 .audio1").each(function(){ 
		this.pause();
		if (!isNaN(this.duration)) {
			this.currentTime = 0;
		}
	});
	if($("#page77").has(".audio1")) {
			$("#page77").find(".audio1").trigger('play');
		}
	});

	$("#page77").on({
		"pagebeforeshow" : function(){
			$('#page77 .next_p_btn, #page77 #go_back, #page77 #textbox2, #page77 #textbox3, #page77 #textbox4, #page77 .textwrap').hide();
			$("#page77 #textbox1, #page77 #go_next1").show();
			$("#page77 .audio2").each(function(){ 
				this.pause();
				if (!isNaN(this.duration)) {
					this.currentTime = 0;
				}
			});
		}, 
		"pageshow" : function(){
			$("#page77 .textwrap").delay(500).fadeIn(500);
			next_Count = 1;
		}
	});

	$("#page77 #go_next1").click(function(e){
		$("#page77 .textwrap").hide();
		if(next_Count == 1){
			// $('#page77 .page_bg')
			// .fadeOut()
			// .queue(function() {
		 //        $(this).css({"background":"url(../images/day2/32_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		 //    })
		 //    .fadeIn(500);
		 	$("#page77 .page_bg").css({"background":"url(../images/day2/32_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto","left":"100%"});
		 	$("#page77 .page_bg").animate({"left":"0"},500);

		    $("#page77 #textbox1,#page77 #go_next1").hide();
		   $("#page77 .textwrap,#page77 #textbox2,#page77 #go_back").delay(500).fadeIn(500);
		   //$("#page77 .textwrap").fadeIn(500);
		   $("#page77 .next_p_btn").delay(1000).fadeIn(500);
		    $("#page77 .audio1").each(function(){ 
					this.pause();
					if (!isNaN(this.duration)) {
						this.currentTime = 0;
					}
				});

		    if($("#page77").has(".audio2")) {
				$("#page77").find(".audio2").trigger('play');//다음페이지로 넘기기 위해서 trigger꼭 써야함
			}
		 }
		// else if(next_Count == 2){
		// 	$('#page77 .page_bg')
		// 	.fadeOut()
		// 	.queue(function() {
		//         $(this).css({"background":"url(../images/day2/33_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		//     })
		//     .fadeIn(500);
		//     $("#page77 #textbox2").hide();
		//     $("#page77 #textbox3").show();
		// } else if(next_Count == 3){
		// 	$('#page77 .page_bg')
		// 	.fadeOut()
		// 	.queue(function() {
		//         $(this).css({"background":"url(../images/day2/34_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		//     })
		//     .fadeIn(500);
		//     $("#page77 #go_next, #page77 #textbox3, #page77 #go_next1").hide();
		//     $("#page77 .next_p_btn, #page77 #textbox4").show();
		// } 
		next_Count++;
	});


	$("#page77 #go_back").click(function(e){
		$("#page77 .textwrap").hide();
		if(next_Count == 1){
			
		} else if(next_Count == 2){
			$(this).hide();
			// $('#page77 .page_bg')
			// .fadeOut()
			// .queue(function() {
		 //        $(this).css({"background":"url(../images/day2/31_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		 //    })
		 //    .fadeIn(500);
		 	$("#page77 .page_bg").css({"background":"url(../images/day2/31_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto","left":"-100%"});
		 	$("#page77 .page_bg").animate({"left":"0"},500);
		    $("#page77 .textwrap, #page77 #textbox1, #page77 #go_next1").delay(500).fadeIn(500);
			$("#page77 #textbox2, #page77 .next_p_btn").hide();
			$("#page77 .audio2").each(function(){ 
					this.pause();
					if (!isNaN(this.duration)) {
						this.currentTime = 0;
					}
				});
		    if($("#page77").has(".audio1")) {
				$("#page77").find(".audio1").trigger('play');//다음페이지로 넘기기 위해서 trigger꼭 써야함
			}
		} 
		// else if(next_Count == 3){
		// 	$('#page77 #go_next1').show()
		// 	$('#page77 .page_bg')
		// 	.fadeOut()
		// 	.queue(function() {
		//         $(this).css({"background":"url(../images/day2/32_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		//     })
		//     .fadeIn(500);
		//     $("#page77 #textbox2").show();
		// 	$("#page77 #textbox3").hide();
		// }else if(next_Count == 4){
		// 	$('#page77 #go_next1').show()
		// 	$('#page77 .page_bg')
		// 	.fadeOut()
		// 	.queue(function() {
		//         $(this).css({"background":"url(../images/day2/33_photo.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
		//     })
		//     .fadeIn(500);
		//     $("#page77 #textbox3").show();
		// 	$("#page77 #textbox4, #page77 .next_p_btn").hide();
		// }
		next_Count--;
	});

	$("#page77 .next_p_btn").click(function(){
		$("#page77 .audio2").each(function(){ 
		this.pause();
		if (!isNaN(this.duration)) {
			this.currentTime = 0;
		}
	});
	if($("#page78").has(".audio1")) {
			$("#page78").find(".audio1").trigger('play');
		}
	});

	$("#page78").on({
		"pagebeforeshow" : function(){
			$("#page78 .textwrap, #page78 .next_p_btn").hide();
			$("#page78 .imgwrap img").css({"top":"200px"});
		}, 
		"pageshow" : function(){
			$("#page78 .imgwrap img").animate({"top":"7px"},500);
			$("#page78 .textwrap").delay(500).fadeIn(500);
			$("#page78 .next_p_btn").delay(1000).fadeIn(500);
		}
	});

	$("#page78 .next_p_btn").click(function(){
		$("#page78 .audio1").each(function(){ 
		this.pause();
		if (!isNaN(this.duration)) {
			this.currentTime = 0;
		}
	});
	if($("#page79").has(".audio1")) {
			$("#page79").find(".audio1").trigger('play');
		}
	});

	$("#page79").on({
		"pagebeforeshow" : function(){
			$("#page79 .popLayer, #page79 .next_p_btn").hide();
			$("#page79 .next_finger").show();
			$("#page79 .next_p_btn").addClass("stopPage");
			$("#page79 .audio2").each(function(){ 
				this.pause();
				if (!isNaN(this.duration)) {
					this.currentTime = 0;
				}
			});
		},
		"pageshow" : function(){
						
		}
	});
	$("#page79 .next_finger").click(function(){
		$("#n1").delay(500).animateNumber({number:3},1000);
		$("#n2").delay(500).animateNumber({number:9},1000);
		$("#n3").delay(500).animateNumber({number:5},1000);
		$(this).hide();
		$("#page79 .next_p_btn").delay(1000).fadeIn(500);
	});

	$("#page79 .next_p_btn").click(function(){
		if($("#page79 .next_p_btn").hasClass("stopPage")){
			$("#page79 .popLayer").fadeIn(500, function(){
				$("#page79 .audio1").each(function(){ 
					this.pause();
					if (!isNaN(this.duration)) {
						this.currentTime = 0;
					}
				});
		 //    if($("#page79").has(".audio2")) {
			// 	$("#page79").find(".audio2").trigger('play');//다음페이지로 넘기기 위해서 trigger꼭 써야함
			// }
				$("#page79 .next_p_btn").removeClass("stopPage");

			});
		}
		else {
			if($("#page81").has(".audio1")) {
				$("#page81").find(".audio1").trigger('play');//다음페이지로 넘기기 위해서 trigger꼭 써야함
			}
		}
	});

	$("#page81").on({
		"pagebeforeshow" : function(){
			$("#page81 .textwrap, #page81 .next_p_btn").hide();
			$("#page81 .imgwrap img").css({"top":"250px"});
		}, 
		"pageshow" : function(){
			$("#page81 .imgwrap img").animate({"top":"7px"},500);
			$("#page81 .textwrap").delay(500).fadeIn(500);
			$("#page81 .next_p_btn").delay(1000).fadeIn(500);
		}
	});
	
	$("#page81 .next_p_btn").click(function(){
		$("#page81 .audio1").each(function(){ 
		this.pause();
		if (!isNaN(this.duration)) {
			this.currentTime = 0;
		}
	});
	if($("#page82").has(".audio1")) {
			$("#page82").find(".audio1").trigger('play');
		}
	});

	$("#page82").on({
		"pagebeforeshow" : function(){
			$("#page82 .textwrap, #page82 .next_p_btn").hide();
			//$("#page82").css({"background-size":"120% auto"});
		}, 
		"pageshow" : function(){
			//$("#page82").animate({"backgroundSize":"100%"});
			$("#page82 .textwrap").delay(500).fadeIn(500);
			$("#page82 .next_p_btn").delay(1000).fadeIn(500);
		}
	});

	$("#page82 .next_p_btn").click(function(){
		$("#page82 .audio1").each(function(){ 
		this.pause();
		if (!isNaN(this.duration)) {
			this.currentTime = 0;
		}
	});
	if($("#page83").has(".audio1")) {
			$("#page83").find(".audio1").trigger('play');
		}
	});

	$("#page83").on({
		"pagebeforeshow" : function(){
			$("#page83 .textwrap, #page83 .next_p_btn").hide();
			$("#page83").css({"background-size":"120% auto"});
		}, 
		"pageshow" : function(){
			$("#page83").animate({"backgroundSize":"100%"});
			$("#page83 .textwrap").delay(500).fadeIn(500);
			$("#page83 .next_p_btn").delay(1000).fadeIn(500);
		}
	});

	$("#page83 .next_p_btn").click(function(){
		$("#page83 .audio1").each(function(){ 
		this.pause();
		if (!isNaN(this.duration)) {
			this.currentTime = 0;
		}
	});
	if($("#page84").has(".audio1")) {
			$("#page84").find(".audio1").trigger('play');
		}
	});

	//page85
	$("#page85").on({
		"pagebeforeshow" : function(){
			$("#page85 #textbox1").show();
			$("#page85 #textbox2, #page85 .next_p_btn").hide();
			$('#page85 .ui-content').css({"background-image":"url(../images/day2/43_image.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"100% auto"});
		}, 
		"pageshow" : function(){
			$("#page85 .next_finger").delay(500).fadeIn(500);
			next_Count = 1;
		}
	});
	$("#page85 .next_finger").click(function(){
		if(next_Count == 1){
			$(this).hide();
			$("#page85 #textbox1, #page85 .next_finger").hide();
			$('#page85 .ui-content')
				.delay(500)
				.fadeOut()
			    .queue(function() {
		        $(this).css({"background-image":"url(../images/day2/44_image_overlay.png)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page85 #textbox2, #page85 .next_p_btn").delay(800).fadeIn();
			//$(this).delay(2000).fadeIn();
		} else if(next_Count == 2){
			$.mobile.changePage("#page86");
		}
		next_Count++;
	});

	$("#page86 .next_p_btn").click(function(){
			if($("#page89").has(".audio1")) {
			$("#page89").find(".audio1").trigger('play');
		}
});


	//page87
	$("#page87").on({
		"pagebeforeshow" : function(){
			$("#page87 #textbox1").show();
			$("#page87 #textbox2, #page87 .next_p_btn").hide();
			$('#page87 .ui-content').css({"background-image":"url(../images/day2/46_image.jpg)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"100% auto"});
		}, 
		"pageshow" : function(){
			$("#page87 .next_finger").delay(500).fadeIn(500);
			next_Count = 1;
		}
	});
	$("#page87 .next_finger").click(function(){
		if(next_Count == 1){
			$(this).hide();
			$("#page87 #textbox1, #page87 .next_finger").hide();
			$('#page87 .ui-content')
				.delay(500)
				.fadeOut()
			    .queue(function() {
		        $(this).css({"background-image":"url(../images/day2/46_image_overlay.png)","background-repeat":"no-repeat%","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
		    })
		    .fadeIn(500);
		    $("#page87 #textbox2, #page87 .next_p_btn").delay(800).fadeIn();
			//$(this).delay(2000).fadeIn();
		} else if(next_Count == 2){
			$.mobile.changePage("#page88");
		}
		next_Count++;
	});

	$("#page88 .next_p_btn").click(function(){
		
	if($("#page89").has(".audio1")) {
			$("#page89").find(".audio1").trigger('play');
		}
	});

	$("#page89").on({
		"pagebeforeshow" : function(){
			$("#page89 .textwrap, #page83 .next_p_btn").hide();
			//$("#page89").css({"background-size":"120% auto"});
		}, 
		"pageshow" : function(){
			//$("#page89").animate({"backgroundSize":"100%"});
			$("#page89 .textwrap").delay(500).fadeIn(500);
			$("#page89 .next_p_btn").delay(1000).fadeIn(500);
		}
	});

	$("#page89 .next_p_btn").click(function(){
		$("#page89 .audio1").each(function(){ 
		this.pause();
		if (!isNaN(this.duration)) {
			this.currentTime = 0;
		}
	});
	if($("#page90").has(".audio1")) {
			$("#page90").find(".audio1").trigger('play');
		}
	});

	$("#page90").on({
		"pagebeforeshow" : function(){
			$("#page90 .textwrap, #page83 .next_p_btn").hide();
			$("#page90 .imgwrap img").css({"top":"200px"});
			//$("#page90").css({"background-size":"120% auto"});
		}, 
		"pageshow" : function(){
			//$("#page90").animate({"backgroundSize":"100%"},500);
			$("#page90 .imgwrap img").delay(500).animate({"top":"5px"},500);
			$("#page90 .textwrap").delay(1000).fadeIn(500);
			$("#page90 .next_p_btn").delay(1500).fadeIn(500);
		}
	});

	$("#page90 .next_p_btn").click(function(){
		$("#page90 .audio1").each(function(){ 
		this.pause();
		if (!isNaN(this.duration)) {
			this.currentTime = 0;
		}
	});
	if($("#page91").has(".audio1")) {
			$("#page91").find(".audio1").trigger('play');
		}
	});

	//page91
	$("#page91").on({
		"pagebeforeshow" : function(){
			//$("#page91 .page_bg").css({"background-size":"120% auto", "background-position":"50% 50%"});
			$("#page91 .textwrap").hide();

		}, 
		"pageshow" : function(){
			//$("#page91 .page_bg").delay(500).animate({"background-size":"100%"});
			$("#page91 .textwrap").delay(700).fadeIn(500);

		}
	});

	$("#page91 .next_p_btn").click(function(){
		$("#page91 .audio1").each(function(){ 
		this.pause();
		if (!isNaN(this.duration)) {
			this.currentTime = 0;
		}
	});
	if($("#page92").has(".audio1")) {
			$("#page92").find(".audio1").trigger('play');
		}
	});

	//page92
	$("#page92").on({
		"pagebeforeshow" : function(){
			$("#page92 .try_again, #page92 .good").hide();
		}, 
		"pageshow" : function(){
				
		}
	});

	$("#page92 .wrong").click(function(){
		$("#page92 .try_again").show()
		$("#page92 .try_again").delay(1000).fadeOut(500);
	});

	$("#page92 .right").click(function(){
		$("#page92 .good").show();
		setTimeout(function(){
			$.mobile.changePage("#page93");
		},1000);	
	});

	//page93
	$("#page93").on({
		"pagebeforeshow" : function(){
			$("#page93 .textwrap,#page93 .next_p_btn").hide();
			$("#page93 .start_text").show();
		}, 
		"pageshow" : function(){
			$("#page93 #textbox1").show();
			$("#page93 audio").each(function(){ 
				this.pause();
				if (!isNaN(this.duration)) {
					this.currentTime = 0;
				}
			});	
		}
	});
	$("#page93 .toggle").click(function(){
		$("#page93 .textwrap, #page93 .start_text, #page93 .next_p_btn").toggle();
		if($("#page93").has(".audio1")) {
				$("#page93").find(".audio1").trigger('play');//다음페이지로 넘기기 위해서 trigger꼭 써야함
			}
	});

	$("#page93 .next_p_btn").click(function(){
		$("#page93 .audio1").each(function(){ 
		this.pause();
		if (!isNaN(this.duration)) {
			this.currentTime = 0;
		}
	});
	if($("#page94").has(".audio1")) {
			$("#page94").find(".audio1").trigger('play');
		}
	});

	//page94
	$("#page94").on({
		"pagebeforeshow" : function(){
			//$("#page94").css({"background-size":"120% auto"});
			$("#page94 .textwrap").hide();
			$("#page94 .imgwrap img").css({"top":"150px"});

		}, 
		"pageshow" : function(){
			//$("#page94").delay(500).animate({"backgroundSize":"100%"});
			$("#page94 .imgwrap img").delay(700).animate({"top":"7px"},500);
			$("#page94 .textwrap").delay(1000).fadeIn(500);

		}
	});

	$("#page94 .next_p_btn").click(function(){
		$("#page94 .audio1").each(function(){ 
		this.pause();
		if (!isNaN(this.duration)) {
			this.currentTime = 0;
		}
	});
	if($("#page95").has(".audio1")) {
			$("#page95").find(".audio1").trigger('play');
		}
	});

	//page95
	$("#page95").on({
		"pagebeforeshow" : function(){
			//$("#page95").css({"background-size":"120% auto"});
			$("#page95 .textwrap").hide();
		}, 
		"pageshow" : function(){
			//$("#page95").delay(500).animate({"backgroundSize":"100%"});
			$("#page95 .textwrap").delay(1000).fadeIn(500);

		}
	});

	$("#page95 .next_p_btn").click(function(){
		$("#page95 .audio1").each(function(){ 
		this.pause();
		if (!isNaN(this.duration)) {
			this.currentTime = 0;
		}
	});
	if($("#page96").has(".audio1")) {
			$("#page96").find(".audio1").trigger('play');
		}
	});

	//page96
	$("#page96").on({
		"pagebeforeshow" : function(){
			//$("#page96").css({"background-size":"120%", "background-position":"50% 50%"});
			$("#page96 .textwrap").hide();

		}, 
		"pageshow" : function(){
			//$("#page96").delay(500).animate({"background-size":"100%"});
			$("#page96 .textwrap").delay(700).fadeIn(500);

		}
	});

	$("#page96 .next_p_btn").click(function(){
		$("#page96 .audio1").each(function(){ 
		this.pause();
		if (!isNaN(this.duration)) {
			this.currentTime = 0;
		}
	});
	if($("#page97").has(".audio1")) {
			$("#page97").find(".audio1").trigger('play');
		}
	});

	//page97
	$("#page97").on({
		"pagebeforeshow" : function(){
			//$("#page97").css({"background-size":"120% auto"});
			$("#page97 .textwrap").hide();
			$("#page97 .imgwrap img").css({"top":"150px"});

		}, 
		"pageshow" : function(){
			//$("#page97").delay(500).animate({"backgroundSize":"100%"});
			$("#page97 .textwrap").delay(1000).fadeIn(500);
			$("#page97 .imgwrap img").delay(700).animate({"top":"7px"},500);
			$("#page97 .textwrap").delay(700).fadeIn(500);

		}
	});

	$("#page97 .next_p_btn").click(function(){
		$("#page97 .audio1").each(function(){ 
		this.pause();
		if (!isNaN(this.duration)) {
			this.currentTime = 0;
		}
	});
	if($("#page98").has(".audio1")) {
			$("#page98").find(".audio1").trigger('play');
		}
	});

	//page98
	$("#page98").on({
		"pagebeforeshow" : function(){
			$("#page98 .textwrap").hide();
		}, 
		"pageshow" : function(){
			$("#page98 .textwrap").delay(500).fadeIn(500);
		}
	});

	$("#page98 .next_p_btn").click(function(){
		$("#page98 .audio1").each(function(){ 
		this.pause();
		if (!isNaN(this.duration)) {
			this.currentTime = 0;
		}
	});
	if($("#page99").has(".audio1")) {
			$("#page99").find(".audio1").trigger('play');
		}
	});

	$("#page99 .next_finger").click(function(){
		$("#page99 .audio1").each(function(){ 
		this.pause();
		if (!isNaN(this.duration)) {
			this.currentTime = 0;
		}
	});
	if($("#page100").has(".audio1")) {
			$("#page100").find(".audio1").trigger('play');
		}
	});

	//page100
	$("#page100").on({
		"pagebeforeshow" : function(){
			$("#page100 .textwrap,#page100 .next_p_btn").hide();
			$("#page100 .start_text").show();
		}, 
		"pageshow" : function(){
			$("#page100 #textbox1").show();
			$("#page100 audio").each(function(){ 
				this.pause();
				if (!isNaN(this.duration)) {
					this.currentTime = 0;
				}
			});
		}
	});
	$("#page100 .toggle").click(function(){
		$("#page100 .textwrap, #page100 .start_text, #page100 .next_p_btn").toggle();
		if($("#page100").has(".audio1")) {
				$("#page100").find(".audio1").trigger('play');//다음페이지로 넘기기 위해서 trigger꼭 써야함
			}
	});

	$("#page100 .next_p_btn").click(function(){
		$("#page100 .audio1").each(function(){ 
		this.pause();
		if (!isNaN(this.duration)) {
			this.currentTime = 0;
		}
	});
	if($("#page101").has(".audio1")) {
			$("#page101").find(".audio1").trigger('play');
		}
	});

	//page101
	$("#page101").on({
		"pagebeforeshow" : function(){
			//$("#page101").css({"background-size":"120% auto"});
			$("#page101 .textwrap").hide();
			$("#page101 .imgwrap img").css({"top":"150px"});

		}, 
		"pageshow" : function(){
			//$("#page101").delay(500).animate({"backgroundSize":"100%"});
			$("#page101 .imgwrap img").delay(700).animate({"top":"7px"},500);
			$("#page101 .textwrap").delay(1000).fadeIn(500);

		}
	});

	$("#page101 .next_p_btn").click(function(){
		$("#page101 .audio1").each(function(){ 
		this.pause();
		if (!isNaN(this.duration)) {
			this.currentTime = 0;
		}
	});
});

	$("#page102").on({
		"pagebeforeshow" : function(){
			$("#page102 #textbox2, #page102 .view_text").hide();
			$("#page102 .textwrap").show();
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
			$("#page103 #textbox1, #page103 #go_next1").show();
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


 $("#page105 .go-next").click(function(){	
		location.href="/pd/en/day3.php";
	});

});