<!DOCTYPE html>
<html>
<head>
   <title>SSTS - Login Reset</title>

    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="signin.css" rel="stylesheet">
</head>

<body>

<img src="ssts_logo.png" class="logo" width="240" height="144"/>

<h1 class="form-signin-heading">Simulated Stock <br/>Trading System</h1>
<p class="signin-message">Password Reset</p>
<?php
  // include the proper logging mechanisms
  include 
    '/home/ssts/simulatedstocktradingsystem/Logging/LoggingEngine.php';
  
  // connect to the database
  require_once 'creds.php';
  $mysqli = new mysqli ($host, $user, $pass, $db);
  
  // get username and password entered
  // trim whitespaces at the front and back
  $username=trim($_POST['username']);
  $newpassword=trim($_POST['newpassword']);
  // check for connection error
  if($mysqli->connect_error) 	
    die($mysqli->connect_error);

  // check to see if the form was completed
  if ($username!='' && $newpassword !='') {
    // check to see if the username exists
    $stmt=$mysqli->prepare('select username
      from users where username = ?;');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->bind_result($result);
    $stmt->fetch();
    $stmt->close();
    if($result) {
      $token=hash('ripemd128', "$username$newpassword");
      $stmt=$mysqli->prepare('update users set password=? where 
      username=?;');
      $stmt->bind_param('ss', $token, $username);
      $stmt->execute();
      $stmt->close();
      echo '<span class="signin-message">Password updated</span>';
    } else {
       echo '<p class="signin-message text-danger">'.$username . ' has not registered</p>'; 
    }
  }
  $mysqli->close();
?>

<!--    Registration Form             -->
<form method="post" action="recover_login.php" class="form-signin"> 
   <input type="text" name="username" class="form-control" 
     placeholder="Username" required autofocus/> <br/>
   <input type="password" name="newpassword" class="form-control" 
     placeholder="New Password" required /> <br/>
   <input type="submit" class="btn btn-lg btn-primary btn-block">
</form>

<!-- Link to the login page           --> 
<p class="signin-message"><a href="http://pluto.hood.edu/~ssts">Home</a></p>
</body>
</html>
