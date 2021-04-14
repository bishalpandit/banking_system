<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="css/create_user.css" rel="stylesheet" >

</head>
<body>

    
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
                    <a class="nav-link " aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="create_user.php">Create User</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="view_users.php">View Users</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="money_trans.php">Money Transfer</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="trans_his.php">Transaction History</a>
                  </li>
                </ul>
                
              </div>
            </div>
          </nav>

    </section>

    <section id="main" >

        <form  class="form-main" method="POST">
        
            <img src="imgs/business-3d.png" alt="business-man" class="main-img" width="200px" height="150px">

            <div class="name">
                <label for="name">Name : </label>
                <input type="text" name="name"  class="inp" placeholder="" required>
            </div>
            <div class="email">
                <label for="email">Email : </label>
                <input type="email" name="email" class="inp" placeholder="" required>
            </div>
            <div class="bal">
                <label for="balance"> Balance : </label>
                <input type="number" name="balance" class="inp" placeholder="" required> 
            </div>
            
          <div class="res-sub">

          <button type="submit" value="Submit" class="btn btn-primary" name="submit">Submit</button>
          <button type="reset" value="Reset" class="btn btn-primary">Reset</button>
           
          </div>
        </form>

    </section>

  
<?php
  $connection = mysqli_connect("localhost", "root", "", "grip") or die("Can't connect");
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $balance = $_POST['balance'];
    $sql = "INSERT INTO `Users`(`User_ID`, `Name`, `Email`, `Balance`) 
    VALUES(NULL,'{$name}','{$email}','{$balance}')";
    $result = mysqli_query($connection, $sql);
    if ($result) {
  ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <strong>Successful!</strong> User has been added!
      </div>
  <?php
    }
  }
  ?>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>