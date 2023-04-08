$(document).ready(function () {
    var totalPrices = 0;
    var btnCheckAll = $("#cart #header .check-all-group #check-all");
        btnCheckAll.change(() => {
            if(btnCheckAll.is(":checked")) {
                $(".item-purchase-check").attr("checked", true);
            }
            else {
                $(".item-purchase-check").attr("checked", false);
            }
        })

    $("#cart .cart-item").each((index, element) => { 
        var checkBox = $(element).find(".item-purchase-check");
        var item = {
            name: $(element).find(".cart-item-name").html(),
            price: $(element).find(".cart-item-price").html(),
            quantity: $(element).find(".quantity").html()
        }
        $(element).find(".cart-item-control .remove-btn").click(() => {
            console.log(item.name);
            $.post("../api/home/removeCartItem.php", {remove_product: item.name},
                () => {
                    $(element).remove();
                    showSuccessNotifycation("Successfully to remove item!");
                }
            );
        })

        checkBox.change(() =>{ 
            if (checkBox.is(':checked')) {
                totalPrices += parseFloat(item.price.replace("$", "")) * parseInt(item.quantity);
            }
            else {
                totalPrices -= parseFloat(item.price.replace("$", "")) * parseInt(item.quantity);
            }
            $("#total-prices").html(totalPrices + " VND"); 
        });
    });
});

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

