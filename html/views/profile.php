<?php
include_once('../models/users.php');
include_once('../utils/check_session.php');

if(isset($_POST['old']) and isset($_POST['new']) and isset($_POST['new2'])){
    if($_POST['new'] != $_POST['new2']){
	echo 'Error in new password';
    }
    else{
    	if(change_user_password($_SESSION['user'], $_POST['old'], $_POST['new'], $_POST['new2'])){
	
    	    unset($_POST['old']);
    	    unset($_POST['new']);
    	    unset($_POST['new2']);
        }else{
	    echo 'Old password is wrong!';	
        }
   }
}
?><!--
<html>
<head>
</head>
<body>
<?php echo $_SESSION['user'];?>
<form action="../views/profile.php" method="post">
<input type="password" name="old" placeholder="Current password"><br/>
<input type="password" name="new" placeholder="New password"><br/>
<input type="password" name="new2" placeholder="Confirm new password"><br/>
<input type="submit" value="Submit">
</form>
</body>
</html>-->
<!DOCTYPE html>
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
  <!-- Navigation-->
    <?php include("../includes/nav_bar.php"); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <?php echo $_SESSION['user'];?>
		<form action="../views/profile.php" method="post">
		<input type="password" name="old" placeholder="Current password"><br/>
		<input type="password" name="new" placeholder="New password"><br/>
		<input type="password" name="new2" placeholder="Confirm new password"><br/>
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

