<?php
	include "connect.php";
    session_start();
    // ตรวจสอบว่ามีชื่อใน session หรือไม่ หากไม่มีให้ไปหน้า login อัตโนมัติ
    if (empty($_SESSION["username"]) || !$_SESSION["isAdmin"]) { 
        header("location: login-form.php");
    }
?>

<?php
    $stmt = $pdo->prepare(
    "SELECT orders.ord_id,ord_date,pname,pdetail,quantity,price from member 
    INNER JOIN orders ON member.username = orders.username 
    INNER JOIN item ON orders.ord_id = item.ord_id 
    INNER JOIN product ON item.pid = product.pid
    WHERE member.username = ? ORDER BY orders.ord_id ASC;"
    );

    $stmt->bindParam(1, $_GET["username"]);        
    $stmt->execute(); 	
    $numberorder = null;

    if($row = $stmt->fetch()==null){
        echo 'ลูกค้าท่านนี้ไม่มีรายการคำสั่งซื้อ (order)';
    }

    while ($row = $stmt->fetch()) {
        $totalprice = $row["price"]*$row["quantity"];
        if($row["ord_id"] != $numberorder){
            $numberorder = $row["ord_id"];
            echo "<h3>หมายเลขออเดอร์ : $numberorder </h3>";
            echo "<h5>วันที่ : {$row["ord_date"]} </h5>";
        }

        ?>

        <?= "
        <div>
            <div>ชื่อสินค้า : {$row["pname"]}</div>
            <div>รายละเอียดสินค้า : {$row["pdetail"]}</div>
            <div>จำนวน : {$row["quantity"]}</div>
            <div>ราคาต่อชิ้น : {$row["price"]}</div>
            <div>ราคาทั้งหมด : {$totalprice}</div>
            <hr>
        </div>
        ";
    }


?>