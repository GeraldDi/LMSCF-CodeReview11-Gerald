<?php
       $conn = new mysqli("localhost" , "root", "", "cr11_gerald_petadoption");
       $description =  $_POST['description'];
       $age = $_POST['age'];
       $size = $_POST['size'];
       $city = $_POST['city'];
       $ZIPcode = $_POST['ZIPcode'];
       $address = $_POST['address'];
       $name = $_POST['name'];
       $image = $_POST['image'];
       $website = $_POST['website'];
       $hobbies = $_POST['hobbies'];
       $date = $_POST['date'];
 
//ich habe beim if das date weggelasen da es möglicherweise deshalb einen error gibt

       if ($conn->query("INSERT INTO pets (description, age, size, city, ZIPcode,address,name,image,website,hobbies) VALUES ('$description', '$age', '$size', '$city', '$ZIPcode', '$address', '$name', '$image', '$website', '$hobbies')" )) {
                echo "Successfully Inserted new Item<br>";
        } else {
                echo "Unsuccessful Insertion";
        }
?>