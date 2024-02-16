<?php
error_reporting(0);
$con = mysqli_connect("localhost", "root", "", "project");
if (!$con) {
  ?>
  <script>
    alert("DataBase is not connected");
  </script>
  <?php
}
session_start();
if (isset($_POST['find'])) { 
  $fil = $_POST['fil'];
  $fil_nam = $_POST['fil_nam'];
  if ($fil_nam != "" and $fil != "all") {
    $query = "SELECT * FROM `donordata` WHERE `$fil` = '$fil_nam'";
    $result = mysqli_query($con, $query);
  } elseif ($fil_nam == "" and $fil != "all") {
    ?>
    <script>
      alert("Please Type a Source to search");
    </script>
    <?php
    $query = "SELECT * FROM `donordata`";
    $result = mysqli_query($con, $query);
  } elseif ($fil == "all") {
    $query = "SELECT * FROM `donordata`";
    $result = mysqli_query($con, $query);
  }
} else {
  $query = "SELECT * FROM `donordata`";
  $result = mysqli_query($con, $query);
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.72.0">
  <title>Album example · Bootstrap</title>

  <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/album/">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="files/aos.css">
  <script src="files/aos.js"></script>




  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
    integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
    integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="files\style.css">
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <style>
    html,
    body {
      font-family: 'Poppins';
    }

    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    #logout {
      text-decoration: none;
      color: white;
      border: 1px solid white;
      padding: 3px 15px;
      border-radius: 0px;
    }

    .colour {
      background-color: black;
    }

    .custom {
      border-radius: 30px;

    }

    .customimg {
      height: 300px;
      width: 300px;
      padding: 70px;
      border-radius: 100%;
    }

    .card {
      background-color: light;
    }
  </style>


</head>

<body>

  <header class="headd">
    <nav class="navbar navbar-expand-md navbar-dark bg-none shadow  scrolling-navbar" id="navbar">
      <div class="container">
        <a class="navbar-brand" href="index.php"><img class="logoim"
            src="images\Blood_Donation_Logo__1_-removebg-preview (1).png" alt="logo"></a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
          data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navbar-elements" id="collapsibleNavId">
          <ul class="navbar-nav me-auto mt-2 mt-lg-0 ml-auto ">
            <li class="nav-item">
              <a class="nav-link active" href="index.php" aria-current="page"><i class='bx bxs-home-heart'></i>
                Home <span class="visually-hidden">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" style="color:lightgrey; cursor: not-allowed;" href="donor.php"><i
                  class='bx bx-search-alt'></i>Find Donor</a>
            </li>
            <!-- <li class="nav-item">
            <a class="nav-link active" href="register_admin.php"><i class='bx bx-info-circle'></i> Admin Panel</a>
          </li> -->
            <li class="nav-item">
              <a class="nav-link active " name="donate" href="form.php?name=<?php echo $_SESSION['email']; ?>"
                style="background:transparent;border:none;"><i class='bx bxs-injection'></i> Donate</a>
            </li>
            <?php if (!isset($_SESSION['email'])) { ?>
              <li class="nav-item">
                <a class="nav-link active" href="register.php">Register</a>
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
                <a name="LogOut" style="color: white;" class=" nav-link " href="dashboard.php">My Profile</a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>

  </header>

  <main>

    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="font-weight-light" data-aos-duration="1300" data-aos="fade">Donor's Data</h1>
          <p class="lead text-muted" data-aos-duration="1300" data-aos="fade" data-aos-delay="400">You can see and
            contact with donor willing to donate their blood of many blood groups.</p>
          <p>
          <form method="post">
            <div class="form-group">
              <select class="form-control" name="fil" id="fil" style="text-align: center; margin-bottom:5px ;">
              <option value="" selected>Search Here</option>
                <option value="all">All</option>
                <option value="location"> Search City</option>
                <option value="bg"> Search Blood Group</option>
              </select>
              <input type="text" name="fil_nam" id="fil_nam" class="form-control"
                Placeholder="Enter Your desire City or Blood Group" style="text-align: center; margin-bottom:5px ;"
                autocomplete="off"><br>
              <input type="submit" value="Find" name="find" class="btn btn-primary">
            </div>
          </form>
          </p>
        </div>
      </div>
    </section>

    <div class="album py-5 bg-light">
      <div class="container" data-aos-duration="1300" data-aos="fade" data-aos-delay="600">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <?php while ($row = mysqli_fetch_array($result)) { ?>
            <div class="col">
              <div class="card shadow-sm custom d-flex justify-content-center">
                <img class="customimg d-flex justify-content-center  " src="<?php echo $row[7] ?>">

                <div class="card-body">
                  <p class="card-text">My Name is "
                    <?php echo $row[1] ?>". I am From <span style="color:red;">"
                      <?php echo $row[8] ?>"
                    </span>. I have <span style="color:red;">
                      <?php echo $row[6] ?>
                    </span>
                    To give to you. My email is
                    <?php echo $row[2] ?>.
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="personal_data.php?id=<?php echo $row[0] ?>"
                        class="btn btn-sm btn-outline-danger d-flex justify-content-center">View Full data</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>

  </main>
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