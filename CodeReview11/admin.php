<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user' ]) ) {
 header("Location: index.php");
 exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodeReview11 admin-page</title>

   <style type="text/css">

   </style>

</head>
<body>

	<p>Add a new pet:</p>	
		<form id="myForm"  action="server-side.php" method="POST">
               <input type="text" name= "description" placeholder="description">
               <input type="text" name= "age" placeholder="age">
               <input type="text" name= "size" placeholder="size">
               <input type="text" name= "city" placeholder="city">
               <input type="text" name= "ZIPcode" placeholder="ZIPcode">
               <input type="text" name= "address" placeholder="address">
               <input type="text" name= "name" placeholder="name">
               <input type="text" name= "image" placeholder="image">
               <input type="text" name= "website" placeholder="website">
               <input type="text" name= "hobbies" placeholder="hobbies">
               <input type="text" name= "date" placeholder="date">
               
               <input type="submit" id ="submit">
       </form>

<div class ="text-center ">
  <div class="h1 text-center m-2 text-white">List of all pets</div>
   <a href= "general.php"><button type="button" class="ml-5 bg-success">Show small+large</button></a>
   <a href= "senior.php"><button type="button" class="ml-5 bg-primary">Seniors</button></a>
   <table  border="1" cellspacing= "0" cellpadding="0" class="bg-white">
       <thead >
           <tr>
               <th>Description</th>
               <th>Age</th>
               <th>Size</th>        		              
               <th>City</th>
               <th>ZIPcode</th>
               <th>Address</th>
               <th>Name</th>
               <th>Image</th>
               <th>Website</th>
               <th>Hobbies</th>
               <th>Date</th>
               <th>Delete</th>
           </tr>
       </thead>
       <tbody>

            <?php
           $sql = "SELECT * FROM pets";
           $result = $conn->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   echo  "<tr>
                       <td>" .$row['description']."</td>
                       <td>" .$row['age']."</td>
                       <td>" .$row['size']."</td>
                       <td>" .$row['city']."</td>
                       <td>" .$row['ZIPcode']."</td>
                       <td>" .$row['address']."</td>
 					   <td>" .$row['name']."</td>
 					   <td><img width=100% src =" .$row['image']."></td>
 					   <td>" .$row['website']."</td>
 					   <td>" .$row['hobbies']."</td>
 					   <td>" .$row['date']."</td>
             <td><a href='server-side2.php?did=".$row['petID']."'>Delete</a></td>
                       
                   </tr>" ;
               }
           } else  {
               echo  "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
           }
            ?>

           
       </tbody>
   </table>
</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script>
	<script src="script-ajax.js"  type="text/javascript"></script> 

</body>
</html>
<?php ob_end_flush(); ?>