<?php
    require 'config.php';
    $query = "SELECT * FROM users";
    $result = mysqli_query($con,$query);
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="styles.css" />
    <title>Customers</title>
    <style>
        table{
            margin:40px;
            align-items:center;
            justify-content:center;
        }
        tr td{
            margin:20px
        }

    </style>

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

<div class="container">
<h2 class="text-center m-5"><b>Select User To Transfer Money.</h2>
<hr class=" w-50 " style="margin:auto">
<table class="table table-striped table-hover">
    <tr class="table-primary">
      <th scope="col">Account_no.</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Branch</th>
      <th scope="col">Current_Balance</th>
      <th scope="col"></th>
    </tr>
    <?php
         while($rows=mysqli_fetch_array($result)){
    ?>

    <tr>
        <td><?php echo $rows['Account_no'] ?></td>
        <td><?php echo $rows['Name']?></td>
        <td><?php echo $rows['Email']?></td>
        <td><?php echo $rows['Branch']?></td>
        <td><?php echo $rows['Current_Balance']?></td>
        <td><a href="transaction.php?Account_no= <?php echo $rows['Account_no'] ;?>"><button type="button" class="btn btn-primary">Transfer</button></a></td>
</tr>
<?php } ?>
</table>
</div>
</body>
</html>