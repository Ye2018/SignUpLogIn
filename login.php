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
            //read from database
            $query = "select * from users where user_name = '$user_name' limit 1";

            $result = mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['password'] === $password)
                    {
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: index.php");
                        die;
                    }
                }
            }
            echo "Wrong username or password!";
        }else
        {
            //echo "Please enter some valued information!";
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
    <title>LogIn</title>
</head>
<body>
    <div id="box" class="signup-form">
        <img src="images\user.png">
        <form action="" method = "post">
            <div style="font-size: 20px; margin: 10px; color: white;">Login</div>

            <input class="text" type="text" name="user_name" placeholder="User Name"><br><br>
            <input class="text" type="password" name="password" placeholder="Password"><br><br>

            <input class="btn" type="submit" value="login"><br><br>

            <a href="signup.php">Click to Sign Up</a><br><br>
        </form>
    </div>
</body>
</html>