function createButterfly() {
    const butterflyContainer = document.getElementById('butterfly-container');
    const butterfly = document.createElement('div');
    butterfly.classList.add('butterfly');

    // Random horizontal position
    butterfly.style.left = Math.random() * 100 + 'vw';

    // Random animation duration
    butterfly.style.animationDuration = Math.random() * 3 + 2 + 's';

    // Remove butterfly after it falls
    butterfly.addEventListener('animationend', () => {
        butterfly.remove();
    });

    butterflyContainer.appendChild(butterfly);
}

// Create multiple butterflies at random intervals
setInterval(createButterfly, 300);
