// resources/js/bienvenida.js
import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.data('bienvenida', () => ({
    animar: false,
    init() {
        setInterval(() => this.animar = !this.animar, 1200) // pulso cada 1.2s
    }
}))

Alpine.start()