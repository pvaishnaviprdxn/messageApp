<?php 
require_once('classes/db.php'); 
require_once('classes/chats.php');
session_start();
$db = new Dbc();
if(!isset($_SESSION['id'])) {
    header("location:index.php");
}

if (isset($_POST['send'])) { 
  if(!empty($_POST['msg'])) {
    $time = date('Y:m:d H:i:s');
    $chat = new Chats($_SESSION['id'], $_GET['id'], $_POST['msg'], $time);
    $val= $chat->sendingMsg();
  }
}

  $msgs = "SELECT * FROM messages WHERE (id=".$_SESSION['id']." AND reciever_id=".$_GET['id'].") OR (id=".$_GET['id']." AND reciever_id=".$_SESSION['id'].")";
  $messages = $db->con->query($msgs);
  $res= $messages->fetch_assoc();

?>

<!doctype html>
<!-- If multi-language site, reconsider usage of html lang declaration here. -->
<html lang="en"> 
<head>
  <meta charset="utf-8">
  <title>Chat | Messaging App</title>
  <!-- View-port Basics: http://mzl.la/VYREaP -->
  <!-- This meta tag is used for mobile device to display the page without any zooming,
       so how much the device is able to fit on the screen is what's shown initially. 
       Remove comments from this tag, when you want to apply media queries to the website. -->
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> -->
  <!-- Place favicon.ico in the root directory: mathiasbynens.be/notes/touch-icons -->
  <link rel="shortcut icon" href="favicon.ico" />
  <!--font-awesome link for icons-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <a href="logout.php" title="Logout" class="logout">Logout</a>
      </div>
    </header>
    <!--header section start-->
    <!--main section start-->
    <main>
      <section>
        <div class="wrapper">
          <div class="chats">
            <?php 
                while ($row = $messages->fetch_assoc()) {
                    if ($_SESSION['id'] == $row['id']) {
                      echo "<p>
                      <span >".$row['time']."</span>
                      <span>".$row['texts']."</span>
                      </p>";
                    } else {
                      echo "<p>
                      <span>".$row['texts']."</span>
                      <span>".$row['time']."</span>
                      </p>";
                  }
              }
            
            ?>
          </div>
        </div>
      </section>
      <section>
        <div class="wrapper">
          <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"].'?id='.$_GET['id']);?>">
            <input type="text" name="msg" placeholder="Type your message here">
            <input type="submit" name="send" value = "send" class="msg-box">  
          </form>
        </div>
      </section>
    </main>
    <!--main section end-->

    <!--footer section start
    <footer>      

    </footer>
    footer section end-->

  </div>
  <!--container end-->

<!--<script src="assets/vendors/jquery-1.8.3.min.js"></script>-->
<script src="assets/js/script.js"></script>
</body>
</html>
