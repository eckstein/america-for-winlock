<?php
/**
 * Template part for displaying the events section
 *
 * @package America_for_Winlock
 */

$title = get_theme_mod('events_title', __('Upcoming Events', 'america-for-winlock'));
$number_of_events = get_theme_mod('events_number_to_show', 3); // New Customizer setting

$today = date('Y-m-d');

$event_args = array(
    'post_type'      => 'event',
    'posts_per_page' => $number_of_events,
    'meta_key'       => '_event_date',
    'orderby'        => 'meta_value',
    'meta_type'      => 'DATE',
    'order'          => 'ASC',
    'meta_query'     => array(
        array(
            'key'     => '_event_date',
            'value'   => $today,
            'compare' => ' >=',
            'type'    => 'DATE'
        )
    )
);
$events_query = new WP_Query($event_args);

?>
<section id="events" class="events-section campaign-section">
    <div class="site-content">
        <?php america_for_winlock_section_title($title); ?>
        
        <?php if ($events_query->have_posts()) : ?>
            <div class="events-list">
                <?php while ($events_query->have_posts()) : $events_query->the_post(); ?>
                    <?php
                    $event_date_raw = get_post_meta(get_the_ID(), '_event_date', true);
                    $event_time = get_post_meta(get_the_ID(), '_event_time', true);
                    $event_location = get_post_meta(get_the_ID(), '_event_location', true);
                    $rsvp_link = get_post_meta(get_the_ID(), '_event_rsvp_link', true);
                    $rsvp_text = get_post_meta(get_the_ID(), '_event_rsvp_text', true) ?: __('Learn More', 'america-for-winlock');
                    
                    $event_month = '';
                    $event_day = '';
                    if ($event_date_raw) {
                        $event_timestamp = strtotime($event_date_raw);
                        $event_month = date_i18n('M', $event_timestamp);
                        $event_day = date_i18n('d', $event_timestamp);
                    }
                    ?>
                    <article id="event-<?php the_ID(); ?>" <?php post_class('event'); ?>>
                        <?php if ($event_month && $event_day) : ?>
                        <div class="event-date">
                            <span class="event-month"><?php echo esc_html($event_month); ?></span>
                            <span class="event-day"><?php echo esc_html($event_day); ?></span>
                        </div>
                        <?php endif; ?>
                        <div class="event-details">
                            <h3 class="event-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="event-meta">
                                <?php if ($event_time) : ?>
                                    <span class="event-time"><i class="far fa-clock"></i> <?php echo esc_html($event_time); ?></span>
                                <?php endif; ?>
                                <?php if ($event_location) : ?>
                                    <span class="event-location"><i class="fas fa-map-marker-alt"></i> <?php echo esc_html($event_location); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="event-description">
                                <?php the_excerpt(); ?>
                            </div>
                            <?php if ($rsvp_link) : ?>
                                <a href="<?php echo esc_url($rsvp_link); ?>" class="campaign-button secondary event-rsvp-link" target="_blank" rel="noopener noreferrer">
                                    <?php echo esc_html($rsvp_text); ?>
                                </a>
                            <?php else : ?>
                                <a href="<?php the_permalink(); ?>" class="campaign-button secondary event-details-link">
                                    <?php _e('View Details', 'america-for-winlock'); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <div class="no-events-message">
                <p><?php esc_html_e(get_theme_mod('events_no_events_text', 'Check back soon for upcoming events!'), 'america-for-winlock'); ?></p>
            </div>
        <?php endif; ?>
        
        <?php
        $all_events_page_id = get_theme_mod('events_archive_page_id');
        $all_events_link = $all_events_page_id ? get_permalink($all_events_page_id) : get_post_type_archive_link('event');
        $view_all_text = get_theme_mod('events_view_all_text', __('View All Events', 'america-for-winlock'));
        
        if ($all_events_link && $view_all_text) :
        ?>
        <div class="all-events-link">
            <a href="<?php echo esc_url($all_events_link); ?>" class="campaign-button">
                <?php echo esc_html($view_all_text); ?>
            </a>
        </div>
        <?php endif; ?>
    </div>
</section> 