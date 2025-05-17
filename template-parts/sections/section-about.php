<?php
/**
 * Template part for displaying the about section
 *
 * @package America_for_Winlock
 */

$title = get_theme_mod('about_title', 'About the Candidate');
$content = get_theme_mod('about_content', '');
$image = get_theme_mod('about_image', '');
$candidate_name = get_theme_mod('candidate_name', '');
$campaign_office = get_theme_mod('campaign_office', 'Mayor');
$campaign_location = get_theme_mod('campaign_location', 'Winlock');
?>

<section id="about" class="about-section campaign-section">
    <div class="site-content">
        <header class="section-header">
            <h2 class="section-title"><?php echo esc_html($title); ?></h2>
        </header>
        
        <div class="about-content">
            <?php if ($image) : ?>
                <div class="candidate-image">
                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($candidate_name ?: __('Candidate', 'america-for-winlock')); ?>">
                </div>
            <?php else : ?>
                <div class="candidate-image">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/placeholder.png'); ?>" alt="<?php echo esc_attr($candidate_name ?: __('Candidate', 'america-for-winlock')); ?>">
                </div>
            <?php endif; ?>
            
            <div class="candidate-info">
                <?php if ($candidate_name) : ?>
                    <h3 class="candidate-name"><?php echo esc_html($candidate_name); ?></h3>
                <?php endif; ?>
                
                <?php if ($campaign_office && $campaign_location) : ?>
                    <h4 class="candidate-position"><?php 
                        echo esc_html(sprintf(
                            /* translators: 1: Political office (e.g., Mayor) 2: Location (e.g., City Name) */
                            _x('Candidate for %1$s of %2$s', 'candidate position', 'america-for-winlock'),
                            $campaign_office, 
                            $campaign_location
                        )); 
                    ?></h4>
                <?php endif; ?>
                
                <div class="candidate-bio">
                    <?php if (!empty($content)) : ?>
                        <?php echo wp_kses_post($content); ?>
                    <?php else : ?>
                        <p><?php _e('Add candidate biography in the Customizer under "About Section" settings.', 'america-for-winlock'); ?></p>
                    <?php endif; ?>
                </div>
                
                <div class="social-links about-social">
                    <?php if (get_theme_mod('social_facebook')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('social_facebook')); ?>" class="social-link" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <?php endif; ?>
                    
                    <?php if (get_theme_mod('social_twitter')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('social_twitter')); ?>" class="social-link" target="_blank"><i class="fab fa-twitter"></i></a>
                    <?php endif; ?>
                    
                    <?php if (get_theme_mod('social_instagram')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('social_instagram')); ?>" class="social-link" target="_blank"><i class="fab fa-instagram"></i></a>
                    <?php endif; ?>
                    
                    <?php if (get_theme_mod('social_youtube')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('social_youtube')); ?>" class="social-link" target="_blank"><i class="fab fa-youtube"></i></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section> 