<?php
    $email = $_POST["email"];
    
    //database connection
    $conn = new mysqli('localhost', 'root','','xivietcontact');
    if($conn->connect_error){
        die('Connection Failed : ' . $conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into newsletter(email) values(?)");
        mysqli_stmt_bind_param($stmt, 's',$email);
        echo "Thank you!!!";
        $stmt->execute();
        $stmt->close();
        $conn->close();    
    }
?>