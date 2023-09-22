<?php include "connect.php" ?>
<html>
<head>
    <meta charset="utf-8">
    <style>
        table,tr,td,th{
            border:1px solid black;
        }
    </style>
</head>
<body>


<table>
    <thead>
        <tr>
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>รายละเอียด</th>
            <th>ราคา</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $stmt = $pdo->prepare("SELECT * FROM product");
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                echo"
                <tr>
                    <td>".$row["pid"]."</td>
                    <td>".$row["pname"]."</td>
                    <td>".$row["pdetail"]."</td>
                    <td>".$row["price"]."</td>
                </tr>";
            }
        ?>  
    </tbody>
</table>
</body>
</html>