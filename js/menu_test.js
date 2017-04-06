$(document).ready(function(){

	var sidePanel = "<div class='sidePanel_wrap'><div class='sidePanel'><a href='#' class='btn_close'><img src='../images/button/btn_close.png' alt=''></a><ul class='menu_list'>";
	sidePanel += "<li id='day1'><span>Day1</span><ul class='sub_menu1'><li id='milan'><span><a href='/pd/en/day2.php' id='go_stelvio' data-ajax='false'>Passo della stelvio</a></span><ul class='sub_menu2'>";//day1 miano
	sidePanel += "<li>ENGINE</li>";
	sidePanel += "<li>TRANSMISSION(DCT)</li>";
	sidePanel += "<li>SUSPENSION 2</li>";
	sidePanel += "<li>BODY FRAME 2</li>";
	sidePanel += "</ul></li><li id='como'><span>Zurich</span><ul class='sub_menu2'>";//day1 como
	sidePanel += "<li><a href='#page79'></a>SPACE</li>";
	sidePanel += "<li><a href='#page84'></a>CONNECTIVITY</li>";
	sidePanel += "</ul></li></ul></li>";//day1 end
	sidePanel += "<li id='day2'><span>Day2</span><ul class='sub_menu1'><li id='stelvio'><span>Somewhere</span><ul class='sub_menu2'>";//day2 passodella stelvio
	sidePanel += "<li>SUBTITLE</li>";
	sidePanel += "<li>SUBTITLE</li>";
	sidePanel += "<li>SUBTITLE</li>";
	sidePanel += "<li>SUBTITLE</li>";
	sidePanel += "</ul></li><li id='zurich'><span>Somewhere</span><ul class='sub_menu2'>";//day2 zurich
	sidePanel += "<li>SUBTITLE</li>";
	sidePanel += "<li>SUBTITLE</li>";
	sidePanel += "</ul></li></ul></li>";//day2 end
	sidePanel += "<li id='day3'><span>Day3</span><ul class='sub_menu1'><li id='bern'><span>Somewhere</span><ul class='sub_menu2'>";//day3 bern
	sidePanel += "<li>SUBTITLE</li>";
	sidePanel += "<li>SUBTITLE</li>";
	sidePanel += "<li>SUBTITLE</li>";
	sidePanel += "<li>SUBTITLE</li>";
	sidePanel += "<li>SUBTITLE</li>";
	sidePanel += "</ul></li><li id='Strasbourg'><span>Somewhere</span><ul class='sub_menu2'>";//day3 strasbourg
	sidePanel += "<li>SUBTITLE</li>";
	sidePanel += "<li>SUBTITLE</li>";
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


	$("a#go_stelvio").click(function(){	
		//$.mobile.changePage("/pd/en/day2.php","fade");	
		location.href="/pd/en/day2.php#page57";	
	});
	

	// $("#page104 #go_page105").click(function(){	
	// location.href="/pc_pd/app/en/day3.html#page3";	
	
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
// $(document).on('pagecreate',function(){
// 	$("#go_stelvio").click(function(e){	
// 		//location.href="/pd/en/day2.php#page57";
// 		var href =$(this).attr('href');
// 		e.preventDefault();
// 		$.mobile.changePage(href);
// 	});
// });
	
