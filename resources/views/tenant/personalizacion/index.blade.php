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

        <form action="{{ route('tenant.personalizacion.edit', tenant('id')) }}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-4">
                    <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
                        {{-- <i class=" uil-users-alt fs-2 text-center bg-primary rounded-circle"></i> --}}
                        <i class=" rounded-md w-20 h-20 fill-current text-gray-300"
                            style="background-image:url({{ tenant('logo') }}); background-repeat: no-repeat; background-size: cover;"></i>
                        <div class="ms-3">
                            <div class="d-flex align-items-center">
                                <h3 class="mb-0 ">Logo</h3>
                            </div>
                            <input class="form-control" type="text" name="logo"
                                value="{{ old('logo', tenant('logo')) }}">
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
            <button style="margin: 20px" class="btn btn-primary  items-center px-5 py-2 "
                type="submit">Guardar</button>
        </form>
    </section>

</x-tenant-app>
