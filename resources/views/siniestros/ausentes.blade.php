



@extends('layouts.app')


@section('content')
 



    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Ingreso - Ausentes</h3>
        </div>
        <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="https://siniestrosdag.com/home#">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="https://siniestrosdag.com/siniestros">Siniestros</a></li>
    <!-- <li class="breadcrumb-item active" aria-current="page">Index</li> -->
  </ol>
</nav>
        <div class="section-body">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link " aria-current="page" href="/siniestros/pendientes">Ingreso</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="{{Route('siniestros.ausentes')}}" >Ausentes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/siniestros/terceros">Terceros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/siniestros/cotizaciones">Sólo a cotizar</a>
                </li>
              </ul>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-siniestro')
                        <a class="btn btn-primary btn-sm mb-3" href="{{ route('siniestros.create') }}">+ INGRESAR STRO</a>
                        @endcan
                        @can('derivar-siniestro')
                        
                    
                        @endcan

            
                        <table class="table table-sm m-1 p-1 table-bordered table-hover table-striped tablita" style="width:100%">
                            <thead style="background-color:hsl(213, 99%, 49%)">                                     
                                
                                <th style="color:#fff;">Fecha ingreso</th>
                                <th style="color:#fff;">Estado</th>
                                <th style="color:#fff;">Compañía</th>
                        
                                <th style="color:#fff;">Siniestro</th>
                                <th style="color:#fff;">Patente</th>
                                <th style="color:#fff;">Dirección</th>
                                <th style="color:#fff;">Localidad</th>
                                <th style="color:#fff;">Motivo</th>
                        
                        
                                
                            
                          
                                
                                <th style="color:#fff;">Acciones</th>                                                                   
                          </thead>
                          <tbody>
                        @foreach ($siniestros as $siniestro)
                        <tr>
                            <td>{{ $siniestro->created_at }}</td>
                           
                            <td>
                                @if( $siniestro->estado == "Pendiente")
                                     <span class='badge badge-primary'> {{$siniestro->estado}} </span>
                                
                                
                                     @elseif($siniestro->estado == "Coordinado")
                                     <span class='badge badge-success'> {{$siniestro->estado}} </span>
                        
                                     @elseif($siniestro->estado == "Baja")
                                     <span class='badge badge-danger'> {{$siniestro->estado}} </span>
                        
                                     @elseif($siniestro->estado == "Informar ausente")
                                     <span class='badge badge-warning'> {{$siniestro->estado}} </span>
                        
                                     @elseif($siniestro->estado == "Derivado")
                                     <span class='badge badge-dark'> {{$siniestro->estado}} </span>
                        
                                     @elseif($siniestro->estado == "Ausente")
                                     <span class='badge badge-light'> {{$siniestro->estado}} </span>
                                    
                                
                                     @endif
                                </td>
                            
                            <td>{{ $siniestro->compania }}</td>
                        
                            <td>{{ $siniestro->siniestro }}</td>
                            <td>{{ $siniestro->patente }}</td>
                            <td>{{ $siniestro->direccion }}</td>
                            <td>{{ $siniestro->localidad }}</td>
                            <td>{{ $siniestro->motivo }}</td>
                        
                        
                        
                            <td>
                                <form action="{{ route('siniestros.destroy',$siniestro->id) }}" method="POST">                                        
                                    
                                    <a class="btn btn-success btn-lg" href="{{ route('siniestros.edit',$siniestro->id) }}"><i class="fa-solid fa-pen-to-square"></i>Editar</a>
                                    <a class="btn btn-warning btn-lg" href="{{ route('siniestros.editIngreso',$siniestro->id) }}"><i class="fa-solid fa-pen-to-square"></i>Coordinar</a>
                                    <a class="btn btn-info btn-lg" href="{{ route('siniestros.history',$siniestro->id) }}"><i class="fa-solid fa-clock-rotate-left"></i>Historial</a>
                        
                                    
                                    
                                    
                                    
                                  
                                    
                        
                                </form>
                                
                                <form action="{{ route('siniestros.update',$siniestro->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                               
                        
                                    @if (session('info'))
                                        <script>
                                            alert('{{session('info')}}');
                                        </script>
                        
                                    @endif
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>

                        <!-- Paginacion a la derecha -->
                        
                        </div>
                    </div>
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
        pageLength : 25,
        responsive: true,
        processing: true,
        
    

        
    });
});




</script>

@endsection

