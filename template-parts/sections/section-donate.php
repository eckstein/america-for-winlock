<?php
/**
 * Template part for displaying the donate section
 *
 * @package America_for_Winlock
 */

// Content from america_for_winlock_render_donate_section()
$title = get_theme_mod('donate_title', __('Support Our Campaign', 'america-for-winlock'));
$content = get_theme_mod('donate_content', '');
$button_text = get_theme_mod('donate_button_text', __('Donate Now', 'america-for-winlock'));
$donation_link = get_theme_mod('donation_link', ''); // This is the main campaign donation link

// If there's no specific content for this section AND no primary donation link, 
// then this section might not be needed unless it only shows a button.
// However, the `show_donate_section` customizer setting in index.php controls visibility.

?>
<section id="donate" class="donate-section campaign-section">
    <div class="site-content">
        <?php america_for_winlock_section_title($title); ?>
        
        <div class="donate-content-wrapper">
            <?php if ($content) : ?>
                <div class="donate-text">
                    <?php echo wp_kses_post($content); ?>
                </div>
            <?php endif; ?>
            
            <?php 
            // Display the main donation button if the link is set
            // This uses the `america_for_winlock_donation_button` helper for consistency,
            // which itself uses the 'donation_link' and 'donate_button_text' theme mods.
            // We pass the customizer's button text for this specific section if available, 
            // otherwise the helper will use its default.
            if (get_theme_mod('donation_link')) { // Check if the global donation link is set
                america_for_winlock_donation_button('section-donate-button', $button_text);
            } 
            ?>
        </div>
    </div>
</section> 