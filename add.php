<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>

</head>
<style>
body{
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    right: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 8px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span> <br> <br>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="logout.php">logout</a>
</div>

<?php
include_once("config.php");

if(isset($_POST['submit'])) {
$name = mysqli_real_escape_string($conn, $_POST['name']);
$age = mysqli_real_escape_string($conn, $_POST['age']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);

if (empty($name) || empty($age) || empty($gender)) {

    if (empty($name)) {
        echo "Name field is empty.<br/>";
    }

    if (empty($age)) {
        echo "Age filed is empty.<br/>";
    }   

    if (empty($gender)) {
        echo "Gender field is empty.";
    }

    echo "<a href='javascript:self.history.back();'> View result </a>";


        } else {


    $result = mysqli_query($conn, "INSERT INTO user (name, age, gender) VALUES('$name','$age','$gender')");

    echo "Data added succesfully.";
    echo "<br/> <a href ='home.php'> View Result </a>";
    }
}

?>

</form>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "200px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
</body>
</html>