			var width= $(window).width() * 0.4;
			var animation_speed= 500;

		$("#regular_meals_options li").click(function(tag){
				$("#regular_meals_options li").removeClass("selected_option");
		        var clickt= tag.target;
		        var current_id = clickt.id; //grab currentid eg. rm0 - rm4
		        var ide = current_id.substring(2); //returns id number
	        	$("#regular_meals_images ul").animate({'margin-left': -(width*ide)}, animation_speed);
	        	$("#"+current_id).addClass("selected_option");
	        	var li_option = current_id;
		    });

		$("#combination_meals_options li").click(function(tag2){
				$("#combination_meals_options li").removeClass("selected_option");
		        var clickt2= tag2.target;
		        var current_id2 = clickt2.id; //grab currentid eg. rm0 - rm4
		        var ide2 = current_id2.substring(2); //returns id number
	        	$("#combination_meals_images ul").animate({'margin-left': -(width*ide2)}, animation_speed);
	        	$("#"+current_id2).addClass("selected_option");
	        	var li_option2 = current_id2;
		    });

		$('a[href^="#"]').on('click', function(event) {

			var target = $( $(this).attr('href') );

			if( target.length ) {
    			event.preventDefault();
    			$('html, body').animate({scrollTop: target.offset().top}, 1000);}
			});