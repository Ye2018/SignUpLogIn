<?php
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        // something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($user_name)  && !empty($password) && !is_numeric($user_name))
        {
            //save to database
            $user_id = random_num(20);
            $query = "insert into `users` (`user_id`, `user_name`, `password`) values ('".$user_id."', '".$user_name."', '".$password."')";

            mysqli_query($con, $query);
            //if ($con->query($query) === TRUE){
            //    echo "New record created successfully!";
            //}else{
            //    echo "Error: ".$query."<br>".$con->error;
            //}
            header("Location: login.php");
            die;

        }else
        {
            echo "Please enter some valued information!";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\style.css">
    <title>SignUP</title>
</head>
<body>
    <div class="signup-form">
        <img src="images\user.png">
        <form action="" method = "post">
        
            <div style="font-size: 20px; margin: 10px; color: white;">SignUP</div>

            <input id="text" type="text" name="user_name"><br><br>
            <input id="text" type="password" name="password"><br><br>

            <!--<input class="btn" type="submit" value="SignUp"><br><br>-->
            <input id="button" type="submit" value="SignUp"><br><br>

            <a href="login.php">Click to Log In</a><br><br>
        </form>
    </div>
</body>
</html>