<?php get_header();
?>

<section id="services">

    <div class="main-container">
        <h1>Hello from archive-movies.php</h1>
        <!-- Page Content -->
        <?php
        $postPosition = 0;
        while (have_posts()) {
            the_post();

            if ($postPosition % 2 == 0) {
        ?>
                <div class="content-section-a">

                    <div class="container">

                        <div class="row">
                            <div class="col-lg-5 col-sm-6">
                                <hr class="section-heading-spacer">
                                <div class="clearfix"></div>
                                <h2 class="section-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <div class="lead"><?php the_content(); ?></div>
                            </div>
                            <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                                <img class="img-responsive" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail'); ?>">
                            </div>
                        </div>

                    </div>
                    <!-- /.container -->

                </div>
            <?php
            } else {
            ?>

                <div class="content-section-b">

                    <div class="container">

                        <div class="row">
                            <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                                <hr class="section-heading-spacer">
                                <div class="clearfix"></div>
                                <h2 class="section-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <div class="lead"><?php the_content(); ?></div>
                            </div>
                            <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                                <img class="img-responsive" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail'); ?>">
                            </div>
                        </div>

                    </div>
                    <!-- /.container -->
                </div>

            <?php
            }
            ?>
        <?php
            $postPosition++;
        }
        ?>
</section>

<!-- Contacts -->
<section id="contact">
    <div class="banner">
        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <h2>Keep in Touch:</h2>
                </div>
                <div class="col-lg-6">
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://www.facebook.com/thaybunlong" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
</section>
<!-- /.banner -->
</div>

<?php

get_footer();
?>