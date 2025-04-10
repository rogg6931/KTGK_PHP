<?php
    $servername = "localhost";
    $db_name = "quan_ly_sach";
    $username = "root";
    $password = "";

    try{
        // connect db:
        $conn = new PDO("mysql:host=$servername;dbname=$db_name;charset=utf8", $username, $password);
        
        // set err:
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "connect thanh cong";
        
    }catch (PDOException $e){
        die("ket noi that bai " . $e->getMessage());
    }
?>