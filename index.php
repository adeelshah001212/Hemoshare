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
session_start();
if (isset($_POST['donate'])) {
  if (isset($_SESSION['email'])) {
    header("location: form.php");
  } else {
    header("location: register.php?new");
  };
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HemoShare</title>
  <link rel="stylesheet" href="/bootstrap-5.2.3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="files/aos.css">  
  <script src="files/aos.js"></script>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="files\style.css">
  <style>
    .parallax-container {
      position: relative;
      height: 100%;
      overflow-x: hidden;
      top: 55px
    }

    .content {
      overflow-x: hidden;
      padding: 50px
    }

    .parallax-bg {
      
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 94%;
      background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('images/main.jpg');
      background-size: cover;
      background-attachment: fixed;
      z-index: -1;
      background-position: 50% 50%;
      animation: moveBackground 10s infinite alternate;
      background-color: rgba(0, 0, 0, 0.457);
      overflow-x: hidden;
      display: flex;
      justify-content: center;
      align-items: center
    }

    @keyframes moveBackground {
      from {
        background-position: 50% 50%
      }

      to {
        background-position: 60% 60%
      }
    }
    th, td {
  text-align: center;
  
}
.tick{
  color:green;
}
.don{
  color: maroon;
}
.rec{
  color: grey;
}
.comp{
  color: green;
}
.fixed-button{
  z-index: 2;
}
.rowch{
  transition: 0.2s;
}
.rowch:hover{
  color:white;
  background-color: #ae0000;
}
.tick{
  transition: 0.2s;
}
.tick:hover{
  color:white;
  background-color: lightgreen;
}
  </style>
</head>


<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-none shadow fixed-top scrolling-navbar" id="navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img class="logoim" src="images\Blood_Donation_Logo__1_-removebg-preview (1).png" alt="logo"></a>
      <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse navbar-elements" id="collapsibleNavId">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0 ml-auto ">
          <li class="nav-item">
            <a class="nav-link active" href="index.php" aria-current="page"><i class='bx bxs-home-heart'></i> Home <span class="visually-hidden">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active " href="donor.php"><i class='bx bx-search-alt'></i>Find Donor</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link active" href="register_admin.php" ><i class='bx bx-info-circle'></i> Admin Panel</a>
          </li> -->
        
          <?php if (!isset($_SESSION['email'])) { ?>
            <li class="nav-item">
              <a class="nav-link active " href="signup.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active " href="register.php">Log In</a>
            </li>
          <?php } else { ?>
            <li class="nav-item">
          <a class="nav-link active " name="donate" href="form.php?name=<?php echo $_SESSION['email'];?>" style="background:transparent;border:none;"><i class='bx bxs-injection'></i> Donate</a> 
          </li>
            <li class="nav-item ">
              <a class="nav-link active" style="color: white;"><?php echo ucwords(preg_replace("/[0-9]|@gmail.com/", "", $_SESSION['email'])); ?></a>
          </li>
            <li class="nav-item">
            <a name="LogOut"    style="color: white; text-shadow:0 0 20px rgba(247, 6, 6, 0.551);" class=" nav-link " href="logout.php">Logout</a>

            </li>
            <!-- <li class="nav-item">
            <a    style="color: white; text-shadow:0 0 20px rgba(247, 6, 6, 0.551);" class=" nav-link " href="dashboard.php?name=<?php echo $_SESSION['email'];?>">My Profile</a> 

            </li> -->
          <?php } ?> 
        </ul>
      </div>
    </div>
  </nav>

  <div class="parallax-container">
    <div class="parallax-bg">
      <div class="content">
        <div class="col-lg-12 d-flex justify-content-center">
          <h1 class="moto" data-aos="fade-down" data-aos-duration="2000"style="color:#fff;"><i class='bx bxs-donate-blood micon'></i></h1>
        </div>
        <div class="col-lg-12 d-flex justify-content-center">
          <h1 class="moto" data-aos="zoom-in" data-aos-duration="2400" style="color:#fff;">Donate Blood, Save Life</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="note note1 " data-aos="zoom-in" data-aos-duration="2000">

          <h1 class="finddon">Find a Donor</h1>
          <p class="findpara">Finding blood donors has been made easier with online platforms. By simply logging in, users can access a network of potential donors. These platforms allow users to create profiles with their blood type and location. Recipients can then search for compatible donors, streamlining the process and ensuring timely access to blood.</p>
          <i class='bx bxs-leaf d-flex justify-content-center iconc'></i>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="note note2 " data-aos="zoom-in" data-aos-duration="2000" data-aos-delay="500">
          <h1 class="finddon">Why Give?</h1>
          <p class="findpara">Giving blood is a selfless act that saves lives and improves the well-being of others. When you donate blood, you provide a crucial lifeline to patients in need of transfusions due to accidents, surgeries, or medical conditions. It is a simple and safe process that takes just a short amount of time, yet its impact can be profound.</p>
          <i class='bx bxs-wink-smile iconc d-flex justify-content-center'></i>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="note note3 " data-aos="zoom-in" data-aos-duration="2000" data-aos-delay="1000">
          <h1 class="finddon">benifits</h1>
          <p class="findpara">Blood donation offers a multitude of benefits that have a positive impact on both donors and Donating blood can be crucial for patients facing life-threatening conditions, accidents, or undergoing major surgeries that require blood transfusions. Additionally, It includes tests for blood pressure, hemoglobin levels, and infectious diseases. </p>
          <i class='bx bxs-shield-plus  iconc d-flex justify-content-center'></i>
        </div>
      </div>
    </div>
  </div>
              <!-- floating donate button -->
    <a href="register.php" class="fixed-button ">Donate!</a>
  <div class="container">
    <div class="row d-flex justify-content-center">
      <h1 class="whaty" style="text-align: center; color: rgb(174, 0, 0);">
            Blood Donation Requirements
      </h1>
      <div class="col-lg-3 col-md-6 col-sm-12 boxwhat" data-aos="flip-left" data-aos-duration="2000">
      <i class='bx bx-leaf whaticon d-flex justify-content-center'></i>
      <br>
        <h1 class="elegib">
           Eligibility
        </h1>
        <p>
          Before donating blood, potential donors are required to meet certain eligibility criteria. This may include
          age restrictions, weight requirements, and health considerations. Donors are also screened for medical
          conditions, recent illnesses, or any factors that may affect the safety of their blood donation.
        </p>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 boxwhat" data-aos="zoom-in" data-aos-duration="2000">
      <i class='bx bx-file whaticon d-flex justify-content-center'></i>
      <br>
        <h1 class="elegib">
           Registration
        </h1>
        <p>
          Donors need to register their details, providing basic information such as name, contact information, and
          identification (e.g., ID card, passport). This step helps create a record of the donation and ensures that
          donors are notified about future blood donation events if they wish to participate again.
        </p>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 boxwhat" data-aos="flip-right" data-aos-duration="2000">
      <i class='bx bx-heart-circle whaticon d-flex justify-content-center'></i>
      <br>
        <h1 class="elegib">
           Health History Questionnaire
        </h1>
        <p>
          Donors are asked to complete a health history questionnaire. The questionnaire includes questions about recent
          travel, medications, medical conditions, and other factors that could impact blood donation eligibility.
        </p>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 boxwhat" data-aos="flip-left" data-aos-duration="2000">
      <i class='bx bx-universal-access whaticon d-flex justify-content-center'></i>
      <br>
        <h1 class="elegib">
           Mini-Physical Examination
        </h1>
        <p>
          A brief physical examination is conducted to check the donor's blood pressure, pulse, and hemoglobin levels.
          This helps ensure that the donor is in good health to proceed with the donation.
        </p>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 boxwhat" data-aos="flip-left" data-aos-duration="2000">
      <i class='bx bx-droplet whaticon d-flex justify-content-center'></i>
      <br>
        <h1 class="elegib">
           Blood Collection
        </h1>
        <p>
          Once the donor passes the screening process, they are taken to the blood collection area. A trained
          phlebotomist or nurse will insert a sterile needle into a vein, typically in the arm, to collect blood. The
          amount of blood collected varies, but it is usually around 1 pint (about 470 mL).
        </p>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 boxwhat" data-aos="flip-left" data-aos-duration="2000">
      <i class='bx bx-smile whaticon d-flex justify-content-center'></i>
      <br>
        <h1 class="elegib">
           Donation Record and Thank You
        </h1>
        <p>
          The blood donation center records the donation details and provides the donor with a donor card or other
          documentation. Donors are usually thanked for their contribution and encouraged to donate again in the future.
        </p>
      </div>
    </div>
  </div>
                <!-- Blood Compatiblilty Chart -->
                <div class="container mt-5">
  <h2 class="text-center mb-4 whaty">Blood Compatibility Chart</h2>
  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th scope="col" class="don">Donor</th>
        <th scope="col" class="rec">Recipient</th>
        <th scope="col" class="comp">Compatible</th>
      </tr>
    </thead>
    <tbody>
      <tr   >
        <td class="rowch" rowspan="4" class=>O-</td>
        <td class="rowch">O-</td>
        <td  class="tick">✓</td>
      </tr >
      <tr   >
        <td class="rowch">A-</td>
        <td class="tick">✓</td>
      </tr>
      <tr   >
        <td class="rowch">B-</td>
        <td class="tick">✓</td>
      </tr>
      <tr   >
        <td>AB-</td>
        <td class="tick">✓</td>
      </tr>
      <tr   >
        <td class="rowch" rowspan="2">O+</td>
        <td class="rowch">O-</td>
        <td class="tick">✓</td>
      </tr>
      <tr   >
        <td class="rowch">O+</td>
        <td class="tick">✓</td>
      </tr>
      <tr   >
        <td class="rowch"> A-</td>
        <td class="rowch">O-</td>
        <td class="tick">✓</td>
      </tr>
      <tr   >
        <td class="rowch">A+</td>
        <td class="rowch">O-</td>
        <td class="tick">✓</td>
      </tr>
      <tr   >
        <td rowspan="2" class="rowch">B-</td>
        <td class="rowch">O-</td>
        <td class="tick">✓</td>
      </tr>
      <tr   >
        <td class="rowch">O+</td>
        <td class="tick">✓</td>
      </tr>
      <tr   >
        <td>A-</td>
        <td>O-</td>
        <td class="tick">✓</td>
      </tr>
      <tr   >
        <td class="rowch">A+</td>
        <td class="rowch">O-</td>
        <td class="tick">✓</td>
      </tr>
      <tr   >
        <td class="rowch" rowspan="2">AB-</td>
        <td class="rowch">O-</td>
        <td class="tick">✓</td>
      </tr>
      <tr   >
        <td class="rowch">O+</td>
        <td class="tick">✓</td>
      </tr>
      <tr >
        <td class="rowch">A-</td>
        <td class="rowch">O-</td>
        <td class="tick">✓</td>
      </tr>
      <tr >
        <td class="rowch">A+</td>
        <td class="rowch">O-</td>
        <td class="tick">✓</td>
      </tr>
    </tbody>
  </table>
</div>
  <br><br>
  <br><br>
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-md-12 col-sm-12">
        <h1 class="wedo d-flex justify-content-center" data-aos="fade-down" data-aos-duration="2000">What We'll Do </h1>
        <ul>
          <li class="li-of-wedo d-flex justify-content-center" data-aos="zoom-in" data-aos-duration="2000"><i class='bx bxs-chevron-down icone'></i> Registration: Provide basic personal information and confirm
            eligibility.</li>
          <li class="li-of-wedo d-flex justify-content-center" data-aos="zoom-in" data-aos-duration="2000" data-aos-delay="500"><i class='bx bxs-chevron-down  icone'></i> Health Screening: Check vital signs and
            answer health-related questions.</li>
          <li class="li-of-wedo d-flex justify-content-center" data-aos="zoom-in" data-aos-duration="2000" data-aos-delay="500"><i class='bx bxs-chevron-down  icone'></i> Donor Education: Receive information about
            blood donation.</li>
          <li class="li-of-wedo d-flex justify-content-center" data-aos="zoom-in" data-aos-duration="2000" data-aos-delay="500"><i class='bx bxs-chevron-down  icone'></i> Hemoglobin Test: Check iron levels in a drop
            of blood from your fingertip.</li>
          <li class="li-of-wedo d-flex justify-content-center" data-aos="zoom-in" data-aos-duration="2000" data-aos-delay="500"><i class='bx bxs-chevron-down  icone'></i> Collection and Storage: Blood is collected
            in a labeled bag and stored safely.</li>
        </ul>
      </div>
      <div class="col-lg-7 col-md-12 col-sm-12 d-flex justify-content-center" data-aos="zoom-in" data-aos-duration="2000">
        <img src="images\nurmad.jpeg" alt="nothing" class="nursepb img-fluid">
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="pic d-flex justify-content-center">
          <img class="imgof shadow img-fluid" src="images\bloodpatient.png" alt="" data-aos="fade" data-aos-duration="2000">
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="pic tor shadow" data-aos="fade-up" data-aos-duration="2000"  style="background-color:maroon">
          <h1 class="verify">100% of Your Need for Blood will recieve.</h1>
          <p class="vpara">
            Our system is meticulously designed to efficiently deliver the blood you need. With a strong focus on reaching those in urgent demand, we ensure a seamless process for acquiring the required blood. Our technology-driven approach allows us to swiftly match donors with recipients, providing a lifeline for patients in critical situations.
          </p>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="pic tor shadow" data-aos="fade-up" data-aos-duration="2000"  data-aos-delay="500" style="background-color:maroon">
          <h1 class="verify">100% of your Blood Donation will Reach.</h1>
          <p class="vpara">
            Your contribution to blood donation impacts and reaches those in need. A selfless act, donating blood saves lives, brings hope to patients, and provides a lifeline for those facing medical emergencies. Every donated drop holds the potential to make a significant difference, touching lives with kindness and compassion.
          </p>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer">
    <ul class="social-icon">
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-facebook"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-twitter"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-linkedin"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-instagram"></ion-icon>
        </a></li>
    </ul>
  
    <p>&copy;2023 HemoShare.com | All Rights Reserved</p>
  </footer>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> 
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="/bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script> 
  <script>
    AOS.init();
  </script>
  <script src="bloodjs.js"></script>
  <script>
    $(document).ready(function() {
      $(window).scroll(function() {
        let scrollPosition = $(window).scrollTop();

        if (scrollPosition > 0) {
          $('.navbar').addClass('scrolled');
        } else {
          $('.navbar').removeClass('scrolled');
        }
      });
    });
    document.addEventListener("DOMContentLoaded", function() {
    const button = document.querySelector(".fixed-button");

    window.addEventListener("scroll", function() {
        if (window.scrollY > 300) {  
            button.classList.add("show");
        } else {
            button.classList.remove("show");
        }
    });
});

  </script>
</body>

</html>