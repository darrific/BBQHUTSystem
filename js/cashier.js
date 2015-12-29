var template = '{{#OrderCount}}<div class="row padding_20 bg_7 w"><div class="row"><div class="col-lg-7 col-lg-offset-1"><div class="row"><div class="col-lg-2"><h2>ID: {{id}}</h2></div><div class="col-lg-3"><h3>Name: {{consumerName}}</h3></div><div class="col-lg-3"><h3>PH#: {{phoneNumber}}</h3></div></div><div class="container bg_8"><h4>Breakdown:</h4>{{#items}}<div class="row"><div class="col-lg-1 col-lg-offset-1"><h4>{{quantity}}</h4></div><div class="col-lg-2"><h4>{{name}}</h4></div><div class="col-lg-2"><h4>${{price}}.00</h4></div></div><br>{{/items}}</div></div><br><br><br><br><br><br><div class="col-lg-4"><div class="col-lg-5 col-lg-offset-1"><a href="#"><button id="paidButton" class="btn btn-success btn-block"><h3>Paid</h3></button></a></div><div class="col-lg-5"><a href="#"><button id="deleteButton" class="btn btn-warning btn-block"><h3>Delete</h3></button></a></div></div></div><br><div class="row"><div class="col-lg-2 col-lg-offset-1"><h2 id="totalPrice" class="padding_10"><b>Total: </b></h2></div><div class="col-lg-3"><h2 class="padding_10"><b>Pickup: </b>{{pickup}}</h2></div><div class="col-lg-3"><h2 class="padding_10"><b>Status: </b>{{status}}</h2></div></div></div>{{/OrderCount}}';
var order = [];

updateCashierUI();

function pad(n, width, z) {
  z = z || '0';
  n = n + '';
  return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}

function updateStatus(o, status){
	$.post('php/ajax.php', {action:"updateOrderStatus", status:status, id:o.realID}, function(data, textStatus, xhr) {
		updateCashierUI();
	});
}

function render(){
	$('#injectStuffHere').html(Mustache.render(template, {OrderCount: order}));
	$("h2[id^='totalPrice']").each(function(){
		var id = $(this).parent().parent().parent().parent().children().first().children().first().children().first().children().first().children().first().html().replace("<h2>ID: ","").replace("</h2>","");
		$(this).html("<b>Total: </b>$" + calculateTotal(getOrder(id)) + ".00");
	});
}


function getOrder(id){
	for(var o in order){
		if(order[o].id == id){
			return order[o];
		}
	}
}

function calculateTotal(o){
	var total = 0;
	for(var O in o.items){
		var orderObject = o.items[O];
		total += (parseInt(orderObject.price)*parseInt(orderObject.quantity));
	}
	return total;
}

function registerButtons(){
	$("button[id^='paidButton']").each(function(){
		var id = $(this).parent().parent().parent().parent().children().first().children().first().children().first().html().replace("<h2>ID: ","").replace("</h2>","");
		var hammer = new Hammer(this, "");
		hammer.on("tap", function(){
			updateStatus(getOrder(id), "Paid");
		});
	});
	$("button[id^='deleteButton']").each(function(){
		var id = $(this).parent().parent().parent().parent().children().first().children().first().children().first().html().replace("<h2>ID: ","").replace("</h2>","");
		var hammer = new Hammer(this, "");
		hammer.on("tap", function(){
			updateStatus(getOrder(id), "Removed");
		});
	});
}

function updateCashierUI(){
	$.post('/php/ajax.php', {action: 'checkOverdue'}, function(data, textStatus, xhr) {});
	$.ajax({
		cache: false,
		method: "POST",
		url: 'php/ajax.php', 
		data: {action:'updateBackendUI', status:"Packed"},
		success: function(data) {
			var dataObject = JSON.parse(data);
		    	for(var o in dataObject){
					var time = moment(dataObject[o].pickup, "X");
					time = time.format("h:mm A");
					dataObject[o].pickup = time;
					dataObject[o].realID = dataObject[o].id;
					dataObject[o].id = dataObject[o].id < 10000? pad(dataObject[o].id, 4) : dataObject[o].id % 10000;
				}
				if(!(JSON.stringify(order) === JSON.stringify(dataObject))){
					order = dataObject;
					render();
					registerButtons();
				}
		},
		complete: function() {
		  setTimeout(updateCashierUI, 15000);
		}
	});
}
