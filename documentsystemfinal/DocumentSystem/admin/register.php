<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="loginstyle.css">


    <title>TUP ADMIN</title>
</head>
<body>
    
   <div class="container">

   <!-- Section: Design Block -->
   <section class="vh-80 mt-3">

    <div class="container">

      <div class="row d-flex justify-content-center align-items-center">

        <div class="col col-xl-10">

          <div class="card" style="border-radius: 1rem;">
           
            <div class="row g-0">
              
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="../image/tup2.png" alt="login form" class="img-fluid" w="100px"style="border-radius: 1rem 0 0 1rem;" />
             
                </div>
                
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body text-black">
  
                  <form action="authcode.php" method="post" >
  
                    <div class="d-flex justify-content-center align-items-center mb-3 pb-1">
                      <span class="h1 fw-bold mb-0"><img src="../image/Generic Document.png" width="120px" height="120px" alt=""></span>
                      
                    </div>
  
                    <h5 class="fw-normal mb-1 pb-4 d-flex  justify-content-center" style="letter-spacing: 1px; align-items: center;">REGISTER ACCOUNT</h5>
  
                    <div class="form-outline mb-2">
                    <input type="text" name="adminname" class="form-control form-control-lg" required>
                    <label>Name</label> 

                   
                    </div>

                    <div class="form-outline mb-2">
                    <input type="text"  name="adminemail"  class="form-control form-control-lg" required>
                    <label>Email Address</label>

          
                    </div>
  
                    <div class="form-outline mb-2">
                    <input type="password" name="adminpassword"  class="form-control form-control-lg" required>
                    <label>Password</label>

         
                    </div>
                    <div class="form-outline mb-2">
                    <input type="password" name="admincpassword" class="form-control form-control-lg" required>
                    <label>Confirm Password</label>

         
                    </div>
  
                    <div class="pt-4 d-grid gap-2 col-6 mx-auto">
                      <button name="adminregister_btn" class="btn btn-danger btn-lg btn-block" type="submit">Register</button>
                    </div>
                    <br>
                    <p class="pb-lg-2 " style="color: #393f81;">Already have an account? <a href="loginpage.php" style="color: #393f81;">Login here</a></p>

                    
                    
                  
                  </form>
  
                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>
  </section>
  <!-- Section: Design Block -->
    <!-- <div class="title d-flex justify-content-end">
        <h2>
            &nbspGENERIC DOCUMENT &nbsp<br> REQUEST MANAGEMENT &nbsp&nbsp&nbsp
        </h2>
    </div>
    <div class="d-flex justify-content-end">
        <div class="formcont ">
       
  
    
            <h3>
                LOGIN
            </h3>
            
            <form>
        
                <div class="form-outline mb-4">
                  <input type="email" id="form2Example1" class="form-control" />
                  <label class="form-label" for="form2Example1">Email address</label>
                </div>
              
              
                <div class="form-outline mb-4">
                  <input type="password" id="form2Example2" class="form-control" />
                  <label class="form-label" for="form2Example2">Password</label>
                </div>
              

                <div class="d-grid gap-2">
                    <button class="btn" style="color: white; background-color: #770000;" type="button">SIGN IN</button>
                   
                  </div>
              </form>

    </div> 
    </div> -->
   </div>   


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
