<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="row justify-content-center">

            <x-validation-errors class="mb-4" />

            <h1><i class="bi bi-key"></i>
                Registro de nuevo usuario</h1>
            <hr>

            <form method="post" action="/registro">

                @csrf

                <div class="row mb-3 d-flex align-items-start">

                    <div class="col-3">
                        {{ Form::select('size', ['V' => 'V', 'E' => 'E'], 'V', ['class' => 'form-control']) }}
                        <div class="form-text">Seleccione su nacionalidad</div>
                    </div>

                    <div class="col-9">
                        {{ Form::text('cedula',null,['class' => 'form-control']) }}
                        <div class="form-text">Número de cédula</div>
                    </div>

                    <!--<div class="col-lg-3 col-md-3 d-none d-xl-block d-lg-block d-md-block text-center">
                        <i class="bi bi-person-rolodex" style="font-size: 90px;"></i>
                    </div> -->

                </div>

                <div class="mb-3 d-flex justify-content-end">

                    <a class="btn btn-light me-2" href="" role="button">Regresar</a>

                    <x-button class="btn-primary">
                        Buscar Trabajador
                    </x-button>

                </div>

                <div id="cargando" class="text-center" style="display:none">
                    <hr>
                    Cargando . . .
                </div>

                <div id="datos_usuario" class="mb-3" >

                    <hr class="mb-0">

                    <table class="table table-striped table-hover table-responsive w-100">

                        <tr>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Cargo</th>
                            <th>Correo</th>
                        </tr>

                        <tr>
                            <td id="td_nombres"></td>
                            <td id="td_apellidos"></td>
                            <td id="td_cargo"></td>
                            <td id="td_correo"></td>
                        </tr>

                    </table>

                </div>

                <div class="mb-3 text-center">
                    
                    <x-button class="btn-primary">
                        Registrarse
                    </x-button>

                </div>

            </form>

        </div>

    </x-authentication-card>
</x-guest-layout>