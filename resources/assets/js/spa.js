/**
 * SPA-like Navigation System
 * Handles page navigation without full page reloads
 */

(function () {
  "use strict";

  const mainContent = document.getElementById("main-content");
  let isLoading = false;

  // Progress bar elements
  const progressBar = document.getElementById("progress-bar");
  const progressBarFill = document.getElementById("progress-bar-fill");

  /**
   * Get current page name from URL
   */
  function getCurrentPage() {
    const path = window.location.pathname;
    if (path === "/" || path === "/index.html" || path === "") return "index";
    return path.replace(/^\//, "").replace(/\.html$/, "") || "index";
  }

  /**
   * Update active navigation link styling
   */
  function updateActiveNav() {
    const currentPage = getCurrentPage();
    document.querySelectorAll(".nav-link").forEach((link) => {
      const linkPage =
        link.getAttribute("data-page") ||
        (link.getAttribute("href") === "/"
          ? "index"
          : link
              .getAttribute("href")
              .replace(/^\//, "")
              .replace(/\.html$/, ""));

      const activeClasses = [
        "bg-indigo-100",
        "dark:bg-indigo-900/30",
        "text-indigo-600",
        "dark:text-indigo-400",
      ];
      const inactiveClasses = ["text-gray-700", "dark:text-gray-300"];

      if (linkPage === currentPage) {
        link.classList.add(...activeClasses);
        link.classList.remove(...inactiveClasses);
      } else {
        link.classList.remove(...activeClasses);
        link.classList.add(...inactiveClasses);
      }
    });
  }

  /**
   * Show progress bar
   */
  function showProgress() {
    if (!progressBar || !progressBarFill) return;
    progressBar.style.display = "block";
    progressBarFill.style.width = "30%";
    setTimeout(() => {
      progressBarFill.style.width = "70%";
    }, 200);
  }

  /**
   * Complete progress bar animation
   */
  function completeProgress() {
    if (!progressBar || !progressBarFill) return;
    progressBarFill.style.width = "100%";
    setTimeout(() => {
      progressBar.style.display = "none";
      progressBarFill.style.width = "0%";
    }, 300);
  }

  /**
   * Hide progress bar (on error)
   */
  function hideProgress() {
    if (!progressBar || !progressBarFill) return;
    progressBar.style.display = "none";
    progressBarFill.style.width = "0%";
  }

  /**
   * Load page content via AJAX
   */
  async function loadPage(url) {
    if (isLoading || !mainContent) return;
    isLoading = true;

    try {
      // Show progress bar
      showProgress();

      // Fetch the page
      const response = await fetch(url);
      if (!response.ok) throw new Error("Failed to load page");

      // Update progress
      if (progressBarFill) {
        progressBarFill.style.width = "90%";
      }

      const html = await response.text();
      const parser = new DOMParser();
      const doc = parser.parseFromString(html, "text/html");

      // Extract content from main-content
      const newContent = doc.getElementById("main-content");
      if (!newContent) throw new Error("Content not found");

      // Fade out current content
      mainContent.style.opacity = "0";
      mainContent.style.transition = "opacity 0.2s ease-in-out";

      setTimeout(() => {
        // Update content
        mainContent.innerHTML = newContent.innerHTML;

        // Update page title
        const newTitle = doc.querySelector("title");
        if (newTitle) document.title = newTitle.textContent;

        // Update URL without reload
        window.history.pushState({}, "", url);

        // Update active nav
        updateActiveNav();

        // Re-apply translations
        if (window.switchLanguage) {
          const savedLang = localStorage.getItem("lang") || "en";
          if (savedLang !== "en") {
            window.switchLanguage(savedLang);
          }
        }

        // Re-initialize Alpine.js for new content
        if (window.Alpine) {
          window.Alpine.initTree(mainContent);
        }

        // Fade in new content
        mainContent.style.opacity = "1";
        document.body.style.opacity = "1";

        // Scroll to top
        window.scrollTo({
          top: 0,
          behavior: "smooth",
        });

        // Complete progress bar
        completeProgress();

        isLoading = false;
      }, 150);
    } catch (error) {
      console.error("Navigation error:", error);
      hideProgress();
      // Fallback to normal navigation
      window.location.href = url;
      isLoading = false;
    }
  }

  /**
   * Check if link should be handled by SPA
   */
  function shouldHandleLink(link) {
    const href = link.getAttribute("href");
    if (!href) return false;

    // Skip external links
    if (link.hostname && link.hostname !== window.location.hostname)
      return false;

    // Skip special links
    if (
      href.startsWith("#") ||
      href.startsWith("mailto:") ||
      href.startsWith("tel:") ||
      link.getAttribute("target") === "_blank"
    ) {
      return false;
    }

    // Skip if it's the current page
    const currentUrl = window.location.pathname + window.location.search;
    const linkUrl = new URL(href, window.location.origin).pathname;
    if (
      linkUrl === currentUrl ||
      (linkUrl === "/" && currentUrl === "/index.html")
    ) {
      return false;
    }

    return true;
  }

  /**
   * Handle link clicks
   */
  function handleLinkClick(e) {
    const link = e.target.closest("a");
    if (!link) return;

    if (shouldHandleLink(link)) {
      e.preventDefault();
      loadPage(link.getAttribute("href"));
    }
  }

  /**
   * Handle browser back/forward buttons
   */
  function handlePopState() {
    loadPage(window.location.pathname + window.location.search);
  }

  /**
   * Initialize SPA navigation
   */
  function init() {
    // Intercept all internal link clicks
    document.addEventListener("click", handleLinkClick, true);

    // Handle browser back/forward buttons
    window.addEventListener("popstate", handlePopState);

    // Update active nav on page load
    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", updateActiveNav);
    } else {
      updateActiveNav();
    }

    // Initialize on load
    window.addEventListener("load", function () {
      updateActiveNav();
      document.body.classList.remove("page-loading");
      document.body.classList.add("page-loaded");
    });
  }

  // Initialize when DOM is ready
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }
})();
