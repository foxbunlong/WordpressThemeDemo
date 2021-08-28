<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <?php
                if (is_home()) {
                ?>
                    <a class="navbar-brand page-scroll" href="#home"><?php bloginfo('name'); ?></a>
                <?php
                } else {
                ?>
                    <a class="navbar-brand page-scroll" href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a>
                <?php
                }
                ?>

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                <?php
                if (is_home()) {
                ?>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                <?php
                } else {
                ?>
                    <li>
                        <a class="page-scroll" href="<?php echo site_url(); ?>#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo site_url(); ?>#services">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo site_url(); ?>#contact">Contact</a>
                    </li>
                <?php
                }
                ?>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>