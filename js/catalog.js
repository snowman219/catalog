var itemCount = 0;
var itemCodeArray, itemPriceArray, itemQuantityArray, itemSKUArray, itemDescriptionArray;

$(function(){	
	if ( localStorage.getItem('itemCode') !== null ){		
		itemCodeArray = localStorage.itemCode.split('@');
		itemCount = localStorage.itemQuantity.split('@').length - 1;
		
		$('#shopping-cart').html((itemCodeArray.length - 1) + " items in cart");
	}else{
		$('#shopping-cart').html("shopping cart");
	}

	$('#txt-search').keydown(function(event){
		
		if ( event.keyCode == 13 ){
			searchCatalogLists();
		}else{
			return;
		}
		
	});
	
	$('#btn-search').click(function(){
		searchCatalogLists();
	});	
	
	getPageCatalogList($('.active'), 0, 0)
	
});

function addToCart(obj){		
	
	if ( $(obj).text() == 'Add to Cart' ){
		$(obj).html('Cancel');
		$(obj).css('color', 'cadetblue');				
		itemCount ++;		
		$('#shopping-cart').html(itemCount + ' items in cart');
		
		// creating localStorage for itemCode, itemPrice, itemQuantity 
		
		localStorage.itemCode += '@' + $(obj).closest('tr').children('td:eq(1)').text();
		localStorage.itemPrice += '@' + $(obj).closest('tr').children('td:eq(4)').text();
		localStorage.itemQuantity += '@1';
		localStorage.itemSKU += '@' + $(obj).closest('tr').children('td:eq(2)').text();
		localStorage.itemDescription += '@' + $(obj).closest('tr').children('td:eq(3)').text();
	}
	else{
		$(obj).html('Add to Cart');		
		$(obj).css('color', 'rgba(95, 158, 160)');
		itemCount --;

		// localStorage recreating on cancel event 
		
		if ( localStorage.getItem('itemCode') !== null ){		
			itemCodeArray = localStorage.itemCode.split('@');
			itemPriceArray = localStorage.itemPrice.split('@');
			itemQuantityArray = localStorage.itemQuantity.split('@');			
			itemSKUArray = localStorage.itemSKU.split('@');	
			itemDescriptionArray = localStorage.itemDescription.split('@');				
		}
		
		var removeItem = itemCodeArray.indexOf( $(obj).closest('tr').children('td:eq(1)').text() );		
	
		if ( removeItem > -1 ) {
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
			for ( i = 0; i < itemCodeArray.length - 1; i ++ ){
				localStorage.itemCode += '@' + itemCodeArray[i + 1];
				localStorage.itemPrice += '@' + itemPriceArray[i + 1];
				localStorage.itemQuantity += '@' + itemQuantityArray[i + 1];
				localStorage.itemSKU += '@' + itemSKUArray[i + 1];
				localStorage.itemDescription += '@' + itemDescriptionArray[i + 1];
			}
		}
		
		itemCount > 0 ? $('#shopping-cart').html(itemCount + ' items in cart') : $('#shopping-cart').html('shopping cart');		
			
	}					
}

function getPageCatalogList(obj, str, idx){
	
	var pageNumber = 1;
	var pageCount = $('.pagination li').length - 2;		
	var currentActiveObject = $('.active');	
	
	$(currentActiveObject).removeClass('active');
	
	switch(idx) {
		case 0: 
			pageNumber = $(obj).attr('pagenumber');
			$(obj).addClass('active');
			break;
		case 1:
			pageNumber = ($(currentActiveObject).attr('pagenumber') > pageCount) ? 1 : parseInt( $(currentActiveObject).attr('pagenumber') ) + 1;			
			if ( pageNumber <= pageCount ){				
				$(currentActiveObject).next('li').addClass('active');
			}else{				
				$('.pagination li:eq(1)').addClass('active');
			}			
			break;
		case -1:
			pageNumber = ($(currentActiveObject).attr('pagenumber') < 1) ? pageCount : parseInt( $(currentActiveObject).attr('pagenumber') ) - 1;			
			if ( pageNumber >= 1 ){				
				$(currentActiveObject).prev('li').addClass('active');
			}else{				
				$('.pagination li:eq(' + pageCount + ')').addClass('active');
			}
			break;		
	}

	switch(pageNumber) {
		case 0:
			pageNumber = pageCount;
			break;
		case pageCount + 1:
			pageNumber = 1;
			break;
	}
	
	// page number is not existed
	if ( pageCount == -2 ){ pageNumber = 1; }

	// checking localStorage is set or not	
	if ( localStorage.getItem('itemCode') !== null ){		
		$.ajax({
			url: 'ajax-php/get-page-cataloglists.php',
			type: 'POST',		
			data : {
				'pageNum' : pageNumber,
				'searchOption' : str,
				'searchStr' : $('#txt-search').val(),
				'cartOption' : 1,
				'itemCodeArray' : itemCodeArray
			},
			dataType:'text',
			
			success: function(data) {
				$('#tbody-cataloglists').html(data);
			},
			error: function( jqXhr, textStatus, errorThrown ){
				console.log( errorThrown );
			}
		});
	}else{
		$.ajax({
			url: 'ajax-php/get-page-cataloglists.php',
			type: 'POST',		
			data : {
				'pageNum' : pageNumber,
				'searchOption' : str,
				'searchStr' : $('#txt-search').val(),
				'cartOption' : 0
			},
			dataType:'text',
			
			success: function(data) {
				$('#tbody-cataloglists').html(data);
			},
			error: function( jqXhr, textStatus, errorThrown ){
				console.log( errorThrown );
			}
		});
	}
		
}

function searchCatalogLists(){

	if ( $('#txt-search').val() != '' ){
		$.ajax({
			url: 'ajax-php/search-cataloglists.php',
			type: 'POST',		
			data : {
				'searchStr' : $('#txt-search').val()
			},
			dataType:'text',
			
			success: function(data) {								
				var searchData = eval('(' + data + ')');
				$('.pagination').html(searchData.pagecontent);
				$('#tbody-cataloglists').html(searchData.list);
				
			},
			error: function( jqXhr, textStatus, errorThrown ){
				console.log( errorThrown );
			}
		});
	}else{
		document.location.href = 'catalog.php';
	}
	
}








































