<?php
$conn = new mysqli('localhost','root','','drag_db');
if ($conn->connect_error) {
    die('Error : ('. $conn->connect_errno .') '. $conn->connect_error);
}
$array = $_POST['arrayorder'];
 
if ($_POST['update'] == "update"){
  
 $count = 1;
 foreach ($array as $idval) {
  $sql = "UPDATE drag SET listorder = " . $count . " WHERE id = " . $idval;
  if ($conn->query($sql) === FALSE) {
    echo "Error updating record: " . $conn->error;
 } 
  $count ++; 
 }
 ?>
 <!doctype html>
    <html>
        <head>
            <title></title>
            <meta name="description" content="Our first page">
            <meta name="keywords" content="html tutorial template">
        </head>
        <body>
            
        </body>
    </html>

 <?php
 echo 'Data sSaved to the database';
}
?>