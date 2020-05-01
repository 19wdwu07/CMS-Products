<?php

    // require('../templates/header.php');

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

  // require("../templates/header.php");
   // echo $singleProduct['id'];
    $servername = "localhost";
    $username = "";
    $password = "";
    $dbname = "Products";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $productID = $_GET['id'];

    // $sql = "SELECT * FROM `books` WHERE _id = $bookID";
    $sql = "SELECT id, name, category, price FROM Stock WHERE id=" . $productID ;
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        // output data of each row
      //  echo  "Id" . "   " . "Name" . "     " . "Category" ."    " . "Price" ;

      foreach($result as $row){
        //echo $row['name'];
      }

    } else {
        echo "0 results";
    }

?>
<div class="container">
<div class="row mb-2">
            <div class="col">
                <h1><?php echo $row['name']; ?></h1>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col">
                <a class="btn btn-outline-primary" href="">Edit</a>
                <button class="btn btn-outline-danger" type="button" name="button" data-toggle="modal" data-target="#confirmModal">Delete</button>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-12 col-sm-4 align-self-center">
                <img class="img-fluid" src="../images/whiteBread.jpeg" alt="">
            </div>
            <div class="col-12 col-sm-8 align-self-center">
                <h3><?php echo $row['name']; ?></h3>
                <h5><?php echo "category: " . $row['category']; ?></h5>
                <h4><?php echo "Price $" . $row['price']; ?></h4>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-12">
                <!-- <p><?php //echo $singleProduct['specification']; ?></p> -->
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete <?php echo $row['name']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <form action="delete.php" method="post">
                        <input type="hidden" name="prodcutID" value="<?php echo $row['id']; ?>">
                        <button type="submit" class="btn btn-danger">Confirm Delete</button>
                    </form>

                </div>
            </div>
        </div>

<?php require('../templates/footer.php'); ?>
</div>
