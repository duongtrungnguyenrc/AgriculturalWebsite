$(window).ready(() => {
    
    if(window.location.href.includes("dashboard")){
        displayOrder();
        setTimeout(() => {
            ordersControl();
        }, 300);
        drawRevenueChart($("canvas"));
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
        setTimeout(() => {
            $("#navbar-left label").toggleClass("show");
        }, 300);
    })

    // 
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
})

function initControlCol() {
    var control = $('<td></td>');
    var editBtn = $('<button class="btn btn-primary me-1 edit"><i class="bx bx-pencil"></i></button>');
    var deleteBtn = $('<button class="btn btn-danger delete"><i class="bx bx-trash" ></i></button>');
    editBtn.appendTo(control);
    deleteBtn.appendTo(control);
    return control;
}

function deleteRow(index) {
    var rows = $(".table-data tbody tr");
    rows.each((i, row) => {
        if(i == index) {
            $(row).remove();
        }
    })
}

function initDataCol(value) {
    var col = $('<td></td>')
    $(`<input type="text" value="${value}">`).appendTo(col);
    return col;
}


////// dashboard screen //////

function initDashboardControlCol() {
    var control = $('<td></td>');
    var verifyBtn = $('<button class="btn btn-primary me-1 verify"><i class="bx bx-check"></i></button>');
    var rejectBtn = $('<button class="btn btn-danger reject"><i class="bx bx-x" ></i></button>');
    verifyBtn.appendTo(control);
    rejectBtn.appendTo(control);
    return control;
}

function initOrderStatusCol(value){
    var col = $('<td></td>');
    $(`<span class="status ${value}">${value}</span>`).appendTo(col);
    return col;
}

function initOrderDataCol(value) {
    var col = $(`<td>${value}</td>`);
    return col;
}

function initOrder(order) {
    var row = $('<tr></tr>');
    initOrderDataCol(order.id).appendTo(row);
    initOrderDataCol(order.userID).appendTo(row);
    initOrderDataCol(order.date).appendTo(row);
    initOrderDataCol(order.prices).appendTo(row);
    initOrderStatusCol(order.status).appendTo(row);
    initDashboardControlCol().appendTo(row);
    row.appendTo($("#orders-table tbody"));
}

function displayOrder() {
    $.get("../api/admin/dashboard/getAllOrders.php", (data) => {
        var orders = JSON.parse(data).data;
        orders.forEach((order) => {
            initOrder(order);
        })
    })
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
            }
            if(status.html() == "process") {
                setOrderStatus({id : $(element).find("td").eq(0).html(), status: "completed"}, index);
                status.removeClass("process");
            }
        });
        if(status.html() == "completed"){
            verifyBtn.prop("disabled", true);
        }
        $(element).find("td button.reject").click((e) => { 
            var del = {
                id : $(element).find("td").eq(0).val(),
            }
            deleteOrder(del, index);
        });
        
    })
}

function setOrderStatus(order, index) {
    $.post("../api/admin/dashboard/setOrderStatus.php", order, (data) => {
        const rows = $(".table-data tbody tr");
        rows.each((i, element) => {
            if(index == i) {
                $(element).find("td span").addClass(order.status);
                $(element).find("td span").html(order.status);
            }
        })
    })
}


function drawRevenueChart(element) {
    var myChart = new Chart(element, {
        type: 'line',
        data: {
        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
        datasets: [{
            label: 'Last week',
            data: [13, 12, 15, 18, 16, 17, 20],
            borderColor: '#DB504A',
            fill: false
        }, {
            label: 'Current week',
            data: [12, 19, 5, 8, 6, 10, 15],
            borderColor: '#3C91E6',
            fill: false
        }]
        },
        options: {
        responsive: true,
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
}
////// customers screens //////


function initUser(user) {
    var row = $('<tr></tr>');
    initDataCol(user.id).appendTo(row);
    initDataCol(user.user).appendTo(row);
    initDataCol(user.password).appendTo(row);
    initDataCol(user.name).appendTo(row);
    initDataCol(user.birth).appendTo(row);
    initDataCol(user.gender).appendTo(row);
    initDataCol(user.phone).appendTo(row);
    initDataCol(user.address).appendTo(row);
    initControlCol().appendTo(row);
    row.appendTo($("#users-table tbody"));
}

function displayUsers() {
    $.get("../api/admin/customer/getAllUsers.php", (data) => {
        var users = JSON.parse(data).data;
        users.forEach((user) => {
            initUser(user);
        })
    })
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

function saveUser(user) {
    $.post("../api/admin/customer/addNewUser.php", user, (data) => {
        var res = JSON.parse(data).data;
        var newUser = {
            id: res.id,
            user: res.user,
            password: res.password,
            name: res.name,
            birth: res.birth,
            gender: res.gender,
            phone: res.phone,
            address: res.address 
        }
        initUser(newUser)
    })
}

function usersControl () {
    const rows = $(".table-data tbody tr");
    rows.each((index, element) => {
        var editBtn = $(element).find("td button.edit");
        editBtn.click((e) => { 
            var inputs = $(element).find("td input").toggleClass("active");
            editBtn.find("i").eq(0).toggleClass("bx-pen");
            editBtn.find("i").eq(0).toggleClass("bx-save");
            if(editBtn.hasClass("save")){
                var user = {
                    id : inputs.eq(0).val(),
                    user : inputs.eq(1).val(),
                    password: inputs.eq(2).val(),
                    name : inputs.eq(3).val(),
                    birth : inputs.eq(4).val(),
                    gender : inputs.eq(5).val(),
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
        var deleteBtn = $(element).find("td button.delete");
        deleteBtn.click((e) => { 
            var del = {
                id : $(element).find("td input").eq(0).val(),
            }
            deleteUser(del, index);
        });
    })
}

function updateUser(user) {
   $.post("../api/admin/customer/updateUser.php", user,
    function (data) {
       console.log(user);
    }
   );
}

function deleteUser(data, index) {
    $.post("../api/admin/customer/deleteUser.php", data,
    function (data, textStatus, jqXHR) {
        deleteRow(index)
    }
   );
}


////// types screens //////

function initType(type) {
    var row = $('<tr></tr>');
    initDataCol(type.id).appendTo(row);
    initDataCol(type.type).appendTo(row);
    initControlCol().appendTo(row);
    row.appendTo($("#types-table tbody"));
}

function displayTypes() {
    $.get("../api/admin/type/getAllTypes.php", (data) => {
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
        editBtn.click((e) => { 
            var inputs = $(element).find("td input").toggleClass("active");
            editBtn.find("i").eq(0).toggleClass("bx-pen");
            editBtn.find("i").eq(0).toggleClass("bx-save");
            if(editBtn.hasClass("save")){
                var type = {
                    id : inputs.eq(0).val(),
                    type : inputs.eq(1).val(),
                }
                updateType(type);
                editBtn.removeClass("save");
            }   
            else {
                editBtn.addClass("save");
            }
        });
        var deleteBtn = $(element).find("td button.delete");
        deleteBtn.click((e) => { 
            var del = {
                id : $(element).find("td input").eq(0).val(),
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
    $.post("../api/admin/type/addNewType.php", type, (data) => {
        var res = JSON.parse(data).data;
        var newType = {
            id: res.id,
            type: res.type,
        }
        initType(newType);
    })
}

function updateType(data) {
    $.post("../api/admin/type/updateType.php", data,
     function (data, textStatus, jqXHR) {
         console.log(textStatus);
     }
    );
}

function deleteType(data, index) {
    $.post("../api/admin/type/deleteType.php", data,
    function (data, textStatus, jqXHR) {
        deleteRow(index);
    })
}


////// products screen //////

function initImgCol(value) {
    var col =  $('<td></td>')
    $(`<img src="../pictures/${value}"></img>`).appendTo(col);
    return col;
}

function initProduct(product) {
    var row = $('<tr></tr>');
    initDataCol(product.id).appendTo(row);
    initDataCol(product.type).appendTo(row);
    initDataCol(product.name).appendTo(row);
    initDataCol(product.price).appendTo(row);
    initDataCol(product.description).appendTo(row);
    initImgCol(product.img).appendTo(row);
    initControlCol().appendTo(row);
    row.appendTo($("#products-table tbody"));
}

function displayProducts() {
    $.get("../api/admin/product/getAllProducts.php", (data) => {
        var products = JSON.parse(data).data;
        products.forEach((product) => {
            initProduct(product);
        })
    })
}

function addProduct() {
    var parent = $("#add-product-form");
    $("#save-product-btn").click(() => {
        var product = {
            type: parent.find("select").val(),
            name: parent.find("input").eq(0).val(),
            price: parent.find("input").eq(1).val(),
            description: parent.find("input").eq(2).val(),
            img: parent.find("input").eq(3).val()
        }

        saveProduct(product);
    })
}

function saveProduct(product) {
    $.post("../api/admin/product/addNewProduct.php", product, (data) => {
        var res = JSON.parse(data).data;
        var newProduct = {
            id: res.id,
            type: res.type,
            name: res.name,
            price: res.price,
            description: res.description,
            img: res.img
        }
        initProduct(newProduct);
    })
}

function productsControl () {
    const rows = $(".table-data tbody tr");
    rows.each((index, element) => {
        var editBtn = $(element).find("td button.edit");
        editBtn.click((e) => { 
            var inputs = $(element).find("td input").toggleClass("active");
            editBtn.find("i").eq(0).toggleClass("bx-pen");
            editBtn.find("i").eq(0).toggleClass("bx-save");
            if(editBtn.hasClass("save")){
                var product = {
                    id : inputs.eq(0).val(),
                    type : inputs.eq(1).val(),
                    name: inputs.eq(2).val(),
                    price : inputs.eq(3).val(),
                    description : inputs.eq(4).val(),
                    img : $(element).find("td img").attr("src"),
                }
                updateProduct(product);
                editBtn.removeClass("save");
            }   
            else {
                editBtn.addClass("save");
            }
        });
        var deleteBtn = $(element).find("td button.delete");
        deleteBtn.click((e) => { 
            var del = {
                id : $(element).find("td input").eq(0).val(),
            }
            deleteProduct(del, index);
        });
    })
}

function updateProduct(data) {
   $.post("../api/admin/product/updateProduct.php", data,
    function (data, textStatus, jqXHR) {
        console.log(textStatus);
    }
   );
}

function deleteProduct(data, index) {
    $.post("../api/admin/product/deleteProduct.php", data,
    function (data, textStatus, jqXHR) {
        deleteRow(index);
    })
}