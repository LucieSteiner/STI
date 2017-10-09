<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('../models/messages.php');
include_once('../utils/check_session.php');
if(isset($_POST['to']) and isset($_POST['title']) and isset($_POST['message'])){
    write_message($_SESSION['user'], $_POST['to'], $_POST['title'], $_POST['message']);
    header('Location: messages.php');
}
if(isset($_GET['reply_to']) and isset($_GET['reply_title'])){
    $to = $_GET['reply_to'];
    $title = $_GET['reply_title'];
    unset($_GET['reply_to']);
    unset($_GET['reply_title']);
}
else{
    $to = '';
    $title = '';
}

?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>STI</title>
  <!-- Bootstrap core CSS-->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!--Navigation-->
    <?php include("../includes/nav_bar.php"); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <form action="messages.php">
	    <input type="submit" value="Return to messages">
	</form>
        <form action="write_message.php" method="post">
	    <label>To: </label>
	    <input type="text" name="to" value="<?php echo $to;?>"><br/>
	    
	    <label>Title: </label>
	    <input type="text" name="title" value="<?php echo $title;?>"><br/>
	
	    <label>Message:</label><br/>
	    <textarea name="message"></textarea><br/>

	    <input type="submit" value="Submit">
	</form>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
    
    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/popper/popper.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin.min.js"></script>
  </div>
</body>

</html>
