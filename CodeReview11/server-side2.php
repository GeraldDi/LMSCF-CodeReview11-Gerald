<?php
    $conn = new mysqli("localhost" , "root", "", "cr11_gerald_petadoption");
    if(isset($_GET['did'])) {

        	$delete_id = mysqli_real_escape_string($conn,$_GET['did']);
        if ($conn->query("DELETE FROM pets WHERE petID = '".$delete_id."'" )){
        	//redirect to admin page
        	header("Location: admin.php");
            echo "<span>deleted successfully...!!</span>";
        
    
        } else {
            echo "ERROR";
        }
}
?>