$(document).ready(function(){

	var sidePanel = "<div class='sidePanel_wrap'><div class='sidePanel ru'><a href='#' class='btn_close'><img src='../images/button/btn_close.png' alt=''></a><ul class='menu_list'>";
		sidePanel += "<li id='day1'><a href='javascript:;' id='go_day1'><span class='day_arrow'>ДЕНЬ1.</span><ul class='sub_menu1'><li id='milan'><span>Милан</span><ul class='sub_menu2'>";//day1 miano
		sidePanel += "<li>РАМА КУЗОВА</li>";
		sidePanel += "<li>ПОДВЕСКА</li>";
		sidePanel += "<li>ЭКСТЕРЬЕР</li>";
		sidePanel += "</ul></li><li id='como'><span>Комо</span><ul class='sub_menu2'>";//day1 como
		sidePanel += "<li>HIGH BEAM ASSIST</li>";
		sidePanel += "<li>ИНТЕРЬЕР</li>";
		sidePanel += "</ul></li></ul></a></li>";//day1 end


		sidePanel += "<li id='day2'><a href='javascript:;' id='go_day2'><span class='day_arrow'>ДЕНЬ2.</span><ul class='sub_menu1'><li id='stelvio'><span>Перевал Стельвио</span><ul class='sub_menu2'>";//day2 stelvio
		sidePanel += "<li>ДВИГАТЕЛЬ</li>";
		sidePanel += "<li>7 DCT</li>";
		sidePanel += "<li>ПОДВЕСКА</li>";
		sidePanel += "<li>РАМА КУЗОВА</li>";
		sidePanel += "</ul></li><li id='zurich'><span>Цюрих</span><ul class='sub_menu2'>";//day2 Zurich
		sidePanel += "<li>ПРОСТРАНСТВО</li>";
		sidePanel += "<li>СОВМЕСТИМОСТЬ</li>";
		sidePanel += "</ul></li></ul></a></li>";//day2 end


		sidePanel += "<li id='day3'><a href='#pageStart'><span>ДЕНЬ3.</span></a><ul class='sub_menu1'><li id='bern'><a href='#page0'><span>Берн</span></a><ul class='sub_menu2'>";//day3 bern
		sidePanel += "<li><a href='#page3'>АЭРОДИНАМИКА</a></li>";
		sidePanel += "<li><a href='#page6'>NVH</a></li>";
		sidePanel += "<li><a href='#page9'>ДВИГАТЕЛЬ</a></li>";
		sidePanel += "<li><a href='#page13'>РАЗМЕРЫ</a></li>";
		sidePanel += "</ul></li><li id='strasbourg'><a href='#page2101'><span>Страсбург</span></a><ul class='sub_menu2'>";//day3 strasbourg
		sidePanel += "<li><a href='#page22'>ЛЮК</a></li>";
		sidePanel += "<li><a href='#page28'>ADAS</a></li>";
		sidePanel += "<li><a href='#page45'>ДИСТАНЦИОННЫЕ ОКНА</a></li>";
		sidePanel += "<li><a id='time_line' href='javascript:;'>ВРЕМЕННАЯ ЛИНИЯ</a></li>";
		sidePanel += "</ul></li></ul></li>";//day3 end
		$("section.container").append(sidePanel);

	/* side panel */
	$(".btn_sidePanel").click(function(){
		$(this).parents("section.container").find(".sidePanel_wrap").show();
		$(this).parents("section.container").find(".sidePanel").animate({"left":"0%"}, 500);
	});

	$(".sidePanel_wrap").click(function(){
		$(this).children(".sidePanel").animate({"left":"105%"}, 500);
		$(this).fadeOut(500);
		//$(this).children(".sidePanel").fadeOut(500);
	});

	$("a#go_day1").click(function(){
		location.href="../ru/day1.php";
	});

	$("a#go_day2").click(function(){
		location.href="../ru/day2.php";
	});

	$("a#time_line").click(function(){
		location.href="../ms/timeline_view.php";
	});
});

	
