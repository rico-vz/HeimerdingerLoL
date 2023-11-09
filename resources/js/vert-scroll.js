let skinsElement = document.getElementById('skinsElement');
skinsElement.addEventListener('wheel', (ev) => {
    ev.preventDefault();
    skinsElement.scrollLeft += (ev.deltaY + ev.deltaX);
});
