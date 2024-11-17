<?php

function insert_binhluan($noidung,$id_user,$user,$fullname,$hinh,$idpro,$ngaybinhluan,$role)
{
    $sql = "INSERT INTO binhluan(noidung,id_user,user,fullname,hinh,idpro,ngaybinhluan,role) VALUES ('$noidung','$id_user','$user','$fullname','$hinh','$idpro','$ngaybinhluan','$role')";
    pdo_execute($sql);
}


    
function loadall_binhluan($idpro){
    $sql = "SELECT * FROM binhluan where 1";
     if($idpro > 0){
        $sql .=" AND idpro = '".$idpro."'";
     }
     $sql.= " order by id desc";
    
    $list_bl =pdo_query($sql);
    return $list_bl;
}


function delete_binhluan($id){
    $sql = "DELETE FROM binhluan WHERE id =".$id;
    pdo_execute($sql);
}
?>