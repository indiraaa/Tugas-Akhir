<?php session_start(); ?>
<?php if (isset($_SESSION["session_admin"])): ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Lets Shopping</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Link Bootstarp Css -->
	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="asset/css/simple-sidebar.css" rel="stylesheet">
	<link rel="icon" href="asset/mask.jpg">
	<!-- Link Bootstrap Js -->
	<script src="asset/js/jquery.min.js"></script>
	<script src="asset/js/popper.min.js"></script>
	<script src="asset/js/bootstrap.min.js"></script>
    <style type="text/css">
        .stick2{
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            z-index: 2;
        }
        .margin{
            margin-left: 215px;
        }
    </style>
</head>
<body>
	<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    	<div class="bg-light border-right" style="position: fixed; top: 0; z-index: 1;" id="sidebar-wrapper">
      		<div class="sidebar-heading">Lets Shopping</div>
     		<div class="list-group list-group-flush">
        		<a href="page_admin.php?page=pembeli" class="list-group-item list-group-item-action bg-light"><span class="fas fa-users" style="font-size: 20px;"></span> Customers</a>
        		<a href="page_admin.php?page=barang" class="list-group-item list-group-item-action bg-light"><span class="fas fa-shopping-bag" style="font-size: 20px;"></span> Products</a>
        		<a href="page_admin.php?page=seller" class="list-group-item list-group-item-action bg-light"><span class="fas fa-user" style="font-size: 20px;"></span> Sellers</a>
                <a href="page_admin.php?page=laporan" class="list-group-item list-group-item-action bg-light"><span class="fas fa-shopping-cart" style="font-size: 20px;"></span> Sales Report</a>
     		</div>
    	</div>

	<div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom" style="position: sticky; top: 0; z-index: 0;">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        	<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item"><a class="nav-link" href=""><span class="fas fa-user"></span> <?php echo $_SESSION["session_admin"]["nama_seller"]; ?></a></li>
            <li class="nav-item"><a class="nav-link" href="valid1.php?logout=true"><span class="fas fa-sign-out-alt"></span> Logout</a></li>
        	</ul>
        </div>
      </nav>

    	<div class="container-fluid">
    		<div class="container margin">
				<?php if (isset($_GET["page"])): ?>
					<?php if ((@include $_GET["page"].".php") === true): ?>
						<?php include $_GET["page"].".php"; ?>
					<?php endif ?>
				<?php endif ?>
			</div>
    	</div>
	</div>
</div>


</body>
</html>
<?php else: ?>
	<?php echo "Anda Belum Login"; ?>
	<br>
	<a href="login_admin.php">
		Login Disini
	</a>
<?php endif ?>
