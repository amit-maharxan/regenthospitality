document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.getElementById("searchInput");
  const destinationFilter = document.getElementById("destinationFilter");
  const searchButton = document.getElementById("searchButton");
  const vacancyGrid = document.getElementById("vacancyGrid");

  if (!searchInput || !destinationFilter || !searchButton || !vacancyGrid) {
    return;
  }

  const vacancyCards = vacancyGrid.querySelectorAll(".vacancy-card");

  const noResults = document.createElement("p");
  noResults.className = "no-results";
  noResults.innerHTML =
    "<span data-i18n='noVacanciesFound'>No vacancies found.</span>";
  noResults.style.display = "none";

  vacancyGrid.after(noResults);

  function filterVacancies() {
    const searchValue = searchInput.value.trim().toLowerCase();
    const destinationValue = destinationFilter.value;

    let visibleCount = 0;

    vacancyCards.forEach(function (card) {
      const searchText = (card.dataset.search || "").toLowerCase();
      const destination = card.dataset.destination || "";

      const matchesSearch = searchText.includes(searchValue);

      const matchesDestination =
        destinationValue === "all" || destination === destinationValue;

      if (matchesSearch && matchesDestination) {
        card.style.display = "";
        visibleCount++;
      } else {
        card.style.display = "none";
      }
    });

    noResults.style.display = visibleCount === 0 ? "block" : "none";
  }

  // Filter only when Search button is clicked
  searchButton.addEventListener("click", filterVacancies);

  // Also filter when Enter is pressed
  searchInput.addEventListener("keydown", function (e) {
    if (e.key === "Enter") {
      e.preventDefault();
      filterVacancies();
    }
  });
});
