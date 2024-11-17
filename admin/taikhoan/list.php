<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Accounts</title>
    <link rel="stylesheet" href="style.css"> <!-- Link your CSS file here -->
    <style>
    img {
        border-radius: 50px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: opacity 0.5s ease;
    }

    img:hover {
        /* cursor: pointer; */
        opacity: 0.5;
    }

    .button {
        margin: 5px;
        padding: 5px 10px;
        background-color: #293540;
        color: white;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .button:hover {
        background-color: #ddd;
    }
    </style>
    <script>
    function confirmDelete(url) {
        if (confirm("Bạn có chắc chắn muốn xóa tài khoản này không?")) {
            window.location.href = url;
        }
    }
    </script>
</head>

<body>
    <div class="main-content">
        <div class="title">
            <center>
                <h2>DANH SÁCH TÀI KHOẢN</h2>
            </center>
        </div>
        <div class="container">
            <table>
                <tr>
                    <th>MÃ TÀI KHOẢN</th>
                    <th>TÊN ĐĂNG NHẬP</th>
                    <th>HỌ VÀ TÊN</th>
                    <th>MẬT KHẨU</th>
                    <th>EMAIL</th>
                    <th>ĐỊA CHỈ</th>
                    <th>SỐ ĐIỆN THOẠI</th>
                    <th>VAI TRÒ</th>
                    <th>ẢNH</th>
                    <th>HÀNH ĐỘNG</th>
                    <th></th>
                </tr>

                <?php   
                foreach ($listtaikhoan as $tk) {  
                    extract($tk);  
                    $themmoitk = "index.php?act=addtk";
                    $suatk = "index.php?act=suatk&id=" . $id;  
                    $xoatk = "index.php?act=xoatk&id=" . $id;  
                    $hinhpath = "../img/" . $hinh;  
                    $hinh = (is_file($hinhpath)) ? "<img src='" . $hinhpath . "' height='80' width='80'>" : "<img src='../img/default.jpg' height='80' width='80'>";  
                    echo '<tr>  
                        <td><center>' . $id . '</center></td>  
                        <td><center>' . $user . '</center></td>  
                        <td><center>' . $fullname . '</center></td>  
                        <td><center>' . $pass . '</center></td>  
                        <td><center>' . $email . '</center></td>  
                        <td><center>' . $diachi . '</center></td>  
                        <td><center>' . $tel . '</center></td>  
                        <td><center>' . $role . '</center></td>  
                        <td><center>' . $hinh . '</center></td>  
                        <td>  
                            <a href="' . $suatk . '"><input type="button" class="button" value="Sửa"></a>  
                            <a href="#" onclick="confirmDelete(\'' . $xoatk . '\')"><input type="button" class="button" value="Xoá"></a>  
                        </td>  
                    </tr>';  
                }  
                ?>

            </table>
            <center><div style="margin-top: 10px;">
                <a href="<?= $themmoitk ?>"><input type="button" class="button" value="Thêm mới tài khoản"></a>
            </div>
            </center>
        </div>
    </div>
</body>

</html>