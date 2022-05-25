<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

<div class="container my-5">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center"><b class="text-primary">Datos generales del contacto</b></h5>
                    <h5 class=""><b>Contacto: </b>{{$cliente->contacto->contacto1}}</h5>
                    <h5 class=""><b>Teléfono: </b>{{$cliente->contacto->telefono1}}</h5>
                    <h5 class=""><b>Correo electrónico: </b>{{$cliente->contacto->email1}}</h5>

                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center"><b class="text-primary">Datos de la organización</b></h5>

                    <h5><b>Empresa: </b> {{$cliente->nombreempresa}}</h5>
                    <h5><b>RFC: </b> {{$cliente->rfc}} </h5>
                    <h5><b>Giro empresarial: </b> {{$cliente->giro->nombre}} </h5>


                </div>

            </div>

        </div>
        <div class="container my-3">
            <form action="{{route('clientes.destroy', $cliente)}}" method="POST">
                @method('DELETE')
                @csrf
                <input class="btn btn-danger float-right" type="submit" value="Eliminar">
            </form>
        </div>
    </div>


</div>