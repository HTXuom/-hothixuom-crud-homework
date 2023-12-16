<?php
/**
 * Connect to database
 */
function db() {
$host     = 'localhost'; // Because MySQL is running on the same computer as the web server
$database = 'web_a'; // Name of the database you use (you need first to CREATE DATABASE in MySQL)
$user     = 'root'; // Default username to connect to MySQL is root
$password = ''; // Default password to connect to MySQL is empty

// TO DO: CREATE CONNECTION TO DATABASE
// Read file: https://www.w3schools.com/php/php_mysql_connect.asp
try {
    $db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
return $db;
}

/**
 * Create new student record
 */
function createStudent($name,$age,$email,$profile) {
    $conn=db();
$stmt= $conn->prepare('INSERT INTO student (name , age, email, profile) values (:name , :age, :email, :profile)');
$stmt->bindParam(':name', $name);
$stmt->bindParam(':age',$age);
$stmt->bindParam (':email',$email);
$stmt-> bindParam(':profile',$profile);
 
$stmt-> execute();  
}
function selectAllStudents()
{
    try {
        $conn = db();
        $stmt = $conn->prepare("SELECT * FROM `student`");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Error select all students: " . $e->getMessage();
    }
}

/**
 * Get only one on record by id 
 */
function selectOnestudent($id)
{

    try {
        $conn = db();
        $stmt = $conn->prepare("SELECT * FROM student WHERE id = :id ");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Error select 1 students: " . $e->getMessage();
    }
}

/**
 * Delete student by id
 */
function deleteStudent($id)
{
    try {
        $conn = db();
        $stmt = $conn->prepare("DELETE FROM `student` WHERE id = :id ");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error delete 1 students: " . $e->getMessage();
    }
}


/**
 * Update students
 * 
 */
function updateStudent($id, $name, $age, $email, $profile)
{
    try {
        $conn = db();
        $stmt = $conn->prepare("UPDATE `student` SET `name` = :name, `age` = :age, 
                                `email` = :email, `profile` = :profile WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':profile', $profile);
        $stmt->execute();
        echo "Update student successful";
    } catch (PDOException $e) {
        echo "Error update: " . $e->getMessage();
    }
}
