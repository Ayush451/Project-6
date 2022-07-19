<?php

include 'connect.php';
include 'check_post.php';

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Intent - Ayush </title>
    <link href="/css/style.min.css" rel="stylesheet">
    
</head>

<body>


    <!-- FIRST SECTION-->
    <!--Intent History Table -->
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

                            <!-- Displaying Data from database-->
                            

                            <?php
                            $sql1 = "Select * from `intent`";
                            $query = mysqli_query($conn, $sql1);
                            while($res = mysqli_fetch_array($query)){

                            
                                echo '<tr>
                                <th scope="row">' . $res['datetime'] . '</th>
                                <td> ' . $res['entry'] . '</td>
                                <td>' . $res['type'] . '</td>
                                
                                <td>
                                    <button class= "btn btn-primary badge-pill" ><a href="edit.php?editid=' . $res['id'] . '" class="text-light" > Edit</button>
                                    <button class= "btn btn-danger badge-pill" ><a href="delete.php?deleteid=' . $res['id'] . '" class="text-light" >Delete</button>
                                </td>
                                
                            </tr>';
                                    
        
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>



<!--##################################################################################################################################-->

    <!-- SECOND SECTION ( HEALTH AND FITNESS)-->
    <section id="hero" class="bg-primary">
        <div id="questions" class="container my-4 px-4">
            <div class="mb-3">
                <h2 class="text-center p-3"> Health and Fitness </h2>
            </div>
        </div>

        <div class="container p-5">
            <div>
                <div >
                    <h5 class="card-header text-center "><span class="autotypeHF"></span></h5>
                    <div class="table-reponsive">

                        <table class="table p-3">
                            <thead class="bg-white border border-3">
                                <tr>
                                    <th scope="col">Date/Time</th>
                                    <th scope="col">Entry</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody class="bg-white border border-3 ">

                                <!-- Displaying Data from database-->
                                <?php
                                $sql1 = "Select * from `intent` where type = 'Health and Fintess'";
                                $query = mysqli_query($conn, $sql1);
                                while($res = mysqli_fetch_array($query)){

                                  
                                    echo '<tr>
                                        <th scope="row">' . $res["datetime"] . '</th>
                                        <td> ' . $res["entry"] . '</td>
                                        
                                        
                                        <td>

                                            <button class= "btn bg-warning badge-pill" name= "updateHealthandFitness"><a href="edit.php?editid=' . $res["id"]. '" class="text-light text-decoration-none" > Edit</button>
                                            <button class= "btn btn-danger badge-pill" ><a href="delete.php?deleteid=' . $res["id"]. '" class="text-light text-decoration-none" >Delete</button> 
                                        </td>
                                        
                                    </tr>';
                                }



                                /*$row = mysqli_fetch_assoc($result);
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['id'];
                                        $datetime = $row['datetime'];
                                        $entry = $row['entry'];
                                        $type = $row['type'];
                                        echo '<tr>
                                        <th scope="row">' . $datetime . '</th>
                                        <td> ' . $entry . '</td>
                                        
                                        
                                        <td>

                                            <button class= "btn bg-warning badge-pill" name= "updateHealthandFitness"><a href="edit.php?editid=' . $id . '" class="text-light text-decoration-none" > Edit</button>
                                            <button class= "btn btn-danger badge-pill" ><a href="delete.php?deleteid=' . $id . '" class="text-light text-decoration-none" >Delete</button> 
                                        </td>
                                        
                                    </tr>';
                                    }



                                }*/




                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>


        <div class="container my-5 px-5">
            <form method="POST">

                <div class="row" >
                    <div class="col-sm border border-3 border-white m-3">

                        <p class="p-5">

                                <label class="zoom-out">- What do you want to weigh? </label><br>
                                <label>- How do you want to feel?</label> <br>
                                <label>- When do you want to complete your first marathon? </label>
                        </p>



                    </div>
                    <div class="col-sm border border-3 border-white m-3">
                        <textarea type="text" class="form-control p-5 mt-3" rows="3" style="height:85%;" name="entry" autocomplete="off" " required></textarea> <br>
                </div>
                
            </div>

            <div class=" row-sm text-center p-3"> 
                    <button type=" submit" class="btn btn-success" name="HealthFitness">Submit Goal Notation</button>
            </div>

            
                   
            </form>
            </span>
        </div>
                </section>     
                
                
    <!-- THIRD SECTION ( Intellectual Life)-->                 
  <section id="hero" class="bg-white">                 
        <div id= "questions" class="container my-4 px-4">
            <div class="mb-3">
                <h2 class="text-center"> Intellectual Life </h2>
            </div>
        </div>

        <div class="container p-5">
            <div class="">
                <div>
                    <h5 class="card-header text-center "><span class="autotypeIL"></span></h5>
                    <div class="table-reponsive">

                        <table class="table p-3">
                            <thead class="bg-primary border border-3">
                            <tr>
                                <th scope="col">Date/Time</th>
                                <th scope="col">Entry</th>
                                <th scope="col">Action</th>
                                
                            </tr>
                            </thead>
                            <tbody class="bg-primary border border-3 ">
    
                            <!-- Displaying Data from database-->
                            <?php
                    
                          $sql1 = "Select * from `intent` where type = 'Intellectual Life'";
                          $query = mysqli_query($conn, $sql1);
                          while($res = mysqli_fetch_array($query)){

                            
                              echo '<tr>
                                  <th scope="row">' . $res["datetime"] . '</th>
                                  <td> ' . $res["entry"] . '</td>
                                  
                                  
                                  <td>

                                      <button class= "btn bg-warning badge-pill" name= "updateHealthandFitness"><a href="edit.php?editid=' .  $res["id"]. '" class="text-light text-decoration-none" > Edit</button>
                                      <button class= "btn btn-danger badge-pill" ><a href="delete.php?deleteid=' . $res["id"] . '" class="text-light text-decoration-none" >Delete</button> 
                                  </td>
                                  
                              </tr>';
                          }
                            ?>
                            </tbody>
                        </table>

                    </div>
        </div>
      </div>
  </div>
    
             
        <div class="container my-5 px-5">
            <form method="POST">
                
            <div class="row">  
                <div class="col-sm border border-3 border-primary m-3">
                
                    <p class="p-5">
                    
                        <label>- What or how many books would you like to read this year?  </label><br>
                        <label>- What seminars would you like to attend? </label> <br>
                        <label>- What skills would you like to attain? </label>
                        <label>- What classes would you like to take? </label>
                    
                    </p>

                
                    
                </div>      
                <div class="col-sm border border-3 border-primary m-3">
                    <textarea type="text"  class="form-control p-5 mt-3" rows="3" style="height:85%;" name="entry" autocomplete="off" " required></textarea> <br>
                    </div>

                </div>

                <div class="row-sm text-center ">
                    <button type="submit" class="btn btn-success" name="Intellectual">Submit Goal Notation</button>
                </div>



            </form>
            </span>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="typing.js"></script>


</body>

</html>