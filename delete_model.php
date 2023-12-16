<?php
require_once('./database/database.php');
$id = $_GET['id'];
// Trước khi xóa, lấy thông tin sinh viên
deleteStudent($id);
header("Location: index.php");
