<?php
function insert_sanpham($tensp,$gia_nhap,$gia_chua_giam,$giasp,$anhsp,$soluong,$mota,$id_dm,$date)
{
    $sql = "INSERT INTO sanpham (tensp, gia_nhap, gia_chua_giam, giasp, anhsp, soluong, mota, id_dm, date) VALUES ('$tensp', '$gia_nhap', '$gia_chua_giam', '$giasp','$anhsp', '$soluong', '$mota', '$id_dm', '$date')";
    pdo_execute($sql);
}
function delete_sanpham($id_sp)
{
    $sql = "delete from sanpham where id_sp=" . $id_sp;
    pdo_execute($sql);
}
function loadall_sanpham_top10()
{
    $sql = "select * from sanpham where 1 order by luotxem desc limit 0,9";
    $listsp = pdo_query($sql);
    return $listsp;
}
function loadall_sanpham_home()
{
    $sql = "select * from sanpham where 1 order by id_sp desc limit 0,9";
    $listsp = pdo_query($sql);
    return $listsp;
}



function loadall_sanpham($kyw = "", $id_dm = 0)
{
    $sql = "select * from sanpham where 1";
    if ($kyw != "") {
        $sql .= " and tensp like '%" . $kyw . "%'";
    }
    if ($id_dm > 0) {
        $sql .= " and id_dm ='" . $id_dm . "'";
    }
    $sql .= " order by id_sp asc";
    $listsp = pdo_query($sql);
    return $listsp;
}

function loadone_sanpham($id_sp)
{
    $sql = "select * from sanpham where id_sp=" . $id_sp;
    $sp = pdo_query_one($sql);
    return $sp;
}
function load_sanpham_cungloai($id_sp, $id_dm)
{
    $sql = "select * from sanpham where id_dm=" . $id_dm . " AND id_sp <>" . $id_sp;
    $listsp = pdo_query($sql);
    return $listsp;
}
function update_sanpham($id_sp, $tensp, $anhsp, $gia_nhap, $gia_chua_giam, $giasp, $soluong, $mota, $id_dm, $date)
{
    if ($anhsp !== "") {
        $sql = "update sanpham set tensp='$tensp', anhsp='$anhsp',gia_nhap='$gia_nhap',gia_chua_giam='$gia_chua_giam', giasp='$giasp',soluong='$soluong', mota='$mota', id_dm='$id_dm', date='$date' where id_sp=$id_sp";
    } else {
        $sql = "update sanpham set tensp='$tensp', anhsp='$anhsp',gia_nhap='$gia_nhap',gia_chua_giam='$gia_chua_giam', giasp='$giasp',soluong='$soluong', mota='$mota', id_dm='$id_dm',date='$date' where id_sp=$id_sp";
    }
    pdo_execute($sql);
}
///bộ lọc
function loadall_sanpham_new()
{
    $sql = "SELECT * FROM sanpham ORDER BY date DESC LIMIT 4";
    $listsp = pdo_query($sql);
    return $listsp;
}

function loadall_sanpham_view()
{
    $sql = "SELECT * FROM sanpham ORDER BY luotxem DESC LIMIT 4";
    $listsp = pdo_query($sql);
    return $listsp;
}
function loadall_sanpham_id_nam()
{
    $sql = "SELECT * FROM sanpham where id_dm= 1";
    $listsp = pdo_query($sql);
    return $listsp;
}
function loadall_sanpham_id_nu()
{
    $sql = "SELECT * FROM sanpham where id_dm= 2";
    $listsp = pdo_query($sql);
    return $listsp;
}
function loadall_sanpham_id_Rolex()
{
    $sql = "SELECT * FROM sanpham where id_dm= 3";
    $listsp = pdo_query($sql);
    return $listsp;
}
function loadall_sanpham_id_Omega()
{
    $sql = "SELECT * FROM sanpham where id_dm= 4";
    $listsp = pdo_query($sql);
    return $listsp;
}
function loadall_sanpham_id_Tag_Heuer()
{
    $sql = "SELECT * FROM sanpham where id_dm= 5";
    $listsp = pdo_query($sql);
    return $listsp;
}
function update_view_count($id_sp)
{
    $sql = "UPDATE sanpham SET luotxem = luotxem + 1 WHERE id_sp = :id_sp";
    pdo_execute($sql, [':id_sp' => $id_sp]);
}
