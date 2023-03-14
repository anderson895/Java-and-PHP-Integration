<?php

$a=$_GET["a"];

$orderId = $a; // replace with the actual order ID
// read the contents of order.txt into an array
$orderFile = file("../IPT/Padilla_FileHandling/Simple Ordering System in Java-20230224T023058Z-001/Simple Ordering System in Java/storage/order.txt");

// loop through the array to find the matching line
foreach ($orderFile as $key => $line) {
    if (strpos($line, $orderId) !== false) {
        // remove the line from the array
        unset($orderFile[$key]);
        break;
    }
}

// write the updated contents back to order.txt
file_put_contents("../IPT/Padilla_FileHandling/Simple Ordering System in Java-20230224T023058Z-001/Simple Ordering System in Java/storage/order.txt", implode("", $orderFile));

echo "<script>alert('Delete Successfully .');
	window.location='index.php';
 </script> ";
?>
