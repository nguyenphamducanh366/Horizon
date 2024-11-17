<?php
  function loadAll_donhang(){
    $sql = "SELECT * FROM bill ORDER BY trangthai ASC";
    $listdonhang = pdo_query($sql);
    return $listdonhang;
  }
  function loadOne_donhang($id){
    $sql="select * from bill where bill_id =".$id;
    $dm=pdo_query_one($sql);
    return $dm;
  }
  function update_donhang($bill_id,$trangthai){
    $sql = "UPDATE bill SET trangthai='".$trangthai."' WHERE bill_id=".$bill_id;
    pdo_execute($sql);
  }
  function load_all_cart_items($bill_id){  
    $sql=" SELECT tensp,anhsp,soluong,giasp FROM cart WHERE bill_id=".$bill_id;
    $bill_items=pdo_query($sql);  
    return $bill_items;  
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
      // case 3:
      //     $get_pttt= "Thanh toán online";
      //     break;
  }
  return $get_pttt;
};
?>