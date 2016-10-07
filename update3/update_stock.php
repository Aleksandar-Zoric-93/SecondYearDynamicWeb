<?php

$stockID = $_POST['StockID'];
$qty = $_POST['Qty'];

if ($stockID == ''  or $qty == '')
{
echo("You did not complete the form correctly <br />\n
      <br><br><a href='adminPanel.html'> Click here to go back to the homepage </a>");
exit();
} 



else
{
$dbcnx = mysqli_connect("localhost", "root", "", "projectData");




// Check connection
 if (mysqli_connect_errno($dbcnx ))
  {echo "Failed to connect to MySQL: " .mysqli_connect_error();
   exit();
}



if ($_POST['submitdetails'] == "Add Stock") {

$sql = "UPDATE stock SET Qty = Qty + $qty WHERE StockID = $stockID";
$res = mysqli_query($dbcnx, $sql);







if ($res == 0) 
      {
        echo("<p>Error updating stock level: ".mysqli_error($dbcnx)."</p>");
      }




else
      {
      echo(" You have been sucessfully updated the stock level!");
	echo("<br><br><a href='adminPanel.html'> Click here to go back to the homepage </a>");
      }
 
}mysqli_close($dbcnx);}	

?>