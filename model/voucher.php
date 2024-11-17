<?php
  function insert_voucher($ten_voucher){
    $sql = "INSERT INTO voucher (name) VALUES ('$ten_voucher')";
    pdo_execute($sql);
  }
  function delete_voucher($id){
    $sql="delete from voucher where id =".$id;
    pdo_execute($sql);
  }
  function loadAll_voucher(){
    $sql = "SELECT * FROM voucher ";
    $listvoucher = pdo_query($sql);
    return $listvoucher;
  }
  function loadOne_voucher($id){
    $sql="select * from voucher where id =".$id;
    $voucher=pdo_query_one($sql);
    return $voucher;
  }
  function update_voucher($id,$ten_voucher){
    $sql = "UPDATE voucher SET name='".$ten_voucher."' WHERE id=".$id;
    pdo_execute($sql);
  }
?>