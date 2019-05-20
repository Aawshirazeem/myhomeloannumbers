<?php
error_reporting(1);
 session_start();
 include("session.php");
 if(isset($_POST['update']))
 {

    include ("connection.php");
    $oldpassword = $_POST['upoldpassword'];
    $newpassword = $_POST['upnewpassword'];
    if($oldpassword==$clientpassword_session)
    {
        $query = "Update login SET CustPassword='$newpassword' WHERE CustId='$custid_session'";
    mysqli_query($con,$query);
    
         echo "<script> alert('Password Changed Successfully'); </script>";
        //header("location:cprofile.php");
        
    }
    else{ echo"<script> alert('Password Doesnot Match'); </script>";}
    }
 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Customer Profile</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="customerindex.php">Welcome to My Home Loan </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                   
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>User</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>User</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>User</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $email_session; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="cprofile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="customerindex.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="cprofile.php"><i class="fa fa-fw fa-bar-chart-o"></i> My Profile</a>
                    </li>
                   
                    <li>
                        <a href="loan.php"><i class="fa fa-fw fa-edit"></i> Apply Loan</a>
                    </li>
                    
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Customer Profile 
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
               <div>
<form class="form-horizontal" method="post">


<fieldset>


<!-- change col-sm-N to reflect how you would like your column spacing (http://getbootstrap.com/css/#forms-control-sizes) -->


<!-- Form Name -->
<legend> </legend>

<!-- Text input http://getbootstrap.com/css/#forms -->
<div class="form-group">
  <label for="upemail" class="control-label col-sm-2">Email</label>
  <div class="col-sm-8">
    <input type="email" class="form-control" id="upemail" placeholder=" " value="<?php echo $email_session ?>" readonly="true">
    <p class="help-block"> </p>
  </div>
</div>
<!-- Text input http://getbootstrap.com/css/#forms -->
<div class="form-group">
  <label for=" upname" class="control-label col-sm-2">Customer Name</label>
  <div class="col-sm-8">
    <input type="text" class="form-control" id=" upname" placeholder=" " value="<?php echo $name_session ?>" readonly="true">
    <p class="help-block"> </p>
  </div>
</div>
<!-- Text input http://getbootstrap.com/css/#forms -->
<div class="form-group">
  <label for="uphone" class="control-label col-sm-2">Phone No</label>
  <div class="col-sm-8">
    <input type="tel" class="form-control" id="upphone" placeholder=" " value="<?php echo $phone_session ?>" readonly="true">
    <p class="help-block"> </p>
  </div>
</div>
<!-- Text input http://getbootstrap.com/css/#forms -->
<div class="form-group">
  <label for=" address" class="control-label col-sm-2">Customer Address</label>
  <div class="col-sm-8">
    <input type="text" class="form-control" id=" upaddress" placeholder=" " value="<?php echo $address_session ?>" readonly="">
    <p class="help-block"> </p>
  </div>
</div>
<!-- Text input http://getbootstrap.com/css/#forms -->
<div class="form-group">
  <label for=" upoldpassword" class="control-label col-sm-2">Old Password</label>
  <div class="col-sm-8">
    <input type="password" class="form-control" required="true" id=" upoldpassword" name="upoldpassword" >
    <p class="help-block"> </p>
  </div>
</div>
<div class="form-group">
  <label for=" upnewpassword" class="control-label col-sm-2">New Password</label>
  <div class="col-sm-8">
    <input type="password" class="form-control" title="Minimum 8 characters, one number, one uppercase and one lowercase letter" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*" required="true" id=" upnewpassword" name="upnewpassword" >
    <p class="help-block"> </p>
  </div>
</div>
<!-- Button http://getbootstrap.com/css/#buttons -->
<div class="form-group">
  <label class="control-label col-sm-2" for="update"> </label>
  <div class="text-right col-sm-8">
    <button  id="update" name="update" class="btn btn-primary" >Update</button>
    <p class="help-block"> </p>
  </div>
</div>


</fieldset>
</form>

			   
			   
			   
			   </div>
                
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

    <!-- Flot Charts JavaScript -->
    <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/flot-data.js"></script>

</body>

</html>
