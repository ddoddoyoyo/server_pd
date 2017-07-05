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


		sidePanel += "<li id='day2'><a href='javascript:;' id='go_day2'><span>DÍA 2.</span></a><ul class='sub_menu1'><li id='stelvio'><a href='#page57'><span>PASO STELVIO</span></a><ul class='sub_menu2'>";//day2 stelvio
		sidePanel += "<li><a href='#page61'>MOTOR</a></li>";
		sidePanel += "<li><a href='#page63001'>7 DCT</a></li>";
		sidePanel += "<li><a href='#page65'>SUSPENSIÓN</a></li>";
		sidePanel += "<li><a href='#page66'>CARROCERÍA</a></li>";
		sidePanel += "</ul></li><li id='zurich'><a href='#page73'><span>ZÚRICH</span></a><ul class='sub_menu2'>";//day2 Zurich
		sidePanel += "<li><a href='#page79'>PORTAEQUIPAJE</a></li>";
		sidePanel += "<li><a href='#page84'>CONECTIVIDAD</a></li>";
		sidePanel += "</ul></li></ul></li>";//day2 end


		sidePanel += "<li id='day3'><a href='javascript:;' id='go_day3'><span class='day_arrow'>DÍA 3.</span><ul class='sub_menu1'><li id='bern'><span>BERNA</span><ul class='sub_menu2'>";//day3 bern
		sidePanel += "<li>AERODINÁMICA</li>";
		sidePanel += "<li>NVH</li>";
		sidePanel += "<li>MOTOR 2</li>";
		sidePanel += "<li>DIMENSION</li>";
		sidePanel += "</ul></li><li id='strasbourg'><span>ESTRASBURGO</span><ul class='sub_menu2'>";//day3 strasbourg
		sidePanel += "<li>QUEMACOCOS</li>";
		sidePanel += "<li>ADAS</li>";
		sidePanel += "<li><a href='#page45'>VENTANA CON REMOTO</a></li>";
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

	$("a#go_day1").click(function(){
		location.href="../es/day1.php";
	});

	$("a#go_day3").click(function(){
		location.href="../es/day3.php";
	});


});

	
