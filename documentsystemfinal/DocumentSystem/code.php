<?php
include('./connect/connect.php');

if(isset($_POST['request_btn']))
{
    $id = mysqli_real_escape_string($con,$_POST['school_id']);
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $course = mysqli_real_escape_string($con,$_POST['course']);
    $department = mysqli_real_escape_string($con,$_POST['department']);
    $number = mysqli_real_escape_string($con,$_POST['number']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $document = mysqli_real_escape_string($con,$_POST['document']);
    $purpose = mysqli_real_escape_string($con,$_POST['purpose']);
    $quantity = mysqli_real_escape_string($con,$_POST['quantity']);
    $random = rand(10000,99999);
    $tracking_id = "document".$random;
    $amount = 100*$quantity;
    $status = "Pending";
    

    $insert_query = "INSERT INTO requests (school_id, name, course_id,dept_id, number,email, document,purpose,quantity, tracking_id,amount,status) 
    VALUES ('$id', '$name',' $course', '$department', '$number',  '$email',' $document','$purpose','$quantity','$tracking_id', '$amount','$status')";
    $insert_query_run = mysqli_query($con, $insert_query);

    if($insert_query_run)
    {
        echo"<script>alert('Tracking ID: $tracking_id')</script>";
        echo"<script>window.open('index.php','_self')</script>";
    }
    else
    {
        echo"<script>alert('aaaa')</script>";
    }
}
?>