function filterLenses(modelo) {
    // Obtener todos los elementos de lentes
    const items = document.querySelectorAll('.image-item');

    // Ocultar todos los elementos al inicio
    items.forEach(item => {
        item.style.display = 'none';
    });

    // Mostrar solo los elementos que coinciden con el modelo seleccionado
    if (modelo === 'all') {
        items.forEach(item => {
            item.style.display = 'block';
        });
    } else {
        const selectedItems = document.querySelectorAll(`.image-item.${modelo}`);
        selectedItems.forEach(item => {
            item.style.display = 'block';
        });
    }
}
