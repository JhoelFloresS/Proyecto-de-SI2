<x-tenant-app title="personalizacion">

    <div class="welcome">
        <div class="content rounded-3 p-3">
            <h1 class="fs-3">Personalizacion del sistema</h1>
        </div>
    </div>

    <section class="statistics mt-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div
            x-data="{
                localImage: null,
                file: null,

                onSelectedImage(e) {
                    const file = e.target.files[0]
                    if ( !file ){
                        localImage = null
                        file = null    
                        return
                    }

                    this.file = file

                    const fr = new FileReader()
                    fr.onload = () => this.localImage = fr.result
                    fr.readAsDataURL(file)
                },
                
                onSelectImage(){
                        $refs.imageSelector.click()
                },

                submit(){
                    $refs.formLogo.submit()
                }
            
            }" 
            >
            <form action="{{ route('tenant.personalizacion.edit', tenant('id')) }}" method="post" x-ref="formLogo">
                @csrf
          
                <div class="row">
                    {{--  <span x-text="localImage"></span>  --}}
                    <div class="col-lg-4">
                        <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
                            {{-- <i class=" uil-users-alt fs-2 text-center bg-primary rounded-circle"></i> --}}
                            <i class=" rounded-md w-20 h-20 fill-current text-gray-300"
                                style="background-image:url({{ tenant('logo') }}); background-repeat: no-repeat; background-size: cover;"></i>
                            <div class="ms-3">
                              
                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    @click="onSelectImage"
                                    >
                                    <i class="uil uil-upload"></i>
                                    Subir Logo
                                  
                                </button>
                                <input type="text" name="logo" x-model="$store.logo.url" x-show="false">
                                <input
                                    type="file"
                                    x-on:change.debounce="onSelectedImage" 
                                    x-ref="imageSelector"
                                    x-show="false"
                                    />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
                            <i class="uil-file fs-2 text-center bg-danger rounded-circle"></i>
                            <div class="ms-3">
                                <div class="d-flex align-items-center">
                                    <h3 class="mb-0">Pagina Web</h3>
                                </div>
                                <input class="form-control" type="text" name="pagina"
                                    value="{{ old('pagina', tenant('pagina_web')) }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box d-flex rounded-2 align-items-center p-3">
                            <i class="uil-envelope-shield fs-2 text-center bg-success rounded-circle"></i>
                            <div class="ms-3">
                                <div class="d-flex align-items-center">
                                    <h3 class="mb-0">Email</h3>
                                </div>
                                <input class="form-control" type="text" name="email"
                                    value="{{ old('email', tenant('email')) }}">
                            </div>
                        </div>
                    </div>
    
                </div>
         
                <button @click="await saveSettings(file) && submit()" style="margin: 20px" class="btn btn-primary  items-center px-5 py-2 "
                    type="button">Guardar</button>
            </form>

        </div>
    </section>
    <script>
        async function uploadImage( file ){
            if( !file ) return
        
            try {
        
                const cloudUrl = 'https://api.cloudinary.com/v1_1/dfpngwm6t/image/upload'
                const formData = new FormData()
                formData.append('upload_preset', 'demo-vue')
                formData.append('file', file)
        
        
                const resp = await axios.post( cloudUrl, formData )
                
                return resp.data.secure_url
        
                
            } catch (error) {
                console.log("error en uploadImage", error);
                return null
            }
        }

        async function saveSettings( file){
       
            Alpine.store('logo').setUrl(await uploadImage(file ))
      

            return true
        }
    </script>
</x-tenant-app>
