<?php
include 'config.php'; //connect the connection page
  
if(empty($_SESSION)) // if the session not yet started 
   session_start();
if(!isset($_POST['submit'])) { // if the form not yet submitted
   header("Location: loginregister.php");
   exit; 
}
//check if the username entered is in the database.
$query_result = mysqli_query($conn, "SELECT * FROM volley WHERE username = '".$_POST['username']."'");
//conditions
if(mysqli_num_rows($query_result)==0) {
//if username entered not yet exists
    ?>
    <script type="text/javascript">
      alert("this username you entered is Invalid!");
    </script>
    <?php
}
else {
//if exists, then extract the password.
    while($row_query = mysqli_fetch_array($query_result)) {
        // check if password are equal

        if($row_query['password']==$_POST['password']){
            $_SESSION['password']==$_POST['password'];
            header("Location: home.php");
            exit; 
        } else{ // if not
            ?>
            <script type="text/javascript">
              alert("this password you entered is Invalid!");
            </script>
            <?php
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>
<p><button><a href="loginregister.php"><h1> BACK </h1><a></button></p>
</body>
</html>