<?php 
    include("connect.php"); 
    $id = $_GET['id']; 
    if ($_SERVER['REQUEST_METHOD'] == 'GET') { 
        if (!isset($_GET["id"])) { 
            header("location: index.php"); 
            exit; 
        } 
        $sql = "SELECT * FROM students WHERE id='$id'"; 
        $result = $conn->query($sql); 
        $row = $result->fetch_assoc(); 
        if (!$row) { 
            header("location: index.php"); 
            exit; 
        } 
        $fullname = $row["hovaten"]; 
        $gioitinh = $row["gioitinh"]; 
        $email = $row["email"]; 
        $mobile = $row["mobile"]; 
    } else{ 
         
            $fullname = $_POST['fullname']; 
            $gioitinh = $_POST['gioitinh']; 
            $email = $_POST['email']; 
            $mobile = $_POST['mobile']; 
     
            $sql = "UPDATE students SET hovaten='$fullname', gioitinh='$gioitinh', email='$email', mobile='$mobile' WHERE id='$id'"; 
            $result = $conn->query($sql); 
            if(!$result){ 
                die("Lỗi kết nối: " . $conn->connect_error); 
            } 
            header("location: index.php"); 
            exit; 
    } 
?> 

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="style.css"> 
    <title>Thêm Sinh Viên</title> 
</head> 
<body> 
    <div class="container"> 
        <h3 class="title">Thêm mới sinh viên</h3> 
        <form method="post"> 
            <div> 
                <label>Mã sinh viên</label> 
                <input type="text" name="id" id="id" disabled value="<?php echo $id; ?>"> 
            </div> 
            <div> 
                <label for="fullname">Họ và tên</label> 
                <input type="text" name="fullname" value="<?php echo $fullname; ?>"> 
            </div> 
            <div> 
                <label for=" email">Email</label> 
                <input type="email" name="email" value="<?php echo $email; ?>"> 
            </div> 
            <div> 
                <label for="gioitinh">Giới tính</label> 
                <input type="text" name="gioitinh" value="<?php echo $gioitinh; ?>"> 
            </div> 
            <div> 
                <label for="mobile">Điện thoại</label> 
                <input type="text" name="mobile" value="<?php echo $mobile; ?>"> 
            </div> 
            <input type="submit" name="submit" value="Cập nhật"> 
            <a href="index.php"><input type="button" value="Hủy" class="cancel"></a> 
        </form> 
    </div> 
</body> 
</html> 

