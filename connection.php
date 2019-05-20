<?php

$servername='localhost';
$username ='myhomeloannumber';
$password ='Blay256928';
$dbname = 'myhomeloan';

$con = new mysqli($servername, $username, $password, $dbname) or die("Unable to connect");

 
/*class CommandBuilder
{
     private $servername;
	 private $username;
	 private $password;
	 private $dbname;
	 public  $conn;
public function __construct(){
$this->servername = "localhost";
$this->username ='root';
$this->password ='';
$this->dbname = 'myhomeloan';

$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
 
       if ($this->conn->connect_error) {
    die("Connection failed: " . $this->conn->connect_error);
}
}
public function __destruct(){

$this->conn->close();	

}
public function checkLogin($sql,$password,$email){

$sqlit = mysqli_query($this->conn,$sql);


$rows=mysqli_fetch_array($sqlit);
if($rows['CustEmail']==$email && $rows['CustPassword']==$password){

 session_start();
 $_SESSION['CustName']=$rows['CustName'];
    

header('Location:Customer/customerindex.php') ;
}
else
{
	echo "try again";
}

}
}

*/
?>