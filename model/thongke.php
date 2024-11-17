<?php

function thong_ke_don_hang() {
    $conn = pdo_get_connection();

    $sql = "SELECT 
              SUM(CASE WHEN trangthai = '1' THEN 1 ELSE 0 END) AS da_xac_nhan,
              SUM(CASE WHEN trangthai = '2' THEN 1 ELSE 0 END) AS dang_giao_hang,
              SUM(CASE WHEN trangthai = '3' THEN 1 ELSE 0 END) AS giao_hang_thanh_cong,
              SUM(CASE WHEN trangthai = '4' THEN 1 ELSE 0 END) AS giao_hang_that_bai,
              SUM(CASE WHEN trangthai = '5' THEN 1 ELSE 0 END) AS huy,
              SUM(CASE WHEN trangthai = '0' THEN 1 ELSE 0 END) AS cho_xac_nhan
            FROM bill";

    $result = $conn->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);

    return $row;
}


function get_top5_ban_chay() {
    $sql = "
        SELECT 
        sp.giasp,
            sp.tensp,
            sp.anhsp,
            SUM(c.soluong) AS total_sold
        FROM 
            cart c
        JOIN 
            sanpham sp ON c.id_sp = sp.id_sp
        JOIN 
            bill b ON c.bill_id = b.bill_id
        WHERE 
            b.trangthai = 3
        GROUP BY 
            c.id_sp, sp.tensp, sp.anhsp, sp.giasp
        ORDER BY 
            total_sold DESC
        LIMIT 5;
    ";

    return pdo_query($sql);
}


?>