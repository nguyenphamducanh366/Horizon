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
    <div class="title">CẬP NHẬT LOẠI HÀNG HÓA</div>
    <div class="container">
      <?php
      if(is_array($dm)) {
        extract($dm);
      }
      ?>
      <form class="input-form" action="index.php?act=updatedm" method="post">
        <div class="input-data-text">
          <div class="input">
            Mã loại <br />
            <input class="input-data" type="text" name="id_dm" value="<?php if(isset($id_dm)) echo $id_dm; ?>" disabled />
          </div>
          <div class="input">
            Tên loại <br />
            <input class="input-data" type="text" name="tendm" value="<?php if(isset($tendm)) echo $tendm; ?>" />
          </div>
        </div>
        <div class="input-button">
          <input type="hidden" name="id_dm" value="<?php if(isset($id_dm)) echo $id_dm; ?>" />
          <input type="submit" class="button" name="capnhat" value="CẬP NHẬT" />
          <input type="reset" class="button" name="nhaplai" value="NHẬP LẠI" />
          <a href="index.php?act=listdm"><input type="button" class="button" name="btn_list" value="DANH SÁCH" /></a>
        </div>
      </form>
      <?php
      if(isset($thongbao) && ($thongbao != "")) echo $thongbao;
      ?>
    </div>
  </div>
</body>
</html>
