<?php 
 if(isset($_POST['login']) )
 {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if($email == 'muqaddasnazeer468@gmail.com' && $password == '123' && $role == 'admin') {
        session_start();
        $_SESSION['login'] = true;
        header('Location: ../Admin/dashboard.php');

 }
 else{
    echo 'Invalid Credentials';
   
 }
}
 ?>