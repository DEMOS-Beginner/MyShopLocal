function getData(obj_form) {
    
    var hData = {};
    $('input, textarea, select', obj_form).each(function() {
        if (this.name && this.name != '') {
            hData[this.name] = this.value;
            console.log('hData()');
        }
    });

    return hData;
}


function newCategory() {
	var postData = getData('#blockNewCategory');

	$.ajax({
		type: 'POST',
		async: false,
		data: postData,
		url: '/admin/addnewcat',
		dataType: 'json',
		success: function (data) {
			if (data['success']) {
				$('#newCategoryName').val('');
			}
			alert(data['message']);
		},
        error: function (request, status, error) {
            alert(request.responseText);
        }
	})
}

function updateCat(itemId) {
	var parentId = $('#parentId_'+itemId).val();
	var newName = $('#itemName_'+itemId).val();
	var postData = {itemId: itemId, newName: newName, parentId: parentId};

	$.ajax({
		type: 'POST',
		async: false,
		data: postData,
		url: '/admin/updatecategory',
		dataType: 'json',
		success: function (data) {
			alert(data['message']);
		},
        error: function (request, status, error) {
            alert(request.responseText);
        }
	})
}

function addProduct(itemId) {

	itemName = $('#newItemName').val();
	itemPrice = $('#newItemPrice').val();
	itemDesc = $('#newItemDesc').val();
	itemCat = $('#newCatId').val();

	var postData = {
		itemName: itemName,
		itemPrice: itemPrice,
		itemDesc: itemDesc,
		itemCat: itemCat
	}

	$.ajax({
		type: 'POST',
		async: false,
		data: postData,
		url: '/admin/addproduct',
		dataType: 'json',
		success: function (data) {
			alert(data['message']);
		},
        error: function (request, status, error) {
            alert(request.responseText);
        }
	})
}

function uploadProduct(itemId) {

	itemName = $('#itemName_'+itemId).val();
	itemPrice = $('#itemPrice_'+itemId).val();
	itemDesc = $('#itemDesc_'+itemId).val();
	itemCat = $('#itemCatId_'+itemId).val();
	itemStatus = $('#itemStatus_'+itemId).val();
	if (! itemStatus) {
		itemStatus = 1;
	} else {
		itemStatus = 0;
	}

	var postData = {
		itemName: itemName,
		itemPrice: itemPrice,
		itemDesc: itemDesc,
		itemCat: itemCat,
		itemStatus: itemStatus,
		itemId: itemId
	}

	$.ajax({
		type: 'POST',
		async: false,
		data: postData,
		url: '/admin/updateproduct',
		dataType: 'json',
		success: function (data) {
			alert(data['message']);
		},
        error: function (request, status, error) {
            alert(request.responseText);
        }
	})
}

function showProducts(id) {
    if ($('#purchasesForOrderId_'+id).css('display') != 'table-row') {
        $('#purchasesForOrderId_'+id).show();
    } else {
        $('#purchasesForOrderId_'+id).hide();
    }
    
} 

function updateOrderStatus(id) {
	var status = $('#itemStatus_'+id).attr('checked');
	if (! status) {
		status = 1;
	} else {
		status = 0;
	}

	var postData = {itemId: id, status: status};
	$.ajax({
		type: 'POST',
		async: false,
		data: postData,
		url: '/admin/setorderstatus',
		dataType: 'json',
		success: function (data) {
			alert(data['message']);
		},
        error: function (request, status, error) {
            alert(request.responseText);
        }
	})
}

function uploadDatePayment(id) {
	var datePayment = $('#datePayment_'+id).val();


	var postData = {itemId: id, datePayment: datePayment};
	$.ajax({
		type: 'POST',
		async: false,
		data: postData,
		url: '/admin/setdatepayment',
		dataType: 'json',
		success: function (data) {
			alert(data['message']);
		},
        error: function (request, status, error) {
            alert(request.responseText);
        }
	})
}



function createXML() {
	$.ajax({
		type: 'POST',
		async: false,
		dataType: 'html',
		url: '/admin/createxml',
		success: function(data) {
			$('#xml-place').html(data);
			window.open('http://www.myshop.local/xml/products.xml', '_blank');
		}
	})
}