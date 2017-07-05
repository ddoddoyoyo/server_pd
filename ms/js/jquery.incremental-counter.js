/*
 Plugin Name: jQuery plugin incremental counter
 Plugin URI: https://github.com/MikhaelGerbet/jquery-incremental-counter
 Description: jQuery plugin incremental counter is a simple counter animated
 Author: GERBET Mikhael
 Author URI: https://github.com/MikhaelGerbet
 License: MIT
 */

(function($){
    $.fn.incrementalCounter = function(options){
        //default options
        var defauts = {
                "digits": 4
            },
            pad = function(n, width, z) {
                z = z || '0';
                n = n + '';
                return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
            },
            start = function(element){

                var current_value = parseInt($(element).data('current_value')),
                    end_value = $(element).data('end_value'),
                    current_speed = 20;

                if (end_value - current_value < 5){
                    current_speed = 200;
                    current_value += 1;
                } else if(end_value - current_value < 15){
                    current_speed = 50;
                    current_value += 1
                } else if(end_value - current_value < 50){
                    current_speed = 25;
                    current_value += 3
                } else{
                    current_speed = 25;
                    current_value += parseInt((end_value - current_value)/24)
                }

				if(current_value == end_value){
					//console.log(element);
					if(element.parent("div").attr("class") == "rpm_count"){
						element.children(".counter-unit").delay(500).fadeIn(500);
						element.parent("div").next(".rpm_num").delay(500).animate({"opacity":"1"}, 500);
						$("#rpm_wrap .textwrap").delay(1000).fadeIn(500);
						$("#rpm_wrap .counter_wrap").delay(1000).animate({"bottom":"0"}, 500);
						$("#go_page16").delay().fadeIn(1000);
					} else if(element.parent("div").attr("class") == "torque_count"){
						element.children(".counter-unit").delay(500).fadeIn(500);
						$("#torque_wrap .textwrap").delay(1000).fadeIn(500);
						$("#torque_wrap .counter_wrap").delay(1000).animate({"bottom":"30%"}, 500);
						$("#page17 .go-next.stopPage").delay().fadeIn(500);
					} else if(element.parent("div").attr("class") == "kg_count"){
						if(element.parents(".container").attr("id") == "page19"){
							$("#go_page20").fadeIn(500);
						} else if(element.parents(".container").attr("id") == "page20"){
							$("#go_page21").fadeIn(500);
						}
					} else if(element.parents(".container").attr("id") == "page13"){


					}
				}

                $(element).data({
                    current_value:current_value
                });

                if(current_speed){
                    setTimeout(function(){
                        display($(element),current_value);
                    },current_speed);
                }else{
                    display($(element),current_value);
                }
            },
            display = function(element,value){
                var padedNumber = pad(value, element.data('digits')),
                    exp = padedNumber.split(""),
                    end_value = $(element).data('end_value'),
                    nums = $(element).find('.num');
                $(exp).each(function(i,e){
                    $(nums[i]).text(exp[i]);
                });

                if(end_value != value){
                    start(element);
                }
            },
        //merge options
            options = $.extend(defauts, options);

        this.each(function(index,element){

            var default_digits = options.digits ,
                digits =  element.getAttribute('data-digits') ?  element.getAttribute('data-digits') : default_digits ,
                end_value = parseInt( element.getAttribute('data-value'));

            digits = digits === 'auto' || digits < String(end_value).length ? String(end_value).length : digits;

            //get value
            $(element).data({
                current_value : 0,
                end_value : end_value,
                digits : digits,
                current_speed : 0
            });

            //add number container
            for(var i=0 ; i < digits ; i++){
				if($(element).parent("div").attr("class") == "rpm_count"){
					if(i == 2){
						$(element).append('<div class="num">0</div><div class="counter-unit" style="display:none;"><span class="pointColor">ps</span></div>');
						$("#page16 .counter-unit").hide();
					} else {
						$(element).append('<div class="num">0</div>');
					}
				} else if($(element).parent("div").attr("class") == "torque_count"){
					if(i == 2){
						$(element).append('<div class="counter-point"><span class="pointColor">.</span></div><div class="num">0</div><div class="counter-unit" style="display:none;"><span class="pointColor">kg&middot;m</span></div>');
						$("#page18 .counter-unit").hide();
					} else {
						$(element).append('<div class="num">0</div>');
					}
				} else if($(element).parent("div").attr("class") == "ps_count"){
					if(i == 2){
						if($(element).parents(".container").attr("id") == "page19"){
							$(element).append('<div class="num">0</div><div class="counter-unit"><span class="pointColor">ps</span> at 6,000 rpm</div>');
						} else if($(element).parents(".container").attr("id") == "page20"){
							$(element).append('<div class="num">0</div><div class="counter-unit"><span class="pointColor">ps</span> at 6,000 rpm</div>');
						}
					} else {
						$(element).append('<div class="num">0</div>');
					}
				} else if($(element).parent("div").attr("class") == "kg_count"){
					if(i == 2){
						if($(element).parents(".container").attr("id") == "page19"){
							$(element).append('<div class="counter-point"><span class="pointColor">.</span></div><div class="num">0</div><div class="counter-unit"><span class="pointColor">kg&middot;m</span> at 5,000 rpm</div>');
						} else if($(element).parents(".container").attr("id") == "page20"){
							$(element).append('<div class="counter-point"><span class="pointColor">.</span></div><div class="num">0</div><div class="counter-unit"><span class="pointColor">kg&middot;m</span> at 5,000 rpm</div>');
						}
					} else {
						$(element).append('<div class="num">0</div>');
					}
				} else if($(element).parent("div").attr("class") == "cont_top"){
					if(i == 2){
						$(element).append('<div class="num">1</div><div class="counter-unit" style="display:none;"><span class="pointColor">ps</span></div>');
						//$("#page16 .counter-unit").hide();
					} else {
						$(element).append('<div class="num">1</div>');
					}
				} else if($(element).parent("div").attr("class") == "incr_count")	{

					$(element).append('<div class="num"></div>');
				} else {

					$(element).append('<div class="num"></div>');
				}
            }

            start($(element));

        });
        return this;
    };
})(jQuery);
