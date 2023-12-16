<?php
require_once('./database/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $image_url = $_POST['image_url'];

    // Thực hiện cập nhật
    updateStudent($id, $name, $age, $email, $image_url);

    // Redirect to the index page after updating
    header("Location: index.php");
    exit();
}
