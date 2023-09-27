<?php include "connect.php" ?>
<html>
<head><meta charset="utf-8">
<script>
    function confirmDelete(username) { // ฟังก์ชนจะถูกเรียกถ้าผู้ใช ั คลิกที่ ้ link ลบ
    var ans = confirm("ต้องการลบผู้ใช้ " + username); // แสดงกล่องถามผู้ใช ้
    if (ans==true) // ถ้าผู้ใชกด ้ OK จะเข ้าเงื่อนไขนี้
    document.location = "workshop6delete.php?username=" + username; // สงรหัสส ่ นค ้าไปให ้ไฟล์ ิ delete.php
    }
</script>
</head>
<body>
<?php
    $stmt = $pdo->prepare("SELECT * FROM member");
    $stmt->execute();
    
    while ($row = $stmt->fetch()) {
    echo "username : ".$row ["username"]."<br>";
    echo "password : ".$row ["password"]."<br>";
    echo "name : ".$row ["name"]."<br>";
    echo "address : ".$row ["address"]."<br>";
    echo "mobile : ".$row ["mobile"]."<br>";
    echo "email : ".$row ["email"]."<br>";
    echo "<a href='editform.php?pid=".$row ["username"]."'>แก้ไข</a> | ";
    echo "<a href='#' onclick='confirmDelete(`{$row["username"]}`)'>ลบ</a>";
    echo "<hr>\n";
}
?>
</body>
</html>