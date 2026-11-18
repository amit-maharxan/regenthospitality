document.addEventListener("DOMContentLoaded", function () {
  const languageSelect = document.getElementById("language");

  // Detect language from current URL
  const currentPath = window.location.pathname;

  let currentLang = currentPath.startsWith("/np") ? "np" : "en";

  // Select current language
  languageSelect.value = currentLang;

  // Update URL when language changes
  languageSelect.addEventListener("change", function () {
    const selectedLang = this.value;
    let newPath = window.location.pathname;

    // Remove existing language prefix
    newPath = newPath.replace(/^\/(en|np)(?=\/|$)/, "");

    // Add selected language prefix
    if (selectedLang === "np") {
      newPath = "/np" + newPath;
    }

    // Redirect while preserving query parameters and hash
    window.location.href =
      newPath + window.location.search + window.location.hash;
  });
});
