document.addEventListener("DOMContentLoaded", function () {
  const filters = document.querySelectorAll(".filter");
  const apparelItems = document.querySelectorAll(".apparel-item");

  // Function to apply filters
  function applyFilters() {
    const selectedFilters = Array.from(filters)
      .filter((filter) => filter.checked)
      .map((filter) => filter.value);

    apparelItems.forEach((apparelItem) => {
      const brand = apparelItem.getAttribute("data-brand");
      const colour = apparelItem.getAttribute("data-colour");

      const shouldShow =
        selectedFilters.length === 0 ||
        selectedFilters.every((filter) => {
          return brand === filter || colour === filter;
        });

      apparelItem.style.display = shouldShow ? "block" : "none";
    });
  }

  // Event listeners for filter checkboxes
  filters.forEach((filter) => {
    filter.addEventListener("change", applyFilters);
  });
});
