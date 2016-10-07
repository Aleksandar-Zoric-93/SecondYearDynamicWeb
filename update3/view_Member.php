<?php
$dbcnx = mysqli_connect("localhost", "root", "", "projectData");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}



$CustID = $_POST['id'];
$sql = "SELECT * from customers where CustID =$CustID";

if (!is_numeric($CustID))
{
echo("The value you entered is not valid!<br />\n");
echo("<br><a href='adminPanel.html'> Click here to go back to the Admin Panel </a>"); 
exit();
} 



$res = mysqli_query($dbcnx, $sql);
if ( !$res ) {
        echo('Query failed ' . $sql . ' Error:' . mysqli_error());
        exit();
    }

  
else
	{
  
  if(mysqli_num_rows($res)< 1){
  $display_block = "<p><em> A Member does not exist with this ID number</em></p>";  }
  else
  {
   $display_block = <<<END_OF_TEXT
   <table>
   <tr>
   <th>Customer ID</th>
   <th>Surname</td>
   <th>Forename</td>
   </tr>
END_OF_TEXT;
   
   while($customer_info=mysqli_fetch_array($res)){
   
   $CustID=$customer_info['CustID'];
   $Surname=stripslashes($customer_info['Surname']);
   $Forename=stripslashes($customer_info['Forename']);
   
      $display_block .= <<<END_OF_TEXT
      <tr><td>$CustID</td>
      <td>$Surname</td>
       <td>$Forename</td>
      </tr>
END_OF_TEXT;
      
   
   }
  
  mysqli_free_result($res);
  
  
  mysqli_close($dbcnx);
   $display_block .="</table>";
  }
  
  }

	?>
  <!DOCTYPE html>
  <html>
  <head>
  <title>Current Members</title>
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
  <h1> Current Members </h1>
  <?php echo $display_block;
  echo("<br><br><a href='adminPanel.html'> Click here to go back to the Admin Panel </a>"); ?>
  </body>
  </html>