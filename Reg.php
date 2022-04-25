<?php
include "Db_Conn.php";
$username = strtolower($_POST['username']);
$password = $_POST['pass'];
if(isset($_FILES['profilePic'])){
echo "<pre>";
print_r($_FILES['profilePic']);
echo "</pre>";
$password = password_hash($password,PASSWORD_BCRYPT);
$img_name = $_FILES['profilePic']['name'];
$img_size = $_FILES['profilePic']['size'];
$tmp_name = $_FILES['profilePic']['tmp_name'];
$error = $_FILES['profilePic']['error'];
if ($error === 0) {
    if ($img_size > 2040083) {
        $em = "Sorry, your file is too large.  ".$img_size;
        header("Location: index.php?error=$em");
    } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                $image_status = true;

            } else {
                $em = "You can't upload files of this type";
                header("Location: index.php?error=$em");
            }
        }
    }
    else{
        $em = "Unknown error occured";
        header("Location: index.php?error=$em");
    }
}else{
    echo"image not set";
}
    $sql="select * from userdetails where (name='$username');";
    $res=mysqli_query($conn,$sql);
    if (mysqli_num_rows($res) > 0) {
        echo "Already Registered using this username..";
        header("Refresh:3; url=index.php");
    }
   else if($image_status == true){ 
       $sql = "INSERT INTO userdetails (name,password,profilePic) VALUES ('$username','$password','$new_img_name')";
       $iquery = mysqli_query($conn,$sql);
        if(!$iquery){
            echo "Not inserted !!!";
            header("Refresh:5; url=index.php");
        }
        else{
            echo "Inserted correctly !!! hurray";
            header("Refresh:5; url=index.php");   
        }
    }
?>