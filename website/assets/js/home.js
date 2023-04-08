$(window).ready(() => {
    $("#menu-btn").click(() => {
        $("#navbar-left").toggleClass("show");
        $("#content").toggleClass("active");
        $("#menu-btn i").toggleClass("bx-menu");
        $("#menu-btn i").toggleClass("bx-x");
        setTimeout(() => {
            $("#navbar-left label").toggleClass("show");
        }, 500);
    })

    $("#logout").click(() => {
        $.get("../api/customer/logout.php",
            function () {
                window.location = "../login/login.php";
            }
        );
    })

    $(".product").each((index, value) => { 
        var quantity = $(value).find(".quantity");
        $(value).find(".increase").click((e) => {
            if(parseInt(quantity.html()) < 10) {
                quantity.html(parseInt(quantity.html()) + 1);
            }
        })
        $(value).find(".decrease").click((e) => {
            if (parseInt(quantity.html()) > 1) {
                
                quantity.html(parseInt(quantity.html()) - 1);
            }
        })

        $(value).find(".add-to-cart-btn").click((e) => {
            $.post("../api/home/addCartItem.php", {name: $(value).find(".product-name").html(), price: $(value).find(".prices").html(), quantity: quantity.html(), img: $(value).find(".img").attr("src")},
                function () {
                    showSuccessNotifycation("Successfully to add new item to cart!");
                }
            );
        })
    });
})

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



