<?php
include 'connect.php';
//Check for sumbit button hit with post method for all Types
if (isset($_POST['submit'])) {

    $dateregistered = date("Y-m-d H:i:s");
    $entry = $_POST["txtBody"];
    $type = $_POST['type'];
    


      $sql = "insert into `intent` (datetime,entry,type)
      values('$dateregistered','$entry','$type')";
      $result = mysqli_query($conn, $sql);
      if (!$result) {
          die(mysqli_error($conn));
      }
  




}

?>


<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inferential Futures - Your Goals</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
</head>

<body >

	    <div class="listing_details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
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

        echo "<h4>Intent History - All Types</h4><br>";					
					echo "<table>";
					echo "<tr>";
					echo "<th>Date / Time</th><th>Entry</th><th>Type</th><th>Action</th></tr>";
					for($y=0;$y<sizeof($data);$y++){
						
						echo "<tr>";
						echo "<td>" . $data[$y]["datetime"] . "</td><td>" . $data[$y]["entry"] . "</td><td> ". $data[$y]["type"] ."</td><td><a href='intent.php?id=" . $data[$y]["id"] . "&action=delete'>Delete</a></td><td><a href='getIntent.php?id=" . $data[$y]["id"] . "&action=edit'>Edit</a></td></tr>";
					
					}
					echo "</table><br><br>";

          
				

				
				for($x=0;$x<sizeof($eachIntent);$x++){
					$z=$x+1;
					echo "<div class='single_details'>";
					echo "<div id='spinner'></div>";
					echo "<h3 id='" . $z . "textHeading'>" . $eachIntent[$x]["intent"] . "</h3><br><br>";
          echo "<h4>" . $eachIntent[$x]["intent"] . " Goal Journal History </h4><br>";		
         
					echo "<table>";
					echo "<tr>";

          
				
					for($y=0;$y<sizeof($data);$y++){
					
           
            


            // populate table or indicate no history
            if($data[$y]["type"] == $eachIntent[$x]["intent"]){  // show entry
              echo "<tr>";
              echo "<th>Date / Time</th><th>Entry</th><th>Action</th></tr>";
              echo "<td>" . $data[$y]["datetime"] . "</td><td>" . $data[$y]["entry"] . "</td><td><a href='intent.php?id=" . $data[$y]["id"] . "&action=delete'>Delete</a></td><td><a href='Intent.php?id=" . $data[$y]["id"] . "&action=edit'>Edit</a></td></tr>";
            }
          
            
            }

            echo "</table><br><br>";
            // create textarea for new entry along with add button
            echo "<form name='" . $z . "form' id='" . $z . "form' method='post' action='intent.php'>";
            echo "<input id ='".$z."type' type=hidden name='type' value='" . $eachIntent[$x]['intent'] ."  '>"; 
            echo "<textarea id='".$z."txtBody' name='txtBody' rows='10' cols='40' ></textarea><br>";
            echo "<input type='submit' id='" . $z . "submit' name= 'submit' value='Submit Goal Notation'></input><br><br>";
            
            echo "</form>";
            echo "<br><br>";
            echo "</div>";
            echo "<pre>";
print_r($_POST);
echo "</pre>";
            
          }		


          if($data[$y]["type"]='Health and Fitness'){
            echo "<th>Date / Time</th><th>Entry</th><th>Action</th></tr>";
              echo "<td>" . $data[$y]["datetime"] . "</td><td>" . $data[$y]["entry"] . "</td><td><a href='intent.php?id=" . $data[$y]["id"] . "&action=delete'>Delete</a></td><td><a href='Intent.php?id=" . $data[$y]["id"] . "&action=edit'>Edit</a></td></tr>";
          }

          
					
					
						


?>


        </div>
    </div>   
    
	</div>
	</div>



	
<script>






</script>

</body>

</html>