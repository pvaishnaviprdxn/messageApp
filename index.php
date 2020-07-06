<!doctype html>
<!-- If multi-language site, reconsider usage of html lang declaration here. -->
<html lang="en"> 
<head>
  <meta charset="utf-8">
  <title>Login | Messaging App</title>
  <!-- View-port Basics: http://mzl.la/VYREaP -->
  <!-- This meta tag is used for mobile device to display the page without any zooming,
       so how much the device is able to fit on the screen is what's shown initially. 
       Remove comments from this tag, when you want to apply media queries to the website. -->
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> -->
  <!-- Place favicon.ico in the root directory: mathiasbynens.be/notes/touch-icons -->
  <link rel="shortcut icon" href="favicon.ico" />
  <!--font-awesome link for icons-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Default style-sheet is for 'media' type screen (color computer display).  -->
  <link rel="stylesheet" media="screen" href="assets/css/style.css" >
</head>
<body>
  <!--container start-->
  <div class="container">
    <!--header section start-->
    <header>
      <div class="wrapper">
        <h1>
          <a href="homepage.php" title="Messaging App">
            <img src="https://via.placeholder.com/120x40.png?text=Messaging App" alt="Messaging App">
          </a>
        </h1>
        <!--login/register options start -->
        <div class="login-register">
          <a href="index.php" title="Login" class="login">Login</a>
          <a href="register.php" title="Register" vlass="register">Register</a>
        </div>
        <!--login/register options end -->
      </div>
    </header>
    <!--header section start-->
    <!--main section start-->
    <main>
      <section>
        <div class="wrapper">
          <h2>to have your best experience with us please <span class="up">login</span></h2>
          <form method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>Email:</label>
              <input type="text" name="email" placeholder="Enter your Email">
              <span class="error"></span>
            </div>
            <div class="form-group">
              <label>Password:</label>
              <input type="password" name="passw" placeholder="Enter your passwprd">
              <span class="error"></span>
            </div>
            <div class="form-group">
              <input type="checkbox" name="remember" value="yes">Remember me
            </div>
            <div class="form-control">  
              <input type="submit" value="Login">
            </div>
            <span class="register-info">if you don't have account <a href="register.php" title="Click here to register">click here to register</a></span>
          </form>
        </div>
      </section>
    </main>
    <!--main section end-->

    <!--footer section start-->
    <footer>      

    </footer>
    <!--footer section end-->

  </div>
  <!--container end-->

<!--<script src="assets/vendors/jquery-1.8.3.min.js"></script>-->
<script src="assets/js/script.js"></script>
</body>
</html>
