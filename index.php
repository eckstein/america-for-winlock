<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display the one-page layout with all sections configured in the Customizer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package America_for_Winlock
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    // Hero Section
    if (get_theme_mod('show_hero_section', true)) {
        get_template_part('template-parts/sections/section', 'hero');
    }
    
    // About Candidate Section
    if (get_theme_mod('show_about_section', true)) {
        get_template_part('template-parts/sections/section', 'about');
    }
    
    // Platform/Issues Section
    if (get_theme_mod('show_platform_section', true)) {
        get_template_part('template-parts/sections/section', 'platform');
    }
    
    // Endorsements Section
    if (get_theme_mod('show_endorsements_section', true)) {
        get_template_part('template-parts/sections/section', 'endorsements');
    }
    
    // Get Involved Section
    if (get_theme_mod('show_involvement_section', true)) {
        get_template_part('template-parts/sections/section', 'involvement');
    }
    
    // Events Section
    if (get_theme_mod('show_events_section', true)) {
        get_template_part('template-parts/sections/section', 'events');
    }
    
    // Donate Section
    if (get_theme_mod('show_donate_section', true)) {
        get_template_part('template-parts/sections/section', 'donate');
    }
    
    // News/Updates Section
    if (get_theme_mod('show_news_section', true)) {
        get_template_part('template-parts/sections/section', 'news');
    }
    
    // Contact Section
    if (get_theme_mod('show_contact_section', true)) {
        get_template_part('template-parts/sections/section', 'contact');
    }
    
    // Custom Sections - Removed as this functionality was not fully implemented or user-friendly for this theme's purpose.
    // $custom_sections = get_theme_mod('custom_sections', array());
    // if (!empty($custom_sections)) {
    //     foreach ($custom_sections as $index => $section) {
    //         if (isset($section['enabled']) && $section['enabled']) {
    //             // Pass section data to the template part through a global variable
    //             $GLOBALS['section_data'] = $section;
    //             get_template_part('template-parts/sections/section', 'custom');
    //             // Clean up the global variable after use
    //             unset($GLOBALS['section_data']);
    //         }
    //     }
    // }
    ?>
</main><!-- #main -->

<?php
get_footer(); 