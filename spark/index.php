<?php
   include('config.php');
?>



<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Basic Banking System</title>
    <link rel="stylesheet" href="styles.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <nav>
      <div class="logo">
        <img src="images/bank-logo-design-ideas-3.jpg" alt="" />
      </div>
      <div class="navbaritems">
        <div><a href="#" style="font-size:25px">HOME</a>&nbsp;
        <a href="viewcustomers.php" style="font-size:25px">CUSTOMERS</a>&nbsp;
        <a href="transferrecords.php" style="font-size:25px">TRANSFERS</a>&nbsp;</div>
      </div>
    </nav>
    <section class="body">
      <div class="items">
        <h1>Money Transfer Made Easy.</h1>
        <a href="viewcustomers.php"><button class="btn btn-primary">Transfer Money</button></a>
        <a href="transferrecords.php"><button class="btn btn-primary">View Transactions</button></a>
      </div>
    </section>
  </body>
</html>
