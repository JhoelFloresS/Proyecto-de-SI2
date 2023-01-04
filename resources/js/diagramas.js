import Alpine from 'alpinejs'



window.Alpine = Alpine

Alpine.data('diagrama', () =>({
    diagramas : null,
    count: 0,
    title: 'Unsaved Diagram',

    init() {
        console.log('init');
        this.getDiagramas();
        window.localStorage.clear();
    },

    async getDiagramas() {
        const resp = await fetch(`/api/${tenant}/diagramas`)
        const data = await resp.json()
        
        this.diagramas = data

        this.diagramas.forEach(element => {
            window.localStorage.setItem(`${element.id}-${element.nombre}`, element.json);

        });

    }



}))


Alpine.start()