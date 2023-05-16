<?php
session_start();
include('../connect/connect.php');

if(!isset($_SESSION['admin']))
{
  echo"<script>alert('Please login first')</script>";
  echo"<script>window.open('loginpage.php','_self')</script>";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Table </title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="tablepages.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body class="bodytable">
    <div class="header1">
    <div class="headermargin">
    <img src="../image/logo.png" alt="Logo"  style="width: 160px; height: 130px;">
    <?php
          if(isset($_SESSION['admin']))
          {
        ?>
        <span class="ms-1 font-weight-bold text-white">Admin <?= $_SESSION['admin_user']['name']; ?> </span>
        <a href="logoutpage.php">logout</a>
         <?php
          }
        ?>
    </div>   
    </div>
        <h1 class="h1"> List of Documents</h1>
        <br>
        <div class="tablebackground">
          
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Course</th>
                    <th>Department</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Document Requested</th>
                    <th>Document Purpose</th>
                    <th>Quantity</th>
                    <th>Tracking ID</th>
                    <th>Amount</th>
                    <th>status</th>
                    <th>edit</th>
                    <th>delete</th>
            </thead>
<tbody>
    <?php
    global $con;
    $query = "SELECT * FROM requests";
    $query_run = mysqli_query($con, $query);

   if(mysqli_num_rows($query_run)>0)
   {
       foreach($query_run as $item)
       {
           
    ?>
    <tr>
        <td><?= $item['school_id']; ?></td>
        <td><?= $item['name']; ?></td>
        <td><?= $item['course']; ?></td>
        <td><?= $item['department']; ?></td>
        <td><?= $item['number']; ?></td>
        <td><?= $item['email']; ?></td>
        <td><?= $item['document']; ?></td>
        <td><?= $item['purpose']; ?></td>
        <td><?= $item['quantity']; ?></td>
        <td><?= $item['tracking_id']; ?></td>
        <td><?= $item['amount']; ?></td>
        <td><?= $item['status']; ?></td>
        <td><a href="edit.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a></td>
        <td><a href="code.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary" name="delete_detais_btn">Delete</a></td>
        

    </tr>
    <?php
        }
    }
         else
    {
        echo"No records found";
    }
    ?>
    
</tbody>
</table>
</div>

    </body>