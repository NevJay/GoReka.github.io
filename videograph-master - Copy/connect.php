<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $message = $_POST['message'];
    settype($name, "string");
    settype($email, "string");
    settype($contact, "string");
    settype($message, "string");

    //database connection
    $conn = new mysqli('localhost', 'sahasagl_newdbuser','Kanishka@123','sahasagl_contact');
    if($conn->connect_error){
        die('Connection Failed : ' . $conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into Persons(name, email, contact, message) values(?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $contact, $message);
        $stmt->execute();
        $stmt->close();
        $conn->close();    
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
?>