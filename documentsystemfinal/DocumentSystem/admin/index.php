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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="tablepage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

   
    <title>Document</title>
</head>
<body>
    <nav id="navbar-1" class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
    
        <div class="container-fluid">

          <a class="navbar-brand ps-2 " id="brandlogo" >
            <img src="../image/bg2.png" width="80" height="80" class="img-responsive d-print-inline-block h-auto d-inline-block">
          </a>
          <a class="navbar-item mx-auto text-decoration-none" id="navtit" aria-current="page" >
                   <h3 id="title" style="font-family: 'Poppins', sans-serif; color: white;"> Hello, Admin <?= $_SESSION['admin_user']['name']; ?></h3>
          </a>
          <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        

  
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        
         

            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="logoutpage.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> LOG OUT</a>
              </li>
            </ul>


          </div>
            
        </div>
</nav>


<div class="body1">
<div class="container">
  <div class="d-flex justify-content-center align-items-center pt-5" style="color: white; font-family: 'Poppins'"><h1>LIST OF REQUESTED DOCUMENTS</h1></div>

<div class="tablebg table-responsive">
<table class="table table-light table-striped table-hover table-sm align-middle">
            <thead class="table-dark align-middle">
                <tr class="text-capitalize">
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
                </tr>
            </thead>
<tbody>
    <?php
    global $con;
    $query = "SELECT * FROM requests INNER JOIN courses ON requests.course_id=courses.course_id INNER JOIN departments ON requests.dept_id=departments.dept_id;";
    $query_run = mysqli_query($con, $query);

    // $department = "SELECT * FROM departments";
    // $department_run = mysqli_query($con, $department);

    // $course = "SELECT * FROM courses";
    // $course_run = mysqli_query($con, $course);

   if(mysqli_num_rows($query_run)>0)
   {
       foreach($query_run as $item)
       {
           
    ?>
    <tr>
        <td><?= $item['school_id']; ?></td>
        <td><?= $item['name']; ?></td>
        <td><?= $item['course_name']; ?></td>
        <td><?= $item['department_name']; ?></td>
        <td><?= $item['number']; ?></td>
        <td><?= $item['email']; ?></td>
        <td><?= $item['document']; ?></td>
        <td><?= $item['purpose']; ?></td>
        <td><?= $item['quantity']; ?></td>
        <td><?= $item['tracking_id']; ?></td>
        <td><?= $item['amount']; ?></td>
        <td><?= $item['status']; ?></td>
        <td><a href="edit.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-danger">Edit</a></td>
        <td><a href="code.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-danger" name="delete_detais_btn">Delete</a></td>
        

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


    
</div>

</div>


   
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>