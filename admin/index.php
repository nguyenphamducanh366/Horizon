    <?php
      session_start();
      ob_start();
include '../model/pdo.php';
 include "../model/taikhoan.php";
  include "../model/danhmuc.php";
  include "../model/sanpham.php";
  include "../model/donhang.php";
  include "../model/binhluan.php";
  include "../model/voucher.php";
  include "../model/thongke.php";
  
  
  include "sidebar.php";
  if(!isset($_SESSION['s_user'])){
    header('location: ../admin/login.php');
  }
  //controller
  if(isset($_GET['act'])){
    $act = $_GET['act'];
    switch ($act) {
      case 'adddm':
        if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
          $tendm = $_POST['tendm'];
          insert_danhmuc($tendm);
          $thongbao="Thêm thành công";
        }
        include './danhmuc/add.php';
        break;
      case 'listdm':
        $listdanhmuc=loadAll_danhmuc();
        include './danhmuc/list.php';
        break;
      case 'xoadm':
        if(isset($_GET['id_dm'])&&($_GET['id_dm']>0)){
          delete_danhmuc($_GET['id_dm']);
        }
        $listdanhmuc=loadAll_danhmuc();
        include './danhmuc/list.php';
        break;
      case 'suadm':
        if(isset($_GET['id_dm'])&&($_GET['id_dm']>0)){
          $dm= loadOne_danhmuc($_GET['id_dm']);
        }
        include "./danhmuc/update.php";
        break;
      case 'updatedm':
        if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
          $tendm=$_POST['tendm'];
          $id_dm=$_POST['id_dm'];
          update_danhmuc($id_dm,$tendm);
          $thongbao="Cập nhật thành công";
        }
        $listdanhmuc=loadAll_danhmuc();
        include './danhmuc/list.php';
        break;
      case 'addsp':
        if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
          $id_dm=$_POST['id_dm'];
          $tensp=$_POST['tensp'];
          $gia_nhap=$_POST['gia_nhap'];
          $gia_chua_giam=$_POST['gia_chua_giam'];
          $giasp=$_POST['giasp'];
          $soluong=$_POST['soluong'];
          $mota=$_POST['mota'];
          $date=$_POST['date'];
          $target_dir = "../img/";
          $anhsp=$_FILES['anhsp']['name'];
          $target_file = $target_dir . basename($_FILES['anhsp']['name']);
          if(move_uploaded_file($_FILES['anhsp']['tmp_name'], $target_file)){
          }else{
             echo 'Lỗi';
          }
          insert_sanpham($tensp,$gia_nhap,$gia_chua_giam,$giasp,$anhsp,$soluong,$mota,$id_dm,$date);
          $thongbao="Thêm thành công";
        }
        $listdanhmuc=loadAll_danhmuc();
        include './sanpham/add.php';
        break;
      case 'listsp':
        if(isset($_POST['listOK'])&&($_POST['listOK'])){
          $kyw=$_POST['kyw'];
          $id_dm=$_POST['id_dm'];
        }else{
          $kyw='';
          $id_dm=0;
        }
        $listdanhmuc=loadAll_danhmuc();
        $listsanpham=loadAll_sanpham($kyw,$id_dm);
        include './sanpham/list.php';
        break;
      case 'xoasp':
        if(isset($_GET['id_sp']) && ($_GET['id_sp'] > 0)){  
          delete_sanpham($_GET['id_sp']);  
        } 

        $listsanpham=loadAll_sanpham("",0);
        include './sanpham/list.php';
        break;
        case 'suasp':
          if(isset($_GET['id_sp'])&&($_GET['id_sp']>0)){
            $sanpham= loadOne_sanpham($_GET['id_sp']);
          }
          $listdanhmuc=loadAll_danhmuc();
          include "./sanpham/update.php";
          break;
        case 'updatesp':
          if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
            $id_sp=$_POST['id_sp'];
            $id_dm=$_POST['id_dm'];
            $tensp=$_POST['tensp'];
            $gia_nhap=$_POST['gia_nhap'];
          $gia_chua_giam=$_POST['gia_chua_giam'];
            $giasp=$_POST['giasp'];
            $soluong=$_POST['soluong'];
            $mota=$_POST['mota'];
            $date=$_POST['date'];
            $hinh=$_FILES['hinh']['name'];
            $target_dir = "../img/";
            $target_file = $target_dir . basename($_FILES['hinh']['name']);
            if(move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)){
              
            }else{
              
            }
            update_sanpham($id_sp,$tensp, $hinh, $gia_nhap,$gia_chua_giam,$giasp,$soluong, $mota, $id_dm,$date);
          }
          $listdanhmuc=loadAll_danhmuc();
          $listsanpham=loadAll_sanpham("",0);
          include './sanpham/list.php';
          break;
        case 'listdonhang':
          $listdonhang=loadAll_donhang();
          include './donhang/list.php';
          break;
        case 'suadonhang':
          if(isset($_GET['id'])&&($_GET['id']>0)){
            $donhang_one= loadOne_donhang($_GET['id']);
            $cart_items = load_all_cart_items($_GET['id']); 
          }
          include "./donhang/update.php";
          break;
        case 'updatebill':
          if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
            $trangthai=$_POST['ttdh'];
            $id=$_POST['bill_id'];
            update_donhang($id,$trangthai);
            $thongbao="Cập nhật thành công";
          }
          $listdonhang=loadAll_donhang();
          include './donhang/list.php';
          break;
        
        
        
        
          case 'dskh':
            $listtaikhoan =loadall_taikhoan();
            include "taikhoan/list.php"; 
            break;           
          
            case 'xoatk':
              if(isset($_GET['id']) && ($_GET['id']>0)){
                  delete_taikhoan($_GET['id']);
              }
              $listtaikhoan =loadall_taikhoan();
                include "taikhoan/list.php";
                break;        
              case 'suatk':
                if(isset($_GET['id']) && ($_GET['id']>0)){
                    $taikhoan_one = loadone_taikhoan($_GET['id']);
                }
                
                include "taikhoan/update.php"; 
              break;
          
              case 'updatetk':
                  if(isset($_POST['capnhat']) &&($_POST['capnhat'])){
                  $id =$_POST['id'];
                  $user =$_POST['user'];
                  $pass=$_POST['pass'];
                  $email =$_POST['email'];
                  $diachi =$_POST['diachi'];
                  $tel=$_POST['tel'];
                  $role =$_POST['role'];
                  $hinh = $_FILES['hinh']['name'];
                  $target_dir ="../img/";
                  $target_file = $target_dir.basename($_FILES["hinh"]["name"]);
                  move_uploaded_file($_FILES["hinh"]["tmp_name"],$target_file);
                  
                  update_taikhoan_admin($id,$user,$pass,$email,$diachi,$tel,$role,$hinh);
                  // $thongbao ="Cập nhậttài khoản thành công!";
                  }
                  $listtaikhoan =loadall_taikhoan();
                  include "taikhoan/list.php";
                  break;
              case'addtk':
                  if(isset($_POST['themmoi']) && ($_POST['themmoi'] )){
                  $user =$_POST['user'];
                  $pass =$_POST['pass'];
                  $email =$_POST['email'];
                  $diachi =$_POST['diachi'];
                  $tel =$_POST['tel'];
                  $role =$_POST['role'];
                  $hinh = $_FILES['hinh']['name'];
                  $target_dir ="../img/";
                  $target_file = $target_dir.basename($_FILES["hinh"]["name"]);
                  move_uploaded_file($_FILES["hinh"]["tmp_name"],$target_file);
                  insert_taikhoan_admin($user,$pass,$email,$diachi,$tel,$role,$hinh);
                  $thongbao ="Thêm mới thành công!";
                  }
                  
                  include "taikhoan/add.php"; 
                  break;
                  case 'list_binhluan':
                    $list_binhluan = loadall_binhluan(0);
                    include "binhluan/list.php";
                    break;
                    case 'xoabl':
                      if(isset($_GET['id']) && ($_GET['id']>0)){
                          delete_binhluan($_GET['id']);
                      }
                      $list_binhluan =loadall_binhluan(0);
                        include "binhluan/list.php";
                        break;   
                        
                  case 'listthongke';
                  $top_selling_products = get_top5_ban_chay();
                  $don_hang_thong_ke = thong_ke_don_hang();
                  include "thongke/list.php";
                  break;

                  case'logout':
                   session_unset();
                    header('Location: login.php');
                    exit;
      default:
      // include "home.php";
      break;     
    }
  }
?>
 <script>
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