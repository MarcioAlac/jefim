function scrollToTarget() {
    const targetElement = document.getElementById('new_call');
    targetElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
}