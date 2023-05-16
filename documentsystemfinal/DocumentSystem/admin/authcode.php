<?php 

session_start();
include('../connect/connect.php');

if (isset($_POST['adminregister_btn']))
{
    $adminname = mysqli_real_escape_string($con,$_POST['adminname']);
    $adminemail = mysqli_real_escape_string($con,$_POST['adminemail']);
    $adminpassword = mysqli_real_escape_string($con,$_POST['adminpassword']);
    $hash_password=password_hash($adminpassword, PASSWORD_DEFAULT);
    $admincpassword = mysqli_real_escape_string($con,$_POST['admincpassword']);

    // $insertadmin_query = "INSERT INTO admin (name,email,phone,password) VALUES ('$adminname','$adminemail','$adminphone','$adminpassword')";
    // $insertadmin_query_run = mysqli_query($con, $insertadmin_query);

    // if($insertadmin_query_run)
    // {
    //     echo"<script>alert('hatdog')</script>";
    // }else{
    //     echo"<script>alert('hatdog1')</script>";
    // }

    // check email in database
    $check_email = "SELECT email FROM admins WHERE email='$adminemail'";
    $check_email_run = mysqli_query($con,$check_email);

    if(mysqli_num_rows($check_email_run)>0)
    {
        echo"<script>alert('Email already exists')</script>";
        echo"<script>window.open('loginpage.php','_self')</script>";
    }else
    {
        if($adminpassword == $admincpassword)
        {
            // Insert admin data
            $insertadmin_query = "INSERT INTO admins (name,email,password) VALUES ('$adminname','$adminemail','$hash_password')";
            $insertadmin_query_run = mysqli_query($con, $insertadmin_query);
    
            if( $insertadmin_query_run)
            {
                echo"<script>alert('success')</script>";
        echo"<script>window.open('loginpage.php','_self')</script>";
            }
            else
            {
                echo"<script>alert('failed')</script>";
        echo"<script>window.open('loginpage.php','_self')</script>";
            }
    
        }
        else
        {
            echo"<script>alert('passwords do not match')</script>";
        echo"<script>window.open('register.php','_self')</script>";
        }
    }
}
else if (isset($_POST['adminlogin_btn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $adminlogin_query = "SELECT * FROM admins WHERE email = '$email'";
    $adminlogin_query_run = mysqli_query($con, $adminlogin_query);
    $admindata =mysqli_fetch_array($adminlogin_query_run);

    if(mysqli_num_rows($adminlogin_query_run) > 0)
    {
        if(password_verify($password, $admindata['password'])){
        $_SESSION['admin'] = true;

        // $admindata =mysqli_fetch_array($adminlogin_query_run);
        $adminname = $admindata['name'];
        $adminemail = $admindata['email'];

        $_SESSION['admin_user'] = [
            'name' => $adminname,
            'email' => $adminemail
        ];

        echo"<script>alert('Logged in Successfully')</script>";
        echo"<script>window.open('index.php','_self')</script>";
    }
    else
    {
        echo"<script>alert('invalid credentials')</script>";
        echo"<script>window.open('loginpage.php','_self')</script>";
    }
}
else
{
    echo"<script>alert('invalid credentials')</script>";
        echo"<script>window.open('loginpage.php','_self')</script>";
}
}

?>