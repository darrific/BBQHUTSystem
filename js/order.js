var order = {};
var combosTemplate = '{{#ComboItems}}<div class="row" id="combo_item{{comboID}}"><div class="col-xs-12 col-xs-offset-0 bg_4"><div class="row padding_20"><div class="col-xs-1 text-center"><br><span id="badge_" class="badge_r padding_1">{{quantity}}</span></div><div id="order_image" class="col-xs-3"><img src="{{image}}" /></div><div class="col-xs-5"><b>{{name}}</b><br><i>{{details}}</i></div><div class="col-xs-2 w"><br>${{price}}</div></div></div></div>{{/ComboItems}}';
var sidesTemplate = '{{#SidesItems}}<div class="row" id="side_item{{sideID}}"><div class="col-xs-12 col-xs-offset-0 bg_4"><div class="row padding_20"><div class="col-xs-1 text-center"><br><span id="badge_" class="badge_r padding_1">{{quantity}}</span></div><div class="col-xs-5"><b>{{name}}</b><br>{{#details}}<i>{{details}}</i>{{/details}}</div><div class="col-xs-2 w"><br>${{price}}</div></div></div></div>{{/SidesItems}}';

order.items = [];
if($('#OrderJSON').length){
	order = jQuery.parseJSON($('#OrderJSON').html());
}

render();

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

		for(var i = 0; i < order.items.length; i++){
			if(JSON.stringify(OrderObject) === JSON.stringify(order.items[i])){
				order.items.splice(i,1);
				break;
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
		OrderObject.price = titleDetails.next().html().replace("<br>$", "");
		OrderObject.quantity = quantity;
		OrderObject.type = "Side";
		OrderObject.ID = id;

		for(var i = 0; i < order.items.length; i++){
			if(JSON.stringify(OrderObject) === JSON.stringify(order.items[i])){
				order.items.splice(i,1);
				break;
			}
		}
		quantity++;
		ObjectCache.first().html('<br><span id="badge_" class="badge_r padding_1">'+ quantity + '</span>');

		OrderObject.quantity = quantity;
		order.items.push(OrderObject);
		//alert(JSON.stringify(order));
	});
});

$('#ConfirmButton').on("click", function(){
	$.post('php/ajax.php', {'OrderJSON': JSON.stringify(order), 'action': 'updateOrderJSON'}, function(data, textStatus, xhr) {
		$(location).attr('href','cart.php');
	});
});

function render(){
	$('#CombosUI').html(Mustache.render(combosTemplate, {ComboItems : jQuery.parseJSON($('#ComboJSON').html())}));
	$('#SidesUI').html(Mustache.render(sidesTemplate, {SidesItems : jQuery.parseJSON($('#SidesJSON').html())}));
	hidebadge();
}

function hidebadge(){
	var value_badge = $("span[id^='badge_']").each(function(){
		if ($(this).html() === "0") {
				$(this).hide();
			}
	});
	
}