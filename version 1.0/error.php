<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>HTML-PHP Form</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">


</head>
<body class="the-body p-2">



<?php

session_start();

$error = $_SESSION['error'];
$_SERVER['REQUEST_METHOD'] = "POST";


?>


<p class="fw-bold text-center mt-5"> <?php echo $error; ?> </p>


</body>
</html>