<?php
    include 'db.php';

    $bookId    	= $_GET['bookId'];
    $query  = "SELECT * FROM tbl_64_books where book_id = $bookId;";
    $result = mysqli_query($connection , $query);
    if(!$result)
    {
        die("DB query failed !");
    }else
    {
        $row = mysqli_fetch_assoc($result);
    }

?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">  
            <title>book page</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>		<!-- <link href="includes/style.css" rel="stylesheet"> -->
            <link rel="stylesheet" href="css/style.css">
            
    </head>
    <body>
    <div id="container">
        <?php
            
            echo ' <section>
                        <h5 class="card-title"> '. $row["book_name"] .'</h5>
                        <br>
                        <img class="book_img" src="'. $row["book_cover"] .'" alt="'. $row["book_name"] . '">
                        <h4> Author : '. $row["auther_name"] .'</h4>
                        <p class="card-text"><b>description : </b>'. $row["description"] .'</p>
                        <h4>Price :  '. $row["price"] .' NIS</h4>
                        <h4>Category :  '. $row["category"] .'</h4>
                        
                <a class="btn btn-primary backbtn" href="index.php" role="button">Back </a>
                    </section>';
                    ?>
                        <?php 

            mysqli_free_result($result);

        ?>
    </div>
    </body>
</html>

