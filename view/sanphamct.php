<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Kodchasan:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700&display=swap');
    </style>
</head>

<body>
    <main>
        <div class="container">
            <?php
        if (isset($_GET['id_sp'])) {
            $product_id = $_GET['id_sp'];
            $product = loadone_sanpham($product_id);

            if ($product) {
                echo '<div class="detail-container">';
                    echo '<center><h1 class="title-ct">Chi Tiết Sản Phẩm</h1></center>';
                    echo '<div class="detail-box">';
                        echo '<div class="img-box">';
                        echo '<img src="img/' . $product['anhsp'] . '" alt="" class="detail-img">';
                        echo '</div>';
                        echo '<div class="text-box">';
                        echo '<center><h1 class="cttensp">' . $product['tensp'] . '</h1></center>';
                        echo '<div class="desc-box">';
                        echo '<p class="ctdesc">' . $product['mota'] . '</p>';
                        echo '</div>';
                        echo '<div class="price-box">';
                        echo '<h2 class="ctgiasp">' . $product['giasp'] . ' VNĐ</h2>';
                        echo '</div>';
                        echo '<form action="index.php?act=addtocart" method="POST">';
                        echo '<input type="hidden" name="id_sp" value="' . $product['id_sp'] . '">';
                        echo '<input type="hidden" name="tensp" value="' . $product['tensp'] . '">';
                        echo '<input type="hidden" name="giasp" value="' . $product['giasp'] . '">';
                        echo '<input type="hidden" name="anhsp" value="' . $product['anhsp'] . '">';
                        echo '<input type="submit" name="addtocart" class="button" value="Thêm Vào Giỏ Hàng">';
                        echo '</form>';
                    echo '</div>';
                    echo '</div>';
                echo '</div>';
            } 
        } 
        ?>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
        $(document).ready(function() {

            $("#binhluan").load("view/binhluan/binhluan.php", {
                idpro: <?= $id_sp ?>
            });
        });
        </script>
        <script>
    function formatNumberWithDots(number) {
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

    document.querySelectorAll('.ctgiasp').forEach(element => {
        let priceText = element.textContent.trim();
        let number = parseInt(priceText.replace('VNĐ', '').replace(/\./g, '').trim(), 10);
        if (!isNaN(number)) {
            element.textContent = formatNumberWithDots(number) + ' VNĐ';
        }
    });
</script>
        <div class="" id="binhluan">

        </div>
    </main>
</body>

</html>