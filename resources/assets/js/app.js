/**
 * Main Application Script
 * Initializes page transitions and core functionality
 */

(function () {
  "use strict";

  /**
   * Apply font based on language
   */
  function applyFontForLanguage() {
    const savedLang = localStorage.getItem("lang") || "en";
    if (savedLang === "km") {
      document.documentElement.classList.add("font-khmer");
      document.body.classList.add("font-khmer");
    } else {
      document.documentElement.classList.remove("font-khmer");
      document.body.classList.remove("font-khmer");
    }
  }

  /**
   * Initialize page fade-in on load
   */
  function initPageTransition() {
    document.body.style.opacity = "0";
    requestAnimationFrame(function () {
      document.body.style.transition = "opacity 0.3s ease-in-out";
      document.body.style.opacity = "1";
    });
  }

  /**
   * Scroll to a specific element by ID
   */
  function scrollToElement(elementId, offset = 80) {
    const targetElement = document.getElementById(elementId);
    if (targetElement) {
      const elementPosition = targetElement.getBoundingClientRect().top;
      const offsetPosition = elementPosition + window.pageYOffset - offset;

      window.scrollTo({
        top: offsetPosition,
        behavior: "smooth",
      });
    }
  }

  /**
   * Global function for scrolling to about section
   * Prevents SPA navigation interference
   */
  window.scrollToAbout = function (e) {
    if (e) {
      e.preventDefault();
      e.stopPropagation();
      e.stopImmediatePropagation();
    }

    // Use requestAnimationFrame to ensure DOM is ready
    requestAnimationFrame(function () {
      const targetElement = document.getElementById("about");
      if (!targetElement) {
        console.warn("About section not found");
        return;
      }

      // Calculate scroll position
      const headerOffset = 80;
      const elementPosition = targetElement.getBoundingClientRect().top;
      const offsetPosition =
        elementPosition + window.pageYOffset - headerOffset;
      const finalPosition = Math.max(0, offsetPosition);

      // Scroll with smooth behavior
      window.scrollTo({
        top: finalPosition,
        behavior: "smooth",
      });
    });
  };

  /**
   * Initialize smooth scroll for anchor links
   */
  function initSmoothScroll() {
    // Handle all anchor links with smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
      anchor.addEventListener("click", function (e) {
        const href = this.getAttribute("href");
        if (href === "#" || href === "#!") return;

        const targetId = href.substring(1);
        const targetElement = document.getElementById(targetId);

        if (targetElement) {
          e.preventDefault();
          e.stopPropagation();
          scrollToElement(targetId, 80);
        }
      });
    });
  }

  /**
   * Initialize application
   */
  function init() {
    // Apply font on load
    applyFontForLanguage();

    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", function () {
        initPageTransition();
        initSmoothScroll();
      });
    } else {
      initPageTransition();
      initSmoothScroll();
    }
  }

  // Initialize
  init();
})();
