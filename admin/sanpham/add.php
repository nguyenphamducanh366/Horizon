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
    <div class="title">THÊM MỚI SẢN PHẨM</div>
    <div class="container">
      <form class="input-form" action="index.php?act=addsp" method="post" enctype="multipart/form-data">
        <div class="input-data-text">
          <div class="input">
            Tên sản phẩm <br />
            <input class="input-data" type="text" name="tensp" id="" />
          </div>
          <div class="input">
          Giá nhập<br />
            <input class="input-data" type="text" name="gia_nhap" id="" />
          </div>
          <div class="input">
          Giá gốc<br />
            <input class="input-data" type="text" name="gia_chua_giam" id="" />
          </div>
          <div class="input">
            Giá Bán<br />
            <input class="input-data" type="text" name="giasp" id="" />
          </div>
          <div class="input">
            Số Lượng<br />
            <input class="input-data" type="number" name="soluong" id="" />
          </div>

          
        </div>
        <div class="input-data-file">
          <div class="input">
            Danh mục <br />
            <select class="input-data select-data" name="id_dm" id="">
             <option value="1" name="id_dm">nam</option>
             <option value="2" name="id_dm">nữ</option>
             <option value="3" name="id_dm">Rolex</option>
             <option value="4" name="id_dm">Omega</option>
             <option value="5" name="id_dm">Tag Heuer</option>
            </select>
          </div>
          <div class="input">
            Mô tả<br />
            <textarea class="input-data" name="mota" id="" cols="30" rows="5"></textarea>
          </div>   
          <div class="input">
            Hình<br />
            <input class="input-data" type="file" name="anhsp" id="" />
          </div> 
          <div class="input">
            Ngày<br />
            <input class="input-data" type="date" name="date" id="" />
          </div>
               
        </div>
        <div class="input-button">
          <input type="submit" class="button" name="themmoi" value="THÊM MỚI" />
          <input type="reset" class="button" value="NHẬP LẠI" name="nhaplai" />
          <a href="index.php?act=listsp">
            <input type="button" class="button" name="btn_list" value="DANH SÁCH" />
          </a>
        </div>
        <?php
        if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
        ?>
      </form>
    </div>
  </div>
</body>

</html>