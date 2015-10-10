<!DOCTYPE html>

<html>

<link rel="stylesheet" type="text/css" href="Resources/css/style.css">
<link rel="stylesheet" type="text.css" href="Resources/css/animate.css">
<link rel="stylesheet" type="text.css" href="Resources/css/fonts.css">
<script type="text/javascript" src="Resources/js/jquery.js"></script>
<script type="text/javascript" src="Resources/js/scroll.js"></script>
<script type="text/javascript" src="Resources/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="Resources/js/jquery.maskedinput.js"></script>
<script type="text/javascript" src="Resources/js/mustache.js"></script>
<script type="text/javascript" src="Resources/js/velocity.js"></script>

<title>BBQH | Make an Order</title>

<body>

	<div id="navigation_bar_order">
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
				<li><a href="order.html" id="place_order_button">PLACE AN ORDER</a></li>
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

	<div id="order_container">
		<div id="header"><h1>Make Your Order</h1></div>
		<div id="main_box">
			<div id="meat_container" >
				<div id="subhead1" class="subhead">
					Step 1: Choose.
				</div>
				<div id="options_container">
					<ul>
						<li>
							<div class="meat_option" id="chicken">
								<ul>
									<li id="image"><img src="Resources/images/food.jpeg" alt=""></li>
									<li id="name">Chicken</li>
									<li id="price_">$25</li>						
									<li id="add1" class="add">+</li>
								</ul>

							</div>
						</li>
						<li>
							<div class="meat_option" id="lamb">
								<ul>
									<li id="image"><img src="Resources/images/food.jpeg" alt=""></li>
									<li id="name">Lamb</li>
									<li id="price_">$25</li>
									<li id="add2" class="add">+</li>
								</ul>
							</div>
						</li>
						<li>
							<div class="meat_option" id="beef">
								<ul>
									<li id="image"><img src="Resources/images/food.jpeg" alt=""></li>
									<li id="name">Beef</li>
									<li id="price_">$25</li>
									<li id="add3" class="add">+</li>
								</ul>
							</div>
						</li>
						<li>
							<div class="meat_option" id="fish">
								<ul>
									<li id="image"><img src="Resources/images/food.jpeg" alt=""></li>
									<li id="name">Fish</li>
									<li id="price_">$25</li>
									<li id="add4" class="add">+</li>
								</ul>
							</div>
						</li>
						<li>
							<div class="meat_option" id="shimp">
								<ul>
									<li id="image"><img src="Resources/images/food.jpeg" alt=""></li>
									<li id="name">Shrimp</li>
									<li id="price_">$25</li>
									<li id="add5" class="add">+</li>
								</ul>
							</div>
						</li>
						<li>
							<div class="meat_option" id="none_meat">
								<ul>
									<li id="image"><img src="Resources/images/food.jpeg" alt=""></li>
									<li id="name">Vegetarian</li>
									<li id="price_">$25</li>
									<li id="add6" class="add">+</li>
								</ul>
							</div>
						</li>
					</ul>

				</div>
					
				</ul> 
			</div>
			<form id="review_container" action="php/ProcessOrder.php">
				<div id="subhead1" class="subhead">
					Step 2: Edit.
				</div>
				<div id="the_order_output">
					<ul id="order_result">
						<script id="order_template" type="text/template">
							{{#order_result}}
							<li class="helplol" id="FoodEntry{{eyedee}}">
								<div id="id" class="hidden">{{eyedee}}</div>
								<div id="word">{{meat}}</div>
								<div id="inner_buttons">
									<div id="arrows">
										<img class="innerArrow" id="down" src="Resources/images/arrow_down.png"/>
										<img class="innerArrow" id="up" src="Resources/images/arrow_up.png"/>
									</div>
									<i class="del">X</i>
								</div>
								<div id="edit_content">
								<hr>
									{{#size}}
										<ul id="sizes"> 
											<h2>SIZE</h2> 
											<li><input name="size{{eyedee}}" id="small{{eyedee}}" value="small{{eyedee}}" type="radio" {{size.small}}><label id="smallLabel" for="small{{eyedee}}">Small ($35)</label></li> 
											<li><input name="size{{eyedee}}" id="large{{eyedee}}" value="large{{eyedee}}" type="radio" {{size.large}}><label id="largeLabel" for="large{{eyedee}}">Large ($45)</label></li> 
										</ul>
									{{/size}}
									</br>	

									<h2>SIDES</h2>
									<ul id="sides">
										<li><input class="toggle" name="siideSalad{{eyedee}}" id="siideSalad{{eyedee}}" type="checkbox" {{sides.Salad}}><label for="siideSalad{{eyedee}}">Salad (Free)</label></li>
										<li><label for="siideFries{{eyedee}}">Fries (Free)</label><input class="toggle" name="siideFries{{eyedee}}" id="siideFries{{eyedee}}" type="checkbox"  {{sides.Fries}}></li>
										<li><label for="siideExtraSalad{{eyedee}}"> Extra Salad ($10.00)</label><input class="toggle" name="siideExtraSalad{{eyedee}}" id="siideExtraSalad{{eyedee}}" type="checkbox" {{sides.ExtraSalad}}/></li>
										<li><label for="siideExtraFries{{eyedee}}"> Extra Fries ($15.00)</label><input class="toggle" name="siideExtraFries{{eyedee}}" id="siideExtraFries{{eyedee}}" type="checkbox" {{sides.ExtraFries}}></li>
										<li><label for="siidePotatoSalad{{eyedee}}">Potato Salad ($15.00)</label><input class="toggle" name="siidePotatoSalad{{eyedee}}" id="siidePotatoSalad{{eyedee}}" class="add_5" type="checkbox" {{sides.PotatoSalad}}></li>	
										<li><label for="siideWedges{{eyedee}}">Wedges ($25.00)</label><input class="toggle" name="siideWedges{{eyedee}}" id="siideWedges{{eyedee}}" class="add_5" type="checkbox" {{sides.Wedges}}></li>
										<li><label for="siideBakedPotato{{eyedee}}">Baked Potato ($10.00)</label><input class="toggle" name="siideBakedPotato{{eyedee}}" id="siideBakedPotato{{eyedee}}" class="add_5" type="checkbox" {{sides.BakedPotato}}></li>
										<li><label for="siideGarlicBread{{eyedee}}">Garlic Bread ($4.00)</label><input class="toggle" name="siideGarlicBread{{eyedee}}" id="siideGarlicBread{{eyedee}}" class="add_5" type="checkbox" {{sides.GarlicBread}}></li>
										<li><label for="siideMacaroniPie{{eyedee}}">Macaroni Pie ($15.00)</label><input class="toggle" name="siideMacaroniPie{{eyedee}}" id="siideMacaroniPie{{eyedee}}" class="add_5" type="checkbox" {{sides.MacaroniPie}}></li>
										<li><label for="siideMacaroniSalad{{eyedee}}">Macaroni Salad ($15.00)</label><input class="toggle" name="siideMacaroniSalad{{eyedee}}" id="siideMacaroniSalad{{eyedee}}" class="add_5" type="checkbox" {{sides.MacaroniSalad}}></li>
										<li><label for="siideColeSlaw{{eyedee}}">Cole Slaw ($10.00)</label><input class="toggle" name="siideColeSlaw{{eyedee}}" id="siideColeSlaw{{eyedee}}" class="add_5" type="checkbox" {{sides.ColeSlaw}}></li>
										<li><label for="siideChickenKebabs{{eyedee}}">Chicken Kebabs ($20.00)</label><input class="toggle" name="siideChickenKebabs{{eyedee}}" id="siideChickenKebabs{{eyedee}}" class="add_5" type="checkbox" {{sides.ChickenKebabs}}></li>
										<li><label for="siideShrimpKebabs{{eyedee}}">Shrimp Kebabs ($30.00)</label><input class="toggle" name="siideShrimpKebabs{{eyedee}}" id="siideShrimpKebabs{{eyedee}}" class="add_5" type="checkbox" {{sides.ShrimpKebabs}}></li>
										<li><label for="siideFriedRice{{eyedee}}">Fried Rice ($15.00)</label><input class="toggle" name="siideFriedRice{{eyedee}}" id="siideFriedRice{{eyedee}}" class="add_5" type="checkbox" {{sides.FriedRice}}></li>
										<li><label for="siideNoodles{{eyedee}}">Noodles ($15.00)</label><input class="toggle" name="siideNoodles{{eyedee}}" id="siideNoodles{{eyedee}}" class="add_5" type="checkbox" {{sides.Noodles}}></li>
									</ul>
									</br>
									</br>
									</br>
									</br>
									</br>

									<h2>QUANTITY: <span class="quantityHeading" id="quantityValue{{eyedee}}">{{quantity}}</span></h2>
									<ul id="quantityButtons">
										<li><span id="decreaseQuantity{{eyedee}}">-</span></li>
										<li><span id="incrementQuantity{{eyedee}}">+</span></li>
									</ul>

									</br>

								</div>
							</li>
							{{/order_result}}
						</script>
					</ul>
				</div>
				<div id="place_order_wrapper"><a href="cart.php"><div id="place_order">Finish Up!</div></a></div>
			</form>
	</div>
</body>

<footer>
	<script type="text/javascript" src="Resources/js/order.js"></script>
</footer>

</html>
