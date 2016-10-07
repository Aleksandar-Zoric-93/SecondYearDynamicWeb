<?php

// Connect to the database server
$dbcnx = mysqli_connect("localhost", "root", "", "projectData");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}



$ud_id=$_POST['ud_id'];
$ud_name=$_POST['ud_name'];
$ud_email=$_POST['ud_email'];

$sql="UPDATE customers SET Forename ='$ud_name', email ='$ud_email' WHERE CustID=$ud_id";

$res = mysqli_query($dbcnx, $sql);
if ( !$res ) {
        echo('Query failed ' . $sql . ' Error:' . mysqli_error());
        exit();
    }

else
	{
  echo $res;
  if(mysqli_affected_rows($dbcnx)< 1){
  
  echo "<p><em> No updates</em></p>";  }
  else
  {
echo " Record Updated";
echo "<br><br><a href='searchupdate.php'> Home </a>" ;
}
  mysqli_close($dbcnx);

}
?>