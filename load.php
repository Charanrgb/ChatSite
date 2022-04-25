<?php
      include "DB_Conn.php";
      session_start();
      $ID = $_SESSION['username'];                              //RETRIEVAL
      $sql="select ID from userdetails where (name='$ID');";
      $res2=mysqli_query($conn,$sql);
      if (mysqli_num_rows($res2) > 0) {
        $ID = mysqli_fetch_array($res2)['ID'];
      }
      $sql = "SELECT * FROM usermsg WHERE (RecvID ='$ID' or SenderID = '$ID') ;";//retrives the messages which where sent to him
      $res = mysqli_query($conn,$sql);
      $resultCheck = mysqli_num_rows($res);
      echo '<link rel="stylesheet" href="style.css" type="text/css">
      <script src="JavaScript.js"></script>';
      if($resultCheck > 0){
        $count = 0;
          while($row = mysqli_fetch_assoc($res)){
            $sql2= "SELECT Name FROM userdetails WHERE (ID ='$row[SenderID]') ;";
            $sql3 = "SELECT Name FROM userdetails WHERE (ID ='$row[RecvID]') ;";

            $res2 = mysqli_query($conn,$sql2);
            $row2 = mysqli_fetch_assoc($res2);

            $res3 = mysqli_query($conn, $sql3);
            $row3 = mysqli_fetch_assoc($res3);
            if($row['SenderID'] == $ID){
              echo '   <div class="container">
                        <div class="inner-container2" onclick=' . 'Copy('.$count.')>
                          <p style="font-weight: 1000;" class = "msg" >Reply to '.ucfirst($row3['Name']). '</p>
                          <p>'." $row[Messages]".' </p>
                      </div> </div><br>';
            }
            else{
              echo '<div class="container">
                    <div class="inner-container1" onclick=' . 'Copy('.$count.')>
                      <p style="font-weight: 1000;" class =  "msg" >From '.ucfirst($row2['Name']). '</p>
                      <p>'." $row[Messages]".' </p>
                    </div> </div><br>';
          }
          $count++;
        }
      }
      else{
        echo "You have no messages !!";
      }
    ?>