<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('css/style.css') }}">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


<div class="container-fluid mt-5">

    <div class="card">
        <div class="card-header" id="encabezado">

            <h3>Solictudes de información</h3>
            <a class="btn btn-primary float-right" href="{{route('clientes.create')}}"><i class="fas fa-plus"></i> Nueva solicitud</a>
        </div>
        <div class="card-body">
            <table id="clientes" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Nombre empresa</th>
                        <th>Representante</th>
                        <th>Tipo de cliente</th>
                        <th>Giro</th>
                        <th>Estatus Cliente</th>
                        <th>Accciones</th>

                    </tr>
                </thead>
                <tbody>


                </tbody>

            </table>
        </div>
    </div>
</div>
@if (session()->has('success'))
<script>
    Swal.fire(
        'Exitoso!',
        '{{ session()->get('
        success ')}}',
        'success'
    )
</script>
@endif


<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js"></script>
<script>
    $("#clientes").DataTable({
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "autoWidth": false,
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
        },
        "ajax": "{{ route('clientes.datatables') }}",
        "columns": [{
                data: 'id',
            },
            {
                data: 'nombreempresa',
            }, {
                data: 'contacto.contacto1'
            },
            {
                data: 'tipocliente'
            },
            {
                data: 'giro.nombre'
            },
            {
                data: 'estatuscliente',
            }, {
                data: 'id',
                render: function(data, type, full, meta) {
                    return `
                                    
                    <a href="/clientes/${data}/edit" class="btn btn-success">
                    <i class="fas fa-edit"></i>
                                                </a>

                                                <a href="/clientes/${data}/"
                                                class="btn btn-primary">
                                                <i class="fas fa-eye"></i>
                                                </a>


                                               

                                               
                                    `
                }
            }
        ]
    })



    function reloadTable() {
        $('#clientes').DataTable().ajax.reload();
    }
</script>