function initializePortfolio() {
  const Shuffle = window.Shuffle;

  class PortfolioGallery {
    constructor(element) {
      this.element = element;
      this.itemsPerPage = 6;
      this.currentItems = 0;
      this.shuffleInstance = new Shuffle(element, {
        itemSelector: ".gallery-item",
      });
      this.allItems = Array.from(
        this.element.querySelectorAll(".gallery-item")
      );
      this.setupFilterButtons();
      this.setupLoadMoreButton();
      this.displayInitialItems();
    }

    displayInitialItems() {
      this.allItems.forEach((item, index) => {
        if (index < this.itemsPerPage) {
          item.style.display = "";
        } else {
          item.style.display = "none";
        }
      });
      this.currentItems = this.itemsPerPage;
      this.shuffleInstance.update(); // Ensure the grid is laid out properly
      this.toggleLoadMoreButton(); // Hide button if necessary
    }

    setupFilterButtons() {
      const filterOptions = document.querySelector(".filter-options");
      if (!filterOptions) return;

      const filterButtons = Array.from(filterOptions.children);
      const onFilterClick = this.handleFilterClick.bind(this);
      filterButtons.forEach((button) =>
        button.addEventListener("click", onFilterClick, false)
      );
    }

    handleFilterClick(evt) {
      const button = evt.currentTarget;
      const isActive = button.classList.contains("active");
      const filterGroup = button.getAttribute("data-group");

      this.clearActiveClasses(button.parentNode);

      if (!isActive) {
        button.classList.add("active");
        this.shuffleInstance.filter(filterGroup);

        // Update the visibility of filtered items
        this.updateVisibleItems();
      }
    }

    updateVisibleItems() {
      const visibleItems = this.element.querySelectorAll(
        '.gallery-item[style="display: block;"]'
      );
      this.currentItems = visibleItems.length;
      this.toggleLoadMoreButton();
    }

    setupLoadMoreButton() {
      const loadMoreButton = document.querySelector("#load-more-btn");
      if (!loadMoreButton) return;

      loadMoreButton.addEventListener("click", (event) => {
        event.preventDefault(); // Prevent default button behavior
        this.loadMoreItems();
      });
    }

    loadMoreItems() {
      const remainingItems = this.allItems.length - this.currentItems;
      const itemsToLoad =
        remainingItems > this.itemsPerPage ? this.itemsPerPage : remainingItems;

      this.allItems.forEach((item, index) => {
        if (index < this.currentItems + itemsToLoad) {
          item.style.display = "";
        }
      });

      this.currentItems += itemsToLoad;
      this.shuffleInstance.update(); // Re-layout the grid after showing new items
      this.toggleLoadMoreButton(); // Check if button should be hidden
    }

    toggleLoadMoreButton() {
      const loadMoreButton = document.querySelector("#load-more-btn");
      if (this.currentItems >= this.allItems.length) {
        loadMoreButton.style.display = "none"; // Hide button if all items are visible
      } else {
        loadMoreButton.style.display = ""; // Show button if more items remain
      }
    }

    clearActiveClasses(parent) {
      Array.from(parent.children).forEach((child) =>
        child.classList.remove("active")
      );
    }
  }

  document.addEventListener("DOMContentLoaded", () => {
    new PortfolioGallery(document.getElementById("portfolio-gallery"));
  });
}

initializePortfolio();
