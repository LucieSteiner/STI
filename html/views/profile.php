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
//TODO: ajouter erreurs champs et confirmation
?>
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
	  <h1>Profile: <?php echo $_SESSION['user'];?></h1>
	  <hr></hr>
          
	  <div class="row justify-content-center">
	    <div class="col-md-4">
	      <div class="card">
                <div class="card-header">Change password</div>
                <div class="card-body">
                  <form action="../views/profile.php" method="post">
          	    <div class="form-group">
            	      <label for="old">Current password</label>
                        <input class="form-control" id="old" name="old" type="password">
          	    </div>
		  <div class="form-group">
		    <label for="new">New password</label>
		    <input class="form-control" id="new" name="new" type="password">
		  </div>
		  <div class="form-group">
		    <label for="new2">Confirm new password</label>
		    <input class="form-control" id="new2" name="new2" type="password">
		  </div>
		  <input class="btn btn-primary float-right" type="submit" value="Submit">
		</form>
	      </div>
        </div>
    </div>
</div>

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

