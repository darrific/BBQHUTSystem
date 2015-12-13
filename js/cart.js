var contact_info_counter = 0;
var pickup_time_counter = 0;
var contact_info_complete = 0;
var pickup_complete = 0;

var $confirm_order_details = $('#confirm_order_details');
var $contact_information = $confirm_order_details.find('#contact_information');
var $contact_info_header = $contact_information.find('#contact_info_header');
var $contact_info_form = $contact_information.find('#contact_info_form');
var $contact_form = $contact_information.find('#contact_info_form form');
var $contact_input1 = $contact_form.find('#contact_fname');
var $contact_input2 = $contact_form.find('#contact_lname');
var $contact_input3 = $contact_form.find('#contact_number');
var $check_svg = $contact_info_header.find('#check_button');
var $error_message = $contact_info_form.find('#error_message');
var $contact_info_filled = $contact_info_header.find('#contact_info_filled');

var $pickup_time = $confirm_order_details.find('#pickup_time');
var $pickup_time_header = $pickup_time.find('#pickup_time_header');
var $time_selection = $pickup_time.find('#time_selection');
var $time_selector = $pickup_time.find('#time_selection select');
var $submit_pickup = $pickup_time.find('#submit_pickup');
var $check_svg2 = $pickup_time.find('#check_button2');
var $pickup_filled = $pickup_time_header.find('#pickup_filled');
var $pickup_input1 = $time_selection.find('#hour_time');
var $pickup_input2 = $time_selection.find('#minute_time');
var $pickup_input3 = $time_selection.find('#period_time');

var $order_details = $confirm_order_details.find('#order_details');
var $all_orders = $order_details.find('#all_orders');
var $send_order = $all_orders.find('#send_order');

var contact_header = $contact_info_header;
var number_field = $contact_input3;
var pickup_header = $pickup_time_header;
var pickup_submit = $submit_pickup;

contact_header.on('click', showhidecontact);
pickup_header.on('click', showhidepickup);
pickup_submit.on('click', optionTwo);

$contact_input3.mask("999-9999");

	function closecontact(){
		$contact_info_header.delay(200).velocity({top:'50%'},200);
		$contact_info_form.velocity({height:'0%'},200);
		$contact_form.fadeOut(25);
		$error_message.fadeOut(25);
		$contact_form.velocity({height:'0%'},200);
		$pickup_time.velocity({top:'45%'},200);
		contact_info_counter = 0;
		contact_info_counter++;
	}

	function opencontact(){
		$contact_info_form.delay(200).velocity({height:'94%'},200);
		$contact_info_header.velocity({top:'0%'},200);
		$contact_form.velocity({height:''},200);
		$contact_form.fadeIn(25);
		$pickup_time.delay(200).velocity({top:'65%'},200);
		contact_info_counter = 1;
		contact_info_counter--;
	}

	function showhidecontact(){
		if (contact_info_counter === 0)
		{
			closecontact();
		}
		else
		{
			opencontact();
		}
	}

	function openpickup(){
		$submit_pickup.fadeIn(200);
		$submit_pickup.velocity({height:'25%'},25);
		$time_selection.velocity({height:'90.5%'},200);
		$time_selector.fadeIn(25);
		$time_selector.velocity({height:'29%'},200);
		pickup_time_counter = 0;
		pickup_time_counter++;
	}

	function closepickup(){
		$submit_pickup.fadeOut(25);
		$submit_pickup.velocity({height:'0%'},200);
		$time_selection.velocity({height:'0%'},200);
		$time_selector.fadeOut(25);
		$time_selector.velocity({height:'0%'},200);
		pickup_time_counter = 1;
		pickup_time_counter--;
	}

	function showhidepickup(){
		if (pickup_time_counter === 0)
		{
			openpickup();
		}
		else
		{
			closepickup();
		}
	}

	function filloptionOne(){
		if (contact_info_complete === 0)
		{	
			$contact_info_header.css('text-align','center');
			$contact_info_filled.fadeOut(25);
			
		}
		else
		{
			$contact_info_header.css('text-align','left');
			$contact_info_filled.fadeIn(25);
			$contact_info_filled.text($contact_input1.val() +" "+ $contact_input2.val() +", "+ $contact_input3.val());
		}
	}

	function optionOne(){
		if (($contact_input1.val() === "") || ($contact_input2.val() === "") || ($contact_input3.val() === ""))
		{	
			$error_message.fadeIn(1);
			$error_message.text("Please fill in all the fields.");
			$check_svg.fadeOut(1);
			contact_info_complete = 0;
			optionsComplete();
			filloptionOne();
		}
		else
		{	
			$error_message.fadeOut(1);
			$check_svg.fadeIn(1);
			contact_info_complete = 1;
			closecontact();
			if ((pickup_complete === 0) && (pickup_time_counter === 0))
			{
				openpickup();
			}
			optionsComplete();
			filloptionOne();
		}
	}

	function filloptionTwo(){
		if (pickup_complete === 0)
		{	
			$pickup_time_header.css('text-align','center');
			$pickup_filled.fadeOut(25);
			
		}
		else
		{
			$pickup_time_header.css('text-align','left');
			$pickup_filled.fadeIn(25);
			$pickup_filled.text($pickup_input1.val() +":"+ $pickup_input2.val() +" "+ $pickup_input3.val());
		}
	}

	function optionTwo(){
		$check_svg2.fadeIn(1);
		pickup_complete = 1;
		closepickup();
		if ((contact_info_complete === 0) && (contact_info_counter === 1))
		{
			opencontact();
		}
		optionsComplete();
		filloptionTwo();
	}

	function optionsComplete(){
		if ((contact_info_complete === 1) && (pickup_complete === 1))
		{
			$send_order.fadeIn(25);
			$send_order.velocity({top:'85%'},200);
		}
		else
		{
			$send_order.fadeOut(25);
			$send_order.velocity({top:'95%'},200);
		}
	};