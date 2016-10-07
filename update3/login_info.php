<?php
$userName = $_POST['username'];
$passWord = $_POST['password'];

if($userName == 'admin' and $passWord == 'admin123')
{
   echo("Your login has been successful.");
   echo("<br><br><a href='adminPanel.html'> Click Here </a>");
    echo("to procced to the admin panel.");
}

else
{
  echo("Your username or password is incorrect. Please try again.");
   echo("<br><br><a href='login.html'> Click here to go back to the login page </a>");
exit();
}

?>