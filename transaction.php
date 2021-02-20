<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Basic Banking System</title>
    <link rel="stylesheet" href="styles.css" />

  </head>
  <style>
    .container {
        background-color: rgb(153, 206, 255);
        margin-top:100px;
        padding:30px;
    }
  </style>
  <body>

  <nav>
      <div class="logo">
        <img src="images/bank-logo-design-ideas-3.jpg" alt="" />
      </div>
      <div class="navbaritems" style="margin-left:50%">
        <div><a href="index.php" style="font-size:25px">HOME</a>&nbsp;
        <a href="viewcustomers.php" style="font-size:25px">CUSTOMERS</a>&nbsp;
        <a href="transferrecords.php" style="font-size:25px">TRANSFERS</a>&nbsp;</div>
      </div>
    </nav>

    <div class="container">
        <h2 class="text-center"><b>Proceed with your transaction...</b></h2><hr class=" w-50 " style="margin:auto">

        <?php
            include 'config.php';
            $sid = $_GET['Account_no'];
            $sql = "SELECT * FROM  users where Account_no=$sid";
            $query= mysqli_query($con,$sql);
            if(!$query)
                {
                    echo "Error ".$sql."<br/>".mysqli_error($con);
                }
                $rows=mysqli_fetch_array($query);
        ?>

        <form action="transfer.php" method="post" >
                <label for="">SENDER:</label><br>
                <input type="text" class="form-control" id="sender" name="sender" value="<?php echo $rows['Name'] ?>"><br>
                <!-- <div>
                <table class="table table-striped ">
                    <tr>
                        <th scope="col">Account_no</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Amount</th>
                    </tr>
                    <tr>
                        <td><?php echo $rows['Account_no'] ?></td>
                        <td><?php echo $rows['Name'] ?></td>
                        <td><?php echo $rows['Email'] ?></td>
                        <td><?php echo $rows['Current_Balance'] ?></td>

                    </tr>
                </table>
                </div> -->
                <label for="">RECEIVER:</label><br>
                <select name="receiver"   class="form-control"  id="receiver" required>
                    <option value=""  selected></option>
                    <?php
                include 'config.php';
                $sid=$_GET['Account_no'];
                $sql = "SELECT * FROM users where Account_no!=$sid";
                $query=mysqli_query($con,$sql);
                if(!$query)
                {
                    echo "Error ".$sql."<br/>".mysqli_error($con);
                }
                while($rows = mysqli_fetch_array($query)) {
            ?>
                <option class="table text-center table-striped table-dark"  >

                    <?php echo $rows['Name'] ;?>
                </option>
            <?php
                }
            ?>

                </select><br>
                <label for="">Amount:</label>
                <input type="number" id="amount" name="amount" class="form-control" name="amount" min="100" required> <br><br>
                <div class="text-center btn3" >
            <button class="btn btn-primary" name="transfer" type="transfer" id="transfer">Proceed</button>
            <div class="display"></div>
            </div>
        </form>
    </div>
>

    


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>