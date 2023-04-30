<?php
session_start();    
require 'dbcon.php';
require_once('header.html');

if ($_SESSION['user_type'] !== 'admin') {
    echo('This is an admin exclusive page. Please log in as an admin to access this page.');
    header('Location: index.php');
    exit();
}

require 'dbcon.php';
require 'code.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Edit Category Details</title>
</head>
<body>
  
    <div class="container mt-5">

        

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Category Details
                            <a href="setup.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $catID = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM categories WHERE id ='$catID' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $brand = mysqli_fetch_array($query_run);
                                ?>
                                <form action="update_cat.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $brand['id']; ?>">

                                    <div class="mb-3">
                                        <label>Name</label>
                                        <input type="text" name="name" value="<?=$brand['name'];?>" class="form-control">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>