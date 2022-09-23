 <?php

include('connectionData.txt');

try 
{	
	$dbh = new PDO('mysql:host='.$server.';port='.$port.';dbname='.$dbname, $user, $pass);
} catch (PDOException $e) {
	print $e->getMessage();
 	exit;
} 

?>

<html>
<head>
  <title>Another Simple PHP-MySQL Program</title>
  </head>
  
  <body bgcolor="white">
  
  
  <hr>
  
  
<?php
  
$state = $_POST['state'];

$query = "SELECT c.fname, c.lname, s.description
		FROM stores7.customer c LEFT JOIN stores7.orders o USING(customer_num)
		LEFT JOIN stores7.items i USING(order_num)
        	LEFT JOIN stores7.manufact m USING(manu_code)
        	LEFT JOIN stores7.stock s USING(stock_num)
		WHERE m.manu_name =  ";
$query = $query."'".$state."' ORDER BY 2;";

?>

<p>
The query:
<p>
<?php
print $query;
?>

<hr>
<p>
Result of query:
<p>

<?php

$result = $dbh->query($query);

if (!$result) 
{
	print "execution error: </br>";
	$error = $dbh->errorInfo();
    print($error[2]);
    exit;
}

      
print "<pre>";

while($row = $result->fetch())
{
    print "\n";
    print "$row[fname]         $row[lname]         $row[description]";
}
print "</pre>";

$dbh = null;i

?>

<p>
<hr>

<p>
<a href="findCustState.txt" >Contents</a>
of the PHP program that created this page. 	 
 
</body>
</html>
	  
