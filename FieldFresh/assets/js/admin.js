var revenueChart;

$(window).ready(() => {

    function updateClock() {
        let now = new Date();
        let day = now.getDate();
        let month = now.getMonth() + 1;
        let year = now.getFullYear();
        let time = now.toLocaleTimeString();
        document.getElementById('clock').textContent = day + '-' + month + '-' + year + " | " + time;
        setTimeout(updateClock, 1000); // cập nhật lại đồng hồ sau mỗi giây
      }
      updateClock();
      
    $("#file-input").change((e) => {
        $("#file-input").show(500);
        $(".chose-file").replaceWith('<button for="file-input" id="load-file-data" class="btn btn-sm">Upload file</button>');
    })

    if(window.location.href.includes("dashboard")){
        displayOrder();
        setTimeout(() => {
            ordersControl();
        }, 300);
        drawRevenueChart($("#revenue-chart"));
        drawProfitChart();
    }
    else if(window.location.href.includes("customers")){
        displayUsers();
        $("#add-user-form").hide();
        $("#add-user-btn").click(() => {
            $("#add-user-form").toggle(500);;
        })
        addUser();
        setTimeout(() => {
            usersControl();
        }, 300);
    }
    else if(window.location.href.includes("types")){
        displayTypes();
        $("#add-type-form").hide();
        $("#add-type-btn").click(() => {
            $("#add-type-form").toggle(500);;
        })
        addType();
        setTimeout(() => {
            typesControl();
        }, 300);
    }
    else if(window.location.href.includes("products")){
        displayProducts();
        insertFile($("#file-input"), loadProductInFile);
        $("#add-product-form").hide();
        $("#add-product-btn").click(() => {
            $("#add-product-form").toggle(500);;
        })
        addProduct();
        setTimeout(() => {
            productsControl();
        }, 300);
    }

    // toggle slide bar

    $("#menu-btn").click(() => {
        $("#navbar-left").toggleClass("show");
        $("#content").toggleClass("active");
        $("#menu-btn i").toggleClass("bx-menu");
        $("#menu-btn i").toggleClass("bx-x");
        $("#navbar-left label").toggle(500);
    })

    // handle left navigation bar buttons active
    const navItems = $("#navbar-left .navbar-item");
    const screens = ["dashboard", "customers", "types", "products"];
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
            function (data) {
                window.location = "../login/login.php";
            }
        );
    });

    $("#send-notification-btn").click((e) => {
        sendUpdateNotifycation({userName: $("#notification-for").val(), message: $("#notification-message").val()});
        $("#notification-for").val("");
        $("#notification-message").val("");
    })

    $("#create-discount-btn").click((e) => {
        const data = {
            validDate: $("#discount-valid-date").val(),
            invalidDate: $("#discount-invalid-date").val(),
            discountCode: $("#discount-code").val().toUpperCase(),
            discountPercentage: $("#discount-percentage").val(),
        }
        $.post("../api/discount/createDiscount.php", data,
            function (data, textStatus, jqXHR) {
                if(data.status) {
                    $("#discount-valid-date").val("");
                    $("#discount-invalid-date").val("");
                    $("#discount-code").val("");
                    $("#discount-percentage").val("");
                    showSuccessNotifycation(data.description);
                }
                else {
                    showFailedNotifycation(data.description);
                }
            },
            "json"
        );
    })

})

function deleteRow(index) {
    var rows = $(".table-data tbody tr");
    rows.each((i, row) => {
        if(i == index) {
            $(row).remove();
        }
    })
}

////// dashboard screen //////
function initOrderRow(order) {
    var row = $(`<tr>
                    <td>${order.id}</td>
                    <td>${order.customer_id}</td>
                    <td>${order.creation_date}</td>
                    <td>${parseFloat(order.total_prices) + parseFloat(order.delivery_prices) - parseFloat(order.discount)}</td>
                    <td><span class="status ${order.status}">${order.status}</span></td>
                    <td>
                        <button class="btn btn-primary verify"><i class="bx bx-check"></i></button>
                        <button class="btn btn-danger reject"><i class="bx bx-x" ></i></button>
                    </td>
                </tr>`);
    row.appendTo($("#orders-table tbody"));
}

function displayOrder() {
    $.get("../api/dashboard/getAllOrders.php", (data) => {
        var orders = data.data;
        orders.forEach((order) => {
            initOrderRow(order);
        })
    }, "json")
}

function ordersControl () {
    const rows = $(".table-data tbody tr");
    rows.each((index, element) => {
        var verifyBtn = $(element).find("td button.verify");
        var status = $(element).find("td span");
        verifyBtn.click((e) => { 
            if(status.html() == "pending") {
                setOrderStatus({id : $(element).find("td").eq(0).html(), status: "process"}, index);
                status.removeClass("pending");
                sendUpdateNotifycation({orderId: $(element).find("td").eq(0).html(), customerId: $(element).find("td").eq(1).html().trim(), message: `Your order id ${$(element).find("td").eq(0).html()} has been confirmed!`});
            }
            if(status.html() == "process") {
                setOrderStatus({id : $(element).find("td").eq(0).html(), status: "completed"}, index);
                status.removeClass("process");
                updateRevenue({revenue: $(element).find("td").eq(3).html()});
                sendUpdateNotifycation({orderId: $(element).find("td").eq(0).html(), customerId: $(element).find("td").eq(1).html().trim(), message: `Your order id ${$(element).find("td").eq(0).html()} has been completed!`});
            }
        });
        if(status.html().toLowerCase() == "completed" || status.html().toLowerCase() == "rejected"){
            verifyBtn.prop("disabled", true);
        }
        if(status.html().toLowerCase() != "pending"){
            $(element).find("td button.reject").prop("disabled", true);
        }
        $(element).find("td button.reject").click((e) => { 
            setOrderStatus({id : $(element).find("td").eq(0).html(), status: "rejected"}, index);
            sendUpdateNotifycation({orderId: $(element).find("td").eq(0).html(), userName: $(element).find("td").eq(1).html(), message: "Your order has been rejected!"});
        });
        
    })
}

function sendUpdateNotifycation(data) {
    $.post("../api/notification/sendNotification.php", data,
        function (data, textStatus, jqXHR) {
            if(data.status) {
                showSuccessNotifycation(data.description);
            }
            else {
                showFailedNotifycation(data.description);
            }
        },
        "json"
    );
}

function setOrderStatus(order, index) {
    $.post("../api/dashboard/setOrderStatus.php", order, (data) => {
        const rows = $(".table-data tbody tr");
        rows.each((i, element) => {
            if(index == i) {
                $(element).find("td span").addClass(order.status);
                $(element).find("td span").html(order.status);
            }
            var verifyBtn = $(element).find("td button.verify");
            var status = $(element).find("td span");
            if(status.html().toLowerCase() == "completed" || status.html().toLowerCase() == "rejected"){
                verifyBtn.prop("disabled", true);
            }
            if(status.html().toLowerCase() != "pending"){
                $(element).find("td button.reject").prop("disabled", true);
            }
        })
    })
}

function updateRevenue(data) {
    updateTotalRevenue(data.revenue);
    $.post("../api/revenue/updateRevenue.php", data,
        function (data, textStatus, jqXHR) {
            var currentWeek = [];
            var lastWeek = [];
            data.data.slice(0, 7).reverse().forEach(value => {
                currentWeek.push(parseFloat(value.revenue));
            });
            data.data.slice(7, 15).reverse().forEach(value => {
                lastWeek.push(parseFloat(value.revenue));
            });
            // Cập nhật dữ liệu biểu đồ
            revenueChart.data.datasets[0].data = lastWeek;
            revenueChart.data.datasets[1].data = currentWeek;
            revenueChart.update();
            // Gọi lại hàm drawRevenueChart để cập nhật biểu đồ
            drawRevenueChart($("#revenue-chart"));
        },
        "json"
    );
}

function drawRevenueChart(element) {
    $.get("../api/revenue/getRevenueStatistics.php",
        function (data, textStatus, jqXHR) {
            var currentWeekRevenue = [];
            var lastWeekRevenue = []
            data.data.slice(0, 7).reverse().forEach(value => {
                currentWeekRevenue.push(parseFloat(value.revenue));
            })
            data.data.slice(7, 15).reverse().forEach(value => {
                lastWeekRevenue.push(parseFloat(value.revenue));
            })
            revenueChart = new Chart(element, {
                type: 'line',
                data: {
                labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                datasets: [{
                    label: 'Last week',
                    data: lastWeekRevenue,
                    borderColor: '#DB504A',
                    fill: false
                }, {
                    label: 'Current week',
                    data: currentWeekRevenue,
                    borderColor: '#3C91E6',
                    fill: false
                }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    title: {
                        display: true,
                        text: 'Two Lines in One Chart'
                    },
                    scales: {
                        yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                        }]
                    }
                }
            });
        },
        "json"
    );
}

function drawProfitChart() {
    var myChart = new Chart($("#profit-chart"), {
        type: 'radar',
        data: {
            labels: ['Fruits', 'Vegetables', 'Fish', 'Meat', 'Rice'],
            datasets: [{
                label: '% of Revenue ',
                data: [30, 19, 25, 15, 10],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
}

function updateTotalRevenue(value) {
    var revenue = parseFloat($("#total-sales").html().replace("VNĐ", "").trim());
    var currRevenue = revenue  + parseFloat(value);
    const revenueITV = setInterval(() => {
        $("#total-sales").html(revenue + " VNĐ");
        if(currRevenue - revenue > 10000) {
            revenue += 10000;
        }
        else if(currRevenue - revenue > 1000) {
            revenue += 1000;
        }
        else if(currRevenue - revenue > 100) {
            revenue += 100;
        }
        else if(currRevenue - revenue > 10){
            revenue += 10;
        }
        else {
            revenue += 1;
        }
        if(revenue >= currRevenue){
            clearInterval(revenueITV);
        }
    }, 2);
}
////// customers screens //////

/**
 * The function initializes a new row in a table with user data and control options.
 * @param user - The user object contains information about a user, such as their username, password,
 * full name, birth date, gender, email, phone number, and address. This function creates a new row in
 * a table and populates it with the user's information in each column, as well as a control column
 */

function initUser(user) {
    var row = $(`<tr>
                    <td><input type="text" value="${user.user_name}"></td>
                    <td><input type="password" value="${user.password}"></td>
                    <td><input type="text" value="${user.name}"></td>
                    <td><input type="text" value="${user.birth}"></td>
                    <td><input type="text" value="${user.gender}"></td>
                    <td><input type="text" value="${user.email}"></td>
                    <td><input type="text" value="${user.phone}"></td>
                    <td><input type="text" value="${user.address}"></td>
                    <td>
                        <button class="btn btn-primary edit"><i class="bx bx-pencil"></i></button>
                        <button class="btn btn-danger delete"><i class="bx bx-trash" ></i></button>
                    </td>
                </tr>`);
    row.appendTo($("#users-table tbody"));
}

function displayUsers() {
    $.get("../api/customer/getAllUsers.php", (data) => {
        var users = data.data;
        users.forEach((user) => {
            initUser(user);
        })
    }, "json")
}

function addUser() {
    var parent = $("#add-user-form");
    $("#save-user-btn").click(() => {
        var user = {
            user: parent.find("input").eq(0).val(),
            password: parent.find("input").eq(1).val(),
            name: parent.find("input").eq(2).val(),
            birth: parent.find("input").eq(3).val(),
            gender: parent.find("select").val(),
            phone: parent.find("input").eq(4).val(),
            address: parent.find("input").eq(5).val()
        }
        saveUser(user);
    })
}

/**
 * The function saves a new user by sending a post request to an API endpoint and returns a success or
 * failure notification.
 * @param user - The `user` parameter is an object that contains the information of a new user to be
 * added to the system. It includes properties such as `user_name`, `password`, `name`, `birth`,
 * `gender`, `phone`, and `address`.
 */
function saveUser(user) {
    $.post("../api/customer/addNewUser.php", user, (data) => {
        if(data.status) {
            var res = data.data;
            var newUser = {
                id: res.id,
                user: res.user_name,
                password: res.password,
                name: res.name,
                birth: res.birth,
                gender: res.gender,
                phone: res.phone,
                address: res.address 
            }
            initUser(newUser);
            showSuccessNotifycation("Successfully to create new user!");
            clearForm();
            return true;
        }
        else {
            showFailedNotifycation("Failed to create new user!");
            return false;
        }
    }, "json");
   
}

function usersControl () {
    const rows = $(".table-data tbody tr");
    rows.each((index, row) => {
        var editBtn = $(row).find("td button.edit");
        editBtn.click((e) => { 
            var inputs = $(row).find("td input").toggleClass("active");
            editBtn.find("i").eq(0).toggleClass("bx-pen");
            editBtn.find("i").eq(0).toggleClass("bx-save");
            if(editBtn.hasClass("save")){
                var user = {
                    currentUser : inputs.eq(0).val(),
                    password: inputs.eq(1).val(),
                    fullName : inputs.eq(2).val(),
                    birth : inputs.eq(3).val(),
                    gender : inputs.eq(4).val(),
                    email : inputs.eq(5).val(),
                    phone : inputs.eq(6).val(),
                    address : inputs.eq(7).val(),
                }
                updateUser(user);
                editBtn.removeClass("save");
            }   
            else {
                editBtn.addClass("save");
            }
        });
        var deleteBtn = $(row).find("td button.delete");
        deleteBtn.click((e) => { 
            var del = {
                userName : $(row).find("td input").eq(0).val(),
            }
            deleteUser(del, index);
        });
    })
}

function updateUser(user) {
   $.post("../api/customer/updateUser.php", user,
    function (data) {
        if(data.status) {
            showSuccessNotifycation(data.description);
        } else {
            showFailedNotifycation(data.description);
        }
    }, "json");
}

function deleteUser(data, index) {
    console.log(data);
    $.post("../api/customer/deleteUser.php", data,
    function (data) {
        if(data.status) {
            deleteRow(index);
            showSuccessNotifycation("Delete success!");
        } else {
            showFailedNotifycation("Delete failed");
        }
    }, "json");
}


////// types screens //////

function initType(type) {
    var row = $(`<tr>
                    <td><input type="text" value="${type.type}"></td>
                    <td>
                        <button class="btn btn-primary edit"><i class="bx bx-pencil"></i></button>
                        <button class="btn btn-danger delete"><i class="bx bx-trash" ></i></button>
                    </td>
                </tr>`);
    row.appendTo($("#types-table tbody"));
}

function displayTypes() {
    $.get("../api/type/getAllTypes.php", (data) => {
        var types = JSON.parse(data).data;
        types.forEach((type) => {
            initType(type);
        })
    })
}

function typesControl () {
    const rows = $(".table-data tbody tr");
    rows.each((index, element) => {
        var editBtn = $(element).find("td button.edit");
        var oldType  = $(element).find("td input").eq(0).val();
        editBtn.click((e) => { 
            var inputs = $(element).find("td input").toggleClass("active");
            editBtn.find("i").eq(0).toggleClass("bx-pen");
            editBtn.find("i").eq(0).toggleClass("bx-save");
            if(editBtn.hasClass("save")){
                updateType({type: oldType, newType: inputs.eq(0).val()});
                editBtn.removeClass("save");
            }   
            else {
                editBtn.addClass("save");
            }
        });
        var deleteBtn = $(element).find("td button.delete");
        deleteBtn.click((e) => { 
            var del = {
                type : $(element).find("td input").eq(0).val(),
            }
            deleteType(del, index);
        });
    })
}

function addType() {
    var parent = $("#add-type-form");
    $("#save-type-btn").click(() => {
        var type = {
            type: parent.find("input").val(),
        }
        saveType(type);
    })
}

function saveType(type) {
    $.post("../api/type/addNewType.php", type, (data) => {
        if(data.status) {
            initType(type);
            clearForm();
            showSuccessNotifycation(data.description);
        }
        else {
            showFailedNotifycation(data.description);
        }
    }, "json")
}

function updateType(data) {
    $.post("../api/type/updateType.php", data,
     function (data) {
        if(data.status) {
            showSuccessNotifycation(data.description);
        }
        else {
            showFailedNotifycation(data.description);
        }
     }, "json"
    );
}

function deleteType(data, index) {
    $.post("../api/type/deleteType.php", data,
    function (data) {
        if(data.status) {
            deleteRow(index);
            clearForm();
            showSuccessNotifycation(data.description);
        }
        else {
            showFailedNotifycation(data.description);
        }
    }, "json")
}


////// products screen //////

function initProduct(product) {
    var row = $(`<tr>
                    <td><input type="text" value="${product.type}"></td>
                    <td><input type="text" value="${product.product_name}"></td>
                    <td><input type="text" value="${product.base_price}"></td>
                    <td><input type="text" value="${product.sale_price}"></td>
                    <td><input type="text" value="${product.unit}"></td>
                    <td><input type="text" value="${product.description}"></td>
                    <td><img src="${product.image}"></img></td>
                    <td>
                        <button class="btn btn-primary edit"><i class="bx bx-pencil"></i></button>
                        <button class="btn btn-danger delete"><i class="bx bx-trash" ></i></button>
                    </td>
                </tr>`);
    row.appendTo($("#products-table tbody"));
}

function displayProducts() {
    $.get("../api/product/getAllProducts.php", (data) => {
        var products = data.data;
        products.forEach((product) => {
            initProduct(product);
        })
    }, "json")
}

function addProduct() {
    var parent = $("#add-product-form");
    $("#save-product-btn").click(() => {
        var product = {
            type: parent.find("select").val(),
            name: parent.find("input").eq(0).val(),
            basePrice: parent.find("input").eq(1).val(),
            salePrice: parent.find("input").eq(2).val(),
            unit: parent.find("input").eq(4).val(),
            description: parent.find("input").eq(3).val(),
            image: parent.find("input").eq(5).val()
        }
        saveProduct(product);
    })
}

function saveProduct(product) {
    $.post("../api/product/addNewProduct.php", product, (data) => {
       if(data.status) {
        initProduct(product);
        showSuccessNotifycation(data.description);
        clearForm();
       }
       else {
        showFailedNotifycation(data.description);
       }
    }, "json")
}

function loadProductInFile(product){
    var row = {
        type: product[0],
        name: product[1],
        basePrice: product[2],
        salePrice: product[3],
        unit: product[4],
        description: product[5],
        image: product[6]
    }
    saveProduct(row);
}

function productsControl () {
    const rows = $(".table-data tbody tr");
    rows.each((index, row) => {
        const editBtn = $(row).find("td button.edit");
        const inputs = $(row).find("td input");
        const deleteBtn = $(row).find("td button.delete");
        const img = $(row).find("td img").attr("src");
        editBtn.on("click", () => {
            inputs.toggleClass("active");
            editBtn.find("i").eq(0).toggleClass("bx-pen bx-save");
            if (editBtn.hasClass("save")) {
                const product = {
                    type : inputs.eq(0).val(),
                    name: inputs.eq(1).val(),
                    basePrice : inputs.eq(2).val(),
                    salePrice : inputs.eq(3).val(),
                    unit : inputs.eq(4).val(),
                    description : inputs.eq(5).val(),
                    image : img,
                }
                updateProduct(product);
                editBtn.removeClass("save");
            } else {
                editBtn.addClass("save");
            }
        });
        deleteBtn.on("click", () => {
            const name = inputs.eq(1).val();
            deleteProduct({name}, index);
        });
    });
}

function updateProduct(data) {
   $.post("../api/product/updateProduct.php", data,
    function (data) {
        if(data.status){
            showSuccessNotifycation(data.description);
        } else {
            showFailedNotifycation(data.description);
        }
    }, "json");
}

function deleteProduct(data, index) {
    $.blockUI({ message: '<div class="spinner-border text-light"></div>' , css: {backgroundColor: "transparent", padding: "100px", border: "none"}});
    $.post("../api/product/deleteProduct.php", data,
    (data) => {
        if(data.status) {
            deleteRow(index);
            showSuccessNotifycation(data.description);
        } else {
            showFailedNotifycation(data.description);
        }
    }, "json")
    $.unblockUI();
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

function clearForm() {
    $(".insert-data-form input").val("");
}

function insertFile(inputFile, action) {
    inputFile.change((e) => {
        const file = e.target.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            const data = new Uint8Array(e.target.result);
            const workbook = XLSX.read(data, {type: 'array'});
            const sheetName = workbook.SheetNames[0];
            const worksheet = workbook.Sheets[sheetName];
            const json = XLSX.utils.sheet_to_json(worksheet, {header: 1});
            $("#load-file-data").click((e) => {
                json.forEach(element => {
                    action(element);
                });
            })
        };
        
        reader.readAsArrayBuffer(file);
    });
}

