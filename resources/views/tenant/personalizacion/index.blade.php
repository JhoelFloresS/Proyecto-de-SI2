@section('navbar', 'Personalizacion')
@section('aside-personalizacion', 'py-2.7 bg-blue-500/13')
<x-tenant-app title="personalizacion">
    @section('head')
        @vite(['resources/js/personalizacion/index.js'])
    @endsection
    <!-- <div class="welcome">
        <div class="content rounded-3 p-3">
            <h1 class="fs-3">Personalizacion del sistema</h1>
        </div>
    </div> -->


    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div x-data="settings">



        <!-- <div class="row">
                {{-- <span x-text="localImage"></span>  --}}
                <div class="col-lg-4">
                    <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
                        {{-- <i class=" uil-users-alt fs-2 text-center bg-primary rounded-circle"></i> --}}
                        <i class=" rounded-md w-20 h-20 fill-current text-gray-300" style="background-image:url({{ tenant('logo') }}); background-repeat: no-repeat; background-size: cover;"></i>
                        <div class="ms-3">

                            <button type="button" class="btn btn-primary" @click="onSelectImage">
                                <i class="uil uil-upload"></i>
                                Subir Logo

                            </button>
                
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
                            <input class="form-control" type="text" name="pagina" value="{{ old('pagina', tenant('pagina_web')) }}">
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
                            <input class="form-control" type="text" name="email" value="{{ old('email', tenant('email')) }}">
                        </div>
                    </div>
                </div>

            </div>

            <button @click="await saveSettings(file) && submit()" style="margin: 20px" class="btn btn-primary  items-center px-5 py-2 " type="button">Guardar</button> -->

    </div>

    <div x-data="settings" class="w-full my-4">
        <div
            class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <form action="{{ route('tenant.personalizacion.update', tenant('id')) }}" method="post" x-ref="formLogo">
                @csrf
                <div class="flex-auto p-6">
                    <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Personalizacion del
                        sistema</p>
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0 flex flex-row items-start">
                            <div class="w-full flex flex-col md:w-1/2 items-start">
                                <div class="mb-4 ">
                                    <label for="username"
                                        class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Logo</label>
                                    <input type="file" x-on:change.debounce="onSelectedImage" x-ref="imageSelector"
                                        x-show="false"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                                <div class="flex flex-row w-full px-6" >
                                    <button type="button"
                                        class="bg-gradient-to-tl from-blue-500 to-violet-500 text-white px-4 py-2 rounded-full w-full"
                                        @click="onSelectImage">
                                        <span class="material-icons">
                                            upload_file
                                        </span>
                                    </button>
                                    <input type="text" name="logo" x-model="url" x-show="false" value="{{tenant('id')}}">
                                    <input type="file" x-on:change.debounce="onSelectedImage" x-ref="imageSelector" x-show="false" />
                                </div>
                            </div>
                            <img :src="localImage??'{{ tenant('logo') }}'" alt="logo" style="object-fit: cover; width:150px; height:150px;">
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                            <div class="mb-4">
                                <label for="email"
                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                    Email
                                </label>
                                <input id="email" type="email" name="email" value="{{ old('email', tenant('email')) }}"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                            <div class="mb-4">
                                <label for="font"
                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                    Fuente de Letra
                                </label>
                                <select x-model="currentFont" name="fuente" id="font" class="form-select focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                  <template x-for="font in fonts">
                                        <option :value="font.value"  :style="`font-family: ${font.value} !important;`" 
                                            :selected="font.value == currentFont ? true: false">
                                            <span 
                                                x-text="font.name"
                                                >
                                            </span>
                                        </option>
                                  </template>
                                </select>
                                {{-- <input type="email" name="email" value="{{ old('email', tenant('email')) }}"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" /> --}}
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                            <div class="mb-4">
                                <label for="pagina_web"
                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Pagina
                                    Web</label>
                                <input id="pagina_web" type="text" name="pagina_web" value="{{ old('pagina_web', tenant('pagina_web')) }}"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                            <div class="mb-4">
                                <label for="direccion"
                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Dirección</label>
                                <input id="direccion" type="text" name="direccion" value="{{ old('dreccion', tenant('direccion')) }}"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div>
                    </div>
                    <button @click="await saveSettings(file) && submit()"
                        class="bg-gradient-to-tl from-blue-500 to-violet-500 text-white px-4 py-2 rounded-full"
                        type="button">Guardar</button>
                </div>
            </form>
        </div>
    </div>


    @section('end-body')

    @endsection
</x-tenant-app>
