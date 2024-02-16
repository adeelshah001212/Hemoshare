
<?php
session_start();
error_reporting(0);
$con = mysqli_connect("localhost", "root", "", "project");
if(!$con){  
  ?>
  <script>
    alert("DataBase is not connected");
  </script>
  <?php
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `donordata` WHERE `id` = $id";
    $run = mysqli_query($con, $query);
    $row = mysqli_fetch_array($run);
}else{
    header("location: donor.php");
}
if (isset($_POST['send'])) {
    $to = "junaidsindhu345@gmail.com";
    $subject = "I Want to get number of";
    $message = "Fine";
    $mail =  mail($to, $subject, $message);
    if ($mail) {
?>
        <script>
            alert("Sended");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Error");
        </script>
<?php
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="files\style.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        /* .backg {
            background: linear-gradient(45deg, #00FF00, #0074D9);
            background-size: cover;
            background-repeat: no-repeat;
          box-shadow: 0 0 20px  rgba(136, 136, 136, 0.284);
        } */
        html {
            background: linear-gradient(45deg, rgb(174, 0, 0), #0074D9);
            background-size: cover;

        }

        body {
            background: linear-gradient(180deg, rgb(174, 0, 0), #0074D9);
            background-size: cover;
            width: 100%;
            height: 100%;
        }


        header {
            height: 15vh;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0px 30px;
            background-color: black;
            color: white;
        }

        main {
            font-size: 20px;
            padding: 30px 0px;
            display: flex;
            justify-content: space-evenly;
        }

        main>div {
            display: flex;
            flex-direction: column;
            align-items: start;
        }

        @media (max-width:900px) {
            main {
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            header>h1 {
                font-size: 20px;
            }
        }

        header>div {
            display: flex;
        }

        .h1t {
            font-weight: 100;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin-left: 50px;
        }

        .formd {
            border-bottom: 2px solid skyblue;
            padding: 5px;
            font-size: small;
            color: #ffff;
            margin: 20px;
            display: flex;
            justify-content: center;

        }

        .profile-pic {
            border-radius: 100%;
            margin: 50px;


        }

        .img-prof {
            display: flex;
            justify-content: center;
        }

        .btnn {
            border-radius: 0px;
        }
    </style>
</head>

<body>
    <header>
        <h1 class="h1t">Donor's ID</h1>
        <div>
            <a href="donor.php" class="btn btn-sm btn-outline-light btnn" style="font-size: 13px;">Donor
                Page</a>&nbsp;&nbsp;
            <a href="index.php" class="btn btn-sm btn-outline-light btnn" style="font-size: 13px;">Main Page</a>
        </div>
    </header>

    <div class="container backg ">

        <div class="row d-flex">

            <div class="col-lg-12 col-md-12 col-sm-12 img-prof">

                <!-- img -->

                <img class="profile-pic shadow" src="<?php echo $row[7]; ?>" alt="No image" width="100px" height="100px" id="img">



            </div>

            <!-- the number should show just like the rest containers  -->
            <!-- there must be a gap after : these -->

            <div class="col-lg-6 col-md-6 col-sm-12">

                <!-- name -->

                <section class="formd">
                    <label for="name">Name&nbsp;:&nbsp;</label>
                    <p id="name">
                        <?php echo $row[1]; ?>
                    </p>
                </section>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">

                <!-- fathername -->

                <section class="formd">
                    <label for="fathername">Father Name&nbsp;:&nbsp;</label>
                    <p id="fathername">
                        <?php echo $row[4]; ?>
                    </p>
                </section>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">

                <!-- location -->

                <section class="formd">
                    <label for="location">Location&nbsp;:&nbsp;</label>
                    <p id="location">
                        <?php echo $row[8]; ?>
                    </p>
                </section>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">

                <!-- age -->

                <section class="formd">
                    <label for="age">Age&nbsp;:&nbsp;</label>
                    <p id="age">
                        <?php echo $row[3]; ?>
                    </p>
                </section>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">

                <!-- address -->

                <section class="formd">
                    <label for="address">Address&nbsp;:&nbsp;</label>
                    <p id="address">
                        <?php echo $row[9]; ?>
                    </p>
                </section>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">

                <!-- email -->

                <section class="formd">
                    <label for="email">Email&nbsp;:&nbsp;</label>
                    <p id="email">
                        <?php echo $row[2]; ?>
                    </p>
                </section>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">

                <!-- blood-group -->

                <section class="formd  d-flex justify-content-center">
                    <label for="bg">Blood Group&nbsp;:&nbsp; </label>
                    <p id="bg" style="color: #fff;">
                        <?php echo $row[6]; ?>
                    </p>
                </section>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">

                <!--Phone No -->

                <section class="formd  d-flex justify-content-center">
                    <label for="phone">Phone No&nbsp;: &nbsp; </label>
                    <p id="phone" style="color: #fff;">
                        <?php echo $row[5]; ?>
                    </p>
                </section>

            </div>
            <form method="post">
                <input type="submit" value="Send" name="send">
            </form>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>