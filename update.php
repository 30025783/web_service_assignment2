<?php session_start();
    // include 'connection.php';
    // Create Database credential variables
    $user = "a30025783";
    $password = "9400710210@Riya218";
    $db = "a3002578_ftp";  
    // Create php db connection object
    $connection = new mysqli('ftp.30025783.2020.labnet.nz', $user, $password, $db) or die(mysqli_error($connection));
    
    // Check if form has been filled out by checking POST value, then insert form contents into database.
    if(isset($_POST['update']))
    {   
      $uploadfilePath =$_POST['path'];  
      $file=$_FILES['userfile']['name'];
        
        if($file)
        {
          $uploadpath = "images/";
          $fileName=$_FILES['userfile']['name'];
          $fileTempName=$_FILES['userfile']['tmp_name'];
          $Size=$_FILES['userfile']['size'];
          $error=$_FILES['userfile']['error'];          
      
          $fileExt=explode('.', $fileName);
          $fileActualExt=strtolower(end($fileExt));
          $allowed=array('jpg','jpeg','png');
           if(in_array($fileActualExt,$allowed))
           {
             if($error===0)
             {
                if($Size<1000000)
                {
                  $uploadfilePath = $uploadpath . basename($_FILES['userfile']['name']);
                  if(move_uploaded_file($fileTempName,$uploadfilePath))
                  {
                    echo "File is valid, and was successfully uploaded.\n";                         
                  }
                  else{
                    echo "Upload failed";
                  }
      
                }
                else{
                  echo "your file is big in size";
                }
             }
             else{
               echo "there is an error uploading file";
             }
           }
           else{
              echo "error";
           }
        }


    // save all $_POST values from form into separate variables
    $id =$_POST['id'];
    $item_no = $_POST['item_no'];
    $object_class = mysqli_real_escape_string($connection, $_POST['object_class']);
    //$subject_image = mysqli_real_escape_string($connection, $_POST['subject_image']);
    $procedures = mysqli_real_escape_string($connection, $_POST['procedures']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $reference = mysqli_real_escape_string($connection, $_POST['reference']);
    $additional_notes= mysqli_real_escape_string($connection, $_POST['additional_notes']);
    $appendix= mysqli_real_escape_string($connection, $_POST['appendix']);
    $subject_image=$uploadfilePath;
    //update command
    $update= $connection->query("update subject set item_no='$item_no' ,object_class='$object_class' ,procedures='$procedures' ,description='$description' ,reference='$reference' ,additional_notes='$additional_notes' ,appendix='$appendix', subject_image='$subject_image' where id = $id");
    
    if($update)
    {   
        //header("Location:forms/updateview.php");
       echo "<script>location='forms/updateview.php'</script>";
    }
    
  }
?>