<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Kodchasan:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700&display=swap');
    </style>
    <link rel="stylesheet" href="thongke.css">

</head>

<body>
    <?php

    ?>
    <div class="main-content">
        <div class="title">
            <h1>Thống kê</h1>

        </div>
        <div class="container">

            <div class="div">
                <h2>1.Thống kê đơn hàng</h2>

            </div>
            <br>
            <div class="container-thong-ke">
                <div class="box default-box">Chờ xác nhận: <?php echo $don_hang_thong_ke['cho_xac_nhan']; ?></div>
                <div class="box default-box">Đã xác nhận: <?php echo $don_hang_thong_ke['da_xac_nhan']; ?></div>
                <div class="box default-box">Đang giao hàng: <?php echo $don_hang_thong_ke['dang_giao_hang']; ?></div>
                <div class="box giao-hang-thanh-cong">Giao hàng thành công:
                    <?php echo $don_hang_thong_ke['giao_hang_thanh_cong']; ?></div>
                <div class="box giao-hang-that-bai">Giao hàng thất bại:
                    <?php echo $don_hang_thong_ke['giao_hang_that_bai']; ?></div>
                <div class="box default-box">Huỷ: <?php echo $don_hang_thong_ke['huy']; ?></div>
            </div>
            <br>
            <br>
            <br>
            <h2>2. Thống kê top 5 sản phẩm bán chạy</h2>
            <div class="top-selling-container">

                <div class="top-selling-products">
                    <?php
                    foreach ($top_selling_products as $product) {
                        $hinh = "../img/" . $product['anhsp'];
                        echo "<div class='product-item'>";
                        echo "<img style='height:150px' src='" . $hinh . "' alt='" . $product['tensp'] . "'>";
                        echo "<div class='product-info'>";
                        echo "<span class='product-name'>Sản phẩm: " . $product['tensp'] . "</span>";
                        echo "<span class='product-sold'>Đã bán: " . $product['total_sold'] . "</span>";
                        echo "<span class='product-gia'>Giá bán: <div id='giasp'>" . $product['giasp'] . "</div></span>";
                        echo "</div>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>

        </div>




    </div>
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
</body>

</html>
