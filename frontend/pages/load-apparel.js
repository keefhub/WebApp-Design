document.addEventListener('DOMContentLoaded', function () {
    const apparelList = document.getElementById('apparel-list');

    // Fetch data from the PHP script
    fetch('apparel-data.php')
        .then(response => response.json())
        .then(data => {
            // Loop through the data and create HTML elements for each item
            data.forEach(item => {
                const apparelItem = document.createElement('div');
                apparelItem.className = 'apparel-item';
                apparelItem.innerHTML = `
                    <h2>${item.name}</h2>
                    <p class="price">$${item.price.toFixed(2)}</p>
                `;
                apparelList.appendChild(apparelItem);
            });
        })
        .catch(error => {
            console.error('Error loading apparel data:', error);
        });
});
