<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Explore a world of podcasts on Podcastio. Listen to engaging discussions, interviews, and more.">
    <meta name="author" content="pixelaxis">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="podcast, audio, interviews, discussions, entertainment,ashadul">
    <title>Home 3 | Podcastio</title>
    <link rel="shortcut icon" href="/assets/img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <!-- preloader  -->
    <div class="preloader">
        <div class="loader-inner">
            <div class="plate">
                <div class="base">
                    <div class="circle">
                        <div class="disc">
                            <div class="center"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="player-bar">
                <div class="rect"></div>
                <div class="circ"></div>
            </div>
        </div>
    </div>
    <?php
    if(isset($_COOKIE['session_token'])){
        $token = $_COOKIE['session_token'];
        $auth = $duogxaolin->get_row(" SELECT * FROM `listeners` WHERE `token` = '$token'");
        if(!$auth){
            setcookie("session_token", "", time() - 3600, "/");
        }
    }
    ?>