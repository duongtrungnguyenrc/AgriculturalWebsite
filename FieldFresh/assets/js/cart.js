$(document).ready(function () {
    var totalPrices = 0;
    var numberOfProducts = 0;
    const listItem = [];
    const item = $("#cart .cart-item");

    item.each((index, element) => { 
        //chỉnh lại chỗ replace
        $(element).find(".total-price .prices-txt").html(parseFloat($(element).find('.product-content .price').html().replace("$", "")) * parseInt($(element).find(".quantity").html()));
        var item = {
            name: $(element).find(".name").html(),
            price: $(element).find(".total-price .prices-txt").html(),
            unit:  $(element).find(".unit").html(),
            quantity: $(element).find(".quantity").html(),
        }
        listItem.push(item);
        totalPrices += parseFloat(item.price);
        numberOfProducts++;
        $(element).find(".control .remove-btn").click(() => {
            $.post("../api/home/removeCartItem.php", {remove_product: item.name},
            () => {
                totalPrices -= parseFloat(item.price);
                numberOfProducts--;
                listItem.splice(index, 1);
                $(element).remove();
                showSuccessNotifycation("Successfully to remove item!");
                updateLastPrices(totalPrices);
                updateNumberOfProducts(numberOfProducts);
            }
            );
        })
    });
    updateLastPrices(totalPrices);
    updateNumberOfProducts(numberOfProducts);

    $("#purchase-button").click((e) => {
        if(item.length > 0) {
            $.post("../api/payment/createPaymentSession.php", {data : listItem},
                function (data, textStatus, jqXHR) {
                    if(data.status) {
                        window.location.href = "payment.php";
                    }
                },
                "json"
            );
        }
        else {
            showFailedNotifycation("Your shopping cart is empty!");
        }
    })
});

function updateLastPrices(value) {
    $("#last-prices").html(value);
}

function updateNumberOfProducts(value) {
    $("#number-of-products").html(value);
    $("#cart-quantity").html("has " + value + " products");
}

function showSuccessNotifycation(text) {
    $(`<div id="notifycation" class="success">${text}</div>`).appendTo("#content");
    setTimeout(() => {
        $("#notifycation").remove();
    }, 3000);
}

function showFailedNotifycation(text) {
    $(`<div id="notifycation">${text}</div>`).appendTo("#content");
    setTimeout(() => {
        $("#notifycation").remove();
    }, 3000);
}

