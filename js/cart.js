var order = JSON.parse($('#OrderJSON').html());
var template = '{{#OrderItems}}<div class="row" id="TableItem"><div class="col-xs-1">{{quantity}}</div><div class="col-xs-5 col-xs-offset-1"><b>{{name}}</b></div><div class="col-xs-2">${{price}}</div><div class="col-xs-1 col-xs-offset-1"><span id="removeButton" class="glyphicon glyphicon glyphicon-remove-sign padding_1"></div><br></div>{{/OrderItems}}';

$('#OrderTable').html(Mustache.render(template, {OrderItems : order.items}));