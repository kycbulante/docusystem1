<?php
include('../functions/functions.php');
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

    <link rel="stylesheet" href="../requeststyle.css">
    <link rel="stylesheet" href="../style.css">
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

          <a class="navbar-brand ps-2 " id="brandlogo">
            <img src="../image/bg2.png" width="80" height="80" class="img-responsive d-print-inline-block h-auto d-inline-block">
          </a>
          <a class="navbar-item mx-auto text-decoration-none" id="navtit" aria-current="page">
                   <h1 id="title" style="font-family: 'Poppins', sans-serif;">EDIT DOCUMENT</h1>
          </a>
          <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

        
         <ul class="navbar-nav"  >
            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="index.php"><i class="fa-sharp fa-solid fa-arrow-left fa-lg"></i> BACK</a>
              </li>
            </ul>
        
          


          </div>
            
        </div>
</nav>
<?php
session_start();
include('../connect/connect.php');
if(!isset($_SESSION['admin']))
{
  echo"<script>alert('Please login first')</script>";
  echo"<script>window.open('loginpage.php','_self')</script>";
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    global $con;  
   
    $query = "SELECT * FROM requests INNER JOIN courses ON requests.course_id=courses.course_id INNER JOIN departments ON requests.dept_id=departments.dept_id WHERE id ='$id';";
    $query_run = mysqli_query($con, $query);
}

                    if(mysqli_num_rows($query_run)>0)
                    {

                        $data = mysqli_fetch_array($query_run);}
                    ?> 


<div class="body1 d-flex align-items-center justify-content-center flex-grow-1">
        
<div class="container" style="margin-bottom:200px;">
        <div class="heading">
           EDIT DOCUMENT 
        </div>

      <form class="row g-3" action="code.php" method="POST">
        <input type="hidden" name="id" value="<?= $data['id']; ?>">
          <div class="col-md-6">
            <label for="">School ID</label>
            <input type="text" value="<?= $data['school_id']; ?>" class="form-control" required name="school_id" placeholder="School ID" pattern="[T][U][P][M]-[0-9][0-9]-[0-9][0-9][0-9][0-9]">
          </div>

          <div class="col-md-6">
            <label for="">Name</label>
            <input type="text" value="<?= $data['name']; ?>" class="form-control" required name="name" placeholder="Name">
          </div>

           <div class="col-12">
              <label for="inputDepartment" class="form-label">Department</label>
              <select id="inputDepartment" class="department form-select" name="department" onChange="getCourse(this.value);">
               <option value="<?= $data['dept_id']; ?>" selected ><?= $data['department_name']; ?></option>
                       <?php 
                                    $departments = getAll("departments");

                                    if(mysqli_num_rows($departments) > 0)
                                {
                                    foreach($departments as $item){
                                        ?>
                                            <option value="<?= $item['dept_id']; ?>" <?=$data['dept_id']==$item['dept_id']?'selected':''?>><?= $item['department_name']; ?></option>
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
              <option value="<?= $data['course_id']; ?>"selected><?= $data['course_name']; ?></option>
              <?php                     
                              $courses = getByID($data['dept_id']);

                                  if(mysqli_num_rows($courses) > 0)
                                {
                                    foreach($courses as $item){
                                ?>
                                      <option value="<?= $item['course_id']; ?>" <?= $data['course_id'] == $item['course_id']?'selected':''?> ><?= $item['course_name']; ?></option>
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

            <div class="col-md-4">
              <label for="inputPhone" class="form-label">Phone Number</label>
              <input required type="phone" value="<?= $data['number']; ?>" class="form-control" name="number" placeholder="9123456789" title="Error Message" pattern="[9]{1}[0-9]{9}"  > 
            </div>

            <div class="col-md-8">
              <label for="inputPhone" class="form-label">Email</label>
              <input type="text" value="<?= $data['email']; ?>" class="form-control" required name="email" placeholder="Email">
            </div>

            <div class="col-md-9">
              <label for="inputZip" class="form-label">Document Requested</label>
              <select name = "document"class="form-select" required>
              <option value="<?= $data['document']; ?>" selected><?= $data['document']; ?></option>
                  <option value="Form 137">Form 137</option>
                  <option value="Form 138">Form 138</option>
                  <option value="Certificate of Graduation">Certificate of Graduation</option>
                  <option value="Certificate of Registration">Certificate of Registration</option>
                  <option value="Good Moral">Good Moral</option>
                  <option value="Transcript of Records">Transcript of Records</option>
                </select> 
            </div>

            <div class="col-md-3">
             <label class="form-label">Quantity</label>
              <!-- <input type="text" value="<?= $data['quantity']; ?>" class="form-control" required name="quantity"> -->
              <input required type="number" value="<?= $data['quantity']; ?>" name="quantity" class="form-control"
                 name="quantity" min="1" max="3">
            </div>
             <div class="col-md-12">
              <label for="inputPhone" class="form-label">Reason for Requesting</label>
             <input type="text" value="<?= $data['purpose']; ?>" class="form-control" required name="purpose" placeholder="Purpose">
            </div>

            <div class="col-md-4">
              <label for="inputPhone" class="form-label">Tracking ID</label>
             <input type="text" value="<?= $data['tracking_id']; ?>" class="form-control" required name="tracking_id" placeholder="Tracking ID">
            </div>

            <div class="col-md-4">
             <label for="inputPhone" class="form-label">Price</label>
              <input type="text" value="<?= $data['amount']; ?>" class="form-control" required name="amount" placeholder="Amount">
            </div>

            <div class="col-md-4">
              <label for="inputZip" class="form-label">Status</label>
              <select name = "status" class="form-select" >
                      <option value="<?= $data['status']; ?>"selected><?= $data['status']; ?></option>
                      <option value="Pending">Pending</option>
                      <option value="Approved">Approved</option>
                      <option value="Cancelled">Cancelled</option>
              </select>   
            </div>

            <div class="col-12  d-flex justify-content-center mt-5">
              <button  class= "btn btn-danger btn-lg" name="update_details_btn" type="submit">UPDATE</button>
            </div>
    </form>

    


    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>