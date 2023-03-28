$(window).ready(() => {
    $("#menu-btn").click(() => {
        $("#navbar-left").toggleClass("show");
        $("#content").toggleClass("active");
        $("#menu-btn i").toggleClass("bx-menu");
        $("#menu-btn i").toggleClass("bx-x");
        setTimeout(() => {
            $("#navbar-left label").toggleClass("show");
        }, 300);
    })
})




// window.onload = function() {
//     const params = new URLSearchParams(location.search);
//     const login = params.get('login');
    
//     const navbarItems = document.querySelectorAll("#navbar-left .navbar-item .nav-btn");
//     navbarItems.forEach((item) => {
//         let li = item.parentElement;
//         item.addEventListener("click", (event) => {
//             navbarItems.forEach((item => {
//                 item.parentElement.classList.remove("active");
//             }))
//             li.classList.add("active");
//         })
//     })
    
//     // toggle slide bar


    
//     const products = document.querySelectorAll("#content .content-element .products");
//     const moreBtns = document.querySelectorAll("#content .content-element .control .more-btn");
//     products.forEach((value, key) => {
//         moreBtns[key].addEventListener("click", (event) => {
//             value.classList.toggle("show");
//             if (value.classList.contains("show")) {
//                 moreBtns[key].innerHTML = "minimize <i class='bx bxs-up-arrow'></i>"
//             }
//             else {
//                 moreBtns[key].innerHTML = "more <i class='bx bxs-down-arrow'></i>"
//             }
//         })
//     })
    
//     const offcanvas = document.querySelectorAll('.offcanvas');
    
//     offcanvas.forEach((item) => {
//         let prevClass = item.className;
//         setInterval(() => {
//           if (!item.classList.contains('show') && prevClass.includes('show')) {
//                 let li = navbarItems[0].parentElement;
//                 navbarItems.forEach((curr => {
//                     curr.parentElement.classList.remove("active");
//                 }))
//                 li.classList.add("active");
//           }
//           prevClass = item.className;
//         },300);
//     })
    
//     setTimeout(() => {
//         document.getElementById("notifycation").remove();
//     }, 3000);

//     ///

//     const profileInfo = document.querySelectorAll("#user #info-group .input-group input");
//     const editProfileBtn = document.getElementById("edit-profile-btn");
//     const saveProfileBtn = document.getElementById("save-profile-btn");
//     editProfileBtn.addEventListener("click", () => {
//         profileInfo.forEach((input) => {
//             input.disabled = false;
//         })
//     })

//     saveProfileBtn.addEventListener("click", () => {
//         profileInfo.forEach((input) => {
//             input.disabled = true;
//         })
//     })


//     //

//     const btnRQLogin = document.querySelectorAll("#navbar-left .nav-btn.require-login");
//     console.log(btnRQLogin);
//     btnRQLogin.forEach((button) => {
//         button.addEventListener("click", () => {
//             console.log(login);
//             if (!login) {
//                 window.location = "../login/login.php";
//             }
//         })
//     })

//     var loginBtn = document.querySelectorAll("#navbar-left .navbar-item.login-btn");
//     if(login) {
//         loginBtn[0].querySelector("i").classList.remove("bx-log-in");
//         loginBtn[0].querySelector("i").classList.add("bx-log-out");
//         loginBtn[0].querySelector("label").innerHTML = "Log out";
//     }
// };