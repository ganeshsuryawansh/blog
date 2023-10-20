<?php
session_start();
include('include/dbconnect.php');

//error_reporting(E_ALL ^ E_NOTICE);




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    try{
        if(strlen($password)<8){
            ?>
                <script>
                    alert("Password Must be 8 Character");
                </script>
            <?php
        }else{
            $data = $conn->prepare("INSERT INTO `blog_users` (`name`, `email`, `password`) VALUES (?, ?, ?)");
            $data->execute(array($name, $email, $password));
    
            if(isset($data)){
                echo('Successfully registered!');
                header("Location: login.php");
            }
        }
    }
    catch(Exception $e){
        echo("Email Already Exists !");
        //echo($e);
    }
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    <div class="container mt-5">
        <h1>Register Now</h1>
        <form action="register.php" method="POST" name="myForm" onsubmit="return validateForm()">
            <div class="form-group col-md-6">
                <label for="Username">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="name" required>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="Username">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="" name="email" required>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="Username">Set password</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="password" required>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary my-2">Submit</button>
            <b>Already registered <a href="login.php">Login</a>Here !</b>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    
    <script>
        function validateForm() {
          var email = document.forms["myForm"]["email"].value;
          var password = document.forms["myForm"]["password"].value;
          var name = document.forms["myForm"]["name"].value;


          if(password<8){
            //alert("Password less tahn 8 Character ")
          }
          var nameRegex = /^[a-zA-Z ]+$/; // Regular expression to match only characters and spaces

          var emailRegex = /^[^!#$%^&*()_+\-=[\]{};':"\\|,<>/?]*@[^!#$%^&*()_+\-=[\]{};':"\\|,<>/?]*$/; // Regular expression to match valid email format

        
          if (!emailRegex.test(email)) {
            alert("Please enter a valid email address.");
            return false;
          }

          if (!nameRegex.test(name)) {
            alert("Please enter a valid name");
            return false;
          }

        }
    </script>

</body>
</html>