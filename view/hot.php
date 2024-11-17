<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Kodchasan:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700&display=swap');
      </style>
</head>
<body>
<main>
    <?php
    $sp_hot = loadall_sanpham_view();  
    $count=0;
    echo '<center><h1 class="title hidden">Các dòng sản phẩm được quan tâm nhiều nhất </h1></center><tr></tr><div class="row ">';
    foreach ($sp_hot as $sp) {
        echo '<div class="product-box hidden">';
        echo '<a href="index.php?act=xemChiTiet&id_sp=' . $sp['id_sp'] . '">';
        echo '<img src="img/' . $sp['anhsp'] . '" alt="" class="product-img">';
        echo '</a>';
        echo '<h3 class="tensp">' . $sp['tensp'] . '</h3>';
        echo '<p class="giasp">' . $sp['giasp'].'VNĐ' . '</p>';
        echo '<p class="desc">' . $sp['mota'] . '</p>';
        echo '<form action="index.php?act=addtocart" method="POST">';
        echo '<input type="hidden" name="id_sp" value="' . $sp['id_sp'] . '">';
        echo '<input type="hidden" name="tensp" value="' . $sp['tensp'] . '">';
        echo '<input type="hidden"  id="giasp" name="giasp" value="' . $sp['giasp'] . '">';
        echo '<input type="hidden" name="anhsp" value="' . $sp['anhsp'] . '">';
        echo '<input type="submit" name="addtocart" class="button" value="Thêm Vào Giỏ Hàng">';
        echo '</form>';
        echo '</div>';
        $count++;
        if ($count % 4 == 0) {
            echo '</div><div class="row ">';
        }
    }
    echo '</div>';
    ?>
</main>
</body>
</html>