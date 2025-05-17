<?php
/**
 * Template part for displaying the platform section
 *
 * @package America_for_Winlock
 */

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
        <header class="section-header">
            <h2 class="section-title"><?php echo esc_html($title); ?></h2>
            <?php if (!empty($intro)) : ?>
                <div class="section-description"><?php echo wp_kses_post($intro); ?></div>
            <?php endif; ?>
        </header>
        
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
            <?php else : ?>
                <p><?php _e('Add platform issues in the Customizer under "Platform Section" settings.', 'america-for-winlock'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section> 