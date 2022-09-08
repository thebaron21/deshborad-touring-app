<?php    


    include "logic/Connect.php";
    include "logic/User.php";
    $connect = new GetConnection();
    $con = $connect->getConnect();
    $user = new User($con);
    $user->isLogin();

    if( isset($_POST["email"]) ){
        $email = $_POST["email"];
        $password = $_POST["password"];
        if($user->signIn($email,$password)){
            header("Location:home.php");
        }else{
            echo '<div class="message">Something wrong</div>';
        }


        
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/reset.css">
</head>
<body>

    <div class="login-content">
        <header class="header-login"> Login to Dashborad</header>
        <form action="index.php" method="post" class="form-login">            
            <label for="">welcome to your Dashborad</label> <br>
            <input class="field email-f" type="email" name="email" autocomplete="email" id="email" placeholder="Email" required>
            <input class="field password-f" type="password" name="password" id="password" placeholder="Password" required>
            <br>            
            <input class="field btn-f" type="submit" value="Login">
        </form>
    </div>
    
    
</body>
</html>