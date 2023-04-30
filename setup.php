
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

    <!-- Custom CSS -->
    <style>
        .navbar-custom {
            background-color: #495057;
        }
        body {
            margin-top: 0;
            padding-top: 0;
        }
        table {
            margin-top: 100px;
        }
    </style>

    <title>Admin Exclusive Page</title>
</head>
<body>
  
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="index.php"><img src="images/back.png"  style="border-radius:10px; margin-right: 10px; width: 30px; height:30px;"alt="Logo"></a>
        <div class="container">
            <!-- Image logo -->
            
            <a class="navbar-brand"><img src="images/Loginlogo.png"  style="border-radius:10px; margin-right: 10px; width: 60px; height:60px;"alt="Logo"></a>
            <a class="navbar-brand" href="setup.php">Setup</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
				<a class="nav-link" href="model/login/logout.php">Log Out</a>
            </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Brand Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM brands";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $user)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $user['id']; ?></td>
                                                
                                                <td><?= $user['brand_name']; ?></td>
                                                <td>
                                                    
                                                    <a href="edit_brand.php?id=<?= $user['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_user" value="<?=$user['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                        <div class="row">
        <div class="col-md-12">
            <a href="add_brand.php" class="btn btn-primary float-end">Add new</a>
        </div>
    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Location Name</th>
                                    <th>Address</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM locations";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $user)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $user['id']; ?></td>
                                                <td><?= $user['name']; ?></td>
                                                <td><?= $user['address']; ?></td>
                                                <td>
                                                    
                                                    <a href="edit_loc.php?id=<?= $user['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="deleteloc.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_loc" value="<?=$user['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                        <div class="row">
        <div class="col-md-12">
            <a href="add_loc.php" class="btn btn-primary float-end">Add new</a>
        </div>
    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                    
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM categories";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $user)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $user['id']; ?></td>
                                                <td><?= $user['name']; ?></td>
                                                
                                                <td>
                                                    
                                                    <a href="edit_cat.php?id=<?= $user['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="delete_cat.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_cat" value="<?=$user['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                        <div class="row">
        <div class="col-md-12">
            <a href="add_cat.php" class="btn btn-primary float-end">Add new</a>
        </div>
    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
