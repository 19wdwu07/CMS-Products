
<?php
    date_default_timezone_set('Pacific/Auckland');
     $dbc = mysqli_connect("localhost", "root", "root", "Products");

    //$dbc = mysqli_connect(getenv('DB_HOST'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'), getenv('DB_TABLE'));

    if($dbc){
        var_dump('we are connected');
        $dbc->set_charset('utf8mb4');

    } else {
        die('ERROR, connection could not be made to the
        database, please check your enviroment variables
        in your .env file. There is an example provided if
        you do not have one. Please go check the Readme.md
        for install instructions');
    }

 ?>
 <?php
 //  /Applications/MAMP/Library/bin/mysqladmin -u root -p password <NEWPASSWORD>
 // c:\wamp\apps\phpmyadmin4.1.14\phpmyadmin.conf
 $servername = "localhost";
 $username = "root";
 $password = "root";
 $dbname = "Products";
 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
 echo "Connected...<br>";
 // Check connection
 if ($conn->connect_error) {
 die ("Connection failed: " . $conn->connect_error);
 }

  ?>
