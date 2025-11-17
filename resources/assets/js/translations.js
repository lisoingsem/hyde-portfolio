/**
 * Translation System
 * Handles client-side language switching without page reloads
 */

(function () {
  "use strict";

  /**
   * Translation helper function
   */
  function translate(key, lang) {
    lang = lang || localStorage.getItem("lang") || "en";

    if (!window.translations || !window.translations[lang]) {
      lang = "en";
    }

    const translations = window.translations[lang] || window.translations["en"];

    // Try flat key first (e.g., "nav.home")
    if (
      translations &&
      typeof translations === "object" &&
      key in translations
    ) {
      return typeof translations[key] === "string" ? translations[key] : key;
    }

    // Fallback to nested keys
    const keys = key.split(".");
    let value = translations;
    for (const k of keys) {
      if (value && typeof value === "object" && k in value) {
        value = value[k];
      } else {
        return key;
      }
    }
    return typeof value === "string" ? value : key;
  }

  /**
   * Language switching function - updates DOM without reload
   */
  window.switchLanguage = function (lang) {
    localStorage.setItem("lang", lang);
    document.documentElement.setAttribute("lang", lang);

    // Apply Khmer font when switching to Khmer
    if (lang === "km") {
      document.documentElement.classList.add("font-khmer");
      document.body.classList.add("font-khmer");
    } else {
      document.documentElement.classList.remove("font-khmer");
      document.body.classList.remove("font-khmer");
    }

    // Update all elements with data-translate attribute (except name which uses profile)
    document.querySelectorAll("[data-translate]").forEach(function (el) {
      const key = el.getAttribute("data-translate");
      // Skip hero.name translation - it's handled by Alpine.js and profile config
      if (key === "hero.name") return;
      const translated = translate(key, lang);
      el.textContent = translated;
    });

    // Update input placeholders
    document
      .querySelectorAll("[data-translate-placeholder]")
      .forEach(function (el) {
        const key = el.getAttribute("data-translate-placeholder");
        el.placeholder = translate(key, lang);
      });

    // Update Alpine.js lang data if available
    if (window.Alpine) {
      setTimeout(function () {
        document.querySelectorAll('[x-data*="lang"]').forEach(function (el) {
          if (el.__x && el.__x.$data && "lang" in el.__x.$data) {
            el.__x.$data.lang = lang;
          }
        });
      }, 0);
    }

    // Update page title if needed
    const titleElement = document.querySelector("[data-translate-title]");
    if (titleElement) {
      const key = titleElement.getAttribute("data-translate-title");
      document.title = translate(key, lang) + " - Lisoing Sem";
    }
  };

  /**
   * Apply translations on page load
   */
  function applyTranslations() {
    const savedLang = localStorage.getItem("lang") || "en";
    document.documentElement.setAttribute("lang", savedLang);
    window.switchLanguage(savedLang);
  }

  /**
   * Initialize translation system
   */
  function init() {
    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", applyTranslations);
    } else {
      applyTranslations();
    }

    // Also apply on window load as a fallback
    window.addEventListener("load", function () {
      const savedLang = localStorage.getItem("lang") || "en";
      if (savedLang !== "en") {
        window.switchLanguage(savedLang);
      }
    });
  }

  // Initialize
  init();
})();
