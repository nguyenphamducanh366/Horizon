<?php
if (is_array($donhang_one)) {
    extract($donhang_one);
    $bill_items = load_all_cart_items($bill_id);
}
?>

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
    <div class="main-content">
        <div class="title">SỬA BILL</div>
        <div class="container">
            <form action="index.php?act=updatebill" method="POST">
                <table>
                    <tr>
                        <th>MÃ ĐƠN HÀNG</th>
                        <th>TRẠNG THÁI</th>
                    </tr>
                    <tr>
                        <td>HORIZON-<?= $bill_id ?></td>
                        <td>
                            <div class="input">
                                <center><select class="input-data" name="ttdh">
                                        <?php
                                        if ($trangthai == 0) {
                                            echo '
                                            <option value="0">Chờ xác nhận</option>
                                            <option value="1">Đã xác nhận</option>
                                            <option value="5">Huỷ</option>
                                            ';
                                        } else if ($trangthai == 1) {
                                            echo '
                                            <option value="1">Đã xác nhận</option>
                                            <option value="2">Đang giao hàng</option>
                                            ';
                                        } else if ($trangthai == 2) {
                                            echo '
                                             <option value="2">Đang giao hàng</option>
                                            <option value="3">Giao hàng thành công</option>
                                            <option value="4">Giao hàng thất bại</option>
                                            ';
                                        } else if ($trangthai == 3) {
                                            echo '
                                            <option value="3">Giao hàng thành công</option>
                                           
                                            ';
                                        } else if ($trangthai == 4) {
                                            echo '
                                            <option value="3">Giao hàng thất bại</option>
                                            
                                            ';
                                        }

                                        ?></center>
                            </div>
                        </td>
                    </tr>
                    <table>
                        <th>
                            <center>
                                <h4>Thông tin User: </h4>
                            </center>
                        </th>
                        <tr>
                            <td>Người đặt hàng:</td>
                            <td><input class="input-data" type="text" name="bill_name" value="<?= $bill_name ?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ:</td>
                            <td><input class="input-data" type="text" name="diachi" value="<?= $diachi ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>Số điện thoại:</td>
                            <td><input class="input-data" type="text" name="tel" value="<?= $tel ?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Email liên hệ:</td>
                            <td><input class="input-data" type="text" name="email" value="<?= $email ?>" disabled></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                        </tr>
                        <?php
                        foreach ($bill_items as $item) {
                            echo ' 
                            <tr>
                                <td><center>' . $item['tensp'] . '</center></td>
                                <td><img src="../img/' . $item['anhsp'] . '" height="100" width="100" ></center></td>
                              
                                <td><center>' . $item['soluong'] . '</center></td>
                                  <td id="giasp"><center>' . $item['giasp'] . '</center></td>
                            </tr>';
                        }
                        ?>
                    </table>
                    <tr>
                        <td colspan="2">
                            <div class="input-button">
                                <input type="hidden" name="bill_id" value="<?= $bill_id ?>">
                                <input type="submit" class="button" name="capnhat" value="Cập nhật">
                                <input type="reset" class="button" value="Nhập lại">
                                <a href="index.php?act=listdonhang"><input type="button" class="button" value="Danh sách"></a>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>