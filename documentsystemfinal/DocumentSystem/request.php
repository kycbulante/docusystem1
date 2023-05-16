<?php
include('./functions/functions.php');
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

    <link rel="stylesheet" href="requeststyle.css">
    <link rel="stylesheet" href="style.css">
  <title>TUP REQUEST SYSTEM</title>
</head>
<script src ="jquery.main.js" type="text/javascript"></script>

<script type="text/javascript">
  
    $(document).ready(function(){

      $(".department").change(function(){
        var dept_id = $(this).val();
        $.ajax({
          url:"getCourse.php",
          method:"POST",
          data:{dept_id:dept_id},
          success:function(data){
              $(".course").html(data);
          }
        });
      });
    });

</script>
<body>



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
         <ul class="navbar-nav"  >
            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="index.php"><i class="fa-solid fa-house fa-xl"></i> HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="track1.php"><i class="fa fa-truck fa-xl"> </i>  TRACK</a>
              </li>
            </ul>
          </div>
            
        </div>
</nav>



<div class="body1 d-flex align-items-center justify-content-center flex-grow-1">
        
<div class="container" style="margin-bottom:200px;">
        <div class="heading">
           INPUT DETAILS
        </div>

<form class="row g-3" action="code.php" method="POST">

      <div class="col-md-6">
        <label for="inputName4" class="form-label">Full Name</label>
        <input type="text" class="form-control"  name="name" required>
      </div>

      <div class="col-md-6">
        <label for="inputID4" class="form-label">Student Number </label>
        <input required type="text" name="school_id" class="form-control"  placeholder="(Ex. TUPM 00-0000)" pattern="[T][U][P][M]-[0-9][0-9]-[0-9][0-9][0-9][0-9]">
      </div>

      <div class="col-12">
        <label for="inputDepartment" class="form-label">Department</label>
        <select id="inputDepartment" class="department form-select" name="department" onChange="getCourse(this.value);">
                       <!-- <option value disabled selected>Select Department</option> -->
                       <?php 
                                    $departments = getAll("departments");

                                    if(mysqli_num_rows($departments) > 0)
                                {
                                    foreach($departments as $item){
                                        ?>
                                            <option value="<?= $item['dept_id']; ?>"><?= $item['department_name']; ?></option>
                                        <?php
                                    }       
                                }
                                else
                                {
                                    echo"NO category available";
                                }
                                ?>
    </select>
        </div>

  <div class="col-12">
  <label for="inputCourse" class="form-label">Course</label>
  <select id="inputCourse" class="course form-select" name ="course">
               <!-- <option value disabled selected>Select Course</option> -->
                                
                                
    </select>
  </div>



  <div class="col-md-4">
    <label for="inputPhone" class="form-label">Phone Number</label>
    <input required type="phone" class="form-control" name="number" placeholder="9123456789 " title="Error Message" pattern="[9]{1}[0-9]{9}"  > 
  </div>

  <div class="col-md-8">
  <label for="inputPhone" class="form-label">Email</label>
    <input type="text" class="form-control" name="email"> 
  </div>

  <div class="col-md-9">
    <label for="inputZip" class="form-label">Document Requested</label>
    <select name = "document"class="form-select" required>
                                <option>Form 137</option>
                                <option>Form 138</option>
                                <option>Certificate of Graduation</option>
                                <option>Certificate of Registration</option>
                                <option>Good Moral</option>
                                <option selected>Transcript of Records</option>
                        </select> 
  </div>

  <div class="col-md-3">
  <label class="form-label" >Quantity</label>
    <input required type="number" name="quantity" class="form-control"
                 name="quantity" min="1" max="3">
  </div>
  <div class="col-md-12">
  <label for="inputPhone" class="form-label">Reason for Requesting</label>
    <input type="text" class="form-control" name="purpose" required> 
  </div>

  <div class="col-12  d-flex justify-content-center">
    <button name="request_btn" class= "btn btn-danger" type="submit" class="btn btn-primary">Request</button>
  </div>
    </form>


    <div class="text-track d-flex justify-content-center mt-5">
        TRACK YOUR DOCUMENT &nbsp;  <a href="track.php">HERE</a>!
    </div>


    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>