function floatInput(inputElement) {
    const floatingInput = document.createElement('div');
    floatingInput.className = 'floating-input';
    floatingInput.textContent = inputElement.placeholder;
    
    // Remove any existing floating inputs
    const existingFloatingInput = document.querySelector('.floating-input');
    if (existingFloatingInput) {
        existingFloatingInput.remove();
    }
    
    // Add the floating input to the document
    inputElement.parentElement.appendChild(floatingInput);
    
    // Position the floating input box
    const inputRect = inputElement.getBoundingClientRect();
    floatingInput.style.top = `${inputRect.top - 30}px`; // Adjust the top position
    floatingInput.style.left = `${inputRect.left}px`; // Adjust the left position
    
    // Show the floating input box
    floatingInput.style.display = 'block';
}
