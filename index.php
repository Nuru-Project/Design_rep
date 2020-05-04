<?php 
    session_start();
    include 'pages/connection.php';
      $error = "";
    if (isset($_POST['login'])) {
      $uname = $_POST['uname'];
      $password = $_POST['password'];

      $student = "SELECT * FROM student WHERE registration='$uname' AND password='$password'";
      $run_student = mysqli_query($conn,$student);

      $school = "SELECT * FROM school WHERE uname='$uname' AND password='$password'";
      $run_school = mysqli_query($conn,$school);

       $coord = "SELECT * FROM coordinator WHERE uname='$uname' AND password='$password'";
      $run_coord = mysqli_query($conn,$coord);

      $super = "SELECT * FROM supervisor WHERE uname='$uname' AND password='$password'";
      $run_super = mysqli_query($conn,$super);

      if (mysqli_num_rows($run_student)>0){
        $data_student = mysqli_fetch_assoc($run_student);
        $student_id = $data_student['student_id'];
        $_SESSION['student'] = $student_id;
          header('location:pages/student_dashboard.php');
        
    }elseif(mysqli_num_rows($run_school)>0){
        $data_school = mysqli_fetch_assoc($run_school);
        $school_id = $data_school['school_id'];
        $_SESSION['school']=$school_id;
        header('location:pages/school_dashboard.php');
        
    }elseif(mysqli_num_rows($run_coord)>0){
        $data_coord = mysqli_fetch_assoc($run_coord);
        $coord_id = $data_coord['coordinator_id'];
        $_SESSION['coord']=$coord_id;
        header('location:pages/coordinator_dashboard.php');

    }elseif(mysqli_num_rows($run_super)>0){

        $data_super = mysqli_fetch_assoc($run_super);
        $super_id = $data_super['supervisor_id'];
        $_SESSION['super']=$super_id;
        header('location:pages/supervisor_dashboard.php');
      }else{
      $error = "Invalid username or password";
    }
}
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BTP | login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script type="text/javascript">
      
  </script>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav" >
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="?" class="navbar-brand"><b>BLOCK TEACHING PRACTICE MANAGEMENT SYSTEM</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
      
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            
            <!-- /.messages-menu -->

            <!-- Notifications Menu -->
           
            <!-- Tasks Menu -->
            
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Main content -->
      <div class="row">
        <div class="row">
          <div class="col-lg-5 col-xs-3"></div>
          <div class="col-lg-2 col-xs-6">
            <img src="11.png" class="img-circle" alt="User Image" height="150" width="150" align="center" style="margin-top: 5px;">
          </div>
          <div class="col-lg-5 col-xs-3"></div>
        </div>
        <div class="col-lg-3">  
        </div>
        <div class="col-lg-6">
      <section class="content">
        
        
       <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border" style="text-align: center;">
              <h3 class="box-title">Login Pannel</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST">
              <div class="box-body">
                <div class="form-group" id="uname">
                  <label for="exampleInputEmail1">Username</label>
                  <label class="pull-right" style="color: red;"><?php echo $error; ?></label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Username" name="uname">
                </div>
                <div class="form-group" id="pass">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <button class="btn btn-primary btn-block" name="login" id="log">Login</button>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <div class="form-group">
                  <p>Forgot Password? <a href="pages/forgot.php">Click here</a></p>
                </div>
                <div class="row">
                    New Student? <a href="pages/register.php">Create Account</a>   
              
                <div class="col-lg-6">
               
                    New School? <a href="pages/school_registration.php">Create Account</a>   
                
                </div>
                  </div>
                  
                </div>
                
                 
              

            </form>
          
      </div>
      </section>
    </div>
    <div class="col-lg-3"></div>
    </div>
      </div>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
      </div>
      <strong>BLOCK TEACHING PRACTICE MANAGEMENT SYSTEM</strong>
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
<?php 

 ?>