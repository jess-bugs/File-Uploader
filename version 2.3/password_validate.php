
<?php

session_start();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $password = file_get_contents('http://192.168.1.14/.pass/pass.txt');
    $msg = "";
    $pass = (string) $password;
    
    
    
    
    $input = htmlspecialchars($_POST['password']);
    // $input = $_POST['password'];
    
    if ($input === $pass) {
        $_SESSION['req-method'] = $_SERVER['REQUEST_METHOD'];
        
        
        header('Location: uploader.php');
        session_start();
        $_SESSION['user'] = "";
        $_SESSION['pass'] = "";
        
        
        
        
        
    } else {
        
        header('Location: incorrect.html');
        
    }
    
    
} else {
    
    $msg = "Incorrect request method.";
}




?>

