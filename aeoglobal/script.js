// ========================================
// ABEL GEO Landing Page - Interactive Scripts
// ========================================

document.addEventListener('DOMContentLoaded', function() {
  
  // ========================================
  // Scroll Animation Observer
  // ========================================
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, observerOptions);

  // Observe all elements with animate-on-scroll class
  const animatedElements = document.querySelectorAll('.animate-on-scroll');
  animatedElements.forEach(element => {
    observer.observe(element);
  });

  // ========================================
  // Smooth Scroll for Anchor Links
  // ========================================
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      const href = this.getAttribute('href');
      
      // Skip if it's just "#" or external link
      if (href === '#' || href.startsWith('http')) return;
      
      e.preventDefault();
      const target = document.querySelector(href);
      
      if (target) {
        target.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    });
  });

  // ========================================
  // CTA Button Click Tracking (Optional)
  // ========================================
  const ctaButtons = document.querySelectorAll('.btn-primary');
  ctaButtons.forEach(button => {
    button.addEventListener('click', function() {
      // Track button click (can integrate with analytics)
      const buttonText = this.textContent.trim();
      console.log('CTA Button Clicked:', buttonText);
      
      // Optional: Add analytics tracking here
      // Example: gtag('event', 'cta_click', { button_text: buttonText });
    });
  });

  // ========================================
  // Add Parallax Effect to Hero Image
  // ========================================
  const heroImage = document.querySelector('.hero-image');
  
  if (heroImage) {
    window.addEventListener('scroll', function() {
      const scrolled = window.pageYOffset;
      const rate = scrolled * 0.3;
      
      if (scrolled < window.innerHeight) {
        heroImage.style.transform = `translateY(${rate}px)`;
      }
    });
  }

  // ========================================
  // Add Glow Effect on Hover for Cards
  // ========================================
  const cards = document.querySelectorAll('.card');
  cards.forEach(card => {
    card.addEventListener('mouseenter', function() {
      this.style.boxShadow = '0 20px 60px rgba(168, 85, 247, 0.3)';
    });
    
    card.addEventListener('mouseleave', function() {
      this.style.boxShadow = '';
    });
  });

  // ========================================
  // Performance: Lazy Load Images
  // ========================================
  if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;
          if (img.dataset.src) {
            img.src = img.dataset.src;
            img.removeAttribute('data-src');
            observer.unobserve(img);
          }
        }
      });
    });

    const lazyImages = document.querySelectorAll('img[data-src]');
    lazyImages.forEach(img => imageObserver.observe(img));
  }

  // ========================================
  // Add Loading State to External Links
  // ========================================
  const externalLinks = document.querySelectorAll('a[target="_blank"]');
  externalLinks.forEach(link => {
    link.addEventListener('click', function() {
      // Add visual feedback
      this.style.opacity = '0.7';
      setTimeout(() => {
        this.style.opacity = '1';
      }, 300);
    });
  });

  // ========================================
  // Console Welcome Message
  // ========================================
  console.log('%c🚀 Abel GEO Landing Page', 'color: #A855F7; font-size: 20px; font-weight: bold;');
  console.log('%cBuilt with ❤️ for global dental marketing', 'color: #C084FC; font-size: 14px;');

});
