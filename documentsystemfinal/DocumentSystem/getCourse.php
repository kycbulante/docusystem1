<?php
include('./connect/connect.php');
include('./functions/functions.php');

if (isset($_POST['dept_id'])){
    $dept_id = $_POST['dept_id'];

    $query = getByID($dept_id);
    ?>
    <select name="Course" class="form-control" id="">
    <!-- <option value disabled selected>Select Course</option> -->
    <?php
if(mysqli_num_rows($query)>0)
{
    foreach($query as $item)
    {
    ?>
    
    <option value="<?= $item['course_id']; ?>"><?= $item['course_name']; ?></option>
    
    </select>


    <?php
    }
}
}
?>