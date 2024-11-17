<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Kodchasan:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700&display=swap');
    </style>
    <style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: "Kodchasan", sans-serif;
    }

    a {
        text-decoration: none;
        color: white;
    }

    body {
        display: flex;
        align-items: center;

    }

    .sidebar {
        display: grid;
        align-items: center;
        width: 15%;
        height: 100vh;
        background-color: #293540;
        font-size: 0.85dvw;
        position: fixed;
        bottom: 0;
    }

    .logo {
        width: 50%;
        align-self: center;
        border-radius: 20px;
    }

    .items-container {
        display: grid;
        margin-left: 10%;
        width: 100%;
        height: 100%;
    }

    .sidebar-items {
        margin: 5%;
        padding: 3%;
        border-radius: 20px 0 0 20px;
        transition: 0.3s ease-out;
    }

    .sidebar-items:hover {
        background-color: white;
        color: #293540;
        transition: 0.3s ease-in;
    }

    .logout-button {
        padding: 5%;
        background-color: #DA3232;
        color: white;
        cursor: pointer;
        border-radius: 20px;
    }
    </style>
</head>

<body>
    <div class="sidebar">
        <center> <a href="index.php"><img src="../img/logo.png" alt="" class="logo"></a></center>
        <div class="items-container">
            <a href="index.php" class="sidebar-items">Trang chủ</a>
            <a href="index.php?act=listdm" class="sidebar-items">Quản lý danh mục</a>
            <a href="index.php?act=listsp" class="sidebar-items">Quản lý sản phẩm</a>
            <a href="index.php?act=listdonhang" class="sidebar-items">Quản lý đơn hàng</a>
            <a href="index.php?act=dskh" class="sidebar-items">Quản lý tài khoản</a>
            <a href="index.php?act=list_binhluan" class="sidebar-items">Quản lý bình luận</a>
            <a href="index.php?act=listthongke" class="sidebar-items">Thống kê</a>


        </div>
        <center>
            <a href="index.php?act=logout">
                <div class="logout-button">Thoát</div>
            </a>
        </center>
    </div>
</body>

</html>