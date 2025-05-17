<?php
/**
 * Custom template tags for America for Winlock theme
 *
 * @package America_for_Winlock
 */

if (!function_exists('america_for_winlock_posted_on')) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function america_for_winlock_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr(get_the_date(DATE_W3C)),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date(DATE_W3C)),
            esc_html(get_the_modified_date())
        );

        $posted_on = sprintf(
            /* translators: %s: post date. */
            esc_html_x('Posted on %s', 'post date', 'america-for-winlock'),
            '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
        );

        echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
endif;

if (!function_exists('america_for_winlock_posted_by')) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function america_for_winlock_posted_by() {
        $byline = sprintf(
            /* translators: %s: post author. */
            esc_html_x('by %s', 'post author', 'america-for-winlock'),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );

        echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
endif;

if (!function_exists('america_for_winlock_section_title')) :
    /**
     * Outputs a formatted section title with optional description
     *
     * @param string $title The section title
     * @param string $description Optional description text
     * @param string $alignment Text alignment (left, center, right)
     */
    function america_for_winlock_section_title($title, $description = '', $alignment = 'center') {
        $class = 'section-header text-' . esc_attr($alignment);
        ?>
        <div class="<?php echo $class; ?>">
            <h2 class="section-title"><?php echo esc_html($title); ?></h2>
            <?php if (!empty($description)) : ?>
                <div class="section-description">
                    <?php echo wp_kses_post($description); ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }
endif;

if (!function_exists('america_for_winlock_social_links')) :
    /**
     * Displays social media links
     *
     * @param array $classes Additional CSS classes for the container
     */
    function america_for_winlock_social_links($classes = array()) {
        $facebook = get_theme_mod('social_facebook');
        $twitter = get_theme_mod('social_twitter');
        $instagram = get_theme_mod('social_instagram');
        $youtube = get_theme_mod('social_youtube');
        
        if (!$facebook && !$twitter && !$instagram && !$youtube) {
            return;
        }
        
        $class = 'social-links';
        if (!empty($classes)) {
            $class .= ' ' . implode(' ', array_map('sanitize_html_class', $classes));
        }
        ?>
        <div class="<?php echo esc_attr($class); ?>">
            <?php if ($facebook) : ?>
                <a href="<?php echo esc_url($facebook); ?>" target="_blank" class="social-link facebook">
                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                    <span class="screen-reader-text"><?php esc_html_e('Facebook', 'america-for-winlock'); ?></span>
                </a>
            <?php endif; ?>
            
            <?php if ($twitter) : ?>
                <a href="<?php echo esc_url($twitter); ?>" target="_blank" class="social-link twitter">
                    <i class="fab fa-twitter" aria-hidden="true"></i>
                    <span class="screen-reader-text"><?php esc_html_e('Twitter', 'america-for-winlock'); ?></span>
                </a>
            <?php endif; ?>
            
            <?php if ($instagram) : ?>
                <a href="<?php echo esc_url($instagram); ?>" target="_blank" class="social-link instagram">
                    <i class="fab fa-instagram" aria-hidden="true"></i>
                    <span class="screen-reader-text"><?php esc_html_e('Instagram', 'america-for-winlock'); ?></span>
                </a>
            <?php endif; ?>
            
            <?php if ($youtube) : ?>
                <a href="<?php echo esc_url($youtube); ?>" target="_blank" class="social-link youtube">
                    <i class="fab fa-youtube" aria-hidden="true"></i>
                    <span class="screen-reader-text"><?php esc_html_e('YouTube', 'america-for-winlock'); ?></span>
                </a>
            <?php endif; ?>
        </div>
        <?php
    }
endif;

if (!function_exists('america_for_winlock_donation_button')) :
    /**
     * Displays a donation button
     *
     * @param string $class Additional CSS class
     * @param string $text Button text override (optional)
     */
    function america_for_winlock_donation_button($class = '', $text = '') {
        $donation_link = get_theme_mod('donation_link');
        if (!$donation_link) {
            return;
        }
        
        $button_text = !empty($text) ? $text : get_theme_mod('donate_button_text', __('Donate Now', 'america-for-winlock'));
        $button_class = 'campaign-button';
        if (!empty($class)) {
            $button_class .= ' ' . sanitize_html_class($class);
        }
        ?>
        <a href="<?php echo esc_url($donation_link); ?>" class="<?php echo esc_attr($button_class); ?>" target="_blank">
            <?php echo esc_html($button_text); ?>
        </a>
        <?php
    }
endif;

if (!function_exists('america_for_winlock_contact_info')) :
    /**
     * Displays campaign contact information
     */
    function america_for_winlock_contact_info() {
        $email = get_theme_mod('campaign_email');
        $phone = get_theme_mod('campaign_phone');
        $address = get_theme_mod('campaign_address');
        
        if (!$email && !$phone && !$address) {
            return;
        }
        ?>
        <div class="contact-info">
            <?php if ($email) : ?>
                <div class="contact-item">
                    <i class="fas fa-envelope" aria-hidden="true"></i>
                    <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                </div>
            <?php endif; ?>
            
            <?php if ($phone) : ?>
                <div class="contact-item">
                    <i class="fas fa-phone" aria-hidden="true"></i>
                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9]/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a>
                </div>
            <?php endif; ?>
            
            <?php if ($address) : ?>
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                    <address><?php echo esc_html($address); ?></address>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }
endif; 