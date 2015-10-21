var $parallax = $('#parallax');
var $navigation_bar_index = $('#navigation_bar_index');
var $index = $('#index');
var $nav_bar_left = $index.find('#nav_bar_left');
var $nav_bar_right = $index.find('#nav_bar_right');
var $down_arrow = $index.find('#down_arrow');
var $middle_logo_container = $index.find('#middle_logo_container');
var $slogan = $index.find('#slogan');
var $media = $index.find('#media');

var $anyanchor = $('a[href^="#"]');

var $contact_us = $('#contact_us');
var $recenter_map = $contact_us.find('#recenter_map');
var $map_overlay = $contact_us.find('#map_overlay');
var $gmap_canvas = $contact_us.find('#gmap_canvas');
var $contact_info = $contact_us.find('#contact_info');
var $click_map_instruct = $contact_us.find('#click_map_instruct');

var anyanchor = $anyanchor;
var map_overlay = $map_overlay;
var recenter_map = $recenter_map;
var gmap_canvas = $gmap_canvas;
var contact_info = $contact_info;

anyanchor.on('click', smoothanchor);
map_overlay.on('click', enablemap);
recenter_map.on('click', enablemap);
contact_info.on('click', enablemap);
gmap_canvas.on('mouseleave', disablemap);

$('body').css('overflow','hidden');

$parallax.scroll(function(){
    var scrollPos = $parallax.scrollTop();
    var height = $parallax.height();
    var navOffset = $nav_bar_left.offset().top;
    
    $([nav_bar_left, nav_bar_right, slogan, down_arrow, middle_logo_container, media]).css({'opacity': ((height - scrollPos) / height)});
    
    if (scrollPos >= navOffset+500) {					
		$navigation_bar_index.fadeIn(500);					
	} else {
		$navigation_bar_index.fadeOut(500);					
	}
});

function smoothanchor(event){
var target = $( $(this).attr('href') );
if(target.length){
	event.preventDefault();
	$parallax.animate({scrollTop: (target.offset().top)}, 1000);}
};

function enablemap(){
	$map_overlay.fadeOut(1);
	$click_map_instruct.fadeOut(500);
};

function disablemap(){								
	$map_overlay.fadeIn(1);
	$click_map_instruct.fadeIn(500);
};