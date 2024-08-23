<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Mesho</title>
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="shortcut icon" href="favicon.ico" />
  <link
    rel="stylesheet"
    media="screen"
    href="./assets/vendor/jquery-1.8.3.min.js" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" media="screen" href="<?php echo get_template_directory_uri(); ?>/style.css" />
  <script
      src="https://kit.fontawesome.com/5edb8394fa.js"
      crossorigin="anonymous"
    ></script>
</head>

<body>
  <!--container start-->
  <div class="container">
    <!--header section start-->
    <header>
      <div class="wrapper">
        <div class="header-left">
          <h1><a href="#FIXME" title="Mesho" target="self">mesho</a></h1>
        </div>
          <?php wp_nav_menu(array("theme_location" => "primary-menu", "menu_class" => "header-right"))
          ?>
      </div>
    </header>
    <!--header section end-->