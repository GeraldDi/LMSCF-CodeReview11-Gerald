<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
// if( !isset($_SESSION['user' ]) ) {
//  header("Location: index.php");
//  exit;
// }
// select logged-in users details
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

$resItem=mysqli_query($conn, "SELECT * FROM items");


?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome to the Admin Page- <?php echo $userRow['userEmail' ]; ?></title>
</head>
<body >
			<div style="text-align: left; font-size: 2em;">
				Current account: <b><?php echo $userRow['userName' ]; ?><b>
			</div>
           <div>Admin Page          	
           </div>
           <a href="logout.php?logout">Sign Out</a><br>

           <br>

<!--            <form 
 			action="server-side.php" 
           method= "post">
           	<div>Insert new item here:           		
           	</div>
		       <table cellspacing= "0" cellpadding="0">
		           <tr>
		               <th>Itemname</th >
		               <td><input  type="text" name="itemName"  placeholder="itemname" /></td >
		           </tr>    
		           <tr>
		               <th>Description</th>
		               <td><input  type="text" name= "itemdescription" placeholder="description"/></td>
		           </tr>
		           <tr>
		               <th>Price</th>
		               <td><input type="text"  name="price" placeholder ="10" /></td>
		           </tr>
		           <tr>
		               <td><button type ="submit">Insert item</button></td>
		               
		           </tr >
		       </table>
		   </form> -->

		<form id="myForm"  action="server-side.php" method="POST">
               <input type="text" name= "itemName" placeholder="itemName">
               <input type="text" name= "itemdescription" placeholder="itemdescription">
               <input type="text" name= "price" placeholder="10">
               <input type="submit" id ="submit">
       </form>
       <span id="message"></span>

		   <br>

           <?php

         
           if($resItem->num_rows == 0 ){
			echo "No result";
		}elseif($resItem->num_rows == 1){
			$row = $resItem->fetch_assoc();
			echo $value["itemId"]. " ----- " .$value["itemName"]. " ". $value["itemdescription"]." ".$value["price"]. " <a href='booking.php?id=".$value["item_id"]."'>Buy Here</a><br>";
		}else {
			$rows = $resItem->fetch_all(MYSQLI_ASSOC);
			foreach ($rows as $value) {
				echo $value["itemId"]. " ----- " .$value["itemName"]. " description: ". $value["itemdescription"]." price: ".$value["price"]. " <a href='server-side2.php?did=".$value['itemId']."' >Delete</a><br>";
				
			}
		}


		// if ($_POST) {
		// 	$itemId = $_POST['itemId'];
		// 	$sqld = "DELETE FROM items WHERE itemId = {$itemId}";
		// 	if($connect->query($sqld) === TRUE) {
	 //       echo "<p>Successfully deleted!!</p>" ;
		//    } else {
		//        echo "Error updating record : " . $connect->error;
		//    }
		// }



 		?>
 
       
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script>
	<script src="script-ajax.js"  type="text/javascript"></script> 
</body>
</html>
<?php ob_end_flush(); ?>