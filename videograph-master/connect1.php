<?php
    $email = $_POST["email"];
    
    //database connection
    $conn = new mysqli('localhost', 'sahasagl_newdbuser','Kanishka@123','sahasagl_contact');
    if($conn->connect_error){
        die('Connection Failed : ' . $conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into newsletter(email) values(?)");
        mysqli_stmt_bind_param($stmt, 's',$email);
        $stmt->execute();
        $stmt->close();
        $conn->close();    
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
?>