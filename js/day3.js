$(document).ready(function() {
	
	//뒤로가기 후에 textbox에서 next버튼 항상 보이게 하기
	$(".go-back").click(function(){
		 
		 $('section').each(function(idx,obj){
			 var pageid = $(obj).attr("id");
			 if($("#"+pageid+" #go_next1").css("display") == "none"){
				 $("#"+pageid+" #go_next1").show(); 
			 }
		 });
	});
	
	$("#mokup, #wrap.mobile").addClass("landscape");
	$(".btn_device").hide();

	//country selectbox
	var select = $("select#input_country");
	select.change(function() {
		var select_name = $(this).children("option:selected").text();
		$(this).siblings("label").text(select_name);
		$(this).siblings("label").css({"color":"#002c5f","background-image":"url('../images/button/icon_country_arrow_select.png')"});
	});

	//page1
	var next_Count;
	$("#page0").on({
		"pagebeforeshow" : function(){
			$("#page0 .textwrap, #page0 .textbox,#page0 .next_finger,#page0 #go_back").hide();
			$("#page0 .imgwrap img").css({"top":"200px"});
		},
		"pageshow": function(){
			$("#page0 .imgwrap img").animate({"top":"5px"},500);
			$("#page0 .textwrap, #page0 #textbox0_1,#page0 #go_next1").delay(500).fadeIn(500);
			$("#page0 .next_finger").delay(1000).fadeIn(500);
			next_Count=1;
		}
	});
	$("#page0 #go_next1").click(function() {
		$("#page0 .textwrap").hide();
		if (next_Count == 1) {
			$("#page0 .textbox").hide();
			$("#page0 .textwrap,#textbox0_2, #page0 #go_back, #page0 #go_next1").fadeIn(500);
		}
		else { //next_Count == 2
			$("#page0 .textbox, #page0 #go_next1").hide();
			$("#page0 .textwrap,#textbox0_3, #page0 #go_back").fadeIn(500);
		}
		next_Count++;
	});

	$("#page0 #go_back").click(function(e) {
		$("#page0 .textwrap").hide();
		if (next_Count == 2) {
			$(this).hide();
			$("#page0 .textbox, #page0 #go_back").hide();
			$("#page0 .textwrap, #textbox0_1, #page0 #go_next1").fadeIn(500);
		}
		else if (next_Count == 3) {
			$("#page0 .textbox").hide();
			$("#page0 .textwrap, #textbox0_2, #page0 #go_next1, #page0 #go_back").fadeIn(500);
		}
		next_Count--;
	});

	$("#page1").on({
		"pagebeforeshow" : function(){
			$("#page1 .textwrap, #page1 .next_p_btn").hide();
			$("#page1").css({"background-size":"120% auto"});
		},
		"pageshow": function(){
			$("#page1").animate({"background-size":"100%"},500);
			$("#page1 .textwrap").delay(500).fadeIn(500);
			$("#page1 .next_p_btn").delay(1000).fadeIn(500);
		}
	});

	$("#page2").on({
		"pagebeforeshow" : function(){
			$("#page2 .textwrap, #page2 .next_p_btn").hide();
		},
		"pageshow": function(){
			$("#page2 .textwrap").fadeIn(500);
			$("#page2 .next_p_btn").delay(500).fadeIn(500);
		}
	});

	$("#page3").on({
		"pagebeforeshow" : function() {
			$("#page3 .textwrap, #page3 .textbox, #page3 .text_btn_r, #page3 .next_p_btn, #page3 .img_twinkle").hide();
			$("#page3 .start_text").show();
			$('#page3').css({"background":"url(../images/day3/05_image.jpg)","background-repeat":"no-repeat","background-size":"100% auto"});
		},
		"pageshow" : function() {
			$("#page3 #textbox1, #page3 #go_next1").show();
			next_Count = 0;
		}
	});
	$("#page3 .imgwrap").click(function() {
		$("#page3 .textwrap, #page3 .start_text, #textbox3_1, #img_twinkle3_1").toggle();
	});

	$("#page3 #go_next1").click(function() {
		next_Count++;
		if (next_Count == 1) {
			$("#page3 .textbox, #page3 .img_twinkle, #page3 .next_p_btn").hide();
			$("#textbox3_2, #img_twinkle3_2, #page3 #go_back, #page3 #go_next1").show();
			$('#page3')
			.queue(function() {
				$(this).css({"background":"url(../images/day3/06_image.jpg)","background-repeat":"no-repeat","background-size":"100% auto"}).dequeue();
			})
			.fadeIn(500);
		}
		else if (next_Count == 2) {
			$("#page3 .textbox, #page3 .img_twinkle, #page3 .next_p_btn").hide();
			$("#textbox3_3, #img_twinkle3_3, #page3 #go_back, #page3 #go_next1").show();
			$('#page3')
			.queue(function() {
				$(this).css({"background":"url(../images/day3/07_image.jpg)","background-repeat":"no-repeat","background-size":"100% auto"}).dequeue();
			})
			.fadeIn(500);
		}
		else if (next_Count == 3) {
			$("#page3 .textbox, #page3 .img_twinkle, #page3 #go_next1").hide();
			$("#textbox3_4, #page3 #go_back, #page3 .next_p_btn").show();
			$('#page3')
			.queue(function() {
				$(this).css({"background":"url(../images/day3/08_image.jpg)","background-repeat":"no-repeat","background-size":"100% auto"}).dequeue();
			})
			.fadeIn(500);
		}
	});

	$("#page3 #go_back").click(function() {
		next_Count--;
		if (next_Count == 0) {
			$("#page3 .textbox, #page3 #go_back, #page3 .img_twinkle, #page3 .next_p_btn").hide();
			$("#textbox3_1, #page3 #go_next1, #img_twinkle3_1").show();
			$('#page3')
			.queue(function() {
				$(this).css({"background":"url(../images/day3/05_image.jpg)","background-repeat":"no-repeat","background-size":"100% auto"}).dequeue();
			})
			.fadeIn(500);
		}
		else if (next_Count == 1) {
			$("#page3 .textbox, #page3 .img_twinkle, #page3 .next_p_btn").hide();
			$("#textbox3_2, #page3 #go_back, #page3 #go_next1, #img_twinkle3_2").show();
			$('#page3')
			.queue(function() {
				$(this).css({"background":"url(../images/day3/06_image.jpg)","background-repeat":"no-repeat","background-size":"100% auto"}).dequeue();
			})
			.fadeIn(500);
		}
		else if (next_Count == 2) {
			$("#page3 .textbox, #page3 .img_twinkle, #page3 .next_p_btn").hide();
			$("#textbox3_3, #page3 #go_back, #page3 #go_next1, #img_twinkle3_3").show();
			$('#page3')
			.queue(function() {
				$(this).css({"background":"url(../images/day3/07_image.jpg)","background-repeat":"no-repeat","background-size":"100% auto"}).dequeue();
			})
			.fadeIn(500);
		}
	});

	$("#page4").on({
		"pagebeforeshow" : function() {
			$("#page4 .graphQuantity4 div, #page4 .graphLegend4 div, #page4 .graph4 li, #page4 #textbox2, #page4 #go_back, #page4 .next_p_btn").hide();
			$("#page4 #textbox1, #page4 #go_next1").show();
		},
		"pageshow" : function() {
			next_Count = 1;
			$("#page4 .graphQuantity4 div:nth-child(1), #page4 .graphLegend4 div:nth-child(1), #page4 .graph4 li:nth-child(1)").slideDown(function() {
				$("#page4 .graph4 li:nth-child(1)").css({'animation': 'twinkle 1.5s infinite'});
				$("#page4 .graphQuantity4 div:nth-child(2), #page4 .graphLegend4 div:nth-child(2), #page4 .graph4 li:nth-child(2)").slideDown(function() {
					$("#page4 .graphQuantity4 div:nth-child(3), #page4 .graphLegend4 div:nth-child(3), #page4 .graph4 li:nth-child(3)").slideDown(function() {
						$("#page4 .graphQuantity4 div:nth-child(4), #page4 .graphLegend4 div:nth-child(4), #page4 .graph4 li:nth-child(4)").slideDown();
					});
				});
			});
		}
	});

	$("#page4 #go_next1").click(function(){
		if(next_Count == 1){
		    $("#page4 #textbox1, #page4 #go_next1").hide();
		    $("#page4 #textbox2, #page4 #go_back, #page4 .next_p_btn").show();
		} 
		next_Count++;
	});

	$("#page4 #go_back").click(function(e){
		if(next_Count == 1){
			
		} else if(next_Count == 2){
			$(this).hide();
			$("#page4 #textbox1, #page4 #go_next1").show();
			$("#page4 #textbox2, #page4 .next_p_btn").hide();
		}
		next_Count--;
	});

	$("#page6").on({
		"pagebeforeshow" : function() {
			$("#page6 .imgwrap, #page6 .textbox").show();
			$("#page6 .imgwrap2, #page6 #go_back, #textbox6_2, #page6 .graphDesc").hide();
			$("#page6 .graphObj").css({'margin-left':'-100%'});
			next_Count = 1;
		},
		"pageshow" : function() {
			$("#page6 .graph6_1 .graphObj").animate({'margin-left':'0'}, 'slow');
			$("#page6 .graph6_3 .graphObj").animate({'margin-left':'0'}, 'slow', function() {
				$("#page6 .graphDesc").fadeIn();
			});
			$("#page6 .graph6_2 .graphObj").animate({'margin-left':'0'}, 'slow');
		}
	});

	$("#page6 #go_next1").click(function() {
		if (next_Count == 1) {
			$("#page6 .textbox, #page6 #go_back, #page6 #go_next1, #page6 .panelImg img").hide();
			$("#textbox6_2, #page6 #go_back, #page6 .next_p_btn").show();
			$("#page6 .panelImg img").fadeIn();
			$("#page6 .imgwrap").hide();
			$("#page6 .imgwrap2").show();
			$("#page6 .pageTitle").html('Unified frame panel');
			$('#page6').queue(function() {
				$(this).css({"background-image":"url(../images/day3/09_bg.jpg)","background-repeat":"no-repeat", "background-size":"100% auto"}).dequeue();
			});
		}
		next_Count++;
	});

	$("#page6 #go_back").click(function(e) {
		if (next_Count == 1) {

		} else if (next_Count == 2) {
			$(this).hide();
			$("#page6 .textbox, #page6 #go_back, #page6 .next_p_btn").hide();
			$("#page6 .imgwrap2, #page6 #go_back, #textbox6_2, #page6 .graphDesc").hide();
			$("#page6 .graphObj").css({'margin-left':'-100%'});
			$("#textbox6_1, #page6 #go_next1").show();
			$("#page6 .imgwrap2").hide();
			$("#page6 .imgwrap").show();
			$("#page6 .graph6_1 .graphObj").animate({'margin-left':'0'}, 'slow');
			$("#page6 .graph6_3 .graphObj").animate({'margin-left':'0'}, 'slow', function() {
				$("#page6 .graphDesc").fadeIn();
			});
			$("#page6 .graph6_2 .graphObj").animate({'margin-left':'0'}, 'slow');
			$("#page6 .pageTitle").html('Minimized number of parts');
			$('#page6').queue(function() {
				$(this).css({"background-image":""}).dequeue();
			});

		}
		next_Count--;
	});

	var engineArr = [];
	$("#page9").on({
		"pagebeforeshow" : function() {
			$("#page9 #pageTitle").html('Verify the engines');
			$("#page9 .next_p_btn").hide();
			$.each($("#page9 .engine img"), function() {
				$(this).attr('src', $(this).attr('src').replace('_o', ''));
				$(this).attr('src', $(this).attr('src').replace('_s', ''));
			});
			if (engineArr.length == 3)
				$("#page9 .pageTitle").html('Verify the engines');
			engineArr = [];
		},
		"pageshow" : function() {

		}
	});

	$("#page9 .engine img").click(function(e) {
		if (engineArr.join('') != '111' && !engineArr[parseInt($(this).attr('alt'))]) {
			$(this).attr('src', $(this).attr('src').replace('.png', '_o.png'));
			engineArr[parseInt($(this).attr('alt'))] = '1';

			if (engineArr.join('') == '111')
				$("#page9 .pageTitle").html('Pick one which is your favorite');

		}
		else if (engineArr.join('') == '111') {
			$.each($("#page9 .engine img"), function() {
				$(this).attr('src', $(this).attr('src').replace('_s', '_o'));
				$(this).removeClass('active');
			});
			$(this).attr('src', $(this).attr('src').replace('_o.png', '_s.png'));
			$(this).addClass('active');
			
			$("#page9 .next_p_btn").show();
		}
	});

	$("#page10").on({
		"pagebeforeshow" : function() {

			$.ajax({
				url:"/pd/common/engine_json.php",
				type: "POST",
				dataType: "json",
				data:{
				},
				success:  function(json){
					$("#page10 .graphObj").eq(0).attr('alt',json.val1);
					$("#page10 .graphObj").eq(1).attr('alt',json.val2);
					$("#page10 .graphObj").eq(2).attr('alt',json.val3);

					$("#page10 .graphObj").eq(0).text(json.val1+"%");
					$("#page10 .graphObj").eq(1).text(json.val2+"%");
					$("#page10 .graphObj").eq(2).text(json.val3+"%");
				},
			   error : function(xhr, status, error) {
					console.log(error);
			   }
			});

		},
		"pageshow" : function() {
			$.each($("#page10 .graphObj"), function() {
				var tmpRate = $(this).attr('alt');
				$(this).animate({'width':tmpRate +'%'});
			});
		}
	});

	$("#page12").on({
		"pagebeforeshow" : function() {
			$("#page12 .textbox, #page12 #go_back, #page12 .next_p_btn").hide();
			$("#textbox12_1, #page12 #go_next1").show();
		},
		"pageshow" : function() {
			next_Count = 1;
		}
	});

	$("#page12 #go_next1").click(function() {
		if (next_Count == 1) {
			$("#page12 .textbox, #page12 #go_next1").hide();
			$("#textbox12_2, #page12 #go_back, #page12 .next_p_btn").show();
			//$('#page12').css({"background":"url(../images/day3/21_photo.jpg)", "background-size":"auto 100%"});
			$('#page12').queue(function() {
				$(this).css({"background-image":"url(../images/day3/21_photo.jpg)", "background-size":"100% auto"}).dequeue();
			});
		}
		next_Count++;
	});

	$("#page12 #go_back").click(function(e) {
		if (next_Count == 1) {

		} else if (next_Count == 2) {
			$(this).hide();
			$("#textbox12_1, #page12 #go_next1").show();
			$("#textbox12_2, #page12 .next_p_btn").hide();
			$('#page12').queue(function() {
				$(this).css({"background-image":"url(../images/day3/20_photo.jpg)", "background-size":"100% auto"}).dequeue();
			});
		}
		next_Count--;
	});

	$("#page13").on({
		"pagebeforeshow" : function() {
			$("#page13 .imgwrap, #page13 .next_p_btn").hide();
			$("#page13 .next_finger").show();
			$('#page13 .next_finger img').css({'width':'167px'});
			$("#page13 .next_finger").css({'top':'13%', 'left':'47%'});
			$('#page13').css({"background-image":"url(../images/day3/22_image.jpg)", "background-size":"100% auto"});
		},
		"pageshow" : function() {
			next_Count = 1;
		}
	});

	$("#page13 .next_finger").click(function() {
		if (next_Count == 1) {
			$('#page13 .next_finger img').css({'width':'100px'});
			$('#page13').css({"background-image":"url(../images/day3/09_bg.jpg)", "background-size":"100% auto"});
			$("#page13 .imgwrap").fadeIn();
			$('#page13 .car13 img').prop('src', '../images/day3/23_image.png');
			$("#page13 .next_finger").animate({'top':'30%', 'left':'44%'});
			next_Count++;
		}
		else if (next_Count == 2) {
			$('#page13 .car13 img').prop('src', '../images/day3/24_image.png');
			$('#page13 .table13').append('<tr><td>977mm</td><td><img src="../images/day3/24_numbering.png" alt="" /></td><td>971mm</td></tr>');
			$("#page13 .next_finger").animate({'top':'48%', 'left':'30%'});
			next_Count++;
		}
		else if (next_Count == 3) {
			$('#page13 .car13 img').prop('src', '../images/day3/25_image.png');
			$('#page13 .table13').append('<tr><td>1073mm</td><td><img src="../images/day3/25_numbering.png" alt="" /></td><td>1074mm</td></tr>');
			$("#page13 .next_finger").animate({'top':'48%', 'left':'41%'});
			next_Count++;
		}
		else if (next_Count == 4) {
			$('#page13 .car13 img').prop('src', '../images/day3/26_image.png');
			$('#page13 .table13').append('<tr><td>883mm</td><td><img src="../images/day3/26_numbering.png" alt="" /></td><td>882mm</td></tr>');
			$("#page13 .next_finger").hide();
			$("#page13 .next_p_btn").show();
			next_Count++;
		}
		//$(this).hide();



	});

	$("#page16").on({
		"pagebeforeshow" : function() {
		},
		"pageshow" : function() {
		}
	});

	$("#page17").on({
		"pagebeforeshow" : function() {
			$("#page17 #textbox2, #page17 .view_text").hide();
			$("#page17 .textwrap").show();
			$('#page17 .ui-content').queue(function() {
				$(this).css({"background":"url(../images/day3/30_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
			});
		},
		"pageshow" : function() {
			$("#page17 .next_finger").delay(500).fadeIn(500);
		}
	});

	$("#page17 .next_finger").click(function() {
		$(this).hide();
		$('#page17 .ui-content')
			.delay(500)
			.fadeOut()
			.queue(function() {
				$(this).css({"background-image":"url(../images/day3/31_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
			})
			.fadeIn(500)
			.animate({ backgroundSize: '120%' }, 800);
		$("#page17 .textwrap").hide();
		$("#page17 .view_text").delay(2000).fadeIn();
	});

	$("#page18").on({
		"pagebeforeshow" : function() {
			$('#page18 .next_p_btn, #page18 #go_back, #page18 .textbox').hide();
			$("#textbox18_1, #page18 #go_next1").show();
			$('#page18 .page_bg').css({"background":"url(../images/day3/33_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"101% auto"});
		},
		"pageshow" : function() {
			next_Count = 1;
		}
	});

	$("#page18 #go_next1").click(function(e) {
		if (next_Count == 1) {
			$('#page18 .page_bg')
			.fadeOut()
			.queue(function() {
				$(this).css({"background":"url(../images/day3/32_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
			})
			.fadeIn(500);
			$("#page18 #go_back").fadeIn();
			$("#page18 .textbox").hide();
			$("#textbox18_2").show();
		} else if (next_Count == 2) {
			$('#page18 .page_bg')
			.fadeOut()
			.queue(function() {
				$(this).css({"background":"url(../images/day3/34_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
			})
			.fadeIn(500);
			$("#page18 #go_next1, #page18 .textbox").hide();
			$("#page18 .next_p_btn, #page18 #textbox18_3").show();
		}
		next_Count++;
	});


	$("#page18 #go_back").click(function(e) {
		if (next_Count == 1) {

		} else if (next_Count == 2) {
			$(this).hide();
			$('#page18 .page_bg')
			.fadeOut()
			.queue(function() {
				$(this).css({"background":"url(../images/day3/33_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
			})
			.fadeIn(500);
			$("#page18 .textbox, #page18 .next_p_btn").hide();
			$("#textbox18_1").show();
		} else if (next_Count == 3) {
			$('#page18 #go_next1').show()
			$('#page18 .page_bg')
			.fadeOut()
			.queue(function() {
				$(this).css({"background":"url(../images/day3/32_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
			})
			.fadeIn(500);
			$("#page18 .textbox, #page18 .next_p_btn").hide();
			$("#textbox18_2").show();
		}
		next_Count--;
	});

	$("#page26").on({
		"pagebeforeshow" : function(){
			$("#page26 #textbox2, #page26 #go_back, #page26 .next_p_btn").hide();
			$("#page26 #textbox1, #page26 #go_next1").show();
		}, 
		"pageshow" : function(){
			next_Count = 1;
		}
	});

	$("#page26 #go_next1").click(function(){
		if(next_Count == 1){
		    $("#page26 #textbox1, #page26 #go_next1").hide();
		    $("#page26 #textbox2, #page26 #go_back, #page26 .next_p_btn").show();
		} 
		next_Count++;
	});

	$("#page26 #go_back").click(function(e){
		if(next_Count == 1){
			
		} else if(next_Count == 2){
			$(this).hide();
			$("#page26 #textbox1, #page26 #go_next1").show();
			$("#page26 #textbox2, #page26 .next_p_btn").hide();
		}
		next_Count--;
	});

	$("#page28").on({
		"pagebeforeshow" : function() {
			$("#page28 .textwrap, #page28 .textbox, #page28 .next_p_btn").hide();
			$("#page28 .start_text").show();
		},
		"pageshow" : function() {
		}
	});
	$("#page28 .imgwrap").click(function() {
		$("#page28 .textwrap, #page28 .start_text, #textbox28_1, #page28 .next_p_btn").toggle();
	});

	$("#page30").on({
		"pagebeforeshow" : function() {
			$("#page30 .textwrap, #page30 .textbox, #page30 .next_p_btn").hide();
			$("#page30 .start_text").show();
		},
		"pageshow" : function() {
		}
	});
	$("#page30 .imgwrap").click(function() {
		$("#page30 .textwrap, #page30 .start_text, #textbox30_1, #page30 .next_p_btn").toggle();
	});

	$("#page32").on({
		"pagebeforeshow" : function() {
			$("#page32 .textwrap, #page32 .textbox, #page32 .next_p_btn").hide();
			$("#page32 .start_text").show();
		},
		"pageshow" : function() {
		}
	});
	$("#page32 .imgwrap").click(function() {
		$("#page32 .textwrap, #page32 .start_text, #textbox32_1, #page32 .next_p_btn").toggle();
	});

	$("#page34").on({
		"pagebeforeshow" : function() {
			$("#page34 .textwrap, #page34 .textbox, #page34 .next_p_btn").hide();
			$("#page34 .start_text").show();
		},
		"pageshow" : function() {
		}
	});
	$("#page34 .imgwrap").click(function() {
		$("#page34 .textwrap, #page34 .start_text, #textbox34_1, #page34 .next_p_btn").toggle();
	});

	$("#page36").on({
		"pagebeforeshow" : function() {
			$("#page36 .textwrap, #page36 .textbox, #page36 #go_back, #page36 .next_p_btn").hide();
			$("#page36 #go_next1").show();
		},
		"pageshow" : function() {
			next_Count = 1;
		}
	});
	$("#page36 .imgwrap").click(function() {
		$("#page36 .textwrap, #page36 .start_text, #textbox36_1").toggle();
	});

	$("#page36 #go_next1").click(function() {
		if (next_Count == 1) {
			$("#page36 .textbox").hide();
			$("#textbox36_2, #page36 #go_next1, #page36 #go_back").show();
			$('#page36 .page_bg').fadeOut().queue(function() {
				$(this).css({"background-image":"url(../images/day3/58_photo.jpg)", "background-size":"100% auto"}).dequeue()
				.fadeIn(500);
			});
		}
		else if (next_Count == 2) {
			$("#page36 .textbox, #page36 #go_next1").hide();
			$("#textbox36_3, #page36 #go_back, #page36 .next_p_btn").show();
			$('#page36 .page_bg').fadeOut().queue(function() {
				$(this).css({"background-image":"url(../images/day3/59_photo.jpg)", "background-size":"100% auto"}).dequeue()
				.fadeIn(500);
			});
		}
		next_Count++;
	});

	$("#page36 #go_back").click(function(e) {
		if (next_Count == 1) {
			$(this).hide();
			$("#page36 .textbox, #page36 #go_back, #page36 .next_p_btn").hide();
			$("#textbox36_1, #page36 #go_next1").show();
			$('#page36 .page_bg').fadeOut().queue(function() {
				$(this).css({"background-image":"url(../images/day3/56_photo.jpg)", "background-size":"100% auto"}).dequeue()
				.fadeIn(500);
			});
		}
		else if (next_Count == 2) {
			$(this).hide();
			$("#page36 .textbox, #page36 .next_p_btn").hide();
			$("#textbox36_2, #page36 #go_back, #page36 #go_next1").show();
			$('#page36 .page_bg').fadeOut().queue(function() {
				$(this).css({"background-image":"url(../images/day3/58_photo.jpg)", "background-size":"100% auto"}).dequeue()
				.fadeIn(500);
			});
		}
		next_Count--;
	});

	$("#page37").on({
		"pagebeforeshow" : function() {
			$("#page37 .next_finger").hide()
		},
		"pageshow" : function() {
			$("#page37 .next_finger").delay(500).fadeIn(500);
		}
	});

	$("#page38").on({
		"pagebeforeshow" : function() {
			$("#page38 .textwrap span").css({'background':'#DCDCDC', 'color':'#000'});

			$("#page38 .textwrap span").each(function(idx,obj){
				$(obj).removeClass('choice');
			});
		},
		"pageshow" : function() {
			//$("#page38 .next_finger").delay(500).fadeIn(500);

			$("#page38 .textwrap span").each(function(idx,obj){
				$(obj).removeClass('choice');
			});

		}
	});

	$("#page38 .textwrap span").click(function(e) {
		$(this).css({'background':'#012C5F', 'color':'#FFF'});
		//location.href = "#page39";
		$(this).addClass('choice');

		var HY_LMS_SEQ = $("input[name=SESSION_LMS_SEQ]").val();
		var CHOICE = "";
		
		$("#page38 .textwrap span").each(function(idx,obj){
			if($(obj).hasClass('choice')){
				if(idx == 0){
					CHOICE = 1;
				} else if(idx == 1){
					CHOICE = 2;
				} else if(idx == 2){
					CHOICE = 3;
				} else if(idx == 3){
					CHOICE = 4;
				} else if(idx == 4){
					CHOICE = 5;
				}

			}
		});

			
		$.ajax({
			url:"/pd/common/choice_high_tech.php",
			type: "POST",
			dataType: "json",
			data:{
				HY_LMS_SEQ: HY_LMS_SEQ,
				CHOICE: CHOICE,
			},
			success:  function(json){			
				//console.log(json);
				if(json.result == 'success'){
					$.mobile.changePage("#page39");
				}
			},
		   error : function(xhr, status, error) {
				//console.log(error);
		   }
		});
		


		//$.mobile.changePage("#page39");
	});

	$("#page39").on({
		"pagebeforeshow" : function() {
		},
		"pageshow" : function() {
			


			$.ajax({
				url:"/pd/common/high_tech_json.php",
				type: "POST",
				dataType: "json",
				data:{
				},
				success:  function(json){
					$("#page39 #page39ChartNum1").text(json.val2 + "%");
					$("#page39 #page39ChartNum2").text(json.val1 + "%");
					$("#page39 #page39ChartNum3").text(json.val3 + "%");
					$("#page39 #page39ChartNum4").text(json.val5 + "%");
					$("#page39 #page39ChartNum5").text(json.val4 + "%");

					var options = {
						'legend':{
							names: [],
							hrefs: []
								},
						'dataset': {
							title: 'Web accessibility status',
							values: [[json.val4,json.val5,json.val3,json.val1,json.val2]],
							bgColor: '#f9f9f9',
							fgColor: '#0f76c0'
						},
						'chartDiv': 'page39Chart',
						'chartType': 'radar',
						'chartSize': {width:600, height:300}
					};
					
					Nwagon.chart(options);
				},
			   error : function(xhr, status, error) {
					console.log(error);
			   }
			});

			//Nwagon.chart(options);
		}
	});

	$("#page41").on({
		"pagebeforeshow" : function() {
			$("#page41 #textbox2, #page41 .view_text").hide();
			$("#page41 .textwrap").show();
			$('#page41 .ui-content').queue(function() {
				$(this).css({"background":"url(../images/day3/65_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
			});
		},
		"pageshow" : function() {
			$("#page41 .next_finger").delay(500).fadeIn(500);
		}
	});

	$("#page41 .next_finger").click(function() {
		$(this).hide();
		$('#page41 .ui-content')
			.delay(500)
			.fadeOut()
			.queue(function() {
				$(this).css({"background-image":"url(../images/day3/66_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
			})
			.fadeIn(500)
			.animate({ backgroundSize: '120%' }, 800);
		$("#page41 .textwrap").hide();
		$("#page41 .view_text").delay(2000).fadeIn();
	});

	$("#page42").on({
		"pagebeforeshow" : function() {
			$('#page42 .next_p_btn, #page42 #go_back, #page42 .textbox').hide();
			$("#textbox42_1, #page42 #go_next1").show();
			$('#page42 .page_bg').css({"background":"url(../images/day3/67_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"101% auto"});
		},
		"pageshow" : function() {
			next_Count = 1;
		}
	});

	$("#page42 #go_next1").click(function(e) {
		if (next_Count == 1) {
			$('#page42 .page_bg')
			.fadeOut()
			.queue(function() {
				$(this).css({"background":"url(../images/day3/68_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
			})
			.fadeIn(500);
			$("#page42 #go_back").fadeIn();
			$("#page42 .textbox").hide();
			$("#textbox42_2").show();
		} else if (next_Count == 2) {
			$('#page42 .page_bg')
			.fadeOut()
			.queue(function() {
				$(this).css({"background":"url(../images/day3/69_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"101% auto"}).dequeue();
			})
			.fadeIn(500);
			$("#page42 #go_next1, #page42 .textbox").hide();
			$("#page42 .next_p_btn, #page42 #textbox42_3").show();
		}
		next_Count++;
	});


	$("#page42 #go_back").click(function(e) {
		if (next_Count == 1) {

		} else if (next_Count == 2) {
			$(this).hide();
			$('#page42 .page_bg')
			.fadeOut()
			.queue(function() {
				$(this).css({"background":"url(../images/day3/67_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
			})
			.fadeIn(500);
			$("#page42 .textbox, #page42 .next_p_btn").hide();
			$("#textbox42_1").show();
		} else if (next_Count == 3) {
			$('#page42 #go_next1').show()
			$('#page42 .page_bg')
			.fadeOut()
			.queue(function() {
				$(this).css({"background":"url(../images/day3/68_photo.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
			})
			.fadeIn(500);
			$("#page42 .textbox, #page42 .next_p_btn").hide();
			$("#textbox42_2").show();
		}
		next_Count--;
	});

	$("#page45").on({
		"pagebeforeshow" : function() {
			$('#page45 .textwrap, #page45 .imgwrap, #page45 .start_text, #page45 .imgKey, #page45 .imgArrow, #page45 .next_finger, #page45 .next_p_btn').hide();
		},
		"pageshow" : function() {
			$('#page45 .imgKey, #page45 .next_finger').fadeIn();
		}
	});

	$("#page45 .next_finger").click(function() {
		$('#page45 .page_bg').fadeOut().queue(function() {
			$('#imgArrow1').animate({'top':'17%'}, 'slow');
			$('#imgArrow2').animate({'top':'17%', 'left':'73%'}, 'slow');
			$("#page45 .imgwrap, #page45 .start_text").show();
			$(this).css({"background":"url(../images/day3/74_i30.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue().queue(function() {
				$(this).css({"background":"url(../images/day3/75_i30.jpg)","background-repeat":"no-repeat","background-position":"50% 50%", "background-size":"100% auto"}).dequeue();
			});
		}).fadeIn(500);
		$(this).hide();
		$("#page45 .imgKey").hide();
		$("#page45 .imgArrow").show();
	});

	$("#page45 .imgwrap").click(function() {
		$("#page45 .textwrap, #page45 .start_text, #page45 .next_p_btn").toggle();
	});

	$("#page48 textarea").click(function() {
		if ($(this).val() == 'Please enter TEXT.')
			$(this).val('');
	});

	$("#page48 .bye_btn").click(function(){	
		//location.href="/pd/timeline_view.php";
	});

	//다음페이지로 이동막기
	$(".go-next").click(function(e) {
		if ($(this).hasClass("stopPage")) {
		e.preventDefault();
		}
	});

	//rotate btn
	$(".btn_device").click(function() {
		if ($("#mokup, #wrap.mobile").hasClass("landscape")) {
			$("#mokup, #wrap.mobile").removeClass("landscape");
		} else {
			$("#mokup, #wrap.mobile").addClass("landscape");
		}
	});

	$(window).bind("orientationchange", function(e) {
	   var orientation = window.orientation;
	   var nowPageId = $.mobile.activePage.attr("id");

	   if (window.orientation == 0) {
		  //alert("portrait")
	   }else{
		  //alert("landscape")
	   }
	});
});
