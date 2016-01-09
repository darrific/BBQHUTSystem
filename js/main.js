$(document).ready(function(){
	var cash = $("#index_section");
	var circle = cash.find("#circle");
	var tent = cash.find("#tent");
	var bbqh = cash.find("#bbqh");
	var original = cash.find("#original");
	var ten = $("#tent");
	
	circle.velocity({opacity: 0}, 1600).velocity({opacity: 1}, 1500);
	tent.velocity({translateY: -100}, 1).velocity({translateY: 0, opacity: 1}, 1000);
	bbqh.velocity({translateY: 100}, 500).velocity({translateY: 0, opacity: 1}, 1000);
	original.velocity({translateY: -200}, 1000).velocity({translateY: 0, opacity: 1}, 100);
});