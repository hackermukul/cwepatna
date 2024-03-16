<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Examin - Education and LMS Template">

    <!-- ========== Page Title ========== -->
        <title>MSME Certificate | Computer Warriors Education Pvt. Ltd.</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="assets/qr-logo.png" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/flaticon-set.css" rel="stylesheet" />
    <link href="assets/css/magnific-popup.css" rel="stylesheet" />
    <link href="assets/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/animate.css" rel="stylesheet" />
    <link href="assets/css/bootsnav.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/styl.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">
   <style>
.button {
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 250px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>

</head>

<body>

    <!-- Preloader Start -->
    <?php include "common/top_header.php"; ?>
    <header id="home">

        <!-- Start Navigation -->
       <?php include "common/header.php"; ?>
        <!-- End Navigation -->

    </header>
    <!-- End Header -->

    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark text-center bg-fixed text-light" style="background-image: url(assets/img/banner/25.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>MSME Certificate</h1>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="#">Page</a></li>
                        <li class="active">MSMECertificate</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Advisor Area
    ============================================= -->
    <section id="advisor" class="advisor-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <img src="assets/cmc.jpeg">
                    
                </div>
            </div>
        </div>
    </section>
    <section>
    
</section>
       <?php include "common/footer.php"; ?>
       <div id="myModal" class="modal fade" role="dialog" style="display: none;">
      <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header bg-theme-colored2">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title text-white">Enquiry For?</h4>
          </div>
          <div class="modal-body">
            <p id="msg" class="alert alert-success" align="center" style="display: none;">Enquiry has been sent!</p>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <img src="https://www.edustrom.com/public/assets/images/enquiry.jpg" alt="enquiry">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <form id="enquiryfrm" method="post" action="#" autocomplete="off" novalidate="novalidate">
                        <input type="hidden" name="_token" value="GAg3iFZZfQPaYg97ivBM7v4ArHSEvRJEENYO60w0">                        <div class="form-group">
                            <input type="text" name="fullname" class="form-control" placeholder="You Full Name" required="" aria-required="true">
                        </div>
                        <div class="form-group">
                            <select name="course_id" class="form-control" required="" aria-required="true">
                                <option value="">Select Course</option>
                            <option value="1">Hypertext Preprocessor (PHP)</option>
                            <option value="3">Graphic Designing</option>
                            <option value="4">Web Design</option>
                            <option value="5">Digital Marketing</option>
                            <option value="6">Laravel</option>
                            <option value="7">Web + Graphic Design</option>
                            <option value="8">Core Android</option>
                            <option value="9">Core &amp; Adv. Android</option>
                            <option value="10">Advanced Android</option>
                            <option value="11">Web Development with PHP</option>
                            <option value="20">Web Development with Python</option>
                            <option value="21">Basic Python</option>
                            <option value="23">Core Java</option>
                            <option value="25">Advanced Java</option>
                            <option value="26">Core &amp; Adv. Java</option>
                            <option value="27">SMO</option>
                            <option value="28">DTP</option> 
                            <option value="29">TALLY</option> 
                            <option value="30">EXCEL</option> 
                            <option value="31">ETHICAL HACKING</option> 
                            <option value="32">PROGAMMING</option> 

                        </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control numonly" placeholder="You 10 Digit Mobile No." required="" maxlength="10" minlength="10" aria-required="true">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Your Email Id" name="email" required="" aria-required="true">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
    
      </div>
</div>
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/equal-height.min.js"></script>
    <script src="assets/js/jquery.appear.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/modernizr.custom.13711.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/count-to.js"></script>
    <script src="assets/js/loopcounter.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/bootsnav.js"></script>
    <script src="assets/js/main.js"></script>

</body>

<!-- Mirrored from webhunt.store/themeforest/examin/teachers.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Apr 2021 11:41:04 GMT -->
</html>