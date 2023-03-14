
<?php  include ("header.php");?>


<div id="here">
<?php
error_reporting(0);
date_default_timezone_set('Asia/Manila');

// Open your file in read mode
$file = file("../IPT/Padilla_FileHandling/Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/order.txt");

 if (empty($file)) {
                echo "<h1 style='color:red;'><br><br> <center> Delivery is EMPTY </h1>";
              } else {
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
  a {
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
          <h1>ORDER ID</h1>
        </center>
      </td>
      <td width="300vh">
        <center>
          <h1>LIST OF ORDERS </h1>
        </center>
      </td>
      
	  <td width="300vh">
        <center>
          <h1>STATUS</h1>
        </center>
      </td>
	  
	  
	  
	  <td width="300vh">
        <center>
          <h1>CUSTOMER</h1>
        </center>
      </td>
    </tr>
    <br>
    <!-- Div for auto update specific div -->
    <!--start code for status -->
	
<?php
$orders = file("../IPT/Padilla_FileHandling/Simple Ordering System in Java-20230224T023058Z-001/Simple Ordering System in Java/storage/order.txt");

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 10;
$start = ($page - 1) * $limit;
$end = $start + $limit;

for ($x = $start; $x < $end; $x++) {
    if (isset($orders[$x])) {
        $orderDetails = preg_split("/[-,\s:]/", $orders[$x]);
        $orderId = $orderDetails[0];
        $orderList = $orderDetails[2];
        $orderStatus = "PENDING";
        $customer = $orderDetails[4];
        $archive = false;

        // check if the order has been archived
        if (strpos($orders[$x], "ARCH") !== false) {
            $archive = true;
        }

        // check if the order has been delivered or returned
        $delivery = file("../IPT/Padilla_FileHandling/Simple Ordering System in Java-20230224T023058Z-001/Simple Ordering System in Java/storage/delivery.txt");
        foreach ($delivery as $y => $val) {
            $deliveryDetails = preg_split("/[-,\s:]/", $delivery[$y]);
            $deliveryId = $deliveryDetails[0];
            if ($deliveryId == $orderId) {
                $orderStatus = $deliveryDetails[1];
                break;
            }
        }

        if (!$archive) {
            echo "<tr>";
            echo "<td><h2><center>$orderId</center></h2></td>";

            if ($orderStatus == "Ongoing" or $orderStatus == "DELIVERED" or $orderStatus == "PAID") {
                echo "<td><h2><center>$orderList</h2></td>";
            } else {
                echo "<td><h2><center><a class='a' href='delivery.php?a=$orderId'>$orderList</a></h2></td>";
            }

            echo "<td><h2><center>$orderStatus</center></h2></td>";

            if ($orderStatus == "RETURNED") {
                echo "<td><h2><a href='issue.php?a=$orderId'><center><font color='red'>REQUEST CHANGE ITEM</a></center></a></h2></td>";
            } else if ($orderStatus == "DELIVERED") {
                echo "<td><h2><center><a href='ReceiptOrder.php?a=$orderId'>RECEIPT</a> | <a href='archiveOrder.php?a=$orderId'>ARCHIVE</a></center></h2></td>";
            } else if ($orderStatus == "PAID") {
                echo "<td><h2><center><a href='ReceiptOrder.php?a=$orderId'>RECEIPT</a> | <a href='archiveOrder.php?a=$orderId'>ARCHIVE</a></center></h2></td>";
            } else {
                echo "<td><h2><center>WAITING</center></h2></td>";
            }

            echo "</tr>";
        }
    }
}
?>
</table>
 <?php
$totalOrders = count($orders);
$totalPages = ceil($totalOrders / $limit);
$nextPage = $page + 1;
$prevPage = $page - 1;

//echo "<div class='pagination'>";
  echo '<tr><td colspan="4">';
    echo '<center><ul class="pagination">';
if ($page > 1) {
    echo " <li><a href='?page=$prevPage'>Previous</a></li>";
}
for ($i = 1; $i <= $totalPages; $i++) {
    if ($i == $page) {
        echo " <li><a class='active' href='?page=$i'>$i</a></li>";
    } else {
        echo " <li><a href='?page=$i'>$i</a></li>";
    }
}
if ($page < $totalPages) {
    echo " <li><a href='?page=$nextPage'>Next</a></li>";
}
  echo '</ul></center>';
    echo '</td></tr>';
//echo "</div>";
			  }
?>
            </form>


  
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


