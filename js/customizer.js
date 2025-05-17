/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function($) {
    'use strict';

    // Site title and description.
    wp.customize('blogname', function(value) {
        value.bind(function(to) {
            $('.site-title a').text(to);
        });
    });
    
    wp.customize('blogdescription', function(value) {
        value.bind(function(to) {
            $('.site-description').text(to);
        });
    });

    // Header text color.
    wp.customize('header_textcolor', function(value) {
        value.bind(function(to) {
            if ('blank' === to) {
                $('.site-title, .site-description').css({
                    'clip': 'rect(1px, 1px, 1px, 1px)',
                    'position': 'absolute'
                });
            } else {
                $('.site-title, .site-description').css({
                    'clip': 'auto',
                    'position': 'relative'
                });
                $('.site-title a, .site-description').css({
                    'color': to
                });
            }
        });
    });

    // Theme colors
    wp.customize('primary_color', function(value) {
        value.bind(function(to) {
            document.documentElement.style.setProperty('--primary-color', to);
        });
    });

    wp.customize('secondary_color', function(value) {
        value.bind(function(to) {
            document.documentElement.style.setProperty('--secondary-color', to);
        });
    });

    // Hero section
    wp.customize('hero_heading', function(value) {
        value.bind(function(to) {
            $('.hero-title').text(to);
        });
    });

    wp.customize('hero_subheading', function(value) {
        value.bind(function(to) {
            $('.hero-subtitle').text(to);
        });
    });

    wp.customize('hero_button_text', function(value) {
        value.bind(function(to) {
            $('.hero-button').text(to);
        });
    });

    // About section
    wp.customize('about_title', function(value) {
        value.bind(function(to) {
            $('#about .section-title').text(to);
        });
    });

    // Platform section
    wp.customize('platform_title', function(value) {
        value.bind(function(to) {
            $('#platform .section-title').text(to);
        });
    });
})(jQuery); 