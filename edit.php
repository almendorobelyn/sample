<?php
include_once("config.php");

if(isset($_POST['update']))
{

	$id = mysqli_real_escape_string($conn, $_POST['id']);
	
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$age = mysqli_real_escape_string($conn, $_POST['age']);
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);


	if(empty($name) || empty($age) || empty($gender)) {

	if(empty($name)) {
		echo "name field is empty";
	}

	if(empty($age)) {
		echo "age field is empty";
	}

	if(empty($gender)) {
		echo "gender field is empty";
	}

	} else{

	$result = mysqli_query($conn, "UPDATE user SET name='$name',age='$age',gender='$gender' WHERE id=$id");

	header("Location: home.php");
	}
}

?>

<?php
$id = $_GET ['id'];

$result = mysqli_query($conn, "SELECT * FROM user WHERE id= $id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$age = $res['age'];
	$gender = $res['gender'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>
    
<head>
	<title> assesment</title>
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


<br> 

<form method="POST" name="form" action="edit.php">
	
<table width="50%" border="0">
	
		<tr> 
		<td> NAME </td>
		<td> <input type=" text" name="name" value="<?php echo $name;?>"> </td>
		</tr>

		<tr>
			<td> AGE </td>
			<td> <input type="int" name="age" value="<?php echo $age; ?>"> </td>
		</tr>

		<tr>
			<td> Gender </td>
			<td> <input type="text" name="gender" value="<?php echo $gender ?>"> </td>
		</tr>

		<tr>
		
			<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="update"></td>
		</tr>


</table>

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