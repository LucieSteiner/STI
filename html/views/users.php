<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('../utils/check_session.php');
include_once('../utils/check_admin.php');
include_once('../models/users.php');
$users = get_all_users();
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
          <form action="create_user.php">
	    <input type="submit" value="Create new user">
	</form>
	<ul>
	    <?php foreach($users as $user){ ?>
	    <li>
		<?php echo $user['login']; if (get_user_id($_SESSION['user']) != $user['id']){?>

	    	<form action="edit_user.php" method="post">
		    <input type="hidden" name="user_id" value="<?php echo $user['id'];?>">
		    <input type="submit" value="Edit">
		</form>
		<form action="../utils/delete_user.php">
		    <input type="hidden" name="to_delete" value="<?php echo $user['id'];?>">
		    <input type="submit" value="Delete">
		</form>	
		<?php } ?>
	    </li>    
	    <?php } ?>
	</ul>
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
