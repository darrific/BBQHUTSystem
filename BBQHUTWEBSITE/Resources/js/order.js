	
	var choose_meat = (function(){
		//arrays
		var orders= []; //was order_result
		//counters&indexes
		var order_number= 0;
		var it = 0;
		var count= 0;
		var count_total = 1;
		var v_sides_t; //SayaadIsYOUSayaadIsYOUSayaadIsYOUSayaadIsYOUSayaadIsYOU
		var v_total = (v_sides_t /*+ clicked_size*/)*count_total;
		var cart_counter = 0;
		var idCounter = 0;
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

		//bind events
		b_add.on("click", addMeat);
		$ul.delegate('i.del', 'click', deleteMeat);
		$ul.delegate('img.innerArrow','click', figureOut);

		//dynamic form events
		function registerEvents(){
			$("input[id^='small']").each(function() {
			  var id = parseInt(this.id.replace("small", ""), 10);
			  var smallRadio = $("#small" + id);
			  var largeRadio = $('#large' + id);
			  smallRadio.on("change", handleSize);
			  largeRadio.on("change", handleSize);
			});

			$("input[id^='siide']").each(function() {
			  var id = parseInt(this.id.replace("Salad", "").replace("siide", "").replace("Fries", "").replace("Potato", "").replace("Wedges", "").replace("Corn", ""), 10);
			  var Salad = $('#siideSalad' + id);
			  var Fries = $('#siideFries' + id);
			  var Potato = $('#siidePotato' + id);
			  var Wedges = $('#siideWedges' + id);
			  var Corn = $('#siideCorn' + id);
			  Salad.on('click', handleSides);
			  Fries.on('click', handleSides);
			  Potato.on('click', handleSides);
			  Wedges.on('click', handleSides);
			  Corn.on('click', handleSides);
			});

			$("span[id^='incrementQuantity']").each(function() {
			  var id = parseInt(this.id.replace("incrementQuantity", ""), 10);
			  var addButton = $('#incrementQuantity' + id);
			  var removeButton = $('#decreaseQuantity' + id);
			  addButton.on('click', handleQuantity);
			  removeButton.on('click', handleQuantity);
			});
		}

		function handleSize(e){
			var sizes = {};
			var id = $('#order_result').find(e.target).parent().parent().parent().prev().prev().prev().html();
			if($('#small' + id).is(':checked')){
				sizes.small = "checked";
				sizes.large = "";
			}else{
				sizes.small = "";
				sizes.large = "checked";
			}
			if(!editOrder("size", id, sizes)){
				alert("An error has occured editing the order.");
			}
		}

		function handleSides(e){
			var sides = {};
			var id = $('#order_result').find(e.target).parent().parent().parent().prev().prev().prev().html();
			$('#siideSalad' + id).is(":checked")? sides.Salad = "checked" : sides.Salad = "";
			$('#siideFries' + id).is(":checked")? sides.Fries = "checked" : sides.Fries = "";
			$('#siidePotato' + id).is(":checked")? sides.Potato = "checked" : sides.Potato = "";
			$('#siideWedges' + id).is(":checked")? sides.Wedges = "checked" : sides.Wedges = "";
			$('#siideCorn' + id).is(":checked")? sides.Corn = "checked" : sides.Corn = "";
			if(!editOrder("sides", id, sides)){
				alert("An error has occured editing the order.");
			}
		}

		function handleQuantity(e){
			var id = $('#order_result').find(e.target).parent().parent().parent().prev().prev().prev().html();
			var quantity = getOrderValue("quantity", id);
			if($('#order_result').find(e.target).is($('#incrementQuantity' + id))){
				quantity++;
			}else{
				if(quantity <= 1){
					if(confirm("Decreasing the quantity further will delete this order, continue?") == true){
						deleteMeat(e);
					}
				}else{
					quantity--;
				}
			}
			if(quantity > 0){
				editOrder("quantity", id, quantity);
				$('#quantityValue' + id).html(quantity);
			}
		}

		function getIdCounter(){
			return idCounter;
		}

		function render(){
			$ul.html(Mustache.render(template, {order_result: orders}));
			registerEvents();
		}

		function addMeat(evenh){
			var $info = $optionsContainer.find(evenh.target).prev().prev().html();
			var Harder = {};
			var defaultSides = 
				{
					Salad : "checked",
					Fries : "checked",
					Potato : "",
					Wedges : "",
					Corn : ""
				}
			Harder.eyedee = getIdCounter();
			Harder.meat = $info;
			if($info == "Chicken"){
				Harder.size = {"small" : "checked", "large" : ""};
//That's what she said. ^
			}
			Harder.sides = defaultSides;
			Harder.quantity = 1;
			orders.push(Harder); 		//pushing the entire goddamn order into the OBJECT array. (Yes Darrien, OB-FUCKING-JECT array.)
//That's also what she said. ^
			cart_counter++;
			idCounter++;
			render();
			cartCounter();
			translateOrders();
		}

		function deleteMeat(ed){
			var i;
			var $remove = $(ed.target).closest('.helplol');
			i = $remove.index();
			orders.splice(i,1);
			editMeatHide();
			cart_counter--;
			render();
			cartCounter();
			undotranslateOrders();
		}

		function figureOut(){
			iq = (this.id);
			il = $(this).parent().parent().next();
			var arrow_down;
			var arrow_up;
			if(iq == "down"){
				arrow_down = $(this);
				arrow_up = $(this).next();
			}else{
				arrow_up = $(this);
				arrow_down = $(this).prev();
			}
			arrowToggle(iq, il, arrow_down, arrow_up);
		}

		function arrowToggle(iq, il, arrow_down, arrow_up){
			if (iq == "down"){
				$(arrow_down).fadeOut(100);
				$(arrow_up).fadeIn(100);
				il.fadeIn(1000);
				iq = "up";
			}else{
				$(arrow_up).fadeOut(100);
				$(arrow_down).fadeIn(100);
				il.fadeOut(10);
				iq = "down";
			}
		}
		function editMeatHide(){		
			$popup.fadeOut(1000);
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

		function getOrderValue(type, id){
			switch(type){
				case "size":
					for(var i in orders){
						if(orders[i].eyedee == id){
							return orders[i].size;
						}
					}
					break;
				case "sides":
					for(var i in orders){
						if(orders[i].eyedee == id){
							return orders[i].sides;
						}
					}
					break;
				case "quantity":
					for(var i in orders){
						if(orders[i].eyedee == id){
							return orders[i].quantity;
						}
					}
					break;
			}
		}

		function editOrder(type, id, value){
			switch(type){
				case "size":
					for(var i in orders){
						if(orders[i].eyedee == id){
							orders[i].size = value;
							return true;
						}
					}
					break;
				case "sides":
					for(var i in orders){
						if(orders[i].eyedee == id){
							orders[i].sides = value;
							return true;
						}
					}
					break;
				case "quantity":
					for(var i in orders){
						if(orders[i].eyedee == id){
							orders[i].quantity = value;
							return true;
						}
					}
					break;
				default:
					return false;
			}
		}

		function calculateTotal(){
			for(var order in orders){
				var quantity = order.quantity;
				var size = order.size; //NOTE: THIS IS NULL IF IT'S NOT CHICKEN!
				for(var side in order.sides){

				}
			}
		}

		function alertTest(){
			alert("event fired");
		}

	})();