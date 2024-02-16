<?php
error_reporting(0);
$con = mysqli_connect("localhost", "root", "", "project");
if(!$con){
  ?>
  <script>
    alert("DataBase is not connected");
  </script>
  <?php
}
if (isset($_POST['submit'])) {
  if ($_POST['name']) {
    $username = $_POST['name'];
    $password = $_POST['pass'];
    $again = $_POST['pass1'];
    if ($password != "" and $password == $again) {
      $query10 = "SELECT `id` FROM `registration` WHERE `username` = '$username'";
      $run10 = mysqli_query($con, $query10);
      $result10 = mysqli_fetch_array($run10);
      if (!$result10['0']) {
        $query = "INSERT INTO `registration`(`username`, `password`) VALUES ('$username','$password')";
        $run = mysqli_query($con, $query);
        if ($run) {
          header("location:register.php");
        }
      } else {
?>
        <script>
          alert("This Username is already Registered");
        </script>
    <?php
      }
    } else {
      // echo "Write Same Password";
      ?>
      <script>
      alert('Password And Confirm doesnot match!!');
    </script>
    <?php
    
    
    };
  } else {
    ?>
    <script>
      alert("Plz Write a Username");
    </script>
<?php
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>SignUp</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="files\style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <style>
    

    * {
      margin: 0%;
      padding: 0%;
      box-sizing: border-box;
      
    }

    .gradiant {
      height: 100vh;
      width: 100%;
      background-image: linear-gradient(20deg, #d43950, #dce080);
      display: flex;
      justify-content: center;
      align-items: center;
      
    }

    .box {
      border-radius: 50px;
      width: 60%;
      height: 70vh;
      background-color: white;
      display: flex;
    }

    .box_left {
      width: 40%;
      height: 60vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .box_right {
      width: 50%;
    }

    .animation {
      display: flex;
      justify-content: space-evenly;
      width: 300px;
      height: 200px;
    }

    .animation>.one {
      width: 40px;
      height: 40px;
      border-radius: 20px;
      background-color: #eb34a5;
      position: relative;
      animation: one 1s infinite;
    }

    .animation>.two {
      width: 40px;
      height: 40px;
      border-radius: 20px;
      background-color: #343aeb;
      position: relative;
      animation: one 2s infinite;
    }

    .animation>.three {
      width: 40px;
      height: 40px;
      border-radius: 20px;
      background-color: #eb34a5;
      position: relative;
      animation: one 1s infinite;
    }

    .animation>.four {
      width: 40px;
      height: 40px;
      border-radius: 20px;
      background-color: #343aeb;
      position: relative;
      animation: one 2s infinite;
    }

    @keyframes one {

      0%,
      100% {
        top: 0px;
      }

      50% {
        top: 140px;
      }
    }

    #create {
      text-decoration: none;
    }

    @media (max-width:1035px) {
      .animation>.one {
        opacity: 0;
      }

      .animation>.two {
        opacity: 0;
      }

      .animation>.three {
        opacity: 0;
      }

      .animation>.four {
        opacity: 0;
      }

      .box_left {
        width: 0px;
      }

      .box {
        justify-content: center;
        align-items: center;
      }
    }

    input::placeholder {
      text-align: center;
    }

    .box_right_top {
      height: 15vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .box_right_middle {
      height: 45vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: blue;
    }
  </style>
</head>

<body>

<header class="headd">
    <nav class="navbar navbar-expand-md navbar-dark bg-none shadow  scrolling-navbar" id="navbar">
      <div class="container">
        <a class="navbar-brand" href="index.php"><img class="logoim" src="images\Blood_Donation_Logo__1_-removebg-preview (1).png" alt="logo"></a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navbar-elements" id="collapsibleNavId">
          <ul class="navbar-nav me-auto mt-2 mt-lg-0 ml-auto ">
            <li class="nav-item">
              <a class="nav-link active" href="index.php" aria-current="page"><i class='bx bxs-home-heart'></i>
                Home <span class="visually-hidden">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="donor.php"><i class='bx bx-search-alt'></i>Find Donor</a>
            </li>
            <!-- <li class="nav-item">
            <a class="nav-link active" href="register_admin.php"><i class='bx bx-info-circle'></i> Admin Panel</a>
          </li> -->
         
            <?php if (!isset($_SESSION['email'])) { ?>
              <li class="nav-item">
                <a class="nav-link active" href="register.php">LogIn</a>
              </li>
          
              <li class="nav-item">
                <a class="nav-link active" style="color:lightgrey; cursor: not-allowed;" href="signup.php">SignUp</a>
              </li>
            <?php } else { ?>
              <li class="nav-item ">
                <a class="nav-link active" style="color: white;">
                  <?php echo ucwords(preg_replace("/[0-9]|@gmail.com/", "", $_SESSION['email'])); ?>
                </a>
              </li>
              <li class="nav-item">
                <a name="LogOut" style="color: white;" class=" nav-link " href="logout.php">Logout</a>

              </li>
              <li class="nav-item">
            <a class="nav-link active " name="donate" href="form.php?name=<?php echo $_SESSION['email'];?>" style="background:transparent;border:none;"><i class='bx bxs-injection'></i> Donate</a> 
            </li>
              <li class="nav-item">
                <a name="LogOut" style="color: white;" class=" nav-link " href="dashboard.php">My Profile</a>

              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>

  </header>

  <main class="gradiant">
    <div class="box">
      <div class="box_left">
        <div class="animation">
          <div class="one"></div>
          <div class="two"></div>
          <div class="three"></div>
          <div class="four"></div>
        </div>
      </div>
      <div class="box_right">
        <center>
          <div class="box_right_top">
            <h3>Sign In</h3>
          </div>
          <div class="box_right_middle">
            <form method="post">
              <input type="email" class="form-control" name="name" id="name" autocomplete="off" placeholder="Email">
              <br>
              <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" style="margin-bottom: 5px;">
              <input type="password" class="form-control" name="pass1" id="pass1" placeholder="Confirm"><br>
              <button type="button" onclick="show()" class="btn btn-dark" id="btn">Show</button>
              <br><br>
              <input type="submit" class="btn btn-primary form-control" value="Register" name="submit">
            </form>
          </div>
        </center>
      </div>
    </div>
  </main>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script>
    var btn = document.getElementById("btn");
    var pass = document.getElementById("pass");
    var pass1 = document.getElementById("pass1");

    function show() {
      if (pass.type == "text") {
        pass.type = "password";
        pass1.type = "password";
        btn.innerHTML = "Show";
      } else {
        pass.type = "text";
        pass1.type = "password";
        btn.innerHTML = "Hide";
      };
    };
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>