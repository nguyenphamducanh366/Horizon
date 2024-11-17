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
    <div class="title">DANH SÁCH LOẠI HÀNG HÓA</div>
    <div class="container">
      <table border="0" class="table">
        <tr>
          <th></th>
          <th>MÃ LOẠI</th>
          <th>TÊN LOẠI</th>
          <th></th>
        </tr>
        <?php
        foreach($listdanhmuc as $danhmuc) {
          extract($danhmuc);
          $suadm = "index.php?act=suadm&id_dm=" . $id_dm;
          $xoadm = "index.php?act=xoadm&id_dm=" . $id_dm;
          echo '<tr class="table-data">
                  <td><input type="checkbox" name="chk_' . $id_dm . '" /></td>
                  <td><center>' . $id_dm . '</center></td>
                  <td><center>' . $tendm . '</center></td>
                  <td>
                    <center>
                      <a href="' . $suadm . '"><input class="button" type="button" value="Sửa" /></a>
                      <a onclick="return confirm(\'Bạn có chắc muốn xóa?\')" href="' . $xoadm . '"><input class="button" type="button" value="Xóa" /></a>
                    </center>
                  </td>
                </tr>';
        }
        ?>
      </table>
      <div class="input-button">
        <input type="button" class="button" name="btn_all" value="Chọn tất cả" />
        <input type="button" class="button" name="btn_remove_all" value="Bỏ chọn tất cả" />
        <input type="button" class="button" name="btn_delete_all" value="Xóa các mục đã chọn" />
        <a href="index.php?act=adddm"><input type="button" class="button" name="nhapthem" value="Nhập thêm" /></a>
      </div>
    </div>
  </div>
</body>
</html>
