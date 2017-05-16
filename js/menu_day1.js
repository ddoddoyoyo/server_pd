$(document).ready(function(){

		var sidePanel = "<div class='sidePanel_wrap'><div class='sidePanel'><a href='#' class='btn_close'><img src='../images/button/btn_close.png' alt=''></a><ul class='menu_list'>";
		sidePanel += "<li id='day1'><a href='#page7'><span>Day1.</span></a><ul class='sub_menu1'><li id='milan'><a href='#page6'><span>Milano</span></a><ul class='sub_menu2'>";//day1 miano
		sidePanel += "<li><a href='#page13'>BODY FRAME</a></li>";
		sidePanel += "<li><a href='#page22'>SUSPENSION</a></li>";
		sidePanel += "<li><a href='#page28'>EXTERIOR</a></li>";
		sidePanel += "</ul></li><li id='como'><a href='#page37'><span>Como</span></a><ul class='sub_menu2'>";//day1 como
		sidePanel += "<li><a href='#page40'>HIGH BEAM ASSIST</a></li>";
		sidePanel += "<li><a href='#page45'>INTERIOR</a></li>";
		sidePanel += "</ul></li></ul></li>";//day1 end


		sidePanel += "<li id='day2'><a href='javascript:;' id='go_day2'><span class='day_arrow'>Day2.</span><ul class='sub_menu1'><li id='stelvio'><span>Passo della stelvio</span><ul class='sub_menu2'>";//day2 stelvio
		sidePanel += "<li>ENGINE</li>";
		sidePanel += "<li>7 DCT</li>";
		sidePanel += "<li>SUSPENSION 2</li>";
		sidePanel += "<li>BODY FRAME 2</li>";
		sidePanel += "</ul></li><li id='zurich'><span>Zurich</span><ul class='sub_menu2'>";//day2 Zurich
		sidePanel += "<li>SPACE</li>";
		sidePanel += "<li>CONNECTIVITY</li>";
		sidePanel += "</ul></li></ul></a></li>";//day2 end


		sidePanel += "<li id='day3'><a href='javascript:;' id='go_day3'><span class='day_arrow'>Day3.</span><ul class='sub_menu1'><li id='bern'><span>Bern</span><ul class='sub_menu2'>";//day3 bern
		sidePanel += "<li>AERODYNAMIC</li>";
		sidePanel += "<li>NVH</li>";
		sidePanel += "<li>ENGINE 2</li>";
		sidePanel += "<li>DIMENSION</li>";
		sidePanel += "</ul></li><li id='strasbourg'><span>Strasbourg</span><ul class='sub_menu2'>";//day3 strasbourg
		sidePanel += "<li>SUNROOF</li>";
		sidePanel += "<li>ADAS</li>";
		sidePanel += "<li>REMOTE WINDOW</li>";
		sidePanel += "<li>TIME LINE</li>";
		sidePanel += "</ul></li></ul></a></li>";//day3 end
		$("section.container").append(sidePanel);

	/* side panel */
	$(".btn_sidePanel").click(function(){
		$(this).parents("section.container").find(".sidePanel_wrap").show();
		$(this).parents("section.container").find(".sidePanel").animate({"left":"0"}, 500);
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


	$("a#go_day2").click(function(){
		location.href="/pd/en/day2.php";
	});

	$("a#go_day3").click(function(){
		location.href="/pd/en/day3.php";
	});

	// $("a#time_line").click(function(){
	// 	location.href="/pd/timeline_view.php";
	// });
	
});
	
