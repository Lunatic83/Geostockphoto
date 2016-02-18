<?php

// Opens a connection to a MySQL server
 
$connection=mysql_connect ("localhost", "root", "");
if (!$connection) {  die('Not connected : ' . mysql_error());}  
 
// Set the active MySQL database 
 
$db_selected = mysql_select_db("geostockphoto", $connection); 
if (!$db_selected) { 
  die ('Can\'t use db : ' . mysql_error()); 
}  
 
// Select all the rows in the markers table 

$query = "SELECT Product.idProduct, Photo.lat, Photo.lng
		FROM tbl_product Product, tbl_photo Photo WHERE Product.idProduct=Photo.idProduct"; 
//Non occorre fare la verifica su isPacket perchè se l'idProduct si trova anche nella tabella Photo allora non può essere un pacchetto
$result = mysql_query($query); 
if (!$result) {   
  die('Invalid query: ' . mysql_error()); 
}

// Start XML file, create parent node 
 
$dom = new DOMDocument("1.0"); 
$node = $dom->createElement("markers"); 
$parnode = $dom->appendChild($node);
 
header("Content-type: text/xml");  
 
// Iterate through the rows, adding XML nodes for each 
 
while ($row = @mysql_fetch_assoc($result)){   
  // ADD TO XML DOCUMENT NODE   
  $node = $dom->createElement("marker");   
  $newnode = $parnode->appendChild($node);    
  $newnode->setAttribute("idProduct",$row['idProduct']);   
  $newnode->setAttribute("lat", $row['lat']);   
  $newnode->setAttribute("lng", $row['lng']);
} 

echo $dom->saveXML();

mysql_close($connection);

?>