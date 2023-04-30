<?php

require 'dbcon.php';



if(isset($_POST['update_cat']))
{
    $user_id = mysqli_real_escape_string($con, $_POST['id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
   

    $query = "UPDATE categories SET name='$name' WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Updated Successfully";
        header("Location: setup.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Updated";
        header("Location: setup.php");
        exit(0);
    }

}


if(isset($_POST['save_cat']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
   
    

    $query = "INSERT INTO user (name) VALUES ('$name')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Created Successfully";
        header("Location: setup.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Created";
        header("Location: setup.php");
        exit(0);
    }
}

?>