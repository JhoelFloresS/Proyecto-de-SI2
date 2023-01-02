import Alpine from 'alpinejs';
import axios from 'axios';

window.Alpine = Alpine;

// Alpine.store('logo', {
//     url: 'inicio',

//     setUrl(url) {
//         this.url = url;
//     }
// })

Alpine.data('settings', () => ({
    localImage: null,
    file: null,
    fonts: [],
    currentFont: null,
    url: null,

    init(){
        //charge the fonts
        this.fonts = [
            {name: 'Arial', value: 'Arial, Helvetica, sans-serif'},
            {name: 'Arial Black', value: '"Arial Black", Gadget, sans-serif'},
            {name: 'Comic Sans MS', value: '"Comic Sans MS", cursive, sans-serif'},
            {name: 'Courier New', value: '"Courier New", Courier, monospace'},
            {name: 'Georgia', value: 'Georgia, serif'},
            {name: 'Impact', value: 'Impact, Charcoal, sans-serif'},
            {name: 'Lucida Console', value: '"Lucida Console", Monaco, monospace'},
            {name: 'Lucida Sans Unicode', value: '"Lucida Sans Unicode", "Lucida Grande", sans-serif'},
            {name: 'Palatino Linotype', value: '"Palatino Linotype", "Book Antiqua", Palatino, serif'},
            {name: 'Tahoma', value: 'Tahoma, Geneva, sans-serif'},
            {name: 'Times New Roman', value: '"Times New Roman", Times, serif'},
            {name: 'Trebuchet MS', value: '"Trebuchet MS", Helvetica, sans-serif'},
            {name: 'Open Sans', value: '"Open Sans", sans-serif'},
        ]



        //get the font-family of the web
        this.currentFont = window.getComputedStyle(document.body).getPropertyValue('font-family');


        this.$watch('currentFont', (value) => {
            document.body.style.fontFamily = value;
        })
        
    },

    onSelectedImage(e) {
        const file = e.target.files[0]
        if (!file) {
            this.localImage = null
            this.file = null
            return
        }

        this.file = file

        const fr = new FileReader()
        fr.onload = () => this.localImage = fr.result
        fr.readAsDataURL(file)
    },

    onSelectImage() {
        this.$refs.imageSelector.click()
    },
    setUrl(url) {
        this.url = url;
    },
    
    async saveSettings(file) {

        this.setUrl(await this.uploadImage(file))

        return true
    },

    async uploadImage(file) {
        if (!file) return

        try {

            const cloudUrl = 'https://api.cloudinary.com/v1_1/dfpngwm6t/image/upload'
            const formData = new FormData()
            formData.append('upload_preset', 'demo-vue')
            formData.append('file', file)


            const resp = await axios.post(cloudUrl, formData)

            return resp.data.secure_url


        } catch (error) {
            console.log("error en uploadImage", error);
            return null
        }
    },

    submit() {
        this.$refs.formLogo.submit()
    }

}))

Alpine.start()

//get the font-family of the web 
