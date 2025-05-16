let skinsElement = document.getElementById('skinsElement');

if (skinsElement) {
    skinsElement.addEventListener('wheel', (ev) => {
        if (skinsElement.scrollWidth > skinsElement.clientWidth) {
            ev.preventDefault();
            skinsElement.scrollLeft += (ev.deltaY + ev.deltaX);
        }
    });
}
