<?php
    $conn = new mysqli("localhost" , "root", "", "phpday5");
    if(isset($_GET['did'])) {
    // $delete_id = mysqli_real_escape_string($conn,$_GET['did']);
    // $sql = mysqli_query($conn,"DELETE FROM items WHERE itemId = '".$delete_id."'");
    // if($sql) {

    	$delete_id = mysqli_real_escape_string($conn,$_GET['did']);
    if ($conn->query("DELETE FROM items WHERE itemId = '".$delete_id."'" )){
    	//redirect to main page
    	header("Location: index.php");
        echo "<span>deleted successfully...!!</span>";
        
    
    } else {
        echo "ERROR";
    }
}
?>