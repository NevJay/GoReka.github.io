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
    $conn = new mysqli('localhost', 'root','','sahasagl_contact');
    if($conn->connect_error){
        die('Connection Failed : ' . $conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into persons(name, email, contact, message) values(?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $contact, $message);
        echo "Our team will contact you on your inquiry....";
        $stmt->execute();
        $stmt->close();
        $conn->close();    
    }
?>