<?php
// Include config file
require_once "config.php";
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add person record to the database.</p>
                    <form method="post" action="create.php">
                        <div class="form-group">
                            <label>Name</label>
                          <input type="text" name="name" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>LastName</label>
                            <input type="text" name="lastname" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" />
                        </div>
                        <input type="submit" name="submit"  class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>

<?php 
           
           if(isset($_POST['submit'])){
          $name=$_POST['name']; 
          $lastname=$_POST['lastname'];
          $city=$_POST['city'];
          $address=$_POST['address'];
               
           $sql="SELECT * FROM person where firstname='$name' and lastname='$lastname'";
           $res=mysqli_num_rows(mysqli_query($conn,$sql));
            if($res>0){
            echo '<script> alert("This person exists!");
            window.location.href="index.php"; </script>';  }
            else{ 
                $sql2="INSERT INTO  person (lastname,firstname,addr,city) values ('$lastname','$name','$address','$city')";
                mysqli_query($conn,$sql2);
                echo '<script> alert("Successfully added!");
                window.location.href="index.php"; </script>'; 

                 }}
      
          ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>

