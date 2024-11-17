<?php
function insert_taikhoan($email, $user, $pass,$ho_ten)
{
    $sql = "INSERT INTO taikhoan(email,user,pass,fullname) VALUES ('$email','$user','$pass','$ho_ten')";
    pdo_execute($sql);
}

function insert_taikhoan_admin($user,$pass,$email,$diachi,$tel,$role,$hinh)
{
    $sql = "INSERT INTO taikhoan(email,user,pass,diachi,tel,role,hinh) VALUES ('$email','$user','$pass','$diachi','$tel','$role','$hinh')";
    pdo_execute($sql);
}
// function check_user( $pass)
// {
//     $sql = "SELECT * FROM taikhoan WHERE   pass = '" . $pass . "'";
//     $taikhoan = pdo_query_one($sql);
//     return $taikhoan;
// }

    function check_user($user, $pass)
    {
        
        $sql = "SELECT * FROM taikhoan WHERE user = ? AND pass = ?";
        // Gọi hàm pdo_query_one với các tham số
        $taikhoan = pdo_query_one($sql, $user, $pass);
        return $taikhoan;
    }

// function update_taikhoan($id,  $pass, $email, $diachi, $tel,$hinh)
// {
//     if($hinh!=""){
//         $sql = "UPDATE taikhoan SET pass = '" . $pass . "',email = '" . $email . "',diachi = '" . $diachi . "',tel = '" . $tel . "' ,img = '" . $hinh . "' Where id=" . $id;
//     }
//     else{
//         $sql = "UPDATE taikhoan SET  pass = '" . $pass . "',email = '" . $email . "',diachi = '" . $diachi . "',tel = '" . $tel . "' Where id=" . $id;
//     }

  
//     pdo_execute($sql);
// }

function update_tk($id,$fullname,$diachi,$tel,$hinh){
    if($hinh!=""){
        $sql = "UPDATE taikhoan SET fullname = '" . $fullname . "',diachi = '" . $diachi . "',tel = '" . $tel . "',hinh = '" . $hinh . "' Where id=" . $id;
    }
    else{
        $sql = "UPDATE taikhoan SET fullname = '" . $fullname . "',diachi = '" . $diachi . "',tel = '" . $tel . "' Where id=" . $id;
    }
   
    pdo_execute($sql);
}
function update_taikhoan_admin($id, $user, $pass, $email, $diachi, $tel, $role, $hinh)
{
    if($hinh!=""){
        $sql = "UPDATE taikhoan SET user = '" . $user . "' ,pass = '" . $pass . "',email = '" . $email . "',diachi = '" . $diachi . "',tel = '" . $tel . "' ,role = '" . $role . "' ,hinh = '" . $hinh . "' Where id=" . $id;
    }

    else{
        $sql = "UPDATE taikhoan SET user = '" . $user . "' ,pass = '" . $pass . "',email = '" . $email . "',diachi = '" . $diachi . "',tel = '" . $tel . "' ,role = '" . $role . "'  Where id=" . $id;
    }
    pdo_execute($sql);
}

function check_email($email)
{
    $sql = "SELECT * FROM taikhoan WHERE email = '" . $email . "'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}

function loadall_taikhoan(){
    $sql = "SELECT * FROM taikhoan order by id desc";
    $taikhoan =pdo_query($sql);
    return $taikhoan;
}

function delete_taikhoan($id){
    $sql = "DELETE FROM taikhoan WHERE id =".$id;
    pdo_execute($sql);
}

function loadone_taikhoan($id){
    $sql = "SELECT * from taikhoan where id =".$id;
    $taikhoan_one =pdo_query_one($sql);
    return $taikhoan_one;
}

function get_user($n){
   if($n == 0){
    $n = "Chưa tạo tài khoản";
   }
   return $n;
}



function pdo_query_one_mk($sql, $params = []) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($params); // Truyền tham số đúng định dạng
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch(PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function update_password($id, $current_password, $new_password, $confirm_password) {
    // Kiểm tra mật khẩu cũ có đúng không
    $sql = "SELECT pass FROM taikhoan WHERE id = :id";
    $user = pdo_query_one_mk($sql, [':id' => $id]);

    if ($user && $current_password === $user['pass']) {
        // Kiểm tra mật khẩu mới có khớp với xác nhận không
        if ($new_password === $confirm_password) {
            // Mã hóa mật khẩu mới nếu cần
            // $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $hashed_password = $new_password; // Giữ nguyên nếu không cần mã hóa

            // Tạo câu truy vấn SQL
            $sql = "UPDATE taikhoan SET pass = :pass WHERE id = :id";
            
            // Thực thi câu truy vấn với các tham số
            pdo_execute($sql, [':pass' => $hashed_password, ':id' => $id]);
            return "Mật khẩu đã được cập nhật thành công.";
        } else {
            return "Mật khẩu mới và xác nhận mật khẩu không khớp.";
        }
    } else {
        return "Mật khẩu cũ không đúng.";
    }
}

?>