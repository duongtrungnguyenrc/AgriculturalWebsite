$(window).ready(() => {
    $("#menu-btn").click(() => {
        $("#navbar-left").toggleClass("show");
        $("#content").toggleClass("active");
        $("#menu-btn i").toggleClass("bx-menu");
        $("#menu-btn i").toggleClass("bx-x");
        if($("#navbar-left label").hasClass("show")){
            $("#navbar-left label").toggleClass("show");
        }else {
            setTimeout(() => {
                $("#navbar-left label").toggleClass("show");
            }, 500);
        }
    })
     // handle left navigation bar buttons active
     const navItems = $("#navbar-left .navbar-item");
     const screens = ["home", "cart", "order", "setting"];
     screens.forEach((screen, index) => {
         if(window.location.href.includes(screen)) {
             navItems.each((index, item) => {
                 $(item).removeClass("active");
             })
             navItems.eq(index).addClass("active");
         }
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
            $.post("../api/home/addCartItem.php", {name: $(value).find(".product-name").html(), price: $(value).find(".prices").html(), quantity: quantity.html(), img: $(value).find(".img").attr("src"), unit: $(value).find(".sale-unit").html()},
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



