<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include_once 'db.php';

$fullName = $_POST['fullName'];
$role = $_POST['role'];
$email = $_POST['email'];
$registrationNumber = $_POST['registrationNumber'];
$password = md5($_POST['password']);


$confirmPassword = md5($_POST['confirmPassword']);
$verificationStatus = '0';


if (!empty($fullName) && !empty($role) && !empty($email) && !empty($registrationNumber) && !empty($password) && !empty($confirmPassword)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
        if (mysqli_num_rows($sql) > 0) {
            echo "$email ~ Already Exists";
        } else {
            if ($password == $confirmPassword) {
                $random_id = uniqid();
                $otp = mt_rand(1111, 9999);

                // Insert data into the table
                $sql2 = mysqli_query($conn, "INSERT INTO users (fullName, role, email, registrationNumber, password, otp, verificationStatus, active)
                VALUES ('{$fullName}', '{$role}', '{$email}', '{$registrationNumber}', '{$password}', '{$otp}', '{$verificationStatus}', 0)");
            
                if ($sql2) {
                    $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                    if (mysqli_num_rows($sql3) > 0) {
                        $row = mysqli_fetch_assoc($sql3);
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['otp'] = $row['otp'];

                        if ($otp) {
                            $receiver = $email;
                            // $subject = "From $fullName <$email>";
                            $subject = "From EduTo";
                            $body = "To: " . "  $fullName \n Email: " . " $email\n Your OTP: " . " $otp";
                            $sender = "From: EduTo";
                            if (mail($receiver, $subject, $body, $sender)) {
                                echo "success";
                            } else {
                                echo "Email Problem: " . mysqli_error($conn);
                            }
                        }
                        else
                        {
                            echo "Otp Sending Failed Try Again!!";
                        }
                    }
                } else {
                    echo "something went wrong!!!";
                }
            } else {
                echo "Confirm Password does not match!!";
            }
        }
    } else {
        echo "$email ~ This is not a valid Email";
    }
} else {
    echo "All input fields are required";
}
?>