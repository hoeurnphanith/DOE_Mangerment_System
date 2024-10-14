<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="../style.css">

<link rel="icon" href="i/favicon.png" type="image/x-icon">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Dosis:100,200,300,400,600,500,700,800,900|Open+Sans:100,200,300,400,500,600,700,800,900&amp;subset=latin" rel="stylesheet">
<!-- Bootstrap 4.3.1 CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- Slick 1.8.1 jQuery plugin CSS (Sliders) -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<!-- Fancybox 3 jQuery plugin CSS (Open images and video in popup) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<!-- AOS 2.3.1 jQuery plugin CSS (Animations) -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!-- FontAwesome CSS -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<!-- Startup 3 CSS (Styles for all blocks) -->
<link href="../css/style.css" rel="stylesheet" />
<!-- jQuery 3.3.1 -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<style>
  /*@import url('https://fonts.googleapis.com/css2?family=Kantumruy:wght@700&display=swap');*/
  @import url('https://fonts.googleapis.com/css2?family=Kantumruy&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Moul&display=swap');

  .table{
    font-size: 20px;
    font-family: 'Kantumruy', sans-serif;
  }
  form,div,label{
    font-family: 'Kantumruy', sans-serif;
  }
  h1,h2,h5,h4,h6{
    font-family: 'Koulen', cursive;
  }
  span{
    font-family: 'Moul', cursive;
    font-size: 20px;
  }
  .form-group {
    position: relative;
    z-index: 0;
    margin-bottom: 30px !important;
  }

</style>
<body style=" background: #f7f7f7;">

  

<header>
  <div class="content-wapper" style="min-height: 90px;" >
    <nav class="navigation_18 bg-dark pt-10 pb-10 lh-10 text-center" style="background-color: #0081d6 !important;">
      <div class="container">
        <div class="row align-items-center" style="text-align-last: center;">
          <div class="col-lg-auto text-lg-left" >
            <img src="../images/pngegg.png" class="logo" style="height: 75px; width: 60px;">
          </div>&nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp 
          <div class="col-lg-9 text-lg-right">
            <label style="font-family: 'Moul', cursive; font-size: 20px; margin-bottom: 4px; color: white;">ប្រព័ន្ធគ្រប់គ្រងព័ត៌មាន និងស្ថិតិតាមសាលារៀន</label><br>
            <span style="color: white;"​ > ការិយាល័យអប់រំ យុវជន និងកីឡា ស្រុកសំឡូត</span>
          </div>
        </div>
      </div>
    </nav>

   
  </div>
</header>
  
<nav class="pt-1" style="background-color: #fde602 !important; margin-bottom: 50px;">

</nav>
  <main style="min-height:650px;">
    

    <div class="row justify-content-center">
      <div class=" col-lg-4 col-md-6 col-sm-6">
        <div class="wrap">
          <div class="login-wrap p-3 p-md-5">
            <div class="d-flex"​ style="place-content: center;">
              <h4 class="mb-4" style="color: #0081d6 !important;">ចូលប្រើប្រាស់ប្រព័ន្ធ</h4>
            </div>
            <form method="post" action="admin_log.php">
              <div class="form-group mt-3" style="margin-bottom: 15px;">
                <input type="text" class="form-control" name="txt_username" style="    height: calc(2em + .75rem + 2px);" required="">
                <label class="form-control-placeholder" for="username">ឈ្មោះគណនី</label>
              </div>
              <div class="form-group" style="margin-bottom: 35px;">
                <input id="password-field" type="password" name="txt_password" class="form-control" style="    height: calc(2em + .75rem + 2px);" required="">
                <label class="form-control-placeholder" for="password">លេខសំងាត់</label>
                <span toggle="#password-field" class="far fa-eye-slash field-icon" id="togglePassword" class="togglePassword"></span>
              </div>
              <div class="form-group" style="height: calc(2em + .75rem + 2px);" >
                <button type="submit" class="form-control rounded submit px-3" id="Login_admin" name="Login_admin" style="background-color: #0081d6 !important; color: white;​ ">ចូល</button>
              </div>
              <div class="form-group d-md-flex">
                <div class="text-left">
                  <label class="checkbox-wrap checkbox-primary mb-0" style="color: #0081d6 !important">ចង់ចាំលេខសំងាត់
                    <input type="checkbox" checked>
                    <span class="checkmark" ></span>
                  </label>
                </div>
                <div class="text-md-right" style="    margin-left: auto;">
                  <a href="#">ភ្លេចលេខសំងាត់</a>
                </div>
              </div>
              <div class="col-sm-6">
                <a href="../index.php" class="btn btn-danger" style="color: white; background-color: red;"> Back To User</a>
              </div>
            </form> 

          </div>
        </div>
      </div>
    </div>
    
  </main>
  </body>

  <script>
    $("#togglePassword").click(function (e) {
      e.preventDefault();
      // Get the password input field using the 'toggle' attribute
      var passwordField = $($(this).attr("toggle"));
      var type = passwordField.attr("type");
      // Toggle between 'text' and 'password'
      if (type === "password") {
        $(this).removeClass("fa-eye-slash").addClass("fa-eye");
        passwordField.attr("type", "text");
      } else if (type === "text") {
        $(this).removeClass("fa-eye").addClass("fa-eye-slash");
        passwordField.attr("type", "password");
      }
    });
  </script>

  <footer>
    <div class="" style="min-height: 150px; background-color: #0081d6 !important;">
    
    <nav class="pt-1 text-center" style="background-color: #fde602 !important;">

    </nav>

        <div class="container">
          <div class="row align-items-center" style="text-align-last: center;">
            <div class="col-lg-9 text-lg-right">
            </div>
          </div>
        </div>

    </div>
  </footer>


<!-- Bootstrap 4.3.1 JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<!-- Fancybox 3 jQuery plugin JS (Open images and video in popup) -->
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<!-- Google maps JS API -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyDP6Ex5S03nvKZJZSvGXsEAi3X_tFkua4U"></script>
<!-- Slick 1.8.1 jQuery plugin JS (Sliders) -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- AOS 2.3.1 jQuery plugin JS (Animations) -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- Maskedinput jQuery plugin JS (Masks for input fields) -->
<script src="../js/jquery.maskedinput.min.js"></script>