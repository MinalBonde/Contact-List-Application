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
	<title>Add Record</title>
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

<?php $cid=0;
	if(isset($_POST['add']))
		{
	    	$Fname = $_POST['Fname'];
	    	$Mname=  $_POST['Mname'];
	    	$Lname=  $_POST['Lname'];
	    	$address_type=  $_POST['address_type'];
	    	$address=  $_POST['address'];
	    	$city=  $_POST['city'];
	    	$state=  $_POST['state'];
	    	$zip=  $_POST['zip'];
			$phone_type=  $_POST['phone_type'];
	    	$area_code=  $_POST['area_code'];
	    	$cellno=  $_POST['cellno'];
	    	$date_type = $_POST['date_type'];
	    	$bday=  $_POST['bday'];
	    			    

		    if (!empty($Fname)) 
		    {	$sql1="SELECT contact_id FROM contact where Fname = '$Fname' and Lname ='$Lname'";   	
		    	$temp = $conn->query($sql1);
				$row = $temp->fetch_assoc();
				$cid= $row['contact_id'];
		    	 
			    if(!$cid) 
	       			 { 
	       			 $sql = "INSERT INTO contact (Fname,Mname,Lname) VALUES ('$Fname','$Mname','$Lname')";
	       			 $temp = $conn->query($sql);

	       			 $sql1="SELECT contact_id FROM contact where Fname = '$Fname' and Lname ='$Lname'";   	
		    		 $temp = $conn->query($sql1);
				     $row = $temp->fetch_assoc();
				     $cid= $row['contact_id'];

					 $sql = "INSERT INTO bday (contact_id,date_type,bday) VALUES ('$cid','$date_type','$bday')";	
					 $temp = $conn->query($sql);

					 $sql = "INSERT INTO address (contact_id,address_type,address,city,state,zip) VALUES ('$cid','$address_type','$address','$city','$state','$zip')";	
					 $temp = $conn->query($sql);

					 $sql = "INSERT INTO phone (contact_id,phone_type,area_code,cellno) VALUES ('$cid','$phone_type','$area_code','$cellno')";	
					 $temp = $conn->query($sql);

					 $message = "Successfully Inserted";
					 echo "<script type='text/javascript'>alert('$message');</script>";
					 }
	    			else
	    			{ 

					 $sql = "INSERT INTO bday (contact_id,date_type,bday) SELECT * FROM (SELECT '$cid','$date_type','$bday') AS tmp WHERE NOT EXISTS (select contact_id, date_type, bday from bday where contact_id='$cid' and date_type = '$date_type' and bday='$bday')";

					 $temp = $conn->query($sql);
					 
					 $sql = "INSERT INTO address (contact_id,address_type,address,city,state,zip) SELECT * FROM (SELECT '$cid','$address_type','$address','$city','$state','$zip') AS tmp WHERE NOT EXISTS (select contact_id,address_type,address,city,state,zip from address where contact_id='$cid' and address_type = '$address_type' and address='$address' and city='$city' and state='$state' and zip='$zip')"; 	
					 $temp = $conn->query($sql);
				
					 $sql = "INSERT INTO phone (contact_id,phone_type,area_code,cellno) SELECT * FROM (SELECT '$cid','$phone_type','$area_code','$cellno') AS tmp WHERE NOT EXISTS (select contact_id,phone_type,area_code,cellno from phone where contact_id='$cid' and phone_type = '$phone_type' and area_code='$area_code' and cellno='$cellno')";
					 $temp = $conn->query($sql);

					 $message = "Successfully Inserted";
					 echo "<script type='text/javascript'>alert('$message');</script>";
					

	    			}
			}
		else
		{
			echo "<script>alert('Please try again!');setTimeout(\"location.href = 'add.php';\",0);</script>";
		}
	}
	
                	$query="SELECT contact_id as cid, Fname, Mname, Lname FROM CONTACT where contact_id='$cid' ";
         	
					$result=$conn->query($query); 
					$row = $result->fetch_assoc();
?>

	<header class="header-fixed">

		<div class="header-limiter">



      <nav>
        <a href="search.php">Home</a>
        <a href="view_all.php">All Contacts</a>
        <a href="add.php" class="selected">
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
		
    <h1>Add Contact</h1>
  	<hr>
	
      <div class="row personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          You are about to <strong>Add</strong> a new contact
        </div>
    </div>
    <form method="post">
				
					<div class="modal-body">	<div class="row">
													<div class="col-sm-4">
														<div class="form-group">
															<label>First Name</label>
															<input type="text" class="form-control" required name="Fname" value="<?php echo $row['Fname'] ?>">
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<label>Middle Name</label>
															<input type="text" class="form-control" name="Mname" value="<?php echo $row['Mname'] ?>">
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<label>Last Name</label>
															<input type="text" class="form-control" required name="Lname" value="<?php echo $row['Lname'] ?>">
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-sm-4">
														<div class="form-group">
															<label>Address Type</label>
															<select class="form-control" name="address_type">
																<option value="">Please Select Something</option>
																<option value="Home">Home</option>
																<option value="Work" >Work</option>
																<option value="Other" >Other</option>
															</select>
														</div>
													</div>
													<div class="col-sm-8">
														<div class="form-group">
															<label>Street Address</label>
															<input type="text" class="form-control" name="address">
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-sm-4">
														<div class="form-group">
															<label>City</label>
															<input type="text" class="form-control" name="city">
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<label>State</label>
															<input type="text" class="form-control" name="state">
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<label>Zip</label>
															<input type="text" pattern="[0-9]{5}" title="Five digit zip code" class="form-control" name="zip" >
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-4">
														<div class="form-group">
															<label>Phone Type</label>
															<select class="form-control" name="phone_type">
																<option value="" >Please Select
																	Something</option>
																<option value="cell" >Cell</option>
																<option value="home" >Home</option>
																<option value="work" >Work</option>
																<option value="other">Other</option>

															</select>
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<label>Area Code</label>
															<input type="text" pattern="[0-9]{3}" title="Three digit area code" class="form-control" name="area_code">
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<label>Number</label>
															<input type="text" pattern="\d{3}[\-]\d{4}" title="Number in 000-0000 form" class="form-control" name="cellno">
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-sm-4">
														<div class="form-group">
															<label>Date Type</label>
															<select class="form-control" name="date_type">
																<option value="" >Please Select Something</option>
																<option value="birthdate" >Birthdate</option>
																<option value="anniversary">Anniversary</option>
																<option value="other" >Other</option>
															</select>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label>Date</label>
															<input type="text" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Enter the date in YYYY-MM-DD format"
															 class="form-control" name="bday" style="width: 50%;">
														</div>
													</div>
												</div>
											</div>

						<div class="modal-footer">
						<input type="submit" class="btn btn-default"  value="Go Back" name="cancel">
						<input type="submit" class="btn btn-success" value="Add" name="add">
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