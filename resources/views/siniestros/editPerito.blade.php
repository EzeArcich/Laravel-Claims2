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



                                
                                
                               
                                


                                <div class="col-lg-1"></div>
                                <div class="col-lg-9">
                                  <form action="{{ route('download-pdf',$siniestro->id) }}" method="POST" target="_blank">
                                    @csrf
                                    <button class="btn btn-danger m-2">Descagar en PDF</button>
                                </form>
                                <div class="card">
                                  
                                <div class="card-header pt-0 pb-0" style="background:linear-gradient(132deg, rgba(2,0,36,1) 0%, rgba(9,51,121,1) 0%, rgba(0,176,255,1) 100%); min-height:40px">
                                <h3  class="mx-auto my-auto" style="color:white">{{$siniestro->siniestro}} - {{$siniestro->compania}} </h3>
                                </div>
                                <div class="card-body">
                                <form action="{{ route('siniestros.update',$siniestro->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                
                                
                                    
                                      <div class="col-xs-6 col-sm-6 col-md-6">
                                        <label class="sr-only" for="inlineFormInputGroup">Fecha IP</label>
                                        <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary">Fecha IP</div>
                                          </div>
                                          <input type="text" name="link" class="form-control" id="link"  value="{{ $siniestro->fechaip }}">
                                        </div>
                                      </div>
                                      <div class="col-xs-6 col-sm-6 col-md-6">
                                        <label class="sr-only" for="inlineFormInputGroup">Tipo de IP</label>
                                        <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary">Tipo de IP</div>
                                          </div>
                                          <input type="text" name="link" class="form-control" id="link"  value="{{ $siniestro->modalidad }}">
                                        </div>
                                      </div>
                                      <div class="col-xs-6 col-sm-6 col-md-6">
                                        <label class="sr-only" for="inlineFormInputGroup">Rango horario</label>
                                        <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary">Rango horario</div>
                                          </div>
                                          <input type="text" name="link" class="form-control" id="link"  value="{{ $siniestro->horario }}">
                                        </div>
                                      </div>
                                      <div class="col-xs-6 col-sm-6 col-md-6">
                                        <label class="sr-only" for="inlineFormInputGroup">Patente</label>
                                        <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary">Patente</div>
                                          </div>
                                          <input type="text" name="link" class="form-control" id="link"  value="{{ $siniestro->patente }}">
                                        </div>
                                      </div>
                                      <div class="col-xs-6 col-sm-6 col-md-6">
                                        <label class="sr-only" for="inlineFormInputGroup">Nombre del taller</label>
                                        <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary">Nombre del taller</div>
                                          </div>
                                          <input type="text" name="link" class="form-control" id="link"  value="{{ $siniestro->nombretaller }}">
                                        </div>
                                      </div>
                                      <div class="col-xs-6 col-sm-6 col-md-6">
                                        <label class="sr-only" for="inlineFormInputGroup">Motivo</label>
                                        <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary">Motivo</div>
                                          </div>
                                          <input type="text" name="link" class="form-control" id="link"  value="{{ $siniestro->motivo }}">
                                        </div>
                                      </div>
                                      <div class="col-xs-6 col-sm-6 col-md-6">
                                        <label class="sr-only" for="inlineFormInputGroup">Dirección</label>
                                        <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary">Dirección</div>
                                          </div>
                                          <input type="text" name="link" class="form-control" id="link"  value="{{ $siniestro->direccion }}">
                                        </div>
                                      </div>
                                      <div class="col-xs-6 col-sm-6 col-md-6">
                                        <label class="sr-only" for="inlineFormInputGroup">Enviar orden</label>
                                        <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary">Enviar orden</div>
                                          </div>
                                          <input type="text" name="link" class="form-control" id="link"  value="{{ $siniestro->enviarorden }}">
                                        </div>
                                      </div>
                                      <div class="col-xs-6 col-sm-6 col-md-6">
                                        <label class="sr-only" for="inlineFormInputGroup">Localidad</label>
                                        <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary">Localidad</div>
                                          </div>
                                          <input type="text" name="link" class="form-control" id="link"  value="{{ $siniestro->localidad }}">
                                        </div>
                                      </div>
                                      <div class="col-xs-6 col-sm-6 col-md-6">
                                        <label class="sr-only" for="inlineFormInputGroup">Cliente</label>
                                        <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary">Cliente</div>
                                          </div>
                                          <input type="text" name="link" class="form-control" id="link"  value="{{ $siniestro->cliente }}">
                                        </div>
                                      </div>
                                      <div class="col-xs-6 col-sm-6 col-md-6">
                                        <label class="sr-only" for="inlineFormInputGroup">E-mail</label>
                                        <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary">E-mail</div>
                                          </div>
                                          <input type="text" name="link" class="form-control" id="link"  value="{{ $siniestro->email }}">
                                        </div>
                                      </div>
                                      <div class="col-xs-6 col-sm-6 col-md-6">
                                        <label class="sr-only" for="inlineFormInputGroup">Coordinador</label>
                                        <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary" >Coordinador</div>
                                          </div>
                                          <input type="text" name="link" class="form-control" id="link"  value="{{ $siniestro->coordinador }}">
                                        </div>
                                      </div>
                                      <div class="col-xs-6 col-sm-6 col-md-6">
                                        <label class="sr-only" for="inlineFormInputGroup">Teléfono</label>
                                        <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text bg-secondary" >Teléfono</div>
                                          </div>
                                          <input type="text" name="link" class="form-control" id="link"  value="{{ $siniestro->telefono }}">
                                        </div>
                                      </div>
                                    
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group ml-5">
                                          <a href="{{ route('siniestros.show',$siniestro->id) }}" class="btn btn-info pt-2 ml-5 mr-5">Ver adjuntos</a>
                                          <a href="{{$siniestro->link}}" class="btn btn-info pt-2 ml-5 mr-5">Link 2.0</a>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-12 col-md-12">           
                                        <div class="input-group-text bg-secondary">Observaciones</div>    
                                        <div class="form-floating">
                                        <textarea class="form-control" name="observaciones" style="height:100px" id="observaciones" value="{{ $siniestro->observaciones }}">{{ $siniestro->observaciones }}</textarea>
                                        </div>
                                    </div>
                               
                                    <div class="card-header mt-3 mb-3" style="background:linear-gradient(132deg, rgba(2,0,36,1) 0%, rgba(9,51,121,1) 0%, rgba(0,176,255,1) 100%);">
                                      <h3 class="mx-auto my-auto" style="color:white">Respuesta perito - {{$siniestro->siniestro}} - {{$siniestro->compania}}</h3>
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
                                            <label class="sr-only" for="inlineFormInputGroup">Peaje</label>
                                            <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-secondary">Peaje</div>
                                            </div>
                                            <input type="text" name="peaje" class="form-control" id="peaje">
                                            </div>
                                        </div>

                                          <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                              <label class="sr-only" for="inlineFormInputGroup">Estado</label>
                                              <div class="input-group mb-2">
                                              <div class="input-group-prepend">
                                                  <div class="input-group-text bg-secondary">Estado</div>
                                              </div>
                                              <div class="col-xs-3 col-sm-3 col-md-3"></div>
                                              <div class="col-xs-4 col-sm-4 col-md-4">
                                                <button onclick="$('#estado').val('Completo a revisión'); estRevision()" class="btn btn-success btn-lg ml-1 mb-3">Completo a revisión</button>
                                                <button onclick="$('#estado').val('Sin cerrar a revisión'); estSinCer()" type="submit" class="btn btn-warning btn-lg ml-1 mb-3">Sin cerrar a revisión</button>
                                                <button onclick="$('#estado').val('Rechazado'); estRechaz()" type="submit" class="btn btn-danger btn-lg ml-1 mb-3">Rechazado</button>
                                                <button onclick="$('#estado').val('Pendiente presupuesto'); estPPresu()" type="submit" class="btn btn-secondary btn-lg text-dark ml-1 mb-3">Pendiente presupuesto</button>
                                              </div>
                                              
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
                                          
                                      </div>
                                      <div class="col-xs-6 col-sm-6 col-md-6">
                                          <div class="col-xs-12 col-sm-12 col-md-12">           
                                              <div class="input-group-text bg-secondary">Observaciones perito</div>    
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
     

<style>
    .selected{
        background-color: #3abaf4; font-weight: bold; color: black;
    }
</style>
	

    
    

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


function aSubmit(){
  document.getElementById("myForm").submit();
}

function estRevision(){
  event.preventDefault();
  Swal.fire({
             icon: 'success',
             position: 'top-end',
             showConfirmButton: false,
             title: 'Siniestro acordado, enviado a revisión por el estudio',
         });
  setTimeout(aSubmit, 2500);
}

function estSinCer(){
  event.preventDefault();
  Swal.fire({
             icon: 'success',
             position: 'top-end',
             showConfirmButton: false,
             title: 'Siniestro sin cerrar, a revisión por el estudio',
         });
  setTimeout(aSubmit, 2500);
}

function estRechaz(){
  event.preventDefault();
  Swal.fire({
             icon: 'success',
             position: 'top-end',
             showConfirmButton: false,
             title: 'Siniestro rechazado',
         });
  setTimeout(aSubmit, 2500);
}

function estPPresu(){
  event.preventDefault();
  Swal.fire({
             icon: 'success',
             position: 'top-end',
             showConfirmButton: false,
             title: 'Pericia realizada, a espera del presupuesto para poder avanzar',
         });
  setTimeout(aSubmit, 2500);
}

 


</script>

@endsection

