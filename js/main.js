$(document).ready(function(){
	var cash = $("#index_section");
	var circle = cash.find("#circle");
	var tent = cash.find("#tent");
	var bbqh = cash.find("#bbqh");
	var original = cash.find("#original");
	var ten = $("#tent");
	var under_leaf = $("#under_x5F_leaf");
	var ring_leaf = $("#ring_x5F_leaf");
	
	circle.velocity({opacity: 0}, 1900).velocity({opacity: .85}, 1500);
	tent.velocity({opacity: 0}, 1800).velocity({opacity: 1}, 1000);
	bbqh.velocity({opacity: 0}, 100).velocity({opacity: 1}, 1000);
	original.velocity({opacity: 0}, 800).velocity({opacity: 1}, 1000);
	under_leaf.velocity({opacity: 0}, 1900).velocity({opacity: 1}, 1500);
	ring_leaf.velocity({opacity: 0}, 1900).velocity({opacity: 1}, 1500);
});