<?php
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// require 'mailer\mailer\vendor\autoload.php';
// $mail = new PHPMailer(true);

$con = mysqli_connect("localhost", "root", "", "project");

if(isset($_GET['id']) )
{
$id =  $_GET['id'];

$select ="SELECT * from donordata where id='$id'";
$row = mysqli_query($con,$select);
$data = mysqli_fetch_assoc($row);
      
    
    }

    if(isset($_POST['save']) )
    {

        $name = $_POST['name'];
//   $email = $_POST['email'];
  $age = $_POST['age'];
  $FN = $_POST['fname'];
  $phone = $_POST['phone'];
  $group = $_POST['bg'];
  $loc = $_POST['loc'];
  $add = $_POST['add'];
  $img = $_FILES['picture']['name'];
  $tmp = $_FILES['picture']['tmp_name'];
  $folder = "img/";
  $target = $folder . basename($_FILES['picture']['name']);
  move_uploaded_file($tmp, $target);
    }
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
  <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/album/">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="files/aos.css">
  <script src="files/aos.js"></script>

  <style>
    * {
      margin: 0%;
      padding: 0%;
      box-sizing: border-box;

    }

    header {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 6vh;
      margin-bottom: 10px;
      color: white;
    }

    .box {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    small {
      color: grey;
    }

    #logout {
      text-decoration: none;
      color: white;
      border: 1px solid white;
      padding: 3px 15px;
      border-radius: 0px;

    }

    .custom {
      background-color: rgb(174, 0, 0);
      margin-bottom: 100px;
    }

    .fotmar {}

    .foram {
      width: 600px;
      background-color: white;
      padding: 5rem;
      border-radius: 30px;

    }

    body {
      background: url('images/sun-8066051.jpg');
      background-size: cover;

    }

    .summit-color {
      border-radius: 0px;
      border: 2px solid;
      background-color: rgb(174, 0, 0);
      color: white;

    }

    .summit-color:hover {
      background-color: #ffe6e6;
      color: red;
    }

    .main-color {
      border-radius: 0px;
    }
  </style>
</head>

<body>
  <!-- <header>
    <h1>Personal Data</h1>
    <a href="index.php" id="logout">Main Page</a>
  </header> -->
  <header class="custom shadow">
    <div class="container box">
      <a href="donor.php" class="navbar-brand">
        <strong style="font-size:larger;">Form</strong>
      </a>
      <a href="index.php" id="logout">Main Page</a>
    </div>
  </header>

  <div class="container foram shadow" data-aos="flip-down" data-aos-duration="2000">
    <div class="col-lg-12">
      <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $data['id']?>">
        <small>Enter Your Full name.</small><input type="text"
            value="<?php echo $data['name'] ?>"  name="name" class="form-control" autocomplete="off" Required><br>
        
        <small>Enter Your Age.</small><input type="number" name="age" 
            value="<?php echo $data['age'] ?>" class="form-control" autocomplete="off" Required><br>
        <small>Enter Your City.</small><input type="text" name="loc"
            value="<?php echo $data['location'] ?>" class="form-control" autocomplete="off" Required><br>
        <small>Enter Your FatherName.</small><input type="text" 
            value="<?php echo $data['fathername'] ?>" name="fname" class="form-control" autocomplete="off" Required><br>
        <small>Write Your phone Number. <span style="color:cornflowerblue;">Note: This Shall be used to contact with You
            Later</span></small> <input value="<?php echo $data['phone'] ?>"
          type="tel" name="phone" id="phone" class="form-control" Required><br>
        <small>Enter Your Address. <span style="color:cornflowerblue;">Note: This will be given by your request
            later</span></small><input type="text"  value="<?php echo $data['address'] ?>"  name="add" class="form-control" autocomplete="off" Required><br>
        <div class="group">
          <small>Put Or Select your Blood Group</small><input 
              value="<?php echo $data['bg'] ?>" list="listitem" class="form-select form-select-lg mb-3"
            aria-label=".form-select-lg example" name="bg" id="sel" Required>
          <datalist id="listitem">
            <option value="A+">positive (A+)</option>
            <option value="A-">negative (A-)</option>
            <option value="B+">positive (B+)</option>
            <option value="B-">negative (B-)</option>
            <option value="O+">positive (O+)</option>
            <option value="O-">negative (O-)</option>
            <option value="AB+">positive (AB+)</option>
            <option value="AB-">negative (AB-)</option>
          </datalist>
        </div><br>
        <input type="file" name="img" id="picture" class="form-control"><small>Input Your Picture. <span
            style="color:#ae0000;">Note: This option is optional but help those whom want blood</span></small>
        <br><br>
        <div class="d-grid gap-2 fotmar">

          <input class="btn btn-success" type="submit" name="save" id="save" value="Update"/>
        </div>
      </form>
    </div>
  </div>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
  <script>
    AOS.init();
  </script>
</body>

</html>