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
            <h2>Cập nhật mật khẩu</h2>
        </div>
        <div class="form-login  quen-mk">
            <?php
                if(isset($_SESSION['user'])){
                    extract($_SESSION['user']);
                }
            ?>
            <form action="index.php?act=updatepass" method="post">
                <input type="password" placeholder="Mật khẩu cũ" required name="current_password">
                <input type="password" placeholder="Mật khẩu mới" required name="new_password">
                <input type="password" placeholder="Nhập lại mật khẩu mới" required name="confirm_password">
                <input type="hidden" name="id" value="<?php if(isset($id)) echo $id; ?>">
                <input type="submit" class="account-button" value="Cập nhật" name="capnhatmk">
                <?php
                if(isset($thongbao) && ($thongbao != "")) echo $thongbao;
                ?>
            </form>
        </div>

        <div class="links">
            <a href="index.php?act=quenmk">Quên mật khẩu?</a>

        </div>
    </div>
</body>

</html>