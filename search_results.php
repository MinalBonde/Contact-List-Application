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
			die("Connection failed: " . $conn->connect_error);
		} 
?>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Results</title>
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
			font-family: sans-serif;
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
<?php if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };             
	  if (isset($_GET["search"])) { $search  = $_GET["search"]; if(empty($search)){echo "<script>window.location.href='view_all.php'</script>";} } else {$search='NoRESULTS';};
?>

	<header class="header-fixed">

		<div class="header-limiter">

			

      <nav>
        <a href="search.php">Home</a>
        <a href="view_all.php" >All Contacts</a>
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
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2 style="display: inline;">Showing Search <b>Results </b></h2> <h4 style="display: inline;">for <?php echo $search; ?></h4>
					</div>
					
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Full Name</th>
               			<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
                    $results_per_page = 5;
					$start_from = ($page-1) * $results_per_page;
					
					$searchterm = explode(' ', $search);
					$searchTermBits = array();
					foreach ($searchterm as $term) {
						$term = trim($term);
						
						if (!empty($term)) {
							$searchTermBits[] = "CONCAT(Fname, Mname, Lname, address_type, address,city,state,zip,phone_type,area_code,cellno,date_type,bday) LIKE '%$term%'";
						}
					}
                	
                	$query2 = "SELECT distinct contact.contact_id as cid, Fname, Mname, Lname FROM CONTACT, Address, Phone, bday where contact.contact_id = address.contact_id and contact.contact_id =phone.contact_id and contact.contact_id = bday.contact_id and ( " .implode(' and ', $searchTermBits)." ) ORDER BY contact.contact_id ASC LIMIT $start_from, ".$results_per_page;
					$result=$conn->query($query2);
                  
					$i=1;
					while($row = $result->fetch_assoc()){ 
                    ?>
					<tr>
						<?php $cid = $row['cid']; ?>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox<?php echo $i?>" name="options[]" value="1">
								<label for="checkbox<?php echo $i?>"></label>
							</span>
						</td>
						<td>
							<?php echo $row['Fname'] ?> 
						
							<?php echo $row['Mname']  ?>
						
							<?php echo $row['Lname'] ?>
						</td>
						
						
						<td>
							<a href="delete.php?id=<?php echo $row['cid']?>" class="edit" data-toggle="modal"><i class="material-icons"
								 data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteContactModal<?php echo $i ?>" class="delete" data-toggle="modal"><i class="material-icons"
								 data-toggle="tooltip" title="Delete">&#xE872;</i></a>

							
							<div id="deleteContactModal<?php echo $i ?>" class="modal fade">
								<div class="modal-dialog">
									<div class="modal-content">
										<form method="post">
											<div class="modal-header">
												<h4 class="modal-title">Delete Contact</h4>
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											</div>
											<div class="modal-body">
												<p>Are you sure you want to delete all the Records for
													<?php echo $row['Fname'];?>
													<?php echo $row['Lname'];?>
												</p>
												<p class="text-warning"><small>This action cannot be undone.</small></p>
												<input type="hidden" name="cid" value="<?php echo $row['cid'] ?>">
												
											</div>
											<div class="modal-footer">
												<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
												<input type="submit" class="btn btn-danger" value="Delete" name="delete">
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
			
			<?php

				$sql= "SELECT COUNT(cid) AS count FROM (SELECT distinct contact.contact_id as cid, Fname, Mname, Lname FROM CONTACT, Address, Phone, bday where contact.contact_id = address.contact_id and contact.contact_id =phone.contact_id and contact.contact_id = bday.contact_id and " .implode(' and ', $searchTermBits).") as table1";
									
				$result1=$conn->query($sql);
				$count = $result1->fetch_assoc();
				$count = $count['count'];                   
?>
<?php 

function get_paging_info($tot_rows,$pp,$curr_page)
{
    $pages = ceil($tot_rows / $pp);

    $data = array(); // start out array
    $data['si']        = ($curr_page * $pp) - $pp; 
    $data['pages']     = $pages;                   
    $data['curr_page'] = $curr_page; 

    return $data;

}

$paging_info = get_paging_info($count,$results_per_page,$page); 
?>
<div class="clearfix">
                <div class="hint-text">Showing <b><?php echo --$i; ?></b> out of <b><?php echo $count ?></b> entries</div>
                <ul class="pagination">
                <?php if($paging_info['curr_page'] > 1) : ?>
                <li class="page-item"><a href='search_results.php?page=<?php echo ($paging_info['curr_page'] - 1); ?>&search=<?php echo $search ?>'>Prev</a></li>
                <li class="page-item"><a href='search_results.php?page=1&search=<?php echo $search ?>' class="page-link">First</a></li>
                  <?php endif; ?>
                   
    
    <?php
        $max = 5;
        if($paging_info['curr_page'] < $max)
            $sp = 1;
        elseif($paging_info['curr_page'] >= ($paging_info['pages'] - floor($max / 2)) )
            $sp = $paging_info['pages'] - $max + 1;
        elseif($paging_info['curr_page'] >= $max)
            $sp = $paging_info['curr_page']  - floor($max/2);
    ?>


    <?php for($i = $sp; $i <= ($sp + $max -1);$i++) : ?>

        <?php
            if($i > $paging_info['pages'])
                continue;
        ?>

        <?php if($paging_info['curr_page'] == $i) : ?>

           <li class="page-item active"> <a class="page-link " ><?php echo $i; ?></a></li>

        <?php else : ?>

            <li class="page-item"><a class="page-link" href='search_results.php?page=<?php echo $i; ?>&search=<?php echo $search ?>' ><?php echo $i; ?></a></li>

        <?php endif; ?>

    <?php endfor; ?>

    <?php if($paging_info['curr_page'] < $paging_info['pages']) : ?>

        
        <li class="page-item"><a class="page-link" href='search_results.php?page=<?php echo ($paging_info['curr_page'] + 1); ?>&search=<?php echo $search ?>'>Next</a></li>
        <li class="page-item"><a class="page-link" href='search_results.php?page=<?php echo $paging_info['pages'] ?>&search=<?php echo $search ?>'>Last</a></li>

    <?php endif; ?>

   </ul>
</div>
</div>
</div>
	
<?php
	if(isset($_POST['delete']))
	{	
		$cid = $_POST['cid'];
			
					
		if(!empty($cid))
				{ 
									  
				 $sql = "DELETE FROM address WHERE contact_id = '$cid'";
				$result = mysqli_query($conn,$sql);

				$sql = "DELETE FROM phone WHERE contact_id = '$cid'";
				$result = mysqli_query($conn,$sql);

				$sql = "DELETE FROM bday WHERE contact_id = '$cid'";
				$result = mysqli_query($conn,$sql); 

				$sql = "DELETE FROM contact WHERE contact_id = '$cid'";
				$result = mysqli_query($conn,$sql);

				$message = "Successfully Deleted";
				echo "<script type='text/javascript'>alert('$message');</script>";
				echo "<script>setTimeout(\"location.href = 'search_results.php?page=$page&search=$search';\",0);</script>";

			}
			else
			{
				$message = "Some Error occured while deleting";
				echo "<script type='text/javascript'>alert('$message');</script>";
				echo "<script>setTimeout(\"location.href = 'search_results.php?page=$page&search=$search';\",0);</script>";
			}
		
	}
?>

</body>

</html>