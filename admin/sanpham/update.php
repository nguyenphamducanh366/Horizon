<?php
if(is_array($sanpham)){
  extract($sanpham);
}
$hinhpath="../img/".$anhsp;

if(is_file($hinhpath)){
  $hinh="<img src='".$hinhpath."' height='100' width='100'>";
}else{
  $hinh="no photo";
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
        <div class="title">CẬP NHẬT LOẠI HÀNG HÓA</div>
        <div class="container">
            <form class="input-form" action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
                <div class="input-data-text">

                    <div class="input">
                        Tên sản phẩm <br />
                        <input class="input-data" type="text" name="tensp" value="<?=$tensp?>" />
                    </div>
                    <div class="input">
                    Giá nhập<br />
                        <input class="input-data" type="text" name="gia_nhap" value="<?=$gia_nhap?>" />
                    </div>
                    <div class="input">
                    Giá gốc<br />
                        <input class="input-data" type="text" name="gia_chua_giam" value="<?=$gia_chua_giam?>" />
                    </div>
                    <div class="input">
                        Giá bán<br />
                        <input class="input-data" type="text" name="giasp" value="<?=$giasp?>" />
                    </div>
                    <div class="input">
                        Số Lượng<br />
                        <input class="input-data" type="number" name="soluong" value="<?=$soluong?>" />
                    </div>
                    <div class="input">
                        <input type="hidden" name="id_sp" value="<?=$id_sp?>" />
                    </div>
                </div>
                <div class="input-data-file">
                    <div class="input">
                        Danh mục <br />
                        <select class="input-data select-data" name="id_dm" id="">
                            <option value="1" <?php if($id_dm == 1) echo 'selected'; ?>>nam</option>
                            <option value="2" <?php if($id_dm == 2) echo 'selected'; ?>>nữ</option>
                            <option value="3" <?php if($id_dm == 3) echo 'selected'; ?>>Rolex</option>
                            <option value="4" <?php if($id_dm == 4) echo 'selected'; ?>>Omega</option>
                            <option value="5" <?php if($id_dm == 5) echo 'selected'; ?>>Tag Heuer</option>
                        </select>
                    </div>
                    <div class="input">
                        Mô tả<br />
                        <textarea class="input-data" name="mota" cols="30" rows="5"><?=$mota?></textarea>
                    </div>
                    <div class="input">
                        Hình<br />
                        <input class="input-data" type="file" name="hinh" />
                        <?=$hinh?>
                    </div>
                    <div class="input">
                        Ngày<br />
                        <input class="input-data" type="date" name="date" value="<?=$date?>" />
                    </div>
                </div>
                <div class="input-button">
                    <input type="submit" class="button" name="capnhat" value="Cập nhật" />
                    <input type="reset" class="button" name="nhaplai" value="Nhập lại" />
                    <a href="index.php?act=listsp">
                        <input type="button" class="button" name="btn_list" value="Danh sách" />
                    </a>
                </div>
                <?php
        if(isset($thongbao) && ($thongbao != "")) echo $thongbao;
        ?>
            </form>
        </div>
    </div>
</body>

</html>
