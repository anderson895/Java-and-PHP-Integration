 <title>DELIVERY</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<?php

$a=$_GET["a"];

$cname=$address="";
$cnameErr=$addressErr="";

if(isset($_POST["cunfirmDeliver"])){
			
	if(empty($_POST["cname"])){
			$cnameErr="Costumer's name is Required!";
	}else{
		
		$cname=$_POST["cname"];
	}
	
	if(empty($_POST["cname"])){
		
			$addressErr="Address is Required Before deliver";
	}else{
				
		$address=$_POST["address"];
	}
	
	
	if($cname && $address){

    $item = file("../IPT/Padilla_FileHandling/Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/delivery.txt");
  date_default_timezone_set('Asia/Manila');
$current_time = date('M d-Y h:i:s A');

	

?><?php
$a=$_GET["a"];



$data="$a,Ongoing,$current_time\n";
$filename = '../IPT/Padilla_FileHandling/Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/delivery.txt';

// Read the contents of the file into an array
$file = file($filename);

// Loop through each line of the file
foreach ($file as &$line) {
    // Split the line into an array based on commas
    $fields = explode(',', $line);
    
    // If the first field matches the order ID we're looking for
    if ($fields[0] == $a) {
        // Check if the second field contains "RETURNED"
        if (strpos($fields[1], 'RETURNED') !== false) {
            // If it does, update the second column to "Ongoing"
            $line = "$fields[0],Ongoing,$current_time\n";
        } else {
            // Otherwise, add "Ongoing" to the second column
            $line = "$fields[0],$fields[1] Ongoing,$current_time\n";
        }
        
        // Write the updated line back to the file
        file_put_contents($filename, implode('', $file));
        
        // Exit the loop since we've found the line we're looking for
        break;
    }
}
	

echo "<script>alert('Delivery Successfully .');
	window.location='index.php';
 </script> ";
?>

<?php
$data="$a,Ongoing,$current_time,$cname,$address\n";
$fp = fopen('../IPT/Padilla_FileHandling/Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/delivery.txt', 'a');
fwrite($fp, $data);
fclose($fp);

echo "<script>alert('Delivery Successfully .');

	window.location='index.php';
 </script> ";
}
}
?>


<style>
  body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f2f2f2;
  }
  
  .Error {
    color: red;
  }
  
  .form-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  }
  
  form {
    text-align: center;
  }
  
  input[type="text"] {
    margin-bottom: 10px;
    padding: 10px;
    width: 300px; /* adjust to your desired width */
    border: none;
    border-radius: 3px;
    box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.2);
  }
  
  input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
  }
  
  input[type="submit"]:hover {
    background-color: #3e8e41;
  }

  /* Add button styles */
  button.back-btn {
    background-color: #ddd;
    color: #333;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-size: 16px;
    margin-right: 10px;
  }

  button.back-btn:hover {
    background-color: #ccc;
  }
    
	
	.back-btn {
  font-size: 16px;
  padding: 10px 20px;
  border-radius: 3px;
  border: none;
  cursor: pointer;
  background-color: #008CBA;
  color: white;
  margin-right: 10px;
}

.back-btn:hover {
  background-color: #3e8e41;
}

input[type="submit"] {
  font-size: 16px;
  padding: 10px 20px;
  border-radius: 3px;
  border: none;
  cursor: pointer;
  background-color: #4CAF50;
  color: white;
}

input[type="submit"]:hover {
  background-color: #3e8e41;
}


</style>
<div class="form-container">
  <form method="POST">
    <input type="text" placeholder="Enter name of customer" name="cname"><br>
    <span class="Error"><?php echo $cnameErr;?></span><br>
    <input type="text" placeholder="Enter address" name="address"><br>
    <span class="Error"><?php echo $addressErr;?></span><br><br>
    <input type="submit" name="cunfirmDeliver" value="Deliver">
    <!-- Replace the back button with a styled button -->
	<input class="back-btn" type="button" value="Back" onclick="location.href='delivery.php?a=<?php echo $a;?>'">

   
  </form>
</div>

