<?php
   if(isset($_FILES['profilePic'])){
      $errors= array();

      echo $_FILES['profilePic'];
    //   $file_name = $_FILES['profilePic']['name'];
    //   $file_size =$_FILES['profilePic']['size'];
    //   $file_tmp =$_FILES['profilePic']['tmp_name'];
    //   $file_type=$_FILES['profilePic']['type'];
    //   $file_ext=strtolower(end(explode('.',$_FILES['profilePic']['name'])));
    //
    //   $extensions= array("jpeg","jpg","png");
    //
    //   if(in_array($file_ext,$extensions)=== false){
    //      $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    //   }
    //
    //   if(empty($errors)==true){
    //      move_uploaded_file($file_tmp,"profile_pics/".$file_name);
    //      echo "Success";
    //   }else{
    //      print_r($errors);
    //   }
    // echo "profile_pics/".$file_name;
   }

?>
