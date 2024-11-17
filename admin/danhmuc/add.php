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
    <div class="title">THÊM MỚI LOẠI HÀNG</div>
    <div class="container">
      <form class="input-form" action="index.php?act=adddm" method="post">
        <div class="input">
          Mã loại <br />
          <input class="input-data" type="text" name="id_dm" disabled />
        </div>
        <div class="input">
          Tên loại <br />
          <input class="input-data" type="text" name="tendm" />
        </div>
        <div class="input-button">
          <input type="submit" class="button" name="themmoi" value="THÊM MỚI" />
          <input type="reset" class="button" name="nhaplai" value="NHẬP LẠI" />
          <a href="index.php?act=listdm"><input type="button" class="button" name="btn_list" value="DANH SÁCH" /></a>
        </div>
        <?php
        if(isset($thongbao) && ($thongbao != "")) echo $thongbao;
        ?>
      </form>
    </div>
  </div>
</body>
</html>
