<?php

include("session.php");

    $counter=$_POST['counter'];
    $counter = $counter_session;
    $counter = $counter+1;
    

    include ("connection.php");

$query = "Update login SET CustCounter='$counter' WHERE CustId='$custid_session'";
    if(mysqli_query($con,$query))
    {
        echo $counter;
        
    }
    else{ echo "try again";}
     

?>