<?php get_header();

while (have_posts()) {
    the_post();
?>
    <div class="main-container">
        <h1>Hello from single-movies.php</h1>
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
    </div>
<?php
}
get_footer();
?>