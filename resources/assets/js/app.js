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
   * Initialize application
   */
  function init() {
    // Apply font on load
    applyFontForLanguage();

    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", initPageTransition);
    } else {
      initPageTransition();
    }
  }

  // Initialize
  init();
})();
