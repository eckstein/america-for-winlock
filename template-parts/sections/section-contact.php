<?php
/**
 * Template part for displaying the contact section
 *
 * @package America_for_Winlock
 */

$title = get_theme_mod('contact_title', 'Contact Us');
$content = get_theme_mod('contact_content', '');
$form_code = get_theme_mod('contact_form_code', '');
$email = get_theme_mod('campaign_email', '');
$phone = get_theme_mod('campaign_phone', '');
$address = get_theme_mod('campaign_address', '');
?>

<section id="contact" class="contact-section campaign-section">
    <div class="site-content">
        <header class="section-header">
            <h2 class="section-title"><?php echo esc_html($title); ?></h2>
            <?php if (!empty($content)) : ?>
                <div class="section-description"><?php echo wp_kses_post($content); ?></div>
            <?php endif; ?>
        </header>
        
        <div class="contact-content">
            <div class="contact-info">
                <?php if ($email) : ?>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                    </div>
                <?php endif; ?>
                
                <?php if ($phone) : ?>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a>
                    </div>
                <?php endif; ?>
                
                <?php if ($address) : ?>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span><?php echo esc_html($address); ?></span>
                    </div>
                <?php endif; ?>
                
                <div class="social-links contact-social">
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
            
            <?php if ($form_code) : ?>
                <div class="contact-form">
                    <?php echo do_shortcode(wp_kses_post($form_code)); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section> 