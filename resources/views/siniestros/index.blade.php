@extends('layouts.app')


@section('content')
 



    <section class="section">
        <div class="section-header" style="width: 9rem; margin-left:-3rem">
            <h3 class="page__heading text-dark">Ingreso</h3>
        </div>
        <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="https://siniestrosdag.com/home#">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="https://siniestrosdag.com/siniestros">Siniestros</a></li>
    <!-- <li class="breadcrumb-item active" aria-current="page">Index</li> -->
  </ol>
</nav>
        <div class="section-body m-10">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" data-target="#index" aria-current="page" id="ingreso"  style="cursor: pointer"   >Ingreso</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-target="#ausentes" id="ausente"  style="cursor: pointer"  >Ausentes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-target="#terceros" id="tercero"  style="cursor: pointer" >Terceros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-target="#cotizaciones" id="cotizar"  style="cursor: pointer" >Sólo a cotizar</a>
                </li>
              </ul>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        
                        <a class="btn btn-primary btn-sm mb-3" href="{{ route('siniestros.create') }}">+ INGRESAR STRO</a>
                        
                        

                        <div data-content class="active" id="index">
                            <table class="table table-sm m-1 p-1 table-bordered tablita" style="width:100%">
                                <thead style="background-color:hsl(213, 99%, 49%)">                                     
                                    
                                    <th style="color:#fff;">Fecha ingreso</th>
                                    <th style="color:#fff;">Estado</th>
                                    <th style="color:#fff;">Compañía</th>
                                    <th style="color:#fff;">Coordina</th>
                                    <th style="color:#fff;">Siniestro</th>
                                    <th style="color:#fff;">Patente</th>
                                    <th style="color:#fff;">Dirección</th>
                                    <th style="color:#fff;">Localidad</th>
                                    <th style="color:#fff;">Tipo de IP</th>
                                    <th style="color:#fff;">Modalidad</th>
                                    {{-- <th style="color:#fff;">Inspector</th> --}}


                                    
                                
                              
                                    
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($pendientes as $siniestro)
                            <tr>
                                <td>{{ $siniestro->created_at }}</td>
                               {{-- cambiar formato de fecha --}}
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
                                <td>{{ $siniestro->created_by }}</td>
                                <td>{{ $siniestro->siniestro }}</td>
                                <td>{{ $siniestro->patente }}</td>
                                <td>{{ $siniestro->direccion }}</td>
                                <td>{{ $siniestro->localidad }}</td>
                                <td>{{ $siniestro->motivo }}</td>
                                <td>{{ $siniestro->modalidad }}</td>
                                {{-- <td>{{ $siniestro->inspector }}</td> --}}



                                <td>
                                    <form action="{{ route('siniestros.destroy',$siniestro->id) }}" method="POST">                                        
                                        
                                        <a class="btn btn-warning" href="{{ route('siniestros.editIngreso',$siniestro->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a class="btn btn-info" href="{{ route('siniestros.history',$siniestro->id) }}"><i class="fa-solid fa-clock-rotate-left"></i></a>

                                        
                                        
                                        
                                        
                                      
                                        

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
                        </div>
                        <div data-content id="ausentes">
                            <table class="table table-sm m-1 p-1 table-bordered tablita" style="width:100%">
                                
                                <thead style="background-color:hsl(213, 99%, 49%)">                                     
                                    
                                    <th style="color:#fff;">Fecha ingreso</th>
                                    <th style="color:#fff;">Estado</th>
                                    <th style="color:#fff;">Compañía</th>
                                    <th style="color:#fff;">Coordina</th>
                                    <th style="color:#fff;">Siniestro</th>
                                    <th style="color:#fff;">Patente</th>
                                    <th style="color:#fff;">Dirección</th>
                                    <th style="color:#fff;">Localidad</th>
                                    <th style="color:#fff;">Motivo</th>
                                    <th style="color:#fff;">Modalidad</th>
                                    <th style="color:#fff;">Inspector</th>


                                    
                                
                              
                                    
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($ausentes as $siniestro)
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
                                <td>{{ $siniestro->created_by }}</td>
                                <td>{{ $siniestro->siniestro }}</td>
                                <td>{{ $siniestro->patente }}</td>
                                <td>{{ $siniestro->direccion }}</td>
                                <td>{{ $siniestro->localidad }}</td>
                                <td>{{ $siniestro->motivo }}</td>
                                <td>{{ $siniestro->modalidad }}</td>
                                <td>{{ $siniestro->inspector }}</td>



                                <td>
                                    <form action="{{ route('siniestros.destroy',$siniestro->id) }}" method="POST">                                        
                                        
                                        <a class="btn btn-warning " href="{{ route('siniestros.editIngreso',$siniestro->id) }}"><i class="fa-solid fa-pen-to-square"></i>Coordinar</a>
                                        <a class="btn btn-info " href="{{ route('siniestros.history',$siniestro->id) }}"><i class="fa-solid fa-clock-rotate-left"></i>Historial</a>

                                        
                                        
                                        
                                        
                                      
                                        

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
                        </div>
                        <div data-content  id="terceros">
                            <table class="table table-sm m-1 p-1 table-bordered tablita" style="width:100%">
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
                            @foreach ($terceros as $siniestro)
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
                            
                        </div>
                        <div data-content id="cotizaciones">
                            <table class="table table-sm m-1 p-1 table-bordered tablita" style="width:100%">
                                <thead style="background-color:hsl(213, 99%, 49%)">                                     
                                    
                                    <th style="color:#fff;">Fecha ingreso</th>
                                    <th style="color:#fff;">Estado</th>
                                    <th style="color:#fff;">Compañía</th>
                                    <th style="color:#fff;">Coordina</th>
                                    <th style="color:#fff;">Siniestro</th>
                                    <th style="color:#fff;">Patente</th>
                                    <th style="color:#fff;">Dirección</th>
                                    <th style="color:#fff;">Localidad</th>
                                    <th style="color:#fff;">Motivo</th>
                                    <th style="color:#fff;">Modalidad</th>
                                    {{-- <th style="color:#fff;">Inspector</th> --}}


                                    
                                
                              
                                    
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($cotizaciones as $siniestro)
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
                                <td>{{ $siniestro->created_by }}</td>
                                <td>{{ $siniestro->siniestro }}</td>
                                <td>{{ $siniestro->patente }}</td>
                                <td>{{ $siniestro->direccion }}</td>
                                <td>{{ $siniestro->localidad }}</td>
                                <td>{{ $siniestro->motivo }}</td>
                                <td>{{ $siniestro->modalidad }}</td>
                                {{-- <td>{{ $siniestro->inspector }}</td> --}}



                                <td>
                                    <form action="{{ route('siniestros.destroy',$siniestro->id) }}" method="POST">                                        
                                        
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
                        </div>

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

// funcionamiento de las tabs

const targets = document.querySelectorAll('[data-target]');
const content = document.querySelectorAll('[data-content]');

targets.forEach(target => {
    target.addEventListener('click', () => {
        content.forEach(c => {
            c.classList.remove('active');
        })

        const targe = document.querySelector(target.dataset.target);
        targe.classList.add('active');
    })
});


[...document.getElementsByClassName("nav-link")].forEach(function(item){
  item.addEventListener("click", function() {
    if(this.classList.contains("active")) {
      this.classList.remove("active")
    }
    else {
      this.classList.add("active")
    }
  })
});





$(document).ready(function(){
    $('#ingreso').on('click', function(){
        $('#ingreso').addClass('active');
        $('#ausente').removeClass('active');
        $('#tercero').removeClass('active');
        $('#cotizar').removeClass('active');
    })
    
})

$(document).ready(function(){
    $('#ausente').on('click', function(){
        $('#ingreso').removeClass('active');
        $('#ausente').addClass('active');
        $('#tercero').removeClass('active');
        $('#cotizar').removeClass('active');
    })
    
})

$(document).ready(function(){
    $('#tercero').on('click', function(){
        $('#ingreso').removeClass('active');
        $('#ausente').removeClass('active');
        $('#tercero').addClass('active');
        $('#cotizar').removeClass('active');
    })
    
})

$(document).ready(function(){
    $('#cotizar').on('click', function(){
        $('#ingreso').removeClass('active');
        $('#ausente').removeClass('active');
        $('#tercero').removeClass('active');
        $('#cotizar').addClass('active');
    })
    
})




</script>

@endsection

