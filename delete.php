<?php

    include 'config.php';
  

    if(isset($_POST['submit'])){
        $id = $_POST['id']; 
    $sql = "DELETE FROM person WHERE id = $id";
   mysqli_query($conn, $sql);
   echo '<script> alert("Record deleted !");
   window.location.href="index.php"; </script>'; 
    } 
 
   
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Delete Record</h2>
                    <form action="delete.php" method="post">
                        <div class="alert alert-danger">
                        
                            <p>Are you sure you want to delete this person record?</p>
                            <p>
                            <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>"/>
                                <input type="submit" value="Yes" name="submit" class="btn btn-danger">
                                <a href="index.php" class="btn btn-secondary">No</a>
                            </p>
                        </div>
                    </form>
                       <?php
?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>