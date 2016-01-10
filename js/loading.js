var fail = window.setTimeout(failure, 30000);
var order = {};
var reachedOrders = {};

updateArrays();

function updateArrays(){
	$.post('php/ajax.php', {action: 'getOrders'}, function(data, textStatus, xhr) {
		order = $.parseJSON(data);
	});
	$.post('php/ajax.php', {action: 'getReachedOrders'}, function(data, textStatus, xhr) {
		reachedOrders = jQuery.parseJSON(data);
	});
	checkReached();
}

function checkReached(){
	if(order && reachedOrders){
		for(reachedOrder in reachedOrders){
			var consumerName = reachedOrders[reachedOrder].consumerName;
			var ph = reachedOrders[reachedOrder].phoneNumber;
			var ID = reachedOrders[reachedOrder].id;
			if((consumerName == order.consumerName) && (ph == order.phoneNumber.replace("-", ""))){
				window.clearTimeout(fail);
				window.location.href = "success.php?id=" + ID;
				return;
			}
		}
	}
	setTimeout(updateArrays, 5000);
}

function failure(){
	window.location.href = 'failure.html';
}