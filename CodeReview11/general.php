<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page

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
    <meta charset="utf-8">
    <title>CodeReview 11 general</title>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
  $(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resuldivropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resuldivropdown.html(data);
            });
        } else{
            resuldivropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>

   <style type="text/css">
       .manageUser {
           width : 50%;
           margin: auto;
       }

   </style>

</head>
<body>


<div class ="text-center ">
  <div class="bg-primary pb-3">
      
    <div class="h1 text-center m-2">List of all pets</div>
    <a href= "home.php"><button type="button" class="ml-5 bg-success">Show all pets</button></a>
     <a href= "general.php"><button type="button" class="ml-5 bg-success">Show small+large</button></a>
     <a href= "senior.php"><button type="button" class="ml-5 bg-warning">Seniors</button></a>
     <a href= "logout.php"><button type="button" class="ml-5 bg-secondary">Logout</button></a>

    <div class="search-box pt-3">
          <input type="text" autocomplete="off" placeholder="Search all pets..." />
          <div class="result"></div>
      </div>
    </div>

   <div>
       <div>     
       <div class="row">

            <?php
           $sql = "SELECT * FROM pets where size='large'or size='small'";
           $result = $conn->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   echo  "<div class='row col-lg-6 col-sm-6'>
                   <div class='col-lg-6 col-sm-12'><img width=100% src =" .$row['image']."></div>
                   <div class='col-lg-3 col-sm-6'>
                                
                       <div class='col-lg-6 col-sm-12'>" .$row['description']."</div>                       
                       <div class='col-lg-6 col-sm-12'>Name:" .$row['name']."</div>
                       <div class='col-lg-6 col-sm-12'>Age:" .$row['age']."</div>
                       <div class='col-lg-6 col-sm-12'>Type:" .$row['size']."</div>
                       <div class='col-lg-6 col-sm-12'>City:" .$row['city']."</div>
                       <div class='col-lg-6 col-sm-12'>ZIP-code" .$row['ZIPcode']."</div>
                       <div class='col-lg-6 col-sm-12'>Address:" .$row['address']."</div>
                       <div class='col-lg-6 col-sm-12'><a href=".$row['website'].">Website</a></div>
                       <div class='col-lg-6 col-sm-12'>Hobbies:" .$row['hobbies']."</div>

                       </div> 
                       <div  class='col-lg-3 col-sm-6' id=map".$row['petID'].">lat:".$row['lat']." lng:".$row['lng']." map should be here</div>
                       <div  class='col-lg-6 col-sm-12' style='visibility: hidden' id=test".$row['petID'].">".$row['lat'].$row['lng']."</div>
                      
                   </div>" ;
               }
           } else  {
               echo  "<div><div colspan='5'><center>No Data Avaliable</center></div></div>";
           }
            ?>    
       </div>
</div>
    <script>

               function initMap() {
                   var mlocation = {
                       lat: 48.20849,
                       lng: 16.37208
                   };

                   for (var i = 1; i <= 4; i++) {
                    //when I add more than 5 I get an error and it does not add any further maps -> So I can't set i<=12

                 //   ltest=document.getElementById('test'+[i]);
                 //  iltest=(ltest.innerHTML); 
                 // lattest= iltest.slice(0,7);
                 //  lngtest=iltest.slice(7,14);
                 //  console.log(lattest+"  "+lngtest);
                 

                  //it does not accept values of lattest despite accepting the direct numbers 
                   // var mlocation = {
                   //     lat:48.20849,
                   //     lng: 16.37208
                   // };

                   // var xlocation ={
                   //     lat: lattest,
                   //     lng: lngtest
                   // };
                   // console.log("x:"+xlocation.lat);
                   // console.log("m:"+mlocation.lat);


                   map = new google.maps.Map(document.getElementById('map'+[i]), {
                       center: mlocation,
                       zoom: 8
                   });
                   var pinpoint = new google.maps.Marker({
                       position: mlocation,
                       map: map
                   });
                   }
               }

           </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap"
     async defer>
    </script>

</body>
</html>