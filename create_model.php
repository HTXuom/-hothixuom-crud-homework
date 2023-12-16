
<?php
        require_once('./database/database.php');
         
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = $_POST['name'];
            $age =  $_POST['age'];
            $email = $_POST['email'];
            $image_url = $_POST['image_url'];
         }
         
     createStudent($name, $age, $email, $image_url);

 header("Location: index.php");
       
