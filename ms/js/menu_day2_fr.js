$(document).ready(function(){

	var sidePanel = "<div class='sidePanel_wrap'><div class='sidePanel'><a href='#' class='btn_close'><img src='../images/button/btn_close.png' alt=''></a><ul class='menu_list'>";
		sidePanel += "<li id='day1'><a href='javascript:;' id='go_day1'><span class='day_arrow'>Jour 1.</span><ul class='sub_menu1'><li id='milan'><span>Milan</span><ul class='sub_menu2'>";//day1 miano
		sidePanel += "<li>CARROSSERIE</li>";
		sidePanel += "<li>SUSPENSION</li>";
		sidePanel += "<li>EXTÉRIEUR</li>";
		sidePanel += "</ul></li><li id='como'><span>Côme</span><ul class='sub_menu2'>";//day1 como
		sidePanel += "<li>HIGH BEAM ASSIST</li>";
		sidePanel += "<li>INTÉRIEUR</li>";
		sidePanel += "</ul></li></ul></a></li>";//day1 end


		sidePanel += "<li id='day2'><a href='javascript:;' id='go_day2'><span>Jour 2.</span></a><ul class='sub_menu1'><li id='stelvio'><a href='#page57'><span>Col du Stelvio</span></a><ul class='sub_menu2'>";//day2 stelvio
		sidePanel += "<li><a href='#page61'>MOTEUR</a></li>";
		sidePanel += "<li><a href='#page63001'>7 DCT</a></li>";
		sidePanel += "<li><a href='#page65'>SUSPENSION 2</a></li>";
		sidePanel += "<li><a href='#page66'>CARROSSERIE 2</a></li>";
		sidePanel += "</ul></li><li id='zurich'><a href='#page73'><span>Zurich</span></a><ul class='sub_menu2'>";//day2 Zurich
		sidePanel += "<li><a href='#page79'>ESPACE</a></li>";
		sidePanel += "<li><a href='#page84'>CONNECTIVITÉ</a></li>";
		sidePanel += "</ul></li></ul></li>";//day2 end


		sidePanel += "<li id='day3'><a href='javascript:;' id='go_day3'><span class='day_arrow'>Jour 3.</span><ul class='sub_menu1'><li id='bern'><span>Berne</span><ul class='sub_menu2'>";//day3 bern
		sidePanel += "<li>AÉRODYNAMIQUEC</li>";
		sidePanel += "<li>NVH</li>";
		sidePanel += "<li>MOTEUR 2</li>";
		sidePanel += "<li>DIMENSION</li>";
		sidePanel += "</ul></li><li id='strasbourg'><span>Strasbourg</span><ul class='sub_menu2'>";//day3 strasbourg
		sidePanel += "<li>TOIT OUVRANT</li>";
		sidePanel += "<li>ADAS</li>";
		sidePanel += "<li><a href='#page45'>FENÊTRE À DISTANCE</a></li>";
		sidePanel += "<li>TIME LINE</li>";
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
		location.href="../fr/day1.php";
	});

	$("a#go_day3").click(function(){
		location.href="../fr/day3.php";
	});


});

	
