<?php
$con = mysqli_connect("localhost", "root", "", "voting") or die("connection failed");

if($con){
    echo "connected!";

}
else{
    echo "not connected!";
}

?>