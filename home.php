<?php
require_once 'php/session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        <?= ucfirst(basename($_SERVER['PHP_SELF'], '.php')); ?> | SPARK
    </title>
    <!-- Bootstrap 4 CSS CDN -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />
    <!-- Fontawesome CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <style>
        @import url("https://fonts.googleapis.com/css?family=Maven+Pro:400,500,600,700,800,900&display=swap");

        * {
            font-family: 'Maven Pro', sans-serif;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="index.php"><i class="fas fa-code fa-lg"></i>&nbsp; SPARK</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-home"></i>&nbsp;Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-user-circle"></i>&nbsp;Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-comment-dots"></i>&nbsp;Feedback</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-bell"></i>&nbsp;Notification</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        <i class="fas fa-user-cog"></i>&nbsp;Hi!<?= $cname ?>
                    </a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item"><i class="fas fa-cog"></i>&nbsp;Setting</a>
                        <a href="php/logout.php" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>