<?php
include_once('../models/users.php');
include_once('../utils/check_session.php');
include_once('../utils/check_admin.php');


if(isset($_POST['login']) and isset($_POST['role']) and isset($_POST['validity']) and isset($_POST['password'])){
    $result = create_user($_POST['login'], $_POST['role'], $_POST['validity'], crypt($_POST['password']));
    if(!$result){
	echo 'This username is not available!';
    }
    else{
	header('Location: users.php');
    }
}
//TODO: ajouter 2e champ mot de passe
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
	  <h1>New user</h1>
	  <hr></hr>
	  <div class="row justify-content-center">
	    <div class="col-md-4">
	      <div class="card">
      		<div class="card-header">Create new user</div>
      		<div class="card-body">
        	  <form action="create_user.php" method="post">
          	    <div class="form-group">
            	      <label for="login">Login</label>
            	      <input class="form-control" id="login" name="login" type="text">
          	    </div>
		    <div class="form-group">
		      <label for="role">Role</label>
		      <select class="form-control" id="role" name="role">
			<option value="employee">Employee</option>
			<option value="admin">Administrator</option>
		      </select>
		    </div>
		    <fieldset class="form-group">
	    	      <label>Active?</label>
	    	      <div class="form-check">
	      		<label class="form-check-label">
			  <input type="radio" class="form-check-input" name="validity" id="optionsRadios1" value="1"> Yes
		        </label>
	    	      </div>
		      <div class="form-check">
		        <label class="form-check-label">
			  <input type="radio" class="form-check-input" name="validity" id="optionsRadios2" value="0"> No
		        </label>
		      </div>
	  	    </fieldset>
		    <div class="form-group">
		      <label for="password">Password</label>
		      <input class="form-control" id="password" name="password" type="password">
		    </div>
		    <span class="float-right">
		      <input class="btn btn-success" type="submit" value="Create">
		      <a href="users.php"><button class="btn btn-primary" type="button">Cancel</button></a>
		    </span>
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
