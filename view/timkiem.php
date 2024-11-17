<?php
if (isset($_GET['btn-search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];

    $sql = "SELECT * FROM sanpham WHERE tensp LIKE :search";
    $stmt = pdo_get_connection()->prepare($sql);
    $stmt->execute(['search' => '%' . $search . '%']);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $results = [];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Kodchasan:ital,wght@0,200;0,300;0,500;0,600;0,700&display=swap');
    </style>
</head>
<body>
    <div class="search-container">
    <h1>Kết quả tìm kiếm cho: <?php echo $search; ?></h1><br>

            <?php
            $count = 0;
            if (count($results) > 0) {
                echo '<div class="row ">';
                foreach ($results as $row) {
                    $hinh = 'img/' . $row['anhsp']; 
                    echo '<div class="product-box">';
                    echo '    <a href="index.php?act=xemChiTiet&id_sp=' . $row['id_sp'] . '"><img class="product-img" src="' . $hinh . '" alt=""></a>';
                    echo '    <a href=""><h3 class="tensp">' . $row['tensp'] . '</h3></a>';
                    echo '    <strong class="giasp">' . $row['giasp'] . ' VNĐ</strong>';
                    echo '    <div class="btnadd">';
                    echo '      <form action="index.php?act=addtocart" method="post">';
                    echo '        <input type="hidden" name="id_sp" value="' . $row['id_sp'] . '">';
                    echo '        <input type="hidden" name="tensp" value="' . $row['tensp'] . '">';
                    echo '        <input type="hidden" name="anhsp" value="' . $hinh . '">';
                    echo '        <input type="hidden" name="giasp" value="' . $row['giasp'] . '">';
                    echo '        <input type="submit" name="addtocart" class="button" value="THÊM VÀO GIỎ HÀNG">';
                    echo '      </form>';
                    echo '    </div>';
                    echo '</div>';
                    $count++;
                    if ($count % 4 == 0) {
                        echo '</div><div class="row ">';
                    }
                }
            } else {
                echo '<p>Không có sản phẩm.</p>';
            }
            ?>
        </div>


</body>
</html>
