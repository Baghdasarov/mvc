<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= SITENAME ?></title>
    <link rel="stylesheet" href="<?= URLROOT ?>/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

</head>
<body>
<div>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/Tasks/index">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse display-block full-width" id="navbarSupportedContent">
                <?php
                    if (isset($_SESSION["valid"]) && $_SESSION["valid"]) {
                        echo '<div class="float-right text-success">
                                  <span>Hello '.$_SESSION["first_name"].' '.$_SESSION["last_name"].'</span>
                                  <a href="/Users/logout">
                                    <button type="button" class="btn btn-default navbar-btn">Logout</button>
                                  </a>
                              </div>';
                    }else {
                        echo '<a class="float-right" href="/Users/login">
                                <button type="button" class="btn btn-default navbar-btn">Sign in</button>
                              </a>';
                    }
                ?>
            </div>
        </nav>
    </div>
  

