function initializeToasts(options = null) {
    const buttonToasts = document.querySelectorAll('.toast-trigger')
    buttonToasts.forEach(elm => {
        const toastId = elm.dataset.toast
        const toast = document.getElementById(toastId)

        elm.addEventListener('click', () => new bootstrap.Toast(toast, options).show())
    })
}

window.addEventListener('load', () => {
    initializeToasts()
})