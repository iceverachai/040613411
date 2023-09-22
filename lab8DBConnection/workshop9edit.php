<?php include "connect.php" ?>

<?php
$stmt = $pdo->prepare("UPDATE member SET password=?, name=?, address=?, mobile=?, email=?  WHERE username=?"); // เตรียมคำสั่ง SQL สำหรับแก้ไข
$stmt->bindParam(1, $_POST["password"]); // ก าหนดค่าลงในต าแหน่ง ?
$stmt->bindParam(2, $_POST["name"]);
$stmt->bindParam(3, $_POST["address"]);
$stmt->bindParam(4, $_POST["mobile"]);
$stmt->bindParam(5, $_POST["email"]);
$stmt->bindParam(6, $_POST["username"]);
if ($stmt->execute()) // เริ่มแก้ไขข้อมูล หากแก้ไขส าเร็จเงื่อนไขจะเป็ นจริง
echo "แก้ไขรายละเอียด " . $_POST["username"] . " สำเร็จ";
?>