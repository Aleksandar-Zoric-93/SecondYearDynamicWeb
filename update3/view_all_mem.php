<?php

$dbcnx = mysqli_connect("localhost", "root", "", "projectData");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}


$sql = "SELECT * from customers";
$res = mysqli_query($dbcnx, $sql);
if ( !$res ) {
        echo('Query failed ' . $sql . ' Error:' . mysqli_error());
        exit();
    }

  
else
	{
  
  if(mysqli_num_rows($res)< 1){
  $display_block = "<p><em> No Members found</em></p>";  }
  else
  {
   //create the display string
   $display_block = <<<END_OF_TEXT
   <table>
   <tr>
   <th>Member ID</th>
   <th>Forename</td>
   </tr>
END_OF_TEXT;
   
   while($member_info=mysqli_fetch_array($res)){
   
   $memid=$member_info['CustID'];
   $memName=stripslashes($member_info['Forename']);
   
   //add to display
      $display_block .= <<<END_OF_TEXT
      <tr><td>$memid</td>
      <td>$memName</td>
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
  <title>Select Member</title>
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
  <h1> Member </h1>
  <?php echo $display_block; ?>
  </body>
  
    <br><br><a href='adminPanel.html'> Click here to go back to the Panel Page </a>
  </html>