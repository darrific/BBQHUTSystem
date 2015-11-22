<!DOCTYPE html>

<html>

<link rel="stylesheet" type="text/css" href="Resources/css/style.css">
<link rel="stylesheet" type="text/css" href="Resources/css/animate.css">
<link rel="stylesheet" type="text/css" href="Resources/css/fonts.css">
<script type="text/javascript" src="Resources/js/jquery.js"></script>
<script type="text/javascript" src="Resources/js/scroll.js"></script>
<script type="text/javascript" src="Resources/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="Resources/js/jquery.maskedinput.js"></script>
<script type="text/javascript" src="Resources/js/mustache.js"></script>
<script type="text/javascript" src="Resources/js/velocity.js"></script>

<title>Make An Order - The Original BBQ Hut</title>

<body>

	<div id="navigation_bar_order">
		<nav>	
			<ul>
				<li><a href="index.html"><div id="logo_image"><img src="Resources\logos\BBQH Logo.svg" alt="logo"></div></a></li>
				<li><a href="menu.html" id="see_menu_button">SEE THE MENU &#9663</a>
					<ul class="dropdown">
				        <li><a href="menu.html#regularanchor">Meats</a></li>
				        <li><a href="menu.html#combinationsanchor">Combinations Meals</a></li>
				        <li class="sides_drop_option"><a href="menu.html#sidesanchor">Sides</a></li>
			      </ul>
				</li>
				<li><a href="order.php" id="place_order_button">PLACE AN ORDER</a></li>
				<li><a href="index.html#about_us" id="about_us_button">ABOUT US</a></li>
				<li><a href="index.html#contact_us" id="contact_us_button">CONTACT US</a></li>
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

	<div id="order_top">
		<div id="order_heading">Place Your Order</div>
		<div id="order_subheading">Why wait in line? Use our online ordering system below!</div>
	</div>

	<div id="meatbox_heading">Select Your Meal</div>
	<div id="meatbox">
		<ul>
			<li id="meat_item1">
				<div id="meatitem">
					<img src="Resources/images/food.jpeg" alt="">
					<div id="meat_item_text">
						<div id="meat_item_title">1/4 Chicken</div>
						<div id="meat_item_details">
							1/4 Portion Chicken with Fries, Salad, Garlic Bread
						</div>
					</div>
					<div id="meat_item_price">$25.00
					</div>
				</div>
				<div id="hiddenOverlay" style="position:relative; width:100%; height:100%;"></div>
			</li>
			<li id="meat_item2">
				<div id="meatitem">
					<img src="Resources/images/food.jpeg" alt="">
					<div id="meat_item_text">
						<div id="meat_item_title">1/2 Chicken</div>
						<div id="meat_item_details">
							1/2 Portion Chicken with Fries, Salad, Garlic Bread
						</div>
					</div>
					<div id="meat_item_price">$25.00
					</div>
				</div>
				<div id="hiddenOverlay" style="position:relative; width:100%; height:100%;"></div>
			</li>
			<li id="meat_item3">
				<div id="meatitem">
					<img src="Resources/images/food.jpeg" alt="">
					<div id="meat_item_text">
						<div id="meat_item_title">Lamb</div>
						<div id="meat_item_details">
							Lamb with Fries, Salad, Garlic Bread
						</div>
					</div>
					<div id="meat_item_price">$25.00
					</div>
				</div>
				<div id="hiddenOverlay" style="position:relative; width:100%; height:100%;"></div>
			</li>
			<li id="meat_item4">
				<div id="meatitem">
					<img src="Resources/images/food.jpeg" alt="">
					<div id="meat_item_text">
						<div id="meat_item_title">Beef</div>
						<div id="meat_item_details">
							Beef with Fries, Salad, Garlic Bread
						</div>
					</div>
					<div id="meat_item_price">$25.00
					</div>
				</div>
				<div id="hiddenOverlay" style="position:relative; width:100%; height:100%;"></div>
			</li>
			<li id="meat_item5">
				<div id="meatitem">
					<img src="Resources/images/food.jpeg" alt="">
					<div id="meat_item_text">
						<div id="meat_item_title">Shrimp</div>
						<div id="meat_item_details">
							Shrimp with Fries, Salad, Garlic Bread
						</div>
					</div>
					<div id="meat_item_price">$25.00
					</div>
				</div>
				<div id="hiddenOverlay" style="position:relative; width:100%; height:100%;"></div>
			</li>
			<li id="meat_item6">
				<div id="meatitem">
					<img src="Resources/images/food.jpeg" alt="">
					<div id="meat_item_text">
						<div id="meat_item_title">Veggie</div>
						<div id="meat_item_details">
							Fries, Salad, Garlic Bread
						</div>
					</div>
					<div id="meat_item_price">$25.00
					</div>
				</div>
				<div id="hiddenOverlay" style="position:relative; width:100%; height:100%;"></div>
			</li>
		</ul>
	</div>

	<div id="sidesbox_heading">Select Your Side</div>
	<div id="sidesbox">
		<ul id="sideslist">
			<li id="side_item1">
				<div class="sides_item" id="sides_item1">
					<img src="Resources/images/food.jpeg" alt="">
					<div id="sides_title" class="long_sides">Fries, Garlic Bread and Green Salad</div>
					<div id="sides_price">$25.00</div>
					<div id="hiddenOverlay" style="position:relative; width:100%; height:100%;"></div>
				</div>
			</li>
			<li id="side_item2">
				<div class="sides_item" id="sides_item2">
					<img src="Resources/images/food.jpeg" alt="">
					<div id="sides_title" class="center_sides">Fries</div>
					<div id="sides_price">$15.00</div>
					<div id="hiddenOverlay" style="position:relative; width:100%; height:100%;"></div>
				</div>
			</li>
			<li id="side_item3">
				<div class="sides_item" id="sides_item3">
					<img src="Resources/images/food.jpeg" alt="">
					<div id="sides_title" class="center_sides">Baked Potato</div>
					<div id="sides_price">$10.00</div>
					<div id="hiddenOverlay" style="position:relative; width:100%; height:100%;"></div>
				</div>
			</li>
			<li id="side_item4">
				<div class="sides_item" id="sides_item4">
					<img src="Resources/images/food.jpeg" alt="">
					<div id="sides_title" class="center_sides">Garlic Bread</div>
					<div id="sides_price">$4.00</div>
					<div id="hiddenOverlay" style="position:relative; width:100%; height:100%;"></div>
				</div>
			</li>
			<li id="side_item5">
				<div class="sides_item" id="sides_item5">
					<img src="Resources/images/food.jpeg" alt="">
					<div id="sides_title" class="center_sides">Macaroni Pie</div>
					<div id="sides_price">$15.00</div>
					<div id="hiddenOverlay" style="position:relative; width:100%; height:100%;"></div>
				</div>
			</li>
			<li id="side_item6">
				<div class="sides_item" id="sides_item6">
					<img src="Resources/images/food.jpeg" alt="">
					<div id="sides_title" class="center_sides">Macaroni Salad</div>
					<div id="sides_price">$15.00</div>
					<div id="hiddenOverlay" style="position:relative; width:100%; height:100%;"></div>
				</div>
			</li>
			<li id="side_item7">
				<div class="sides_item" id="sides_item7">
					<img src="Resources/images/food.jpeg" alt="">
					<div id="sides_title" class="center_sides">Potato Salad</div>
					<div id="sides_price">$15.00</div>
					<div id="hiddenOverlay" style="position:relative; width:100%; height:100%;"></div>
				</div>
			</li>
			<li id="side_item8">
				<div class="sides_item" id="sides_item8">
					<img src="Resources/images/food.jpeg" alt="">
					<div id="sides_title" class="center_sides">Cole Slaw</div>
					<div id="sides_price">$10.00</div>
					<div id="hiddenOverlay" style="position:relative; width:100%; height:100%;"></div>
				</div>
			</li>
			<li id="side_item9">
				<div class="sides_item" id="sides_item9">
					<img src="Resources/images/food.jpeg" alt="">
					<div id="sides_title" class="center_sides">Green Salad</div>
					<div id="sides_price">$10.00</div>
					<div id="hiddenOverlay" style="position:relative; width:100%; height:100%;"></div>
				</div>
			</li>
			<li id="side_item10">
				<div class="sides_item" id="sides_item10">
					<img src="Resources/images/food.jpeg" alt="">
					<div id="sides_title" class="long_sides">Wedges, Garlic Bread and Green Salad</div>
					<div id="sides_price">$35.00</div>
					<div id="hiddenOverlay" style="position:relative; width:100%; height:100%;"></div>
				</div>
			</li>
			<li id="side_item11">
				<div class="sides_item" id="sides_item11">
					<img src="Resources/images/food.jpeg" alt="">
					<div id="sides_title" class="center_sides">Wedges</div>
					<div id="sides_price">$25.00</div>
					<div id="hiddenOverlay" style="position:relative; width:100%; height:100%;"></div>
				</div>
			</li>
			<li id="side_item12">
				<div class="sides_item" id="sides_item12">
					<img src="Resources/images/food.jpeg" alt="">
					<div id="sides_title" class="long_sides">Fried Rice</div>
					<div id="sides_price">$15.00</div>
					<div id="sides_note">(Fridays and Saturdays Only)</div>
					<div id="hiddenOverlay" style="position:relative; width:100%; height:100%;"></div>
				</div>
			</li>
			<li id="side_item13">
				<div class="sides_item" id="sides_item13">
					<img src="Resources/images/food.jpeg" alt="">
					<div id="sides_title" class="long_sides">Noodles</div>
					<div id="sides_price">$15.00</div>
					<div id="sides_note">(Fridays and Saturdays Only)</div>
					<div id="hiddenOverlay" style="position:relative; width:100%; height:100%;"></div>
				</div>
			</li>
			<li id="side_item14">
				<div class="sides_item" id="sides_item14">
					<img src="Resources/images/food.jpeg" alt="">
					<div id="sides_title" class="center_sides">Chicken Kebabs</div>
					<div id="sides_price">$20.00</div>
					<div id="hiddenOverlay" style="position:relative; width:100%; height:100%;"></div>
				</div>
			</li>
			<li id="side_item15">
				<div class="sides_item" id="sides_item15">
					<img src="Resources/images/food.jpeg" alt="">
					<div id="sides_title" class="center_sides">Shrimp Kebabs</div>
					<div id="sides_price">$30.00</div>
					<div id="hiddenOverlay" style="position:relative; width:100%; height:100%;"></div>
				</div>
			</li>
			<li>
				<div class="sides_item" class="sides_item" id="sides_item16">
					<img src="Resources/images/food.jpeg" alt="">
					<div id="sides_title" class="center_sides">*COMING SOON*</div>
					<div id="sides_price"></div>
					<div id="hiddenOverlay" style="position:relative; width:100%; height:100%;"></div>
				</div>
			</li>
		</ul>
	</div>

	<div id="cart_divider"></div>

	<div id="cartbox">
		<div id="cartbox_heading">Your Cart</div>
		<div id="cartorders">
			<ul id="cartordersul"></ul>
		</div>
		<div id="total">
			Total: <span id="totalText">0.00</span>
		</div>
		<div id="order_checkout">
			<button>Checkout!</button>
		</div>
	</div>
</body>	

<footer>

	<script type="text/javascript" src="Resources/js/order.js">
	</script>
</footer>

</html>
