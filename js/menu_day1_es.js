$(document).ready(function(){

		var sidePanel = "<div class='sidePanel_wrap'><div class='sidePanel'><a href='#' class='btn_close'><img src='../images/button/btn_close.png' alt=''></a><ul class='menu_list'>";
		sidePanel += "<li id='day1'><a href='#page7'><span>DÍA 1.</span></a><ul class='sub_menu1'><li id='milan'><a href='#page6'><span>MILÁN</span></a><ul class='sub_menu2'>";//day1 miano
		sidePanel += "<li><a href='#page13'>CARROCERÍA</a></li>";
		sidePanel += "<li><a href='#page22'>SUSPENSIÓN</a></li>";
		sidePanel += "<li><a href='#page28'>EXTERIOR</a></li>";
		sidePanel += "</ul></li><li id='como'><a href='#page37'><span>COMO</span></a><ul class='sub_menu2'>";//day1 como
		sidePanel += "<li><a href='#page40'>HIGH BEAM ASSIST</a></li>";
		sidePanel += "<li><a href='#page45'>INTERIOR</a></li>";
		sidePanel += "</ul></li></ul></li>";//day1 end


		sidePanel += "<li id='day2'><a href='javascript:;' id='go_day2'><span class='day_arrow'>DÍA 2.</span><ul class='sub_menu1'><li id='stelvio'><span>PASO STELVIO</span><ul class='sub_menu2'>";//day2 stelvio
		sidePanel += "<li>MOTOR</li>";
		sidePanel += "<li>7 DCT</li>";
		sidePanel += "<li>SUSPENSIÓN</li>";
		sidePanel += "<li>CARROCERÍA</li>";
		sidePanel += "</ul></li><li id='zurich'><span>ZÚRICH</span><ul class='sub_menu2'>";//day2 Zurich
		sidePanel += "<li>PORTAEQUIPAJE</li>";
		sidePanel += "<li>CONECTIVIDAD</li>";
		sidePanel += "</ul></li></ul></a></li>";//day2 end


		sidePanel += "<li id='day3'><a href='javascript:;' id='go_day3'><span class='day_arrow'>DÍA 3.</span><ul class='sub_menu1'><li id='bern'><span>BERNA</span><ul class='sub_menu2'>";//day3 bern
		sidePanel += "<li>AERODINÁMICA</li>";
		sidePanel += "<li>NVH</li>";
		sidePanel += "<li>MOTOR 2</li>";
		sidePanel += "<li>DIMENSIÓN</li>";
		sidePanel += "</ul></li><li id='strasbourg'><span>ESTRASBURGO</span><ul class='sub_menu2'>";//day3 strasbourg
		sidePanel += "<li>QUEMACOCOS</li>";
		sidePanel += "<li>ADAS</li>";
		sidePanel += "<li>VENTANA CON REMOTO</li>";
		sidePanel += "<li>LÍNEA DE TIEMPO</li>";
		sidePanel += "</ul></li></ul></a></li>";//day3 end
		$("section.container").append(sidePanel);

	/* side panel */
	$(".btn_sidePanel").click(function(){
		$(this).parents("section.container").find(".sidePanel_wrap").show();
		$(this).parents("section.container").find(".sidePanel").animate({"left":"0"}, 500);
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


	$("a#go_day2").click(function(){
		location.href="/pd/es/day2.php";
	});

	$("a#go_day3").click(function(){
		location.href="/pd/es/day3.php";
	});

	// $("a#time_line").click(function(){
	// 	location.href="/pd/timeline_view.php";
	// });
	
});
	
