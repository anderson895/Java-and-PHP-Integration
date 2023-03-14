
 


<head>
<title>RECEIPT</title>

<?php 
	
	include("header.php");


$a=$_GET["a"];
	//STARTcode for QR CODE
	


	
	//ENDcode for QR CODE
?>
<link rel="stylesheet" href="style.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<style>

a{
	text-decoration:none;
	color:red;
}

</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php
    $item = file("Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/delivery.txt");
date_default_timezone_set('Asia/Manila');
$current_time = date('Y-m-d h:i:s A');


?>
<?php
// Open your file in read mode
$file = file("Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/orderline.txt");
$date = file("Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/order.txt");
$item = file("Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/item.txt");







// Define the value you want to match
$searchValue = $a;


?>


<?php 



foreach($date as $line) {
    // Split the line into columns
    $columns = preg_split("/[-,\s:]/", $line);

    // Check if the first column matches the search value
    if ($columns[0] == $searchValue) {
        // Display the row in a table
     

?>

<body>


<center>

<!-- Div for auto update specific div -->
<div id="here">
	
</center>
<?php
$orderdate=$columns[2];

    echo "<center>
		
		<table border='1'>";
     
       
    }
}


?>


<center><h1>ORDER RECEIPT</h1></center>
<center>


<table border="1" cellspacing="0">



<tr >

	<th width="30%">Date Order Item</th>
	<th width="70%"><center><?php echo $orderdate  ?></th>
</tr>

<tr >

	<th width="30%">Costumer Name</th>
	<th width="70%"><center>
	<?php
$order_id = $a; // replace with the desired order ID
$delivery_file = "Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/delivery.txt";

$found = false;
$third_column = "";

$file_handle = fopen($delivery_file, "r");
if ($file_handle) {
    while (($line = fgets($file_handle)) !== false) {
        $fields = explode(",", $line);
        if ($fields[0] == $order_id) {
            $third_column = $fields[3];
            $found = true;
            break;
        }
    }
    fclose($file_handle);
}

if ($found) {
    echo ucfirst($third_column);
} else {
    echo "Order ID ".$order_id." not found in ".$delivery_file;
}
?>
	</th>
</tr>



<tr >

	<th width="30%">Address</th>
	<th width="70%"><center>
	<?php
$order_id = $a; // replace with the desired order ID
$delivery_file = "Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/delivery.txt";

$found = false;
$third_column = "";

$file_handle = fopen($delivery_file, "r");
if ($file_handle) {
    while (($line = fgets($file_handle)) !== false) {
        $fields = explode(",", $line);
        if ($fields[0] == $order_id) {
            $third_column = $fields[4];
            $found = true;
            break;
        }
    }
    fclose($file_handle);
}

if ($found) {
    echo ucfirst($third_column);
} else {
    echo "Order ID ".$order_id." not found in ".$delivery_file;
}
?>
	</th>
</tr>
<tr >

	<th width="30%">Date Delivered Item</th>
	<th width="70%"><center><?php
$order_id = $a; // replace with the desired order ID
$delivery_file = "Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/delivery.txt";

$found = false;
$third_column = "";

$file_handle = fopen($delivery_file, "r");
if ($file_handle) {
    while (($line = fgets($file_handle)) !== false) {
        $fields = explode(",", $line);
        if ($fields[0] == $order_id) {
            $third_column = $fields[2];
            $found = true;
            break;
        }
    }
    fclose($file_handle);
}

if ($found) {
    echo $third_column;
} else {
    echo "Order ID ".$order_id." not found in ".$delivery_file;
}
?></th>
</tr>


<tr >

	<th width="30%">Order ID</th>
	<th width="70%"><center><?php echo $order_id; ?></th>
</tr>
<tr >

	<th width="30%">Total Bill</th>
	<th width="70%"><center>
	<?php

$order_id = $a; // replace with the desired order ID
$delivery_file = "Simple Ordering System in Java-20230224T023058Z-001/Simple Ordering System in Java/storage/order.txt";

$found = false;
$third_column = "";

$file_handle = fopen($delivery_file, "r");

if ($file_handle) {
    while (($line = fgets($file_handle)) !== false) {
        $columns = explode(",", $line);
        if ($columns[0] == $order_id) {
            $found = true;
            $third_column = $columns[1];
            break;
        }
    }

    fclose($file_handle);

    if ($found) {
        echo "Php " . $third_column;
    } else {
        echo "Order ID " . $order_id . " not found in the file.";
    }
} else {
    echo "Error opening file: " . $delivery_file;
}

?>
	
	
	</th>
</tr>
</table>


<tr >

	<th width="30%"><center></th>
	<th width="70%"><center>
	<br><br>
	<?php
	
	//start source code to easy get data from txtfile
$order_id = $a; // replace with the desired order ID
$delivery_file = "Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/costumerReceived.txt";

$found = false;
$third_column = "";

$file_handle = fopen($delivery_file, "r");
if ($file_handle) {
    while (($line = fgets($file_handle)) !== false) {
        $fields = explode(",", $line);
        if ($fields[0] == $order_id) {
            $third_column = $fields[1];
            $found = true;
            break;
        }
    }
    fclose($file_handle);
}

if ($found) {
    echo "<img src='../../Costumer/proof/".$third_column."' height='100%'";
} else {
    echo "Order ID ".$order_id." not found in ".$delivery_file;
}

	//end source code to easy get data from txtfile
?>
	
	</th>
</tr>
<br>
<br>
<table border="0" cellspacing="0">
<tr >

	<th width="60%"><center>
	
	</th>
</tr>

<tr >

	<th width="30%">Date Received Item</th>
	<th width="70%"><center>

	
	
<?php
$orderID = $a; // the order ID to search for

$filename = "Simple Ordering System in Java-20230224T023058Z-001/Simple Ordering System in Java/storage/costumerReceived.txt";

$handle = fopen($filename, "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $columns = explode(',', $line);
        // Check if the first column matches the search value
        if ($columns[0] == $orderID) {
            // Display the row in a table
           echo $columns[2];
   
            break; // stop searching after finding the first match
        }
    }
    fclose($handle);
}
?>
	
	
</th>
</tr>




</table>

<h1>LIST OF ORDERS</h1>
</center>
<?php





$deliveryFile = "Simple Ordering System in Java-20230224T023058Z-001/Simple Ordering System in Java/storage/delivery.txt";

$handle = fopen($deliveryFile, "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $columns = explode(',', $line);
        // Check if the first column matches the search value
        if ($columns[0] == $a) {
            // Display the Delivery Date
           
            break; // stop searching after finding the first match
        }
    }
    fclose($handle);
}
foreach($file as $line) {
    // Split the line into columns
    $columns = preg_split("/[-,\s:]/", $line);
	
//start code for search
$search_term = $columns[1]; // the term you want to search for

$rows = array(); // initialize an array to store matching rows

// read the contents of the text file into an array
$file_contents = file("Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/item.txt");

// loop through the array and search for matching rows
foreach ($file_contents as $line1) {
  $fields = explode(",", $line1); // split the row into separate fields
  if ($fields[0] == $search_term) { // compare the search term with the appropriate field
    $rows[] = $line1; // if there is a match, store the entire row in the new array
  }
  
}

// loop through the new array and display the matching rows
foreach ($rows as $row) {
  
}
//end code for search	
	//product price

$pattern = "/[-,\s:]/";
$components =preg_split($pattern,$row);

//end product price
	?>
	
	
	<?php
    // Check if the first column matches the search value
    if ($columns[0] == $searchValue) {
        // Display the row in a table
		$subtotal=$columns[2]*$components[1];
	//	echo $components[1];

        echo "<center>
		
		<table border='1' cellspacing='0'>";
       // echo "<tr><td>Item Number</td><td><center>" . $columns[0] . "</td></tr>";
		
       
        echo "<tr><th width='20%'>Item Name</th><td><center>" . $columns[1] . "</td></tr>";
        echo "<tr><th>Quantity</th><td><center>" . $columns[2] . "</td></tr>";
        echo "<tr><th>Item Price</th><td><center>".number_format($components[1],2)."</td></tr>";
        echo "<tr><th>Subtotal</th><td><center>" . number_format($subtotal,2) . "</td></tr>";
        echo "</table><br>";
    }
}

?>

<br><br>

<style>
.error{
	color:red;
}
</style>
	
<?php
$reason = "";
$reasonErr = "";

if (isset($_POST['btnReason'])) {
    // Validate if the reason is not empty
    if (empty($_POST['textarea'])) {
        $reasonErr = "Reason is required";
		$costumersNameErr="Name is Required !";
		
		
    } else {
        $reason = $_POST['textarea'];
        $costumersName=$_POST["costumersName"];
        $deliveryFile = "../IPT/Padilla_FileHandling/Simple Ordering System in Java-20230224T023058Z-001/Simple Ordering System in Java/storage/delivery.txt";
        $content = file_get_contents($deliveryFile);
        $lines = explode("\n", $content);

        foreach ($lines as &$line) {
            $columns = explode(",", $line);
            if ($columns[0] == $_POST['orderId']) {
                $columns[1] = "RETURNED";
                $line = implode(",", $columns);
            }
        }

        file_put_contents($deliveryFile, implode("\n", $lines));
        
        // Append the reason to costumerReturn.txt
        $returnFile = "../IPT/Padilla_FileHandling/Simple Ordering System in Java-20230224T023058Z-001/Simple Ordering System in Java/storage/costumerReturn.txt";
        $returnData = $_POST['orderId'] . "," . $reason;
        file_put_contents($returnFile, $returnData.",", FILE_APPEND);
        file_put_contents($returnFile,  $costumersName.",", FILE_APPEND);
        file_put_contents($returnFile, $current_time."\n", FILE_APPEND);

        echo "<script>alert('Reason For Return Successfully Sent !.');
                window.location='index.php';
              </script>";
    }
}

?>
<table>
<tr>
<td width='20%'></td>
<td><button onclick="window.location.href = 'DeliveryHistory.php';">BACK</button></td>


</tr>
</table>
<span class="error"><?php 
    echo $reasonErr;
    echo $reason;
?></span><br>

<style>
@media print {
  .navbar {
    display: none;
  }
}

</style>

<!--<div class="navbar"><button class="btn btn-primary" onclick="window.print()">Print</button></div>-->

<!--<button id="printPageButton"><h1   style="font-size:30px" id="printPageButton" onclick="window.print()">PRINT RECEIPT</h1></button> -->

</body>
<script>
        function printDiv() {
            var divContents = document.getElementById("GFG").innerHTML;
            var a = window.open('', '', 'height=5000, width=5000');
            a.document.write('<html>');
            a.document.write('<body > <h1><br>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
</html>
</div>

<!-- End of Div for auto update specific div -->
</center>

</body>

<!-- Script for auto update specific div -->
<script>
   $(document).ready(function(){
       var counter = 9;
   window.setInterval(function(){
    counter = counter - 3;
     if(counter>=0){
       document.getElementById('off').innerHTML=counter;
     }
     if (counter===0){
       counter=9;
     }
     $("#here").load(window.location.href + " #here" );
   }, 3000);
   });
</script>


<!-- End of Script for auto update specific div -->