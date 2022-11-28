@extends('layouts.app')

@section('content')


<style>
    .selected{
        background-color: #bdffff; font-weight: bold; color: black;
    }
</style>

    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Inspecciones</h3>
        </div>
        <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="https://siniestrosdag.com/home#">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="https://siniestrosdag.com/siniestros">Siniestros</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar siniestro</li> 
    
  </ol>
 
</nav>
        <div class="section-body">
        
            <div class="row">
            
                <!-- <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">  -->
                   
                                @if ($errors->any())                                                
                                    <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Revise los campos!</strong>                        
                                        @foreach ($errors->all() as $error)                                    
                                            <span class="badge badge-danger">{{ $error }}</span>
                                        @endforeach                        
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                @endif



                                
                                
                                @php
                            foreach($relaciones as $gestion)
                                {
                                    if($gestion->id == $siniestro->id) {
                                        echo "";
                                    } else { 
                                        echo "

                                        <div class='col-lg-12'>
                                <div class='card mt-2 text-white' style='font-weight:700;background-color:red'>
                                    <div class='card-header'><h3>Atención!</h3></div>
                                    <div class='card-body'>El siniestro {$gestion->siniestro} también tiene la misma patente ({$gestion->patente}); coordinar ambos</div>
                                    <div class='card-footer'><a class='float-right' style='text-decoration:none; color:white; font-weight:800' href='/siniestros/$gestion->id/edit'>Ver..</a></div>
                                </div>
                                </div>";
                                    }
                                } 
                        @endphp
                        
                                


                                <div class="col-lg-1"></div>
                                <div class="col-lg-8">
                                <div class="card">

                                <div class="card-header" style="background:linear-gradient(132deg, rgba(2,0,36,1) 0%, rgba(9,51,121,1) 0%, rgba(0,176,255,1) 100%);">
                                <h3 class="mx-auto my-auto" style="color:white">{{$siniestro->siniestro}} - {{$siniestro->compania}} </h3>
                                </div>
                                <div class="card-body">
                                <form action="{{ route('siniestros.update',$siniestro->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                        <div class="row">
                                    
                                    
                                            
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <label class="sr-only" for="inlineFormInputGroup">Fecha ip</label>
                                                <div class="input-group mb-2">
                                                  <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">Fecha ip</div>
                                                  </div>
                                                  <input type="date" name="fechaip" class="form-control" id="fechaip" value="{{$siniestro->fechaip}}">
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <label class="sr-only" for="inlineFormInputGroup">Modalidad</label>
                                                <div class="input-group mb-2">
                                                  <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">Modalidad</div>
                                                  </div>
                                                  <input type="text" name="modalidad" class="form-control" id="modalidad" value="{{$siniestro->modalidad}}">
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <label class="sr-only" for="inlineFormInputGroup">Horario</label>
                                                <div class="input-group mb-2">
                                                  <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">Horario</div>
                                                  </div>
                                                  <input type="text" name="horario" class="form-control" id="horario" value="{{$siniestro->horario}}">
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <label class="sr-only" for="inlineFormInputGroup">Patente</label>
                                                <div class="input-group mb-2">
                                                  <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">Patente</div>
                                                  </div>
                                                  <input type="text" name="patente" class="form-control" id="patente" value="{{$siniestro->patente}}">
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <label class="sr-only" for="inlineFormInputGroup">Nombre taller</label>
                                                <div class="input-group mb-2">
                                                  <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">Nombre taller</div>
                                                  </div>
                                                  <input type="text" name="nombretaller" class="form-control" id="nombretaller" value="{{$siniestro->nombretaller}}">
                                                  <span class="input-group-btn">
                                                    <button class="btn btn-info pull-right" type="button" data-toggle="modal" href="#" data-target="#modal_talleres" ><span class="fa fa-search-plus fa-xl pt-3"  aria-hidden="true"></span></button>
                                               </span>	
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <label class="sr-only" for="inlineFormInputGroup">Tipo de ip</label>
                                                <div class="input-group mb-2">
                                                  <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">Tipo de ip</div>
                                                    <select class="form-select col-xs-12 col-sm-12 col-md-12"  aria-label="Default select example" id="motivo" for="motivo" name="motivo" value="{{$siniestro->motivo}}">
                                                        <option selected value="{{ $siniestro->motivo }}">{{ $siniestro->motivo }}</option>
                                                        <option value="Todo riesgo">Todo riesgo</option>
                                                        <option value="ampliacion">Ampliacion</option>
                                                        <option value="actualizaciondevalores">Actualizacion de valores</option>
                                                        <option value="cotizarsincerrar">Cotizar y devolver sin cerrar</option>
                                                        <option value="robo">Robo</option>
                                                        <option value="incendio">Incendio</option>
                                                        <option value="posibleDT">Posible DT</option>
                                                    </select>
                                                  </div> 
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <label class="sr-only" for="inlineFormInputGroup">Dirección</label>
                                                <div class="input-group mb-2">
                                                  <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">Dirección</div>
                                                  </div>
                                                  <input type="text" name="direccion" class="form-control" id="direccion" value="{{$siniestro->direccion}}">
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <label class="sr-only" for="inlineFormInputGroup">Enviar orden</label>
                                                <div class="input-group mb-2">
                                                  <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">Enviar orden</div>
                                                  </div>
                                                  <input type="text" name="enviarorden" class="form-control" id="enviarorden" value="{{$siniestro->enviarorden}}">
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <label class="sr-only" for="inlineFormInputGroup">Localidad</label>
                                                <div class="input-group mb-2">
                                                  <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">Localidad</div>
                                                  </div>
                                                  <input type="text" name="localidad" class="form-control" id="localidad" value="{{$siniestro->localidad}}">
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <label class="sr-only" for="inlineFormInputGroup">Tipo de cliente</label>
                                                <div class="input-group mb-2">
                                                  <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">Tipo de cliente</div>
                                                  </div>
                                                  <input type="text" name="cliente" class="form-control" id="cliente" value="{{$siniestro->cliente}}">
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <label class="sr-only" for="inlineFormInputGroup">E-mail</label>
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">E-mail</div>
                                                  </div>
                                                  <input type="text" name="email" class="form-control" id="email" value="{{$siniestro->email}}">
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group ml-5">
                                                  <a href="{{ route('siniestros.show',$siniestro->id) }}" target="_blank" class="btn btn-primary ml-5 mr-5">Ver adjuntos</a>
                                                  <a href="{{$siniestro->link}}" target="_blank" class="btn btn-primary ml-5 mr-5">Link 2.0</a>
                                                    
                                                </div>
                                            </div>
    
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <label class="sr-only" for="inlineFormInputGroup">TE de contacto</label>
                                                <div class="input-group mb-2">
                                                  <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">TE de contacto</div>
                                                  </div>
                                                  <input type="text" name="telefono" class="form-control" id="telefono" value="{{$siniestro->telefono}}">
                                                </div>
                                            </div>
                                            
                                            <div class="col-xs-12 col-sm-12 col-md-12">           
                                                <div class="input-group-text bg-secondary">Indicaciones adicionales</div>    
                                                <div class="form-floating">
                                                <textarea class="form-control" name="observaciones" style="height:100px" id="observaciones">{{$siniestro->observaciones}}</textarea>
                                                </div>
                                            </div>
    
                                            <div class="col-xs-6 col-sm-6 col-md-6 mt-2">
                                                <label class="sr-only" for="inlineFormInputGroup">Contacto para negociar</label>
                                                <div class="input-group mb-2">
                                                  <div class="input-group-prepend">
                                                    <div class="input-group-text bg-secondary">Contacto para negociar</div>
                                                  </div>
                                                  <input type="text" name="ctoNegociar" class="form-control" id="ctoNegociar" value="{{$siniestro->contacto}}">
                                                </div>
                                            </div>
                                            
    
                                            

                                            <div class="card-header mt-3 mb-3" style="background:linear-gradient(132deg, rgba(2,0,36,1) 0%, rgba(9,51,121,1) 0%, rgba(0,176,255,1) 100%);">
                                                <h3 class="mx-auto my-auto" style="color:white">Gestión del siniestro</h3>
                                            </div>
                                        </div>
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <label class="sr-only" for="inlineFormInputGroup">Adjuntos</label>
                                                        <div class="input-group mb-2">
                                                          <div class="input-group-prepend">
                                                            <div class="input-group-text bg-secondary">Adjuntos</div>
                                                          </div>
                                                          <input type="file" name="urls[]" class="form-control" id="file" multiple>
                                                        </div>
                                                    </div>
    
                                                    
                                                    
    
        
                                                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                                        <label class="sr-only" for="inlineFormInputGroup">Estado</label>
                                                        <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-secondary">Estado</div>
                                                        </div>
                                                        <input type="text" name="estado" class="form-control" id="estado">
                                                        </div>
                                                    </div>
        
        
                                            
        
                                                    <div class="col-xs-3 col-sm-3 col-md-3 DatCord" hidden="true">
                                                        <div class="form-group">
                                                        <label for="coordinador">Coordinador</label>
                                                        <input type="text" name="coordinador"  class="form-control" id="coordinador" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                                                        </div>
                                                    </div>
        
                                           
                                                    <div class="col-xs-3 col-sm-3 col-md-3" hidden="true">
                                                        <div class="form-group">
                                                        <label for="imagen" class="form-label">Cover</label>
                                                        <input type="file" name="imagen" class="form-control">
                                                        </div>
                                                    </div>
                                            
                                            
                                                    <input id="id" hidden="true" value="{{ $siniestro->id }}">
                                                    <div class="col-xs-1 col-sm-1 col-md-1 mx-auto">
                                                        <hr> 
                                        
                                                        <button onclick="updateData(event)" style="width: 10rem;" class="btn btn-success btn-lg ml-2 mb-3 mx-auto">Egreso</button>
                                                        <button type="submit" style="width: 10rem;" class="btn btn-primary btn-lg ml-2 mb-3 mx-auto">Devolver a perito</button>
                                                        <button type="submit" style="width: 10rem;" class="btn btn-warning btn-lg ml-2 mb-3 mx-auto">Baja</button>
                                                        <button type="submit" style="width: 10rem;" class="btn btn-danger btn-lg ml-2 mb-3 mx-auto">Ausente</button>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="col-xs-12 col-sm-12 col-md-12">           
                                                        <div class="input-group-text bg-secondary">Observaciones analista</div>    
                                                        <div class="form-floating">
                                                        <textarea class="form-control" name="comentariosip" style="height:320px" id="comentariosip"></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                            </div>
                                        
                                    

                                    
                                    
                                                    
    
    
                                        
                                        
                                        
                                </form>
                                




                               
                                </div>
                                <br>
                            </div>

                    </div>
                </div>
            </div>
        </div>

        


    </section>
     <!-- Ventana Modal PERITOS   -->

<style>
    .selected{
        background-color: #3abaf4; font-weight: bold; color: black;
    }
</style>
	<div class="modal fade" id="modal_productores" tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header" style="background-color:hsl(213, 99%, 49%);padding-top:5px;">
            <h4 class="modal-title" style="color:white;">Productores</h4>  
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              
            </div>      
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">  
                    <div style="width: 100%; padding-left: -10px;">    
		            <div class="table-responsive">        
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                           
                                                
                                                        
                                                    <table class="table mt-2 productores" id="productores" cellspacing="0" width="100%">
                                                        <thead style="background-color:hsl(213, 99%, 49%)">                                     
                                                            <th style="display: none;color:#fff;font-size:20px">ID</th>
                                                            <th style="color:#fff;font-size:17px">Asignar a</th>
                                                            <th style="color:#fff;font-size:17px">Teléfono</th>
                                                            <th style="color:#fff;font-size:17px">E-mail</th>
                                                            
                                                                                                                                
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($productores as $productor)
                                                            <tr>
                                                                <td style="display: none;">{{ $productor->id }}</td>
                                                                <td onclick="selectedRow(),productorData('{{ $productor->id }}')">{{ $productor->nombre }}</td>
                                                                <td onclick="selectedRow(),productorData('{{ $productor->id }}')">{{ $productor->telefono }}</td>
                                                                <td onclick="selectedRow(),productorData('{{ $productor->id }}')">{{ $productor->correo }}</td>

                                                                
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                        </div>
                    </div>
                    </div>
                    </div>
                </div>	
                <button type="button" class="btn btn-primary" data-dismiss="modal">Confirmar</button>							
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modal_talleres" tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header" style="background-color:hsl(213, 99%, 49%);padding-top:5px;">
            <h4 class="modal-title" style="color:white;">Buscar perito</h4>  
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              
            </div>      
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">  
                    <div style="width: 100%; padding-left: -10px;">    
		            <div class="table-responsive">        
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                            <label for="">Talleres homologados</label>
                                                
                                                        
                                                    <table class="table mt-2 talleres" id="talleres" cellspacing="0" width="100%">
                                                        <thead style="background-color:hsl(213, 99%, 49%)">                                     
                                                            <th style="display: none;font-size:20px">ID</th>
                                                            <th style="color:#fff;font-size:17px">Taller</th>
                                                            <th style="color:#fff;font-size:17px">E-mail</th>
                                                            <th style="color:#fff;font-size:17px">Telefono</th>
                                                            <th style="color:#fff;font-size:17px">Domicilio</th>
                                                            <th style="color:#fff;font-size:17px">Localidad</th>

                                                            
                                                                                                                                
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($talleres as $taller)
                                                            <tr>
                                                                <td style="display: none;">{{ $taller->id }}</td>
                                                                <td onclick="selectedRow3(),tallerData('{{ $taller->id }}')">{{ $taller->taller }}</td>
                                                                <td onclick="selectedRow3(),tallerData('{{ $taller->id }}')">{{ $taller->telefonos }}</td>
                                                                <td onclick="selectedRow3(),tallerData('{{ $taller->id }}')">{{ $taller->email }}</td>
                                                                <td onclick="selectedRow3(),tallerData('{{ $taller->id }}')">{{ $taller->direccion }}</td>
                                                                <td onclick="selectedRow3(),tallerData('{{ $taller->id }}')">{{ $taller->localidad }}</td>

                                                                
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                        </div>
                    </div>
                    </div>
                    </div>
                </div>	
                <button type="button" class="btn btn-primary" data-dismiss="modal">Confirmar</button>							
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
    

@endsection


@section('javas')

   <script>
    
    $(document).ready(function() {
    $('.productores').DataTable({
        pageLength : 15,
        pagingType: "simple",
        lengthChange: false,
        responsive: true,
        processing: true,
        
    
        
    });
    })
    

</script>   

<script>
    
    $(document).ready(function() {
    $('.talleres').DataTable({
        pageLength : 10,
        pagingType: "simple",
        lengthChange: false,
        responsive: true,
        processing: true,

        
    });
})

</script>  

<script>
   function selectedRow(){
                
                var index,
                    table = document.getElementById("productores");
            
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         
                        {
                            $(this).addClass('selected').siblings().removeClass('selected')
                        }
                    };
                }
                
            }
            selectedRow();

            function selectedRow2(){
                
                var index,
                    table = document.getElementById("inspectores");
            
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         
                        {
                            $(this).addClass('selected').siblings().removeClass('selected')
                        }
                    };
                }
                
            }
            selectedRow2();

            function selectedRow3(){
                
                var index,
                    table = document.getElementById("talleres");
            
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         
                        {
                            $(this).addClass('selected').siblings().removeClass('selected')
                        }
                    };
                }
                
            }
            selectedRow3();




function clearData(){
 $('#siniestro').val('');
 $('#fechaip').val('');
 $('#inspector').val('');
 $('#localidad').val('');
 $('#direccion').val('');
 $('#email').val('');
 $('#nameError').text('');
 $('#titleError').text('');
 $('#instituteError').text('');
}

function reladData(){
    setTimeout(function() {
   location.reload();
   }); 
}




    function editData(id){
    



 
    $.ajax({
        type:"get",
        dataType:"json",
        url:"/teacher/edit/"+id,
        success: function(data){
            $('#id').val(data.id);
            $('#siniestro').val(data.siniestro);
            $('#fechaip').val(data.fechaip);
            $('#patente').val(data.patente);
            $('#direccion').val(data.direccion);
            $('#localidad').val(data.localidad);
            console.log(data);
        }
    })
}



function productorData(id){
    



 
    $.ajax({
        type:"get",
        dataType:"json",
        url:"/teacher/productores/"+id,
        success: function(data){
           

            // $('#id_inspector').val(data.id);
            $('#nombre').val(data.nombre);
            $('#emailPas').val(data.correo);
            
           

            console.log(data);
        }
    })
}

function tallerData(id){
    



 
    $.ajax({
        type:"get",
        dataType:"json",
        url:"/teacher/taller/"+id,
        success: function(data){
           

            // $('#id_inspector').val(data.id);
            $('#nombretaller').val(data.taller);
            $('#telefono').val(data.telefonos);
            $('#email').val(data.email);
            $('#direccion').val(data.direccion);
            $('#localidad').val(data.localidad);
            
           

            console.log(data);
        }
    })
}

function goTo() {
    let link = "https://siniestrosdag.com/siniestros/pendientes";
    window.location.replace(link);
};


 // --------------------------------------------- Update de registros a la table de BD -----------------------------------------------------

 function updateData(event){

event.preventDefault();
 var id = $('#id').val();
 var link = $('#link').val();
 var siniestro =  $('#siniestro').val();
 var patente = $('#patente').val();
 var nrocorto = $('#nrocorto').val();
 var cliente = $('#cliente').val();
 var modalidad = $('#modalidad').val();
//  var imagen = $('#imagen').val();
 var motivo = $('#motivo').val();
 var correo = $('#correo').val();
 var observaciones = $('#observaciones').val();
 var email = $('#email').val();
 var nombretaller = $('#nombretaller').val();
 var telefonos = $('#telefono').val();
 var direccion = $('#direccion').val();
 var localidad = $('#localidad').val();
 var estado = $('#estado').val();
 var fechaip = $('#fechaip').val();
 var enviarorden = $('#enviarorden').val();
 var horario = $('#horario').val();
 var compania = $('#compania').val();
 var comentariosparaip = $('#comentariosparaip').val();
 var comentariosdelperitovisita = $('#comentariosdelperitovisita').val();
 var comentariosdelperitofinales = $('#comentariosdelperitofinales').val();
 
 
 
 
 
 
  
 
 $.ajaxSetup({
headers:{
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
})


 $.ajax({
     type: "PUT",
     
     data: {modalidad:modalidad, motivo:motivo, fechaip:fechaip, patente:patente, siniestro:siniestro, localidad:localidad, direccion:direccion, email:email, estado:estado,
     observaciones:observaciones, nombretaller:nombretaller, telefono:telefonos, localidad:localidad, enviarorden:enviarorden, horario:horario, comentariosparaip:comentariosparaip, link:link,
     nrocorto:nrocorto, cliente:cliente, comentariosdelperitovisita:comentariosdelperitovisita, comentariosdelperitofinales:comentariosdelperitofinales, compania:compania},
     url: "/teacher/update/"+id,
     success: function(data){
            Swal.fire({
             icon: 'success',
             position: 'top-end',
             showConfirmButton: false,
             title: 'Siniestro ingresado con éxito',
         });
            setTimeout(goTo,1500);
      
     
        
      
     console.log('Siniestro asignado con éxito');
     },
  
 })


}
// <-------------------------------------- Para enviar correo ---------------------------------------------------------------------------------->

function Correo(event){

event.preventDefault();
// var id = $('#id').val();
var siniestro =  $('#siniestro').val();
var emailPas = $('#emailPas').val();
var coordinador = $('#coordinador').val();
var patente = $('#patente').val();
 
 $.ajaxSetup({
headers:{
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
})


 $.ajax({
     type: "POST",
     
     data: {siniestro:siniestro, emailPas:emailPas, patente:patente, coordinador:coordinador},
     url: "/correo",
     success: function(response){
            
         Swal.fire({
             icon: 'success',
             position: 'top-end',
             showConfirmButton: false,
             title: 'Correo enviado con éxito',
         })
         timer: 500;
        
           
         
        console.log('Correo enviado con éxito');
        }
  
 })


}

// <-------------------------------------- Para enviar correo a Edu ---------------------------------------------------------------------------------->

function CorreoEdu(event){

event.preventDefault();
// var id = $('#id').val();
var siniestro =  $('#siniestro').val();
var email = $('#email').val();
var fechaip = $('#fechaip').val();
var patente = $('#patente').val();
var nrocorto =  $('#nrocorto').val();
var comentariosparaip = $('#comentariosparaip').val();
var telefono = $('#telefono').val();
var localidad = $('#localidad').val();
var direccion =  $('#direccion').val();
var modalidad = $('#modalidad').val();
var link = $('#link').val();
// var nombretaller = $('#nombretaller').val();
var motivo = $('#motivo').val();
var horario = $('#horario').val();
var cliente = $('#cliente').val();
var enviarorden = $('#enviarorden').val();
var imagen = $('#imagen').val();
var contacto = $('#contacto').val();
var lugar = $('#lugar').val();





 
 $.ajaxSetup({
headers:{
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
})


 $.ajax({
     type: "POST",
     
     data: {siniestro:siniestro, email:email, fechaip:fechaip, patente:patente, nrocorto:nrocorto, comentariosparaip:comentariosparaip, telefono:telefono, localidad:localidad, direccion:direccion,
    modalidad:modalidad, motivo:motivo, horario:horario, enviarorden:enviarorden, cliente:cliente, link:link, imagen:imagen, lugar:lugar, contacto:contacto},
     url: "/correoEdu",
     success: function(response){
            
         Swal.fire({
             icon: 'success',
             position: 'top-end',
             showConfirmButton: false,
             title: 'Enviado a Edu con exito',
         })
         timer: 500;
        
           
         
        console.log('Correo enviado con exito');
        }
  
 })


}

 


</script>

@endsection

{{-- comentarios

@php
foreach($comentarios as $comentario)
    {
        if($comentario->id == $siniestro->id) {
            echo "";
        } else { 
            echo "

            <div class='col-lg-12'>
    <div class='card mt-2' style='font-weight:700;'>
        <div class='card-header'>{$comentario->created_at}</h3></div>
        <div class='card-body'> {$comentario->cuerpo}</div>
        <div class='card-footer'>{$comentario->name}</div>
    </div>
    </div>";
        }
    } 
@endphp --}}

