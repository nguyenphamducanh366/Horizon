<?php

session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./header.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Kodchasan:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700&display=swap');
    </style>
    <style>
    .buy-button{
  position: absolute;
  bottom:0;
  margin-bottom: 30px;
}
.user-name {
  color: red;
  font-weight: bolder;
  text-transform: capitalize;
}
    
    </style>
</head>

<body>
    <div class="container">
        <header>
            <nav class="navbar">
                <a class="navbar-brand" href="index.php"><img class="logo-img" src="img/logo.png"
                        alt="Ảnh trang chủ"></a>

                <div class="navbar-content" id="navbarSupportedContent">
                    <ul class="nav-items">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=sanpham">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="showGioHang()">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </li>

                        <?php
                                if(isset($_SESSION['user'])) {
                                   extract($_SESSION['user']);

                                   $user = $_SESSION['user'];
                                   $hinh = isset($user['hinh']) ? $user['hinh'] : '';
                                   
                                   if(empty($hinh)) {
                                       $hinh = "img/default.jpg";
                                   }else{
                                    $hinh ="img/".$hinh;
                                   }

                                // $hinh = $_SESSION['user']['hinh'];
                
                
                                // $hinhpath = "./img/".$hinh;
                                // if(is_file($hinhpath)){
                                //  $hinh = "<img src='".$hinhpath."' >";
                                // }else{
                                //  $hinh = "img/default.jpg";
                                // }
                                //    $hinhUrl = $hinh . '?v=' . time();
                                   echo '<li class="nav-item">
                            <a class="nav-link " aria-current="page" href="index.php?act=mybill">Đơn hàng</a>
                        </li>
                        </li>
                         <span class="user-name">'.$_SESSION['user']['user'].'</span>
                        </li>
                        <li class=" nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" onclick="toggleDropdown(event)">
                                <img src="'.$hinh.'" alt="" width="40" height="40" class="profile-picture"">
                            </a>

                           
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a></li>
                            <li><a class="dropdown-item" href="index.php?act=updatepass">Cập nhật mật khẩu</a></li>
                            <li><a class="dropdown-item" href="index.php?act=dangxuat">Thoát</a></li>
                        </ul>
                        </li>';


                        }else{
                        echo ' <li class=" nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" onclick="toggleDropdown(event)">
                                <i class="fa-solid fa-user"></i>
                            </a>

                            <?php

                            ?>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="index.php?act=dangnhap">Đăng nhập</a></li>
                            <li><a class="dropdown-item" href="index.php?act=dangky">Đăng ký</a></li>
                            <li><a class="dropdown-item" href="index.php?act=quenmk">Quên mật khẩu</a></li>
                        </ul>
                        </li>
                        ';
                        }
                        ?>


                    </ul>
                    <form class="search-form" role="search" action="index.php" method="get">
                        <input type="hidden" name="act" value="timkiem">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                            name="search">
                        <button class="btn" type="submit" name="btn-search">Search</button>
                    </form>
                </div>
            </nav>
        </header>
        <div class="sidecart">
            <?php
            sidecart(1);
            ?>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
    function toggleDropdown(event) {
        event.stopPropagation();
        const dropdownMenu = event.currentTarget.nextElementSibling;
        dropdownMenu.classList.toggle('show');
    }
    window.onclick = function(event) {
        if (!event.target.matches('.dropdown-toggle, .dropdown-toggle *')) {
            const dropdowns = document.getElementsByClassName('dropdown-menu');
            for (let i = 0; i < dropdowns.length; i++) {
                const openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
    function formatGia(number) {
        let numStr = number.toString();
        let parts = [];
        for (let i = numStr.length - 1, count = 0; i >= 0; i--, count++) {
            if (count > 0 && count % 3 === 0) {
                parts.push('.');
            }
            parts.push(numStr[i]);
        }
        return parts.reverse().join('');
    }

    document.querySelectorAll('#giasp').forEach(element => {
        let priceText = element.textContent.trim();
        let number = parseInt(priceText.replace('VNĐ', '').replace(/\./g, '').trim(), 10);
        if (!isNaN(number)) {
            element.textContent = formatGia(number) + ' VNĐ';
        }
    });
    </script>
</body>

</html>