function addToCart(itemId){
    console.log("js - addToCart");
    $.ajax({
        type: 'POST',
        url: "/cart/addtocart/"+itemId,
        dataType : 'json',
        success: function (data) {
            if(data['success']){
                $('#cartCntItems').html(data['cntItems']);

                $('#addCart_'+itemId).hide();
                $('#removeCart_'+itemId).show();
            }
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    })
}

function removeFromCart(itemId){
    console.log("js - removeFromCart("+itemId+')');
    $.ajax({
        type: 'POST',
        url: "/cart/removefromcart/"+itemId,
        dataType : 'json',
        success: function (data) {
            if(data['success']){
                $('#cartCntItems').html(data['cntItems']);

                $('#addCart_'+itemId).show();
                $('#removeCart_'+itemId).hide();
            }
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    })
}

//Подсчитывает стоимость товара
function conversionPrice(itemId) {
    var newCnt = $('#itemCnt_'+itemId).val();
    var itemPrice = $('#itemPrice_'+itemId).attr('value');
    var itemRealPrice = newCnt*itemPrice;

    $('#itemRealPrice_'+itemId).html(itemRealPrice);
} 

function getData(obj_form) {
    
    var hData = {};
    $('input, textarea', obj_form).each(function() {
        if (this.name && this.name != '') {
            hData[this.name] = this.value;
            console.log('hData()');
        }
    });

    return hData;
}

function registerNewUser() {
    var postData = getData('#registerBox');

    $.ajax({
        type: 'POST',
        async: false,
        url: '/user/register',
        data: postData,
        dataType: 'json',
        success: function(data) {
            if (data['success']) {

                $('#registerBox').hide();
                $('#userLink').attr('href', '/user');
                $('#userLink').html(data['userName']);
                $('#userBox').show();
                $('#loginBox').hide();
                $('#btnSaveOrder').show();
                
            }
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    });
}

function login() {
    console.log('login');
    var email = $('#loginEmail').val();
    var pwd = $('#loginPwd').val();

    var postData = 'email='+email+'&pwd='+pwd;

    $.ajax({
        type: 'POST',
        async: false,
        url: '/user/login',
        data: postData,
        dataType: 'json',
        success: function(data) {
            if (data['success']) {
                $('#registerBox').hide();
                $('#loginBox').hide();
                $('#userLink').attr('href', '/user');
                $('#userLink').html(data['displayName']);
                $('#userBox').show();
                $('#name').val(data['name']);
                $('#phone').val(data['phone']);
                $('#adress').val(data['adress']);
                $('#btnSaveOrder').show();
            } else {
                alert(data['message']);
            }
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    });
}

function showRegisterBox() {
    if ($('#registerBoxHidden').css('display') != 'block') {
        $('#registerBoxHidden').show();
    } else {
        $('#registerBoxHidden').hide();
    }
    
} 

function updateUserData() {
    console.log('updateUserData()');
    var newName = $('#newName').val();
    var newAdress = $('#newAdress').val();
    var newPwd1 = $('#newPwd1').val();
    var newPwd2 = $('#newPwd2').val();
    var curPwd = $('#curPwd').val();
    var newPhone = $('#newPhone').val(); 

    var postData = {phone: newPhone, adress: newAdress, pwd1: newPwd1, pwd2: newPwd2,
        curPwd: curPwd, name: newName};

    $.ajax({
        type: 'POST',
        data: postData,
        dataType: 'json',
        async: false,
        url: 'user/update',
        success: function (data) {
            if (data['success']) {
                $('#userLink').html(data['userName']);
            }
            alert(data['message']);
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    });

}

function saveOrder() {
    var postData = getData('form');
    $.ajax({
        type: 'POST',
        async: false,
        data: postData,
        url: '/cart/saveorder',
        dataType: 'json',
        success: function(data) {
            alert(data['message']);
            if (data['success']) {
                document.location = '/';
            }
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }

    });
}


function showProducts(id) {
    if ($('#purchasesForOrderId_'+id).css('display') != 'table-row') {
        $('#purchasesForOrderId_'+id).show();
    } else {
        $('#purchasesForOrderId_'+id).hide();
    }
    
} 
