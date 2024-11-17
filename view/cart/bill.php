<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    if(isset($_SESSION['user'])){
        extract($_SESSION['user']);
        $id=$_SESSION['user']['id'];
        $fullname=$_SESSION['user']['fullname'];
        $user=$_SESSION['user']['user'];
        $diachi=$_SESSION['user']['diachi'];
        $email=$_SESSION['user']['email'];
        $tel=$_SESSION['user']['tel'];
    }else{
        $id=0;
        $fullname="";
        $user="";
        $diachi="";
        $email="";
        $tel="";
    }
    ?>
   <form method="POST" action="index.php?act=billcomfirm">

        <center>
            <div class="user-info-form">
            <center><h1>Thông tin khách hàng</h1></center><br>
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="text" name="fullname" placeholder="Họ Và Tên:" value= "<?=$fullname?>"  required>
            <input type="text" name="user" placeholder=" Tên:" value= "<?=$user?>"  required>
            <input type="email" name="email" placeholder="Email" value="  <?=$email?> "  required>
            <input type="text" name="diachi" placeholder=" Địa chỉ:" value= "<?=$diachi?>"  required>
            <input type="text" name="tel" placeholder=" Số điện thoại:" value= "<?=$tel?>"  required>
            </div>
        </center>

        <center>
        <div class="bill-container">
        <center><h1>Chi tiết đơn hàng</h1></center><br>
        <table>
            <?php
            viewcart(0);
            ?>
        
        </table>

        <center><h2>Phương thức thanh toán</h2></center><br>
        <table >
            <tr>
                <td><input type="radio" value=1 name="pttt" checked> Trả tiền khi nhận hàng</td>
                <td><input type="radio" value=2 name="pttt"> Chuyển khoản ngân hàng</td>
                <td><input type="radio" value=3 name="pttt"> Thanh toán online</td>
            </tr>
        </table>
    
    <input type="submit" name="dongydathang" class="button confirm-button" value="Xác nhận mua">
    </form>
    <?php unset($conn); ?>
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