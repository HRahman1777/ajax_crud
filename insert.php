<?php
include_once("db/dbconfig.php");

    $rawData = file_get_contents("php://input");
    
    $data = json_decode($rawData, true);

    $nm = $data['name'];
    $em = $data['email'];
    $ph = $data['phone'];
    
    if(!empty($nm) && !empty($em) && !empty($ph)){
        $sql = "INSERT INTO contact_table (name, email, phone) VALUES ('$nm', '$em', '$ph')";

        if($conn->query($sql) == TRUE){
            $res = "1";
        }else{
            $res = "Unable to save: " . $sql . "<br>" . $conn->error;
        }
    }else{
        $res = "Fill up all field!";
    }

    echo $res;

?>