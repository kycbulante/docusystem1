<?php
session_start();
include('../connect/connect.php');

if(isset($_POST['update_details_btn']))
{
    $id = mysqli_real_escape_string($con,$_POST['id']);
    $school_id = mysqli_real_escape_string($con,$_POST['school_id']);
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $course = $_POST['course'];
    $department = mysqli_real_escape_string($con,$_POST['department']);
    $number = mysqli_real_escape_string($con,$_POST['number']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $document = $_POST['document'];
    $purpose = mysqli_real_escape_string($con,$_POST['purpose']);
    $quantity = mysqli_real_escape_string($con,$_POST['quantity']);
    $tracking_id  = mysqli_real_escape_string($con,$_POST['tracking_id']);
    $amount = 100*$quantity;
    $status = $_POST['status'];
    

    $update_query = "UPDATE requests SET school_id='$school_id' ,name='$name', dept_id='$department', course_id='$course', number='$number',email='$email', document='$document',purpose='$purpose',quantity='$quantity', tracking_id='$tracking_id',amount='$amount', status='$status' WHERE id='$id'";
    // -- // ,department='$department', WHERE id='$id'";
 
 

    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run)
    {
        echo"<script>alert('Updated')</script>";
        echo"<script>window.open('index.php','_self')</script>";
    }
    else
    {
        echo"<script>alert('aaaa')</script>";
    }
}
else if(isset($_GET['id'])){
    $delete_id=$_GET['id'];
    // echo $delete_id;
    $delete="Delete from `requests` where id=$delete_id";
    $result=mysqli_query($con,$delete);
    if($result){
        echo "<script>alert('Product deleted')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}
?>