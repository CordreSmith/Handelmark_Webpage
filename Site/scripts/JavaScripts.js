function RequestAJAX(){
	var ajaxRequest;
   	try{
      // Opera 8.0+, Firefox, Safari
      ajaxRequest = new XMLHttpRequest();
   	}catch (e){
      
      // Internet Explorer Browsers
      try{
         ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
      }catch (e) {
         
         try{
            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
         }catch (e){
         
            // Something went wrong
            alert("Your browser broke!");
            return false;
         }
      }
   	}

   	return(ajaxRequest);
}

function Login_Register(Type){
   	var ajaxRequest;
   	ajaxRequest = RequestAJAX();

   	if (Type == "Login"){
   
   		ajaxRequest.onreadystatechange = function(){
   
	      	if(ajaxRequest.readyState == 4){

	        	if (ajaxRequest.responseText == "error404"){
	         		alert("Gebruikersnaam en wagwoord kombinasie is nie geldig!");
	         	}
	         	else{
		         	var tempstr  = ajaxRequest.responseText;
		         	var placeof1 = tempstr.indexOf(':');
		         	var usertype = tempstr.substring(0,placeof1);

		         	if (usertype == "User"){
			         	var placeof2 = tempstr.indexOf(',');
			         	var surname  = tempstr.substring(placeof2+1,tempstr.length);
			         	var name     = tempstr.substring(placeof1+1,placeof2);

			         	alert("Welkom "+name+" "+surname+" U het suksesvol in getokkel!");
			         	$("#LoginModal").removeClass('fade').modal('hide');
		         		document.location.href ="Main_Page.php";
			        }
			        else if (usertype == "Shopkeeper"){
			        	var placeof2 = tempstr.indexOf(',');
			        	var placeof3 = tempstr.indexOf('-');
			        	var name     = tempstr.substring(placeof1+1,placeof2);
			         	var surname  = tempstr.substring(placeof2+1,placeof3);
			         	var shopname = tempstr.substring(placeof3+1,tempstr.length);

			         	alert("Welkom "+name+" "+surname+" U het suksesvol in getokkel!");
			         	$("#LoginModal").removeClass('fade').modal('hide');
			         	document.location.href ="shop_page.php";
			        }

		         	
		         	sessionStorage.userType = usertype;
		         	sessionStorage.shopName = shopname;

	         	}
	      	}
   		}
	   
	   // Now get the value from user and pass it to
	   // server script.
	   var username = document.getElementById('user').value;
	   var password = document.getElementById('pswd1').value;
	   var queryString = "?name=" + username ;
	   
	   queryString +=  "&password=" + password;
	   ajaxRequest.open("GET", "scripts/login.php" + queryString, true);
	   ajaxRequest.send(null);

	}
	else if (Type == "User"){

		ajaxRequest.onreadystatechange = function(){
   
	      	if(ajaxRequest.readyState == 4){

	        	if (ajaxRequest.responseText == "success"){
	        		alert("Gebruiker is gunstig bygevoeg, tokkel in!");
	        		document.location.reload();
	        	}
	        	else if (ajaxRequest.responseText == "fail"){
	        		alert("Opsie! Iets het verkeerd gegaan. (VOUT101)");
	        	}
	        	else {
	        		alert("Opsie! Iets het verkeerd gegaan. (VOUT102)");
	        	} 
	      	}
   		}
	   
		// Now get the value from user and pass it to
		// server script.
		var firstname = document.getElementById('fnameu').value;
		var lastname  = document.getElementById('lnameu').value;
		var password  = document.getElementById('pswd2').value;

		var queryString = "?firstname=" + firstname ;   
		queryString +=  "&lastname=" + lastname + "&password=" + password;

		ajaxRequest.open("GET", "scripts/register_user.php" + queryString, true);
		ajaxRequest.send(null);

    }
    else if (Type == "Shop"){
    	ajaxRequest.onreadystatechange = function(){
   
	      	if(ajaxRequest.readyState == 4){

	        	if (ajaxRequest.responseText == "success"){
	        		alert("U winkel is suksesvol toegevoeg, tokkel in!!");
	        		document.location.reload();
	        	}
	        	else if (ajaxRequest.responseText == "fail"){
	        		alert("Opsie! Iets het verkeerd gegaan. (VOUT103)");
	        	}
	        	else {
	        		alert("Opsie! Iets het verkeerd gegaan. (VOUT104)");
	        	} 
	      	}
   		}
	   
	    // Now get the value from user and pass it to
	    // server script.

	    var firstname   = document.getElementById('fnames').value;
	    var lastname    = document.getElementById('lnames').value;
	    var num         = document.getElementById('nums').value;
	    var DOB         = document.getElementById('dates').value;
	    var shopname    = document.getElementById('shpname').value;
	    var password    = document.getElementById('pswd3').value;
	    var queryString = "?firstname=" + firstname ;
	   
	    queryString +=  "&lastname=" + lastname + "&dob=" + DOB + "&number=" + num +"&shopname=" + shopname + "&password=" + password;
	    ajaxRequest.open("GET", "scripts/register_shop.php" + queryString, true);
	    ajaxRequest.send(null);
    }

}

function Logout(){
	var ajaxRequest;
   	ajaxRequest = RequestAJAX();

   	ajaxRequest.open("GET", "scripts/destroy_session.php");
	ajaxRequest.send(null);

	//alert(xmlhttp.responseText); 
	document.location.href ="landing_Page.php";
	
}

function CreateShopTab()
{ 

	var ajaxRequest;
   	ajaxRequest = RequestAJAX();

	ajaxRequest.onreadystatechange = function(){
   
	      	if(ajaxRequest.readyState == 4)
	      	{

	        	if (ajaxRequest.responseText == "error404")
	        	{
	        		alert("Opsie! Iets het verkeerd gegaan. (VOUT105)");
	        		exit();
	        	}
	        	else if (ajaxRequest.responseText == "noitems")
	        	{
	        		exit();
	        	}
	        	else
	        	{
	        		var shopnames = ajaxRequest.responseText;
	        		var count = shopnames.split(',').length-1;
					for (i = 1;i<= count;i++)
					{

						var charplace = shopnames.indexOf(",");
						var shopname = shopnames.substring(0,charplace);
						shopnames = shopnames.substring(charplace+1,shopnames.length);

						/* CREATE SHOP ITEM */

					    var div = document.createElement('div');
					    div.className = 'col-sm-6 col-lg-6 col-md-6';
					    div.id = 'shopblock';
					    var div1 = document.createElement('div');
					    div1.className = 'thumbnail';
					    var div2 = document.createElement('div');
					    div2.className = 'caption';
					    var heading = document.createElement('h4');
					    var button = document.createElement('button');
					    button.className = 'btn-normal';
					    button.id = 'shopbutton';
					    button.innerHTML = shopname;
					    button.onclick = changeToShop;

					    heading.appendChild(button);
					    div2.appendChild(heading);
					    div1.appendChild(div2);
					    div.appendChild(div1);

					    var element = document.getElementById("shops");
					    element.appendChild(div);
					}
	        	}
	      	}
   		}

   	ajaxRequest.open("GET", "scripts/get_shops.php");
	ajaxRequest.send(null);

}

function addItem()
{
	var ajaxRequest;
   	ajaxRequest = RequestAJAX();

	ajaxRequest.onreadystatechange = function(){

		if(ajaxRequest.readyState == 4){
			if (ajaxRequest.responseText == "success")
			{
				alert("Item is suksesvol bygevoeg.");
				document.location.reload();
			}
			else if (ajaxRequest.responseText == "fail")
			{
				alert("Opsie! Iets het verkeerd gegaan. (VOUT106)");
			}
			else 
			{
				alert("Opsie! Iets het verkeerd gegaan. (VOUT107)");
			}
		}
	}

	// Now get the value from user and pass it to
	// server script.
	var prodname = document.getElementById('productname').value;
	var prodprice = document.getElementById('productprice').value;
	var prodquantity = document.getElementById('productquant').value;
	var shopname = sessionStorage.shopName;
	var queryString = "?prodname=" +prodname ;

	queryString +=  "&price=" + prodprice + "&quantity=" + prodquantity + "&shopname=" + shopname;
	ajaxRequest.open("GET", "scripts/add_item.php" + queryString, true);
	ajaxRequest.send(null);
	
}

function deleteItem()
{
	var ajaxRequest;
   	ajaxRequest = RequestAJAX();

	ajaxRequest.onreadystatechange = function(){

		if(ajaxRequest.readyState == 4){
			if (ajaxRequest.responseText == "success")
			{
				alert("Item is suksesvol verwyder.");
				document.location.reload();
			}
			else if (ajaxRequest.responseText == "fail")
			{
				alert("Opsie! Iets het verkeerd gegaan. (VOUT108)");
			}
			else 
			{
				alert("Opsie! Iets het verkeerd gegaan. (VOUT109)");
			}
		}
	}

	// Now get the value from user and pass it to
	// server script.
	var prodname = document.getElementById('productname2').value;
	var shopname = sessionStorage.shopName;
	var queryString = "?prodname=" +prodname ;

	queryString += "&shopname=" + shopname;

	ajaxRequest.open("GET", "scripts/remove_item.php" + queryString, true);
	ajaxRequest.send(null);
}

function changeToShop()
{	

	ShopName = this.innerHTML;
	sessionStorage.shopName = ShopName;
	document.location.href ="shop_page.php";

}

function createItemTabs()
{
	if (sessionStorage.shopName) {
    	document.getElementById('Shopnamep').innerHTML = sessionStorage.shopName;
	}
	else
	{
		document.getElementById('Shopnamep').innerHTML = "Error";
	}


	var ajaxRequest;
   	ajaxRequest = RequestAJAX();

	ajaxRequest.onreadystatechange = function(){
   
	      	if(ajaxRequest.readyState == 4)
	      	{

	        	if (ajaxRequest.responseText == "error404")
	        	{
	        		alert("Opsie! Iets het verkeerd gegaan. (VOUT110)");
	        	}
	        	else if (ajaxRequest.responseText == "noitems")
	        	{
	        		
	        	}
	        	else
	        	{
	        		var itemnames = ajaxRequest.responseText;
	        		var count = itemnames.split(';').length-1;
					for (i = 1;i<= count;i++)
					{

						var placeof1 = itemnames.indexOf(",");
						var placeof2 = itemnames.indexOf(":");
						var placeof3 = itemnames.indexOf(";");
						var placeof4 = itemnames.indexOf("_");
						var placeof5 = itemnames.indexOf("#");
						var prodname = itemnames.substring(0,placeof1);
						var prodprice = itemnames.substring(placeof1+1,placeof2);
						var prodquant = itemnames.substring(placeof2+1,placeof3);
						var prodcode  = itemnames.substring(placeof3+1,placeof4);
						var imgurl    = itemnames.substring(placeof4+1,placeof5);
						itemnames = itemnames.substring(placeof5+1,itemnames.length);

						if (prodquant > 0)
						{
							/* CREATE ITEM BOX */

						    var div1 = document.createElement('div');
						    div1.className = 'col-sm-4 col-lg-4 col-md-4';
						    var div2 = document.createElement('div');
						    div2.className = 'thumbnail';
						    var div3 = document.createElement('div');
						    div3.className = 'caption';
						    var div4 = document.createElement('div');
						    div4.className = 'ratings';

						    var image = document.createElement('img');
						    image.src = imgurl;
						    image.alt = "No Image Uploaded";

						    var heading1 = document.createElement('h4');
						    heading1.className = 'pull-right';
						    heading1.innerHTML = "R " + prodprice;
						    var heading2 = document.createElement('h4');
						    heading2.innerHTML = prodname;

						    var button = document.createElement('button');
						    button.className = 'btn-normal';
						    button.id = prodcode;						   
						    

						    if (sessionStorage.userType == "Shopkeeper")
						    {
						    	button.innerHTML = "Verwyder";
						    	button.onclick = "";
						    	
						    }
						    else if (sessionStorage.userType == "User")
						    {
						    	button.innerHTML = "Voeg by Kooptrollie";
						    	button.onclick = addtoCart;
						    }

						    var p = document.createElement('p');
						    p.className = "pull-right";
						    p.innerHTML = prodquant + " left!";

						    div4.appendChild(p);
						    div4.appendChild(button);

						    div3.appendChild(heading1);
						    div3.appendChild(heading2);

						    div2.appendChild(image);
						    div2.appendChild(div3);
						    div2.appendChild(div4);

						    div1.appendChild(div2);


						    var element = document.getElementById("items");
						    element.appendChild(div1);
						}
					}
	        	}
	      	}
   		}

   	ajaxRequest.open("GET", "scripts/get_items.php");
	ajaxRequest.send(null);
}

function addtoCart()
{
	Prodcode = this.id;
	var ajaxRequest;
   	ajaxRequest = RequestAJAX();

	ajaxRequest.onreadystatechange = function()
	{
   
	      	if(ajaxRequest.readyState == 4)
	      	{
	      		if (ajaxRequest.responseText == "success")
	      		{
	      			alert("Item is suksesvol bygevoeg by U se Kooptrollie");
	      			document.location.reload();
	      		}
	      		else if (ajaxRequest.responseText == "noitemsleft")
	      		{
	      			alert("All the items is ongelukig uitverkoop.");
	      		}
	      		else if (ajaxRequest.responseText == "fail") 
	      		{
	      			alert("Opsie! Iets het verkeerd gegaan. (VOUT111)");
	      		}
	      		else
	      		{
	      			alert("Opsie! Iets het verkeerd gegaan. (VOUT112)");
	      		}
	      	}
	}
	var queryString = "?prodcode=" + Prodcode ;

	ajaxRequest.open("GET", "scripts/addto_basket.php" + queryString, true);
	ajaxRequest.send(null);
}

function checkoutStart()
{
	var ajaxRequest;
   	ajaxRequest = RequestAJAX();

	ajaxRequest.onreadystatechange = function()
	{
   
	      	if(ajaxRequest.readyState == 4)
	      	{
	      		if (ajaxRequest.responseText == "nobasket") 
	      		{
	      			alert("U het nog geen items gekies nie!");
	      		}
	      		else
	      		{
	      			var string     = ajaxRequest.responseText;
	      			var placeof1   = string.indexOf(",");
	      			var placeof2   = string.indexOf("-");
	      			var baskcode   = string.substring(0,placeof1);
	      			var totalCost  = string.substring(placeof1+1,placeof2);
	      			var totalItems = string.substring(placeof2+1,string.length);

	      			document.getElementById("cost").innerHTML     = "U kosted beloop R "  + totalCost;
	      			document.getElementById("numitems").innerHTML = "Totale Items gekoop is, " + totalItems;

	      			sessionStorage.BasketCode = baskcode;
	      		}
	      	}
	}


	ajaxRequest.open("GET", "scripts/checkout.php", true);
	ajaxRequest.send(null);


	
}

function checkoutFinish()
{
	var ajaxRequest;
   	ajaxRequest = RequestAJAX();

	ajaxRequest.onreadystatechange = function()
	{
   
	      	if(ajaxRequest.readyState == 4)
	      	{
	      		if (ajaxRequest.responseText == "success") 
	      		{
	      			alert("U betalling is goedgekeur en U Items sal so spoeding moontlik by U afgelewer word!");
	      			document.location.reload();
	      		}
	      		else
	      		{
	      			alert("Opsie! Daar het n probleem voorgeval terwyl ons U betaling goedgekeur het!")
	      		}
	      	}
	}
	var queryString = "?baskcode=" + sessionStorage.BasketCode ;

	ajaxRequest.open("GET", "scripts/checkoutfinal.php" + queryString, true);
	ajaxRequest.send(null);
	
}

function updateBadge()
{
	var ajaxRequest;
   	ajaxRequest = RequestAJAX();

	ajaxRequest.onreadystatechange = function()
	{
   
	      	if(ajaxRequest.readyState == 4)
	      	{
	      		if (ajaxRequest.responseText == "nobasket") 
	      		{
	      			document.getElementById("itemAmount").innerHTML = 0;
	      		}
	      		else
	      		{
	      			var string     = ajaxRequest.responseText;
	      			var placeof2   = string.indexOf("-");
	      			var totalItems = string.substring(placeof2+1,string.length);

	      			document.getElementById("itemAmount").innerHTML = totalItems;
	      		}
	      	}
	}


	ajaxRequest.open("GET", "scripts/checkout.php", true);
	ajaxRequest.send(null);
}

function addPhoto()
{
	var ajaxRequest;
   	ajaxRequest = RequestAJAX();

	ajaxRequest.onreadystatechange = function()
	{
   
	      	if(ajaxRequest.readyState == 4)
	      	{

	      	}
	}


	ajaxRequest.open("GET", "scripts/upload.php", true);
	ajaxRequest.send(null);
}