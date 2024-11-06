const container = document.getElementById('container');
const overlayCon = document.getElementById('overlaycon');
const overlayBtn = document.getElementById('overlayBtn');

overlayBtn.addEventListener('click', () => {
    container.classList.toggle('right-panel-active');
})