<?php include "connect.php" ?>
<?php session_start(); ?>

<html>
<body>
<h1>สวัสดี <?=$_SESSION["fullname"]?></h1>
หากต้องการออกจากระบบโปรดคลิก <a href='logout.php'>ออกจากระบบ</a>
<?php
    if (empty($_SESSION["username"]) ) { 
        header("location: login-form.php");
    }

    if($_SESSION["isAdmin"]){
        echo "<div style='margin-top:30px;'><a href='product-list.php'>ดูหน้าสินค้าคงเหลือ</a></div>";
        $stmt = $pdo->prepare(
            "SELECT member.username , count(orders.ord_id) total_order from member 
            LEFT JOIN orders on member.username = orders.username 
            GROUP BY member.username;"
        );
        $stmt->execute(); 
        // echo "<div style='margin-top:30px;'></div>";
        while ($row = $stmt->fetch()) {
        echo "
            <div style='margin-top:20px;'>
                <div>username : {$row["username"]} </div>
                <div style='display:flex;'>
                    <div>จำนวนออเดอร์ : {$row["total_order"]} </div>
                    <a style='margin-left:20px;' href='order-detail.php?username={$row['username']}'>ดูรายละเอียดออเดอร์</a>
                </div>
            </div>
        ";
        }
        die();
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

       $stmt->bindParam(1, $_SESSION["username"]);        
       $stmt->execute(); 	
       $numberorder = null;

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
</body>
</html>
