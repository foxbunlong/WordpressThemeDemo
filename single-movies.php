<?php get_header();

while (have_posts()) {
    the_post();
?>
    <div class="main-container">

        <?php
        $query_func = $_GET['query_func'];

        if ($query_func == "mydb") {
            $mydb = new wpdb('root', '', 'bitnami_wordpress', 'localhost');
            $limit = 10;
            $offset = 0;
            $table = $mydb->prefix . 'product';
            $sql = "SELECT * FROM {$table} LIMIT %d OFFSET %d";
            $data = $mydb->get_results($mydb->prepare($sql, $limit, $offset), ARRAY_A); // get_row, get_var
            echo json_encode($data);
        } else {
            global $wpdb;
            $limit = 10;
            $offset = 0;
            $table = $wpdb->prefix . 'posts';
            $sql = "SELECT * FROM {$table} WHERE `post_type` = 'post' LIMIT %d OFFSET %d";
            $data = $wpdb->get_results($wpdb->prepare($sql, $limit, $offset), ARRAY_A); // get_row, get_var
            echo json_encode($data);
        }
        ?>

        <h1>Hello from single-movies.php</h1>
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
    </div>
<?php
}
get_footer();
?>