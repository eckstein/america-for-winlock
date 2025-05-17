    <footer id="colophon" class="site-footer">
        <div class="site-info">
            <div class="footer-branding">
                <?php if (get_theme_mod('footer_logo')) : ?>
                    <img src="<?php echo esc_url(get_theme_mod('footer_logo')); ?>" alt="<?php bloginfo('name'); ?> Logo" class="footer-logo">
                <?php else : ?>
                    <h3 class="footer-title"><?php bloginfo('name'); ?></h3>
                <?php endif; ?>
                
                <?php if (get_theme_mod('footer_tagline')) : ?>
                    <p class="footer-tagline"><?php echo esc_html(get_theme_mod('footer_tagline')); ?></p>
                <?php endif; ?>
            </div>
            
            <div class="footer-contact">
                <?php if (get_theme_mod('campaign_email')) : ?>
                    <p><i class="fas fa-envelope"></i> <a href="mailto:<?php echo esc_attr(get_theme_mod('campaign_email')); ?>"><?php echo esc_html(get_theme_mod('campaign_email')); ?></a></p>
                <?php endif; ?>
                
                <?php if (get_theme_mod('campaign_phone')) : ?>
                    <p><i class="fas fa-phone"></i> <a href="tel:<?php echo esc_attr(get_theme_mod('campaign_phone')); ?>"><?php echo esc_html(get_theme_mod('campaign_phone')); ?></a></p>
                <?php endif; ?>
                
                <?php if (get_theme_mod('campaign_address')) : ?>
                    <p><i class="fas fa-map-marker-alt"></i> <?php echo esc_html(get_theme_mod('campaign_address')); ?></p>
                <?php endif; ?>
            </div>
            
            <div class="footer-social">
                <?php if (get_theme_mod('social_facebook')) : ?>
                    <a href="<?php echo esc_url(get_theme_mod('social_facebook')); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <?php endif; ?>
                
                <?php if (get_theme_mod('social_twitter')) : ?>
                    <a href="<?php echo esc_url(get_theme_mod('social_twitter')); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                <?php endif; ?>
                
                <?php if (get_theme_mod('social_instagram')) : ?>
                    <a href="<?php echo esc_url(get_theme_mod('social_instagram')); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                <?php endif; ?>
                
                <?php if (get_theme_mod('social_youtube')) : ?>
                    <a href="<?php echo esc_url(get_theme_mod('social_youtube')); ?>" target="_blank"><i class="fab fa-youtube"></i></a>
                <?php endif; ?>
            </div>
            
            <nav class="footer-navigation">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer',
                        'menu_id'        => 'footer-menu',
                        'depth'          => 1,
                    )
                );
                ?>
            </nav>
            
            <div class="site-credits">
                <?php if (get_theme_mod('footer_copyright')) : ?>
                    <p class="copyright"><?php echo wp_kses_post(get_theme_mod('footer_copyright')); ?></p>
                <?php else : ?>
                    <p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.</p>
                <?php endif; ?>
                
                <?php if (get_theme_mod('footer_disclaimer')) : ?>
                    <p class="disclaimer"><?php echo wp_kses_post(get_theme_mod('footer_disclaimer')); ?></p>
                <?php endif; ?>
            </div>
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html> 