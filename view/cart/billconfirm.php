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
    <div class="billct-container">
        <center>
            <h1 class="thank-message">Cám ơn quý khách đã mua hàng</h1>
        </center>
        <div class="info-ct">
            <div class="info-container">
                <?php
                if (isset($bill)) {
                    extract($bill);
                }
                $pttt=get_pttt($bill['pttt']);
                ?>
                <div class="info-bill-box">
                    <h2 class="title">Thông tin đơn hàng:</h2>
                    <h3 class="info-bill">Mã Đơn: <?= $bill['bill_id']; ?></h3>
                    <h3 class="info-bill">Ngày đặt hàng: <?= $bill['ngaydathang']; ?></h3>
                    <h3 id="giasp" class="info-bill">Tổng Đơn Hàng: <b id="giasp"><?= $bill['tonggia']; ?></b></h3>
                    <h3 class="info-bill">Phương thức thanh toán: <?=$pttt; ?></h3>
                </div>
                <div class="info-user-box">
                    <h2 class="title">Thông tin user</h2>
                    <h3 class="info-user">Người đặt hàng: <?= $bill['bill_name']; ?></h3>
                    <h3 class="info-user">Địa chỉ: <?= $bill['diachi']; ?></h3>
                    <h3 class="info-user">Số điện thoại: <?= $bill['tel']; ?></h3>
                    <h3 class="info-user">Email liên hệ: <?= $bill['email']; ?></h3>
                </div>
            </div>
            <div class="bill-ct">
                <center>
                    <h3>Chi Tiết Đơn</h3>
                    <table>
                        <?php 
                            bill_chi_tiet($billct);
                        ?>
                    </table>
                </center>
            </div>
        </div>
        <center><a href="index.php" class="button confirm-button">Về trang chủ</a></center>
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