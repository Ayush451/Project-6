<?php
    include 'connect.php';

    if(isset($_GET['deleteid'])){
        $id =$_GET['deleteid'];

        $sql = "delete from `intent` where id =$id";
        $result = mysqli_query($conn,$sql);
        if($result){
           // echo "Deleted Successfully";
           header('location: intent.php');
        }else{
            die(mysqli_error($conn));
        }
    }
?>