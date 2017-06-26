<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
<style>
    form {
    border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>

    <body>
                        
                    
                    
                                <h3>login now</h3>
                                  <p>Enter username and password to log on:</p>
                             
                            <form role="form" action = "loginprocess.php" method = "post">
                          
                              
                                <label class="sr-only" for="username">Username</label>
                                  <input type="text" name="username" placeholder="Username..." class=" form-control" id="username">
                              
                                  <label class="sr-only" for="password">Password</label>
                                  <input type="password" name="password" placeholder="Password..." class="form-control" id="password">
                         
                                <button type="submit" class="btn" name="submit">Sign in!</button>

                                        <?php
                                            include 'config.php'; //connect the connection page
                                                if(empty($_SESSION)) // if the session not yet started 
                                                     session_start();


                                            if(isset($_SESSION['username'])) { // if already login
                                                header("location:home.php"); // send to home page
                                                    exit; 
                                            }

                                            ?>
                            </form> <br><br>
                         
                                <h3>Sign up now</h3>
                                  <p>Fill in the form below to get instant access:</p>
                              
                            <form role="form" action="" method="post" class="registration-form">
                           
                             
                                <label class="sr-only" for="Fname">First name</label>
                                  <input type="text" name="Fname" placeholder="First name..." class="form-control" id="Fname">
                                
                                  <label class="sr-only" for="Lname">Last name</label>
                                  <input type="text" name="Lname" placeholder="Last name..." class="form-control" id="Lname">
                             
                                            <label class="sr-only" for="email">Email</label>
                                            <input type="text" name="email" placeholder="Email..." class="form-control" id="email">
                                        
                                  <label class="sr-only" for="username">Username</label>
                                  <input type="text" name="username" placeholder="Username..." class="form-control" id="username">
                          
                                            <label class="sr-only" for="password">Password</label>
                                            <input type="password" name="password" placeholder="Password..." class="form-control" id="password">
                                        
                                
                                <button type="submit" class="btn" name="submit">Sign me up!</button>

<?php
if (isset($_POST['submit']))
  {    
  include 'config.php'; //connection 
      
      //if you want to add another textbox and save it to the database you can get the value with this format $variablename= $_POST['name of the textbox on input type'];
      $Fname = $_POST['Fname'] ;
      $Lname = $_POST['Lname'] ;
      $username = $_POST['username'] ;
      $password = $_POST['password'] ; 
      $email = $_POST['email'] ;    

    $count=0;
    $res=mysqli_query($conn, "SELECT * FROM volley WHERE username = '".$_POST['username']."'");
    $count=mysqli_num_rows($res);
     

 if ($count>0)
  {
    ?>
  <script type="text/javascript">
      alert("This username already exist please choose another");
  </script>
  <?php

    }

    else

    {

      mysqli_query($conn,"INSERT INTO volley (id,Fname,Lname,username,password,email) VALUES ('','$Fname','$Lname','$username','$password','$email')");  //sql statement for inserting records to the database
    

  ?>
  <script type="text/javascript">
  alert("Successfully Registered!");
  </script>
  <?php
    }
}

?>

                           </form>
                        
    </body>

</html>