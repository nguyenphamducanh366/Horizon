<?php
 include '../model/pdo.php';
 include '../model/taikhoan.php';

 session_start();
 ob_start();

 if(isset($_POST["login"])){
    $uname=$_POST["uname"];
    $psw=$_POST["psw"];
    $user=check_user($uname,$psw);
    if(isset($user)&&(is_array($user))&&(count($user)>0)){
        extract($user);
        if($role==1){
            $_SESSION['s_user']=$user;
            header('location:index.php');
        }else{
            $tb="Tài khoản này không có quyền đăng nhập trang quản trị";
        }
    }else{
        $tb="Tài khoản này không tồn tại.";
    }
    

}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    form {
        border: 3px solid #f1f1f1;
    }

    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        opacity: 0.8;
    }

    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }

    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }

    img.avatar {
        width: 40%;
        border-radius: 20%;
    }

    .container {
        padding: 16px;
    }

    span.psw {
        float: right;
        padding-top: 16px;
    }

    .boxcenter {
        width: 500px;
        margin: 0 auto;
    }


    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }

        .cancelbtn {
            width: 100%;
        }
    }
    </style>
</head>

<body>
    <div class="boxcenter">
        <h2 style="text-align: center;">Đăng nhập admin</h2>

        <form action="login.php" method="post">
            <div class="imgcontainer">
                <img src="../img/logo.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="uname"><b>Tên đăng nhập</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label for="psw"><b>Mật khẩu</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                <?php
        if(isset($tb)&&($tb!="")){
            echo "<h3 style='color:red'>".$tb."</h3>";
        }
    ?>
                <button type="submit" name="login">ĐĂNG NHẬP</button>

            </div>


        </form>
    </div>
</body>

</html>