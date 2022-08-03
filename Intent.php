<?php

include 'connect.php';


//Delete button
if(isset($_GET["action"]) == TRUE AND $_GET["action"] == "delete"){
  $entry=$_GET["id"];
  $sql="DELETE FROM `intent` WHERE id= ". $entry . "";	
  $result=$conn->query($sql);
  }


 

//Check for sumbit button hit with post method for all Types
if(isset ($_POST['type']) > 0 ){
	
  $type=$_POST["type2"];
  $dateregistered = date("Y-m-d H:i:s");
  $entry=$_POST["txtBody"];
  $sql="INSERT INTO " . $dbname . ".intent (datetime, type, entry) VALUES ('$dateregistered','$type','$entry')";
  $result=$conn->query($sql);
  }
  $conn->close();


 
  ?>




<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inferential Futures - Your Goals</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	
</head>

<body >

    <div class="container p-2">
        <div class="jumbotron">
            <div class="card">
                <h5 class="card-header">Intent History - All Types</h5>
                <div class="card-body">

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Date/Time</th>
                                <th scope="col">Entry</th>
                                <th scope="col">Type</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                require ("connect.php");
                                $sql="SELECT * FROM " . $dbname . ".intent_headings";
                                $result=$conn->query($sql);

                                $eachIntent=[];
                                $x=0;
                                while($row=$result->fetch_assoc()){
                                    $eachIntent[$x] = $row;
                                    $x=$x+1;
                                }
                                
                                $sql="SELECT * FROM " . $dbname . ".intent  ";
                                $result=$conn->query($sql);
                                $data=[];
                                $y=0;
                                while($row=$result->fetch_assoc()){
                                    $data[$y] = $row;
                                    $y=$y+1;
                                }
                        
                                $conn->close();

                    
                                for($y=0;$y<sizeof($data);$y++){
                                
                                echo "<tr>";
                                echo "<td>" . $data[$y]["datetime"] . "</td><td>" . $data[$y]["entry"] . "</td><td> ". $data[$y]["type"] ."</td><td> <button><a href='intent.php?id=" . $data[$y]["id"] . "&action=delete'>Delete</a></button>   <button><a href='edit.php?id=" . $data[$y]["id"] . "&action=edit&type=". $data[$y]["type"] ."'>Edit</a></button></td></tr>";
                                
                                }
                                ?>

                        </tbody>
                    </table>

                </div>






                
            </div>
            <div class="card-body">                  
            <section id="hero" class="bg-light"> 
                                
                                <?php
                              for($x=0;$x<sizeof($eachIntent);$x++){
                                $z=$x+1;
                                ?>  
                                <div id="questions" class="container my-4 px-4">
                                    <div class="mb-3">
                                        <h2 class="text-center p-3" id= <?php echo '" . $z . "textHeading'?>>  <?php echo $eachIntent[$x]["intent"] ?> </h2>
                                        
                                    </div>
                                </div>
                    
                    
                                <div id="questions" class="container my-4 px-4">
                                    <div class="mb-3">
                                        <h4 class="text-center"><?php  $eachIntent[$x]["intent"]?> Goal Journal History</h4>
                                        <table class="table table-striped table-hover">
                                        
                                        <thead class="bg-primary text-white">
                                            <tr>
                                            <th scope="col">Date/Time</th>
                                            <th scope="col">Entry</th>
                                            <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <?php
                                            
                                            for($y=0;$y<sizeof($data);$y++){
                                                // populate table or indicate no history
                                                if($data[$y]["type"] == $eachIntent[$x]["intent"]){  // show entry
                                                 
                                    
                                                    echo "<td>" . $data[$y]["datetime"] . "</td><td>" . $data[$y]["entry"] . "</td><td> <button><a href='intent.php?id=" . $data[$y]["id"] . "&action=delete'>Delete</a></button>  <button ><a href='edit.php?id=" . $data[$y]["id"] . "&action=edit&type=". $data[$y]["type"] ."'>Edit</a></button></td></tr>";
                                                    ?>
                                                    <?php
                                                }
                                                }
                                            
                                            
                                            
                                            ?>
                    
                                            </tr>
                                      
                                        </table>
                    
                                        
                                    </div>
                                </div>
                                
                                        <div class="container my-5 px-5">
                                            <div class="col-sm  text-center p-4">
                                                <?php echo '<img height="350" width="850" src="data:image;base64,'.base64_encode($eachIntent[$x]["images"]).'">';?>

                                            </div>

                                        </div>
                               
                             
                    
                                    <div class="container my-5 px-5">
                                        <form name= <?php '" . $z . "form'?> id= <?php '" . $z . "form'?> method="POST" action='intent.php'>
                    
                                            <div class="row" >
                                                <div class="col-sm border border-3 border-primary m-3">
                    
                                                    <p class="p-5">
                    
                                                            <label id= <?php '" . $z . "textHeading'?>> <?php echo $eachIntent[$x]["questions"] ?> </label>
                                                    </p>
                    
                    
                    
                                                </div>
                                                <div class="col-sm border border-3 border-primary m-3">
                    
                                                    <?php 
                                                    echo "<input type=hidden name='type' value='" . $z . "'>"; 
                                                    echo "<input type=hidden name='type2' value='" . $eachIntent[$x]['intent'] . "'>"; ?>
                    
                                                    <textarea id= "txtBody" type="text" class="form-control p-5 mt-3" rows="3" style="height:85%;" name="txtBody" autocomplete="off" " required></textarea> <br>
                                            </div>
                                            
                                        </div>
                    
                                        <div class=" row-sm text-center p-3"> 
                                                <button   
                                                id= <?php '" . $z . "txtsubmit' ?>
                                                name= <?php '" . $z . "txtsubmit'?>
                                                type=" submit" class="btn btn-success" >Submit Goal Notation</button>
                                        </div>
                                        </form>  


                                        
                                        <div class="border-top my-3"></div>
                                    </div>    
                                    
                    
                                <?php
                                
                               
                            
                                
                                
                              }	?>
                    
                            
                    
                            </section>



                            
                            </div>       

        </div>


    </div>
	
        


	

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>



</body>

</html>