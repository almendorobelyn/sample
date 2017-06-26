<?php

if(isset($_POST['search'])) {

	$valueToSearch = $_POST['valueToSearch'];

	$query = "SELECT * FROM user WHERE CONCAT ('id','name','age','gender') LIKE '%".$valueToSearch."%'";
	$search_result = filterTable($query);

}
else {
	$query = "SELECT * FROM user";
	$search_result = filterTable($query);
}

function filterTable($query)
{
	$connect = mysqli_connect("localhost", "root", "", "assesment");
	$filter_Result = mysqli_query($connect, $query);
	return $filter_Result;
}