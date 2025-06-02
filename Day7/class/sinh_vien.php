<?php

include 'header.php';

$query = "SELECT sinh_vien.*, lop_hoc.name as ten_lop FROM sinh_vien JOIN lop_hoc on sinh_vien.lop_hoc_id = lop_hoc.id order by sinh_vien.id ASC";
$result = mysqli_query($conn, $query);

?>

<h2>Danh sách sinh viên</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Họ tên</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Lớp</th>
        <th>Trạng thái</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>

        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['ten_lop'] ?></td>
            <td>
                <a href="edit_sv.php?id=<?= $row['id'] ?>">Sửa</a>
                <a href="delete_sv.php?id=<?= $row['id'] ?>" onclick="return confirm('Xóa sinh viên')">Xóa</a>
            </td>

        </tr>
    <?php endwhile; ?>
</table>
<h2>Thêm sinh viên</h2>
<form action="" method="POST">

    <label for="name_input">Nhập họ tên</label>
    <input type="text" name="name_input" id="name_input">

    <label for="email_input">Nhập email</label>
    <input type="email" name="email_input" id="email_input">

    <label for="phone_input">Nhập số điện thoại</label>
    <input type="text" name="phone_input" id="phone_input">

    <label for="lopId">Id lớp học</label>
    <input type="number" name="lopId" id="lopId">    
</form>
<?php
include 'footer.php';
?>