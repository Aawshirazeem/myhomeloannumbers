<?php 
            session_start();
            if(isset($_POST['btnlogin'])){
                 $adminname=$_POST['adminname'];
                 $adminpassword=$_POST['adminpassword'];


               if($adminname && $adminpassword)
               {
                include("connection.php");
                $sql = "select * from adminlogin where AdminName = '$adminname' and Password = '$adminpassword'";
                $run=mysqli_query($con, $sql);
               // echo "$run";
                $numrows = mysqli_num_rows($run);
                echo "$rows";
                if ($numrows>=1)
                {
                    $_SESSION['adminname']=$adminname;
                  
                    header("location: adminindex.php");
                }
                else 
                {
                    echo"<script> alert('Email or Password InValid'); </script>";
                }
               }
              
       }
       if(isset($_SESSION['adminname']))
       {
        header("location: adminindex.php");
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

    <title>My Home Loan</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="brand">My Home Loan</div>
    <div class="address-bar"> 151 Kalmus Drive, Suite A- 203, Costa Mesa, California 92626</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.php">My Home Loan</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="signup.php">Sign Up</a>
                    </li>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Sign in
                        <strong>My Home Loan (Admin Login)</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-6">
                    <img class="img-responsive img-border-left" src="img/Log b.png" alt="">
                </div>
				 <div class="container">
			<div class="row main">
				 
						 
						 
	 <div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
    

    <form method="post" >
     <div class="form-group ">
      <label class="control-label " for="adminname">
      UserName
      </label>
      <input class="form-control" id="adminname" required="true" name="adminname" type="text"/>
     </div>
     
     <div class="form-group ">
       <label class="control-label " for="adminpassword">
        Password
      </label>
      <input class="form-control" id="adminpassword" required="true" title="Password Incorrect" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*" name="adminpassword" type="password"/>
     </div>
	  
    <div class="form-group ">
       <button class="btn btn-primary " name="btnlogin">
        LOG IN
       </button>
      </div>
     
    </form>
   </div>
  </div>
 </div>
</div>
</div>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="assets/js/bootstrap.js"></script>

      
                <div  
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

         
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>



    
      
   