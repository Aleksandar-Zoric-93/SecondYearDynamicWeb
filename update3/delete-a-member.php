<?php
$CustID = $_POST['CustID'];

if ($CustID == '' or !is_numeric($CustID))
{
echo("You did not complete the delete form correctly <br />\n
      <br><br><a href='adminPanel.html'> Click here to go back to the homepage </a>");
exit();
}

else
{
$dbcnx = mysqli_connect("localhost", "root", "", "projectData");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}

$sql = "DELETE from customers WHERE CustID = $CustID";
$res = mysqli_query($dbcnx, $sql);   

if($res){
		$count = mysqli_affected_rows($dbcnx);
	}
	if($count>0){
             echo("Member no. "  . " ". $CustID. " " . "has been deleted successfully\n");
             }
     else{
             echo "No such record deleted as the member does not exist in our database.<br>
                    Make sure the member ID is correct.";
          }
     
     mysqli_close($dbcnx);	
     }	
    
    echo("<br><br><a href='adminPanel.html'> Click here to go back to the homepage </a>");

?>