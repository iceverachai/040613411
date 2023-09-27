<?php include "connect.php" ?>
<?php
// 1. ก าหนดค าสง SQL ให้ดึงสนค้าตามรหัสส ิ นค้า ิ
    $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
    $stmt->bindParam(1, $_GET["username"]); // 2. น าค่า pid ที่สงมากับ ่ URL ก าหนดเป็ นเงื่อนไข
    $stmt->execute(); // 3. เริ่มค้นหา
    $row = $stmt->fetch(); // 4. ดึงผลลัพธ์ (เนื่องจากมีข้อมูล 1 แถวจึงเรียกเมธอด fetch เพียงครั้งเดียว)
?>

<html>
<head><meta charset="UTF-8"></head>
<body>
    <form action="workshop9edit.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="username" value="<?=$row["username"]?>"><br>
    password : <input type="text" name="password" value="<?=$row["password"]?>"><br>
    name : <input type="text" name="name" value="<?=$row["name"]?>"><br>
    address : <input type="text" name="address" value="<?=$row["address"]?>"><br>
    mobile : <input type="text" name="mobile" value="<?=$row["mobile"]?>"><br>
    email : <input type="text" name="email" value="<?=$row["email"]?>"><br>
    picture : <input type="file" name="picture" id="picture"><br>
    <input type="submit" value="แก้ไขรายละเอียดสมาชิก ">
    </form>
</body>
</html>