$(document).ready(function(){

	var sidePanel = "<div class='sidePanel_wrap'><div class='sidePanel'><a href='#' class='btn_close'><img src='../images/button/btn_close.png' alt=''></a><ul class='menu_list'>";
		sidePanel += "<li id='day1'><a href='javascript:;' id='go_day1'><span class='day_arrow'>1. Gün</span><ul class='sub_menu1'><li id='milan'><span>Milano</span><ul class='sub_menu2'>";//day1 miano
		sidePanel += "<li>GÖVDE YAPISI</li>";
		sidePanel += "<li>SÜSPANSİYON</li>";
		sidePanel += "<li>DIŞ TASARIM</li>";
		sidePanel += "</ul></li><li id='como'><span>Como Gölü</span><ul class='sub_menu2'>";//day1 como
		sidePanel += "<li>HBA</li>";
		sidePanel += "<li>İÇ TASARIM</li>";
		sidePanel += "</ul></li></ul></a></li>";//day1 end


		sidePanel += "<li id='day2'><a href='javascript:;' id='go_day2'><span class='day_arrow'>2. Gün</span><ul class='sub_menu1'><li id='stelvio'><span>Stelvio Geçidi</span><ul class='sub_menu2'>";//day2 stelvio
		sidePanel += "<li>MOTOR</li>";
		sidePanel += "<li>7 DCT</li>";
		sidePanel += "<li>SÜSPANSİYON</li>";
		sidePanel += "<li>GÖVDE YAPISI</li>";
		sidePanel += "</ul></li><li id='zurich'><span>Zurich</span><ul class='sub_menu2'>";//day2 Zurich
		sidePanel += "<li>BAGAJ ALANI</li>";
		sidePanel += "<li>BAĞLANABİLİRLİK</li>";
		sidePanel += "</ul></li></ul></a></li>";//day2 end


		sidePanel += "<li id='day3'><a href='#pageStart'><span>3. Gün</span></a><ul class='sub_menu1'><li id='bern'><a href='#page0'><span>Bern</span></a><ul class='sub_menu2'>";//day3 bern
		sidePanel += "<li><a href='#page3'>AERODINAMIK</a></li>";
		sidePanel += "<li><a href='#page6'>NVH</a></li>";
		sidePanel += "<li><a href='#page9'>MOTOR</a></li>";
		sidePanel += "<li><a href='#page13'>BOYUT</a></li>";
		sidePanel += "</ul></li><li id='strasbourg'><a href='#page2101'><span>Strasbourg</span></a><ul class='sub_menu2'>";//day3 strasbourg
		sidePanel += "<li><a href='#page22'>CAM TAVAN</a></li>";
		sidePanel += "<li><a href='#page28'>SÜRÜŞ YARDIMI</a></li>";
		sidePanel += "<li><a href='#page45'>CAMLAR</a></li>";
		sidePanel += "<li><a id='time_line' href='javascript:;'>ZAMAN ÇİZELGESİ</a></li>";
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
		location.href="../tr/day1.php";
	});

	$("a#go_day2").click(function(){
		location.href="../tr/day2.php";
	});

	$("a#time_line").click(function(){
		location.href="../timeline_view.php";
	});
});

	
