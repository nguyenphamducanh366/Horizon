<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Đơn Hàng</title>
</head>
<body><center>
    <div class="mybill-box">
        <h1>Chi Tiết Đơn Hàng</h1>
        <table>
            <tr>
                <th>Ảnh Sản phẩm</th>
                <th>Tên Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
            <?php
            if (isset($billct) && is_array($billct)) {
                foreach ($billct as $cartItem) {
                    $hinh = "./img/" . $cartItem['anhsp'];
                    echo '
                    <tr>
                        <td><img src="' . $hinh . '" alt="' . $cartItem['tensp'] . '"></center></td>
                        <td><center>' .$cartItem['tensp'] . '</center></td>
                        <td  id="giasp" ><center>' .$cartItem['giasp'] . ' VNĐ</center></td>
                        <td><center>' .$cartItem['soluong'] . '</center></td>
                        <td id="giasp" ><center>' .$cartItem['thanhtien'] . ' VNĐ</center></td>
                    </tr>';
                }
            } 
            ?>
        </table>
        <div >
            <a href="index.php?act=mybill" class="button">Trở về danh sách đơn hàng</a>
        </div>
    </div>
    </center>
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
