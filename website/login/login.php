<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./login.css">
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap-5.3.0-alpha1-dist/css/bootstrap.css">
    <script src="../bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
    <script src="./login.js"></script>
</head>
<body>
    <div id="notifycation" style="display: <?php if(isset($_GET['login']) && $_GET['login'] == "fail") echo "block"; ?>">
        Đăng nhập thất bại!
    </div>
    <div id="content" class="col-12 h-100">
        <div id="intro">
            <h1>Nông Sản Sạch</h1>
            <p>Nông sản là các sản phẩm nông nghiệp và lâm nghiệp được trồng trọt và sản xuất từ các nông trường, trang trại và khu vực nông thôn. Các nông sản bao gồm các loại cây trồng như lúa, mía, ngô, sắn, khoai, rau củ quả, trái cây, các loại cỏ thảo dược và động vật nuôi như gia súc, gia cầm, cá, tôm, cua...</p>
            <button type="submit" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#login-form">Log in</button>
        </div>
    </div>

    <div class="offcanvas offcanvas-end" id="login-form">
        <div class="offcanvas-header">
          <h1 class="offcanvas-title">Login</h1>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body" id="form">
            <form action="../home/home.php?login=true" method="post">
                <div class="input-group">
                    <span class="input-group-text">@</span>
                    <input type="text" class="form-control" placeholder="Username" name="user">
                  </div>
                
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                  </div>
    
                  <div class="input-group">
                    <label for="">Don't have account?<a href="" class="ms-1">Create one!</a></label>
                  </div>
    
                  <div class="input-group">
                    <button type="submit" class="btn btn-primary w-100">Log in</button>
                  </div>
            </form>
        </div>
      </div>
</body>
</html>

