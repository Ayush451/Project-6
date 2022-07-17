
<?php
include 'connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intent</title>
    <link href="/css/style.min.css" rel="stylesheet">

</head>
<body>


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
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                <?php
                   $sql1="Select * from `intent`";
                   $result = mysqli_query($conn,$sql1);

                   $row=mysqli_fetch_assoc($result);
                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['id'];
                            $datetime = $row['datetime'];
                            $entry = $row['entry'];
                            $type = $row['type'];
                            echo '<tr>
                            <th scope="row">'.$datetime.'</th>
                            <td> '.$entry.'</td>
                            <td>'.$type.'</td>
                            
                            <td><button class= "btn btn-danger badge-pill" ><a href="delete.php?deleteid='.$id.'" class="text-light" >Delete</button></td>
                            <td><button class= "btn btn-primary badge-pill" > Edit</button></td>
                        </tr>';

                        }
                    }
                ?>

                <!--<tr>
                    <th scope="row">2022-07-07 <br>15:35:50</th>
                    <td><p>85Kg</p> <p>I want to feel leaner with more muscle mass.</p> <p>I want to complete my first marathon by 14th June 2023.</p></td>
                    <td>Intellectual Life</td>
                    <td><button class= "btn btn-danger badge-pill" > Delete</button></td>
                    <td><button class= "btn btn-primary badge-pill" > Edit</button></td>
                </tr>
                <tr>
                    <th scope="row">2022-07-07 <br>15:35:50</th>
                    <td><p>85Kg</p> <p>I want to feel leaner with more muscle mass.</p> <p>I want to complete my first marathon by 14th June 2023.</p></td>
                    <td>Intellectual Life</td>
                    <td><button class= "btn btn-danger badge-pill" > Delete</button></td>
                    <td><button class= "btn btn-primary badge-pill" > Edit</button></td>
                </tr> -->
                </tbody>
              </table>

            </div>
        </div>
      </div>
  </div>


</body>
</html>