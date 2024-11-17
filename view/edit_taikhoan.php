<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật tài khoản</title>
    <link rel="stylesheet" href="./login.css">
</head>

<body>
    <div class="login-container">
        <div class="tieude-login">
            <h2>Cập nhật tài khoản</h2>
        </div>
        <div class="form-login quen-mk">
            <form action="index.php?act=edit_taikhoan" method="post" enctype="multipart/form-data">
                <?php
    if(isset($_SESSION['user']) && ($_SESSION['user'] != "")) {
        extract($_SESSION['user']);
    }

?>
                <input type="text" value="<?php if(isset($user)) echo $user; ?>" disabled>
                <input type="text" placeholder="Họ và tên" required name="fullname" value="<?php echo $fullname; ?>">
                <!-- <input type="email" placeholder="Email" required name="email"> -->
                <input type="text" placeholder="Số điện thoại" required name="tel" value="<?php echo $tel; ?>">
                <input type="text" placeholder="Địa chỉ" required name="diachi" value="<?php  echo $diachi; ?>">
                <input type="hidden" name="id" value="<?php if(isset($id)) echo $id; ?>">
                <span>Image: </span> <input type="file" name="hinh">

                <input type="submit" value="Cập nhật" name="capnhat">
                <?php
                if(isset($thongbao) && ($thongbao != "")) echo $thongbao;
                ?>
            </form>


        </div>

        <div class=" links">
            <!-- <a href="#">Quên mật khẩu?</a> |  -->
            <!-- <a href="index.php?act=dangnhap">Đăng nhập</a> -->
        </div>
    </div>
</body>

</html>