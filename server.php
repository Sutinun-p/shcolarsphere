<?php
$serverName = "119.59.96.62"; // ชื่อเซิร์ฟเวอร์หรือ IP address
$username = "cpkku"; // ชื่อผู้ใช้ SQL Server
$password = "CPKKUP@ssw0rd888"; // รหัสผ่าน SQL Server
$database = "eproject"; // ชื่อฐานข้อมูล

// สร้างการเชื่อมต่อ
$conn = new mysqli($serverName, $username, $password, $database);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8");
?>
