$("#courses_section img").click(function(imgtag){
    var theimg= imgtag.target;
    var thesrc = theimg.getAttribute("src");
    var scrollPos = $(window).scrollTop();
    $('#displayimg').attr("src", thesrc);
    $("#imgclick").css('margin-top',scrollPos);
    $("#imgbox").css('margin-top',scrollPos);
    $('#imgclick').fadeIn(1);
});

$(window).scroll(function(){
	$('#imgclick').fadeOut(1);
});

$("#closebutton").click(function(){
	$('#imgclick').fadeOut(1);
});

$("#overlayimg").click(function(){
	$('#imgclick').fadeOut(1);
});