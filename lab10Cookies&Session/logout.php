<?php
	session_start();

    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );

	session_destroy(); // ทำลาย session
?>

ออกจากระบบสำเร็จแล้ว<br>
หากต้องการเข้าสู่ระบบอีกครั้งโปรดคลิก
<a href='login-form.php'>เข้าสู่ระบบ</a>
