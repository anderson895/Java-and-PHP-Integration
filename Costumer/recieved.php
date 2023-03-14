
<head>
<title>Received</title>
<link rel="stylesheet" href="style.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<style>
.backgroundReceipt {
  background-color: #f0f0f0;
  border-radius: 5px;
  padding: 10px;
  margin: 20px 0;
}



a{
	text-decoration:none;
	color:red;
}


table {
  border-collapse: collapse;
}

table td, table th {
  padding: 0.5rem;
  border: none;
}

body {
  background-color: #fff;
  color: #000;
  font-family: sans-serif;
}
.table-background {
  background-color: #F8F8F8;
  border-radius: 5px;
  padding: 10px;
}
@media screen and (max-width: 600px) {
  /* styles for screens narrower than 600px */
  table {
    font-size: 12px;
    width: 100%;
  }
}


form {
  display: flex;
  flex-direction: column;
  width: 300px;
  margin: 0 auto;
}

label {
  font-size: 2rem;
  margin-bottom: 0.5rem;
}

input,
textarea {
  padding: 0.5rem;
  margin-bottom: 1rem;
  border: none;
  border-radius: 0.25rem;
  box-shadow: 0 0 0 1px #ddd;
  font-size: 1rem;
}

button[type="submit"] {
  padding: 0.5rem;
  border: none;
  border-radius: 0.25rem;
  background-color: #4CAF50;
  color: white;
  font-size: 1rem;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #3e8e41;
}


.submit-btn {
  background-color: #4CAF50;
  border: none; /* remove border */
  color: white; /* set text color */
  padding: 10px 20px; /* set padding */
  font-size: 16px; /* set font size */
  transition: background-color 0.3s ease; /* add transition effect */
}

.submit-btn:hover {
  background-color: #16a085; /* change background color on hover */
}

</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<?php

error_reporting(0);
include ("header.php");
// Open your file in read mode
$file = file("../IPT/Padilla_FileHandling/Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/orderline.txt");
$date = file("../IPT/Padilla_FileHandling/Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/order.txt");
$item = file("../IPT/Padilla_FileHandling/Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/item.txt");


$a=$_GET["a"];





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
	<div class="backgroundReceipt">
	<h1> RECEIVE DATE<Br> <font color="red"><?php 
	
   date_default_timezone_set('Asia/Manila');
$current_time = date('M d-Y h:i:s A');

	
	echo $current_time
	?></font></h1><br>
</center>
<?php
$orderdate=$columns[2];

    echo "<center>
		
		<table class='table-background' border='1'>";
     
       
    }
}?>


<?php
$deliveryFile = "../IPT/Padilla_FileHandling/Simple Ordering System in Java-20230224T023058Z-001/Simple Ordering System in Java/storage/delivery.txt";

$handle = fopen($deliveryFile, "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $columns = explode(',', $line);
        // Check if the first column matches the search value
        if ($columns[0] == $a) {
            // Display the Delivery Date
            echo "<b>DELIVERY DATE: </b>" . $columns[2] . "<br>";
            echo "<b>ADDRESS: </b>" . $columns[4] . "<br>";
            echo "<b>COSTUMER NAME: </b>" . $columns[3] . "<br><br>";
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
$file_contents = file("../IPT/Padilla_FileHandling/Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/item.txt");

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
	
    // Check if the first column matches the search value
    if ($columns[0] == $searchValue) {
        // Display the row in a table
		$subtotal=$columns[2]*$components[1];
	//	echo $components[1];

        echo "<center>
		
		<table border='1' cellspacing='0'>";
       // echo "<tr><td>Item Number</td><td><center>" . $columns[0] . "</td></tr>";
		
        echo "<tr><th width='20%'>Order Date</th><td><center>" . $orderdate . "</td></tr>";
        echo "<tr><th width='20%'>Item Name</th><td><center>" . $columns[1] . "</td></tr>";
        echo "<tr><th>Quantity</th><td><center>" . $columns[2] . "</td></tr>";
        echo "<tr><th>Item Price</th><td><center>".number_format($components[1],2)."</td></tr>";
        echo "<tr><th>Subtotal</th><td><center>" . number_format($subtotal,2) . "</td></tr>";
        echo "</table><br>";
    }
}

?>

<?php
foreach($date as $line) {
    // Split the line into columns
    $columns = preg_split("/[-,\s:]/", $line);

    // Check if the first column matches the search value
    if ($columns[0] == $searchValue) {
        // Display the row in a table
     

?>
<h2>Total:<?php echo number_format($columns[1],2);?>
 
 
 
 </h2>
 <?php 
 
}
}?>
<br><br>

<style>
.error{
	color:red;
}
</style>	
<?php
$payment = "";
$paymentErr = "";

if (isset($_POST['btnPayment'])) {
    // Check if an image file was uploaded
    if (!empty($_FILES['payment']['name'])) {
        $file_name = $_FILES['payment']['name'];
        $file_tmp = $_FILES['payment']['tmp_name'];
        $file_type = $_FILES['payment']['type'];
        $file_ext = strtolower(end(explode('.',$_FILES['payment']['name'])));
        $extensions = array("jpeg","jpg","png");
       if(in_array($file_ext,$extensions) === false){
    $paymentErr = "Extension not allowed, please choose a JPEG or PNG file.";
} else {
    $upload_dir = 'proof/';
    $upload_file = $upload_dir . basename($file_name);
    move_uploaded_file($file_tmp, $upload_file);
    $payment = basename($upload_file);
}
    }
    // Validate if the payment is not empty
    if (empty($payment)) {
        $paymentErr = "Proof of Payment is required";
    } else {
        $deliveryFile = "../IPT/Padilla_FileHandling/Simple Ordering System in Java-20230224T023058Z-001/Simple Ordering System in Java/storage/delivery.txt";
        $content = file_get_contents($deliveryFile);
        $lines = explode("\n", $content);

        foreach ($lines as &$line) {
            $columns = explode(",", $line);
            if ($columns[0] == $_POST['orderId']) {
                $columns[1] = "DELIVERED";
                $line = implode(",", $columns);
            }
        }

        file_put_contents($deliveryFile, implode("\n", $lines));
        
        // Get the total bill from Order.txt
        $totalFile = "../IPT/Padilla_FileHandling/Simple Ordering System in Java-20230224T023058Z-001/Simple Ordering System in Java/storage/Order.txt";
        $totalContent = file_get_contents($totalFile);
        $totalLines = explode("\n", $totalContent);

        foreach ($totalLines as $totalLine) {
            $totalColumns = explode(",", $totalLine);
            if ($totalColumns[0] == $_POST['orderId']) {
                $totalBill = $totalColumns[1];
                break;
            }
        }
		
        // Check if the payment is enough to cover the total bill
       
            // Calculate the remaining balance
            
            $returnData = $_POST['orderId'] ."," .$payment.",".$current_time."\n";
            

            // Append the payment to costumerReturn.txt
            $returnFile = "../IPT/Padilla_FileHandling/Simple Ordering System in Java-20230224T023058Z-001/Simple Ordering System in Java/storage/costumerReceived.txt";
            file_put_contents($returnFile, $returnData, FILE_APPEND);
			
	
          echo "<script>alert('Payment Record successfully !');
               window.location='index.php';
                </script>";
       
    }
}
?>
<span class="error"><?php echo $paymentErr; ?></span><br>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="payment">
	<br>
	<br>
    <label>SEND PROOF OF PAYMENT :</label>
	
    <br>
    <input type="hidden" name="updateStatus" >
    <input type="hidden" id="orderId" name="orderId" value="<?php echo $a ?>">
   
    <input class="submit-btn" type="submit" name="btnPayment" value="SEND">
</form>
<!--<button id="printPageButton"><h1   style="font-size:30px" id="printPageButton" onclick="window.print()">PRINT RECEIPT</h1></button> -->
</div>
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