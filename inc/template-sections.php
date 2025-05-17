<?php
/**
 * Template section rendering functions
 *
 * @package America_for_Winlock
 */

/**
 * Renders the hero section
 */
function america_for_winlock_render_hero_section() {
    $heading = get_theme_mod('hero_heading', 'Vote for America');
    $subheading = get_theme_mod('hero_subheading', 'For a Better Winlock');
    $button_text = get_theme_mod('hero_button_text', 'Learn More');
    $button_url = get_theme_mod('hero_button_url', '#about');
    $background = get_theme_mod('hero_background', '');
    
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
                    <a href="<?php echo esc_url($button_url); ?>" class="campaign-button hero-button"><?php echo esc_html($button_text); ?></a>
                    <?php america_for_winlock_donation_button('hero-donate'); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

/**
 * Renders the about section
 */
function america_for_winlock_render_about_section() {
    $title = get_theme_mod('about_title', 'About the Candidate');
    $content = get_theme_mod('about_content', '');
    $image = get_theme_mod('about_image', '');
    $candidate_name = get_theme_mod('candidate_name', '');
    $campaign_office = get_theme_mod('campaign_office', 'Mayor');
    $campaign_location = get_theme_mod('campaign_location', 'Winlock');
    ?>
    <section id="about" class="about-section campaign-section">
        <div class="site-content">
            <?php america_for_winlock_section_title($title); ?>
            
            <div class="about-content">
                <?php if ($image) : ?>
                    <div class="candidate-image">
                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($candidate_name ?: __('Candidate', 'america-for-winlock')); ?>">
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
                        <?php echo wp_kses_post($content); ?>
                    </div>
                    
                    <?php america_for_winlock_social_links(array('about-social')); ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}

/**
 * Renders the platform section
 */
function america_for_winlock_render_platform_section() {
    $title = get_theme_mod('platform_title', 'My Platform');
    $intro = get_theme_mod('platform_intro', '');
    $issues = get_theme_mod('platform_issues', array(
        array(
            'icon' => 'fa-money-bill',
            'title' => 'Economy',
            'description' => 'Building a stronger local economy',
        ),
        array(
            'icon' => 'fa-leaf',
            'title' => 'Environment',
            'description' => 'Protecting our natural resources',
        ),
        array(
            'icon' => 'fa-building',
            'title' => 'Infrastructure',
            'description' => 'Improving roads and public facilities',
        ),
    ));
    ?>
    <section id="platform" class="platform-section campaign-section">
        <div class="site-content">
            <?php america_for_winlock_section_title($title, $intro); ?>
            
            <div class="platform-issues">
                <?php if (!empty($issues)) : ?>
                    <?php foreach ($issues as $issue) : ?>
                        <div class="platform-issue">
                            <?php if (!empty($issue['icon'])) : ?>
                                <div class="issue-icon">
                                    <i class="fas <?php echo esc_attr($issue['icon']); ?>"></i>
                                </div>
                            <?php endif; ?>
                            
                            <h3 class="issue-title"><?php echo esc_html($issue['title']); ?></h3>
                            <div class="issue-description"><?php echo esc_html($issue['description']); ?></div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

/**
 * Renders the endorsements section
 */
function america_for_winlock_render_endorsements_section() {
    $title = get_theme_mod('endorsements_title', 'Endorsements');
    // In a real implementation, endorsements would likely be a custom post type or stored in the Customizer
    // For demo purposes, we'll use static content
    ?>
    <section id="endorsements" class="endorsements-section campaign-section">
        <div class="site-content">
            <?php america_for_winlock_section_title($title); ?>
            
            <div class="endorsements-list">
                <!-- This would be populated from dynamic content -->
                <div class="endorsement">
                    <div class="endorser-image">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/images/placeholder.png'); ?>" alt="Endorser">
                    </div>
                    <div class="endorser-content">
                        <h3 class="endorser-name">John Smith</h3>
                        <p class="endorser-title">Former Mayor of Winlock</p>
                        <blockquote class="endorsement-quote">
                            "America is the leader our town needs. Their vision for Winlock aligns perfectly with what our citizens want and need."
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}

/**
 * Renders the get involved section
 */
function america_for_winlock_render_involvement_section() {
    $title = get_theme_mod('involvement_title', 'Get Involved');
    $content = get_theme_mod('involvement_content', '');
    $form_code = get_theme_mod('volunteer_form_code', '');
    ?>
    <section id="get-involved" class="involvement-section campaign-section">
        <div class="site-content">
            <?php america_for_winlock_section_title($title); ?>
            
            <div class="involvement-content">
                <div class="involvement-text">
                    <?php echo wp_kses_post($content); ?>
                </div>
                
                <?php if ($form_code) : ?>
                    <div class="involvement-form">
                        <?php echo do_shortcode(wp_kses_post($form_code)); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

/**
 * Renders the events section
 */
function america_for_winlock_render_events_section() {
    $title = get_theme_mod('events_title', 'Upcoming Events');
    // In a real implementation, events would likely be a custom post type or stored in the Customizer
    // For demo purposes, we'll use static content
    ?>
    <section id="events" class="events-section campaign-section">
        <div class="site-content">
            <?php america_for_winlock_section_title($title); ?>
            
            <div class="events-list">
                <!-- This would be populated from dynamic content -->
                <div class="event">
                    <div class="event-date">
                        <span class="event-month">Jun</span>
                        <span class="event-day">15</span>
                    </div>
                    <div class="event-details">
                        <h3 class="event-title">Town Hall Meeting</h3>
                        <p class="event-location">Winlock Community Center, 7PM</p>
                        <div class="event-description">
                            <p>Join us for a discussion about the future of Winlock and how we can work together to improve our community.</p>
                        </div>
                        <a href="#" class="campaign-button secondary">RSVP</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}

/**
 * Renders the donate section
 */
function america_for_winlock_render_donate_section() {
    $title = get_theme_mod('donate_title', 'Support Our Campaign');
    $content = get_theme_mod('donate_content', '');
    $button_text = get_theme_mod('donate_button_text', 'Donate Now');
    $donation_link = get_theme_mod('donation_link', '');
    ?>
    <section id="donate" class="donate-section campaign-section">
        <div class="site-content">
            <?php america_for_winlock_section_title($title); ?>
            
            <div class="donate-content">
                <?php if ($content) : ?>
                    <div class="donate-text">
                        <?php echo wp_kses_post($content); ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($donation_link) : ?>
                    <div class="donate-button-container">
                        <a href="<?php echo esc_url($donation_link); ?>" class="campaign-button donate-button" target="_blank">
                            <?php echo esc_html($button_text); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

/**
 * Renders the news section
 */
function america_for_winlock_render_news_section() {
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
    );
    
    $query = new WP_Query($args);
    
    if (!$query->have_posts()) {
        return;
    }
    ?>
    <section id="news" class="news-section campaign-section">
        <div class="site-content">
            <?php america_for_winlock_section_title(get_theme_mod('news_title', 'Latest News')); ?>
            
            <div class="news-posts">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <article class="news-post">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="post-content">
                            <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="post-meta">
                                <span class="post-date"><?php echo get_the_date(); ?></span>
                            </div>
                            <div class="post-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read More', 'america-for-winlock'); ?></a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <div class="all-news-link">
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="campaign-button secondary">
                    <?php _e('View All News', 'america-for-winlock'); ?>
                </a>
            </div>
        </div>
    </section>
    <?php
    wp_reset_postdata();
}

/**
 * Renders the contact section
 */
function america_for_winlock_render_contact_section() {
    $title = get_theme_mod('contact_title', 'Contact Us');
    $form_code = get_theme_mod('contact_form_code', '');
    ?>
    <section id="contact" class="contact-section campaign-section">
        <div class="site-content">
            <?php america_for_winlock_section_title($title); ?>
            
            <div class="contact-content">
                <div class="contact-info-container">
                    <?php america_for_winlock_contact_info(); ?>
                    <?php america_for_winlock_social_links(array('contact-social')); ?>
                </div>
                
                <?php if ($form_code) : ?>
                    <div class="contact-form">
                        <?php echo do_shortcode(wp_kses_post($form_code)); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

/**
 * Renders a custom section
 */
function america_for_winlock_render_custom_section() {
    global $section_data;
    
    if (empty($section_data) || empty($section_data['title'])) {
        return;
    }
    
    $id = !empty($section_data['id']) ? sanitize_title($section_data['id']) : 'custom-section-' . rand(1000, 9999);
    $title = $section_data['title'];
    $content = !empty($section_data['content']) ? $section_data['content'] : '';
    $background = !empty($section_data['background']) ? $section_data['background'] : '';
    
    $style = '';
    if ($background) {
        $style = 'background-image: url(' . esc_url($background) . ');';
    }
    ?>
    <section id="<?php echo esc_attr($id); ?>" class="custom-section campaign-section" <?php echo $style ? 'style="' . esc_attr($style) . '"' : ''; ?>>
        <div class="site-content">
            <?php america_for_winlock_section_title($title); ?>
            
            <div class="custom-content">
                <?php echo wp_kses_post($content); ?>
            </div>
        </div>
    </section>
    <?php
} 