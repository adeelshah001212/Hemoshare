<?php 
$con = mysqli_connect("localhost", "root", "", "project");

$name=$_POST['name'];
$father=$_POST['f-name'];
$email = $_POST['email'];
$age=$_POST['age'];
$num = $_POST['num'];
$bg = $_POST['bg'];
$location= $_POST['location'];
$address= $_POST['address'];
$query = "UPDATE donordata SET name='$name',fathername='$father',email='$email',age='$age',phone='$num',bg='$bg',location='$location',address='$address' ";
$result = mysqli_query($con,$query);
header("location:dashboard.php");
?>