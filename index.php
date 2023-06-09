<?php
session_start();
// Redirect the user to login page if he is not logged in.
if (!isset($_SESSION['loggedIn'])) {
	header('Location: login.php');
	exit();
}
// Check if user is an admin



require_once('inc/config/constants.php');
require_once('inc/config/db.php');
require_once('inc/header.html');
?>


<body>
	<?php
	require 'inc/navigation.php';
	?>
	<!-- Page Content -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2">
				<h1 class="my-4"></h1>
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<a class="nav-link active" id="v-pills-item-tab" data-toggle="pill" href="#v-pills-item" role="tab" aria-controls="v-pills-item" aria-selected="true">Inventory</a>
					<a class="nav-link" id="v-pills-purchase-tab" data-toggle="pill" href="#v-pills-purchase" role="tab" aria-controls="v-pills-purchase" aria-selected="false">Purchase</a>
					<a class="nav-link" id="v-pills-search-tab" data-toggle="pill" href="#v-pills-search" role="tab" aria-controls="v-pills-search" aria-selected="false">Search</a>
					<a class="nav-link" id="v-pills-vendor-tab" data-toggle="pill" href="#v-pills-vendor" role="tab" aria-controls="v-pills-vendor" aria-selected="false">Vendor</a>
					<a class="nav-link" id="v-pills-reports-tab" data-toggle="pill" href="#v-pills-reports" role="tab" aria-controls="v-pills-reports" aria-selected="false">Reports</a>
				</div>
			</div>
			<div class="col-lg-10">
				<div class="tab-content" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="v-pills-item" role="tabpanel" aria-labelledby="v-pills-item-tab">
						<div class="card card-outline-secondary my-4">
							<div class="card-header">Item Details</div>
							<div class="card-body">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#itemDetailsTab">Item</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#itemImageTab">Upload Image</a>
									</li>
								</ul>

								<!-- Tab panes for item details and image sections -->
								<div class="tab-content">
									<div id="itemDetailsTab" class="container-fluid tab-pane active">
										<br>
										<!-- Div to show the ajax message from validations/db submission -->
										<div id="itemDetailsMessage"></div>
										<form>
								<div class="form-row">
									<div class="form-group col-md-3">
									<label for="itemDetailsItemNumber">Item Number<span class="requiredIcon">*</span></label>
									<div>
										<input type="text" class="form-control" name="itemDetailsItemNumber" id="itemDetailsItemNumber" autocomplete="off">
									</div>
									<div id="itemDetailsItemNumberSuggestionsDiv" class="customListDivWidth"></div>
									</div>
									<div class="form-group col-md-4">
											<label for="itemDetailsItemBrand">Brand<span class="requiredIcon">*</span></label>
											<select id="itemDetailsItemBrand" name="itemDetailsItemBrand" class="form-control chosenSelect">
												<?php
												require('dropdownbrand.php');
												?>
											</select>
											
										</div>
									
								</div>
								<div class="form-row">
									<div class="form-group col-md-3">
									<label for="itemDetailsItemName">Item Name<span class="requiredIcon">*</span></label>
									<div>
										<input type="text" class="form-control" name="itemDetailsItemName" id="itemDetailsItemName" autocomplete="off">
									</div>
									<div id="itemDetailsItemNameSuggestionsDiv" class="customListDivWidth"></div>
									</div>
									<div class="form-group col-md-4">
											<label for="itemDetailsCategory">Category<span class="requiredIcon">*</span></label>
											<select id="itemDetailsCategory" name="itemDetailsCategory" class="form-control chosenSelect">
												<?php
												require('dropdowncategory.php');
												?>
											</select>
										</div>
									
								</div>
										<div class="form-row">
									
												<div class="form-group col-md-3" style="display:inline-block">
													<!-- <label for="itemDetailsDescription">Description</label> -->
													<textarea rows="4" class="form-control" placeholder="Item description" name="itemDetailsDescription" id="itemDetailsDescription"></textarea>
												</div>
												<div class="form-group col-md-4">
											<label for="itemDetailsLocation">Location<span class="requiredIcon">*</span></label>
											<select id="itemDetailsLocation" name="itemDetailsLocation" class="form-control chosenSelect">
												<?php
												require('dropdownlocation.php');
												?>
											</select>
										</div>

											</div>

											<div class="form-row">
												<div class="form-group col-md-3">
													<label for="itemDetailsQuantity">Quantity<span class="requiredIcon">*</span></label>
													<input type="number" class="form-control" value="0" name="itemDetailsQuantity" id="itemDetailsQuantity">
												</div>

												<div class="form-group col-md-3">
													<label for="itemDetailsUnitPrice">Unit Price<span class="requiredIcon">*</span></label>
													<input type="text" class="form-control" value="0" name="itemDetailsUnitPrice" id="itemDetailsUnitPrice">
												</div>


												<div class="form-group col-md-3">
													<label for="itemDetailsDate">Date<span ></span></label>
													<input type="text" class="form-control" id="itemDetailsDate" name="itemDetailsDate" readonly>
												</div>
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

												
												<div class="form-group col-md-3">
													<div id="imageContainer"></div>
												</div>
											</div>
											<button type="button" id="addItem" class="btn btn-success">Add Item</button>
											<button type="reset" class="btn" id="itemClear">Clear</button>
										</form>
									</div>
									<div id="itemImageTab" class="container-fluid tab-pane fade">
										<br>
										<div id="itemImageMessage"></div>
										<p>You can upload an image for a particular item using this section.</p>
										<p>Please make sure the item is already added to database before uploading the image.</p>
										<br>
										<form name="imageForm" id="imageForm" method="post">
											<div class="form-row">
												<div class="form-group col-md-4" style="display:inline-block">
													<label for="itemImageItemNumber">Item Number<span class="requiredIcon">*</span></label>
													<input type="text" class="form-control" name="itemImageItemNumber" id="itemImageItemNumber" autocomplete="off">
													<div id="itemImageItemNumberSuggestionsDiv" class="customListDivWidth"></div>
												</div>
												<div class="form-group col-md-4">
													<label for="itemImageItemName">Item Name</label>
													<input type="text" class="form-control" name="itemImageItemName" id="itemImageItemName" readonly>
												</div>
											</div>
											<br>
											<div class="form-row">
												<div class="form-group col-md-7">
													<label for="itemImageFile">Select Image ( <span class="blueText">jpg</span>, <span class="blueText">jpeg</span>, <span class="blueText">gif</span>, <span class="blueText">png</span> only )</label>
													<input type="file" class="form-control-file btn btn-dark" id="itemImageFile" name="itemImageFile">
												</div>
											</div>
											<br>
											<button type="button" id="updateImageButton" class="btn btn-primary">Upload Image</button>
											<button type="button" id="deleteImageButton" class="btn btn-danger">Delete Image</button>
											<button type="reset" class="btn">Clear</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="v-pills-purchase" role="tabpanel" aria-labelledby="v-pills-purchase-tab">
						<div class="card card-outline-secondary my-4">
							<div class="card-header">Purchase Order Details</div>
							<div class="card-body">
								<div id="purchaseDetailsMessage"></div>
								<form>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label for="purchaseDetailsItemNumber">Item Number<span class="requiredIcon">*</span></label>
											<input type="text" class="form-control" id="purchaseDetailsItemNumber" name="purchaseDetailsItemNumber" autocomplete="off">
											<div id="purchaseDetailsItemNumberSuggestionsDiv" class="customListDivWidth"></div>
										</div>
										<div class="form-group col-md-2">
											<label for="purchaseDetailsPurchaseDate">Date<span class="requiredIcon">*</span></label>
											<input type="text" class="form-control" id="purchaseDetailsPurchaseDate" name="purchaseDetailsPurchaseDate" readonly>
										</div>

										<script>
											// Get the current date and time in the Manila timezone
											var now = new Date().toLocaleString("en-US", {
												timeZone: "Asia/Manila"
											});

											// Format the date and time as a string
											var dateString = new Date(now).toISOString().slice(0, 19).replace('T', ' ');

											// Set the value of the "purchaseDetailsPurchaseDate" field to the current date and time in Manila timezone
											document.getElementById("purchaseDetailsPurchaseDate").value = dateString;
										</script>

										<div class="form-group col-md-4">
											<label for="purchaseDetailsPurchaseID">Purchase ID</label>
											<input type="text" class="form-control invTooltip" id="purchaseDetailsPurchaseID" name="purchaseDetailsPurchaseID" title="This will be auto-generated when you add a new record" autocomplete="off">
											<div id="purchaseDetailsPurchaseIDSuggestionsDiv" class="customListDivWidth"></div>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label for="purchaseDetailsItemName">Item Name<span class="requiredIcon">*</span></label>
											<input type="text" class="form-control invTooltip" id="purchaseDetailsItemName" name="purchaseDetailsItemName" readonly title="This will be auto-filled when you enter the item number above">
										</div>
										<div class="form-group col-md-4">
											<label for="purchaseDetailsCurrentStock">Current Stock</label>
											<input type="text" class="form-control" id="purchaseDetailsCurrentStock" name="purchaseDetailsCurrentStock" readonly>
										</div>
										<div class="form-group col-md-4">
											<label for="purchaseDetailsVendorName">Vendor Name<span class="requiredIcon">*</span></label>
											<select id="purchaseDetailsVendorName" name="purchaseDetailsVendorName" class="form-control chosenSelect">
												<?php
												require('model/vendor/getVendorNames.php');
												?>
											</select>
										</div>
									</div>
									
									<div class="form-row">
										<div class="form-group col-md-2">
											<label for="purchaseDetailsQuantity">Quantity<span class="requiredIcon">*</span></label>
											<input type="number" class="form-control" id="purchaseDetailsQuantity" name="purchaseDetailsQuantity" value="0">
										</div>
										<div class="form-group col-md-2">
											<label for="purchaseDetailsUnitPrice">Unit Price<span class="requiredIcon">*</span></label>
											<input type="text" class="form-control" id="purchaseDetailsUnitPrice" name="purchaseDetailsUnitPrice" onchange="updateUnitPrice() value="0">

										</div>
										<div class="form-group col-md-2">
											<label for="purchaseDetailsTotal">Total Cost</label>
											<input type="text" class="form-control" id="purchaseDetailsTotal" name="purchaseDetailsTotal" readonly>
										</div>
									</div>
									<button type="button" id="addPurchase" class="btn btn-success">Add Purchase</button>
									<button type="button" id="updatePurchaseDetailsButton" class="btn btn-primary">Update</button>
									<button type="reset" class="btn">Clear</button>
								</form>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="v-pills-vendor" role="tabpanel" aria-labelledby="v-pills-vendor-tab">
						<div class="card card-outline-secondary my-4">
							<div class="card-header">Vendor Details</div>
							<div class="card-body">
								<!-- Div to show the ajax message from validations/db submission -->
								<div id="vendorDetailsMessage"></div>
								<form>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="vendorDetailsVendorFullName">Full Name<span class="requiredIcon">*</span></label>
											<input type="text" class="form-control" id="vendorDetailsVendorFullName" name="vendorDetailsVendorFullName" placeholder="">
										</div>
										<div class="form-group col-md-2">
											<label for="vendorDetailsStatus">Status</label>
											<select id="vendorDetailsStatus" name="vendorDetailsStatus" class="form-control chosenSelect">
												<option value="Computer">Active</option>
												<option value="Tool">Disabled</option>
											</select>
										</div>
										<div class="form-group col-md-3">
											<label for="vendorDetailsVendorID">Vendor ID</label>
											<input type="text" class="form-control invTooltip" id="vendorDetailsVendorID" name="vendorDetailsVendorID" title="This will be auto-generated when you add a new vendor" autocomplete="off">
											<div id="vendorDetailsVendorIDSuggestionsDiv" class="customListDivWidth"></div>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-3">
											<label for="vendorDetailsVendorMobile">Phone (mobile)<span class="requiredIcon">*</span></label>
											<input type="text" class="form-control invTooltip" id="vendorDetailsVendorMobile" name="vendorDetailsVendorMobile" title="Do not enter leading 0">
										</div>
										<div class="form-group col-md-3">
											<label for="vendorDetailsVendorPhone2">Phone 2</label>
											<input type="text" class="form-control invTooltip" id="vendorDetailsVendorPhone2" name="vendorDetailsVendorPhone2" title="Do not enter leading 0">
										</div>
										<div class="form-group col-md-6">
											<label for="vendorDetailsVendorEmail">Email</label>
											<input type="email" class="form-control" id="vendorDetailsVendorEmail" name="vendorDetailsVendorEmail">
										</div>
									</div>
									<div class="form-group">
										<label for="vendorDetailsVendorAddress">Address<span class="requiredIcon">*</span></label>
										<input type="text" class="form-control" id="vendorDetailsVendorAddress" name="vendorDetailsVendorAddress">
									</div>
									<div class="form-group">
										<label for="vendorDetailsVendorAddress2">Address 2</label>
										<input type="text" class="form-control" id="vendorDetailsVendorAddress2" name="vendorDetailsVendorAddress2">
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="vendorDetailsVendorCity">City</label>
											<input type="text" class="form-control" id="vendorDetailsVendorCity" name="vendorDetailsVendorCity">
										</div>
										<div class="form-group col-md-4">
											<label for="itemDetailsLocation">Location<span class="requiredIcon">*</span></label>
											<select id="itemDetailsLocation" name="itemDetailsLocation" class="form-control chosenSelect">
												<?php
												require('dropdownprovince.php');
												?>
											</select>
										</div>
									</div>
									<button type="button" id="addVendor" name="addVendor" class="btn btn-success">Add Vendor</button>
									<button type="button" id="updateVendorDetailsButton" class="btn btn-primary">Update</button>
									<button type="button" id="deleteVendorButton" class="btn btn-danger">Delete</button>
									<button type="reset" class="btn">Clear</button>
								</form>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" role="tabpanel" aria-labelledby="v-pills-sale-tab">
						<div class="card card-outline-secondary my-4">

							<div class="card-body">
								<div></div>
								
							</div>
						</div>
					</div>


					<div class="tab-pane fade" id="v-pills-search" role="tabpanel" aria-labelledby="v-pills-search-tab">
						<div class="card card-outline-secondary my-4">
							<div class="card-header">Search Inventory<button id="searchTablesRefresh" name="searchTablesRefresh" class="btn btn-warning float-right btn-sm">Refresh</button></div>
							<div class="card-body">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#itemSearchTab">Item</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#purchaseSearchTab">Purchase</a>
									</li>

								</ul>

								<!-- Tab panes -->
								<div class="tab-content">
									<div id="itemSearchTab" class="container-fluid tab-pane active">
										<br>
										<p>Use the grid below to search all details of items</p>
										<!-- <a href="#" class="itemDetailsHover" data-toggle="popover" id="10">wwwee</a> -->
										<div class="table-responsive" id="itemDetailsTableDiv"></div>
									</div>
									<div id="purchaseSearchTab" class="container-fluid tab-pane fade">
										<br>
										<p>Use the grid below to search purchase details</p>
										<div class="table-responsive" id="purchaseDetailsTableDiv"></div>
									</div>
									<div id="vendorSearchTab" class="container-fluid tab-pane fade">
										<br>
										<p>Use the grid below to search vendor details</p>
										<div class="table-responsive" id="vendorDetailsTableDiv"></div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="v-pills-reports" role="tabpanel" aria-labelledby="v-pills-reports-tab">
						<div class="card card-outline-secondary my-4">
							<div class="card-header">Reports<button id="reportsTablesRefresh" name="reportsTablesRefresh" class="btn btn-warning float-right btn-sm">Refresh</button></div>
							<div class="card-body">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#itemReportsTab">Item</a>
									</li>


									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#purchaseReportsTab">Purchase</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#vendorReportsTab">Vendor</a>
									</li>

								</ul>

								<!-- Tab panes for reports sections -->
								<div class="tab-content">
									<div id="itemReportsTab" class="container-fluid tab-pane active">
										<br>
										<p>Use the grid below to get reports for items</p>
										<div class="table-responsive" id="itemReportsTableDiv"></div>
									</div>

									<div id="purchaseReportsTab" class="container-fluid tab-pane fade">
										<br>
										<!-- <p>Use the grid below to get reports for purchases</p> -->
										<form>
											<div class="form-row">
												<div class="form-group col-md-3">
													<label for="purchaseReportStartDate">Start Date</label>
													<input type="text" class="form-control datepicker" id="purchaseReportStartDate" value="2018-05-24" name="purchaseReportStartDate" readonly>
												</div>
												<div class="form-group col-md-3">
													<label for="purchaseReportEndDate">End Date</label>
													<input type="text" class="form-control datepicker" id="purchaseReportEndDate" value="2018-05-24" name="purchaseReportEndDate" readonly>
												</div>
											</div>
											<button type="button" id="showPurchaseReport" class="btn btn-dark">Show Report</button>
											<button type="reset" id="purchaseFilterClear" class="btn">Clear</button>
										</form>
										<br><br>
										<div class="table-responsive" id="purchaseReportsTableDiv"></div>
									</div>
									<div id="vendorReportsTab" class="container-fluid tab-pane fade">
										<br>
										<p>Use the grid below to get reports for vendors</p>
										<div class="table-responsive" id="vendorReportsTableDiv"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	require 'inc/footer.php';
	?>
</body>

</html>