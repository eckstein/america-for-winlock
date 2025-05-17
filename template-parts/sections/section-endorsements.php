<?php
/**
 * Template part for displaying the endorsements section
 *
 * @package America_for_Winlock
 */

$title = get_theme_mod('endorsements_title', 'Endorsements');
$intro = get_theme_mod('endorsements_intro', '');
// In a real implementation, endorsements would likely be a custom post type or stored in the Customizer
// For demo purposes, we'll use hardcoded content
$endorsements = get_theme_mod('endorsements', array(
    array(
        'name' => 'John Smith',
        'title' => 'Former Mayor of Winlock',
        'quote' => 'America is the leader our town needs. Their vision for Winlock aligns perfectly with what our citizens want and need.',
        'image' => '',
    ),
    array(
        'name' => 'Jane Doe',
        'title' => 'Local Business Owner',
        'quote' => 'I\'ve known the candidate for years, and I can attest to their integrity and commitment to our community.',
        'image' => '',
    ),
));
?>

<section id="endorsements" class="endorsements-section campaign-section">
    <div class="site-content">
        <header class="section-header">
            <h2 class="section-title"><?php echo esc_html($title); ?></h2>
            <?php if (!empty($intro)) : ?>
                <div class="section-description"><?php echo wp_kses_post($intro); ?></div>
            <?php endif; ?>
        </header>
        
        <div class="endorsements-list">
            <?php if (!empty($endorsements)) : ?>
                <?php foreach ($endorsements as $endorsement) : ?>
                    <div class="endorsement">
                        <?php if (!empty($endorsement['image'])) : ?>
                            <div class="endorser-image">
                                <img src="<?php echo esc_url($endorsement['image']); ?>" alt="<?php echo esc_attr($endorsement['name']); ?>">
                            </div>
                        <?php else : ?>
                            <div class="endorser-image">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/images/placeholder.png'); ?>" alt="<?php echo esc_attr($endorsement['name']); ?>">
                            </div>
                        <?php endif; ?>
                        
                        <div class="endorser-content">
                            <h3 class="endorser-name"><?php echo esc_html($endorsement['name']); ?></h3>
                            <?php if (!empty($endorsement['title'])) : ?>
                                <p class="endorser-title"><?php echo esc_html($endorsement['title']); ?></p>
                            <?php endif; ?>
                            
                            <?php if (!empty($endorsement['quote'])) : ?>
                                <blockquote class="endorsement-quote">
                                    "<?php echo esc_html($endorsement['quote']); ?>"
                                </blockquote>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p><?php _e('Add endorsements in the Customizer under "Endorsements Section" settings.', 'america-for-winlock'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section> 