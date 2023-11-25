<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'db.php';

$email = $_POST['email'];
$password = md5($_POST['password']);
$role = $_POST['role'];

if (!empty($email) && !empty($password) && !empty($role)) {
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");

    if (mysqli_num_rows($sql) >0) {
        $row = mysqli_fetch_assoc($sql);

        if ($row) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['otp'] = $row['otp'];
            echo json_encode(["status" => "success"]);

            exit();
        } else {
            echo json_encode(["status" => "error", "message" => "Login failed. Please check your credentials."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "SQL Error: " . mysqli_error($conn)]);
    }
} else {
    echo "All Input Fields are required!!";
}
?>
