<?php
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;
 
// require 'mailer\mailer\vendor\autoload.php';
// $mail = new PHPMailer(true);

$con = mysqli_connect("localhost", "root", "", "project");
if (!$con) {
  ?>
  <script>
    alert("DataBase is not connected");
  </script>
  <?php
}
if(isset($_GET['name']) )
{
$email =  $_GET['name'];

$select ="SELECT * from donordata where email='$email'";
$result=mysqli_query($con,$select);

$no=mysqli_num_rows($result);
if($no>0)
{

 echo '<script>alert("Your Form is Submitted!!")</script>';
 echo '<script>window.location.href="index.php"</script>';

}




else{
error_reporting(0);

session_start();
if (isset($_POST['save'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $age = $_POST['age'];
  $FN = $_POST['FatherName'];
  $phone = $_POST['phone'];
  $group = $_POST['sel'];
  $loc = $_POST['loc'];
  $add = $_POST['add'];


  $sub = "Your Donor Account has Registered Succesfully";
  $des = "We are pleased to inform you that your donor account registration has been successfully completed. Welcome to our platform! Your commitment to making a difference through your contributions is greatly appreciated. With your account now active, you can begin exploring various causes, projects, and initiatives to support. Thank you for joining our community of compassionate individuals striving to create positive change in the world.";

  if (isset($_FILES['picture'])) {
    $img = $_FILES['picture']['name'];
    $tmp = $_FILES['picture']['tmp_name'];
    $type = $_FILES['picture']['type'];
    $size = $_FILES['picture']['size'];
    $str = "a" . $type;
    $exp = strpos($str, "image");
    if ($size < 9009715.2) {
      if ($exp != false or $type == "") {
        $folder = "img/";
        $target = $folder . basename($_FILES['picture']['name']);
        move_uploaded_file($tmp, $target);
        if ($target == "img/") {
          $target = "img/noidentity.png";
        }
     
        $query = "INSERT INTO `donordata`(`name`, `email`, `age`, `fathername`, `phone`, `bg`,`images`, `location`, `address`) VALUES ('$name','$email','$age','$FN',$phone,'$group','$target','$loc','$add')";
        $run = mysqli_query($con, $query);
     $data = mysqli_fetch_assoc($run);
    
        header('location:index.php');
      } else {
        ?>
        <script>
          alert("Please select image file");
        </script>
        <?php
      }
    } else {
      ?>
      <script>
        alert("Please Select File less than 2mb");
      </script>
      <?php
    }
  }

  // try {
  //   //Server settings
  //   $mail->SMTPDebug = 2; //Enable verbose debug output
  //   $mail->isSMTP(); //Send using SMTP
  //   $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
  //   $mail->SMTPAuth = true; //Enable SMTP authentication
  //   $mail->Username = 'adeelshh945@gmail.com'; //SMTP username
  //   $mail->Password = 'vyjfqgptrpydjfti'; //SMTP password
  //   $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
  //   $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //   $mail->$headers .= 'Content-Transfer-Encoding: base64' . "\r\n";

  //   //Recipients
  //   $mail->setFrom('adeelshh945@gmail.com', 'HemoShare');
  //   $mail->addAddress($email, 'Hemo Share'); //Add a recipient
  //   // $mail->addAddress('ellen@example.com');               //Name is optional
  //   // $mail->addReplyTo('info@example.com', 'Information');
  //   // $mail->addCC('cc@example.com');
  //   // $mail->addBCC('bcc@example.com');

  //   // //Attachments
  //   // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
  //   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

  //   //Content
  //   $mail->isHTML(true); //Set email format to HTML
  //   $mail->Subject = $sub;
  //   $mail->Body = $des;
  //   $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  //   $mail->send();
  //   header('location:donor.php');
  //   // echo 'Message has been sent';

  // } catch (Exception $e) {
  //   echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  // }

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
  <?php if (isset($_POST['save'])) {
    if ($run) { ?>
      <div class="alert alert-success" role="alert">
        Your Data is transfered and submitted Succesfully
      </div>
      <?php
      header('location:donor.php');

      ?>

    <?php } else { ?>
      <div class="alert alert-danger" role="alert">
        Some Error Occured
      </div>
    <?php }
  }
  ; ?>
  <div class="container foram shadow" data-aos="flip-down" data-aos-duration="2000">
    <div class="col-lg-12">
      <form method="post" enctype="multipart/form-data">
        <small>Enter Your Full name.</small><input type="text" <?php if (isset($_POST['save'])) { ?>
            value="<?php echo $name ?>" <?php } ?> name="name" class="form-control" autocomplete="off" Required><br>
        <small>Enter Your Email.</small><input type="email" <?php if (isset($_POST['save'])) { ?>
            value="<?php echo $email ?>" <?php } ?> name="email" class="form-control" autocomplete="off"
          value="<?php echo $_SESSION['email']; ?>" Required><br>
        <small>Enter Your Age.</small><input type="number" name="age" <?php if (isset($_POST['save'])) { ?>
            value="<?php echo $age ?>" <?php } ?>class="form-control" autocomplete="off" Required><br>
        <small>Enter Your City.</small><input type="text" name="loc" <?php if (isset($_POST['save'])) { ?>
            value="<?php echo $loc ?>" <?php } ?> class="form-control" autocomplete="off" Required><br>
        <small>Enter Your FatherName.</small><input type="text" <?php if (isset($_POST['save'])) { ?>
            value="<?php echo $FN ?>" <?php } ?> name="FatherName" class="form-control" autocomplete="off" Required><br>
        <small>Write Your phone Number. <span style="color:cornflowerblue;">Note: This Shall be used to contact with You
            Later</span></small> <input <?php if (isset($_POST['save'])) { ?> value="<?php echo $phone ?>" <?php } ?>
          type="tel" name="phone" id="phone" class="form-control" Required><br>
        <small>Enter Your Address. <span style="color:cornflowerblue;">Note: This will be given by your request
            later</span></small><input type="text" <?php if (isset($_POST['save'])) { ?> value="<?php echo $add ?>" <?php } ?> name="add" class="form-control" autocomplete="off" Required><br>
        <div class="group">
          <small>Put Or Select your Blood Group</small><input <?php if (isset($_POST['save'])) { ?>
              value="<?php echo $group ?>" <?php } ?> list="listitem" class="form-select form-select-lg mb-3"
            aria-label=".form-select-lg example" name="sel" id="sel" Required>
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
        <input type="file" name="picture" id="picture" class="form-control"><small>Input Your Picture. <span
            style="color:#ae0000;">Note: This option is optional but help those whom want blood</span></small>
        <br><br>
        <div class="d-grid gap-2 fotmar">

          <button class="btn btn-primary" type="submit" name="save" id="save">Submit</button>
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

</html><?php
}
}
?>