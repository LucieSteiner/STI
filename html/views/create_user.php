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

?><!--
<html>
    <head>
    </head>
    <body>
	<form action="create_user.php" method="post">
	    <label for="login">Login</label>
	    <input type="text" name="login"><br/>

	    <label for="role">Role</label>
	    <select name="role">
		<option value="employee">Employee</option>
		<option value="admin">Administrator</option>
	    </select><br/>

	    <label for="validity">Active?</label>
	    <input type="radio" name="validity" value="1">Yes<br/>
	    <input type="radio" name="validity" value="0">No<br/>
	    <label for="password">Password</label>
	    <input type="password" name="password"><br/>
	    
   	    <a href="users.php"><button type="button">Cancel</button></a>
	    <input type="submit" value="Create">
	</form>
    </body>
</html>-->
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
          <form action="create_user.php" method="post">
	    <label for="login">Login</label>
	    <input type="text" name="login"><br/>

	    <label for="role">Role</label>
	    <select name="role">
		<option value="employee">Employee</option>
		<option value="admin">Administrator</option>
	    </select><br/>

	    <label for="validity">Active?</label>
	    <input type="radio" name="validity" value="1">Yes<br/>
	    <input type="radio" name="validity" value="0">No<br/>
	    <label for="password">Password</label>
	    <input type="password" name="password"><br/>
	    
   	    <a href="users.php"><button type="button">Cancel</button></a>
	    <input type="submit" value="Create">
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
