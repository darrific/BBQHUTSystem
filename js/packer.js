var template = '{{#OrderCount}}<div class="row padding_20 bg_7 w"><div class="row"><div class="col-lg-7 col-lg-offset-1"><div class="row"><div class="col-lg-2"><h2>ID: {{id}}</h2></div><div class="col-lg-3"><h3>Name: {{consumerName}}</h3></div><div class="col-lg-3"><h3>Ph#: {{phoneNumber}}</h3></div></div><div class="container bg_8"><h4>Breakdown:</h4>{{#items}}<div class="row"><div class="col-lg-1 col-lg-offset-1"><h4>{{quantity}}</h4></div><div class="col-lg-2"><h4>{{name}}</h4></div><div class="col-lg-2"><h4>${{price}}.00</h4></div><div class="col-lg-2"><a href="#"><button id="printButton" class="btn btn-info btn-block"><h4>Print</h4></button></a></div></div><br>{{/items}}</div></div><br><br><br><br><br><br><br><br><div class="col-lg-4"><div class="col-lg-6 col-lg-offset-3"><a href="#"><button class="btn btn-success btn-block"><h3>Packed</h3></button></a></div></div></div><br><div class="row"><div class="col-lg-3 col-lg-offset-1"><h2 class="padding_10"><b>Pickup: </b>{{pickup}}</h2></div><div class="col-lg-3"><h2 class="padding_10"><b>Status: </b>{{status}}</h2></div></div></div><hr>{{/OrderCount}}';
var order = [];

order = jQuery.parseJSON($('#OrdersJSON').html());
for(var o in order){
	var time = moment(order[o].pickup, "X");
	time = time.format("h:mm A");
	order[o].pickup = time;
	order[o].realID = order[o].id;
	order[o].id = order[o].id < 10000? pad(order[o].id, 4) : order[o].id % 10000;
}

render();

function render(){
	$('#injectStuffHere').html(Mustache.render(template, {OrderCount: order}));
}

function pad(n, width, z) {
  z = z || '0';
  n = n + '';
  return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}

$("button[id^='printButton']").each(function(){
	var ObjectCache = $(this).parent().parent().parent().parent().parent();
	var id = ObjectCache.children().first().children().first().html().replace("<h2>ID: ","").replace("</h2>","");
	var consumerName = ObjectCache.children().first().children().first().next().html().replace("<h3>Name: ","").replace("</h3>","");
	var number = ObjectCache.children().first().children().first().next().next().html().replace("<h3>Ph#: ","").replace("</h3>","");
	var time = ObjectCache.parent().next().next().children().first().html().replace("<h2 class=\"padding_10\"><b>Pickup: </b>","").replace("</h2>","");
	var name = $(this).parent().parent().prev().prev().html().replace("<h4>","").replace("</h4>","");

	var hammer = new Hammer(this, "");
	hammer.on("tap", function(){
		var w = window.open("http://10.0.0.2/print.php?id="+id+"&consumerName="+consumerName+"&number="+number+"&time="+time+"&name="+name);
		setTimeout(function(){
  			w.close();
		}, 1000);
	});
});