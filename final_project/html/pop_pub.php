<?php

include('connectionData.txt');

$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die('Error connecting to MySQL server.');

?>

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
	Welcome to Duckquack, the book store, hope you will find your book from here!

</h3>
<nav>	
	<a href="duck_main_page.html">HOME</a> | 
	<a href="books.html">BOOKS</a> | 
	<a href="find_order.html">FIND ORDER</a> | 
	<a href="manager.html">MANAGER PAGE</a> 

</nav>



<hr>


<?php

$query = "SELECT p.publisher_num, p.name, p.address, p.city, p.state, p.phone_number FROM Duck.Publisher p JOIN 
(SELECT od.book_id, b.book_name, b.publisher_num, COUNT(quantity_ordered) AS num_sold 
	FROM Duck.Order_details od JOIN Duck.Books b ON od.book_id = b.book_id
    GROUP BY od.book_id
    ORDER BY num_sold Desc
    LIMIT 1) AS pop_pub
WHERE p.publisher_num = pop_pub.publisher_num ";

?>

<h2>Hi manager, the popular publisher is: </h2>

<?php
$result = mysqli_query($conn, $query)
or die(mysqli_error($conn));

print "<pre>";
while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
  {
    print "\n";
    print "Table: {$row[publisher_num]}  {$row[name]}    {$row[address]}   {$row[city]}   {$row[state]}   {$row[phone_number]}\n";
  }
print "</pre>";

mysqli_free_result($result);

mysqli_close($conn);

?>
	


<hr>

<p>
<a href="pop_pub.txt" >Contents</a>
of this page.
<p>Need help? call 800-xxx-xxxx <p>
<p>


</body>
</html>