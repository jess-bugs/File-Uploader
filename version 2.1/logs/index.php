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



//SQL Server configuration
$server = '192.168.1.14';
$user = file_get_contents('http://noip.bleepinghost.online/.pass/ftp.user');
$pass = file_get_contents('http://noip.bleepinghost.online/.pass/ftp.pass');
$database = 'FTP_Logs';
$port = 4443;

$table_name = "Log";

$status = "";

$conn = mysqli_connect($server, $user, $pass, $database, $port);
if(!$conn) {

    // $status = "ERROR: " . mysqli_connect_error();
    // echo "<p class='text-center mt-5'><span class='fw-bolder'>Status: </span> $status</p>";
    // die();

    header('Location: error.html');
    die();

} else {

    $status = "Connected!";
    echo "<p class='text-center mt-5'><span class='fw-bolder'>Status: </span> <span style='color: green;'>$status </span></p>";
}


$query = "select * from $table_name";
$result = mysqli_query($conn, $query);


if( mysqli_num_rows($result) > 0) {

    $ID = "ID";
    $Server = "Server";
    $UploadedBy = "Uploaded By";
    $FileName = "File Name";
    $TMPFile = "TMP File";
    $UploadedTo = "Uploaded To";
    $Result = "Result";
    $Date = "Date";
    $Time = "Time";

    //Table row- Headers
    echo "<div class='container-fluid my-5'>";
    echo "<div class='border border-2 p-1'>";
    echo "<table class='table table-striped table-hover table-bordered '>";
    echo "<thead>";
    echo "<tr>";

    //the headers
    echo "<th scope='col'>$ID</th>";
    echo "<th scope='col'>$Server</th>";
    echo "<th scope='col'>$UploadedBy</th>";
    echo "<th scope='col'>$FileName</th>";
    echo "<th scope='col'>$TMPFile</th>";
    echo "<th scope='col'>$UploadedTo</th>";
    echo "<th scope='col'>$Result</th>";
    echo "<th scope='col'>$Date</th>";
    echo "<th scope='col'>$Time</th>";
    echo "</tr>";
    echo "</thead>";

    while($row = mysqli_fetch_assoc($result)) {


        //Table row - data
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['Server'] . "</td>";
        echo "<td>" . $row['UploadedBy'] . "</td>";
        echo "<td>" . $row['FileName'] . "</td>";
        echo "<td>" . $row['TMPFile'] . "</td>";
        echo "<td>" . $row['UploadedTo'] . "</td>";
        echo "<td>" . $row['Result'] . "</td>";
        echo "<td>" . $row['Date'] . "</td>";
        echo "<td>" . $row['Time'] . "</td>";
        echo "</tr>";
        
    }


    echo "</table>";
    echo "</div>";
    echo "</div>";

} else {

    echo "<p class='text-center mt-5'><span class='fw-bolder'>No Data Found.</span></p>";
}


?>




<div class="container my-5"  >

<div class="text-center" style="margin-top: 150px;">

<h5 class='mb-3'>Powered By:</h2>    
<p class="lead mb-0">MySQL</p>
<p class="lead mb-0">PHP</p>
<p class="lead mb-0">Bootstrap</p>

</div>

</div>

</body>
</html>