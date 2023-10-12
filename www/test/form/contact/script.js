// Cuando desees mostrar el mensaje
document.addEventListener('DOMContentLoaded', function () {
    const messageContainer = document.querySelector('.message-container');
    messageContainer.classList.add('show-message');
});

// Cuando desees ocultar el mensaje (por ejemplo, después de cierto tiempo)
setTimeout(function () {
    const messageContainer = document.querySelector('.message-container');
    messageContainer.classList.add('hide-message');
}, 3000);
