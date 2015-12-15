var order = JSON.parse($('#OrderJSON').html());
var template = '{{#OrderItems}}<div class="row" id="TableItem"><div class="col-xs-1">{{quantity}}</div><div class="col-xs-5 col-xs-offset-1"><b>{{name}}</b></div><div class="col-xs-2">${{price}}</div><div class="col-xs-1 col-xs-offset-1"><span id="removeButton" class="glyphicon glyphicon glyphicon-remove-sign padding_1"></div><br></div>{{/OrderItems}}';
var comp = "r3kt"

renderTable();

function renderTable(){
	$('#OrderTable').html(Mustache.render(template, {OrderItems : order.items}));
	registerButtons();
}

function registerButtons(){
	$("span[id^='removeButton']").each(function(){
		var hammer = new Hammer(this, "");
		var ObjectCache = $(this).parent();

		var price = ObjectCache.prev().html().replace("$", "");
		var name = ObjectCache.prev().prev().html().replace("<b>", "").replace("</b>", "");
		var quantity = ObjectCache.prev().prev().prev().html();

		hammer.on("tap", function(){
			for(var i = 0; i < order.items.length; i++){
				var orderQuantity = order.items[i].quantity;
				if((price == order.items[i].price) && (name == order.items[i].name) && (quantity == orderQuantity)){
					orderQuantity--;
					order.items[i].quantity = orderQuantity;
					if(orderQuantity < 1){
						order.items.splice(i,1);
					}
					renderTable();
					$.post('php/ajax.php', {'OrderJSON': JSON.stringify(order)}, function(data, textStatus, xhr) {});
					break;
				}
			}
		})
	});
}

$('#time').datetimepicker({
	inline: true,
	sideBySide: true,
	format: 'LT'
});

$('#consumerNo').mask('999-9999', {placeholder:"#"});