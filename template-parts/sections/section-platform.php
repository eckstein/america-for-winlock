<?php
/**
 * Template part for displaying the Platform/Issues section
 *
 * @package America_for_Winlock
 */

$title = get_theme_mod('platform_title', __('My Platform', 'america-for-winlock'));
$intro = get_theme_mod('platform_intro', '');

// Retrieve individual platform issues
$platform_issues_data = array();
for ($i = 1; $i <= 3; $i++) {
    $issue_title = get_theme_mod("platform_issue_$i_title");
    // Only add the issue if its title is set, to allow for less than 3 issues
    if ($issue_title) {
        $platform_issues_data[] = array(
            'title'       => $issue_title,
            'icon'        => get_theme_mod("platform_issue_$i_icon", 'fas fa-check-circle'),
            'description' => get_theme_mod("platform_issue_$i_description"),
        );
    }
}

?>

<section id="platform" class="platform-section campaign-section">
    <div class="site-content">
        <?php america_for_winlock_section_title($title, $intro); ?>
        
        <?php if (!empty($platform_issues_data)) : ?>
            <div class="platform-issues-wrapper">
                <?php foreach ($platform_issues_data as $issue) : ?>
                    <div class="platform-issue-item">
                        <?php if (!empty($issue['icon'])) : ?>
                            <div class="issue-icon">
                                <i class="<?php echo esc_attr($issue['icon']); ?>"></i>
                            </div>
                        <?php endif; ?>
                        <div class="issue-content">
                            <?php if (!empty($issue['title'])) : ?>
                                <h3 class="issue-title"><?php echo esc_html($issue['title']); ?></h3>
                            <?php endif; ?>
                            <?php if (!empty($issue['description'])) : ?>
                                <div class="issue-description">
                                    <?php echo wp_kses_post($issue['description']); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php elseif (is_customize_preview()) : ?>
            <div class="no-issues-message">
                <p><?php esc_html_e('Platform issues will be displayed here. Configure them in the Customizer under Page Sections > Platform/Issues Section.', 'america-for-winlock'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</section> 