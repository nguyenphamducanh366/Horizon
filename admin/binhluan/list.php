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
                <h2>DANH SÁCH BÌNH LUẬN</h2>
            </center>
        </div>
        <div class="container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>USER</th>
                    <th>HỌ TÊN </th>
                    <th>NGÀY BÌNH LUẬN</th>
                    <th>NỘI DUNG</th>

                    <th>HÀNH ĐỘNG</th>
                </tr>

                <?php   
                foreach ($list_binhluan as $bl) {  
                    extract($bl);  
                     
                    $xoabl = "index.php?act=xoabl&id=" . $id;  
                   
                  
                    echo '<tr>  
                        <td><center>' . $id . '</center></td>  
                        <td><center>' . $user . '</center></td>  
                        <td><center>' . $fullname . '</center></td>  
                        <td><center>' . $ngaybinhluan . '</center></td>  
                        <td><center>' . $noidung . '</center></td>  
                       
                        <td>  
                          
                            <a href="#" onclick="confirmDelete(\'' . $xoabl . '\')"><input type="button" class="button" value="Xoá"></a>  
                        </td>  
                    </tr>';  
                }  
                ?>

            </table>
            <div style="margin-top: 10px;">

            </div>
        </div>
    </div>
</body>

</html>