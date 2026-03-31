document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('searchInput');
    if (!searchInput) return; 

    searchInput.addEventListener('input', function(){
        const filter = this.value.toLowerCase();
        document.querySelectorAll('.product-card-wrapper').forEach(card => {
            const titleElem = card.querySelector('.card-title');
            if(!titleElem) return;
            const title = titleElem.textContent.toLowerCase();
            card.style.display = title.includes(filter) ? 'block' : 'none';
        });
    });
});