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


		sidePanel += "<li id='day2'><a href='javascript:;' id='go_day2'><span>Day2.</span></a><ul class='sub_menu1'><li id='stelvio'><a href='#page57'><span>ممر ستلفيو</span></a><ul class='sub_menu2'>";//day2 stelvio
		sidePanel += "<li><a href='#page61'>محرك توربو</a></li>";
		sidePanel += "<li><a href='#page63001'>7 DCT</a></li>";
		sidePanel += "<li><a href='#page65'>التعليق</a></li>";
		sidePanel += "<li><a href='#page66'>إطار الهيكل</a></li>";
		sidePanel += "</ul></li><li id='zurich'><a href='#page73'><span>زيورخ</span></a><ul class='sub_menu2'>";//day2 Zurich
		sidePanel += "<li><a href='#page79'>مساحة</a></li>";
		sidePanel += "<li><a href='#page84'>الربط</a></li>";
		sidePanel += "</ul></li></ul></li>";//day2 end


		sidePanel += "<li id='day3'><a href='javascript:;' id='go_day3'><span class='day_arrow'>اليوم الثالث</span><ul class='sub_menu1'><li id='bern'><span>برن</span><ul class='sub_menu2'>";//day3 bern
		sidePanel += "<li>أيروديناميك</li>";
		sidePanel += "<li>NVH</li>";
		sidePanel += "<li>محرك</li>";
		sidePanel += "<li>البعد</li>";
		sidePanel += "</ul></li><li id='strasbourg'><span>ستراسبورغ</span><ul class='sub_menu2'>";//day3 strasbourg
		sidePanel += "<li>فتحة سقف</li>";
		sidePanel += "<li>ADAS</li>";
		sidePanel += "<li><a href='#page45'>ريموت ويندو</a></li>";
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
	});

	$("a#go_day1").click(function(){
		location.href="/pd/ar/day1.php";
	});

	$("a#go_day3").click(function(){
		location.href="/pd/ar/day3.php";
	});


});

	
