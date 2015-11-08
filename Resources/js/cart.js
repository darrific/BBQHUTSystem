//Data handling and processing

//Animations and Aesthetics
$('#NextButton').click(function(){
	$('#AddSideContainer').fadeOut(600);
	$('#OrderInformationContainer').css('display','initial');
	$('#OrderInformationContainer').fadeOut(0);
	$('#OrderInformationContainer').fadeIn(600);
})

$('#time').clockpicker({
	default: 'now',
	fromnow: 3600,
	donetext: 'Choose',
	autoclose: true
});

$('#cell').mask("999-9999",{placeholder:"   -    "});
