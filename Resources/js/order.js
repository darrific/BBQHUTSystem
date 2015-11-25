var $cart_count = $('#cart_count');

var orders = [];
var idCounter = 0;
var cartCounter = 0;

var DOM = $('#sidebox');
var CartDOM = $('#cartordersul');
var CartTemplate = '{{#CartOrders}}<li class="target"><div class="cart_item" id="cart_item{{ID}}"><img src="{{image}}" alt=""><div class="cartorder_title" id="cartorder_title{{ID}}">{{Title}}</div>{{#Note}}<div class="cartorder_note" id="cartorder_note{{ID}}">{{Note}}</div>{{/Note}}<div class="cartorder_price" id="cartorder_price{{ID}}">{{Price}}</div><div class="delete_cartorder" id="delete_cartorder{{ID}}">x</div></div></li>{{/CartOrders}}';

(function registerAddEvents(){
	$("li[id^='side_item']").each(function(){
		var id = parseInt(this.id.replace("side_item", ""), 10);
		var sidesItemDOM = $('#side_item' + id);
		sidesItemDOM.on("click", addSide);
	});
	$("li[id^='meat_item']").each(function(){
		var id = parseInt(this.id.replace("meat_item", ""), 10);
		var meatItemDOM = $('#meat_item' + id);
		meatItemDOM.on("click", addMeat);
	});
}());

function registerDeleteEvent(){
	$("div[id^='delete_cartorder']").each(function(){
		var id = parseInt(this.id.replace("delete_cartorder", ""), 10);
		var deleteItemDOM = $('#cart_item' + id);
		deleteItemDOM.on("click", deleteOrder);
	});
}

function addSide(e){
	var OrderObject = [];
	var titleDOM = $('#sideslist').find(e.target).parent().children().first().next();
	OrderObject.image = "Resources/images/food.jpeg";
	OrderObject.Title = titleDOM.html();
	OrderObject.Price = titleDOM.next().html();
	if(!(titleDOM.next().next() == "")){
		OrderObject.Note = titleDOM.next().next().html();
	}
	OrderObject.ID = idCounter;
	addOrder(OrderObject);
}

function addMeat(e){
	var OrderObject = [];
	var meatDOM = $('#meatbox').find(e.target).parent().children().first().children().first().next();
	var textDOM = meatDOM.children().first();
	OrderObject.image = "Resources/images/food.jpeg";
	OrderObject.Title = textDOM.html();
	OrderObject.Note = textDOM.next().html();
	OrderObject.Price = meatDOM.next().html();
	OrderObject.ID = idCounter;
	addOrder(OrderObject);
}

function addOrder(o){
	if(o.Title == null){
		return;
	}
	orders.push(o);
	render();
	idCounter++;
	cartCounter++;
	CounterCart();
	calculatePrice();
}

function deleteOrder(e){
	var remove = $(e.target).closest('.target');
	var i = remove.index();
	orders.splice(i,1);
	cartCounter--;
	render();
	CounterCart();
	calculatePrice();
}

function render(){
	CartDOM.html(Mustache.render(CartTemplate, {CartOrders: orders}));
	registerDeleteEvent();
}

function CounterCart(){
	if (cartCounter >= 1)
		{
			$cart_count.fadeIn(10);
			$cart_count.velocity({top:'28%'},200);
		}
		else
		{
			$cart_count.velocity({top:'-50%'},300);
			$cart_count.fadeOut(500);
		}
		if (cartCounter >= 10)
			{
				$cart_count.css('right','0.9%');
			}
			else
			{
				$cart_count.css('right','1.18%');
			}
	$cart_count.text(cartCounter);
}

function calculatePrice(){
	var totalPrice = 0;
	for(var order in orders){
		var i = parseFloat(orders[order].Price.replace("$", ""));
		totalPrice += i;
	}
	$('#totalText').html(totalPrice.toFixed(2));
}