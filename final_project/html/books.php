
 
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
  
//$state = $_POST['state'];

//$state = mysqli_real_escape_string($conn, $state);
// this is a small attempt to avoid SQL injection
// better to use prepared statements

$query = "SELECT b.book_id, b.book_name, b.description FROM Duck.Books b ";
//$query = $query."'".$state."' ORDER BY 2;";

?>

<h2>Books list:</h2>
	
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
    print "$row[book_id]    |    $row[book_name]    |   $row[description]";
  }
print "</pre>";

mysqli_free_result($result);

mysqli_close($conn);

?>


<hr>

<p>
<a href="books_php.txt" >Contents</a>
of this page.
<p>Need help? call 800-xxx-xxxx <p>
<p>


</body>
</html>