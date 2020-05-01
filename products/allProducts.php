<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("../templates/header.php");

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

$sql = "SELECT id, name, category, price FROM Stock";
$result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     // output data of each row
//     echo  "Id" . "   " . "Name" . "     " . "Category" ."    " . "Price" ;
//     while($row = $result->fetch_assoc()) {
//         echo  $row["id"]. "     " . $row["name"]. "     " . $row["category"]. "    ". $row["price"] . "<br>";
//     }
// } else {
//     echo "0 results";
// }
$conn->close();
?>


<div class="container">
<div class="row mb-2">
   <div class="col">
       <h1>All Products</h1>
   </div>
</div>

<div class="row mb-2">
   <div class="col">
       <a class="btn btn-outline-primary" href="products/addProduct.php">Add new Product</a>
   </div>
</div>

<div class="row d-flex">

   <?php if($result): ?>

       <?php foreach($result as $singleProduct): ?>

           <div class="col-12 col-md-3 pb-3">
               <div class="card mb-4 shadow-sm h-100">
                   <img class="card-img-top" src="../images/whiteBread.jpeg" alt="Product Image">
                   <div class="card-body">

                       <p class="card-text"><?php echo $singleProduct['name']; ?></p>
                       <p class="card-text"><?php echo "Category: " , $singleProduct['category']; ?></p>
                       <p class="card-text"><?php echo "Price : $" , $singleProduct['price']; ?></p>
                       <div class="d-flex justify-content-between align-items-center">
                           <div class="btn-group">
                               <a href="singleProduct.php?id=<?php echo $singleProduct['id']; ?>" class="btn btn-sm btn-outline-info">View</a>
                               <a href="products/addProduct.php?id=<?php echo $singleProduct['id']; ?>" class="btn btn-sm btn-outline-secondary">Edit</a>


                           </div>
                       </div>
                   </div>
               </div>
           </div>
       <?php endforeach; ?>
   <?php else: ?>
       <div class="col-12">
           <p>Sorry, there aren't any products in the library right now.</p>
       </div>
   <?php endif; ?>
</div>
</div>

<?php require('../templates/footer.php'); ?>
