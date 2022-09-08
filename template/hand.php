<?php
include "logic/Cookies.php";    
$title  = NULL;
$cookie = new Cookies();
if(isset($_POST["logout"])){    
    
    $cookie->logout();
    header("Location: index.php");
}
if(!$cookie->isAuthentication()){
    header("Location: index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    echo '<title> ' . $title . '</title>';
    ?>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/show-edit-data.css">
    <script src="assets/jquery-3.6.0.min.js"></script>
    <script src="assets/show-form.js"></script>
    <style>
        .message{
    padding: 10px;
    background-color: #bfededb3;
    margin: 10px;
    border-radius: 3px;
    color: teal;
    font-family: ui-monospace;
    font-weight: 900;
    text-align: right;
    padding-right: 19px;
}
    </style>
</head>
<body class="body-home">
    <div class="body">        
        <nav class="menu">
        <header class="dashborad">لوحة التحكم</header>
        <ul>
            <li class="menu-item"><a href="home.php">الرئيسية</a></li>
            <li class="menu-item"><a href="regions.php">المناطق السياحية و الأثرية</a></li>
            <li class="menu-item"><a href="states.php">الولايات</a></li>
            <!-- <li class="menu-item"><a href="hotels.php">الفنادق والمطاعم</a></li>             -->
        </ul>
    </nav>

    <div class="web-bar">
        <p id="profile-image">الرئيسية</p>
        <form action="<?php echo $_SERVER["PHP_SELF"];
        ?>" method="post">
            <input type="submit" value="خروج" id="btn-logout" name="logout" style="border:none;">
        </form>
    </div>
    <div class="content">
