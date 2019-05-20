<?php 

include("connection.php");
session_start();
if(isset($_SESSION['email']))
       {
        header("location: customerindex.php");
       }
if(isset($_POST['btncal'])){
    include 'connection.php';
    session_Start();
    $user_check = $_SESSION['email'];
    if($user_check!=""){
        header('Location: loan.php');
    }
    else{
        header('Location: loancheck.php');
    }


}
 
if(isset($_POST['submit']))
{

$name=$_POST["name"];
$email=$_POST["email"];
$tel=$_POST["tel"];
$addres=$_POST["address"];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
if($email != "") 
{
    $sql="SELECT * FROM login where CustEmail='$email'";  
    $result = mysqli_query($con,$sql);
    $num_rows = mysqli_num_rows($result);
    if($num_rows >= 1){
        echo "<script>
alert('Email Exits');

</script>";
return;
}
}
if ($password==$repassword)
{
$sql = "Insert into login(CustName,CustEmail,CustPassword,CustPhoneNumber,CustCounter,CustAddress) Values('$name','$email','$password','$tel','0' ,'$addres')";
$res=mysqli_query($con, $sql );
echo 
"<script>
alert('Registered Successfully');

</script>";
?>
 <script >
    window.location.href="http://localhost/myphp/homeloanfinal/login.php";
</script>
<?php
}
else{echo
"<script>
alert('Password doesnot Match');

</script>";
}


}


/*
class User{

  private $name;
  private $email;
  private $tel;
  private $password;
  private $counter = 0;

  public function __construct(){
    if(isset($_POST['submit']))
  {
    include("connection.php");

$this->name=$_POST["name"];
$this->email=$_POST["email"];
$this->tel=$_POST["tel"];
$this->password=$_POST['password'];
$this->save();

  }
}
public function save(){
  $CommandBuilder = new CommandBuilder();

  $sql = "Insert into login(CustName,CustEmail,CustPassword,CustPhoneNumber,CustCounter) Values('$this->name','$this->email',
  '$this->password','$this->tel','$this->counter')";
  if($CommandBuilder->conn->query($sql)===TRUE)
  {
    echo "New Record Entered successfully";
  }
  else {
    echo "Error: ".$sql."<br>".$CommandBuilder->conn->error;
  }
}
 
}
$User = new User();
*/
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
                <a class="navbar-brand" href="index.html">My Home Loan</a>
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
                     <li>
                         <form method="post">
                        <button name="btncal" style="padding:35px;color:#777;background-color: Transparent;background-repeat:no-repeat;border: none;cursor:pointer;overflow: hidden;outline:none;"> CALCULATE LOAN </button>
                         </form>
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
                    <h2 class="intro-text text-center "> <strong>Sign Up </strong>
                        <strong>My Home Loan</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-6">
                    <img class="img-responsive  img-border-left" src="img/sign b.png" alt="">
                </div>
				 <div class="container">
			<div class="row main">
				 
						 
						 
	 <div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">

          <form method="post" action="signup.php">
           <div class="form-group ">
            <label class="control-label " for="name">
            First Name
             <span class="asteriskField">
              *
             </span>
            </label>
            <input class="form-control" id="name" name="name" pattern="\w{3,}" title="Atleast 3 alphanumeric characters"  type="text" required="TRUE"  />
           </div>
           <div class="form-group ">
            <label class="control-label requiredField" for="address">
             Last Name
              <span class="asteriskField">
              *
             </span>
            </label>
            <input class="form-control" id="address" name="address" type="text"  pattern="\w{3,}" title="Atleast 3 alphanumeric characters" required="TRUE" />
           </div>
           
           <div class="form-group ">
            <label class="control-label requiredField" for="email">
             Email
             <span class="asteriskField">
              *
             </span>
            </label>
            <input class="form-control" id="email" name="email" type="email" required="TRUE" />
           </div>
           <div class="form-group ">
            <label class="control-label " for="password">
              Password
              <span class="asteriskField">
              *
             </span>
            </label>
            <input class="form-control" id="password" name="password" title="Minimum 8 characters, one number, one uppercase and one lowercase letter" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*" type="password" min="8" required="TRUE" />
           </div>
         <div class="form-group ">
            <label class="control-label " for="repassword">
             Renter Password
             <span class="asteriskField">
              *
             </span>
            </label>
            <input class="form-control" id="repassword" name="repassword" type="password" required="TRUE" />
           </div>
           <div class="form-group ">
            <label class="control-label " for="tel">
             Telephone #
            </label>
            <input class="form-control" id="tel" name="tel" title="000-000-0000" pattern="^\d{3}-\d{3}-\d{4}$" type="tel"  />
           </div>
           <div class="form-group">
            <div>

             <button class="btn btn-primary" id="submit" name="submit" >
              Submit
             </button>
            </div>
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
                    <p>Copyright &copy;  2017</p>
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
