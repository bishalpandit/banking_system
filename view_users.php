<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <link href="css/styles.css" rel="stylesheet" type="text/css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" /> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
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
            <a class="nav-link" href="create_user.php">Create User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="view_users.php">View Users</a>
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


<h1 ><br>USERS</h1>

<?php

$connection = mysqli_connect("localhost","root","","grip") or die("Can't connect");
$sql = "SELECT * FROM `Users`";
$result = mysqli_query($connection,$sql);
$num = mysqli_num_rows($result);
$class = "table";
if ($num>0) {
  echo "<table class=' . $class'><tr><th>User ID</th><th>Name</th><th>Email ID</th><th>Balance</th></tr>";
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
      echo "<tr><td>" . $row['User_ID']. "</td><td>" . $row['Name']. "</td><td>" . $row['Email']. "</td><td>" . $row['Balance']. "</td>";?>
  </tr>
  <?php
  }
  echo "</table>";
} else {
  echo "0 results";
}
?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>