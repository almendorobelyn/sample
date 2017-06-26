<?php

include_once("config.php");

$result = mysqli_query($conn, "SELECT * FROM user ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>
    
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<style>
body{
    font-family: "Lato", sans-serif;
}

.hmbtn {
    width: auto;
    padding: 10px 18px;
    background-color: green;
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

  span.psw {
       display: block;
       float: none;
    }
    .hmbtn {
       width: 100%;
    }
}
</style>
</head>
<body>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span> <br> <br>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="logout.php">logout</a>
</div>



<div class="container">
<div class="w3-responsive">
<table class="w3-table-all" border="1">
<tr class="w3-green">
<td> name</td>
<td> age</td>
<td> gender</td>
<td> update</td>
</tr>


<?php

  while($res = mysqli_fetch_array($result)) { 
  echo "<tr>";
  echo "<td>".$res['name']."</td>";
  echo "<td>".$res['age']."</td>";
  echo "<td>".$res['gender']."</td>";
  echo "<td> <a href = \"edit.php? id=$res[id]\"> Edit </a> | <a href = \"delete.php? id=$res[id]\" onClick=\"return confirm ('Are you sure you want to delete this ? ') \"> Delete </a> </td>";
  }
  ?>
  </table>
</div>
</div>
<br><br>
    <button type="submit" class="hmbtn"><a href="create.html">  ADD NEW DATA </a> </button>


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