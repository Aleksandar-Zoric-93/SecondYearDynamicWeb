<?php

$dbcnx = mysqli_connect("localhost", "root", "", "projectData");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}

 $ordid= (int) $_POST['id'];
$sql = "SELECT * from orders where OrdID = $ordid ";
$res = mysqli_query($dbcnx, $sql);
if ( !$res ) {
        echo('Query failed ' . $sql . ' Error:' . mysqli_error());
        exit();
    }

  
else
	{
  
  if(mysqli_num_rows($res)< 1){
  $display_block = "<p><em> No Orders found with this Order ID</em></p>";  }
  else
  {
   //create the display string
   $display_block = <<<END_OF_TEXT
   <table>
   <tr>
   <th>Order ID</th>
   <th>Order Value</td>
   </tr>
END_OF_TEXT;
   
   while($order_info=mysqli_fetch_array($res)){
   
   $ordid = $order_info['OrdID'];
   $ordValue = stripslashes($order_info['ordValue']);
   
   //add to display
      $display_block .= <<<END_OF_TEXT
      <tr><td>$ordid</td>
      <td> €$ordValue</td>
      </tr>
END_OF_TEXT;
      
   
   }
  //free results
  mysqli_free_result($res);
  
  //close connection
  mysqli_close($dbcnx);
   $display_block .="</table>";
  }
  
  }

	?>
  <!DOCTYPE html>
  <html>
  <head>
  <title> Select Orders</title>
  <style type="text/css">
  table{
  border: 1px solid black;
  border-collapse:collapse;
  
  
  }
    th{
    border: 1px solid black;
    padding:6px;
    font-weight:bold;
    background:#ccc;
   }
  td{
   border: 1px solid black;
    padding:6px;
  }
  </style>
  </head>
  <body>
  <h1> Orders </h1>
  <?php echo $display_block; ?>
  </body>
  <br><br><a href='index.html'> Click here to go back to the homepage </a> 
  </html>