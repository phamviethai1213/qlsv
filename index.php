<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Student Management</title> 
    <link rel="stylesheet" href="style.css"> 
</head> 
<body> 
    <div class="container"> 
        <h3 class="title">Van Lang University Student Management</h3> 
        <a class="submit" href="create.php">Thêm sinh viên</a> 
        <div class="table"> 
        <table> 
            <thead> 
                <tr> 
                    <th>TT</th> 
                    <th>Họ và tên</th> 
                    <th>Giới tính</th> 
                    <th>Email</th> 
                    <th>Số điện thoại</th> 
                    <th>Hành động</th> 
                </tr> 
            </thead> 
            <tbody> 
                <?php 
                    //Kết nối CSDL 
                    include("connect.php"); 
                    //Câu lệnh select     
                    $sql = "SELECT * FROM students"; 
                    $result = $conn->query($sql); 
                    //Đổ dữ liệu lên bảng 
                    if ($result->num_rows > 0) { 
                        while ($row = $result->fetch_assoc()) { 
                            echo " 
                                <tr> 
                                    <td>$row[id]</td> 
                                    <td>$row[hovaten]</td> 
                                    <td>$row[gioitinh]</td> 
                                    <td>$row[email]</td> 
                                    <td>$row[mobile]</td> 
                                    <td> 
                                        <a class='btn primary' href='edit.php?id=$row[id]'>Sửa</a> 
                                        <a class='btn danger' style='margin-right: 0;' href='delete.php?id=$row[id]'>Xóa</a> 
                                    </td> 
                                </tr> 
                            "; 
                        } 
                    } 
                ?> 
            </tbody> 
        </table> 
        </div> 
    </div> 
</body> 
</html> 