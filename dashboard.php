<?php
session_start();  
$con = mysqli_connect("localhost", "root", "", "project");
if(isset($_SESSION['email'])){
$email = $_SESSION['email'];
  ?>


<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
<div class="container">
<?php
$select ="SELECT * from donordata where email='$email'";
$result=mysqli_query($con,$select);

?>


<div class="table-responsive-lg">
  <table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Father Name</th>
        <th scope="col">Age</th>
        <th scope="col">Phone Number  </th>
        <th scope="col">Blood Donation</th>
        <th scope="col">Images</th>
        <th scope="col">Location</th>
        <th scope="col">Address</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($data = mysqli_fetch_assoc($result)){
      ?>
      <tr class="">
        <td scope="row"><?php echo $data['name']?></td>
        <td scope="row"><?php echo $data['fathername']?></td>
        <td scope="row"><?php echo $data['age']?></td>
        <td scope="row"><?php echo $data['phone']?></td>
        <td scope="row"><?php echo $data['bg']?></td>
        <td scope="row"><?php echo $data['images']?></td>
        <td scope="row"><?php echo $data['location']?></td>
        <td scope="row"><?php echo $data['address']?></td>
        <a href="updated.php?id=<?php echo $data['id']?>">
      <button class="btn btn-success">Update</button></a>
        
      </tr>
<?php
}
?>
     
    </tbody>
  </table>
</div>



</div>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>








<?php
}

?>