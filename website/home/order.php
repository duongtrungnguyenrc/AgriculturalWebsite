<?php
    include '../part/header.php';
?>

<div id="order">
                <div id="oders-status" class="w-100 h-100">
                    <div class=" w-100 h-100 oder-items">
                        <div class="oder-status oder-steps-group">
                            <p class="title mb-2"><b>Oder status</b>:</p>
                            <div class="oder-steps">
                                <div class="step-line"></div>
                                <div class="step completed" data-bs-toggle="tooltip" title="Your order has been receive!">
                                    <i class='bx bx-notepad'></i>
                                </div>
                                <div class="step ms-5 me-5" data-bs-toggle="tooltip" title="Your order has been approved!">
                                    <i class='bx bxs-package'></i>
                                </div>
                                <div class="step ms-5 me-5" data-bs-toggle="tooltip" title="Your order is being shipped!">
                                <i class='bx bxs-truck'></i>
                                </div>
                                <div class="step" data-bs-toggle="tooltip" title="Your order has been successfully delivered!">
                                    <i class='bx bx-check-double'></i>
                                </div>
                            </div>
                        </div>
                        <div class="oder-list w-100 mt-3 oder-status">
                            <ul class="w-100 h-100 m-0 p-0">
                                <li class="oder-item">
                                    <img src="./pictures/eggs.jpg" alt="" class="img-thumbnail m-2">
                                    <div class="cart-item-info">
                                        <h4>trứng gà</h4>
                                        <div class="quantity-group">
                                            <label>Số lượng: 1</label>
                                            <p class="cart-item-price mb-0">50000 VNĐ</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="oder-item">
                                    <img src="./pictures/eggs.jpg" alt="" class="img-thumbnail m-2">
                                    <div class="cart-item-info">
                                        <h4>trứng gà</h4>
                                        <div class="quantity-group">
                                            <label>Số lượng: 1</label>
                                            <p class="cart-item-price mb-0">50000 VNĐ</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="oder-item">
                                    <img src="./pictures/eggs.jpg" alt="" class="img-thumbnail m-2">
                                    <div class="cart-item-info">
                                        <h4>trứng gà</h4>
                                        <div class="quantity-group">
                                            <label>Số lượng: 1</label>
                                            <p class="cart-item-price mb-0">50000 VNĐ</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="oder-item">
                                    <img src="./pictures/eggs.jpg" alt="" class="img-thumbnail m-2">
                                    <div class="cart-item-info">
                                        <h4>trứng gà</h4>
                                        <div class="quantity-group">
                                            <label>Số lượng: 1</label>
                                            <p class="cart-item-price mb-0">50000 VNĐ</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="oder-prices w-100">
                            <p class="mb-0">Tổng giá trị: <b>500000 VNĐ</b></p>
                        </div>
                        <div class="oder-control w-100">
                            <button class="btn btn-outline-secondary w-100" onclick="document.querySelector('.oder-items').classList.toggle('active')">Chose</button>
                        </div>
                    </div>
                </div>
                <div id="purchase-group">
                    <div id="customer-info w-100">
                        <div id="customer-contact-info" class="d-flex">
                            <p id="customer-name" class="m-0"><b>Đường Trung Nguyên</b></p>
                            <p id="customer-phone"class="m-0" >0855004714</p>
                        </div>
                        <p class="m-0 mt-1">Xã Ân Tường Tây, huyện Hoài Ân, Tỉnh Bình Định</p>
                    </div>
                    <hr>
                    <div id="total-prices-group" class="d-flex">
                        <p class="m-0 me-2">Delete status:</p>
                        <p id="total-prices" class="m-0"><b>Can't cancel this oder!</b></p>
                    </div>
                    <div id="purchase-button-group" class="mt-1 w-100 d-flex">
                        <button class="btn btn-danger w-100">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="./index.js"></script>
</body>
</html>