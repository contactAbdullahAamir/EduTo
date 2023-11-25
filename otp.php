<?php
include_once 'db.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

$id = $_SESSION['id'];
    $otp1 = $_POST['opt1'];
    $otp2 = $_POST['opt2'];
    $otp3 = $_POST['opt3'];
    $otp4 = $_POST['opt4'];

   
    $session_otp = $_SESSION['otp'];
    $otp = $otp1 . $otp2 . $otp3 . $otp4;

    if (!empty($otp)) {
        if ($otp == $session_otp) {
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE id = '{$id}' AND otp = '{$otp}'");
            if (mysqli_num_rows($sql) > 0) {
                $null_otp = 0;
                $sql2 = mysqli_query($conn, "UPDATE users SET `verificationStatus` = 'Verified', `otp` = '$null_otp' WHERE id = '{$id}'");
                if ($sql2) {
                    $row = mysqli_fetch_assoc($sql);
                    if ($row) {
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['verificationStatus'] = $row['verificationStatus'];
                        header("Location: dashboardsDifferentiator.php");
            exit();
         } else {
            header("Location: verify.php");
          
            exit();
                    }
                }
            }
        } else {
            echo "Wrong Otp!!";
        }
    } else {
        echo "Enter Otp";
    }

?>
