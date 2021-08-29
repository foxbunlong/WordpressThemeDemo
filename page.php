<?php get_header();

while (have_posts()) {
    the_post();
?>
    <div class="main-container">
        <h2>Page --- <?php the_title(); ?></h2>
        <?php the_content(); ?>
    </div>
<?php
}
get_footer();
?>