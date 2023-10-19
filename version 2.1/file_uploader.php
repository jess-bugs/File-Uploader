<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    

    session_start();
    
    $ftp_server = '192.168.1.14';
    $user = htmlspecialchars($_POST['user']);
    $pass = htmlspecialchars($_POST['password']);
    
    //file handlers
    $local_file = basename( $_FILES['file_name']['name']);
    $tmp_file = $_FILES['file_name']['tmp_name'];
    

    //remote file directory
    $remote_path = "/home/bugs/BACKUP/" . $local_file;
    
    
    
    //result message
    $msg = "null";
    $result = "null";
    



    
    
    // =======Date and Time==========
    date_default_timezone_set('Asia/Manila');
    $timestamp = time();
    $time_format = 'h:i:s A';
    $date_format = 'l, Y-m-d';
    $time = date($time_format, $timestamp);
    $date = date($date_format, $timestamp);
    
    file_put_contents('ftp.logs', "==============================================" . "\nDate: " . $date . "\nTime: " . $time . "\n", FILE_APPEND);
    







    //SQL - SESSION - VARIABLES
    $_SESSION['server'] = $ftp_server;
    $_SESSION['user'] = $user;
    $_SESSION['file_name'] = $local_file;
    $_SESSION['tmp_file'] = $tmp_file;
    $_SESSION['remote_path'] = $remote_path;
    $_SESSION['date'] = $date;
    $_SESSION['time'] = $time;







    
    
    
    
    //connect to FTP server
    $ftp_conn = ftp_connect($ftp_server);
    
    if(!$ftp_conn) {
        
        $msg = "[*]Unable to Connect. Server might be down or misconfiguration occured.";
        file_put_contents('ftp.logs', "\n" . $msg . "\n\nClosed.", FILE_APPEND);
        file_put_contents('ftp.logs', "\n==============================================\n\n\n", FILE_APPEND);
        

        //display the error message
        $_SESSION['error'] = $msg;
        header('Location: error.php');


        $result = "Did not connect";
        $_SESSION['status'] = $result;
        include "sql/mysql.php";        

        
        
    } else {
        
        $msg = "[*]Connected to server.";
        file_put_contents('ftp.logs', "\n" . $msg, FILE_APPEND);

        $result = "Connected";
        $_SESSION['status'] = $result;

    }
    
    
    
    
    
    //login to ftp server
    $login_ftp = ftp_login($ftp_conn, $user, $pass);
    
    if(!$login_ftp) {
        
        $msg = "[*]Login failed. Check username and password.";
        file_put_contents('ftp.logs', "\n" . $msg . "\n\nClosed.", FILE_APPEND);
        file_put_contents('ftp.logs', "\n==============================================\n\n\n", FILE_APPEND);

        //display the error message
        $_SESSION['error'] = $msg;
        header('Location: error.php');

        $result = "Could not log in";
        $_SESSION['status'] = $result;
        include "sql/mysql.php";        

        die();
        
    } else {
        
        $msg = "[*][$user] has logged in.";
        file_put_contents('ftp.logs', "\n" . $msg . "\n", FILE_APPEND);
        

        $result = "Logged In";
        $_SESSION['status'] = $result;

    }











    //check if file is empty
    if(empty($local_file) || empty($tmp_file)) {
        
        $msg = "ERROR: File cannot be empty.";
        file_put_contents('ftp.logs', "\n" . $msg . "\n\nClosed.", FILE_APPEND);
        file_put_contents('ftp.logs', "\n==============================================\n\n\n", FILE_APPEND);
        
        
        //display the error message
        $_SESSION['error'] = $msg;
        header('Location: error.php');
        


        $result = "Empty File";
        $_SESSION['status'] = $result;
        include "sql/mysql.php";        


    }










    
    
    
    
    
    
    
    
    //upload the file
    if(ftp_put($ftp_conn, $remote_path, $tmp_file, FTP_BINARY)) {
        
        $msg = "[$local_file] -->  uploaded successfully!";
        file_put_contents('ftp.logs', "\n" . $msg . "\n\n", FILE_APPEND);

        $_SESSION['result'] = "<span style='font-weight: bolder;'>$local_file</span> was uploaded <span style='color: green; font-weight: bolder;'> successfully! </span>";
        header('Location: result.php');

        $result = "Uploaded";
        $_SESSION['status'] = $result;

        
    } else {
        
        $msg = "[$local_file] -->  FAILED TO UPLOAD.";
        file_put_contents('ftp.logs', "\n" . $msg . "\n", FILE_APPEND);
        
        $_SESSION['result'] = "<span style='font-weight: bolder;'>$local_file</span> : <span style='color: red; font-weight: bolder;'> FAILED</span> to upload." . "<br> <span class='lead'>Something went wrong</span>";
        header('Location: result.php');

        $result = "Failed";        
        $_SESSION['status'] = $result;

        
    }
    
    
    
    
    
    
    //close the connection
    $close_ftp = ftp_close($ftp_conn);
    if($close_ftp) {
        
        $msg = "FTP CLOSED.";
        file_put_contents('ftp.logs', $msg . "\n", FILE_APPEND);
        file_put_contents('ftp.logs',  "==============================================\n\n\n", FILE_APPEND);
        
        
    }
    



    //For SQL Log Database
    include "sql/mysql.php";
    
    
    
    
    
    
} else {

    //GET handler
    header('Location: index.html');
}