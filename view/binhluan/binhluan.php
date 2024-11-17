<?php
    session_start();
    include "../../model/pdo.php";
    include "../../model/binhluan.php";
    
    // if (!isset($_SESSION['user'])) {
    //    echo '<div class="comment-container"><div class="title">Đăng nhập để bình luận</div> </div>';
    //     exit(); }
       
$idpro = $_REQUEST['idpro'];
$list_cmt = loadall_binhluan($idpro);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bình luận</title>
    <link rel="stylesheet" href="binhluan.css">
    <style>
    .admin-user {
        color: red;
    }
    </style>
    <script>
    function validateComment() {
        var noidung = document.forms["commentForm"]["noidung"].value;
        if (noidung.trim() === "") {
            alert("Nội dung bình luận không được để trống!");
            return false;
        }
        return true;
    }
    </script>
</head>

<body>

    <div class="comment-container">
        <div class="title">Bình luận</div>

        <?php if (isset($_SESSION['user'])): ?>
        <div class="comment-box">
            <?php
               
              
               extract($_SESSION['user']);
               $hinhpath = "img/".$hinh;
               if(!is_file($hinhpath)){
                $hinh = "<img src='".$hinhpath."'>";
               }else{
                $hinh = "<img src='img/default.jpg' >";
               }
               
           
           ?>

            <?= $hinh ?>

            <form name="commentForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
                enctype="multipart/form-data" onsubmit="return validateComment()">
                <input type="hidden" name="idpro" value="<?= $idpro ?>">
                <input type="text" name="noidung" placeholder="Viết bình luận...">
                <input type="submit" class="button" name="guibinhluan" value="Gửi">
            </form>
        </div>
        <?php else: ?>
        <div class="comment-container">
            <div class="title">Đăng nhập để bình luận</div>
        </div>
        <?php endif; ?>

        <div class="comment-section">
            <?php
            foreach($list_cmt as $cmt){
                extract($cmt);
                $hinhpath = "./img/".$hinh;
        ?>
            <div class="comment">
                <img src="<?= $hinhpath ?>" alt="User Avatar">
                <div class="comment-content">
                    <?php 
                    echo $fullname;
                    // if($role === 1){ 
                    //     echo $fullname . ' <span class="admin-user">(' . $user . ')</span>';
                    // } else {
                    //     echo $fullname;
                    // }
                ?>
                    <p><?= $noidung ?></p>
                    <p class="comment-date"><?= $ngaybinhluan ?></p>
                </div>
            </div>
            <?php
            }
        ?>
        </div>
    </div>


    <?php
        if(isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])){
            $noidung = $_POST['noidung'];
            $id_user = $_SESSION['user']['id'];
            $user = $_SESSION['user']['user'];
            $role = $_SESSION['user']['role'];
            $fullname = $_SESSION['user']['fullname'];
            $hinh = $_SESSION['user']['hinh'];
            $idpro = $_POST['idpro'];
            $ngaybinhluan = date('d/m/Y');
            
            insert_binhluan($noidung, $id_user, $user, $fullname, $hinh, $idpro, $ngaybinhluan,$role);
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }
    ?>


</body>

</html>