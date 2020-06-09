<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create form</title>
</head>
<?php
include 'connection.php';
$id=(int) $_GET['id'];
$result= $connection->query("select * from subject where id=$id")or die($connection->error);
$row = $result->fetch_assoc();
            
// create variables that hold data from db fields
$item = $row['item_no'];
$object_class = $row['object_class'];
$procedures = $row['procedures'];
$description = $row['description'];
$subject_image = $row['subject_image'];
$reference = $row['reference'];
$additional_notes = $row['additional_notes'];
$appendix = $row['appendix'];
?>

<body background="images/milky-way.jpg">
<?php include 'template/header.php'; ?>
<div class="row" style="background-color:#339999">
        <div  class="col">
        <h1>Enter new SCP Subject Form</h1>
        <form name="update" method="POST" action="update.php" class="form-group" enctype="multipart/form-data">
        
            <br>
            <input type="hidden" name="id" value="<?php echo $id ?>" required>
            <br>
            <input type="hidden" name="path" value="<?php echo $subject_image;?>" required>

            <label>Enter Subject Number</label>
            <br>
            <input type="text" name="item_no" class="form-control" placeholder="Use the following format SCP-###" value="<?php echo $item ?>" pattern="[a-zA-Z0-9-]+" required>
            <br>
            <label>Enter Subject Class Type</label>
            <br>
            <input type="text" name="object_class" class="form-control" placeholder="Class types: Euclid, Safe, Keter, Thaumiel, Neutralized" value="<?php echo $object_class ?>" required>
            <br>            
            <br>            
            <div class="form-group">
              <label>Upload Image</label>
              <div class="custom-file">         
               <input type="file" class="custom-file-input" name="userfile" aria-describedby="inputGroupFileAddon01" style="background-color:#b4b8b7">
               <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
              <p><img src= "<?php echo $subject_image ?>" width='60' height='60'></p>
            </div>   
            <br>
            <label>Enter Containment Procedures </label>
            <br>
            <textarea name="procedures" rows="10" class="form-control" placeholder="Separate Paragraphs with \n"><?php echo $procedures ?></textarea>
            <br>
            <br>
            <label>Enter Subject Description</label>
            <br>
            <textarea name="description" rows="10" class="form-control" placeholder="Separate Paragraphs with \n"><?php echo $description ?></textarea>
            <br>
            <br>
            <label>Enter Subject Reference</label>
            <br>
            <textarea name="reference" rows="10" class="form-control" placeholder="Separate Paragraphs with \n"><?php echo $reference ?></textarea>
            <br>
            <br>
            <label>Additional Notes</label>
            <br>
            <textarea name="additional_notes" rows="5" class="form-control" placeholder="Separate Paragraphs with \n"><?php echo $additional_notes ?></textarea>
            <br>
            <br>
            <label>Appendix</label>
            <br>
            <textarea name="appendix" rows="5" class="form-control" placeholder="Separate Paragraphs with \n"><?php echo $appendix ?></textarea>
            <input type="submit" class="btn btn-success" name="update" value="Submit Subject Data">
            </form>
        </div>
    </div>
   <?php include 'template/footer.php'; ?>
<!-- Display DATA entry form below -->
</body>
</html>
