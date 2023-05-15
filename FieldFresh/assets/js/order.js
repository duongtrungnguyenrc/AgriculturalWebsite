$(document).ready(function () {
    $("#order-list .order").click(function() {
        var orderId =  $(this).find(".order-id").html().split(":")[1].trim();
        $("#order-list .order").each((index, element) => {
            $(element).removeClass("active");
        })
        $(this).addClass("active");
        loadInvoice(orderId);
    })

    $("#filter-slt").change(function (e) { 
        e.preventDefault();
        var value = e.target.value.toLowerCase();
        if(value === "all") {
            $("#order-list .order").show(100);
        }
        else if(value === "pending") {
            hideOrderByFilter("pending");         
        }
        else if(value === "processing") {
            hideOrderByFilter("process");         
        }
        else if (value === "completed") {
            hideOrderByFilter("completed");  
        }
        else if(value === "rejected") {
            hideOrderByFilter("rejected");         
        }
    });
});

function loadInvoice(orderId) {
    $.post("../api/order/getOrderById.php", {id: orderId},
        function (data, textStatus, jqXHR) {
            var order = data.order;
            var user = data.user;
            var detail = data.detail;
            var orderName = "";

            detail.forEach((value, index) => {
                if (index === detail.length - 1) {
                    orderName += value.product_name;
                } else {
                    orderName += value.product_name + ", ";
                }
            });

            var orderModel =  $(".order-detail");
            $(".detail-top .order-id").html("Order id: " + order.id);
            $(".detail-top .order-name").html(orderName);

            orderModel.find(".avatar").html(Array.from(user.full_name.split(" ").reverse()[0])[0]);
            orderModel.find(".customer-name").html(user.full_name);
            orderModel.find(".order-id").html("Order id: " + order.id);
            orderModel.find(".date-order").html("Date: " + order.creation_date)
            orderModel.find(".to-name").html(user.full_name);
            orderModel.find(".to-address").html(user.address.replace(/[0-9-]/g, "").replace(/,/g, " - ").trim());
            if(orderModel.find("tbody").has("tr").length > 0) {
                orderModel.find("tbody").empty();
            }
            detail.forEach(element => {
                var row = $(`<tr></tr>`);
                row.append($(`<td>${"x" + element.quantity+ " " + element.unit}</td>`));
                row.append($(`<td>${element.price}</td>`));
                row.append(`<td>${element.product_name}</td>`);
                row.appendTo(orderModel.find("tbody"));
            });
            orderModel.find(".total-prices strong").html(parseFloat(order.total_prices));
            orderModel.find(".delivery-prices strong").html(parseFloat(order.delivery_prices));
            orderModel.find(".last-prices strong").html(parseFloat(order.total_prices) + parseFloat(order.delivery_prices) - parseFloat(order.discount));
        },
        "json"
    );
}

function hideOrderByFilter(element) {
    $("#order-list .order").each((index, value) => {
        if($(value).find(".status").html().trim() === element) {
            $(value).show(100);
        }
        else {
            $(value).hide(100);
        }
    })
}