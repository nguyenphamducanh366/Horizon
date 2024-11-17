<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="mybill-container">
        <center>
            <table class="bill-table">
                <h1 class="title">Đơn Hàng Của Bạn</h1>
                <tr>
                    <th>MÃ ĐƠN</th>
                    <th>NGÀY ĐẶT</th>
                    <th>SỐ LƯỢNG</th>
                    <th>TỔNG GIÁ TRỊ</th>
                    <th>TÌNH TRẠNG ĐƠN</th>
                </tr>
                <?php
                if (is_array($listbill)) {
                    foreach ($listbill as $bill) {
                        extract($bill);
                        $ttdh = get_ttdh($bill['trangthai']);
                        $countsp = loadall_cart_coubt($bill['bill_id']);
                        if ($ttdh != "Chờ xác nhận") {
                            echo '
                                <tr>
                                    <td><center>HORIZON-' . $bill['bill_id'] . '</center></td>
                                    <td><center>' . $bill['ngaydathang'] . '</center></td>
                                    <td><center>' . $countsp . '</center></td>
                                    <td id="giasp"><center>' . $bill['tonggia'] . '</center></td>
                                    <td><center>' . $ttdh . '</center></td>
                                    <td><a href="index.php?act=xemchitiet&bill_id=' . $bill['bill_id'] . '"><div class="button">Xem Chi Tiết</div></a></td>
                                </tr>';
                        } else if ($ttdh = "Chờ xác nhận") {
                            echo '
                            <tr>
                                <td><center>HORIZON-' . $bill['bill_id'] . '</center></td>
                                <td><center>' . $bill['ngaydathang'] . '</center></td>
                                <td><center>' . $countsp . '</center></td>
                                <td id="giasp"><center>' . $bill['tonggia'] . '</center></td>
                                <td><center>' . $ttdh . '</center></td>
                                <td><a href="index.php?act=xemchitiet&bill_id=' . $bill['bill_id'] . '"><div class="button">Xem Chi Tiết</div></a></td>
                                <td><a href="index.php?act=huydonhang&bill_id=' . $bill['bill_id'] . '"><div class="button">Huỷ Đơn</div></a></td>
                            </tr>';
                        }
                    }
                }
                ?>
            </table>
        </center>
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