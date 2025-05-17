<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package America_for_Winlock
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses america_for_winlock_header_style()
 */
function america_for_winlock_custom_header_setup() {
    add_theme_support(
        'custom-header',
        apply_filters(
            'america_for_winlock_custom_header_args',
            array(
                'default-image'      => '',
                'default-text-color' => 'ffffff',
                'width'              => 2000,
                'height'             => 500,
                'flex-height'        => true,
                'wp-head-callback'   => 'america_for_winlock_header_style',
            )
        )
    );
}
add_action('after_setup_theme', 'america_for_winlock_custom_header_setup');

if (!function_exists('america_for_winlock_header_style')) :
    /**
     * Styles the header image and text displayed on the blog.
     *
     * @see america_for_winlock_custom_header_setup().
     */
    function america_for_winlock_header_style() {
        $header_text_color = get_header_textcolor();
        $css = '';
        
        // Has the text been hidden?
        if (!display_header_text()) {
            $css .= '
            .site-title,
            .site-description {
                position: absolute;
                clip: rect(1px, 1px, 1px, 1px);
            }';
        } else {
            // If the user has set a custom color for the text, use that.
            $css .= '
            .site-title a,
            .site-description {
                color: #' . esc_attr($header_text_color) . ';
            }';
        }
        
        // Output the CSS if there's anything to output
        if ($css) {
            echo '<style type="text/css">' . $css . '</style>';
        }
    }
endif; 