<head>
<title>SALES REPORT</title>
<link rel="stylesheet" href="style.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php
include ("header.php");
// Open your file in read mode
$file = file("Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/orderline.txt");
$date = file("Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/order.txt");
$item = file("Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/item.txt");


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
<br><br>	<button id="printPageButton"><h1   style="font-size:30px" id="printPageButton" onclick="window.print()">PRINT</h1></button>
	
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