<title>ADMIN</title>
<?php

date_default_timezone_set('Asia/Manila');
include("header.php");
// Open your file in read mode
$file = file("Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/order.txt");

// Get today's date in the format "d/m/Y"
$today = date("d/m/Y");

// Get the current month in the format "m"
$month = date("m");

// Get the current year in the format "Y"
$year = date("Y");

// Initialize variables to store the total sales for today, this month, and this year
$totalSalesToday = 0;
$totalSalesMonth = 0;
$totalSalesYear = 0;

foreach($file as $line) {
    // Split the line into columns
    $columns = preg_split("/[-,\s:]/", $line);
	
	// Check if the order date matches today's date
    if ($columns[2] == $today) {
        // Add the subtotal to the total sales for today
        $subtotal = $columns[1];
        $totalSalesToday += $subtotal;
    }
	
	// Check if the order date belongs to the current month
    if ($columns[2] != "" && substr($columns[2], 3, 2) == $month) {
        // Add the subtotal to the total sales for the month
        $subtotal = $columns[1];
        $totalSalesMonth += $subtotal;
    }
	
	// Check if the order date belongs to the current year
    if ($columns[2] != "" && substr($columns[2], 6, 4) == $year) {
        // Add the subtotal to the total sales for the year
        $subtotal = $columns[1];
        $totalSalesYear += $subtotal;
    }

}

?>

<html>

<head>
  <title>SALES REPORT</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>
  .a {
    text-decoration: none;
  }

  .a:hover {
    background-color: #333;
	color:white;
	
	
  }
</style>

<body>
 <center> 
 <div id="here">
 <table border="1" cellspacing="0">
    <tr>
      <td width="300vh">
        <center>
          <h1>ORDER DATE </h1>
        </center>
      </td>
      <td width="300vh">
        <center>
          <h1>TODAY SALES</h1>
        </center>
      </td>
	  
	  <td width="400vh">
        <center>
          <h1>MONTHLY SALES </h1>
        </center>
      </td>
	  
	  <td width="300vh">
        <center>
          <h1>YEARLY SALES </h1>
        </center>
      </td>
    </tr>
    <br>
    <!-- Div for auto update specific div -->
    <tr>
      <td>
        <center>
          
            <form method="post">

            <?php
$displayLimit = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $displayLimit;

if (empty($file)) {
    echo "<h1 style='color:red;'> SALES REPORT IS EMPTY </h1>";
} else {
    $pattern = "/[-,\s:]/";
    $totalCount = count($file);
    $totalPages = ceil($totalCount / $displayLimit);
    for ($i = $offset; $i < min($offset + $displayLimit, $totalCount); $i++) {
        $number = $i + 1;
        $itemname = preg_split($pattern, $file[$i]);
        echo "<h2> $number. <a class='a' href='report.php?a=$itemname[0]'>  $itemname[2]</h2></a>";
    }

  
}
?>

            </form>
            
        </td>
        <td>
		
		
          <center><h1>  <?php echo number_format($totalSalesToday, 2) ?> </h1></center>
        </td> 
		
		
		<td>
  <center><h1>  <?php echo number_format($totalSalesMonth, 2) ?> </h1> </center>
</td>
		
		
		<td>
  <center> <h1>  <?php echo number_format($totalSalesYear, 2) ?> </h1> </center>
</td><!--End of Div for auto update specific div -->
        
      </tr>
  </table>
  
  <?php 
    // create page buttons
    if ($totalPages > 1) {
		echo '<tr><td colspan="4">';
    echo '<center><ul class="pagination">';
        echo " <div style='text-align:center;'>";
        if ($page > 1) {
            $prev = $page - 1;
            echo "<li> <a href='?page=$prev'>Prev</a></li>";
        }
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $page) {
                echo "<li><a href='#'> <b>$i</b></a></li>";
            } else {
                echo "<li> <a href='?page=$i'>$i</a></li>";
            }
        }
        if ($page < $totalPages) {
            $next = $page + 1;
            echo " <li><a href='?page=$next'>Next</a></li>";
        }
        echo " </div>";
		echo '</ul></center>';
		echo '</td></tr>';
    }
  ?>
    </div>
</body>

<!-- Script for auto update specific div -->
<script>
  $(document).ready(function() {
    var counter = 9;
    window.setInterval(function() {
      counter = counter - 3;
      if (counter >= 0) {
        document.getElementById('off').innerHTML = counter;
      }
      if (counter === 0) {
        counter = 9;
      }
      $("#here").load(window.location.href + " #here");
    }, 3000);
  });
</script>

<!-- End of Script -->
<!-- Start of graph -->


<!-- End of graph -->


