<?php include "connect.php" ?>
<?php
    $stmt = $pdo->prepare("INSERT INTO member VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $_POST["username"]);
    $stmt->bindParam(2, $_POST["password"]);
    $stmt->bindParam(3, $_POST["name"]);
    $stmt->bindParam(4, $_POST["address"]);
    $stmt->bindParam(5, $_POST["mobile"]);
    $stmt->bindParam(6, $_POST["email"]);
    $stmt->execute(); // เริ่มเพิ่มข้อมูล
    if($_FILES["picture"]["tmp_name"]){
        $targetfile = './memberphoto/'.$_POST["username"].'.jpg';
        $upload = move_uploaded_file($_FILES["picture"]["tmp_name"],$targetfile);
        // if($upload){
        //     header('location: workshop5detail.php?username='.$_POST["username"]);
        //     die();
        // }
    }
    // header("location: workshop6.php");
    // $pid = $pdo->lastInsertId(); // ขอคีย์หลักที่เพิ่มสำเร็จ
?>
<html>
<head><meta charset="UTF-8"></head>
<body>
เพิ่มสมาชิกสำเร็จ username ใหม่ คือ <?=$_POST["username"]?>
</body>
</html> 