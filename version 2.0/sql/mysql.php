<?php


session_start();


//FTP Configurations
$ftp_server = $_SESSION['server'];
$ftp_user = $_SESSION['user'];
$file_name =  $_SESSION['file_name'];
$tmp_file = $_SESSION['tmp_file'];
$remote_path = $_SESSION['remote_path'];
$result = $_SESSION['status'];
$date = $_SESSION['date'];
$time = $_SESSION['time'];



//SQL Server configuration
$server = '192.168.1.14';
$user = file_get_contents('http://noip.bleepinghost.online/.pass/ftp.user');
$pass = file_get_contents('http://noip.bleepinghost.online/.pass/ftp.pass');
$database = 'FTP_Logs';
$port = 4443;

$conn = mysqli_connect($server, $user, $pass, $database, $port);
if(!$conn) {

    echo "<br>ERROR: " . mysqli_connect_error();
} else {

    echo "<br>STATUS: Connected!";
}





//function for creating table
function create_table($table_name) {

    global $conn;
    $query = "create table $table_name(
        
        ID INT primary key auto_increment,
        Server varchar(15) not null,
        UploadedBy varchar(50) not null,
        FileName varchar(500) not null,
        TMPFile varchar(500) not null,
        UploadedTo varchar(500) not null,
        Result varchar(500) not null,
        Date varchar(500) not null,
        Time varchar(500) not null

    )";


    if(mysqli_query($conn, $query)) {

        echo "<br>Table created!";
    } else {

        echo "<br>ERROR: " . mysqli_error($conn);

    }
    
}















//function for inserting Logs data
function insertData($table_name) {
    
    global $conn;
    global $ftp_server, $ftp_user, $file_name, $tmp_file, $remote_path, $result, $date, $time;

    $query = "insert into $table_name
    (Server, UploadedBy, FileName, TMPFile, UploadedTo, Result, Date, Time)
    VALUES ('$ftp_server', '$ftp_user', '$file_name', '$tmp_file', '$remote_path', '$result', '$date', '$time')";


    if(mysqli_query($conn, $query)) {

        echo "<br>RESULT: All Data were inserted!";
    
    } else {

        echo "<br>ERROR: " . mysqli_error($conn);

    }

}




insertData('Log');








//close SQL
mysqli_close($conn);


