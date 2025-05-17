<?php
/**
 * Template part for displaying the Get Involved section
 *
 * @package America_for_Winlock
 */

// Content from america_for_winlock_render_involvement_section()
$title = get_theme_mod('involvement_title', __('Get Involved', 'america-for-winlock'));
$content = get_theme_mod('involvement_content', '');
$form_code = get_theme_mod('volunteer_form_code', '');
?>
<section id="get-involved" class="involvement-section campaign-section">
    <div class="site-content">
        <?php america_for_winlock_section_title($title); ?>
        
        <div class="involvement-content-wrapper">
            <?php if ($content) : ?>
                <div class="involvement-text">
                    <?php echo wp_kses_post($content); ?>
                </div>
            <?php endif; ?>
            
            <?php if ($form_code) : ?>
                <div class="involvement-form embedded-form-container">
                    <?php 
                    // Ensure shortcodes are processed. 
                    // wp_kses_post is good for security if the input is HTML, but might strip valid shortcode attributes.
                    // If only shortcodes are expected, do_shortcode directly is fine. Given it's 'embed code', it might be mixed.
                    // A balanced approach:
                    $kses_form_code = wp_kses_post($form_code);
                    echo do_shortcode($kses_form_code);
                    ?>
                </div>
            <?php elseif (is_customize_preview()) : 
                // Show a placeholder in Customizer if the form code is empty
            ?>
                <div class="involvement-form embedded-form-container placeholder-form">
                    <p><?php esc_html_e('Volunteer form embed code will appear here.', 'america-for-winlock'); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section> 