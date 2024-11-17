<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Kodchasan:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700&display=swap');
    </style>
</head>

<body>
    <div class="main-content">
        <div class="title">THÊM MỚI TÀI KHOẢN</div>
        <div class="container">
            <form class="input-form" action="index.php?act=addtk" method="post" enctype="multipart/form-data">
                <div class="input-data-text">
                    <div class="input">
                        Tên đăng nhập<br>
                        <input class="input-data" type="text" name="user">
                    </div>
                    <div class="input">
                        Họ và tên<br>
                        <input class="input-data" type="text" name="fullname">
                    </div>
                    <div class="input">
                        Mật khẩu<br>
                        <input class="input-data" type="password" name="pass">
                    </div>
                    <div class="input">
                        Email<br>
                        <input class="input-data" type="email" name="email">
                    </div>
                    <div class="input">
                        Địa chỉ<br>
                        <input class="input-data" type="text" name="diachi">
                    </div>

                </div>
                <div class="input-data-file">
                    <div class="input">
                        Ảnh<br>
                        <input class="input-data" type="file" name="hinh">
                    </div>
                    <div class="input">
                        Tel<br>
                        <input class="input-data" type="text" name="tel">
                    </div>
                    <div class="input">
                        Vai trò<br>
                        <input class="input-data" type="text" name="role">
                    </div>

                </div>
                <div class="input-button">
                    <input type="submit" class="button" value="Thêm mới" name="themmoi">
                    <input type="reset" class="button" value="Nhập lại">
                    <a href="index.php?act=dskh">
                        <input type="button" class="button" value="Danh sách">
                    </a>
                </div>
            </form>
            <h4 style="color:red">
                <?php
        if(isset($thongbao) && $thongbao!=""){
            echo $thongbao;
        }
    ?>
            </h4>
        </div>
    </div>

</body>

</html>