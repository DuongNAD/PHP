<?php
include 'header.php';

  $addStudent =null;
    $message ="";

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])){
        try{
        $name_raw= $_POST['name'] ?? '';
        $email_raw = $_POST['email'] ?? '';
        $phone_raw = $_POST['phone'] ?? '';
        $class = $_POST['class'] ?? '';

        $name= trim($name_raw);
        $email=trim($email_raw);
        $query = "insert into sinh_vien(name, email,phone) values ('$name','$email','$phone_raw')";
       
        echo $query;
        $result = mysqli_query($conn,$query);   
        $message = "Thêm sinh viên thành công!";
        }
        
        catch (Exception $e) {
        $message = 'Lỗi: ' . $e->getMessage();
    }


}
?>

<form action="" method="POST">
    <label for="name">Tên sinh viên</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email</label>
    <input type="text" id="email" name="email" required><br><br>

    <label for="phone">Số điện thoại</label>
    <input type="number" id="phone" name="phone" required><br><br>

    <label for="class">Lớp học</label>
    <select name="class" id="class">
        
    </select><br><br>
    <button type="submit" name="add">Thêm</button>
</form>
<?php
  
        
?>


<?php
include 'footer.php';
?>
