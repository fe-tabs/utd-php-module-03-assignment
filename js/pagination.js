document.addEventListener("DOMContentLoaded", function () {
	const pagination = document.querySelector(".pagination")
	const items = Array.from(document.querySelectorAll("tr")).slice(1);
	
	let currentPage = 0;
	let itemsPerPage = 5;
	
	function showPage(page) {
    const startIndex = page * itemsPerPage;
		const endIndex = startIndex + itemsPerPage;
		items.forEach((item, index) => {
      item.classList.toggle('hidden', index < startIndex || index >= endIndex);
    });
    updateLinkStates();
  }
	
	function createPageButtons() {
		const totalPages = Math.ceil(items.length/itemsPerPage);
		
		for (let i = 0; i < totalPages; i++) {
      const pageItem = document.createElement('li');
			pageItem.classList.add("page-item");
			
			const pageLink = document.createElement("a");
			pageLink.classList.add("page-link");
			pageLink.href = "#";
      pageLink.textContent = i + 1;
			
      pageLink.addEventListener('click', () => {
        currentPage = i;
        showPage(currentPage);
        updateLinkStates();
      });
			
      pageItem.appendChild(pageLink);
      pagination.appendChild(pageItem);
    }
  }
	
	function updateLinkStates() {
    const pageLinks = document.querySelectorAll('.pagination li');
    pageLinks.forEach((link, index) => {
      if (index === currentPage) {
        link.classList.add('active');
      } else {
        link.classList.remove('active');
      }
    });
  }
	
	createPageButtons();
	showPage(currentPage);
})
