<?php
session_start();
if(!isset($_SESSION['userdata']))
{ 
    header("location:login.html");
}

  $userdata=$_SESSION['userdata'];
  $partydata=$_SESSION['partydata'];

  if($_SESSION['userdata']['Status']==0){
    $status = '<b style="color:red">Not Voted</b>';
  }
  else{
    $status = '<b style="color:green">Voted</b>';
  }
?>
<html>
      <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="../routers/style.css">
</head>
<body>
    <style>
     #backbtn{
        padding: 5px;
        font-size: 15px;
        background-color: #B9E794;
        color:black;
        border-radius: 5px;  
        float:left;   
        margin:10px;
     } 
   
     #logoutbtn{
        padding: 5px;
        font-size: 15px;
        background-color: #B9E794;
        color:black;
        border-radius: 5px;  
        float:right;
        margin:10px;
     }

     #Profile
      {
       background-color: white;
       width: 30%;
       padding: 20px;
       float: left;
     }
     #party{
      background-color: white;
      width: 50%;
      padding: 50px;
      float: right;
      text-align: left;

     }
     #votebtn{
        padding: 5px;
        font-size: 15px;
        background-color: #B9E794;
        color:black;
        border-radius: 5px;  
        float:left;
     }

      #mainpanel{
        padding: 50px;
      }
      #voted{
        padding: 5px;
        font-size: 15px;
        background-color:green;
        color:white;
        border-radius: 5px;  
        float:left;
      }
    

     </style>

     <div id="mainSection">
    <center>
     <div id="headerSection">
     <a href="login.html"><button id="backbtn">Back</button></a>
     <a href="logout.php"><button id="logoutbtn">Logout</button></a>
       <h1>Online Voting System</h1>
    </div>
   </center>
    <hr>

    <div id="mainpanel"><br>
    <div id="Profile">
      <center>  <img src="../uploads/<?php echo $userdata ['Photo']?>" height="100" width="100"><br><br></center>
       <b>Name:</b> <?php echo $userdata['Name']?> <br><br>
       <b>Mobile:</b> <?php echo $userdata['Mobile']?> <br><br>
       <b>Address:</b> <?php echo $userdata['Address']?> <br><br>
       <b>Status:</b> <?php echo $status?> <br><br>
    </div>

    <div id="party">
       <?php
         if($_SESSION['partydata']){
           for($i=0; $i<count($partydata); $i++){
             ?>
             <div> 
             <img style="float:right" src="../uploads/<?php echo $partydata[$i]['Photo']?>" height="100" width="100"><br><br>
                <b>Party Name: </b> <?php  echo $partydata[$i]['Name']?><br><br>
                <b>Votes: </b>  <?php  echo $partydata[$i]['Vote']?><br><br>
               <form action="../api/vote.php" method="POST">
                  <input type="hidden" name="gvotes" value="<?php echo $partydata[$i]['Vote'] ?>">
                  <input type="hidden" name="gid" value="<?php echo $partydata[$i]['Id'] ?>">
                 
                  <?php 
                   if($_SESSION['userdata']['Status']==0){
                    ?>
                    <input type="submit" name="votebtn" value="Vote" id="votebtn">
                    <?php
                   }
                   else{
                      ?>
                    <button disabled type="button" name="votebtn" value="Vote" id="voted">Voted</button>
                    <?php
                   }

                  ?>
                 
               </form>
           </div>
           <hr>
             <?php
           }
         }
         else{

         }
       ?>
    </div>

      </div>

      </body>
</html>