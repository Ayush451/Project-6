<!doctype html>
<html>
    <head>
        <title>Intent - prototype</title>
        <meta name="description" content="Our first page">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    </head>
    <body>

    <?php 
    $conn = new mysqli('localhost','root', '', 'drag_db');
    if ($conn->connect_error) {
            die('Error : ('. $conn->connect_errno .') '. $conn->connect_error);
        }
        $results = $conn->query("SELECT id, text FROM dragdrop ORDER BY listorder ASC");
            while($row = $results->fetch_assoc()) {
            $id=$row['id'];
            $text=$row['text'];
            }
    ?>
        <div class="container">
            <div class="row">
                <div class="col border border-red m-4 p-5"> 
                    <p class="flex justify-text text-center fs-3 text">Health and Fitness</p>
                </div>
                <div class="col border border-green m-4 p-5">
                <p class="flex justify-text text-center fs-3 text">Social Life</p>
                </div>
                <div class="col border border-green m-4 p-5">
                <p class="flex justify-text text-center fs-3 text">Emotional Life</p>
                </div>

            </div>

            <div class="row">
                <div class="col border border-red m-4 p-5"> 
                    <p class="flex justify-text text-center fs-3 text">Health and Fitness</p>
                </div>
                <div class="col border border-green m-4 p-5">
                <p class="flex justify-text text-center fs-3 text">Social Life</p>
                </div>
                <div class="col border border-green m-4 p-5">
                <p class="flex justify-text text-center fs-3 text">Emotional Life</p>
                </div>
            </div>
        </div>





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>

