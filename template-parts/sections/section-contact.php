<?php
/**
 * Template part for displaying the Contact section
 *
 * @package America_for_Winlock
 */

$title = get_theme_mod('contact_title', __('Contact Us', 'america-for-winlock'));
$form_code = get_theme_mod('contact_form_code', '');
?>
<section id="contact" class="contact-section campaign-section">
    <div class="site-content">
        <?php america_for_winlock_section_title($title); ?>
        
        <div class="contact-content-wrapper"> 
            <div class="contact-details-column"> 
                <?php 
                // Display contact information (email, phone, address)
                america_for_winlock_contact_info(); 
                
                // Display social media links
                america_for_winlock_social_links(array('contact-social')); 
                ?>
            </div>
            
            <?php // Column for the form - shown if form code exists OR in customizer for placeholder ?>
            <?php if ($form_code || is_customize_preview()) : ?>
            <div class="contact-form-column"> 
                <?php if ($form_code) : ?>
                    <div class="embedded-form-container">
                        <?php 
                        // Sanitize form code allowing shortcodes and basic HTML, then process shortcodes.
                        $kses_form_code = wp_kses_post($form_code);
                        echo do_shortcode($kses_form_code); 
                        ?>
                    </div>
                <?php elseif (is_customize_preview()) : ?>
                    <div class="embedded-form-container placeholder-form">
                        <p><?php esc_html_e('Contact form embed code will appear here.', 'america-for-winlock'); ?></p>
                    </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section> 