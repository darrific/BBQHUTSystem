//Data handling and processing

//Animations and Aesthetics
$('#NextButton').click(function(){
	$('#AddSideContainer').fadeOut(500);
	$('#OrderInformationContainer').fadeOut(0);
	$('#OrderInformationContainer').css('display','initial');
	$('#OrderInformationContainer').fadeIn(500);
})

$('#time').timepicker({
	closeText: "Choose",
	timeFormat: "hh:mm tt",
	timeOnlyTitle: "Choose a pickup time",
	stepMinute: 5,
	hourMin: 8,
	hourMax: 22,
	showButtonPanel: false,
	timeInput: true
});

$('#cell').mask("999-9999",{placeholder:"___-____"});
