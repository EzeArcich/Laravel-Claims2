@extends('layouts.app')
@section('content')

    <section class="section m-10">
        <div class="section-header">
            <h3 class="page__heading">Siniestros</h3>
        </div>
        <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="https://siniestrosdag.com/home#">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="https://siniestrosdag.com/siniestros">Siniestros</a></li>
    <li class="breadcrumb-item active" aria-current="page">Global</li>
  </ol>
</nav>
        <div class="section-body">
            <div class="row p-0 m-0">
                <div class="col-lg-12 p-0 m-0">
                    
                        
                
                       
                        
                        <table class="table m-1 p-1 table-sm table-bordered tablita" style="width:100%;">
                                <thead style="background-color:hsl(213, 99%, 49%)">                                     
                                 
                                <th style="color:#fff;">Fecha ingreso</th>   
                                <th style="color:#fff;">Estado</th>
                                <th style="color:#fff;">Fecha IP</th>
                                <th style="color:#fff;">Compañía</th>
                                <th style="color:#fff;">Siniestro</th>
                                <th style="color:#fff;">Patente</th>
                                <th style="color:#fff;">Dirección</th>
                                <th style="color:#fff;">Localidad</th>
                                <th style="color:#fff;">Motivo</th>
                                <th style="color:#fff;">Modalidad</th>
                                <th style="color:#fff;">Inspector</th>
                                <th style="color:#fff;">Fecha egreso</th>
                                <th style="color:#fff;">Acciones</th>
                                                                                                 
                              </thead> 
                        </table>
                        
                    
                </div>
            </div>
        </div>
    </section>
@endsection

<!-- DataTables JS -->

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/r-2.2.9/datatables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@section('javas')

<script>
    $(document).ready(function() {
    $('.tablita').DataTable({
        ajax: {
        url: 'datatable/users',
        type: 'get'
    },
        processing: true,
        serverSide: true,
        pageLength: 50,        
        columns: [
            
            {"data": "created_at",
            "render": function (data) {
        var date = new Date(data);
        var month = date.getMonth() + 1;
        // Para poner en formato correcto la fecha y que se ordene bien
        return date.getDate() + "/" + (month.toString().length > 1 ? month : "0" + month) + "/" + date.getFullYear();
    }},
            { data: 'estado',
                render: function (data, type) {
                    if (type === 'display') {
                        let estado = '';
 
                        switch (data) {
                            case 'Coordinado':
                                estado = 'primary';
                                break;
                            case 'Pendiente':
                                estado = 'success';
                                break;
                            case 'Ausente':
                                estado = 'warning';
                                break;
                                case 'Tercero':
                                estado = 'info';
                                break;
                            case 'Baja':
                                estado = 'danger';
                                break;
                           
                           
                        }
 
                        return '<span style="width:8rem" class="ml-4 px-auto badge badge-pill badge-' + estado+'">'+data+'</span> ';
                    }
 
                    return data;
                },},    
            {"data": "fechaip"},
            {"data": "compania"},
            {"data": "siniestro"},
            {"data": "patente"},
            {"data": "direccion"},
            {"data": "localidad"},
            {"data": "motivo"},
            {"data": "modalidad"},
            {"data": "inspector"},
            {"data": "fechacierre"},  
            {"data": "actions", "searchable": "false", "orderable": "false"},  
                
     
        ],
});
    })    
function editData(id){
 
    $.ajax({
        type:"get",
        dataType:"json",
        url:"/teacher/edit/"+id,
        success: function(data){
            $('#id').val(data.id);
            
            console.log(data);
        }
    })
}

</script>
@endsection

