<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HTML-PHP Form</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
    
    <style>
        .error {
            color: red;
        }

        .upload-block {
            margin: auto;
            display: block;
        }

        .the-body {
            background-color: black;
        }
    </style>
    
</head>
<body class="the-body p-2">



<?php
session_start();
$req_method = $_SESSION['req-method'];


if ($req_method !== 'POST') {

    // echo $_SERVER['REQUEST_METHOD'];
    // echo $req_method;

    header('Location: index.html');


} else {


    echo "<div class='m-3'> ";
    echo "<div class='col-lg-6 text-start upload-block mt-5'>";
    echo "<form action='file_uploader.php' method='POST' autocomplete='off' enctype='multipart/form-data'>";


    echo "<div class='container-fluid text-warning fw-bold'>";
    echo "<div class='col-12 col-md-6 col-lg-6 mb-3'>";
    echo "<label for='user' class='me-1'>Username: </label>";
    echo "<input type='text' name='user' value='bugs'>";
    echo "</div>";

    echo "<div class='col-12 col-md-6 col-lg-6'>";
    echo "<label for='password' class='me-1'>Password: </label>";
    echo "<input type='password' name='password' value='Onesandzeroes23!'>";
    echo "</div>";

    


    echo "<label for='file_name' class='form-label text-warning mb-3 fw-bold'  style='margin-top: 100px;'>Choose file to upload: </label>";
    echo "<input type='file' class='form-control border border-danger' name='file_name' id='file_name' multiple>";
    
    echo "<div class='text-center mt-5'>";
    echo "<input type='submit' class=' btn btn-dark border border-danger border-3 text-warning fw-bold mt-5' name='submit' value='Upload'></input>";
    echo "</div>";


    echo "</form>";
    echo "</div>";
    echo "</div>";


}



?>





</body>
</html>