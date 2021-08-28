<?php get_header();

while (have_posts()) {
    the_post();
?>

    <h2>Page -- <?php the_title(); ?></h2>
    <?php the_content(); ?>
<?php
}
get_footer();
?>