<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<style>
		/* CSS for the header */
		header {
			background-color: #333;
			color: #fff;
			padding: 10px;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		
		nav {
			display: flex;
			justify-content: center;
			align-items: center;
		}
		
		nav a {
			color: #fff;
			padding: 10px;
			margin: 0 5px;
			text-decoration: none;
			font-weight: bold;
		}
		
		nav a:hover {
			border-bottom: 2px solid #fff;
			color:white;
			text-decoration:none;
		}
		
		.logout-link {
			display: block;
			color: #fff;
			padding: 10px;
			text-align: center;
			font-weight: bold;
			background-color: #4CAF50;
			text-decoration: none;
			border-radius: 5px;
			margin-right: 10px;
			
		}
		
		.logout-link:hover {
			background-color: white;
			color:  #3e8e41;
			border: 2px solid  #3e8e41;
		}
		
		/* CSS for responsive design */
		@media screen and (max-width: 768px) {
			header {
				flex-direction: column;
				text-align: center;
			}
			
			nav {
				margin-bottom: 10px;
			}
			
			nav a {
				margin: 0;
			}
			
			.logout-link {
				margin-top: 10px;
			}
		}
		
		.btnCostumer:hover {
    cursor: pointer;
    opacity: 0.8;
}
nav a.active {
	border-bottom: 2px solid #fff;
}
	</style>
</head>
<body>
	<header>
	<div class="btnCostumer">	<h1 onclick="window.location.href = 'index.php';" style="color:white;">MAIN BRANCH</h1> </div>
		
		<nav class="navbar">
		
			<a href="index.php">Sales</a>
			<a href="product.php">Products</a>
			<a href="labour.php">Employees</a>
			<a href="DeliveryHistory.php">Delivery History</a>
		</nav>
		<div class="navbar" ><a href="../" class="logout-link" style="text-decoration:none;">Logout</a> </div>
	</header>
</body>
</html>
<script>
	var currentLocation = window.location.pathname;
	$('.navbar a').each(function() {
		var href = $(this).attr('href');
		if (currentLocation.includes(href)) {
			$(this).addClass('active');
		}
	});
</script>
