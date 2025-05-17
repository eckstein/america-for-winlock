<?php
/**
 * Template part for displaying the hero section
 *
 * @package America_for_Winlock
 */

$heading = get_theme_mod('hero_heading', 'Vote for America');
$subheading = get_theme_mod('hero_subheading', 'For a Better Winlock');
$button_text = get_theme_mod('hero_button_text', 'Learn More');
$button_url = get_theme_mod('hero_button_url', '#about');
$background = get_theme_mod('hero_background', '');
$donation_link = get_theme_mod('donation_link', '');
$donation_text = get_theme_mod('donation_button_text', 'Donate');

$style = '';
if ($background) {
    $style = 'background-image: url(' . esc_url($background) . ');';
}
?>

<section id="hero" class="hero-section campaign-section" <?php echo $style ? 'style="' . esc_attr($style) . '"' : ''; ?>>
    <div class="hero-content site-content">
        <h1 class="hero-title"><?php echo esc_html($heading); ?></h1>
        <h2 class="hero-subtitle"><?php echo esc_html($subheading); ?></h2>
        
        <?php if ($button_text && $button_url) : ?>
            <div class="hero-buttons">
                <a href="<?php echo esc_url($button_url); ?>" class="campaign-button"><?php echo esc_html($button_text); ?></a>
                
                <?php if ($donation_link) : ?>
                    <a href="<?php echo esc_url($donation_link); ?>" class="campaign-button secondary"><?php echo esc_html($donation_text); ?></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section> 