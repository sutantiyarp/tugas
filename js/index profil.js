// Profile Page JavaScript Functions

// Handle Martinshantiran click
function handleMartinshantiran() {
    // Mengarahkan langsung ke halaman admin.html tanpa notifikasi
    window.location.href = 'admin.html'; 
}

// Handle remind later button
function remindLater() {
    console.log('Remind later clicked');
    const alertElement = document.querySelector('.notification-alert');
    alertElement.style.opacity = '0';
    alertElement.style.transform = 'translateY(-10px)';
    
    setTimeout(() => {
        alertElement.style.display = 'none';
    }, 300);
    
    // You can add logic to show the alert again later
    setTimeout(() => {
        showNotificationAlert();
    }, 10000); // Show again after 10 seconds for demo
}

// Handle agree terms button
function agreeTerms() {
    console.log('Terms agreed');
    const alertElement = document.querySelector('.notification-alert');
    alertElement.style.opacity = '0';
    alertElement.style.transform = 'translateY(-10px)';
    
    setTimeout(() => {
        alertElement.style.display = 'none';
    }, 300);
    
    // Save agreement status to localStorage
    localStorage.setItem('termsAgreed', 'true');
    alert('Terima kasih telah menyetujui syarat dan ketentuan!');
}

// Show notification alert
function showNotificationAlert() {
    const alertElement = document.querySelector('.notification-alert');
    if (alertElement) {
        alertElement.style.display = 'flex';
        alertElement.style.opacity = '0';
        alertElement.style.transform = 'translateY(-10px)';
        
        setTimeout(() => {
            alertElement.style.opacity = '1';
            alertElement.style.transform = 'translateY(0)';
        }, 100);
    }
}

// Handle view all activities
function viewAllActivities() {
    console.log('View all activities clicked');
    alert('Navigating to activity history...');
    // Add your navigation logic here
}

// Simulate progress bar animation
function animateProgressBar() {
    const progressFill = document.querySelector('.progress-fill');
    let width = 0;
    const targetWidth = 25; // 25% progress for demo
    
    const interval = setInterval(() => {
        if (width >= targetWidth) {
            clearInterval(interval);
        } else {
            width += 1;
            progressFill.style.width = width + '%';
        }
    }, 50);
}

// Handle wallet card interactions
function setupWalletCardInteractions() {
    const walletCards = document.querySelectorAll('.wallet-card');
    
    walletCards.forEach(card => {
        card.addEventListener('click', function() {
            const walletName = this.querySelector('.wallet-name').textContent;
            console.log(`${walletName} wallet clicked`);
            
            // Add visual feedback
            this.style.transform = 'scale(0.98)';
            setTimeout(() => {
                this.style.transform = 'translateY(-2px)';
            }, 150);
        });
    });
}

// Handle navigation icons
function setupNavigationIcons() {
    const navIcons = document.querySelectorAll('.nav-icons i');
    
    navIcons.forEach((icon, index) => {
        icon.addEventListener('click', function() {
            const iconTypes = ['envelope', 'bell', 'shopping-cart', 'cog'];
            const iconType = iconTypes[index];
            
            console.log(`${iconType} icon clicked`);
            
            // Add visual feedback
            this.style.transform = 'scale(0.9)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 150);
            
            // Handle different icon actions
            switch(iconType) {
                case 'envelope':
                    alert('Opening messages...');
                    break;
                case 'bell':
                    alert('Opening notifications...');
                    break;
                case 'shopping-cart':
                    alert('Opening cart...');
                    break;
                case 'cog':
                    alert('Opening settings...');
                    break;
            }
        });
    });
}

// Initialize page functionality
function initializePage() {
    console.log('Profile page initialized');
    
    // Check if terms were previously agreed
    const termsAgreed = localStorage.getItem('termsAgreed');
    if (termsAgreed === 'true') {
        const alertElement = document.querySelector('.notification-alert');
        if (alertElement) {
            alertElement.style.display = 'none';
        }
    }
    
    // Setup interactions
    setupWalletCardInteractions();
    setupNavigationIcons();
    
    // Animate progress bar after page load
    setTimeout(animateProgressBar, 1000);
}

// Run initialization when DOM is loaded
document.addEventListener('DOMContentLoaded', initializePage);

// Add smooth scrolling for better UX
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Add keyboard navigation support
document.addEventListener('keydown', function(e) {
    // ESC key to close notification alert
    if (e.key === 'Escape') {
        const alertElement = document.querySelector('.notification-alert');
        if (alertElement && alertElement.style.display !== 'none') {
            remindLater();
        }
    }
});