<?php

$csurname = $_POST['csurname'];
$cforename = $_POST['cforename'];
$cemail = $_POST['cemail'];
$cdate = $_POST['cdate'];

if ($csurname == ''  or $cforename == '' or $cemail == '' or  $cdate == '')
{
echo("You did not complete the form correctly <br />\n
      <br><br><a href='index.html'> Click here to go back to the homepage </a>");
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



if ($_POST['submitdetails'] == "SUBMIT") {

$csurname = mysqli_real_escape_string($dbcnx, $csurname);
$cforename = mysqli_real_escape_string($dbcnx, $cforename);
$sql = "INSERT INTO customers(Surname, Forename, email, regDate) VALUES('$csurname', '$cforename', '$cemail', '$cdate')";
$res = mysqli_query($dbcnx, $sql);







if ($res == 0) 
      {
        echo("<p>Error registering: ".mysqli_error($dbcnx)."</p>");
      }




else
      {
      echo(" You have been sucessfully registered!");
	echo("<br><br><a href='index.html'> Click here to go back to the homepage </a>");
      }
 
}mysqli_close($dbcnx);}	




?>