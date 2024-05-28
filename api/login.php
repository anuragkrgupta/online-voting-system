<?php
    session_start();
    include("connect.php");
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $check = mysqli_query($con, "SELECT * FROM user WHERE  Mobile='$mobile' AND Password='$password' AND Role='$role' ");
    if(mysqli_num_rows($check) > 0){
        $userdata = mysqli_fetch_array($check);
        $party = mysqli_query($con, "SELECT * FROM user WHERE role=2");
        $partydata = mysqli_fetch_all($party, MYSQLI_ASSOC);

        $_SESSION['userdata'] = $userdata;
        $_SESSION['partydata'] = $partydata;
        echo "
    <script>
    window.location.href='../routers/dashboard.php';
    </script>
    ";

        }else{
            echo "
    <script>
    alert('Invalid Credentials');
    window.location.href='../routers/login.html';
    </script>
    ";
            }
?>