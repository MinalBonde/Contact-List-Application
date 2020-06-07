<!DOCTYPE html>
<html lang="en">

<head>

	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "contacts";

		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);} 

?>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Record</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


	<style type="text/css">
		.header-fixed {
			background-color: #0C0E43;
			box-shadow: 0 1px 1px #ccc;
			padding: 10px 55px;
			height: 60px;
			color: #ffffff;
			box-sizing: border-box;
			top: -100px;

			-webkit-transition: top 0.3s;
			transition: top 0.3s;
		}

		.header-fixed .header-limiter {
			max-width: 1200px;
			text-align: center;
			margin: 0 auto;
		}


		.header-fixed-placeholder {
			height: 80px;
			display: none;
		}


		.header-fixed .header-limiter h1 {
			float: left;
			font: normal 28px Cookie, Arial, Helvetica, sans-serif;
			line-height: 40px;
			margin: 0;
		}

		.header-fixed .header-limiter h1 span {
			color: #5383d3;
		}


		.header-fixed .header-limiter a {
			color: #ffffff;
			text-decoration: none;
		}

		.header-fixed .header-limiter nav {
			font: 16px Arial, Helvetica, sans-serif;
			line-height: 40px;
			float: right;
		}

		.header-fixed .header-limiter nav a {
			display: inline-block;
			padding: 0 5px;
			text-decoration: none;
			color: #ffffff;
			opacity: 0.9;
		}

		.header-fixed .header-limiter nav a:hover {
			opacity: 1;
		}

		.header-fixed .header-limiter nav a.selected {
			color: #608bd2;
			pointer-events: none;
			opacity: 1;
		}


		body.fixed .header-fixed {
			padding: 10px 40px;
			height: 50px;
			position: fixed;
			width: 100%;
			top: 0;
			left: 0;
			z-index: 1;
		}

		body.fixed .header-fixed-placeholder {
			display: block;
		}

		body.fixed .header-fixed .header-limiter h1 {
			font-size: 24px;
			line-height: 30px;
		}

		body.fixed .header-fixed .header-limiter nav {
			line-height: 28px;
			font-size: 13px;
		}



		@media all and (max-width: 600px) {

			.header-fixed {
				padding: 20px 0;
				height: 75px;
			}

			.header-fixed .header-limiter h1 {
				float: none;
				margin: -8px 0 10px;
				text-align: center;
				font-size: 24px;
				line-height: 1;
			}

			.header-fixed .header-limiter nav {
				line-height: 1;
				float: none;
			}

			.header-fixed .header-limiter nav a {
				font-size: 13px;
			}

			body.fixed .header-fixed {
				display: none;
			}
		}

		body {
			color: #566787;
			background: #f5f5f5;
			font-family:  sans-serif;
			font-size: 13px;
		}

		.table-wrapper {
			background: #fff;
			padding: 20px 25px;
			margin: 30px 0;
			border-radius: 3px;
			box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
		}

		.table-title {
			padding-bottom: 15px;
			background: #435d7d;
			color: #fff;
			padding: 16px 30px;
			margin: -20px -25px 10px;
			border-radius: 3px 3px 0 0;
		}

		.table-title h2 {
			margin: 5px 0 0;
			font-size: 24px;
		}

		.table-title .btn-group {
			float: right;
		}

		.table-title .btn {
			color: #fff;
			float: right;
			font-size: 13px;
			border: none;
			min-width: 50px;
			border-radius: 2px;
			border: none;
			outline: none !important;
			margin-left: 10px;
		}

		.table-title .btn i {
			float: left;
			font-size: 21px;
			margin-right: 5px;
		}

		.table-title .btn span {
			float: left;
			margin-top: 2px;
		}

		table.table tr th,
		table.table tr td {
			border-color: #e9e9e9;
			padding: 12px 15px;
			vertical-align: middle;
		}

		table.table tr th:first-child {
			width: 60px;
		}

		table.table tr th:last-child {
			width: 100px;
		}

		table.table-striped tbody tr:nth-of-type(odd) {
			background-color: #fcfcfc;
		}

		table.table-striped.table-hover tbody tr:hover {
			background: #f5f5f5;
		}


		table.table th i {
			font-size: 13px;
			margin: 0 5px;
			cursor: pointer;
		}

		table.table td:last-child i {
			opacity: 0.9;
			font-size: 22px;
			margin: 0 5px;
		}

		table.table td a {
			font-weight: bold;
			color: #566787;
			display: inline-block;
			text-decoration: none;
			outline: none !important;
		}

		table.table td a:hover {
			color: #2196F3;
		}

		table.table td a.edit {
			color: #FFC107;
		}

		table.table td a.delete {
			color: #F44336;
		}

		table.table td i {
			font-size: 19px;
		}

		table.table .avatar {
			border-radius: 50%;
			vertical-align: middle;
			margin-right: 10px;
		}

		.pagination {
			float: right;
			margin: 0 0 5px;
		}

		.pagination li a {
			border: none;
			font-size: 13px;
			min-width: 30px;
			min-height: 30px;
			color: #999;
			margin: 0 2px;
			line-height: 30px;
			border-radius: 2px !important;
			text-align: center;
			padding: 0 6px;
		}

		.pagination li a:hover {
			color: #666;
		}

		.pagination li.active a,
		.pagination li.active a.page-link {
			background: #03A9F4;
		}

		.pagination li.active a:hover {
			background: #0397d6;
		}

		.pagination li.disabled i {
			color: #ccc;
		}

		.pagination li i {
			font-size: 16px;
			padding-top: 6px
		}

		.hint-text {
			float: left;
			margin-top: 10px;
			font-size: 13px;
		}

		/* Custom checkbox */
		.custom-checkbox {
			position: relative;
		}

		.custom-checkbox input[type="checkbox"] {
			opacity: 0;
			position: absolute;
			margin: 5px 0 0 3px;
			z-index: 9;
		}

		.custom-checkbox label:before {
			width: 18px;
			height: 18px;
		}

		.custom-checkbox label:before {
			content: '';
			margin-right: 10px;
			display: inline-block;
			vertical-align: text-top;
			background: white;
			border: 1px solid #bbb;
			border-radius: 2px;
			box-sizing: border-box;
			z-index: 2;
		}

		.custom-checkbox input[type="checkbox"]:checked+label:after {
			content: '';
			position: absolute;
			left: 6px;
			top: 3px;
			width: 6px;
			height: 11px;
			border: solid #000;
			border-width: 0 3px 3px 0;
			transform: inherit;
			z-index: 3;
			transform: rotateZ(45deg);
		}

		.custom-checkbox input[type="checkbox"]:checked+label:before {
			border-color: #03A9F4;
			background: #03A9F4;
		}

		.custom-checkbox input[type="checkbox"]:checked+label:after {
			border-color: #fff;
		}

		.custom-checkbox input[type="checkbox"]:disabled+label:before {
			color: #b8b8b8;
			cursor: auto;
			box-shadow: none;
			background: #ddd;
		}

		/* Modal styles */
		.modal .modal-dialog {
			max-width: 400px;
		}

		.modal .modal-header,
		.modal .modal-body,
		.modal .modal-footer {
			padding: 20px 30px;
		}

		.modal .modal-content {
			border-radius: 3px;
		}

		.modal .modal-footer {
			background: #ecf0f1;
			border-radius: 0 0 3px 3px;
		}

		.modal .modal-title {
			display: inline-block;
		}

		.modal .form-control {
			border-radius: 2px;
			box-shadow: none;
			border-color: #dddddd;
		}

		.modal textarea.form-control {
			resize: vertical;
		}

		.modal .btn {
			border-radius: 2px;
			min-width: 100px;
		}

		.modal form label {
			font-weight: normal;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function () {
			// Activate tooltip
			$('[data-toggle="tooltip"]').tooltip();

			// Select/Deselect checkboxes
			var checkbox = $('table tbody input[type="checkbox"]');
			$("#selectAll").click(function () {
				if (this.checked) {
					checkbox.each(function () {
						this.checked = true;
					});
				} else {
					checkbox.each(function () {
						this.checked = false;
					});
				}
			});
			checkbox.click(function () {
				if (!this.checked) {
					$("#selectAll").prop("checked", false);
				}
			});
		});
	</script>
</head>

<body>
<?php if (isset($_GET["id"])) { $cid  = $_GET["id"]; } else { $cid=0; }; ?>
<?php 

                	$query="SELECT contact_id as cid, Fname, Mname, Lname FROM CONTACT where contact_id='$cid' ";
         	
					$result=$conn->query($query); 
					$row = $result->fetch_assoc();
?>

	<header class="header-fixed">

		<div class="header-limiter">

			

      <nav>
        <a href="search.php">Home</a>
        <a href="view_all.php" class="selected">All Contacts</a>
        <a href="add.php">
              <span>Add Contact</span></a>

      </nav>

		</div>

	</header>

	<script>

		$(document).ready(function () {

			var showHeaderAt = 150;

			var win = $(window),
				body = $('body');

			if (win.width() > 600) {

				win.on('scroll', function (e) {

					if (win.scrollTop() > showHeaderAt) {
						body.addClass('fixed');
					}
					else {
						body.removeClass('fixed');
					}
				});

			}

		});

	</script>







	<div class="container">
		
    <h1>Edit Profile for <?php echo $row['Fname'] ?> <?php echo $row['Lname'] ?> </h1>
  	<hr>
	
      <div class="row personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-warning"></i>
          You are about to <strong>Edit</strong> or <strong>Delete</strong> the records for <?php echo $row['Fname'] ?> <?php echo $row['Lname'] ?>
        </div>
    </div>
         <form method="post"><h3>Contact info
       
        			<input type="submit" class="btn btn-default" value="Cancel" name="cancel" style="float: right;">
						<input type="submit" class="btn btn-primary" value="Save Changes" name="save" style="float:  right;"></h3>
        <div class="row">
													<div class="col-sm-4">
														<div class="form-group">
															<label>First Name</label>
															<input type="text" class="form-control" required name="Fname" style="width: 80%" value="<?php echo $row['Fname'] ?>">
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<label>Middle Name</label>
															<input type="text" class="form-control" name="Mname" style="width: 80%" value="<?php echo $row['Mname'] ?>">
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<label>Last Name</label>
															<input type="text" class="form-control" required name="Lname" style="width: 80%" value="<?php echo $row['Lname'] ?>">
														</div>
													</div>
												</div>

</form>
											
				<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Address <b>List</b></h2>
					</div>
					
				</div>
			</div>
			<table class="table table-striped table-hover" width="100%" cellspacing="-1">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						
						<th>Address Type</th>
						<th>Street Address</th>
						<th>City</th>
						<th>State</th>
						<th>Zip</th>
						
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i=1;
					$query2="SELECT address_id as aid, address_type, address,city,state,zip FROM Address where contact_id ='$cid'";
         	
					$result=$conn->query($query2); 
					while($add = $result->fetch_assoc()){ 
                    ?>
					<tr>
						
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox<?php echo $i?>" name="options[]" value="1">
								<label for="checkbox<?php echo $i?>"></label>
							</span>
						</td>
						
						<td>
							<?php echo $add['address_type'] ?>
						</td>
						<td>
							<?php echo $add['address'] ?>
						</td>
						<td>
							<?php echo $add['city']  ?>
						</td>
						<td>
							<?php echo $add['state'] ?>
						</td>
						<td>
							<?php echo $add['zip'] ?>
						</td>
						
						<td>
							<a href="#editContactModalAdd<?php echo $i?>" class="edit" data-toggle="modal"><i class="material-icons"
								 data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteContactModalAdd<?php echo $i ?>" class="delete" data-toggle="modal"><i class="material-icons"
								 data-toggle="tooltip" title="Delete">&#xE872;</i></a>

							<div id="editContactModalAdd<?php echo $i ?>" class="modal fade">
								<div class="modal-dialog">
									<div class="modal-content">
										<form method="post">
											<div class="modal-header">
												<h4 class="modal-title">Edit Address</h4>
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											</div>
											<div class="modal-body">
												<input type="hidden" name="cid" value="<?php echo $cid ?>">
												<input type="hidden" name="aid" value="<?php echo $add['aid'] ?>">
												
												<div class="row">
														<div class="form-group">
															<label>Address Type</label>
															<select class="form-control" name="address_type">
																<option value="" <?php if($add['address_type']=='' ){ echo 'selected="selected"' ; } ?>>Please Select
																	Something</option>
																<option value="Home" <?php if($add['address_type']=='Home' ){ echo 'selected="selected"' ; } ?>>Home</option>
																<option value="Work" <?php if($add['address_type']=='Work' ){ echo 'selected="selected"' ; } ?>>Work</option>
																<option value="Other" <?php if($add['address_type']=='Other' ){ echo 'selected="selected"' ; } ?>>Other</option>
															</select>
														</div>
													</div>

													<div class="row">
													
														<div class="form-group">
															<label>Street Address</label>
															<input type="text" class="form-control" name="address" value="<?php echo $add['address'] ?>">
														</div>
													</div>
												

												<div class="row">
													<div class="col-sm-4">
														<div class="form-group">
															<label>City</label>
															<input type="text" class="form-control" name="city" value="<?php echo $add['city'] ?>">
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<label>State</label>
															<input type="text" class="form-control" name="state" value="<?php echo $add['state'] ?>">
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<label>Zip</label>
															<input type="text" pattern="[0-9]{5}" title="Five digit zip code" class="form-control" name="zip" value="<?php echo $add['zip'] ?>">
														</div>
													</div>
												</div>
												</div>
											<div class="modal-footer">
												<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
												<input type="submit" class="btn btn-info" value="Save" name="editAdd">
											</div>
										</form>
									</div>
								</div>
							</div>

							<div id="deleteContactModalAdd<?php echo $i ?>" class="modal fade">
								<div class="modal-dialog">
									<div class="modal-content">
										<form method="post">
											<div class="modal-header">
												<h4 class="modal-title">Delete Contact</h4>
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											</div>
											<div class="modal-body">
												<p>Are you sure you want to delete this Record for
													<?php echo $row['Fname'];?>
													<?php echo $row['Lname'];?>
												</p>
												<p class="text-warning"><small>This action cannot be undone.</small></p>
												<input type="hidden" name="cid" value="<?php echo $cid ?>">
												<input type="hidden" name="aid" value="<?php echo $add['aid'] ?>">
												</div>
											<div class="modal-footer">
												<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
												<input type="submit" class="btn btn-danger" value="Delete" name="deleteAdd">
											</div>
										</form>
									</div>
								</div>
							</div>

						</td>
					</tr>
					<?php $i++; } ?>
				</tbody>
			</table>
	
</div>


							
				<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Phone <b>List</b></h2>
					</div>
					
				</div>
			</div>
			<table class="table table-striped table-hover" width="100%" cellspacing="-1">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						
						<th>Phone Type</th>
						<th>Area Code</th>
						<th>Number</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i=1;
					$query2="SELECT phone_id as pid, phone_type, area_code,cellno FROM Phone where contact_id ='$cid'";
         	
					$result=$conn->query($query2); 
					while($phn = $result->fetch_assoc()){ 
                    ?>
					<tr>
						
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox<?php echo $i?>" name="options[]" value="1">
								<label for="checkbox<?php echo $i?>"></label>
							</span>
						</td>
						
						<td>
							<?php echo $phn['phone_type'] ?>
						</td>
						<td>
							<?php echo $phn['area_code'] ?>
						</td>
						<td>
							<?php echo $phn['cellno']  ?>
						</td>
												
						<td>
							<a href="#editContactModalPhn<?php echo $i?>" class="edit" data-toggle="modal"><i class="material-icons"
								 data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteContactModalPhn<?php echo $i ?>" class="delete" data-toggle="modal"><i class="material-icons"
								 data-toggle="tooltip" title="Delete">&#xE872;</i></a>

							<div id="editContactModalPhn<?php echo $i ?>" class="modal fade">
								<div class="modal-dialog">
									<div class="modal-content">
										<form method="post">
											<div class="modal-header">
												<h4 class="modal-title">Edit Phone</h4>
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											</div>
											<div class="modal-body">
												<input type="hidden" name="cid" value="<?php echo $cid ?>">
												<input type="hidden" name="pid" value="<?php echo $phn['pid'] ?>">
												
												<div class="row">
														<div class="form-group">
															<label>Phone Type</label>
															<select class="form-control" name="phone_type">
																<option value="" <?php if($phn['phone_type']=='' ){ echo 'selected="selected"' ; } ?>>Please Select
																	Something</option>
																<option value="cell" <?php if($phn['phone_type']=='cell' ){ echo 'selected="selected"' ; } ?>>Cell</option>
																<option value="home" <?php if($phn['phone_type']=='home' ){ echo 'selected="selected"' ; } ?>>Home</option>
																<option value="work" <?php if($phn['phone_type']=='work' ){ echo 'selected="selected"' ; } ?>>Work</option>
																<option value="other" <?php if($phn['phone_type']=='other' ){ echo 'selected="selected"' ; } ?>>Other</option>

															</select>
														</div>
													</div>

																									

												<div class="row">
														<div class="col-sm-6">
														<div class="form-group">
															<label>Area Code</label>
															<input type="text" pattern="[0-9]{3}" title="Three digit area code" class="form-control" name="area_code"
															 value="<?php echo $phn['area_code'] ?>">
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label>Number</label>
															<input type="text" pattern="\d{3}[\-]\d{4}" title="Number in 000-0000 form" class="form-control" name="cellno"
															 value="<?php echo $phn['cellno'] ?>">
														</div>
													</div>
												</div>
												</div>
											<div class="modal-footer">
												<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
												<input type="submit" class="btn btn-info" value="Save" name="editPhn">
											</div>
										</form>
									</div>
								</div>
							</div>

							<div id="deleteContactModalPhn<?php echo $i ?>" class="modal fade">
								<div class="modal-dialog">
									<div class="modal-content">
										<form method="post">
											<div class="modal-header">
												<h4 class="modal-title">Delete Contact</h4>
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											</div>
											<div class="modal-body">
												<p>Are you sure you want to delete this Record for
													<?php echo $row['Fname'];?>
													<?php echo $row['Lname'];?>
												</p>
												<p class="text-warning"><small>This action cannot be undone.</small></p>
												<input type="hidden" name="cid" value="<?php echo $cid ?>">
												<input type="hidden" name="pid" value="<?php echo $phn['pid'] ?>">
												</div>
											<div class="modal-footer">
												<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
												<input type="submit" class="btn btn-danger" value="Delete" name="deletePhn">
											</div>
										</form>
									</div>
								</div>
							</div>

						</td>
					</tr>
					<?php $i++; } ?>
				</tbody>
			</table>
	
</div>


							
				<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Date <b>List</b></h2>
					</div>
					
				</div>
			</div>
			<table class="table table-striped table-hover" width="100%" cellspacing="-1">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						
						<th>Date Type</th>
						<th>Date</th>
											
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i=1;
					$query2="SELECT date_id as did, date_type, bday FROM bday where contact_id ='$cid'";
         	
					$result=$conn->query($query2); 
					while($dat = $result->fetch_assoc()){ 
                    ?>
					<tr>
						
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox<?php echo $i?>" name="options[]" value="1">
								<label for="checkbox<?php echo $i?>"></label>
							</span>
						</td>
						
						<td>
							<?php echo $dat['date_type'] ?>
						</td>
						<td>
							<?php echo $dat['bday'] ?>
						</td>
						
						
						<td>
							<a href="#editContactModalDat<?php echo $i?>" class="edit" data-toggle="modal"><i class="material-icons"
								 data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteContactModalDat<?php echo $i ?>" class="delete" data-toggle="modal"><i class="material-icons"
								 data-toggle="tooltip" title="Delete">&#xE872;</i></a>

							<div id="editContactModalDat<?php echo $i ?>" class="modal fade">
								<div class="modal-dialog">
									<div class="modal-content">
										<form method="post">
											<div class="modal-header">
												<h4 class="modal-title">Edit Date</h4>
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											</div>
											<div class="modal-body">
												<input type="hidden" name="cid" value="<?php echo $cid ?>">
												<input type="hidden" name="did" value="<?php echo $dat['did'] ?>">
												
												<div class="row">
														<div class="form-group">
															<label>Date Type</label>
															<select class="form-control" name="date_type">
																<option value="" <?php if($dat['date_type']=='' ){ echo 'selected="selected"' ; } ?>>Please Select
																	Something</option>
																<option value="birthdate" <?php if($dat['date_type']=='birthdate' ){ echo 'selected="selected"' ; } ?>>Birthdate</option>
																<option value="anniversary" <?php if($dat['date_type']=='anniversary' ){ echo 'selected="selected"' ; }
																 ?>>Anniversary</option>
																<option value="other" <?php if($dat['date_type']=='other' ){ echo 'selected="selected"' ; } ?>>Other</option>
															</select>
														</div>
													</div>

													<div class="row">
													
														<div class="form-group">
															<label>Date</label>
															<input type="text" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Enter the date in YYYY-MM-DD format"
															 class="form-control" name="bday" value="<?php echo $dat['bday'] ?>">
														</div>
													</div>
												</div>
											<div class="modal-footer">
												<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
												<input type="submit" class="btn btn-info" value="Save" name="editDat">
											</div>
										</form>
									</div>
								</div>
							</div>

							<div id="deleteContactModalDat<?php echo $i ?>" class="modal fade">
								<div class="modal-dialog">
									<div class="modal-content">
										<form method="post">
											<div class="modal-header">
												<h4 class="modal-title">Delete Date</h4>
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											</div>
											<div class="modal-body">
												<p>Are you sure you want to delete this Record for
													<?php echo $row['Fname'];?>
													<?php echo $row['Lname'];?>
												</p>
												<p class="text-warning"><small>This action cannot be undone.</small></p>
												<input type="hidden" name="cid" value="<?php echo $cid ?>">
												<input type="hidden" name="did" value="<?php echo $dat['did'] ?>">
												</div>
											<div class="modal-footer">
												<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
												<input type="submit" class="btn btn-danger" value="Delete" name="deleteDat">
											</div>
										</form>
									</div>
								</div>
							</div>

						</td>
					</tr>
					<?php $i++; } ?>
				</tbody>
			</table>
	
</div>
</div>

        <form method="post">
          <div class="form-group">
            <label class="col-md-8 control-label"></label>
            
            	
						
			
          
        </form>
      </div>
  

<hr>

<?php
	if(isset($_POST['editAdd']))
	{	
		$aid = $_POST['aid'];
		$address_type=  $_POST['address_type'];
		$address=  $_POST['address'];
		$city=  $_POST['city'];
		$state=  $_POST['state'];
		$zip=  $_POST['zip'];
		
		if (!empty($aid)) 
		{

			$sql = "UPDATE address SET address_type= '$address_type', address ='$address', city='$city' ,state='$state', zip='$zip' WHERE contact_id = '$cid' and address_id ='$aid' ";
			$result = mysqli_query($conn,$sql);
			
			echo "<script>setTimeout(\"location.href = 'delete.php?id=$cid';\",0);</script>";
		}
		
	}
	?>

<?php
	if(isset($_POST['deleteAdd']))
	{	
		$aid = $_POST['aid'];
						
		if(!empty($aid))
				{ 
														  
				$sql = "DELETE FROM address WHERE address_id='$aid' ";
				$result = mysqli_query($conn,$sql);
			echo "<script>setTimeout(\"location.href = 'delete.php?id=$cid';\",0);</script>";

			}
			
	}
?>
<?php
	if(isset($_POST['editPhn']))
	{	
		$pid = $_POST['pid'];
		$phone_type=  $_POST['phone_type'];
		$area_code=  $_POST['area_code'];
		$cellno=  $_POST['cellno'];

		if (!empty($pid)) 
		{

			$sql = "UPDATE phone SET phone_type= '$phone_type', area_code ='$area_code', cellno='$cellno' WHERE contact_id = '$cid' and phone_id ='$pid' ";
			$result = mysqli_query($conn,$sql);
			
			echo "<script>setTimeout(\"location.href = 'delete.php?id=$cid';\",0);</script>";
		}
		
	}
	?>

<?php
	if(isset($_POST['deletePhn']))
	{	
		$pid = $_POST['pid'];
			
					
		if(!empty($pid))
				{ 
														  
				$sql = "DELETE FROM phone WHERE phone_id='$pid' ";
				$result = mysqli_query($conn,$sql);
			echo "<script>setTimeout(\"location.href = 'delete.php?id=$cid';\",0);</script>";

			}
			
	}
?>
<?php
	if(isset($_POST['editDat']))
	{		
	
		$did = $_POST['did'];
		
		$date_type=  $_POST['date_type'];
		$bday=  $_POST['bday'];
				
		if (!empty($did)) 
		{

			$sql = "UPDATE bday SET date_type = '$date_type', bday ='$bday' WHERE date_id ='$did' ";
			$result = mysqli_query($conn,$sql);
			
			echo "<script>setTimeout(\"location.href = 'delete.php?id=$cid';\",0);</script>";
		}
		
	}
	?>

<?php
	if(isset($_POST['deleteDat']))
	{	
		$did = $_POST['did'];
			
					
		if(!empty($did))
				{ 
														  
				$sql = "DELETE FROM bday WHERE date_id='$did' ";
				$result = mysqli_query($conn,$sql);
			echo "<script>setTimeout(\"location.href = 'delete.php?id=$cid';\",0);</script>";

			}
			
	}
?>
<?php
	if(isset($_POST['save']))
	{	$Fname=$_POST['Fname'];
$Mname=$_POST['Mname'];
$Lname=$_POST['Lname'];
		
		
														  
				$sql = "UPDATE contact SET Fname= '$Fname', Mname ='$Mname', Lname='$Lname' WHERE contact_id = '$cid' ";
				$result = mysqli_query($conn,$sql);
			echo "<script>setTimeout(\"location.href = 'delete.php?id=$cid';\",0);</script>";

			
	}
?>
<?php
	if(isset($_POST['cancel']))
	{	
	 $message = "Are you sure you want to go back to search page?";
	 echo "return confirm('Are you sure?')";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script>setTimeout(\"location.href = 'search.php';\",0);</script>";
			
	}
?>


</body>

</html>