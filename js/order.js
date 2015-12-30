var order = {};
var combos = [];
var sides = [];
var combosTemplate = '{{#ComboItems}}<div class="row" id="combo_item{{comboID}}"><div class="col-xs-12 col-xs-offset-0 bg_4"><div class="row padding_10"><div class="col-xs-1 text-center"><br><span id="badge_" class="badge_r padding_1">{{quantity}}</span></div><div id="order_image" class="col-xs-3"><img src="{{image}}" /></div><div class="col-xs-5"><b>{{name}}</b><br><i>{{details}}</i></div><div class="col-xs-2 w"><br>${{price}}</div></div></div></div><br>{{/ComboItems}}';
var sidesTemplate = '{{#SidesItems}}<div class="row" id="side_item{{sideID}}"><div class="col-xs-12 col-xs-offset-0 bg_4"><div class="row padding_10"><div class="col-xs-2 text-center"><br><span id="badge_" class="badge_r padding_1">{{quantity}}</span></div><div class="col-xs-5 col-xs-offset-0 padding_10"><h4>{{name}}</h4>{{#details}}<i>{{details}}</i>{{/details}}</div><div class="col-xs-3 text-center w padding_20">${{price}}</div></div></div></div><br>{{/SidesItems}}';

order.items = [];
getData();

function getData(){
	$.post('php/ajax.php', {action: 'getSides'}, function(data, textStatus, xhr) {
		sides = $.parseJSON(data);
		if(combos && sides){ 
			render();
		}
	});
	$.post('php/ajax.php', {action: 'getCombos'}, function(data, textStatus, xhr) {
		combos = $.parseJSON(data);
		if(combos && sides){ 
			render();
		}
	});
	$.post('php/ajax.php', {action: 'getOrders'}, function(data, textStatus, xhr) {
		if(data.length){
			order = $.parseJSON(data);
			if(combos && sides){ 
				render();
			}
		}
	});
}

function registerButtons(){
	$("div[id^='combo_item']").each(function(){
		var id = parseInt(this.id.replace("combo_item", ""), 10);
		var hammerTime = new Hammer(this, "");
		hammerTime.on("press", function(){
			var OrderObject = {};
			var ObjectCache = $('#combo_item' + id).children().first().children().first().children();
			var titleDetails = ObjectCache.first().next().next();
			var quantity = parseInt(ObjectCache.first().html().replace('<br><span id="badge_" class="badge_r padding_1"', '').replace('</span>', '').replace('style="display: none;"','').replace('>', "").replace(" ", ""), 10);

			OrderObject.name = titleDetails.children().first().html();
			OrderObject.details = titleDetails.children().first().next().next().html();
			OrderObject.price = titleDetails.next().html().replace("<br>$", "");
			OrderObject.img = ObjectCache.first().next().html().replace('<img src="','').replace('">','');
			OrderObject.quantity = quantity;
			OrderObject.type = "Combo";
			OrderObject.ID = id;

			if(order.items){
				for(var i = 0; i < order.items.length; i++){
					if(JSON.stringify(OrderObject) === JSON.stringify(order.items[i])){
						order.items.splice(i,1);
						break;
					}
				}
			}
			quantity++;
			ObjectCache.first().html('<br><span id="badge_" class="badge_r padding_1">'+ quantity + '</span>');

			OrderObject.quantity = quantity;
			order.items.push(OrderObject);
			//alert(JSON.stringify(order));
		});
	});

	$("div[id^='side_item']").each(function(){
		var id = parseInt(this.id.replace("side_item", ""), 10);
		var hammerTime = new Hammer(this, "");
		hammerTime.on("press", function(){
			var OrderObject = {};
			var ObjectCache = $('#side_item' + id).children().first().children().first().children();
			var titleDetails = ObjectCache.first().next();
			var quantity = parseInt(ObjectCache.first().html().replace('<br><span id="badge_" class="badge_r padding_1"', '').replace('</span>', '').replace('style="display: none;"','').replace('>', "").replace(" ", ""), 10);

			OrderObject.name = titleDetails.children().first().html();
			if((titleDetails.children().first().next() != null) && (typeof(titleDetails.children().first().next()) != 'undefined')){
				OrderObject.details = titleDetails.children().first().next().html();
			}
			OrderObject.price = titleDetails.next().html().replace("<br>$", "").replace("$","");
			OrderObject.quantity = quantity;
			OrderObject.type = "Side";
			OrderObject.ID = id;

			if(order.items){
				for(var i = 0; i < order.items.length; i++){
					if(JSON.stringify(OrderObject) === JSON.stringify(order.items[i])){
						order.items.splice(i,1);
						break;
					}
				}
			}
			quantity++;
			ObjectCache.first().html('<br><span id="badge_" class="badge_r padding_1">'+ quantity + '</span>');

			OrderObject.quantity = quantity;
			order.items.push(OrderObject);
			//alert(JSON.stringify(order));
		});
	});
}

$('#ResetButton').on("click", function(){
	  $.ajax({
	  	cache: false,
	  	method: "POST",
	    url: 'php/ajax.php', 
	    data: {action:'clearOrderJSON'},
	    complete: function() {
	      	order = {};
	      	order.items = [];
	      	for(var o in combos){
	      		combos[o].quantity = 0;
	      	}
	      	for(var o in sides){
	      		sides[o].quantity = 0;
	      	}
			render();
	    }
	});
});

$('#ConfirmButton').on("click", function(){
	$.post('php/ajax.php', {'OrderJSON': JSON.stringify(order), 'action': 'updateOrderJSON'}, function(data, textStatus, xhr) {
		$(location).attr('href','cart.php');
	});
});

function render(){
	$('#CombosUI').html(Mustache.render(combosTemplate, {ComboItems : combos}));
	$('#SidesUI').html(Mustache.render(sidesTemplate, {SidesItems :  sides}));
	registerButtons();
	hidebadge();
}

function hidebadge(){
	var value_badge = $("span[id^='badge_']").each(function(){
		if ($(this).html() === "0") {
				$(this).hide();
		}
	});
}