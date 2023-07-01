<?php
$recent_posts = wp_get_recent_posts( array(
    'numberposts' => 5, // Change this number to display more or less posts
    'post_status' => 'publish',
));
foreach( $recent_posts as $post ) : ?>
    <div class="post custom-post">
        <h2 class="post-title"><a href="<?php echo get_permalink($post['ID']); ?>"><?php echo $post['post_title']; ?></a></h2>
        <div class="post-meta">
            <span class="post-author"><?php echo get_the_author_meta('display_name', $post['post_author']); ?></span> |
            <span class="post-date"><?php echo get_the_date('F j, Y', $post['ID']); ?></span> |
            <span class="post-read-time"><?php echo estimate_reading_time($post['post_content']); ?> mins read</span>
        </div>
        <div class="post-thumbnail"><?php echo get_the_post_thumbnail($post['ID'], 'thumbnail'); ?></div>
        <p class="post-excerpt"><?php echo wp_trim_words($post['post_content'], 15); ?></p>
    </div>
<?php endforeach; wp_reset_query(); ?>

<?php
function estimate_reading_time($content) {
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // Average reading speed is about 200 words per minute
    return $reading_time;
}
?>
