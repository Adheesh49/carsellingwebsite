// Dynamic form input focus
document.querySelectorAll('input').forEach(input => {
    input.addEventListener('focus', () => {
        input.style.backgroundColor = 'yellow';
    });

    input.addEventListener('blur', () => {
        input.style.backgroundColor = 'white';
    });
});

// Button hover effect
document.querySelectorAll('button').forEach(button => {
    // Get computed background color to handle default and inline styles
    const originalBackgroundColor = getComputedStyle(button).backgroundColor;

    button.addEventListener('mouseover', () => {
        button.style.backgroundColor = 'lightblue';
    });

    button.addEventListener('mouseout', () => {
        button.style.backgroundColor = '';
    });
});

