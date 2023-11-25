<?php
session_start();

// Check if the user is logged in
if (empty($_SESSION['id'])) {
    // Redirect to login page if not logged in
    header("Location: index.php");
    exit();
}

// Check if the user is verified
if ($_SESSION['verificationStatus'] !== "Verified") {
    // Redirect to the verification page if not verified
    $_SESSION['login'] = true;
    header("Location: verify.php");
    exit();
}
if ($_SESSION['verificationStatus'] === "Verified") {
   // Debugging
   echo "Role: " . $_SESSION['role'] . "<br>";
   echo "Verification Status: " . $_SESSION['verificationStatus'] . "<br>";

   // Redirect based on role
   if ($_SESSION['role'] == "student") {
       $_SESSION['login'] = true;
       header("Location: ./studentDashboard.php");
       exit();
   } else if ($_SESSION['role'] == "teacher") {
       header("Location: teacher.php");
       exit();
   } else {
       $_SESSION['login'] = true;
       header("Location: ./Admin/dashboard.php");
       exit();
   }
}

// Now, the user is logged in and verified, you can proceed with displaying the dashboard content

// Include database connection or other necessary files if needed
// include 'db.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Differentiator</title>
</head>

<body>
    <header>
        <h3>Hello Muqaddas student</h3>
    </header>

    <!-- Dashboard content goes here -->

    
</body>

</html>
