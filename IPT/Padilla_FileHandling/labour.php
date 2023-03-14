<?php
  
include ("header.php");
    // Open your file in read mode
   $file = file("Simple Ordering System in Java-20230224T023058Z-001\Simple Ordering System in Java\storage/labour.txt");
  
    // Display a line of the file until the end 
   
	//sort($file);
	
	//print_r($file[1]); 
	
	
	
	/*<a href="report.php?id=<?php print_r(count($file[2])); ?>'">ITEM</a>*/
	
?>

<html>
<head>

<title>ITEM DETAILS</title>
<link rel="stylesheet" href="style.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
.a{
	text-decoration:none;
}
.a:hover {

background-color:yellow; 

}

</style>

<body>


<center>


<h1>EMPLOYEE <br> DETAILS </h1>
<br>

<!-- Div for auto update specific div -->
<div id="here">
<form method="post">

<?php 

$pattern = "/[-,\s:]/";

if(empty($file)){
	
	echo "<h1 style='color:red;'> Employee Management is EMPTY </h1>";
	
}else{
	
    // Display table header row
	$oneHeader=false;	
	
foreach($file as $x => $val) {
	
	 $itemname = preg_split ($pattern,$file[$x]);
 
		
	     // Display table header row if not displayed yet
	 if (!$oneHeader) {	
	 
	 echo " 
	<table border='1' cellspacing='0'>
	
	
	<tr><th width='300vh' height='50'>Labour ID</th><th width='300vh'><center>Employee Name</th>    <th width='300vh'><center>Employee Salary</th></tr>
	";
		$oneHeader=true;
	}
	     // Display table row for each item
	echo "<tr><td> $itemname[0]. </td><td> <center>".$itemname[1]."</td> <td><center>".number_format($itemname[2],2)."</td><tr> <br>
	
	
	";
}
	if($oneHeader){
		echo "</table>";
	}
	
}
	//echo "<br>".$itemname[2];

?>
</form>
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
</html>