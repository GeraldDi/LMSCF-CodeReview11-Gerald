<?php
       $conn = new mysqli("localhost" , "root", "", "phpday5");
       $itemName =  $_POST['itemName'];
       $itemdescription = $_POST['itemdescription'];
       $price = $_POST['price'];
       if ($conn->query("INSERT INTO items (itemName, itemdescription, price) VALUES ('$itemName', '$itemdescription', '$price')" )) {
                echo "Successfully Inserted new Item<br>";
        } else {
                echo "Unsuccessful Insertion";
        }
?>