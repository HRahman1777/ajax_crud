<?php
include_once("db/dbconfig.php");

    $rawData = file_get_contents("php://input");
    
    $data = json_decode($rawData, true);

    $idno = $data['sid'];

    if(!empty($idno)){
        $sql = "DELETE FROM contact_table WHERE id='$idno'";

        if($conn->query($sql) == TRUE){
            $res = "1";
        }else{
            $res = "Unable to delete: " . $sql . "<br>" . $conn->error;
        }
    }else{
        $res = "id not exist to delete!";
    }

    echo $res;

?>