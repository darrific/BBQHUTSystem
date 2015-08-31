	var choose_meat = (function(){
		//arrays
		var arr_order_result= []; //was order_result
		var arr_order_no= []; //was order_no
		var arr_edit= []; //was edit_array
		var arr_sizes=[]
		//counters&indexes
		var order_number= 0;
		var it = 0;
		var count= 0;
		var count_total = 1;
		var clicked_size;
		var v_sides_t; //SayaadIsYOUSayaadIsYOUSayaadIsYOUSayaadIsYOUSayaadIsYOU
		var v_total = (v_sides_t + clicked_size)*count_total;
		var cart_counter = 0;
		var iq;
		//cache DOM
		var $mainZebra = $('#order_container'); 
		var $optionsContainer = $mainZebra.find('#options_container'); //was container
		var $reviewContainer = $mainZebra.find('#review_container'); 
		var $leftContainer = $mainZebra.find('#meat_container');
		var $ul = $reviewContainer.find('#order_result');
		var $popup = $mainZebra.find('#edit_content');
		var template = $reviewContainer.find('#order_template').html();
		var $sides = $popup.find('#sides li');
		var $add_5 = $popup.find('.add_5');
		var $popup_total = $popup.find('#value_of_quantity');
		var $cart_count = $('#cart_count');
		var $popupInner = $ul.find('#edit_content');
		var $inner_buttons = $ul.find('#inner_buttons');
		//buttons
		var b_add = $optionsContainer.find('.add'); //was $add
		var b_small_size = $popup.find('#small');
		var b_large_size = $popup.find('#large');
		var b_add1 = $popup.find('#add');
		var b_minus1 = $popup.find('#remove');
		// var b_arrow_down = $inner_buttons.find('#arrow_down');
		// var b_arrow_up = $inner_buttons.find('#arrow_up');

		//bind events
		b_add.on("click", addMeat);
		$ul.delegate('i.del', 'click', deleteMeat);
		b_small_size.on('click', getSize);
		b_large_size.on('click', getSize);
		b_add1.on('click', autoIncrement);
		b_minus1.on('click', autoIncrement);
		$ul.delegate('div.arrows_inner','click', figureOut);
		//
		render();

		function render(){
			$ul.html(Mustache.render(template, {order_result: arr_order_result}));
		}

		function addMeat(evenh){

			var $info = $optionsContainer.find(evenh.target).prev().prev().html();
			arr_order_result.push($info); //pushing the info (eg "Chicken") to the array
			cart_counter++;
			render();
			cartCounter();
			translateOrders();
		}

		function deleteMeat(ed){
			var i;
			var $remove = $(ed.target).closest('.helplol');
			i = $remove.index();
			arr_order_result.splice(i,1);
			editMeatHide();
			cart_counter--;
			render();
			cartCounter();
			undotranslateOrders();
		}

		function figureOut(){
			iq = (this.id);
			arrowToggle();
		}

		function arrowToggle(){
			var popup = $('#edit_content')
			var down = $("#arrow_down")
			var up = $('#arrow_up')
			if (iq === "arrow_down")
			{
				$(down).fadeOut(100);
				$(up).fadeIn(100);
				popup.fadeIn(1000);
			}else
			{
				$(down).fadeIn(100);
				$(up).fadeOut(100);
				popup.fadeOut(10);
			}
		}
		function editMeatHide(){		
			$popup.fadeOut(1000);
		}

		function getSize(){
			clicked_size = (this.id);
			if (clicked_size === "small")
			{
				clicked_size = 35;
			} 
			if(clicked_size === "large")
			{
				clicked_size = 45;
			}
		}

		function translateOrders(){
			if (cart_counter <= 1)
			{
				$leftContainer.velocity({left:'7%'}, 500);
				$reviewContainer.fadeIn(1).velocity({left: '25.5%'},400);
			}
		}

		function undotranslateOrders(){
			if (cart_counter === 0)
			{
				$leftContainer.velocity({left:'30%'}, 500);
				$reviewContainer.delay(100).velocity({left: '0'},400).fadeOut(80);
			}
		}

		function autoIncrement(e){
			var thiss = $(e.target).html();
			if (thiss === "+")
			{
				count_total++;
				$popup_total.text(count_total);
				b_minus1.css('background-color','#111');
			}else if ((thiss === "-")&&(count_total ===1))
			{
				$popup_total.text(count_total);
				b_minus1.css('background-color','#888');
			}else
			{
				count_total--;
				$popup_total.text(count_total);
			}
		}
		function outputTotal(){

		}
		function cartCounter(){
			if (cart_counter >= 1)
				{
					$cart_count.fadeIn(10);
					$cart_count.velocity({top:'12%'},200);
				}
				else
				{
					$cart_count.velocity({top:'-100%'},300);
					$cart_count.fadeOut(500);
				}
			$cart_count.text(cart_counter);
		}

		function alertTest(){
			alert("event fired");
		}
		
	})();