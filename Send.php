<?php

    $Fname = preg_replace('/\s+/', '', $_POST['Fname']);
    $msg = $_POST['msg'];
    $ID = $_SESSION['username'];
    include "bad_Words_list.php";
    $msg = str_ireplace($ListOfBadWords,str_repeat("*",strlen($msg)),$msg);

   /* ?>
   
   <script src = "JavaScript.js">
      </script>
      <script>
      var a = filter('<?=$msg?>');
      </script>
      <?php
*/
    if($msg != ""){
    $sql="select * from userdetails where (name='$Fname');";
    $res1=mysqli_query($conn,$sql);
    $sql="select * from userdetails where (name='$ID');";
    $res2=mysqli_query($conn,$sql);
    
    if (mysqli_num_rows($res2) > 0) {
        $ID = mysqli_fetch_array($res2)['ID'];
    }
    
    if (mysqli_num_rows($res1) > 0) {
        $RecvID = mysqli_fetch_array($res1)['ID'];
    
        $sql = "INSERT INTO usermsg (SenderID,RecvID,Messages) VALUES ('$ID','$RecvID','$msg')";
            $iquery = mysqli_query($conn,$sql);
            if(!$iquery){
                echo "not inserted !!";
            }
            
    }
    else{
        echo "Friend details not found !!";
    }
}
else{
    echo "Message cant be empty!";
}
?>