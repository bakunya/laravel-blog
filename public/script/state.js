class State {
    constructor(initialState, initialHook = null) {
        this.hook = initialHook
        this.state = initialState

        if(!!this.hook && this.hook instanceof Function) {
            this.hook(this.state)
        }
    }

    get getState() {
        console.log('getter is called')
        return this.state
    }

    set setState(param) {
        console.log('setter is called')
        this.state = param instanceof Function ? param(this.state) : param
        if(this.hook instanceof Function) this.hook(this.state)
    }

    set setHook(param) {
        if(param instanceof Function) return this.hook = param
    }
}