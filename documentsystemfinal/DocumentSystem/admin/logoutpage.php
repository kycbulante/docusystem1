<?php
session_start();

if(isset($_SESSION['admin']))
{
    unset($_SESSION['admin']);
    unset($_SESSION['admin_user']);
    echo"<script>alert('logged out successfully')</script>";
}


    echo"<script>window.open('loginpage.php','_self')</script>";
?>