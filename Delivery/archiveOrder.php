<?php

$a=$_GET["a"];

$orderId = $a; // replace with the actual order ID


?><?php

// read the contents of order.txt into a string
$orderFile = file_get_contents("../IPT/Padilla_FileHandling/Simple Ordering System in Java-20230224T023058Z-001/Simple Ordering System in Java/storage/order.txt");

// find the matching line using regex
if (preg_match("/^$orderId.*$/m", $orderFile, $matches)) {
    // replace the line with the same line followed by "ARCHIVE"
    $newLine = trim($matches[0]) . ",ARCH";
    $orderFile = str_replace($matches[0], $newLine, $orderFile);
}

// write the updated contents back to order.txt
file_put_contents("../IPT/Padilla_FileHandling/Simple Ordering System in Java-20230224T023058Z-001/Simple Ordering System in Java/storage/order.txt", $orderFile);

echo "<script>alert('Save To Archive Successfully .');
	window.location='index.php';
 </script> ";
?>
