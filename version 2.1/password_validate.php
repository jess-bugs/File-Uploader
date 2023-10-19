<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sessions</title>


<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">

</head>
<body class="p-3">

<?php

session_start();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $password = file_get_contents('http://192.168.1.14:8080/.pass/pass.txt');
    $msg = "";
    $pass = (string) $password;
    
    
    
    
    $input = htmlspecialchars($_POST['password']);
    // $input = $_POST['password'];
    
    if ($input === $pass) {
        $_SESSION['req-method'] = $_SERVER['REQUEST_METHOD'];
        
        
        header('Location: uploader.php');
        
        
        
        
        
    } else {
        
        header('Location: incorrect.html');
        
    }
    
    
} else {
    
    $msg = "Incorrect request method.";
}




?>


<h2 class='text-center display-2 mt-5'> <?php echo $msg; ?> </h2>

<div class="p-4 text-center">



</div>

</body>
</html>

