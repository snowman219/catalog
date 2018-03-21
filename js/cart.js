var itemCodeArray, itemPriceArray, itemQuantityArray, itemSKUArray, itemDescriptionArray;

$(function(){
	
	var cartContent = "";	
	var totalCost = 0;
	var totalQuantity = 0;	
		
	if ( localStorage.getItem('itemCode') !== null ){

		// creating itemCode, itemPrice, itemQuantity Array
		
		itemCodeArray = localStorage.itemCode.split('@');		
		itemPriceArray = localStorage.itemPrice.split('@');
		itemQuantityArray = localStorage.itemQuantity.split('@');
		itemSKUArray = localStorage.itemSKU.split('@');		
		itemDescriptionArray = localStorage.itemDescription.split('@');			
				
		$('#shopping-cart').html((itemCodeArray.length - 1) + " items in cart");
				
		for ( i = 0; i < itemCodeArray.length - 1; i ++ ){
			cartContent += "<tr class='table100-head' sku=" + itemSKUArray[i + 1] + " description='" + itemDescriptionArray[i + 1] + "'>" +                                            
								"<td class='column2'><a href='#'>" + itemCodeArray[i + 1] + "</a>" + 
								"</td>" + 
								"<td class='column2'>" + 
									"<input type='number' onchange='getTotalCost(this)' value=" + itemQuantityArray[i + 1] + " class='form-control'>" + 
								"</td>" + 
								"<td class='column2'>" + itemPriceArray[i + 1] + "</td>" + 							
								"<td class='column2'>" + parseFloat( itemQuantityArray[i + 1] * itemPriceArray[i + 1] ).toFixed(2) + "</td>" + 
								"<td class='column4' onclick='removeCart(this)'><a href='#'><i class='fa fa-trash-o'></i></a>" + 
								"</td>" + 											
							"</tr>";
			
			totalCost += parseFloat( itemQuantityArray[i + 1] * itemPriceArray[i + 1] );
		}
	}else{
		$('#shopping-cart').html('shopping cart');
		$('#btn-submit').css('display', 'none');
	}	
	
	// shopping cart lists 
	
	cartContent += "<tr class='table100-head'>" +                                            
						"<td class='column4'>Total</td>" + 
						"<td class='column2'></td>" + 
						"<td class='column2'></td>" + 							
						"<td class='column2' id='total-price'>" + totalCost.toFixed(2) + "</td>" + 
						"<td class='column4'></td>" + 											
					"</tr>";
					
	$('#tbody-cart').html(cartContent);
	
	$('#btn-send-email').click(function(){
		sendEmail();
	});
	
	$('#btn-back').click(function(){
		document.location.href = "catalog.php";
	});
	
	$('#btn-back-catalog').click(function(){
		document.location.href = "catalog.php";
	})
			
});

function getTotalCost(obj){
	
	$(obj).closest('tr').children('td:eq(3)').html( ($(obj).val() * $(obj).closest('tr').children('td:eq(2)').text()).toFixed(2) );
	
	var totalCost = 0;
	
	for ( i = 0; i < $('#tbody-cart tr').length - 1; i ++  ){
		totalCost += parseFloat( $('#tbody-cart').children('tr:eq(' + i + ')').children('td:eq(3)').text() );
	}
	
	$('#total-price').html(totalCost.toFixed(2));
	
	// localStorage itemQuantity Changing
	
	var changeItem = itemCodeArray.indexOf( $(obj).closest('tr').children('td:eq(0)').text() );		
	
	if (changeItem > -1) {
		itemQuantityArray[changeItem] = $(obj).closest('tr').children('td:eq(1)').children('input').val();
	}	
	
	localStorage.removeItem('itemQuantity');	
	
	if ( itemQuantityArray.length > 1 ){
		for ( i = 0; i < itemQuantityArray.length - 1; i ++ ){
			localStorage.itemQuantity += "@" + itemQuantityArray[i + 1];			
		}
	}
	
	
}

function sendEmail(){
	
	if ( ($('#txt-firstname').val() == '') || ($('#txt-lastname').val() == '') || ($('#txt-company').val() == '') || ($('#txt-address1').val() == '') || ($('#txt-city').val() == '') || ($('#txt-state').val() == '') || ($('#txt-zipcode').val() == '') || ($('#txt-phone').val() == '') || ($('#txt-email').val() == '') || ($('#txt-ponumber').val() == '') ){
		$('#error_message').css('display', 'block');
		return;
	}
	
	if ( isNaN($('#txt-zipcode').val())){
		$('#error_message').css('display', 'block');
		return;
	}
		
	if ( !validateEmail($('#txt-email').val()) ){
		$('#error_message').css('display', 'block');
		return;
	}
	
	var insertCartContent = '';	
	var cartContent = '';	
	
	for ( i = 0; i < $('#tbody-cart tr').length - 1; i ++ ){		
		
		// cart contents for registering mysql database				
		insertCartContent += "('timestamp', '" + $('#tbody-cart tr:eq(' + i + ')').children('td:eq(0)').text() + "'," + $('#tbody-cart tr:eq(' + i + ')').children('td:eq(1)').children('input').val() + "," + $('#tbody-cart tr:eq(' + i + ')').children('td:eq(2)').text() + ", 'quotenumber'),";
		cartContent += $('#tbody-cart tr:eq(' + i + ')').children('td:eq(0)').text() + '@' + $('#tbody-cart tr:eq(' + i + ')').attr('sku') + '@' + $('#tbody-cart tr:eq(' + i + ')').attr('description') + '@' + $('#tbody-cart tr:eq(' + i + ')').children('td:eq(1)').children('input').val() + '@' + $('#tbody-cart tr:eq(' + i + ')').children('td:eq(2)').text() + '@';
	}
	
	cartContent = cartContent.substr(0, cartContent.length - 1);
	insertCartContent = insertCartContent.substr(0, insertCartContent.length - 1);	
	
	$('#error_message').css('display', 'none');
	
	$.ajax({		
		url: 'mail/mail.php',		
		type: 'POST',		
		data : {
			'firstname' : $('#txt-firstname').val(),
			'lastname' : $('#txt-lastname').val(),
			'company' : $('#txt-company').val(),
			'address1' : $('#txt-address1').val(),
			'address2' : $('#txt-address2').val(),
			'address3' : $('#txt-address3').val(),
			'city' : $('#txt-city').val(),
			'state' : $('#txt-state').val(),
			'zipcode' : $('#txt-zipcode').val(),
			'phone' : $('#txt-phone').val(),
			'email' : $('#txt-email').val(),
			'ponumber' : $('#txt-ponumber').val(),
			'comments' : $('#txt-comments').val(),
			'cartcontent' : cartContent,
			'insertCartContent' : insertCartContent
		},
		dataType:'text',
		
		success: function(data) {			
			$('#success_message').css('display', 'block');						
			$('.form-group').css('display', 'none');
			$('.modal-header').css('display', 'none');
			$('#send-email').css('display', 'none');
			$('#back-catalog').css('display', 'block');
			
			// localStorage removing
			
			localStorage.removeItem('itemCode');
			localStorage.removeItem('itemPrice');
			localStorage.removeItem('itemQuantity');			
			localStorage.removeItem('itemSKU');			
			localStorage.removeItem('itemDescription');			
			
		},
		error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
        }
	});
		
}

function validateEmail(email) {    
    var atpos = email.indexOf('@');
    var dotpos = email.lastIndexOf('.');
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {        
        return false;
    }else {return true;}
}

function removeCart(obj){
	
	$(obj).closest('tr').remove();
	
	// localStorage itemCode and itemPrice removing and recreating
	
	var removeItem = itemCodeArray.indexOf( $(obj).closest('tr').children('td:eq(0)').text() );		
		
	if (removeItem > -1) {
		itemCodeArray.splice(removeItem,1);
		itemPriceArray.splice(removeItem, 1);
		itemQuantityArray.splice(removeItem, 1);
		itemSKUArray.splice(removeItem, 1);
		itemDescriptionArray.splice(removeItem, 1);
	}		
	
	localStorage.removeItem('itemCode');
	localStorage.removeItem('itemPrice');	
	localStorage.removeItem('itemQuantity');	
	localStorage.removeItem('itemSKU');	
	localStorage.removeItem('itemDescription');	
	
	if ( itemCodeArray.length > 1 ){

		// shopping cart item counts changing in menu
		
		$('#shopping-cart').html((itemCodeArray.length - 1) + " items in cart");		
		
		for ( i = 0; i < itemCodeArray.length - 1; i ++ ){
			localStorage.itemCode += '@' + itemCodeArray[i + 1];
			localStorage.itemPrice += '@' + itemPriceArray[i + 1];
			localStorage.itemQuantity += '@' + itemQuantityArray[i + 1];
			localStorage.itemSKU += '@' + itemSKUArray[i + 1];
			localStorage.itemDescription += '@' + itemDescriptionArray[i + 1];
		}
	}else{
		$('#shopping-cart').html("shopping cart");		
	}
	
	// recalculating total cost
	
	getTotalCost(obj);
		
}



























