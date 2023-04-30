<?php
session_start();
require 'dbcon.php';
require_once('header.html');

if ($_SESSION['user_type'] !== 'admin') {
    echo('This is an admin exclusive page. Please log in as an admin to access this page.');
    header('Location: index.php');
    exit();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Add Location</title>
</head>
<body>
  
    <div class="container mt-5">

        

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Location Details
                            <a href="setup.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="insertloc.php" method="POST">

                            <div class="mb-3">
                                <label> Location Name</label>
                                <input type="text" name="name" id="name"class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Address</label>
                                <input type="text" name="address" id="address"class="form-control">
                            </div>
                        
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>