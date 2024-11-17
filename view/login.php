<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Đăng Nhập</title>
    <link rel="stylesheet" href="login.css">
    <style>
         .account-button {
    width: 100%;
    padding: 10px;
    background-color: #0866ff!important;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
}
    </style>
</head>

<body>
    <div class="login-container">
        <div class="tieude-login">
            <h2>Đăng Nhập</h2>
        </div>
        <div class="form-login  quen-mk">
            <form action="index.php?act=dangnhap" method="post">
                <input type="text" placeholder="Tên đăng nhập" required name="user">
                <input type="password" placeholder="Mật khẩu" required name="pass">
                <input type="submit" class="account-button" value="Đăng nhập" name="dangnhap">
                <?php
                if(isset($thongbao) && ($thongbao != "")) echo $thongbao;
                ?>
            </form>
        </div>

        <div class="links">
            <a href="index.php?act=quenmk">Quên mật khẩu?</a> |
            <a href="index.php?act=dangky">Tạo tài khoản</a>
        </div>
    </div>
</body>

</html>