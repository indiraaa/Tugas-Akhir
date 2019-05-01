<?php session_start(); ?>
<?php if (isset($_SESSION["session_pembeli"])): ?>
<!DOCTYPE html>
<html>
<head>
	<title>Lets Shopping</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="asset/mask.jpg">
	<!-- Link Bootstarp Css -->
	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<style type="text/css">
		body{
			background-image: url(asset/354.jpg);
			background-attachment: fixed;
			background-size: cover;
		}
		.logo{
        position: fixed;
        height: 170px;
        width: 170px;
        top: 10px;
        border-radius: 50%;
        /*padding: 10px;*/
        left: -20px;
        /*text-align: center;*/
      }
      .logo img{
        height: 100px;
        width: 100px;
        border-radius: 50%;
        /*border: 2px solid white;*/
      }
      .navbar-nav{
      	margin-left: 110px;
      }
      .nav-item{
      	font-size: 18px;
      }
      .img{
      	width: 200px;
      	height: auto;
      }
      .kartu{
      	margin: 10px;
      	margin-left: 65px;
      	margin-bottom: 45px;
      }
      .img1{
      	width: 100px;
      	height: auto;
      }
      .kartu1{
      	margin-top: 25px;
      	margin-left: 260px;
      }
      .nav2{
      	padding-right: 10px;
      }
      h5{
      	text-align: center;
      	text-transform: uppercase;
      }
      hr{
      	border-top: 3px double #8c8b8b;
      }
      .hr1{
      	border-top: 3px double #8c8b8b;
      	margin-top: 0;
      }
      .right{
      	padding-top: 20px;
      }
      #tb1{
        margin-top: 20px;
        margin-bottom: 20px;
      }
	</style>
	<!-- Link Bootstrap Js -->
	<script src="asset/js/jquery.min.js"></script>
	<script src="asset/js/popper.min.js"></script>
	<script src="asset/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
		<div class="d-flex justify-content-center logo">
            <img src="asset/kopi.png" alt="" style="border-radius: 25%;"></a>
        </div>

		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu">
			<span class="navbar navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="menu">
			<ul class="navbar-nav">
				<li class="nav-item"><a href="page_pembeli.php?page=list_produk" class="nav-link"><span class="fas fa-shopping-bag"></span> Product</a></li>
				<li class="nav-item"><a href="valid2.php?logout=true" class="nav-link"><span class="fas fa-sign-out-alt"></span> Logout</a></li>
			</ul>
		</div>
		<ul class="navbar-nav nav2">
			<li class="nav-item"><a class="nav-link" href=""><span class="fas fa-user"></span> <?php echo $_SESSION["session_pembeli"]["nama_pembeli"]; ?></a>
			</li>
		</ul>

		<a href="page_pembeli.php?page=list_penjualan">
			<b class="text-white"><span class="fas fa-shopping-cart"></span> Cart : <?php echo count($_SESSION["session_beli"]); ?></b>
		</a>

	</nav>
	<div class="container my-2">
		<?php if (isset($_GET["page"])): ?>
			<?php if ((@include $_GET["page"].".php") === true): ?>
				<?php include $_GET["page"].".php"; ?>
			<?php endif ?>
		<?php endif ?>
	</div>
</body>
</html>
<?php else: ?>
	<?php echo "Anda Belum Login"; ?>
	<br>
	<a href="login_pembeli.php">
		Login Disini
	</a>
<?php endif ?>
