<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>The Bleeping Host</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">

<!-- Logo -->
<link rel="icon" type="image/x-icon" href="http://bleepinghost.online/images/bleepinghost.png">    

</head>
<body class="the-body p-2">



<?php

session_start();

$result = $_SESSION['result'];


?>


<p style="font-size: 1.9em;" class="fw-bold text-center mt-5"> <?php echo $result; ?> </p>


</body>
</html>