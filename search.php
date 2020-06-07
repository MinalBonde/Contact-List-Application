<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,800" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
  <title>Search Page</title>
  <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "contacts";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);} 

    ?>
    
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
  </head>
  <body>


  <header class="header-fixed">

    <div class="header-limiter">

    <h1><a href="">Contact<span>Manager</span></a></h1>

      <nav>
        <a href="search.php" class="selected">Home</a>
        <a href="view_all.php">All Contacts</a>
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
<div class="header-fixed-placeholder"></div>



    <div class="s006">
      <form method="post">
        <fieldset>
          <legend>Contact Manager</legend>
          <div class="inner-form">
            <div class="input-field">
              <button  class="btn-search" type="submit" name="search">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                </svg>
              </button>
              <input id="search" name="value" type="text" placeholder="Type what you are searching for" />

            </div>
          </div>
         
        </fieldset>
      </form>
    </div>
    <?php 
      if(isset($_POST['search']))
        {
          $value = $_POST['value'];
          echo "<script>setTimeout(\"location.href = 'search_results.php?search=$value';\",0);</script>";
          }

          ?>
  </body>
</html>
