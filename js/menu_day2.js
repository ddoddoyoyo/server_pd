$(document).ready(function(){

	var sidePanel = "<div class='sidePanel_wrap'><div class='sidePanel'><a href='#' class='btn_close'><img src='../images/button/btn_close.png' alt=''></a><ul class='menu_list'>";
	sidePanel += "<li id='day1'><span>Day1</span><ul class='sub_menu1'><li id='milan'><span>Milan</span><ul class='sub_menu2'>";//day1 miano
	sidePanel += "<li>BODY FRAME</li>";
	sidePanel += "<li>SUSPENSION</li>";
	sidePanel += "<li>EXTERIOR</li>";
	sidePanel += "</ul></li><li id='como'><span>Como</span><ul class='sub_menu2'>";//day1 como
	sidePanel += "<li>HIGH BEAM ASSIST</li>";
	sidePanel += "<li>INTERIOR</li>";
	sidePanel += "</ul></li></ul></li>";//day1 end
	sidePanel += "<li id='day2'><span>Day2</span><ul class='sub_menu1'><li id='stelvio'><span>Passo della stelvio</span><ul class='sub_menu2'>";//day2 passodella stelvio
	sidePanel += "<li>ENGINE</li>";
	sidePanel += "<li>TRANSMISSION(DCT)</li>";
	sidePanel += "<li>SUSPENSION 2</li>";
	sidePanel += "<li>BODY FRAME 2</li>";
	sidePanel += "</ul></li><li id='zurich'><span>Zurich</span><ul class='sub_menu2'>";//day2 zurich
	sidePanel += "<li><a href='#page79'></a>SPACE</li>";
	sidePanel += "<li><a href='#page84'></a>CONNECTIVITY</li>";
	sidePanel += "</ul></li></ul></li>";//day2 end
	sidePanel += "<li id='day3'><span>Day3</span><ul class='sub_menu1'><li id='bern'><span>Bern</span><ul class='sub_menu2'>";//day3 bern
	sidePanel += "<li>AERODYNAMIC</li>";
	sidePanel += "<li>NVH</li>";
	sidePanel += "<li>ENGINE 2</li>";
	sidePanel += "<li>DIMENSION</li>";
	sidePanel += "<li>SUNROOF</li>";
	sidePanel += "</ul></li><li id='Strasbourg'><span>Strasbourg</span><ul class='sub_menu2'>";//day3 strasbourg
	sidePanel += "<li>ADAS</li>";
	sidePanel += "<li>REMOTE WINDOW</li>";
	sidePanel += "</ul></li></ul></li></ul>";//day3 end
	$("section.container").append(sidePanel);

	/* side panel */
	$(".btn_sidePanel").click(function(){
		$(this).parents("section.container").find(".sidePanel_wrap").show();
		$(this).parents("section.container").find(".sidePanel").animate({"left":"9%"}, 500);
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

	// $("#page104 #go_page105").click(function(){	
	// 	location.href="/pc_pd/app/en/day3.html#page2";
	// });

	// $("#page104 #go_page105").click(function(){	
	// 	location.href="/pc_pd/app/en/day3.html#page3";
	// });

	// $("#page104 #go_page105").click(function(){	
	// 	location.href="/pc_pd/app/en/day3.html#page6";
	// });

	// $("#page104 #go_page105").click(function(){	
	// 	location.href="/pc_pd/app/en/day3.html#page9";
	// });

	// $("#page104 #go_page105").click(function(){	
	// 	location.href="/pc_pd/app/en/day3.html#page13";
	// });

	// $("#page104 #go_page105").click(function(){	
	// 	location.href="/pc_pd/app/en/day3.html#page22";
	// });

	// $("#page104 #go_page105").click(function(){	
	// 	location.href="/pc_pd/app/en/day3.html#page0";
	// });


});

	
