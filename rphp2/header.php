<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camera Company</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./style/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">
        <img src="./media/images.png" alt="Camera Company Logo" width="50" height="50" class="d-inline-block align-top"> <!-- Logo Image -->
        Camera Company
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <?php
            session_start();
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
            } else {
                echo '<li class="nav-item"><a class="nav-link" href="index.php#login">Home</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="login.php#login">Login</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="registration.php#register">Register</a></li>';
            }
            ?>
        </ul>
    </div>
</nav>
