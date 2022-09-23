<?php

include('connectionData.txt');

$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die('Error connecting to MySQL server.');

?>

<!DOCTYPE html>

<html>
<head>
       <title>Duckquack---A book store</title>
       <link rel="stylesheet" href="style.css" />
       <style>
       		h3 {color: Green;}
       </style>
</head>

<body bgcolor="white">

<h3>
	<img src="duck.jpg" alt="duck logo" style= "float:left;width:42px;height:42px;">
	Welcome to Duckquac, the book store, hope you will find your book from here!

</h3>
<nav>	
	<a href="duck_main_page.html">HOME</a> | 
	<a href="books.html">BOOKS</a> | 
	<a href="find_order.html">FIND ORDER</a> | 
	<a href="manager.html">MANAGER PAGE</a> 

</nav>

<h2>Your order start with 2, for example 2xxx. (for test, order number start from 2003 to 2012 now)</h2>

<?php
  
$order_num = $_POST['order_num'];

$order_num = mysqli_real_escape_string($conn, $order_num);
// this is a small attempt to avoid SQL injection
// better to use prepared statements

$query = "SELECT o.order_num, o.customer_id, o.order_date, o.num_items, o.employee_ssn, o.total_price FROM Duck.Orders o WHERE o.order_num = ";
$query = $query."'".$order_num."' ORDER BY 2;";

?>
<?php
print $query;
?>

<?php
$result = mysqli_query($conn, $query)
or die(mysqli_error($conn));

print "<pre>";
while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
  {
    print "\n";
    print "$row[order_num] | $row[customer_id]  |  $row[order_date]  |  $row[num_items]  |  $row[employee_ssn]  |  $row[total_price]";
  }
print "</pre>";

mysqli_free_result($result);

mysqli_close($conn);

?>


	


<hr>

<p>
<a href="find_order_php.txt" >Contents</a>
of this page.
<p>Need help? call 800-xxx-xxxx <p>
<p>


</body>
</html>