<!DOCTYPE html>
<html>
<head>
	<title>Responsive Header Example</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta charset="utf-8">
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
				display: none; /* hide the navigation links */
			}

			nav a {
				margin: 0;
				display: block;
			}

			.logout-link {
				margin-top: 10px;
			}

			/* CSS for the toggle button */
			.toggle-nav {
				display: block;
				background-color: #4CAF50;
				color: #fff;
				padding: 10px;
				text-align: center;
				font-weight: bold;
				border-radius: 5px;
				margin-right: 10px;
				cursor: pointer;
			}

			.toggle-nav:hover {
				background-color: white;
				color:  #3e8e41;
				border: 2px solid  #3e8e41;
			}

			/* CSS to show the navigation links when the toggle button is clicked */
			.show-nav {
				display: flex !important;
				flex-direction: column;
			}
		}

		.btnCostumer:hover {
			cursor: pointer;
			opacity: 0.8;
		}
	</style>
</head>
<body>
<script>
function goToPage() {
  window.location.href = "index.php";
}
</script>
	<header>
		<div class="btnCostumer"><h1 onclick="goToPage()">HOME</h1></div>
		<h1>COSTUMER</h1>
		<a  href="../IPT/" class="logout-link" style="text-decoration:none;">Logout</a>
	</header>
	
</body>
</html>
