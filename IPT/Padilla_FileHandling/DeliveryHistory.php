<title>DELIVERY HISTORY </title>
<?php

include("header.php");

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
 <?php

// Read the delivery data from the text file and store it in an array
$delivery_data = file("Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/delivery.txt", FILE_IGNORE_NEW_LINES);

// Read the received data from the text file and store it in an array
$received_data = file("Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/costumerReceived.txt", FILE_IGNORE_NEW_LINES);

// Read the order data from the text file and store it in an array
$order_data = file("Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/order.txt", FILE_IGNORE_NEW_LINES);

              if (empty($received_data)) {
                echo "<h1 style='color:red;'> Delivery History is EMPTY </h1>";
              } else {
// Output the HTML table with the parcel station data, delivered data, and received data
echo '<table border="1" cellspacing="0">';
echo '<tr>';
echo '<td width="300vh"><center><h1>ORDER ID</h1></center></td>';
echo '<td width="300vh"><center><h1>ORDER DATE</h1></center></td>';
echo '<td width="400vh"><center><h1>DELIVERED</h1></center></td>';
echo '<td width="300vh"><center><h1>RECEIVED</h1></center></td>';
echo '</tr>';

// Loop through the order data and compare the first column with the customerReceived.txt
for ($i = 0; $i < count($order_data); $i++) {
  $order_row_data = explode(",", $order_data[$i]); // Split the row into an array using comma as the delimiter
  $order_column1 = $order_row_data[0]; // Get the first column value from the order data
  // Search for a match in the first column of the customerReceived.txt
  $match_found = false;
 for ($j = 0; $j < count($received_data); $j++) {
    $received_row_data = explode(",", $received_data[$j]); // Split the row into an array using comma as the delimiter
    $received_column1 = $received_row_data[0]; // Get the first column value from the customerReceived.txt
    if ($order_column1 === $received_column1) { // If a match is found in the customerReceived.txt
      // Search for a match in the delivery.txt
      $delivery_match_found = false;
      for ($k = 0; $k < count($delivery_data); $k++) {
        $delivery_row_data = explode(",", $delivery_data[$k]); // Split the row into an array using comma as the delimiter
        $delivery_column1 = $delivery_row_data[0]; // Get the first column value from the delivery.txt
        if ($order_column1 === $delivery_column1) { // If a match is found in the delivery.txt
          $delivery_match_found = true;
          // Check if the fourth column has "PAID"
          if ($delivery_row_data[1] === "PAID") {
            echo '<tr>';
            echo '<td><center>'.($order_row_data[0] ?? '').'</center></td>'; // Display the first column as ORDER DATE
            echo '<td><center><a href="viewOrder.php?a='.($order_row_data[0] ?? '').'">'.($order_row_data[2] ?? '').'</a></center></td>'; // Display the first column as ORDER DATE
            echo '<td><center>'.($delivery_row_data[2] ?? '').'</center></td>'; // Display the third column as DELIVERED
            echo '<td><center>'.($received_row_data[2] ?? '').'</center></td>'; // Display the fourth column as RECEIVED
            echo '</tr>';
          }
          break; // Stop searching for a match in the delivery.txt
        }
      }
      if (!$delivery_match_found) { // If no match is found in the delivery.txt, skip the row
        continue;
      }
      break; // Stop searching for a match in the customerReceived.txt
    }
  }

  // If no match is found in the customerReceived.txt, skip the row
  if (!$match_found) {
    continue;
  }
}

echo '</table>';
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


