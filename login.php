<?php
session_start();
include('include/dbconnect.php');

error_reporting(E_ALL ^ E_NOTICE);

$login = false;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    try{

        
        $query = "SELECT * FROM blog_users WHERE email = '$email'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll();
        if (!$results) {
            echo ("No user Found...");
        }
    

        foreach ($results as $result) {
            if($result['password'] ==$password){
                $login = true;
                $_SESSION['userid'] =  $email;
                echo('Login Successfully !'. $_SESSION['userid']);
                header("Location: index.php");
            }
            else{
                echo"Wrong Password";
            }
        }
    }
    catch(Exception $e){
        echo("Something went wrong! ");
        echo($e);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    <div class="container mt-5">
        <h1>Login Now</h1>
        <form action="login.php" method="POST">
            
            <div class="form-group col-md-6">
                <label for="Username">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="" name="email" required>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="Username">Password</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="password" required>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-success my-2">Login</button>
            <b>You don't have an Account <a href="register.php">Register</a>Here !</b>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>