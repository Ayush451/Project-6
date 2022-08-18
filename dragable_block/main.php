<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Intent Prototype</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">
$(document).ready(function(){  
   function slideout(){
  setTimeout(function(){
  $("#response").slideUp("slow", function () {
 });
 }, 2000);
 }
  
   $("#response").hide();
   $(function() {
  $("#list .row").sortable({ opacity: 0.8, cursor: 'move', update: function() {
    var order = $(this).sortable("serialize") + '&update=update';
    $.post("updateList.php", order, function(theResponse){
  $("#response").html(theResponse);
  $("#response").slideDown('slow');
  slideout();
    });                
   }         
    });
   });
 
}); 
</script>
</head>
    <body>
        <div id="container" class="container col col-lg-5">
            <div id="list" >
                <div id="response" > </div>
                <h1 class="text-center"> Drag and drop the Order of your preferable Intent </h1>
                    <div class="row container p-5 p-2 bg-light border" >
                        <?php
                            $conn = new mysqli('localhost','root','','drag_db');
                            if ($conn->connect_error) {
                                die('Error : ('. $conn->connect_errno .') '. $conn->connect_error);
                            }
                            $results = $conn->query("SELECT id, intent, listorder FROM drag ORDER BY listorder ASC");
                            while($row = $results->fetch_assoc()) {
                            $id=$row['id'];
                            $num=$row['listorder'];
                            $intent=$row['intent'];
                         ?>         
                                    <div class=" flex text-center justify-content-around p-3 mb-3 bg-info rounded" 
                                    id="arrayorder_<?php echo $id ?>" > <?php echo $intent; ?>
                                    
                                   

                                    <div class="clear"></div>
                                
                                
                            </div>
                        <?php } ?>
                            </div>
                </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>

