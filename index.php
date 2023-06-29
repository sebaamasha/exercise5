
<?php
include 'db.php';

if(isset($_GET["category"])){
 $cat = $_GET["category"];
  if($cat==='"All"'){
    $query 	= "SELECT * FROM tbl_64_books";
  }else
  {
    $query  = "SELECT * FROM tbl_64_books where category = $cat;";

  }
    }else{
    $query  = "SELECT * FROM tbl_64_books ;";

    }

$result = mysqli_query($connection , $query);

if(!$result)
{
    die("DB query failed !");
}

?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">  
        <title>Seba's books recommedations</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h1> Books Recommendations </h1>
        <div id="wrapper">
       <?php
        echo '<div class="row">';
        while($row = mysqli_fetch_assoc($result))
        {
            
            $img = $row["book_cover"];
           
          echo '<div class="book">
             <div> <img class="card-img-top" src="'. $img .'" alt="'. $row["book_name"] . '"> </div>
               <div>
               <h5>'. $row["book_name"] . '</h5>
               <p>'. $row["description"] . '</p>
           </div>
               <b> price : '. $row["price"] .' NIS </b><br>
              <div> <a href="book_page.php?bookId='.$row["book_id"].'" class="btn btn-primary">book page</a></div>
         </div>';
        }

        ?>
        </div>
    </body>
</html>