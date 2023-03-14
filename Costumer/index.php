<title>Costumer</title>
<?php  include ("header.php");?>


<div id="here">
<?php

date_default_timezone_set('Asia/Manila');

// Open your file in read mode
$file = file("../IPT/Padilla_FileHandling/Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/order.txt");


 if (empty($file)) {
                echo "<h1 style='color:red;'><br><br> <center> Your Order is EMPTY </h1>";
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
 
 <table border="1" cellspacing="0">
    <tr>
      <td width="300vh">
        <center>
          <h1>ORDER ID</h1>
        </center>
      </td>
	  <td width="300vh">
        <center>
          <h1>GET YOUR ORDER</h1>
        </center>
      </td>
      
	  <td width="300vh">
        <center>
          <h1>Order Status</h1>
        </center>
      </td>
	  
	  
	  
	  <td width="300vh">
        <center>
          <h1>TO RECEIVE</h1>
        </center>
      </td>
    </tr>
    <br>
    <!-- Div for auto update specific div -->
    <!--start code for status -->
	
<?php

$file = file("../IPT/Padilla_FileHandling/Simple Ordering System in Java-20230224T023058Z-001/Simple Ordering System in Java/storage/order.txt");
$delivery = file("../IPT/Padilla_FileHandling/Simple Ordering System in Java-20230224T023058Z-001/Simple Ordering System in Java/storage/delivery.txt");

$displayLimit = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $displayLimit;

$totalData = count($file);
$totalPages = ceil($totalData / $displayLimit);

for ($i = $offset; $i < $offset + $displayLimit && $i < $totalData; $i++) {
    $number = $i + 1;
    $itemname = preg_split("/[-,\s:]/", $file[$i]);
    $pending = $itemname[0];
   // $address = $itemname[3];
    $status = "PARCEL STATION";

    foreach ($delivery as $y => $val) {
        $columnsDeliver = preg_split("/[-,\s:]/", $delivery[$y]);
        $Deliverystatus = $columnsDeliver[0];

        if ($Deliverystatus == $pending) {
            $status = $columnsDeliver[1];
            break;
        }
    }
	
	// Check if the status is not "PAID"
	if ($status != "PAID") {
	    echo "<tr>";
	    echo "<td><Center><h2>$itemname[0]</h2></td>"; 
		echo "<td><Center><h2>$number .  $itemname[2]</h2></td>";
	
	    echo "<td><h2><center>$status</center></h2></td>";
	    
	    // Display different message based on the order status
	    if ($status == "Ongoing") {
	        echo "<td><h2><center><a href='recieved.php?a=$pending''>RECEIVE </a> |<a href='return.php?a=$pending''> RETURN</a></center></h2></td>";
	    }
		else if ($status == "DELIVERED") {
	        echo "<td><h2 ><center>CHECKING PAYMENT</center></h2></td>";
	    }	
			else {
	        echo "<td><h2><center>Waiting</center></h2></td>";
	    }
	    
	    echo "</tr>";
	}
}

// Create buttons to display other 10 data
if ($totalData > $displayLimit) {
    echo '<tr><td colspan="4">';
    echo '<center><ul class="pagination">';
    if ($page > 1) {
        echo '<li><a href="?page='.($page - 1).'">Previous</a></li>';
    }
    for ($i = 1; $i <= $totalPages; $i++) {
        echo '<li'.($i == $page ? ' class="active"' : '').'><a href="?page='.$i.'">'.$i.'</a></li>';
    }
    if ($page < $totalPages) {
        echo '<li><a href="?page='.($page + 1).'">Next</a></li>';
    }
    echo '</ul></center>';
    echo '</td></tr>';
}

}
?>


            </form>
            
		
	  
  </table>
  
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


