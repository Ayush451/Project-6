<?php
include 'connect.php';
//Check for sumbit button hit with post method for all Types
if (isset($_POST['HealthFitness'])) {

    $dateregistered = date("Y-m-d H:i:s");
    $entry = $_POST['entry'];
    $type = 'Health and Fintess';
    

    $sql = "insert into `intent` (datetime,entry,type)
    values('$dateregistered','$entry','$type')";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die(mysqli_error($conn));
    }
}







if (isset($_POST['Intellectual'])) {

    $dateregistered = date("Y-m-d H:i:s");
    $entry = $_POST['entry'];
    $type = 'Intellectual Life';
    

    $sql = "insert into `intent` (datetime,entry,type)
    values('$dateregistered','$entry','$type')";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die(mysqli_error($conn));
    }
}