<?php
/**
 * Created by PhpStorm.
 * User: Alva
 * Date: 26/01/2017
 * Time: 12:17 PM
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->title; ?></title>
    <!--Mandamos a llamar a Bootstrap-->

    <link href="<?php echo BASE_URL.'/public'.DS;?>css/bootstrap.css" rel="stylesheet">
    <script src="<?php echo BASE_URL.'/public'.DS;?>js/jquery-3.1.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <?php if (isset($_layoutParams['css']) && count($_layoutParams['css'])):
        foreach ($_layoutParams['css'] as $item): ?>
            <link href="<?php echo $item; ?>" rel="stylesheet" type="text/css">
    <?php endforeach;
     endif; ?>

    <?php if (isset($_layoutParams['js']) && count($_layoutParams['js'])):
        foreach ($_layoutParams['js'] as $js): ?>
            <script src="<?php echo $js; ?>" type="text/javascript"></script>
        <?php endforeach;
    endif; ?>

    <!-- if lt IE9-->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<body>
<div id="name">
    <div id="header">
        <h1><?php echo APP_NAME; ?></h1>
    </div>
    <div id="menu-top">
        <ul>
            <?php if (isset($_layoutParams['menu'])): ?>
                <?php foreach ($_layoutParams['menu'] as $menu): ?>
                    <li>
                        <a href="<?php echo $menu['link']; ?>">
                            <?php echo $menu['title']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>