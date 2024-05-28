<?php
session_start();
include('connect.php');

$votes = $_POST['gvotes'];
$total_votes = $votes+1;
$gid = $_POST['gid'];
$uid = $_SESSION['userdata']['Id'];

$update_votes = mysqli_query($con, "UPDATE user SET Vote='$total_votes' WHERE Id='$gid' ");
$update_user_status = mysqli_query($con,"UPDATE user SET status=1 WHERE id='$uid'");

if($update_votes and $update_user_status){
        $party = mysqli_query($con, "SELECT * FROM user WHERE role=2");
        $partydata = mysqli_fetch_all($party, MYSQLI_ASSOC);
        $_SESSION['userdata'] ['status'] = 1;
        $_SESSION['partydata'] = $partydata;
        echo '
        <script>
           alert ("Voting Succesfull!!");
           window.location = "../routers/logout.php";
           </script>
           ';   
}
else{
    echo '
     <script>
        alert ("Some error occured!!");
        window.location = "../routers/dashboard.php";
        </script>
        ';       
}


?>