<?php

$a=$_GET["a"];
$order_id = $a; // replace with the desired order ID
$delivery_file = "../IPT/Padilla_FileHandling/Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/delivery.txt";

// Read the file content
$content = file_get_contents($delivery_file);
$lines = explode("\n", $content);

// Update the matching order status
foreach ($lines as &$line) {
    $columns = explode(",", $line);
    if ($columns[0] == $order_id) {
        $columns[1] = "PAID";
        $line = implode(",", $columns);
        break;
    }
}

// Write the updated content back to the file
file_put_contents($delivery_file, implode("\n", $lines));


echo "<script>alert('Payment Cunfirmation Successfully .');
	window.location='index.php';
 </script> ";
?>
