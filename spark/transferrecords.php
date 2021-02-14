<?php
    require 'config.php';
    $query = "SELECT * FROM transfers";
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
<h2 class="text-center">Transfer Records</h2><hr class=" w-25 " style="margin:auto">
<table class="table table-striped table-hover">
    <tr class="table-primary">
      <th scope="col">Transfer_id</th>
      <th scope="col">Sender</th>
      <th scope="col">Receiver</th>
      <th scope="col">Amount</th>
    </tr>
    <?php
         while($rows=mysqli_fetch_array($result)){
    ?>

    <tr>
        <td><?php echo $rows['transfer_id'] ?></td>
        <td><?php echo $rows['sender']?></td>
        <td><?php echo $rows['receiver']?></td>
        <td><?php echo $rows['amount']?></td>
</tr>
<?php } ?>
</table>
</div>
</body>
</html>