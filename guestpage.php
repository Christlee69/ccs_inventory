
<?php
session_start();
require 'dbcon.php';
require_once('header.html');
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
        <div class="container">
            <!-- Image logo -->
            
            <a class="navbar-brand"><img src="images/Loginlogo.png"  style="border-radius:10px; margin-right: 10px; width: 60px; height:60px;"alt="Logo"></a>
            <a class="navbar-brand" href="guestpage.php">Guest Page</a>
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
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Location</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Recommendations</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM item";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $item)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $item['productID']; ?></td>
                                                <td><?= $item['itemName']; ?></td>
                                                <td><?= $item['brand']; ?></td>
                                                <td><?= $item['itemlocation']; ?></td>
                                                <td><?= $item['stock']; ?></td>
                                                <td><?= $item['unitPrice']; ?></td>
                                                <td><?= $item['category']; ?></td>
                                                <td><?= $item['description']; ?></td>
                                                <td><?= $item['itemdate']; ?></td>
                                                <td><?= $item['suggestions']; ?></td>
                                                
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
        
    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
