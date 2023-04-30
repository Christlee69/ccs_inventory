<?php

require 'dbconnection.php';

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Update Item Details</title>
    <style>
        body {
            background-color: #808080;
        }

        /* style for the form input fields */
        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: none;
            border-bottom: 1px solid #ccc;
            font-size: 16px;
            font-weight: 400;
        }

        /* style for the form label */
        label {
            font-size: 16px;
            font-weight: 500;
            display: block;
            margin-bottom: 5px;
        }

        /* style for the form required icon */
        .requiredIcon {
            color: red;
        }

        /* style for the form update button */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            font-size: 16px;
            font-weight: 500;
            padding: 10px 20px;
        }

        /* style for the form update button on hover */
        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
    </style>


</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Item Details
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_GET['productID'])) {
                            $productID = mysqli_real_escape_string($con, $_GET['productID']);
                            $query = "SELECT * FROM item WHERE productID ='$productID' ";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $user = mysqli_fetch_array($query_run);
                        ?>
                                <form id="itemDetailsForm" action="updateItemDetails.php" method="POST">
                                    <input type="hidden" name="productID" value="<?php echo $productID; ?>">
                                    <label for="itemDetailsItemName">Item Name<span class="requiredIcon">*</span></label>
                                    <input type="text" class="form-control" name="itemDetailsItemName" id="itemDetailsItemName" autocomplete="off" value="<?php echo $user['itemName']; ?>">
                                    <select id="itemDetailsItemBrand" name="itemDetailsItemBrand">
                                        <option value="Apple" <?php if ($user['brand'] == 'Apple') echo 'selected="selected"'; ?>>Apple</option>
                                        <option value="Dell" <?php if ($user['brand'] == 'Dell') echo 'selected="selected"'; ?>>Dell</option>
                                        <option value="Lenovo" <?php if ($user['brand'] == 'Lenovo') echo 'selected="selected"'; ?>>Lenovo</option>
                                        <option value="HP" <?php if ($user['brand'] == 'HP') echo 'selected="selected"'; ?>>HP</option>
                                        <option value="addNew">Others</option>
										</select>
									
									<script>
										var dropdown = document.getElementById("itemDetailsItemBrand");
										dropdown.addEventListener("change", function() {
										var selectedOption = dropdown.options[dropdown.selectedIndex];
										if (selectedOption.value === "addNew") {
											var newOption = prompt("Enter a brand:");
											if (newOption) {
											var optionElement = document.createElement("option");
											optionElement.value = newOption;
											optionElement.text = newOption;
											dropdown.add(optionElement);
											dropdown.value = newOption;
											} else {
											dropdown.value = "";
											}
										}
										});
									</script>
                                    </select>
                                    <label for="itemDetailsCategory">Category<span class="requiredIcon">*</span></label>
                                    <select id="itemDetailsCategory" name="itemDetailsCategory">
                                        <option value="Computer" <?php if ($user['category'] == 'Computer') echo 'selected="selected"'; ?>>Computer</option>
                                        <option value="Tool" <?php if ($user['category'] == 'Tool') echo 'selected="selected"'; ?>>Tool</option>
                                        <option value="Office Furniture" <?php if ($user['category'] == 'Office Furniture') echo 'selected="selected"'; ?>>Office Furniture</option>
                                        <option value="Office Equipment" <?php if ($user['category'] == 'Office Equipment') echo 'selected="selected"'; ?>>Office Equipment</option>
                                    </select>
                                    <label for="itemDetailsLocation">Location<span class="requiredIcon">*</span></label>
                                    <select id="itemDetailsLocation" name="itemDetailsLocation">
                                        <option value="CS Laboratory" <?php if ($user['itemlocation'] == 'CS Laboratory') echo 'selected="selected"'; ?>>CS Laboratory</option>
                                        <option value="Linux Laboratory" <?php if ($user['itemlocation'] == 'Linux Laboratory') echo 'selected="selected"'; ?>>Linux Laboratory</option>
                                        <option value="Cisco Laboratory" <?php if ($user['itemlocation'] == 'Cisco Laboratory') echo 'selected="selected"'; ?>>Cisco Laboratory</option>
                                        <option value="Office" <?php if ($user['itemlocation'] == 'Office') echo 'selected="selected"'; ?>>Office</option>
                                    </select>
                                    <label for="itemDetailsDescription">Description<span class="requiredIcon">*</span></label>
                                    <textarea rows="4" class="form-control" placeholder="Item description" name="itemDetailsDescription" id="itemDetailsDescription"><?php echo $user['description']; ?></textarea>
                                    <label for="itemDetailsQuantity">Quantity<span class="requiredIcon">*</span></label>
                                    <input type="number" class="form-control" value="<?php echo $user['quantity']; ?>" name="itemDetailsQuantity" id="itemDetailsQuantity">
                                    <label for="itemDetailsUnitPrice">Price<span class="requiredIcon">*</span></label>
                                    <input type="number" class="form-control" value="<?php echo $user['unitPrice']; ?>" name="itemDetailsUnitPrice" id="itemDetailsUnitPrice">
                                    <label for="itemDetailsDate">Date<span class="requiredIcon">*</span></label>
                                    <input type="text" class="form-control" id="itemDetailsDate" name="itemDetailsDate" readonly value="<?php echo $user['itemdate']; ?>">
                                    <script>
                                        // Get the current date and time in the Manila timezone
                                        var now = new Date().toLocaleString("en-US", {
                                            timeZone: "Asia/Manila"
                                        });

                                        // Format the date and time as a string
                                        var dateString = new Date(now).toISOString().slice(0, 19).replace('T', ' ');

                                        // Set the value of the "itemDetailsDate" field to the current date and time in Manila timezone
                                        document.getElementById("itemDetailsDate").value = dateString;
                                    </script>



                                </form>

                                <button type="button" class="btn btn-primary" onclick="updateItemDetails()">Update</button>
                                <script>
                                    function updateItemDetails() {
                                        // Get the form element
                                        var form = document.getElementById("itemDetailsForm");

                                        // Submit the form
                                        form.submit();
                                    }
                                </script>



                        <?php
                            } else {
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