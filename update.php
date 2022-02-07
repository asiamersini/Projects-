<?php
// Include config file
require_once "config.php";


          ?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form method="post" action="update.php">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lastname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>"/>
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                    <?php
                  

                    if(isset($_POST['submit'])){
                   $id = $_POST['id'];
                   $name=$_POST['name']; 
                   $lastname=$_POST['lastname'];
                   $city=$_POST['city'];
                   $address=$_POST['address'];
         
                    $sql="SELECT * FROM person where id = '$id'";
                    $res=mysqli_query($conn,$sql);
                    while($el=mysqli_fetch_array($res)){
                         if(empty($name) ){ 
                            $name = $el['firstname'];
                         };
                         if(empty($lastname) ){ 
                             $lastname = $el['lastname'];
                         };
                         if(empty($city) ){ 
                            $city = $el['city'];
                         };
                         if(empty($address) ){ 
                             $address= $el['addr'];
                         };
                     }
                        
                   $sql3= "UPDATE person SET firstname='$name', lastname='$lastname', addr='$address', city='$city' WHERE id = $id";
                   mysqli_query($conn, $sql3);
                   #if (mysqli_query($conn, $sql3)) {
                  #   echo "Record updated successfully";
                 #  } else {
                   #  echo "Error updating record: " . mysqli_error($conn);
                   #}
                   
                   echo '<script> alert("Updated !");
                    window.location.href="index.php"; </script>'; 
                     
                  }
                     
                    ?>
                    </div>
            </div>        
        </div>
    </div>

</body>
</html>

