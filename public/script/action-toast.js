function initializeToasts(options = null, timeout = 5000) {
    const buttonToasts = document.querySelectorAll('.toast-trigger')
    buttonToasts.forEach(elm => {
        const { dataset } = elm;
        const id = dataset?.id
        const type = dataset?.type
        const title = dataset?.title
        const toastId = dataset?.toast
        const action = dataset?.action
        const method = dataset?.method
        const message = dataset?.message

        const toast = document.getElementById(toastId)
        let instance = new bootstrap.Toast(toast, options);

        let timer;

        elm.addEventListener('click', () => {
            if(!!timer) clearTimeout(timer)

            toast.querySelector('input.id').value = id;
            toast.querySelector('input.method').value = method
            toast.querySelector('form.action').setAttribute('action', action)
            toast.querySelector('.message').innerHTML = message;
            toast.querySelector('.toast-header .title').classList.add(`text-${type}`);
            toast.querySelectorAll('.title').forEach(elm => (elm.innerText = title));
            toast.querySelectorAll('button.type').forEach(elm => elm.classList.add(`btn-${type}`));
            
            instance.show()
            timer = setTimeout(() => instance.hide(), timeout);
        })
    })
}

window.addEventListener('load', () => {
    initializeToasts({ autohide: false })
})