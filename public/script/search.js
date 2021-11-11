window.addEventListener('load', () => {
    const formSearch = document.getElementById('form-search')

    formSearch.addEventListener('submit', (e) => {
        e.preventDefault()
        const search = new URLSearchParams()
        const value = formSearch.querySelector('input').value
        search.set('keywords', value);
        if(Array.isArray(URLSEARCH.query)) URLSEARCH.query.forEach(elm => search.set(elm.key, elm.value))
        return window.location = `${URLSEARCH.path}/search?${search.toString()}`
    })
})