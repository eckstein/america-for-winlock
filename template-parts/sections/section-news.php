<?php
/**
 * Template part for displaying the news section
 *
 * @package America_for_Winlock
 */

// Content from america_for_winlock_render_news_section()
$args = array(
    'post_type' => 'post',
    'posts_per_page' => get_theme_mod('news_posts_per_page', 3),
);

$query = new WP_Query($args);

if (!$query->have_posts()) {
    // Optionally, display a message if no posts are found, or hide section if configured.
    // For now, if no posts, the section won't render anything substantial.
    return;
}
?>
<section id="news" class="news-section campaign-section">
    <div class="site-content">
        <?php america_for_winlock_section_title(get_theme_mod('news_title', __('Latest News', 'america-for-winlock'))); ?>
        
        <div class="news-posts">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('news-post'); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); // Consider 'large' or custom image size ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    
                    <div class="post-content">
                        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="post-meta">
                            <?php america_for_winlock_posted_on(); ?>
                            <?php // america_for_winlock_posted_by(); // Optional: if you want to show author ?>
                        </div>
                        <div class="post-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="read-more campaign-button secondary"><?php _e('Read More', 'america-for-winlock'); ?></a>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
        
        <?php 
        $blog_page_id = get_option('page_for_posts');
        if ($blog_page_id) : 
        ?>
            <div class="all-news-link">
                <a href="<?php echo esc_url(get_permalink($blog_page_id)); ?>" class="campaign-button">
                    <?php echo esc_html(get_theme_mod('news_view_all_text', __('View All News', 'america-for-winlock'))); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php
wp_reset_postdata();
?> 