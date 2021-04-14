<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Transfer</title>
    <link href="css/money_trans.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
    
<?php
  $connection = mysqli_connect("localhost", "root", "", "grip") or die("Can't connect");
  if (isset($_POST['submit'])) {
    $trans_from = $_POST['from'];
    $trans_to = $_POST['to'];
    $trans_amount = $_POST['Amount'];

    $self = "SELECT * FROM Users WHERE USER_ID = $trans_from";
    $resultf = mysqli_query($connection, $self);
    $user_fr = mysqli_fetch_assoc($resultf);

    $selt = "SELECT * FROM Users WHERE USER_ID = $trans_to";
    $resultt = mysqli_query($connection, $selt);
    $user_to = mysqli_fetch_assoc($resultt);

    if ($trans_amount < 0) {
  ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <?php
    }
    if ($trans_amount == 0) {
    ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <strong>WARNING!</strong> Please enter a non - zero positive transfer amount!
      </div>
    <?php
    }
    if ($trans_amount > $user_fr['Balance']) {
    ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <strong>WARNING!</strong> Sender does not have sufficient balance!
      </div>
      <?php
    } 
    else if(($trans_amount>0)&&($trans_amount<$user_fr['Balance'])){
      $new = $user_fr['Balance'] - $trans_amount;
      $sql = "UPDATE `Users` SET `Balance` = $new WHERE `Users`.`User_ID` = $trans_from";
      $execute = mysqli_query($connection, $sql);

      $new = $user_to['Balance'] + $trans_amount;
      $sql = "UPDATE `Users` SET `Balance` = $new WHERE `Users`.`User_ID` = $trans_to";
      $execute = mysqli_query($connection, $sql);

      $sendername = $user_fr['Name'];
      $recname = $user_to['Name'];
      $insert = "INSERT INTO `Transactions`(`Sno`, `Sender`, `Reciever`, `Amount`) 
    VALUES(NULL,'{$sendername}','{$recname}','{$trans_amount}')";
      $execute = mysqli_query($connection, $insert);
      if ($execute) {
      ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
          <strong>SUCCESSFUL!</strong> Money has been transferred!
        </div>
  <?php
      }
      $new = 0;
      $trans_amount = 0;
    }
  }
  ?>

    <section id="navbar">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
            <div class="container-fluid">
              <a class="navbar-brand " href="#">TSF Banking</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item ">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="create_user.php">Create User</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="view_users.php">View Users</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="money_trans.php">Money Transfer</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="trans_his.php">Transaction History</a>
                  </li>
                </ul>
                
              </div>
            </div>
          </nav>

    </section>


    <div class="container-1">

      <div class="box-1">

      <h4>Transfer From : </h4>

      <img src="imgs/from.png" alt="money_to" width="220px" height="220px"  class="img-fluid" >

      <form  method="post">
        <select name="from" class="form-control" required>
        <option value="" disabled selected>Choose</option>
        <?php
        $connection = mysqli_connect("localhost", "root", "", "grip") or die("Can't connect");
        $sql = "SELECT * FROM `Users`";
        $result = mysqli_query($connection, $sql);
        while ($rows = mysqli_fetch_assoc($result)) {
        ?>
          <option class="table" value="<?php echo $rows['User_ID']; ?>">
            <?php echo $rows['Name']; ?> [Balance:
            <?php echo $rows['Balance']; ?> ]</option>
        <?php
        }
        ?>
      </select>

      </div>

      <div class="box-2">

      <h4>Transfer To : </h4>

      <img src="imgs/to.png" alt="money_to" width="220px" height="220px"  class="img-fluid" >

      <form  method="post">
        <select name="to" class="form-control" required>
        <option value="" disabled selected>Choose</option>
        <?php
        $con = mysqli_connect("localhost", "root", "", "grip") or die("Can't connect");
        $sql = "SELECT * FROM `Users`";
        $result = mysqli_query($con, $sql);
        while ($rows = mysqli_fetch_assoc($result)) {
        ?>
          <option class="table" value="<?php echo $rows['User_ID']; ?>">
            <?php echo $rows['Name']; ?> [Balance:
            <?php echo $rows['Balance']; ?> ]</option>
        <?php
        }
        ?>
      </select>
      </div>

      <div class="box-3">
      <h4>Enter Amount : </h4>
      <img src="imgs/trans_mon.png" alt="money_to" width="220px" height="220px"  class="img-fluid" >

      <form action="money_trans.php" method="post">
    
        <input class="mon_trans" type="number"  name="Amount" required>
        <button type="submit" name="submit" class="btn btn-danger">Transfer</button>
    </form>
      </div>

    </div>
    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>  
</body>
</html>