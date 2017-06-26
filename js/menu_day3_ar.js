$(document).ready(function(){

	var sidePanel = "<div class='sidePanel_wrap'><div class='sidePanel'><a href='#' class='btn_close'><img src='../images/button/btn_close.png' alt=''></a><ul class='menu_list'>";
		sidePanel += "<li id='day1'><a href='javascript:;' id='go_day1'><span class='day_arrow'>اليوم الأول</span><ul class='sub_menu1'><li id='milan'><span>ميلانو</span><ul class='sub_menu2'>";//day1 miano
		sidePanel += "<li>إطار الهيكل</li>";
		sidePanel += "<li>التعليق</li>";
		sidePanel += "<li>الهيكل الخارجي</li>";
		sidePanel += "</ul></li><li id='como'><span>كومو</span><ul class='sub_menu2'>";//day1 como
		sidePanel += "<li>هاي بيم أسيست</li>";
		sidePanel += "<li>الداخلية</li>";
		sidePanel += "</ul></li></ul></a></li>";//day1 end


		sidePanel += "<li id='day2'><a href='javascript:;' id='go_day2'><span class='day_arrow'>اليوم الثاني</span><ul class='sub_menu1'><li id='stelvio'><span>ممر ستلفيو</span><ul class='sub_menu2'>";//day2 stelvio
		sidePanel += "<li>محرك توربو</li>";
		sidePanel += "<li>7 DCT</li>";
		sidePanel += "<li>التعليق</li>";
		sidePanel += "<li>إطار الهيكل</li>";
		sidePanel += "</ul></li><li id='zurich'><span>زيورخ</span><ul class='sub_menu2'>";//day2 Zurich
		sidePanel += "<li>مساحة</li>";
		sidePanel += "<li>الربط</li>";
		sidePanel += "</ul></li></ul></a></li>";//day2 end


		sidePanel += "<li id='day3'><a href='#pageStart'><span>اليوم الثالث</span></a><ul class='sub_menu1'><li id='bern'><a href='#page0'><span>برن</span></a><ul class='sub_menu2'>";//day3 bern
		sidePanel += "<li><a href='#page3'>أيروديناميك</a></li>";
		sidePanel += "<li><a href='#page6'>NVH</a></li>";
		sidePanel += "<li><a href='#page9'>محرك</a></li>";
		sidePanel += "<li><a href='#page13'>البعد</a></li>";
		sidePanel += "</ul></li><li id='strasbourg'><a href='#page2101'><span>ستراسبورغ</span></a><ul class='sub_menu2'>";//day3 strasbourg
		sidePanel += "<li><a href='#page22'>فتحة سقف</a></li>";
		sidePanel += "<li><a href='#page28'>ADAS</a></li>";
		sidePanel += "<li><a href='#page45'>ريموت ويندو</a></li>";
		sidePanel += "<li><a id='time_line' href='javascript:;'>الخط الزمني</a></li>";
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
		location.href="/pd/ar/day1.php";
	});

	$("a#go_day2").click(function(){
		location.href="/pd/ar/day2.php";
	});

	$("a#time_line").click(function(){
		location.href="/pd/timeline_view.php";
	});
});

	
