const prices = {
    orderPrices: 0,
    deliveryPrices: 0,
    discount: 0,
}
$(document).ready(function () {
    var deliveryInfo = {
        payment_type_id: 2,
        note: "ABC",
        required_note: "KHONGCHOXEMHANG",
        return_phone: "",
        return_address: "call customer",
        return_district_id: null,
        return_ward_code: "",
        client_order_code: "",
        to_name: "",
        to_phone: "",
        to_address: "",
        to_ward_code: "",
        to_district_id: "",
        cod_amount: 0,
        content: "Agricultural",
        weight: 200,
        length: 15,
        width: 15,
        height: 15,
        send_ward: "2194",
        insurance_value: 2000000,
        service_type_id:2,
        coupon:null,
        items: []
    } // thông tin đơn hàng trước khi lên đơn theo tiêu chuẩn của ghn api
    const paymentInfo = { // thông tin thanh toán chứa giá cuối cùng và người thanh toán
        totalPrices: 0,
        deliveryPrices : 0,
        discount: 0,
        customer : "", 
    }

    $.get("../api/authenticate/loginAuth.php",
        function (data, textStatus, jqXHR) {
            if(!data.status) {
                $.ajax({
                    url: 'https://online-gateway.ghn.vn/shiip/public-api/master-data/province',
                    type: 'GET',
                    headers: {
                      'Token': token,
                    },
                    success: function(response) {
                      response.data.forEach(province => {
                        $(`<option value="${province.ProvinceID + "-" + province.ProvinceName}">${province.ProvinceName}</option>`).appendTo($("#payment-city"));
                      });
                    }
                });
                $("#payment-city").change((e) => {
                var provinceID = parseInt(e.target.value.split("-")[0]);
                $.ajax({
                    url: 'https://online-gateway.ghn.vn/shiip/public-api/master-data/district',
                    type: 'GET',
                    data: {
                    'province_id' : provinceID,
                    },
                    headers: {
                    'Token': token,
                    },
                    success: function(response) {
                    response.data.forEach(district => {
                        $(`<option value="${district.DistrictID + "-" + district.DistrictName}">${district.DistrictName}</option>`).appendTo($("#payment-district"));
                    });
                    }
                });
                })
                
                $("#payment-district").change((e) => {
                var districtID = parseInt(e.target.value.split("-")[0]);
                $.ajax({
                    url: `https://online-gateway.ghn.vn/shiip/public-api/master-data/ward?district_id=${districtID}`,
                    type: 'GET',
                    headers: {
                    'Token': token,
                    },
                    success: function(response) {
                    response.data.forEach(ward => {
                        $(`<option value="${ward.WardCode + "-" + ward.WardName}">${ward.WardName}</option>`).appendTo($("#payment-ward"));
                    });
                    }
                });
                })
                paymentInfo.customer = null;
            }
            else {
                paymentInfo.customer = data.customerId;
            }
        },
        "json"
    );

    $('#fast-delivery').change((e) => {
        if(!checkDeliveryInfo()){
            e.preventDefault();
            alert("Please enter your delivery infomation");
            $('#fast-delivery').prop('checked', false);
            return;
        }
    
        if (e.target.checked) {
            if($('#normal-delivery').is(':checked')) {
                $('#normal-delivery').prop('checked', false);
            }
            deliveryInfo = getDeliveryInfo(deliveryInfo);
            $.ajax({
                url: 'https://online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/preview',
                type: 'POST',
                headers: {
                    'token': token,
                    'Content-Type': 'application/json',
                    'ShopId': '1187805'
                },
                data: JSON.stringify(deliveryInfo),
                beforeSend: function() {
                    $.blockUI({ message: '<div class="spinner-border text-light"></div>' , css: {backgroundColor: "transparent", padding: "100px", border: "none"}});
                },
                success: function(response) {
                    prices.deliveryPrices = response.data.fee.main_service;
                    $("#delivery-price").html(response.data.fee.main_service + " VNĐ");
                    paymentInfo.totalPrices = parseFloat($("#total-prices").html().replace("VNĐ", "").trim());
                    paymentInfo.deliveryPrices = parseFloat($("#delivery-price").html().replace("VNĐ", "").trim());
                    updateLastPrices((paymentInfo.totalPrices + paymentInfo.deliveryPrices) / 100 * (100 - paymentInfo.discount));
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
                ,
                complete: function() {
                    $.unblockUI();
                }
            });               
        }
    });
    
    $('#normal-delivery').change((e) => {
        if (e.target.checked) {
            if($('#fast-delivery').is(':checked')) {
                $('#fast-delivery').prop('checked', false);
            }
                deliveryInfo = getDeliveryInfo(deliveryInfo);
                $.ajax({
                    url: 'https://online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/preview',
                    type: 'POST',
                    headers: {
                        'token': token,
                        'Content-Type': 'application/json',
                        'ShopId': '1187805'
                    },
                    data: JSON.stringify(deliveryInfo),
                    beforeSend: function() {
                        $.blockUI({ message: '<div class="spinner-border text-light"></div>' , css: {backgroundColor: "transparent", padding: "100px", border: "none"}});
                    },
                    success: function(response) {
                        $("#delivery-price").html(response.data.fee.main_service + " VNĐ");
                        var sumPrices = parseFloat($("#delivery-price").html().replace("VNĐ", "").trim()) + parseFloat($("#total-prices").html().replace("VNĐ", "").trim())
                        paymentInfo.lastPrices = sumPrices;
                        updateLastPrices(sumPrices);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                    ,
                    complete: function() {
                        $.unblockUI();
                    }
                });
        }
    });

    $("#get-discount-btn").click(() => {
        $.post("../api/discount/getDiscount.php", {discountCode: $("#discount-code").val().trim()},
            function (data, textStatus, jqXHR) {
                if(data.status) {
                    var currentDate = new Date();
                    var validDate = new Date(data.data.valid_date);
                    var invalidDate = new Date(data.data.invalid_date);
                    console.log(validDate + currentDate  + invalidDate);
                    if(validDate <= currentDate && currentDate < invalidDate) {
                        paymentInfo.discount = parseFloat(data.data.discount_percentage);
                        $("#discount").html(data.data.discount_percentage + "%");
                        updateLastPrices((paymentInfo.totalPrices + paymentInfo.deliveryPrices) / 100 * (100 - paymentInfo.discount));
                        showSuccessNotifycation("Successfully apply discount code");
                    }
                    else {
                        showFailedNotifycation("Your discount code does not exist or has expired");
                    }
                }
                else {
                    showFailedNotifycation("Discount code does not exists or has expired");
                }
            },
            "json"
        );
    })

    $("#purchase-button").click((e) => { 
        e.preventDefault();
        if(prices.deliveryPrices){
            if(paymentInfo.customer === "" || paymentInfo.customer == null){
                paymentInfo.name = $("#payment-full-name").val();
                paymentInfo.birth = $("#payment-birth").val();
                paymentInfo.gender = $("#payment-gender").val();
                paymentInfo.phone =  $("#payment-phone").val();
                paymentInfo.email = $("#payment-email").val();
                paymentInfo.address = $("#payment-city").val() + "," + $("#payment-district").val() + "," + $("#payment-ward").val() + "," + $("#payment-address").val();
            }
            $.post("../api/payment/createOrder.php", paymentInfo,
                function (data, textStatus, jqXHR) {
                    if(data.status) {
                        prices.deliveryPrices = 0;
                        window.location.href = "../vnpay/vnpay_pay.php";
                    }
                },
                "json"
            ) 
        }
        else {
            showFailedNotifycation("Please chose delivery method");
        }
    });
});

function checkDeliveryInfo() {
    if($("#payment-full-name").val() == "" || $("#payment-phone").val() == "" || $("#payment-city").val() == "" || $("#payment-district").val() == "" || $("#payment-ward").val() == "" || ("#payment-address").val == "") {
        return false;
    }
    return true;
}

function getDeliveryInfo(deliveryInfo) {
    deliveryInfo.to_name = $("#payment-full-name").val();
    deliveryInfo.to_phone = $("#payment-phone").val();
    deliveryInfo.to_address = $("#payment-address").val();
    deliveryInfo.to_ward_code =$("#payment-ward").val().split("-")[0];
    deliveryInfo.to_district_id = parseInt($("#payment-district").val().split("-")[0]);
    deliveryInfo.cod_amount = parseFloat($("#last-prices").html().replace("VNĐ", "").trim());
    deliveryInfo.return_phone = $("#payment-phone").val();
    deliveryInfo.return_address = $("#payment-address").val();
    deliveryInfo.return_ward_code = $("#payment-ward").val().split("-")[0];
   $.get("../api/payment/getOrderProducts.php",
        function (data, textStatus, jqXHR) {
            data.data.forEach(product => {
                deliveryInfo.items.push(product);
            });
        },
        "json"
    );
    return deliveryInfo;
}

function updateLastPrices(value) {
    $("#last-prices").html(value + " VNĐ");
}