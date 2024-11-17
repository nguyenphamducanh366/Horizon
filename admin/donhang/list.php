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
        <div class="title">
            <h1>Danh sách đơn hàng</h1>
            <form action="index.php?act=listdonhang" method="post">
                <input class="button" type="text" name="kyw" placeholder="Nhập mã đơn" id="">
                <input class="button" type="submit" name="listok" value="Tìm kiếm">
            </form>
        </div>
        <div class="container">
            <table class="table">
                <tr>

                    <th>MÃ ĐƠN HÀNG</th>
                    <th>HỌ TÊN KHÁCH HÀNG</th>
                    <th>USER</th>
                    <th>EMAIL</th>
                    <th>TEL</th>
                    <th>ĐỊA CHỈ</th>
                    <th>TRẠNG THÁI</th>
                    <th>PHƯƠN THỨC THANH TOÁN</th>

                    <th>THÀNH TIỀN</th>
                    <th>NGÀY ĐẶT HÀNG</th>
                </tr>
                <?php foreach($listdonhang as $list): ?>
                <?php
                extract($list);
                $taikhoan = get_user($user);
                $suabill = "index.php?act=suadonhang&id=" . $bill_id;
                // $anhsppath = "../img/" . $anhsp;
                // if (is_file($anhsppath)) {
                //     $anhsp = "<img src='" . $anhsppath . "' height='100' width='100'>";
                // } else {
                //     $anhsp = "no photo";
                // }
            ?>
                <tr>

                    <td>
                        <center>HORIZON-<?= $bill_id ?></center>
                    </td>
                    <td>
                        <center><?= $bill_name ?></center>
                    </td>
                    <td>
                        <center><?=  $taikhoan ?></center>
                    </td>
                    <td>
                        <center><?= $email ?></center>
                    </td>
                    <td>
                        <center><?= $tel?></center>
                    </td>
                    <td>
                        <center><?= $diachi ?></center>
                    </td>
                    <td>
                        <center><?= get_ttdh($trangthai) ?></center>
                    </td>
                    <td>
                        <center><?= get_pttt($pttt) ?></center>
                    </td>

                    <td id='giasp'>
                        <center><?= $tonggia?></center>
                    </td>
                    <td>
                        <center><?= $ngaydathang ?></center>
                    </td>
                    <td><a href="<?= $suabill ?>"><input class="button" type="button" class="button" value="Sửa"></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>

</html>