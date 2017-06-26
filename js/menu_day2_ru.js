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


		sidePanel += "<li id='day2'><a href='javascript:;' id='go_day2'><span>ДЕНЬ2.</span></a><ul class='sub_menu1'><li id='stelvio'><a href='#page57'><span>Перевал Стельвио</span></a><ul class='sub_menu2'>";//day2 stelvio
		sidePanel += "<li><a href='#page61'>ДВИГАТЕЛЬ</a></li>";
		sidePanel += "<li><a href='#page63001'>7 DCT</a></li>";
		sidePanel += "<li><a href='#page65'>ПОДВЕСКА</a></li>";
		sidePanel += "<li><a href='#page66'>РАМА КУЗОВА</a></li>";
		sidePanel += "</ul></li><li id='zurich'><a href='#page73'><span>Цюрих</span></a><ul class='sub_menu2'>";//day2 Zurich
		sidePanel += "<li><a href='#page79'>ПРОСТРАНСТВО</a></li>";
		sidePanel += "<li><a href='#page84'>СОВМЕСТИМОСТЬ</a></li>";
		sidePanel += "</ul></li></ul></li>";//day2 end


		sidePanel += "<li id='day3'><a href='javascript:;' id='go_day3'><span class='day_arrow'>ДЕНЬ3.</span><ul class='sub_menu1'><li id='bern'><span>Bern</span><ul class='sub_menu2'>";//day3 bern
		sidePanel += "<li>АЭРОДИНАМИКА</li>";
		sidePanel += "<li>NVH</li>";
		sidePanel += "<li>ДВИГАТЕЛЬ</li>";
		sidePanel += "<li>РАЗМЕРЫ</li>";
		sidePanel += "</ul></li><li id='strasbourg'><span>Страсбург</span><ul class='sub_menu2'>";//day3 strasbourg
		sidePanel += "<li>ЛЮК</li>";
		sidePanel += "<li>ADAS</li>";
		sidePanel += "<li>ДИСТАНЦИОННЫЕ ОКНА</a></li>";sidePanel += "<li>ВРЕМЕННАЯ ЛИНИЯ</li>";
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

	$("a#go_day1").click(function(){
		location.href="/pd/ru/day1.php";
	});

	$("a#go_day3").click(function(){
		location.href="/pd/ru/day3.php";
	});


});

	
