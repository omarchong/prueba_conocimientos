<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">

<div class="container my-5">
    <div class="card">
        <h5 class="card-header">Actualizacion de clientes</h5>
        <div class="card-body">
            <form action="{{ route('clientes.update',['cliente' => $cliente->id]) }}" method="POST" id="clientes" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="form-row">

                    <div class="col-md-12">
                        <label for="exampleInputEmail1" class="form-label">Seleccione el contacto</label>
                        <div class="form-group">
                            <select class="form-control @error('contactos_id') is-invalid @enderror" name="contacto_id" id="contacto_id">
                   
                                @foreach($contactos as $contacto)
                                <option value="{{$contacto->id}}" {{$cliente->contacto_id == $contacto->id ? 'selected' : ''}}>
                                    {{$contacto->contacto1}}
                                </option>
                                @endforeach
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                @error('contacto_id')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </select>

                        </div>
                    </div>
                    <div class="container">
                        <label class="form-label">Tipo de cliente</label>

                    </div>

                    <div class="col-md-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipocliente" id="tipocliente" value="Empresa" {{old('tipocliente') === 'Empresa' ? 'checked' : ($cliente->tipocliente == 'Empresa' ? 'checked' : '')}}>
                            <label class="form-check-label" for="exampleRadios1">
                                Empresa
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipocliente" id="tipocliente" value="Particular" {{old('tipocliente') === 'Particular' ? 'checked' : ($cliente->tipocliente == 'Particular' ? 'checked' : '')}}>
                            <label class="form-check-label" for="exampleRadios2">
                                Particular
                            </label>
                        </div>
                    </div>
                    <div class="alert alert-primary col-md-12" role="alert">
                        <h5 class="text-center">Información del negocio</h5>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Estado</label>
                        <div class="form-group">
                            <select name="estado_id" id="estado_id" class="form-control estado @error('estado_id') is-invalid @enderror">
                                <option selected disabled value="">Seleccione una opcion</option>
                                @foreach($estados as $estado)
                                <option value="{{$estado->id}}" {{$cliente->estado_id == $estado->id ? 'selected' : ''}}>{{$estado->nombre}}</option>
                                @endforeach
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                @error('estado_id')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </select>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Municipio</label>
                        <div class="form-group">
                            <select name="municipio" id="municipio" class="form-control">
                            @foreach($municipios as $municipio)
                                <option value="{{$municipio->id}}" {{$cliente->municipio_id == $municipio->id ? 'selected' : ''}}>{{$municipio->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Seleccione el giro</label>
                        <div class="form-group">
                            <select class="form-control" name="giro_id" id="giro_id">

                                @foreach($giros as $giro)
                                <option value="{{$giro->id}}" {{$cliente->giro_id == $giro->id ? 'selected' : ''}}>
                                    {{$giro->nombre}}
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="exampleInputEmail1" class="form-label">Codigo postal</label>
                        <div class="form-group">
                            <input type="number" required class="form-control @error('cp') is-invalid @enderror" id="cp" name="cp" value="{{old('cp') ?? $cliente->cp}}">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('cp')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Referencias</label>
                        <div class="form-group">
                            <input type="text" required class="form-control @error('referencias') is-invalid @enderror" id="referencias" name="referencias" value="{{old('referencias') ?? $cliente->referencias}}">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('referencias')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="exampleInputEmail1" class="form-label">Nombre empresa</label>
                        <div class="form-group">
                            <input type="text" required class="form-control @error('nombreempresa') is-invalid @enderror" id="nombreempresa" name="nombreempresa" value="{{old('nombreempresa') ?? $cliente->nombreempresa}}">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('nombreempresa')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="exampleInputEmail1" class="form-label">RFC</label>
                        <div class="form-group">
                            <input type="text" required class="form-control @error('rfc') is-invalid @enderror" id="rfc" name="rfc" value="{{old('rfc') ?? $cliente->rfc}}">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('rfc')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                    </div>


                    <div class="alert alert-primary col-md-12" role="alert">
                        <h5 class="text-center">Dirección fiscal</h5>
                    </div>


                    <div class="col-md-12">
                        <label for="descripcion">Dirección fiscal</label>
                        <div class="form-group">
                            <input type="hidden" required name="direccionfiscal" id="direccionfiscal" value="{{$cliente->direccionfiscal}}">
                            <trix-editor input="direccionfiscal"></trix-editor>
                        </div>
                        <div class="valid-feedback">
                            Correcto!
                        </div>
                        @error('direccionfiscal')
                        <small class="text-danger"> {{ $message }} </small>
                        @enderror

                    </div>

                    <div class="container">
                        <label for="exampleInputEmail1" class="form-label">Estatus clientes</label>

                    </div>


                    <div class="col-md-12">

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="estatuscliente" id="estatuscliente" value="Frecuente" {{old('estatuscliente') === 'Frecuente' ? 'checked' : ($cliente->estatuscliente == 'Frecuente' ? 'checked' : '')}}>
                            <label class="form-check-label" for="exampleRadios1">
                                Frecuente
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="estatuscliente" id="estatuscliente" value="Habitual" {{old('estatuscliente') === 'Habitual' ? 'checked' : ($cliente->estatuscliente == 'Habitual' ? 'checked' : '')}}>
                            <label class="form-check-label" for="exampleRadios2">
                                Habitual
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="estatuscliente" id="estatuscliente" value="Ocacional" {{old('estatuscliente') === 'Ocacional' ? 'checked' : ($cliente->estatuscliente == 'Ocacional' ? 'checked' : '')}}>
                            <label class="form-check-label" for="exampleRadios2">
                                Ocacional
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="estatuscliente" id="estatuscliente" value="Prospecto" {{old('estatuscliente') === 'Prospecto' ? 'checked' : ($cliente->estatuscliente == 'Prospecto' ? 'checked' : '')}}>
                            <label class="form-check-label" for="exampleRadios2">
                                Prospecto
                            </label>
                        </div>
                    </div>

                </div>
                <div class="container col-md-12">
                    <button type="submit" class="btn btn-primary float-right">Guardar</button>

                </div>

            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $("#estado_id").on('change', function() {
            var estadoId = this.value;
            $("#municipio").html('');
            $.ajax({
                url: "{{ route('getMunicipios') }}?estado_id=" + estadoId,
                type: 'get',
                success: function(res) {
                    $("#municipio").html('<option value="">Selecciona un municipio</option>');
                    $.each(res, function(key, value) {
                        $("#municipio").append('<option value="' + value
                            .id + '">' + value.nombre + '</option>');
                    });
                }
            })
        })


    });
</script>

<script>
    $(document).ready(function() {
        $("#clientes").validate({
            rules: {
                nombreempresa: {
                    required: true
                },
                cp: {
                    required: true
                },
                referencias: {
                    required: true
                },
                rfc: {
                    required: true
                },
                contactos_id: {
                    required: true
                },
                estado_id: {
                    required: true
                }
            },
            messages: {
                nombreempresa: {
                    required: "Campo requerido"
                },
                cp: {
                    required: "Campo requerido"
                },
                referencias: {
                    required: "Campo requerido"
                },
                rfc: {
                    required: "Campo requerido"
                },
                contactos_id: {
                    required: "Selccione un contacto"
                },
                estado_id: {
                    required: "Selccione un estado"
                },
            }
        })

    })
</script>
<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>