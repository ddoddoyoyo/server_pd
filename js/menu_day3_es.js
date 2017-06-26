$(document).ready(function(){

	var sidePanel = "<div class='sidePanel_wrap'><div class='sidePanel'><a href='#' class='btn_close'><img src='../images/button/btn_close.png' alt=''></a><ul class='menu_list'>";
		sidePanel += "<li id='day1'><a href='javascript:;' id='go_day1'><span class='day_arrow'>DÍA 1.</span><ul class='sub_menu1'><li id='milan'><span>MILÁN</span><ul class='sub_menu2'>";//day1 miano
		sidePanel += "<li>CARROCERÍA</li>";
		sidePanel += "<li>SUSPENSIÓN</li>";
		sidePanel += "<li>EXTERIOR</li>";
		sidePanel += "</ul></li><li id='como'><span>COMO</span><ul class='sub_menu2'>";//day1 como
		sidePanel += "<li>HIGH BEAM ASSIST</li>";
		sidePanel += "<li>INTERIOR</li>";
		sidePanel += "</ul></li></ul></a></li>";//day1 end


		sidePanel += "<li id='day2'><a href='javascript:;' id='go_day2'><span class='day_arrow'>DÍA 2.</span><ul class='sub_menu1'><li id='stelvio'><span>PASO STELVIO</span><ul class='sub_menu2'>";//day2 stelvio
		sidePanel += "<li>MOTOR</li>";
		sidePanel += "<li>7 DCT</li>";
		sidePanel += "<li>SUSPENSIÓN 2</li>";
		sidePanel += "<li>CARROCERÍA 2</li>";
		sidePanel += "</ul></li><li id='zurich'><span>ZÚRICH</span><ul class='sub_menu2'>";//day2 Zurich
		sidePanel += "<li>PORTAEQUIPAJE</li>";
		sidePanel += "<li>CONECTIVIDAD</li>";
		sidePanel += "</ul></li></ul></a></li>";//day2 end


		sidePanel += "<li id='day3'><a href='#pageStart'><span>DÍA 3.</span></a><ul class='sub_menu1'><li id='bern'><a href='#page0'><span>BERNA</span></a><ul class='sub_menu2'>";//day3 bern
		sidePanel += "<li><a href='#page3'>AERODINÁMICA</a></li>";
		sidePanel += "<li><a href='#page6'>NVH</a></li>";
		sidePanel += "<li><a href='#page9'>MOTOR 2</a></li>";
		sidePanel += "<li><a href='#page13'>DIMENSIÓN</a></li>";
		sidePanel += "</ul></li><li id='strasbourg'><a href='#page2101'><span>ESTRASBURGO</span></a><ul class='sub_menu2'>";//day3 strasbourg
		sidePanel += "<li><a href='#page22'>QUEMACOCOS</a></li>";
		sidePanel += "<li><a href='#page28'>ADAS</a></li>";
		sidePanel += "<li><a href='#page45'>VENTANA CON REMOTO</a></li>";
		sidePanel += "<li><a href='#time_line'>LÍNEA DE TIEMPO</a></li>";
		sidePanel += "</ul></li></ul></li>";//day3 end
		$("section.container").append(sidePanel);

	/* side panel */
	$(".btn_sidePanel").click(function(){
		$(this).parents("section.container").find(".sidePanel_wrap").show();
		$(this).parents("section.container").find(".sidePanel").animate({"left":"0%"}, 500);
		// var pageNum = $(this).parents(".container").attr("id").replace("page", "");
		// if(pageNum > 1 && pageNum < 8 && pageNum == 001 && pageNum == 101 && pageNum == 102){
		// 	$(this).parents(".container").find(".sidePanel").children(".menu_list").children(".menu1").addClass("current");
		// } else if(pageNum > 7 && pageNum < 14){
		// 	$(this).parents(".container").find(".sidePanel").children(".menu_list").children(".menu1-1").addClass("current");
		// }else if(pageNum > 13 && pageNum < 32 && pageNum == 130){
		// 	$(this).parents(".container").find(".sidePanel").children(".menu_list").children(".menu2").addClass("current");
		// } else if(pageNum > 31 && pageNum < 39){
		// 	$(this).parents(".container").find(".sidePanel").children(".menu_list").children(".menu3").addClass("current");
		// } else if(pageNum > 38 && pageNum < 51){
		// 	$(this).parents(".container").find(".sidePanel").children(".menu_list").children(".menu4").addClass("current");
		// } else if(pageNum > 50 && pageNum < 73){
		// 	$(this).parents(".container").find(".sidePanel").children(".menu_list").children(".menu5").addClass("current");
		// }

	});

	$(".sidePanel_wrap").click(function(){
		$(this).children(".sidePanel").animate({"left":"105%"}, 500);
		$(this).fadeOut(500);
		//$(this).children(".sidePanel").fadeOut(500);
	});

	$("a#go_day1").click(function(){
		location.href="/pd/en/day1.php";
	});

	$("a#go_day2").click(function(){
		location.href="/pd/en/day2.php";
	});

	$("a#time_line").click(function(){
		location.href="/pd/timeline_view.php";
	});
});

	
