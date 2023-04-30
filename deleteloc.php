<?php

require 'dbcon.php';

if(isset($_POST['delete_loc']))
{
    $user_id = mysqli_real_escape_string($con, $_POST['delete_loc']);

    $query = "DELETE FROM locations WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Deleted Successfully";
        header("Location: setup.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Deleted";
        header("Location: setup.php");
        exit(0);
    }
}
?>