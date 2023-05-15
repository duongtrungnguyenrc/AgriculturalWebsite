var allData = [];

$(window).ready(() => {
    $.get("../api/product/getAllProducts.php",
        function (data, textStatus, jqXHR) {
            if(data.data) {
                allData = data.data;
            }
        },
        "json"
    );

    $("#search-submit").click((e) => {
       var searchValue =  $('#search-input').val();
       allData.forEach((value) => {
            if(value.product_name == searchValue){
                var result = $(`<li><a href="./product.php?name=${value.product_name}" class="text-dark">${value.product_name}</a></li>`);
                result.appendTo($("#search-result"));
            }
            else if(value.type == searchValue) {
                var result = $(`<li><a href="./product.php?name=${value.product_name}" class="text-dark">${value.product_name}</a></li>`);
                result.appendTo($("#search-result"));
            }
        })
        $("#search-result").show(300);
    })

    $("#hide-result").click((e) => { 
        $("#search-result").hide(300);
        $("#search-input").val("");
    });

    $("#menu-btn").click(() => {
        $("#navbar-left").toggleClass("show");
        $("#content").toggleClass("active");
        $("#menu-btn i").toggleClass("bx-menu");
        $("#menu-btn i").toggleClass("bx-x");
        $("#navbar-left label").toggle(500);
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
            $.post("../api/home/addCartItem.php", {name: $(value).find(".product-name").html(), price: $(value).find(".prices").html(), quantity: quantity.html(), img: $(value).find(".img").attr("src"), unit: $(value).find(".sale-unit").html().split(":")[1].trim()},
                function () {
                    showSuccessNotifycation("Successfully to add new item to cart!");
                }
            );
        })
    });

    $("#user-btn").click(function(e) {
        checkLogin((value) => {
            if(!value) {
                $.blockUI({ message: '<div class="spinner-border text-light"></div>' , css: {backgroundColor: "transparent", padding: "100px", border: "none"}});
                window.location.href = "../login/login.php";
            }
        });
    });
    
      

    $("#edit-user-info-btn").click((e) => {
        $("#info-group input").each(function (index, element) { 
            !$(element).hasClass("user-name") ?
            $(element).prop("disabled", false) : ""
        });
        $("#info-group select").each(function (index, element) {
            $(element).prop("disabled", false);
        }) 
        $("#save-user-info-btn").prop("disabled", false);
        loadAddress();
    });

    $("#save-user-info-btn").click(function (e) { 
        getCurrentUser((value) => {
            const user = {
                currentUser: value, password: $("#password").val(), 
                fullName: $("#full-name").val(), email: $("#email").val(), 
                birth: $("#birth").val(), gender: $("#gender").val(), 
                phone: $("#phone").val(), address: $("#rg-province").val() + "," + $("#rg-district").val() + "," + $("#rg-ward").val() + "," + $("#rg-address").val(),
            };
            console.log(user);
            $.post("../api/customer/updateUser.php", user,
                function (data, textStatus, jqXHR) {
                    if(data.status) {
                        $("#info-group input").each(function (index, element) { 
                            $(element).prop("disabled", true);
                        });
                        $("#info-group select").each(function (index, element) {
                            $(element).prop("disabled", true);
                        }) 
                        showSuccessNotifycation(data.description);
                        $(this).prop("disabled", false);
                    }
                    else {
                        showFailedNotifycation(data.description);
                    }
                },
                "json"
            );
        })
       
       
    });

    $(document).click(function(e) {
        var notificationPopup = $("#notification-popup"); 
        if (!notificationPopup.is(e.target) && notificationPopup.has(e.target).length === 0) {
          notificationPopup.hide(200);
        }
    });

    $("#comment-input").on("input", function(e) {
        if(e.target.value == "") {
            $("#comment-btn").prop("disabled", true);
            $("#comment-btn").removeClass("active");
        }
        else {
            $("#comment-btn").prop("disabled", false);
            $("#comment-btn").addClass("active");
        }
    });
    
    $("#cancel-comment-btn").click(function(e) {
        $("#comment-input").val("");
        $("#comment-btn").removeClass("active");
    })

    $("#comment-btn").click(function(e) {
        var currentUser = "";
        $.get("../api/authenticate/getCurrentUser.php",
            function (data, textStatus, jqXHR) {
                if(data.status) {
                    currentUser = data.data;
                    var currentDate = new Date();
                    var currentDateTimeString = currentDate.toISOString().slice(0, 19).replace('T', ' ');
                    const comment = {commentTime: currentDateTimeString, userComment: currentUser, productName: $("#product-name").html().trim(),comment: $("#comment-input").val()};
                    console.log(comment);
                    $.post("../api/comment/sendComment.php", comment,
                        function (data, textStatus, jqXHR) {
                            loadComment(comment);
                            $("#comment-input").val("");
                            $("#comment-btn").removeClass("active");
                            showSuccessNotifycation("Successfully to comment");
                        },
                        "json"
                    );
                }
                else {
                    window.location.href = "../login/login.php";
                }
            },
            "json"
        );
    })

    $("#export-pdf-btn").click(function(e) {
        generatePDF();
    })
})

function loadComment(comment) {
    var newComment = $(`<li class="comment">
                        <div class="comment-avatar">${Array.from(comment.userComment.split(" ").reverse()[0])[0]}</div>
                        <div class="comment-content">
                            <div class="comment-content-top">
                                <span class="comment-user">${comment.userComment}</span>
                                <span class="comment-time">${comment.commentTime}</span>
                            </div>
                            <span class="comment-text">${comment.comment}</span>
                        </div>
                    </li>`);
    newComment.appendTo($("#comment-list"));
}

function loadAddress () {
    $.ajax({
        url: 'https://online-gateway.ghn.vn/shiip/public-api/master-data/province',
        type: 'GET',
        headers: {
          'Token': token,
        },
        success: function(response) {
          response.data.forEach(province => {
            $(`<option value="${province.ProvinceID + "-" + province.ProvinceName}">${province.ProvinceName}</option>`).appendTo($("#rg-province"));
          });
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
      });
      $("#rg-province").change((e) => {
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
          beforeSend: function() {
            $.blockUI({ message: '<div class="spinner-border text-light"></div>' , css: {backgroundColor: "transparent", padding: "100px", border: "none"}});
          },
          success: function(response) {
            response.data.forEach(district => {
              $(`<option value="${district.DistrictID + "-" + district.DistrictName}">${district.DistrictName}</option>`).appendTo($("#rg-district"));
            });
          },
          error: function(xhr, status, error) {
              console.log(error);
          }
          ,
          complete: function() {
              $.unblockUI();
          }
        });
      })
    
      $("#rg-district").change((e) => {
        var districtID = parseInt(e.target.value.split("-")[0]);
        $.ajax({
          url: `https://online-gateway.ghn.vn/shiip/public-api/master-data/ward?district_id=${districtID}`,
          type: 'GET',
          headers: {
            'Token': token,
          },
          beforeSend: function() {
            $.blockUI({ message: '<div class="spinner-border text-light"></div>' , css: {backgroundColor: "transparent", padding: "100px", border: "none"}});
          },
          success: function(response) {
            response.data.forEach(ward => {
              $(`<option value="${ward.WardCode + "-" + ward.WardName}">${ward.WardName}</option>`).appendTo($("#rg-ward"));
            });
          },
          error: function(xhr, status, error) {
              console.log(error);
          }
          ,
          complete: function() {
              $.unblockUI();
          }
        });
      })
}


function getCurrentUser(callback) {
    $.get("../api/authenticate/getCurrentUser.php",
        function (data, textStatus, jqXHR) {
            callback(data.data);
        },
        "json"
    );
}

function checkLogin(callback) {
    $.post("../api/authenticate/loginAuth.php",
        function (data, textStatus, jqXHR) {
            callback(data.status);
        },
        "json"
    );
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

function generatePDF() {
    var props = {
        outputType: jsPDFInvoiceTemplate.OutputType.Save,
        returnJsPDFDocObject: true,
        fileName: "Invoice",
        orientationLandscape: false,
        compress: true,
        logo: {
            src: "../pictures/logo.png",
            type: 'PNG', //optional, when src= data:uri (nodejs case)
            width: 26, //aspect ratio = width/height
            height: 26,
            margin: {
                top: 0, //negative or positive num, from the current position
                left: 0 //negative or positive num, from the current position
            }
        },
        stamp: {
            inAllPages: true, //by default = false, just in the last page
            src: "https://raw.githubusercontent.com/edisonneza/jspdf-invoice-template/demo/images/qr_code.jpg",
            type: 'JPG', //optional, when src= data:uri (nodejs case)
            width: 20, //aspect ratio = width/height
            height: 20,
            margin: {
                top: 0, //negative or positive num, from the current position
                left: 0 //negative or positive num, from the current position
            }
        },
        business: {
            name: "FieldFresh",
            phone: "(+84)855004714",
            email: "FieldFresh@gmail.com",
            address: "25/26 Nguyen Dinh Chieu - Vinh Tho - Nha Trang",
        },
        contact: {
            label: "To",
            name: "Duong Trung Nguyen",
            phone: "(+84)855004714",
            address: "25/26 Nguyen Dinh Chieu - Vinh Tho - Nha Trang",
        },
        invoice: {
            label: "Invoice #: ",
            num: 19,
            invDate: "Payment Date: 01/01/2021 18:12",
            invGenDate: "Invoice Date: 02/02/2021 10:17",
            headerBorder: false,
            tableBodyBorder: false,
            header: [
            {
                title: "#", 
                style: { 
                    width: 10 
                } 
            },
            { title: "Unit"},
            { title: "Name"},
            { title: "Price"},
            ],
            table: Array.from(Array(10), (item, index)=>([
                index + 1,
                "x1kg",
                200.5,
                "Carrot",
            ])),
            additionalRows: [{
                col1: 'Total:',
                col2: '145,250.50',
                col3: 'ALL',
                style: {
                    fontSize: 14 //optional, default 12
                }
            },
            {
                col1: 'VAT:',
                col2: '20',
                col3: '%',
                style: {
                    fontSize: 10 //optional, default 12
                }
            },
            {
                col1: 'SubTotal:',
                col2: '116,199.90',
                col3: 'Unit',
                style: {
                    fontSize: 10 //optional, default 12
                }
            }],
            invDescLabel: "Invoice Note",
            invDesc: "Return Policy:\nReturn goods within [Number of days] from the date of delivery. \nRequires that the goods are intact, undamaged and have all relevant documents. \nShipping costs during return will be borne by the customer.",
        },
        prices: {
            label: "To",
            name: "Duong Trung Nguyen",
            phone: "(+84)855004714",
            address: "25/26 Nguyen Dinh Chieu - Vinh Tho - Nha Trang",
        },
        footer: {
            text: "The invoice is created on a computer and is valid without the signature and stamp.",
        },
        logo: {
            src: "../pictures/logo.png",
            type: 'PNG', //optional, when src= data:uri (nodejs case)
            width: 26, //aspect ratio = width/height
            height: 26,
            margin: {
                bottom: 0, //negative or positive num, from the current position
                right: 0 //negative or positive num, from the current position
            }
        },
        pageEnable: true,
        pageLabel: "Page ",
    };
    jsPDFInvoiceTemplate.default(props);
}

  





