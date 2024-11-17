<?php  
    if(is_array($taikhoan_one)){  
        extract($taikhoan_one);  
    }  
    $hinhpath = "../img/".$hinh;  
    if(is_file($hinhpath)){  
        $hinh = "<img src='".$hinhpath."' height='80'>";  
    } else {  
        $hinh = "no photo";  
    }  
?>

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
            <form class="input-form" action="index.php?act=updatetk" method="post" enctype="multipart/form-data">
                <div class="input-data-text">
                    <div class="input">
                        Tên đăng nhập<br>
                        <input class="input-data" type="text" name="user"
                            value="<?php if(isset($user) && ($user != "")) echo $user; ?>">
                    </div>
                    <div class="input">
                        Họ và tên<br>
                        <input class="input-data" type="text" name="fullname"
                            value="<?php if(isset($fullname) && ($fullname != "")) echo $fullname; ?>">
                    </div>
                    <div class="input">
                        Mật khẩu<br>
                        <input class="input-data" type="password" name="pass"
                            value="<?php if(isset($pass) && ($pass != "")) echo $pass; ?>">
                    </div>
                    <div class="input">
                        Email<br>
                        <input class="input-data" type="email" name="email"
                            value="<?php if(isset($email) && ($email != "")) echo $email; ?>">
                    </div>
                    <div class="input">
                        Địa chỉ<br>
                        <input class="input-data" type="text" name="diachi"
                            value="<?php if(isset($diachi) && ($diachi != "")) echo $diachi; ?>">
                    </div>
                </div>
                <div class="input-data-file">
                    <div class="input">
                        Ảnh<br>
                        <input class="input-data" type="file" name="hinh">
                        <?php echo $hinh; ?>
                    </div>
                    <div class="input">
                        Tel<br>
                        <input class="input-data" type="text" name="tel"
                            value="<?php if(isset($tel) && ($tel != "")) echo $tel; ?>">
                    </div>
                    <div class="input">
                        Vai trò<br>
                        <input class="input-data" type="text" name="role"
                            value="<?php if(isset($role) && ($role != "")) echo $role; ?>">
                    </div>
                </div>
                <div class="input-button">
                    <input type="hidden" name="id" value="<?php if(isset($id) && ($id > 0)) echo $id; ?>">
                    <input type="submit" class="button" value="Cập nhật" name="capnhat">
                    <input type="reset" class="button" value="Nhập lại">
                    <a href="index.php?act=dskh"><input type="button" class="button" value="Danh sách"></a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>