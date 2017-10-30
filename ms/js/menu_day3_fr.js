$(document).ready(function(){

	var sidePanel = "<div class='sidePanel_wrap'><div class='sidePanel fr'><a href='#' class='btn_close'><img src='../images/button/btn_close.png' alt=''></a><ul class='menu_list'>";
		sidePanel += "<li id='day1'><a href='javascript:;' id='go_day1'><span class='day_arrow'>Jour 1.</span><ul class='sub_menu1'><li id='milan'><span>Milan</span><ul class='sub_menu2'>";//day1 miano
		sidePanel += "<li>CARROSSERIE</li>";
		sidePanel += "<li>SUSPENSION</li>";
		sidePanel += "<li>EXTÉRIEUR</li>";
		sidePanel += "</ul></li><li id='como'><span>Côme</span><ul class='sub_menu2'>";//day1 como
		sidePanel += "<li>HIGH BEAM ASSIST</li>";
		sidePanel += "<li>INTÉRIEUR</li>";
		sidePanel += "</ul></li></ul></a></li>";//day1 end


		sidePanel += "<li id='day2'><a href='javascript:;' id='go_day2'><span class='day_arrow'>Jour 2.</span><ul class='sub_menu1'><li id='stelvio'><span>Col du Stelvio</span><ul class='sub_menu2'>";//day2 stelvio
		sidePanel += "<li>MOTEUR</li>";
		sidePanel += "<li>7 DCT</li>";
		sidePanel += "<li>SUSPENSION 2</li>";
		sidePanel += "<li>CARROSSERIE 2</li>";
		sidePanel += "</ul></li><li id='zurich'><span>Zurich</span><ul class='sub_menu2'>";//day2 Zurich
		sidePanel += "<li>ESPACE</li>";
		sidePanel += "<li>CONNECTIVITÉ</li>";
		sidePanel += "</ul></li></ul></a></li>";//day2 end


		sidePanel += "<li id='day3'><a href='#pageStart'><span>Jour 3.</span></a><ul class='sub_menu1'><li id='bern'><a href='#page0'><span>Bern</span></a><ul class='sub_menu2'>";//day3 bern
		sidePanel += "<li><a href='#page3'>AÉRODYNAMIQUEC</a></li>";
		sidePanel += "<li><a href='#page6'>NVH</a></li>";
		sidePanel += "<li><a href='#page9'>MOTEUR 2</a></li>";
		sidePanel += "<li><a href='#page13'>DIMENSION</a></li>";
		sidePanel += "</ul></li><li id='strasbourg'><a href='#page2101'><span>Strasbourg</span></a><ul class='sub_menu2'>";//day3 strasbourg
		sidePanel += "<li><a href='#page22'>TOIT OUVRANT</a></li>";
		sidePanel += "<li><a href='#page28'>ADAS</a></li>";
		sidePanel += "<li><a href='#page45'>FENÊTRE À DISTANCE</a></li>";
		sidePanel += "<li><a id='time_line' href='javascript:;'>TIME LINE</a></li>";
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
		location.href="../fr/day1.php";
	});

	$("a#go_day2").click(function(){
		location.href="../fr/day2.php";
	});

	$("a#time_line").click(function(){
		location.href="../timeline_view.php";
	});
});

	
