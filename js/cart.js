var order = JSON.parse($('#OrderJSON').html());
var template = '{{#OrderItems}}<div class="row bg_6 padding_10" id="TableItem"><div class="col-xs-1">{{quantity}}</div><div class="col-xs-5 col-xs-offset-1"><b>{{name}}</b></div><div class="col-xs-2 col-xs-offset-0">${{price}}</div><div class="col-xs-2 col-xs-offset-0"><span id="removeButton" class="rembut">X</div><br></div><br>{{/OrderItems}}';
var now = moment();

now.add(30, "m");
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
					$.post('php/ajax.php', {'OrderJSON': JSON.stringify(order), 'action': 'updateOrderJSON'}, function(data, textStatus, xhr){} );
					break;
				}
			}
		})
	});
}

$('#time').datetimepicker({
	inline: true,
	sideBySide: true,
	format: 'LT',
	useCurrent: true,
	stepping: 5,
	defaultDate: now
});

$('#consumerNo').mask('999-9999', {placeholder:"#"});

$('#placeOrderButton').on("click", function(){
	var name = $('#consumerName').val();
	var number =  $('#consumerNo').val();
	var time = $('#time').data("DateTimePicker").date();
	if(name && number && time){
		order.pickup = time.format("X");
		order.consumerName = name;
		order.phoneNumber = number;
		$.post('php/ajax.php', {'OrderJSON': JSON.stringify(order), 'action': 'sendOrder'}, function(data, textStatus, xhr) {
			alert(data);
		});
	}else{
		alert("You must fill out all of the fields!");
	}
});