$(document).ready(function(){

		var sidePanel = "<div class='sidePanel_wrap'><div class='sidePanel ru'><a href='#' class='btn_close'><img src='../images/button/btn_close.png' alt=''></a><ul class='menu_list'>";
		sidePanel += "<li id='day1'><a href='#page7'><span>ДЕНЬ1.</span></a><ul class='sub_menu1'><li id='milan'><a href='#page6'><span>Милан</span></a><ul class='sub_menu2'>";//day1 miano
		sidePanel += "<li><a href='#page13'>РАМА КУЗОВА</a></li>";
		sidePanel += "<li><a href='#page22'>ПОДВЕСКА</a></li>";
		sidePanel += "<li><a href='#page28'>ЭКСТЕРЬЕР</a></li>";
		sidePanel += "</ul></li><li id='como'><a href='#page37'><span>Комо</span></a><ul class='sub_menu2'>";//day1 como
		sidePanel += "<li><a href='#page40'>HIGH BEAM ASSIST</a></li>";
		sidePanel += "<li><a href='#page45'>ИНТЕРЬЕР</a></li>";
		sidePanel += "</ul></li></ul></li>";//day1 end


		sidePanel += "<li id='day2'><a href='javascript:;' id='go_day2'><span class='day_arrow'>ДЕНЬ2.</span><ul class='sub_menu1'><li id='stelvio'><span>Перевал Стельвио</span><ul class='sub_menu2'>";//day2 stelvio
		sidePanel += "<li>ДВИГАТЕЛЬ</li>";
		sidePanel += "<li>7 DCT</li>";
		sidePanel += "<li>ПОДВЕСКА</li>";
		sidePanel += "<li>РАМА КУЗОВА</li>";
		sidePanel += "</ul></li><li id='zurich'><span>Цюрих</span><ul class='sub_menu2'>";//day2 Zurich
		sidePanel += "<li>ПРОСТРАНСТВО</li>";
		sidePanel += "<li>СОВМЕСТИМОСТЬ</li>";
		sidePanel += "</ul></li></ul></a></li>";//day2 end


		sidePanel += "<li id='day3'><a href='javascript:;' id='go_day3'><span class='day_arrow'>ДЕНЬ3.</span><ul class='sub_menu1'><li id='bern'><span>Берн</span><ul class='sub_menu2'>";//day3 bern
		sidePanel += "<li>АЭРОДИНАМИКА</li>";
		sidePanel += "<li>NVH</li>";
		sidePanel += "<li>ДВИГАТЕЛЬ</li>";
		sidePanel += "<li>РАЗМЕРЫ</li>";
		sidePanel += "</ul></li><li id='strasbourg'><span>Страсбург</span><ul class='sub_menu2'>";//day3 strasbourg
		sidePanel += "<li>ЛЮК</li>";
		sidePanel += "<li>ADAS</li>";
		sidePanel += "<li>ДИСТАНЦИОННЫЕ ОКНА</li>";
		sidePanel += "<li>ВРЕМЕННАЯ ЛИНИЯ</li>";
		sidePanel += "</ul></li></ul></a></li>";//day3 end
		$("section.container").append(sidePanel);

	/* side panel */
	$(".btn_sidePanel").click(function(){
		$(this).parents("section.container").find(".sidePanel_wrap").show();
		$(this).parents("section.container").find(".sidePanel").animate({"left":"0"}, 500);

	});

	$(".sidePanel_wrap").click(function(){
		$(this).children(".sidePanel").animate({"left":"105%"}, 500);
		$(this).fadeOut(500);
		//$(this).children(".sidePanel").fadeOut(500);
	});


	$("a#go_day2").click(function(){
		location.href="../ru/day2.php";
	});

	$("a#go_day3").click(function(){
		location.href="../ru/day3.php";
	});

	// $("a#time_line").click(function(){
	// 	location.href="../timeline_view.php";
	// });
	
});
	
