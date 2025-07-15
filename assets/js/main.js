document.querySelectorAll('.product-slider-image').forEach(image => {
    image.addEventListener('click', () => {
        document.querySelector('.product-slider-image.selected').classList.remove('selected')
        image.classList.add('selected')
        document.querySelector('.main-image').src = image.dataset.src
    })
})