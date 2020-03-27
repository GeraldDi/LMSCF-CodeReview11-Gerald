<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user' ]) ) {
 header("Location: index.php");
 exit;
}
if ( isset($_SESSION['admin' ])) {
 header("Location: admin.php");
 exit;
}
// select logged-in users details
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

$resItem=mysqli_query($conn, "SELECT * FROM pets");


?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodeReview10 index</title>

   <style type="text/css">
       .manageUser {
           width : 50%;
           margin: auto;
       }

        table {
           width: 100%;
            margin-top: 20px;
       }
       /*body{
        background-image: url('https://cdn.urlaubsguru.at/wp-content/uploads/2018/06/shutterstock_659133262.jpg')
       }*/

   </style>

</head>
<body>

<div class ="text-center ">
  <div class="h1 text-center m-2 text-white">List of all pets</div>
   <a href= "general.php"><button type="button" class="ml-5 bg-success">Show small+large</button></a>
   <a href= "senior.php"><button type="button" class="ml-5 bg-primary">Seniors</button></a>
   <table  border="1" cellspacing= "0" cellpadding="0" class="bg-white">
       <thead >
           <tr >
               <th>Description</th>
               <th>Image</th>
               <th>Name</th>
               <th>Age</th>
               <th>Size</th>
               <th>City</th>
               <th>ZIP-code</th>
               <th>Address</th>
               <th>Website</th>
               <th>Hobbies</th>
           </tr>
       </thead>
       <tbody>

            <?php
           $sql = "SELECT * FROM pets where size='small' or size='large'";
           $result = $conn->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   echo  "<tr>
                       <td>" .$row['description']."</td>
                       <td><img width=100% src =" .$row['image']."></td>
                       <td>" .$row['name']."</td>
                       <td>" .$row['age']."</td>
                       <td>" .$row['size']."</td>
                       <td>" .$row['city']."</td>
                       <td>" .$row['ZIP-code']."</td>
                       <td>" .$row['address']."</td>
                       <td>" .$row['website']."</td>
                       <td>" .$row['hobbies']."</td>
                       
                   </tr>" ;
               }
           } else  {
               echo  "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
           }
            ?>

           
       </tbody>
   </table>
</div>

</body>
</html>