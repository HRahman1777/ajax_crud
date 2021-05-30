<?php
include_once("db/dbconfig.php");

    $rawData = file_get_contents("php://input");
    
    $data = json_decode($rawData, true);

    $idno = $data['sid'];
    $nm = $data['name'];
    $em = $data['email'];
    $ph = $data['phone'];
    
    if(!empty($nm) && !empty($em) && !empty($ph)){
        $sql = "UPDATE contact_table SET name='$nm', email='$em', phone='$ph' WHERE id='$idno'";
        if($conn->query($sql) == TRUE){
            $res = "1";
        }else{
            $res = "Unable to update: " . $sql . "<br>" . $conn->error;
        }
    }else{
        $res = "Fill up all field!";
    }

    echo $res;

?>