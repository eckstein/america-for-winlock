<?php
/**
 * Template part for displaying the Endorsements section
 *
 * @package America_for_Winlock
 */

$title = get_theme_mod('endorsements_title', __('Endorsements', 'america-for-winlock'));
$number_of_endorsements = get_theme_mod('endorsements_number_to_show', 5); // New Customizer setting

$endorsement_args = array(
    'post_type'      => 'endorsement',
    'posts_per_page' => $number_of_endorsements,
    'orderby'        => 'date', // Or 'rand', 'title', etc.
    'order'          => 'DESC',
);
$endorsements_query = new WP_Query($endorsement_args);

?>
<section id="endorsements" class="endorsements-section campaign-section">
    <div class="site-content">
        <?php america_for_winlock_section_title($title); ?>
        
        <?php if ($endorsements_query->have_posts()) : ?>
            <div class="endorsements-list owl-carousel">
                <?php while ($endorsements_query->have_posts()) : $endorsements_query->the_post(); ?>
                    <?php
                    $endorser_title_org = get_post_meta(get_the_ID(), '_endorser_title', true);
                    ?>
                    <article id="endorsement-<?php the_ID(); ?>" <?php post_class('endorsement-item'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="endorser-image">
                                <?php the_post_thumbnail('thumbnail'); // Or a custom size like 'medium' or a square crop ?>
                            </div>
                        <?php endif; ?>
                        <div class="endorser-content">
                            <h3 class="endorser-name"><?php the_title(); ?></h3>
                            <?php if ($endorser_title_org) : ?>
                                <p class="endorser-title-org"><?php echo esc_html($endorser_title_org); ?></p>
                            <?php endif; ?>
                            <blockquote class="endorsement-quote">
                                <?php echo wp_kses_post(get_the_content()); // Using get_the_content() for the blockquote ?>
                            </blockquote>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php elseif (is_customize_preview()) : ?>
             <div class="no-endorsements-message">
                <p><?php esc_html_e('No endorsements found. Add some from the Endorsements menu.', 'america-for-winlock'); ?></p>
            </div>
        <?php endif; ?>
        
        <?php 
        // Optional: Link to a page with all endorsements, if such a page exists or is desired.
        // $all_endorsements_link = get_theme_mod('all_endorsements_link', ''); 
        // if ($all_endorsements_link) : 
        ?>
        <!-- <div class="all-endorsements-link">
            <a href="<?php // echo esc_url($all_endorsements_link); ?>" class="campaign-button">
                <?php // esc_html_e('See All Endorsements', 'america-for-winlock'); ?>
            </a>
        </div> -->
        <?php // endif; ?>
    </div>
</section> 