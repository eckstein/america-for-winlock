/**
 * File navigation.js.
 *
 * Handles navigation menu toggle on small screens.
 */
(function() {
    'use strict';

    const toggleButton = document.querySelector('.menu-toggle');
    
    if (!toggleButton) {
        return;
    }
    
    const menu = document.querySelector('.primary-menu-container');
    
    if (!menu) {
        toggleButton.style.display = 'none';
        return;
    }
    
    toggleButton.addEventListener('click', function() {
        menu.classList.toggle('toggled');
        if (menu.classList.contains('toggled')) {
            toggleButton.setAttribute('aria-expanded', 'true');
        } else {
            toggleButton.setAttribute('aria-expanded', 'false');
        }
    });

    // Close mobile menu when menu item is clicked
    document.addEventListener('click', function(event) {
        const isMenuItem = event.target.closest('#primary-menu li a');
        if (isMenuItem && menu.classList.contains('toggled')) {
            menu.classList.remove('toggled');
            toggleButton.setAttribute('aria-expanded', 'false');
        }
    });

    // Add smooth scrolling to all anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            // Only scroll if the href is not just "#"
            if (href !== '#') {
                e.preventDefault();
                
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });
})(); 