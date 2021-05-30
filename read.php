<?php

include_once('db/dbconfig.php');

$sql = "SELECT * FROM contact_table";
$result = $conn->query($sql);
if($result->num_rows > 0){
    $data = array();
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
}

echo json_encode($data);

?>