
const toogleTheme = () => {
    const html = document.querySelector('html');
    const theme = html.getAttribute('data-bs-theme');
    const icon = document.querySelector('#icon-theme');
    console.log('click');
    if (theme === 'dark') {
        html.setAttribute('data-bs-theme', 'light');
        icon.setAttribute('class', 'bi bi-moon-stars');
    } else {
        html.setAttribute('data-bs-theme', 'dark');
        icon.setAttribute('class', 'bi bi-sun');
    }
}





