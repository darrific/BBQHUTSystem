redirect();

function redirect(){

	if(window.navigator.userAgent.match(/Tablet PC/i)){
		currentlocation = window.location.pathname;
		if (currentlocation === ("/order.php")){
			currentlocation = "/blockoff.html";
			window.location.href="http://m.originalbbqhut.com" + currentlocation;
		}
		return;
	} else {
		/*alert('False - Tablet - ' + navigator.userAgent);*/
	}

	if(window.navigator.userAgent.match(/Mobile/i)
	|| window.navigator.userAgent.match(/iPhone/i)
	|| window.navigator.userAgent.match(/iPod/i)
	|| window.navigator.userAgent.match(/IEMobile/i)
	|| window.navigator.userAgent.match(/Windows Phone/i)
	|| window.navigator.userAgent.match(/Android/i)
	|| window.navigator.userAgent.match(/BlackBerry/i)
	|| window.navigator.userAgent.match(/webOS/i))
	{	
		currentlocation = window.location.pathname;
		if(currentlocation === "/order.php"){
			currentlocation = "/blockoff.html";
			window.location.href="http://m.originalbbqhut.com" + currentlocation;			
		}
		return;
	} else {
		currentlocation = window.location.pathname;
		if(currentlocation === "/order.php"){
			currentlocation = "/blockoff.html";
		}
		window.location.href="http://test.originalbbqhut.com" + currentlocation;			
	}

	if(window.navigator.userAgent.match(/Tablet/i)
	|| window.navigator.userAgent.match(/iPad/i)
	|| window.navigator.userAgent.match(/Nexus 7/i)
	|| window.navigator.userAgent.match(/Nexus 10/i)
	|| window.navigator.userAgent.match(/KFAPWI/i))
	{
		currentlocation = window.location.pathname;
		if(currentlocation === "/order.php"){
			currentlocation = "/blockoff.html";
			window.location.href="http://m.originalbbqhut.com" + currentlocation;			
		}
		return;
	} else {
		/*alert('False - Tablet - ' + navigator.userAgent);*/
		currentlocation = window.location.pathname;
		if(currentlocation === "/order.php"){
			currentlocation = "/blockoff.html";
		}
		window.location.href="http://test.originalbbqhut.com" + currentlocation;			
	}
}