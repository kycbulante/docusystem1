<?php

include('../connect/connect.php');


function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table";
   return $query_run = mysqli_query($con, $query);
}


function getByID($dept_id)
{
    global $con;
    $query = "SELECT * FROM courses WHERE dept_id ='$dept_id'";
   return $query_run = mysqli_query($con, $query);
}
?>