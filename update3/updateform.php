<?php

// Connect to the database server
$dbcnx = mysqli_connect("localhost", "root", "", "projectData");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}


$id=$_POST['record'];

$sql="SELECT * FROM customers WHERE CustID=$id";

$res = mysqli_query($dbcnx, $sql);
if ( !$res ) {
        echo('Query failed ' . $sql . ' Error:' . mysqli_error($dbcnx));
        exit();
    }


else 
{
$row = mysqli_fetch_array($res); 
$name=$row['Forename'];
$email=$row['email'];

}
//free results
  mysqli_free_result($res);
  
  //close connection
  mysqli_close($dbcnx);
?>

<form action="updated.php" method="post">
<input type="hidden" name="ud_id" value="<?php echo $id; ?>">
Forename: <input type="text" name="ud_name" value="<?php echo $name; ?>"><br />
Email: <input type="text" name="ud_email" value="<?php echo $email; ?>"><br />


<input type="Submit" value="Update">
</form>










</body>

</html>
