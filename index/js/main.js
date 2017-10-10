$(document).ready(function(){

	$("section").on({
		"pagebeforeshow" : function(){
			$(".subcont_lang").css({'top':'100%'});
		}
	});

	$(".subcontent.sub_lang").click(function(){
		$(".subcont_lang").animate({'top':'0'},500);
	});

	$(".close").click(function(){
		$(".subcont_lang").animate({'top':'100%'},500);
		return false;
		$(".subcont_lang").css({'top':'100%'});
	});

	$(".i30_ksp").click(function(){
		document.location.href="/pd/ms/";
	});

	$(".i30_lang_en").click(function(){
		document.location.href="http://www.onlinehta.com/pd/sg/en/";
	});

	$(".i30_lang_ar").click(function(){
		document.location.href="http://www.onlinehta.com/pd/sg/ar/";
	});

	$(".i30_lang_fr").click(function(){
		document.location.href="http://www.onlinehta.com/pd/sg/fr/";
	});

	$(".i30_lang_es").click(function(){
		document.location.href="http://www.onlinehta.com/pd/sg/es/";
	});
});
