<?php
function insert_danhmuc($tendm){
    $sql="insert into danhmuc(tendm) values('$tendm')";
    pdo_execute($sql);
}
function delete_danhmuc($id_dm){
    $sql="delete from danhmuc where id_dm=".$id_dm;
    pdo_execute($sql);
}
function loadall_danhmuc(){
    $sql="select * from danhmuc order by id_dm desc";
    $listdanhmuc=pdo_query($sql);
    return $listdanhmuc;
}
function loadone_danhmuc($id_dm){
    $sql="select * from danhmuc where id_dm=".$id_dm;
    $dm=pdo_query_one($sql);
    return $dm;
}
function update_danhmuc($id_dm,$tendm){
    $sql="update danhmuc set tendm='".$tendm."' where id_dm=".$id_dm;
    pdo_execute($sql);
}

?>