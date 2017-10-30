$(document).ready(function(){

		var sidePanel = "<div class='sidePanel_wrap'><div class='sidePanel'><a href='#' class='btn_close'><img src='../images/button/btn_close.png' alt=''></a><ul class='menu_list'>";
		sidePanel += "<li id='day1'><a href='#page7'><span>Jour 1.</span></a><ul class='sub_menu1'><li id='milan'><a href='#page6'><span>Milan</span></a><ul class='sub_menu2'>";//day1 miano
		sidePanel += "<li><a href='#page13'>CARROSSERIE</a></li>";
		sidePanel += "<li><a href='#page22'>SUSPENSION</a></li>";
		sidePanel += "<li><a href='#page28'>EXTÉRIEUR</a></li>";
		sidePanel += "</ul></li><li id='como'><a href='#page37'><span>Côme</span></a><ul class='sub_menu2'>";//day1 como
		sidePanel += "<li><a href='#page40'>HIGH BEAM ASSIST</a></li>";
		sidePanel += "<li><a href='#page45'>INTÉRIEUR</a></li>";
		sidePanel += "</ul></li></ul></li>";//day1 end


		sidePanel += "<li id='day2'><a href='javascript:;' id='go_day2'><span class='day_arrow'>Jour 2.</span><ul class='sub_menu1'><li id='stelvio'><span>Col du Stelvio</span><ul class='sub_menu2'>";//day2 stelvio
		sidePanel += "<li>MOTEUR</li>";
		sidePanel += "<li>7 DCT</li>";
		sidePanel += "<li>SUSPENSION 2</li>";
		sidePanel += "<li>CARROSSERIE 2</li>";
		sidePanel += "</ul></li><li id='zurich'><span>Zurich</span><ul class='sub_menu2'>";//day2 Zurich
		sidePanel += "<li>ESPACE</li>";
		sidePanel += "<li>CONNECTIVITÉ</li>";
		sidePanel += "</ul></li></ul></a></li>";//day2 end


		sidePanel += "<li id='day3'><a href='javascript:;' id='go_day3'><span class='day_arrow'>Jour 3.</span><ul class='sub_menu1'><li id='bern'><span>Berne</span><ul class='sub_menu2'>";//day3 bern
		sidePanel += "<li>AÉRODYNAMIQUEC</li>";
		sidePanel += "<li>NVH</li>";
		sidePanel += "<li>MOTEUR 2</li>";
		sidePanel += "<li>DIMENSION</li>";
		sidePanel += "</ul></li><li id='strasbourg'><span>Strasbourg</span><ul class='sub_menu2'>";//day3 strasbourg
		sidePanel += "<li>TOIT OUVRANT</li>";
		sidePanel += "<li>ADAS</li>";
		sidePanel += "<li>FENÊTRE À DISTANCE</li>";
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


	$("a#go_day2").click(function(){
		location.href="../fr/day2.php";
	});

	$("a#go_day3").click(function(){
		location.href="../fr/day3.php";
	});

	// $("a#time_line").click(function(){
	// 	location.href="/pd/timeline_view.php";
	// });
	
});
	
