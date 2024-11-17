<?php
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/taikhoan.php";
include "model/cart.php";
include "view/header.php";

if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];
$showProductList = true;
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'timkiem':
            include "view/timkiem.php";
            $showProductList = false;
            break;
        case 'nam':
            include "view/category.php";
            include "view/nam.php";
            $showProductList = false;
            break;
        case 'nu':
            include "view/category.php";
            include "view/nu.php";
            $showProductList = false;
            break;
        case 'new':
            include "view/category.php";
            include "view/new.php";
            $showProductList = false;
            break;
        case 'hot':
            include "view/category.php";
            include "view/hot.php";
            $showProductList = false;
            break;
        case 'Rolex':
            include "view/category.php";
            include "view/rolex.php";
            $showProductList = false;
            break;
        case 'Omega':
            include "view/category.php";
            include "view/omega.php";
            $showProductList = false;
            break;
        case 'Tag_Heuer':
            include "view/category.php";
            include "view/Tag_Heuer.php";
            $showProductList = false;
            break;
        case 'xemChiTiet':
            if (isset($_GET['id_sp'])) {
                $id_sp = $_GET['id_sp'];
                update_view_count($id_sp);
                include "view/sanphamct.php";
                $showProductList = false;
            }
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = check_user($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    header("Location: index.php");
                    exit;
                } else {
                    $thongbao = "Tài khoản không tồn tại. Vui lòng đăng ký hoặc đăng nhập lại!";
                }
            }
            include "view/login.php";
            $showProductList = false;
            break;
        case 'dangky':
            if (isset($_POST['dangky'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $fullname = $_POST['fullname'];
                insert_taikhoan($email, $user, $pass, $fullname);
                $thongbao = "Đã đăng ký thành công!";
            }
            include "view/dangky.php";
            $showProductList = false;
            break;
        case 'edit_taikhoan':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                // $user = $_POST['user'];
                // $pass = $_POST['pass'];
                // $email = $_POST['email'];
                $fullname = $_POST['fullname'];
                $diachi = $_POST['diachi'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "./img/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                move_uploaded_file($_FILES["hinh"]["tmp_name"],$target_file);
                update_tk($id, $fullname, $diachi, $tel, $hinh);
                // $_SESSION['user'] = check_user($user,$pass);
                header('loaction: index.php?act=edit_taikhoan');
                $thongbao = "Cập nhật thành công!";
            }
            include "view/edit_taikhoan.php";

            $showProductList = false;
            break;
        case 'updatepass':


            
            if (isset($_POST['capnhatmk'])) {
                if (isset($_SESSION['user']['id'])) {
                    $id = $_SESSION['user']['id'];
                    $current_password = $_POST['current_password'];
                    $new_password = $_POST['new_password'];
                    $confirm_password = $_POST['confirm_password'];

                    if (!empty($current_password) && !empty($new_password) && !empty($confirm_password)) {
                        
                        $thongbao = update_password($id, $current_password, $new_password, $confirm_password);
                    } else {
                        $thongbao = "Vui lòng nhập đầy đủ thông tin.";
                    }
                } else {
                    $thongbao = "Bạn cần phải đăng nhập để cập nhật mật khẩu.";
                }
            }

            include "view/update_password.php";
            $showProductList = false;
            break;


        case 'quenmk':
            if (isset($_POST['guiemail'])) {
                $email = $_POST['email'];
                $checkemail = check_email($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là: " . $checkemail['pass'];
                } else {
                    $thongbao = "Email không tồn tại";
                }
            }
            include "view/forgot.php";
            $showProductList = false;
            break;

        case 'dangxuat':
            session_unset();
            header('Location: index.php');
            exit;
        case 'sanpham':
            include "view/sanpham.php";
            $showProductList = false;
            break;

        case 'addtocart':
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $id_sp = $_POST['id_sp'];
                $tensp = $_POST['tensp'];
                $anhsp = $_POST['anhsp'];
                $giasp = $_POST['giasp'];
                $soluong = 1;
                $ttien = $soluong * $giasp;
                $spadd = [$id_sp, $tensp, $anhsp, $giasp, $soluong, $ttien];
                array_push($_SESSION['mycart'], $spadd);
                header('Location: index.php');
            }
            break;

        case 'delcart':
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            $showProductList = false;
            header('Location: index.php');
            break;
        case 'viewcart':
            $showProductList = false;
            include "view/cart/viewcart.php";
            break;
        case 'bill':
            $showProductList = false;
            include "view/cart/bill.php";
            break;
        case 'billcomfirm':
            if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                $id_user = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : 0;
                $user = $_POST['user'];
                $fullname = $_POST['fullname'];
                $diachi = $_POST['diachi'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                $pttt = $_POST['pttt'];
                $ngaydathang = date('h:i:sa d/m/Y');
                $tongdonhang = tongdonhang();

                $idbill = insert_bill($id_user, $user, $fullname, $diachi, $email, $tel, $pttt, $ngaydathang, $tongdonhang);

                foreach ($_SESSION['mycart'] as $cart) {
                    insert_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $idbill);
                }
                $_SESSION['cart'] = [];
            }
            $bill = loadone_bill($idbill);
            $billct = loadall_cart($idbill);
            $showProductList = false;
            include "view/cart/billconfirm.php";
            break;

        case 'mybill':
            $listbill = loadall_bill($_SESSION['user']['id']);
            $showProductList = false;
            include "view/cart/mybill.php";
            break;
        case 'xemchitiet':
            if (isset($_GET['bill_id'])) {
                $bill_id = $_GET['bill_id'];
                $billct = loadall_cart($bill_id);
                include "view/cart/billct.php";
            } else {
                // Handle error or redirect
                header('Location: index.php?act=mybill');
                exit;
            }
            $showProductList = false;
            break;
        case 'huydonhang':
            if (isset($_GET['bill_id'])) {
                $bill_id = $_GET['bill_id'];
                delete_bill($bill_id);
                header('Location: index.php?act=donhang');
            }
            break;
    }
}
if ($showProductList) {
    include "view/home.php";
    include "view/banner-footer.php";
}

include "view/footer.php";
?>
<script>
    function formatNumberWithDots(number) {
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

    document.querySelectorAll('.giasp').forEach(element => {
        let priceText = element.textContent.trim();
        let number = parseInt(priceText.replace('VNĐ', '').replace(/\./g, '').trim(), 10);
        if (!isNaN(number)) {
            element.textContent = formatNumberWithDots(number) + ' VNĐ';
        }
    });
</script>
<script src="script.js"></script>