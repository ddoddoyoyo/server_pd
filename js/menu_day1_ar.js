$(document).ready(function(){

		var sidePanel = "<div class='sidePanel_wrap'><div class='sidePanel'><a href='#' class='btn_close'><img src='../images/button/btn_close.png' alt=''></a><ul class='menu_list'>";
		sidePanel += "<li id='day1'><a href='#page7'><span>اليوم الأول</span></a><ul class='sub_menu1'><li id='milan'><a href='#page6'><span>ميلانو</span></a><ul class='sub_menu2'>";//day1 miano
		sidePanel += "<li><a href='#page13'>إطار الهيكل</a></li>";
		sidePanel += "<li><a href='#page22'>التعليق</a></li>";
		sidePanel += "<li><a href='#page28'>الهيكل الخارجي</a></li>";
		sidePanel += "</ul></li><li id='como'><a href='#page37'><span>كومو</span></a><ul class='sub_menu2'>";//day1 como
		sidePanel += "<li><a href='#page40'>هاي بيم أسيست</a></li>";
		sidePanel += "<li><a href='#page45'>الداخلية</a></li>";
		sidePanel += "</ul></li></ul></li>";//day1 end


		sidePanel += "<li id='day2'><a href='javascript:;' id='go_day2'><span class='day_arrow'>اليوم الثاني</span><ul class='sub_menu1'><li id='stelvio'><span>ممر ستلفيو</span><ul class='sub_menu2'>";//day2 stelvio
		sidePanel += "<li>محرك توربو</li>";
		sidePanel += "<li>7 DCT</li>";
		sidePanel += "<li>التعليق</li>";
		sidePanel += "<li>إطار الهيكل</li>";
		sidePanel += "</ul></li><li id='zurich'><span>زيورخ</span><ul class='sub_menu2'>";//day2 Zurich
		sidePanel += "<li>مساحة</li>";
		sidePanel += "<li>الربط</li>";
		sidePanel += "</ul></li></ul></a></li>";//day2 end


		sidePanel += "<li id='day3'><a href='javascript:;' id='go_day3'><span class='day_arrow'>اليوم الثالث</span><ul class='sub_menu1'><li id='bern'><span>برن</span><ul class='sub_menu2'>";//day3 bern
		sidePanel += "<li>أيروديناميك</li>";
		sidePanel += "<li>NVH</li>";
		sidePanel += "<li>محرك</li>";
		sidePanel += "<li>البعد</li>";
		sidePanel += "</ul></li><li id='strasbourg'><span>ستراسبورغ</span><ul class='sub_menu2'>";//day3 strasbourg
		sidePanel += "<li>فتحة سقف</li>";
		sidePanel += "<li>ADAS</li>";
		sidePanel += "<li>ريموت ويندو</li>";
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
		location.href="/pd/ar/day2.php";
	});

	$("a#go_day3").click(function(){
		location.href="/pd/ar/day3.php";
	});

	// $("a#time_line").click(function(){
	// 	location.href="/pd/timeline_view.php";
	// });
	
});
	
