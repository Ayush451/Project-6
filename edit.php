<?php
include 'connect.php';
$id =$_GET['editid'];
$sql= "Select * from `intent` where id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$entry = $row['entry'];

/*if(isset($id)){
    $id =$_GET['editid'];  
    $query = "SELECT * FROM intent WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run)>0){
        foreach($query_run as $row){
            echo $row['entry'];
        }
    }
    else{
        echo "No Record Found";
    }
}*/


//Edit button is clicked
if(isset($_POST['edit'])){

$dateregistered = date("Y-m-d H:i:s");
$entry = $_POST['entry'];
$type = 'Health and Fintess';


// Updating Data 
$sql = "update `intent` set id = $id, datetime='$dateregistered',entry='$entry',type='$type'
where id='$id'";

$result = mysqli_query($conn, $sql);
    if($result){
        header('location: intent.php');
    }else{
        die(mysqli_error($conn));
    }
}

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
<section>
    <div class= "card-header p-5">
   

    <div class="container my-5 px-5">
        <div class="mb-3">
            <h2 class="text-center"> EDIT - Health and Fitness </h2>
        </div>
    </div>
    

    <div class="container my-5 px-5">
            <form method="POST">
                
                <div class="row">  
                    <div class="col-sm border border-3 border-primary m-3">
                    
                        <p class="p-5">
                        
                            <label>- What do you want to weigh? </label><br>
                            <label>- How do you want to feel?</label> <br>
                            <label>- When do you want to complete your first marathon? </label>
                        
                        </p>

                    </div>      
                    <div class="col-sm border border-3 border-primary m-3">
                        <input type="text"  class="form-control p-5 mt-3" value= "<?php echo $entry?>" rows="10" style="height:85%;" name="entry" autocomplete="off" required> <br>
                    </div>

                </div>

                <div class="row-sm text-center ">
                    <button type="submit" class="btn btn-primary" name="edit">Update</button>      
                </div>



            </form>
            </span>
        </div>
</div>
</section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>