<?php  
    $hostname = "localhost:3306";
    $username = "root";
    $password = "rootpassword";
    $dbname = "search_filter";

    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    if(!$conn){
        die("Connection Failed !". mysqli_connect_error());
    }else{
        echo "Connection Established !";
    }

?>