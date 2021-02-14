<?php
    include "config.php";
    session_start();
  if(isset($_POST['transfer'])){
    $sender= $_POST['sender'];
    $receiver = $_POST['receiver'];
    $amount=  $_POST['amount'];
  }
  $flag=false;
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Basic Banking System</title>
    <link rel="stylesheet" href="styles.css" />

  </head>

  <body>

  <nav>
      <div class="logo">
        <img src="images/bank-logo-design-ideas-3.jpg" alt="" />
      </div>
      <div class="navbaritems">
        <div><a href="index.php" style="font-size:25px">HOME</a>&nbsp;
        <a href="viewcustomers.php" style="font-size:25px">CUSTOMERS</a>&nbsp;
        <a href="transferrecords.php" style="font-size:25px">TRANSFERS</a>&nbsp;</div>
      </div>
    </nav>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

<?php

    $sql = "SELECT Current_Balance FROM users WHERE Name='$sender'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
       if($amount>$row["Current_Balance"] or $row["Current_Balance"]-$amount<100){
          echo "<script>swal( 'Transaction Failed:(','Insufficient Balance!','error' ).then(function() { window. location = 'transferrecords.php'; });;</script>";
         
       }
      else{
          $sql = "UPDATE `users` SET Current_Balance=(Current_Balance-$amount) WHERE Name='$sender'";
          
      
      if ($con->query($sql) === TRUE) {
        $flag=true;
      } else {
        echo "Error updating record: " . $conn->error;
      }
       }
       
        }
      } else {
        echo "0 results";
      } 
      if($flag==true){
        $sql = "UPDATE `users` SET Current_Balance=(Current_Balance+$amount) WHERE Name='$receiver'";
        
        if ($con->query($sql) === TRUE) {
          $flag=true;  
          
        } else {
          echo "Error updating record: " . $con->error;
        }
        }
        if($flag==true){
        $sql = "INSERT INTO `transfers` (`transfer_id`, `sender`, `receiver`, `amount`) VALUES ('', '$sender','$receiver','$amount')";
        echo "<script>alert('Transaction Successfull');</script>";
        header("location:viewcustomers.php");
        if ($con->query($sql) === TRUE) {
        } else 
        {
          echo "Error updating record: " . $con->error;
        }
        }
        
        if($flag==true){
        
        }

?>