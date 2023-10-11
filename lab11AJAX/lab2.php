<?php
    include('connect.php');

    $stmt = $pdo->prepare("SELECT * FROM member WHERE name LIKE ?");
    if (!empty($_GET)) // ถ้ามีค่าที่ส่งมาจากฟอร์ม
    $value = '%' . $_GET["keyword"] . '%'; // ดึงค่าที่ส่งกำหนดให้กับตัวแปรเงื่อนไข
    $stmt->bindParam(1, $value); // กำหนดชื่อตัวแปรเงื่อนไขที่จุดที่กำหนด ? ไว้
    $stmt->execute(); // เริ่มค้นหา

    $abc = array();
    while($row = $stmt->fetch()){
        array_push($abc,array(
            'name' => $row["name"],
            'img' => $row["username"]
        ));
    }
    echo json_encode($abc);
?>
