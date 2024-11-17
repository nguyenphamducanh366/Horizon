<?php
function viewcart($del){
    $hinhpath="./img/";
    $tong=0; 
    $i=0;
    if($del==1){
        $xoasp_th='<td>Thao tác</td>';    
        $xoasp_td2='<td></td>';
        }else{
            $xoasp_th='';
            $xoasp_td2='';
        }
    echo '<tr>
              <td>Hình</td>
              <td>Sản phẩm</td>
              <td>Đơn giá</td>
              <td>Số lượng</td>
              <td>Thành tiền</td>
    '.$xoasp_th.'
          </tr>';

        foreach($_SESSION['mycart'] as $cart){
            $hinh=$hinhpath.$cart[2];
            $ttien=$cart[3]*$cart[4];
            $tong+=$ttien;
            
                echo '
                      <tr class=product-views>
                        <td><center><img src="'.$hinh.'" alt="" height="80px"></center></td>
                        <td><center>'.$cart[1].'</center></td>
                        <td id="giasp"><center>'.$cart[3].'</center></td>
                        <td><center>'.$cart[4].'</center></td>
                        <td id="giasp" ><center>'.$ttien.'</center></td>
                      </tr>';
                    $i+=1;
                    }
                echo '<tr>
                            <td colspan="4">Tổng đơn hàng</td>
                              
                            <td id="giasp">'.$tong.'</td>
                            <td></td>
                            '.$xoasp_td2.'
                     </tr>';
}
function sidecart($del) {
    $hinhpath = "./img/";
    $tong = 0;
    $i = 0;
    
    echo '<div class="cart-title-container">';
    echo '<ion-icon class="menu-items" name="bag-outline"></ion-icon>';
    echo '<h1 class="title">Giỏ Hàng</h1>';
    echo '</div>';

    if (isset($_SESSION['mycart'])) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['increase'])) {
                $id_cart = $_POST['id_cart'];
                $_SESSION['mycart'][$id_cart][4]++;
            } elseif (isset($_POST['decrease'])) {
                $id_cart = $_POST['id_cart'];
                if ($_SESSION['mycart'][$id_cart][4] > 1) {
                    $_SESSION['mycart'][$id_cart][4]--;
                }
            }
        }

        $cart_giong_nhau = [];
        foreach ($_SESSION['mycart'] as $cart) {
            $id = $cart[0];
            if (isset($cart_giong_nhau[$id])) {
                $cart_giong_nhau[$id][4] += $cart[4];
            } else {
                $cart_giong_nhau[$id] = $cart;
            }
        }
        $_SESSION['mycart'] = array_values($cart_giong_nhau);

        foreach ($_SESSION['mycart'] as $cart) {
            $hinh = $hinhpath . $cart[2];
            $ttien = $cart[3] * $cart[4];
            $tong += $ttien;

            echo '<div class="cart-product-container">';
            echo '<h5 class="cart-product-name">' . $cart[1] . '</h5>';
            echo '<img class="cart-product-img" src="' . $hinh . '" alt="' . $cart[1] . '">';
            echo '<div class="quantity-box">';
            echo '<form method="POST" action="">';
            echo '<input type="hidden" name="id_cart" value="' . $i . '">';
            echo '<input type="hidden" name="quantity" value="' . $cart[4] . '">';
            echo '<button type="submit" name="decrease" class="add-decrease">-</button>';
            echo '<span class="quantity">' . $cart[4] . '</span>';
            echo '<button type="submit" name="increase" class="add-decrease">+</button>';
            echo '</div>';
            echo '<p id="giasp"  class="cart-product-price">' . $cart[3] . ' VNĐ</p>';

            if ($del == 1) {
                echo '<a href="index.php?act=delcart&idcart='.$i.'"><input class="add-decrease" type="button" value="X"></a>';
            }
            echo '</div>';
            echo '</form>';

            $i += 1;
        }

        echo '<div class="total-box">';
        echo '<h3>Tổng số tiền là: </h3>';
        echo '<p id="giasp"  class="total-price">' . $tong . ' VNĐ</p>';
        echo '</div>';
        echo '<a href="index.php?act=bill"><div class="button buy-button ">Mua</div></a>';
    } else {
        echo '<p>Giỏ hàng của bạn đang trống.</p>';
    }

}

function bill_chi_tiet($listbill){
    $hinhpath="./img/";
    $tong=0; 
    $i=0;

    echo '<tr>
              <td>Ảnh Sản phẩm</td>
              <td>Tên Sản phẩm</td>
              <td>Giá</td>
              <td>Số lượng</td>
              <td>Thành tiền</td>
          </tr>';

        foreach($listbill as $cart){
            $hinh=$hinhpath.$cart['anhsp'];
            $tong+=$cart['thanhtien'];
            
                echo '
                      <tr class=product-views>
                        <td><center><img src="'.$hinh.'" alt="" height="80px"></center></td>
                        <td><center>'.$cart['tensp'].'</center></td>
                        <td id="giasp" ><center>'.$cart['giasp'].'</center></td>
                        <td><center>'.$cart['soluong'].'</center></td>
                        <td id="giasp"><center>'.$cart['thanhtien'].'</center></td>
                        
                      </tr>';
                    $i+=1;
                    }
                echo '<tr>
                            <td colspan="4">Tổng Giá</td>
                              
                            <td id="giasp" >'.$tong.'</td>
                            <td></td>
                     </tr>';
}
function tongdonhang(){
    $tong=0; 
    
        foreach($_SESSION['mycart'] as $cart){
            
            $ttien=$cart[3]*$cart[4];
            $tong+=$ttien;
            
        }
        return $tong;
    }

function insert_bill($id_user,$user,$fullname,$diachi,$email,$tel,$pttt,$ngaydathang,$tongdonhang){
    $sql="insert into bill (user_id,user,bill_name,diachi,email,tel,pttt,ngaydathang,tonggia) values('$id_user','$user','$fullname','$diachi','$email','$tel','$pttt','$ngaydathang','$tongdonhang')";
    return pdo_execute_return_lastInsertId($sql);
}
function insert_cart($id_user,$id_sp,$anhsp,$tensp,$giasp,$soluong,$thanhtien,$idbill){
    $sql="insert into cart (id_user,id_sp,anhsp,tensp,giasp,soluong,thanhtien,bill_id) values('$id_user','$id_sp','$anhsp','$tensp','$giasp','$soluong','$thanhtien','$idbill')";
    return pdo_execute($sql);
}
function loadone_bill($id){
    $sql="select * from bill where bill_id=".$id;
    $bill=pdo_query_one($sql);
    return $bill;
}
function loadall_cart($idbill){
    $sql="select * from cart where bill_id=".$idbill;
    $bill=pdo_query($sql);
    return $bill;
}
function loadall_bill($id_user=0){
    $sql="select * from bill where 1";
    if($id_user>0) $sql.=" AND user_id=".$id_user;
    $sql.=" order by user_id desc";
    $listbill=pdo_query($sql);
    return $listbill;
}

function get_ttdh($n){
    switch($n){
        case 1:
          $tt= "Đã xác nhận";
          break;
          case 2:
        $tt= "Đang giao hàng";
        break;
        case 3:
          $tt= "Giao hàng thành công";
          break;
        case 4:
          $tt= "Giao hàng thất bại";
          break;
        case 5:
           $tt= "Huỷ";
          break;
        case 0:
          $tt= "Chờ xác nhận";
          break;
    }
    return $tt;
};

function get_pttt($n){
  switch($n){
      case 1:
          $get_pttt= "Thanh toán khi nhận hàng";
          break;
      case 2:
          $get_pttt= "Thanh toán online";
          break;
  }
  return $get_pttt;
};
function loadall_cart_coubt($id){
    $sql="select * from cart where bill_id=".$id;
    $donhang=pdo_query($sql);
    return sizeof($donhang);
}
function update_bill($id,$ttdh){
    $sql="UPDATE `bill` SET `bill_status` = '".$ttdh."' WHERE `bill`.`id` =".$id;
    
    pdo_execute($sql);
}
function delete_bill($bill_id) {

    $sql = "UPDATE bill SET trangthai = 5 WHERE bill_id =" .$bill_id;
    pdo_execute($sql);
}

function loadall_thongke(){
    $sql="select danhmuc.id as madm, danhmuc.name as tendm, count(sanpham.id) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice from sanpham left join danhmuc on danhmuc.id=sanpham.iddm group by danhmuc.id";
    $listthongke=pdo_query($sql);
    return $listthongke;
}
?>