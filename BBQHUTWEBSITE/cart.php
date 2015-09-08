<html>

<link rel="stylesheet" type="text/css" href="Resources/css/style.css">
<link rel="stylesheet" type="text.css" href="Resources/css/animate.css">
<link rel="stylesheet" type="text.css" href="Resources/css/fonts.css">
<script type="text/javascript" src="Resources/js/jquery.js"></script>
<script type="text/javascript" src="Resources/js/scroll.js"></script>
<script type="text/javascript" src="Resources/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="Resources/js/mustache.js"></script>
<script type="text/javascript" src="Resources/js/velocity.js"></script>

<title>Order Cart - Original BBQ Hut</title>

<body>

	<div id="navigation_bar_cart">
		<nav>	
			<ul>
				<li><a href="index.html"><div id="logo_image"><img src="Resources\logos\BBQH Logo.svg" alt="logo"></div></a></li>
				<li><a href="menu.html" id="see_menu_button">SEE THE MENU &#9663</a>
					<ul class="dropdown">
				        <li><a href="menu.html#regular_meals">Meats</a></li>
				        <li><a href="menu.html#combination_meals">Combinations Meals</a></li>
				        <li class="sides_drop_option"><a href="#sides_meals">Sides</a></li>
			      </ul>
				</li>
				<li><a href="order.php" id="place_order_button">PLACE AN ORDER</a></li>
				<li><a href="index.html#about_us_anchor" id="about_us_button">ABOUT US</a></li>
				<li><a href="index.html#contact_us_anchor" id="contact_us_button">CONTACT US</a></li>
				<li class="cart_svg"><a href="cart.php">
					<div id="cart_count"></div>
						<?xml version="1.0" encoding="iso-8859-1"?>
						<!-- Generator: Adobe Illustrator 16.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
						<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
						<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 width="70%"viewBox="0 0 446.853 446.853" style="enable-background:new 0 0 446.853 446.853;"
							 xml:space="preserve">
							<g>
								<path d="M444.274,93.36c-2.558-3.666-6.674-5.932-11.145-6.123L155.942,75.289c-7.953-0.348-14.599,5.792-14.939,13.708
									c-0.338,7.913,5.792,14.599,13.707,14.939l258.421,11.14L362.32,273.61H136.205L95.354,51.179
									c-0.898-4.875-4.245-8.942-8.861-10.753L19.586,14.141c-7.374-2.887-15.695,0.735-18.591,8.1c-2.891,7.369,0.73,15.695,8.1,18.591
									l59.491,23.371l41.572,226.335c1.253,6.804,7.183,11.746,14.104,11.746h6.896l-15.747,43.74c-1.318,3.664-0.775,7.733,1.468,10.916
									c2.24,3.184,5.883,5.078,9.772,5.078h11.045c-6.844,7.617-11.045,17.646-11.045,28.675c0,23.718,19.299,43.012,43.012,43.012
									s43.012-19.294,43.012-43.012c0-11.028-4.201-21.058-11.044-28.675h93.777c-6.847,7.617-11.047,17.646-11.047,28.675
									c0,23.718,19.294,43.012,43.012,43.012c23.719,0,43.012-19.294,43.012-43.012c0-11.028-4.2-21.058-11.042-28.675h13.432
									c6.6,0,11.948-5.349,11.948-11.947c0-6.6-5.349-11.948-11.948-11.948H143.651l12.902-35.843h216.221
									c6.235,0,11.752-4.028,13.651-9.96l59.739-186.387C447.536,101.679,446.832,97.028,444.274,93.36z M169.664,409.814
									c-10.543,0-19.117-8.573-19.117-19.116s8.574-19.117,19.117-19.117s19.116,8.574,19.116,19.117S180.207,409.814,169.664,409.814z
									 M327.373,409.814c-10.543,0-19.116-8.573-19.116-19.116s8.573-19.117,19.116-19.117s19.116,8.574,19.116,19.117
									S337.916,409.814,327.373,409.814z"/>
							</g>
						</svg>
					</a>
				</li>
			</ul>
		</nav>	
	</div>
	
	<div id="cart_title">My Cart</div>
	<div id="confirm_order_details">
		<div id="contact_information">
			<div id="contact_info_header" class="pointer_cursor">Contact Details
				<div id="contact_info_filled"></div>
				<div id="check_button">
					<?xml version="1.0" encoding="iso-8859-1"?>
					<!-- Generator: Adobe Illustrator 16.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
					<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
					<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						 width="60%" viewBox="0 0 448.8 448.8" style="enable-background:new 0 0 448.8 448.8;" xml:space="preserve"
						>
						<g>
							<g id="check">
								<polygon points="142.8,323.85 35.7,216.75 0,252.45 142.8,395.25 448.8,89.25 413.1,53.55 		"/>
							</g>
						</g>
					</svg>
				</div>
			</div>
			<div id="contact_info_form">
				<form id="contact_form" name="contact_form">
					<input id="contact_fname" name="contact_fname" type="text" placeholder="First Name" autocomplete="on" autofocus required>
					<input id="contact_lname" name="contact_lname" type="text" placeholder="Last Name" autocomplete="on" required>
					<input id="contact_number" name="contact_number" type="text" pattern="[0-9]{7}" min="1000000" max="9999999" placeholder="Phone Number (1234560)" autocomplete="on" required>
					<button id="submit_contact" class="pointer_cursor" onclick="return false">Next</button>
				</form>
				<div id="error_message"></div>
			</div>
		</div>
		<div id="pickup_time">
			<div id="pickup_time_header" class="pointer_cursor">Choose a Pickup Time
				<div id="pickup_filled"></div>
				<div id="check_button2">
					<?xml version="1.0" encoding="iso-8859-1"?>
					<!-- Generator: Adobe Illustrator 16.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
					<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
					<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						 width="60%" viewBox="0 0 448.8 448.8" style="enable-background:new 0 0 448.8 448.8;" xml:space="preserve"
						>
						<g>
							<g id="check">
								<polygon points="142.8,323.85 35.7,216.75 0,252.45 142.8,395.25 448.8,89.25 413.1,53.55 		"/>
							</g>
						</g>
					</svg>
				</div>
			</div>
			<div id="time_selection">
				<select name="hour" id="hour_time">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6" selected="selected">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
				</select>
				<select name"minute" id="minute_time">
					<option value="00">00</option>
					<option value="05">05</option>
					<option value="10">10</option>
					<option value="15">15</option>
					<option value="20">20</option>
					<option value="25">25</option>
					<option value="30">30</option>
					<option value="35">35</option>
					<option value="40">40</option>
					<option value="45" selected="selected">45</option>
					<option value="50">50</option>
					<option value="55">55</option>
				</select>
				<select name="period" id="period_time">
					<option value="am">a.m.</option>
					<option value="pm" selected="selected">p.m.</option>
				</select>
				<button id="submit_pickup" class="pointer_cursor" onclick="return false">Next</button>
			</div>
		</div>
		<div id="order_details">
			<div id="order_header">
				<ul>
					<li class="cartorder_qty">QTY</li>
					<li class="cartorder_name">Items</li>
					<li class="cartorder_price">Price</li>
				</ul>
			</div>
			<div id="all_orders">
				<!--JAVASCRIPT WORK FOR SAYAAD HERE -->
				<button id="send_order" class="pointer_cursor">Send Order</button>
			</div>
		</div>
	</div>
	
</body>

<footer>
		<script type="text/javascript" src="Resources/js/cart.js"></script>
</footer>

</html>
