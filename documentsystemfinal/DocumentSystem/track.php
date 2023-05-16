<?php
include('./connect/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="requeststyle.css">
  <title>TUP REQUEST SYSTEM</title>
</head>
<body>
<style>
   .container{
    justify-content: center;
    align-items: center;
   
    max-width: 700px;
    width: 100%;
    padding: 25px 30px;
    border-radius: 25px;
    background: linear-gradient(135deg, #dc0606ca, #05073a);
    color :white;
}

.result
{
  font-family: 'Poppins', sans-serif; ;
}

    


</style>


<nav id="navbar-1" class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
    
        <div class="container-fluid">

          <a class="navbar-brand ps-2 " id="brandlogo" href="index.php">
            <img src="image/bg2.png" width="80" height="80" class="img-responsive d-print-inline-block h-auto d-inline-block">
          </a>
          <a class="navbar-item mx-auto text-decoration-none" id="navtit" aria-current="page" href="index.php">
                   <h1 id="title" style="font-family: 'Poppins', sans-serif;"> DOCUMENT REQUEST SYSTEM</h1>
          </a>
          <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        

  
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        
         

            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="index.php"><i class="fa-solid fa-house fa-xl"></i> HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="request.php"><i class="fa-solid fa-file-pen fa-xl"></i> REQUEST</a>
              </li>
            </ul>


          </div>
            
        </div>
</nav>


<div class="body1 d-flex align-items-center justify-content-center pt-5 pb-5">
        
    <div class="container" style="padding-bottom:100px">

    <div class="d-flex justify-content-center">
        <h1>TRACK YOUR DOCUMENT</h1>
    </div>

        <div class="logo d-flex justify-content-center">
          <img class="img-fluid" src="image/bg2.png" alt="">
        </div>
    <div class="trackNum">
        <div class="d-grid gap-2 col-6 mx-auto">

        <form class="row g-3" action="" method="POST">
        <div class="col-md-12">
    <input required type="text" name="search" class="form-control trackNum" id="inputTrack" placeholder="Enter Tracking Number" style="padding:20px;">
  </div>
  <button class= "btn btn-danger" type="submit" class="btn btn-primary" name="search_btn">TRACK </button>

        </form>
        </div>
    </div>
    
<hr>
<?php
if(isset($_POST['search_btn']))
{
    
$search = mysqli_real_escape_string($con,$_POST['search']);

$search_query = "SELECT * FROM requests WHERE tracking_id='$search'";
$search_query_run = mysqli_query($con,$search_query);

if(mysqli_num_rows($search_query_run)>0)
{
    $data = mysqli_fetch_array($search_query_run);
    
    if($data['status']=="Approved"){
    ?>
    <div class="result pt-3" >
    <h1>RESULTS</h1>
    <h4>Document request number <?= $data['tracking_id']; ?> is ready for claiming. <br>
        Please prepare an amount of <?= $data['amount']; ?> PHP upon claiming in the registrar.</h4> 
        </div>
       <?php
    }
    else if ($data['status']=="Pending")
    {
        ?>
         <div class="result pt-3">
        <h4>Document request number <?= $data['tracking_id']; ?> is still on process.</h4> 
        </div>
        <?phP
    }
    else if ($data['status']=="Cancelled")
    {
      
        ?>
        <div class="result pt-3">
        <h1>RESULTS</h1>
        <h3>Document request number <?= $data['tracking_id']; ?> was not approved. Please recheck your details and apply again.</h3> 
        </div>
       <?php
         
    }
}
else{
    ?>
     <div class="result pt-3">
     <h1>RESULTS</h1>
        <p> No results</p>

    </div>
   
    <?php
}
}
?>
   
    </div>





</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>