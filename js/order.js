var order;

$("div[id^='order_item']").each(function(){
	var id = parseInt(this.id.replace("order_item", ""), 10);
	var hammerTime = new Hammer(this, "");
	hammerTime.on("press", function(){
		var OrderObject = {};
		var ObjectCache = $('#order_item' + id).children().first().children().first().children();
		var titleDetails = ObjectCache.first().next();

		OrderObject.name = titleDetails.children().first().html();
		OrderObject.details = titleDetails.children().first().next().next().html();
		OrderObject.price = titleDetails.next().html().replace("<br>$", "");
		OrderObject.img = ObjectCache.first().html().replace('<img src="','').replace('">','');

		alert(JSON.stringify(OrderObject));
		//order.push(OrderObject);
	});
});