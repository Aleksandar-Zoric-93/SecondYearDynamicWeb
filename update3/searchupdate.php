<?php


$dbcnx = mysqli_connect("localhost", "root", "", "projectData");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}


$sql ="SELECT * FROM customers";
$res = mysqli_query($dbcnx, $sql);
if ( !$res ) {
        echo('Query failed ' . $sql . ' Error:' . mysqli_error($dbcnx));
        exit();
    }


	else
	{
  
  if(mysqli_num_rows($res)< 1){
  $display_block = "<p><em> No Members</em></p>";  }
  else
  {


echo "<br /><b>A Quick View</b><br /><br />";
echo "<table border=1>";
echo "<tr><td><b>Member ID</b></td>
<td>Forename:</td><td>Email</td></tr>";

while ($row = mysqli_fetch_array($res)) {

echo ("<tr><td>");
echo $row['CustID'];
echo("</td><td>");
echo $row['Forename'];
echo("</td><td>");
echo $row['email'];
echo("</td></tr>");
} 
echo "</table>";

}  

 //free results
  mysqli_free_result($res);
  
  //close connection
  mysqli_close($dbcnx);}
  echo("<br><br><a href='adminPanel.html'> Click here to go back to the homepage </a>");
?>

<br /><br />


