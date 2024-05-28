<?php
include("database.php");
include("connect.php");
$Name = $_POST['name'];
$Mobile = $_POST['mobile'];
$Password = $_POST['password'];
$Address = $_POST['address'];
$cpassword = $_POST['cpassword'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role =$_POST['role'];

if($Password==$cpassword){
move_uploaded_file($tmp_name, "../uploads/$image");
$insert = mysqli_query($con, "INSERT INTO User (Name, Mobile ,Password , Address, Photo, Role, Vote, Status) VALUES ('$Name', '$Mobile', '$Password', '$Address', '$image', '$role', 0, 0)");
if($insert){
    echo "
    <script>
    alert('Registration successful');
    window.location.href='../routers/login.html';
    </script>";
}
else{
    echo "
    <script>
    alert('Some error occured');
    window.location.href='../routers/registeration.html';
    </script>
    ";
}
}
else{
    echo "
    <script>
    alert('confirm password does not match!');
    window.location.href='../routers/registeration.html';
    </script>";
}

?>