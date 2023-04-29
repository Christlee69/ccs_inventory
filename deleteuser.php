<?php
session_start();
require 'db.php';

if(isset($_POST['delete_user']))
{
    $user_id = mysqli_real_escape_string($con, $_POST['delete_user']);

    $query = "DELETE FROM user WHERE userID='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "user Deleted Successfully";
        header("Location: admin-only.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "user Not Deleted";
        header("Location: admin-only.php");
        exit(0);
    }
}

if(isset($_POST['update_user']))
{
    $user_id = mysqli_real_escape_string($con, $_POST['userID']);

    $name = mysqli_real_escape_string($con, $_POST['fullname']);
    $userName = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

    $query = "UPDATE user SET fullname='$name', username = $userName, email='$email' WHERE userID='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "user Updated Successfully";
        header("Location: admin-only.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "user Not Updated";
        header("Location: admin-only.php");
        exit(0);
    }

}


if(isset($_POST['save_user']))
{
    $name = mysqli_real_escape_string($con, $_POST['fullname']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    

    $query = "INSERT INTO user (fullname,username,email) VALUES ('$name','$username,'$email')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "user Created Successfully";
        header("Location: admin-only.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "user Not Created";
        header("Location: admin-only.php");
        exit(0);
    }
}

?>