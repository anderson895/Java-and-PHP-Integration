<head>
<title>SALES REPORT</title>
<link rel="stylesheet" href="style.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

a{
	text-decoration:none;
	color:red;
}


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
 .form-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  }
</style>
</head>
<?php
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

<div class="form-container">
<div id="here">
	<h1>SALES REPORT FOR <font color="red"><?php   echo $columns[2] ; ?></font></h1><br>
</center>
<?php    echo "<center>
		
		<table border='1'>";
     
       
    }
}?>


<?php


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
		<br>
		<br>
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

<?php
foreach($date as $line) {
    // Split the line into columns
    $columns = preg_split("/[-,\s:]/", $line);

    // Check if the first column matches the search value
    if ($columns[0] == $searchValue) {
        // Display the row in a table
     

?>
<strong>Total:<?php echo number_format($columns[1],2) ?></strong>
 <?php 
  }
}?>
<br><br>	<!--<button id="printPageButton"><h1   style="font-size:30px" id="printPageButton" onclick="window.print()">PRINT</h1></button> -->
<a href="deliveryRequest.php?a=<?php echo $a;?>" ><h1   style="font-size:30px" >DELIVERY</h1></a>
<a href="cancelDeliver.php?a=<?php echo $a;?>" ><h1   style="font-size:30px" >CANCEL DELIVER</h1></a>
</div>
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